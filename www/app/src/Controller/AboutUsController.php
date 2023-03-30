<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * AboutUs Controller
 *
 * @property \App\Model\Table\AboutUsTable $AboutUs
 * @method \App\Model\Entity\AboutU[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AboutUsController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
    parent::beforeFilter($event);
    // Configure the login action to not require authentication, preventing
    // the infinite redirect loop issue
    $this->Authentication->addUnauthenticatedActions(['index']);

    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $aboutUs = $this->paginate($this->AboutUs);

        $this->set(compact('aboutUs'));
    }

    /**
     * View method
     *
     * @param string|null $id About U id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aboutU = $this->AboutUs->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('aboutU'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aboutU = $this->AboutUs->newEmptyEntity();
        if ($this->request->is('post')) {
            $aboutU = $this->AboutUs->patchEntity($aboutU, $this->request->getData());
            if ($this->AboutUs->save($aboutU)) {
                $this->Flash->success(__('Om os sektion gemt'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Om os sektion, kunne ikke gemmes! Prøv venligst igen.'));
        }
        $this->set(compact('aboutU'));
    }

    /**
     * Edit method
     *
     * @param string|null $id About U id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aboutU = $this->AboutUs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aboutU = $this->AboutUs->patchEntity($aboutU, $this->request->getData());
            if ($this->AboutUs->save($aboutU)) {
                $this->Flash->success(__('Om os sektion gemt'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Om os sektion, kunne ikke gemmes! Prøv venligst igen.'));
        }
        $this->set(compact('aboutU'));
    }

    /**
     * Delete method
     *
     * @param string|null $id About U id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aboutU = $this->AboutUs->get($id);
        if ($this->AboutUs->delete($aboutU)) {
            $this->Flash->success(__('Om os sektion slettet'));
        } else {
            $this->Flash->error(__('Om os sektion, kunne ikke slettes! Prøv venligst igen.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
