<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Mailer;
use Cake\View\JsonView;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
    parent::beforeFilter($event);
    // Configure the login action to not require authentication, preventing
    // the infinite redirect loop issue
    $this->Authentication->addUnauthenticatedActions(['login', 'register', 'forgotLogin', 'resetPassword']);

    }
    public function viewClasses(): array
    {
        return [JsonView::class];
    }
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($uuid = null)
    {
        $user = $this->Users->find()->contain([
            'Groups',
        ])->where([
            'uuid' => $uuid,
        ])->firstOrFail();

        $this->set([
            'user' => $user,
        ]);
    }
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($uuid = null)
    {   
        $user = $this->Users->find()->where([
            'uuid' =>  $uuid,
        ])->firstOrFail();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Succesfuldt gemt bruger'));

                return $this->redirect(['action' => 'edit']);
            }
            $this->Flash->error(__('Kunne ikke gemme bruger. Prøv venligst igen.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($uuid = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->find()->where([
            'uuid' => $uuid,
        ])->firstOrFail();
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Bruger Slettet.'));
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        } else {
            $this->Flash->error(__('Brugeren kunne ikke slettes. Prøv venligst igen.'));
        }

        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Registers a user.
     *
     * @return \Cake\Http\Response|null|void
     */
    public function register()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            if($this->request->getData('password') == $this->request->getData('repeat_password')){
                $n = 20;
                $uuid = bin2hex(random_bytes($n));
    
                $user->uuid = $uuid;
                $user = $this->Users->patchEntity($user, $this->request->getData());
                
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Succesfuldt registeret, og klar til login'));

                    $mailer = new Mailer();
                    $mailer->setDomain('www.ønskeportalen.dk');
                    $mailer
                        ->setEmailFormat('html')
                        ->setTo($this->request->getData('email'))
                        ->setFrom('noreply@oenskeportalen.dk')
                        ->setSubject('Velkommen til Ønskeportalen')
                        ->viewBuilder()
                        ->setTemplate('welcome')
                        ->setLayout('fancy');
                    $mailer->setViewVars([
                        'name'  => $user->name,
                    ]);

                    $mailer->setTransport('gmail');

                    $mailer->deliver();

                    return $this->redirect(['action' => 'login']);
                }
                $this->Flash->error(__('Registrering fejlet. Prøv venligst igen.'));
            }
            $this->Flash->error(__('Passwords matchede ikke'));
        }
        $this->set(compact('user'));
        $this->viewBuilder()->setOption('serialize', ['user']);
    }

public function login()
{   
    $result = $this->Authentication->getResult();
    // regardless of POST or GET, redirect if user is logged in
    if ($result && $result->isValid()) {
        $user = $result->getData();
    }
    // display error if user submitted and authentication failed
    if ($this->request->is('post') && !$result->isValid()) {
        $user = [
            'message' => 'Forkert brugernavn eller kode.'
        ];
        $this->Flash->error(__('Forkert brugernavn eller kode.'));
    }
    $this->set(compact('user'));
    $this->viewBuilder()->setOption('serialize', ['user']);
}

public function logout()
{
    $result = $this->Authentication->getResult();
    // regardless of POST or GET, redirect if user is logged in
    if ($result && $result->isValid()) {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
}

public function forgotLogin()
{
    if ($this->request->is(['patch', 'post', 'put'])) {

        $user = $this->Users->find()->where([
            'email' => $this->request->getData('email'),
        ])->firstOrFail();

        $n = 20;
        $token = bin2hex(random_bytes($n));

        $user->reset_request_token = $token;

        if ($this->Users->save($user)) {
            $this->Flash->success(__('Password resetmail er nu sendt, husk at tjekke din spam mappe.'));

            $mailer = new Mailer();
            $mailer->setDomain('www.ønskeportalen.dk');
            $mailer
                ->setEmailFormat('html')
                ->setTo($this->request->getData('email'))
                ->setFrom('noreply@oenskeportalen.dk', 'Ønskeportalen.dk')
                ->setSubject('Nulstilling at adgangskode')
                ->viewBuilder()
                ->setTemplate('reset')
                ->setLayout('password');
            $mailer->setViewVars([
                'name'  => $user->name,
                'token' => $user->reset_request_token,
                'link'  => 'http://xn--nskeportalen-ujb.dk/users/reset_password/'.$token,
            ]);
            $mailer->setTransport('gmail');
            
            $mailer->deliver();
        }

    }


}


public function resetPassword($reset_token)
{
    if(empty($reset_token)){
        return $this->redirect(['action' => 'forgotLogin']);
    }else{
        $user = $this->Users->find()->where([
            'reset_request_token' => $reset_token,
        ])->first();
    
        if(empty($user)){
            return $this->redirect(['action' => 'forgotLogin']);
        }
    
        if ($this->request->is(['patch', 'post', 'put'])) {
    
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->reset_request_token = null;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Adgangskode nulstillet.'));
    
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Kunne ikke nulstille adgangskoden. Prøv venligst igen.'));
        }
    }
}
}
