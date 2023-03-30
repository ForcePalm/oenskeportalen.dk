<?php
declare(strict_types=1);
use Cake\Http\UploadedFile;
namespace App\Controller;

/**
 * Wishes Controller
 *
 * @property \App\Model\Table\WishesTable $Wishes
 * @method \App\Model\Entity\Wish[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WishesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $wishes = $this->paginate($this->Wishes);

        $this->set(compact('wishes'));
    }

    /**
     * View method
     *
     * @param string|null $id Wish id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($uuid = null)
    {
        $wish = $this->Wishes->find()->contain('Wishlists')->where([
            'Wishes.uuid' => $uuid,
        ])->firstOrFail();
        
        $this->set(compact('wish'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($wishlist_uuid = null)
    {
        $this->loadModel('Wishlists');

        $wishlists = $this->Wishlists->find()->where([
            'uuid' => $wishlist_uuid,
        ])->first();

        $wish = $this->Wishes->newEmptyEntity();
        
        if ($this->request->is('post')) {

            $n = 20;
            $uuid = bin2hex(random_bytes($n));
            $wish->uuid = $uuid;
            $wish->wishlist_id = $wishlists->id;

            $wish = $this->Wishes->patchEntity($wish, $this->request->getData());

            // Handle file upload
            $file = $this->request->getData('wish_img');
            if ($file->getClientFileName()) {
                $path = WWW_ROOT . 'img' . DS . 'uploads' . DS . 'Wishlists' . DS . $wishlists->uuid;
                $wish->wish_img = $this->upload($file, $path);
            }else{
                $wish->wish_img = null;
            }

            if ($this->Wishes->save($wish)) {
                $this->Flash->success(__('Ønsket er oprettet.'));

                return $this->redirect(['controller' => 'Wishlists', 'action' => 'view', $wishlist_uuid]);
            }
            $this->Flash->error(__('Kunne ikke oprette ønsket. Prøv venligst igen.'));
        }

        $this->set(compact('wish'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Wish id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($uuid = null)
    {
        $this->loadModel('Wishlists');

        $wish = $this->Wishes->find()->where([
            'uuid' => $uuid,
        ])->first();

        $wishlists = $this->Wishlists->find()->where([
            'id' => $wish->wishlist_id,
        ])->first();
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $wish = $this->Wishes->patchEntity($wish, $this->request->getData());

            // Handle file upload
            $file = $this->request->getData('wish_img');
            if ($file->getClientFileName()) {
                $path = WWW_ROOT . 'img' . DS . 'uploads' . DS . 'Wishlists' . DS . $wishlists->uuid;
                $this->upload($file, $path);
            }else{
                $wish->wish_img = $wish->wish_img;
            }

            if ($this->Wishes->save($wish)) {
                $this->Flash->success(__('Ønske er blevet gemt'));

                return $this->redirect(['controller' => 'Wishes', 'action' => 'view', $uuid]);
            }
            $this->Flash->error(__('Kunne ikke gemme ønsket. Prøv venligst igen.'));
        }
        $this->set(compact('wish'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Wish id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($uuid = null)
    {
        $this->loadModel('Wishlists');
        $wish = $this->Wishes->find()->contain([
            'Wishlists',
        ])->where([
            'Wishes.uuid' => $uuid,
        ])->first();

        if ($this->Wishes->delete($wish)) {
            if($wish->wish_img){
                unlink(WWW_ROOT . 'img' . DS . 'uploads' . DS . 'Wishlists' . DS . $wish->wishlist->uuid . DS . $wish->wish_img);
            }
            
            $this->Flash->success(__('Ønsket er bevet slettet.'));
        } else {
            $this->Flash->error(__('Kunne ikke slette ønsket. Prøv venligst igen.'));
        }

        return $this->redirect(['controller' => 'Wishlists', 'action' => 'view', $wish->wishlist->uuid]);
    }

    public function reserve($uuid = null){
        $wish = $this->Wishes->find()->where([
            'uuid' => $uuid,
        ])->firstOrFail();

        if($wish->is_reserved != 1){
            $wish->is_reserved = 1;
            $wish->reserved_by = $this->getCurrentUser();
            if ($this->Wishes->save($wish)) {
                $this->Flash->success(__('Ønsket er blevet reserveret'));

                return $this->redirect(['controller' => 'Shared', 'action' => 'wish', $wish->uuid]);
            }
            $this->Flash->error(__('Ønsket kunne ikke reserveres. Prøv venligst igen.'));
        }
        $this->Flash->error(__('Ønsket er reserveret af en anden.'));
    }

    public function cancel($uuid = null){
        $wish = $this->Wishes->find()->where([
            'uuid' => $uuid,
        ])->firstOrFail();

        if($wish->reserved_by == $this->getCurrentUser()){
            $wish->is_reserved = 0;
            $wish->reserved_by = null;
            if ($this->Wishes->save($wish)) {
                $this->Flash->success(__('Reservationen af ønsket, er blevet annulleret.'));
    
                return $this->redirect(['controller' => 'Shared', 'action' => 'wish', $wish->uuid]);
            }
            $this->Flash->error(__('Kunne ike annullere reservationen. Prøv venligst igen.'));
        }
    }
}
