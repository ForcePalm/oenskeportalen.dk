<?php
declare(strict_types=1);

namespace OenskeportalTheme\Controller;

use OenskeportalTheme\Controller\AppController;

/**
 * Shared Controller
 *
 * @property \App\Model\Table\SharedTable $Shared
 * @method \App\Model\Entity\Shared[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SharedController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $shared = $this->Shared->find()->contain([
            'Wishlists' => function ($q) {
                return $q->select(
                    [
                        'Wishlists.id',
                        'Wishlists.uuid',
                        'Wishlists.name',
                        'Wishlists.description',
                    ])->contain(
                        'Wishes',  function ($q) {
                            return $q->select(
                                [
                                    'Wishes.wishlist_id',
                                    'count' => $q->func()->count('*')
                                ])->group('Wishes.wishlist_id');
            
                            }
                        )->group('Wishlists.id');
                }
            ])->where([
            'Shared.user_id' => $this->request->getAttribute('identity')->getIdentifier(),
        ])->order([
            'Shared.id' => 'DESC',
        ])->all();

        $this->set(compact('shared'));
    }

    /**
     * View method
     *
     * @param string|null $id Shared id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($uuid = null)
    {
        $this->loadModel('Wishlists');

        $shared = $this->Wishlists->find()->contain([
            'Wishes',
        ])->where([
            'uuid' => $uuid,
        ])->firstOrFail();

        if($shared->user_id == $this->request->getAttribute('identity')->getIdentifier()){
            return $this->redirect(['controller' => 'Wishlists','action' => 'view', $uuid]);
        }

        $this->set(compact('shared'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shared = $this->Shared->newEmptyEntity();
        if ($this->request->is('post')) {
            $shared = $this->Shared->patchEntity($shared, $this->request->getData());
            if ($this->Shared->save($shared)) {
                $this->Flash->success(__('The shared has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shared could not be saved. Please, try again.'));
        }
        $wishlists = $this->Shared->Wishlists->find('list', ['limit' => 200])->all();
        $users = $this->Shared->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('shared', 'wishlists', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Shared id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shared = $this->Shared->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shared = $this->Shared->patchEntity($shared, $this->request->getData());
            if ($this->Shared->save($shared)) {
                $this->Flash->success(__('The shared has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shared could not be saved. Please, try again.'));
        }
        $wishlists = $this->Shared->Wishlists->find('list', ['limit' => 200])->all();
        $users = $this->Shared->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('shared', 'wishlists', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Shared id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shared = $this->Shared->get($id);
        if ($this->Shared->delete($shared)) {
            $this->Flash->success(__('The shared has been deleted.'));
        } else {
            $this->Flash->error(__('The shared could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function wish($uuid = null){
        $this->loadModel('Wishlists');
        $this->loadModel('Wishes');

        $wish = $this->Wishes->find()->contain([
            'Users',
        ])->where([
            'Wishes.uuid' => $uuid,
        ])->firstOrFail();

        $shared = $this->Wishlists->find()->where([
            'user_id' => $this->request->getAttribute('identity')->getIdentifier(),
            'id' => $wish->wishlist_id,
        ])->first();

        if($shared){
            return $this->redirect(['controller' => 'Wishes','action' => 'view', $uuid]);
        }

        $this->set(compact('wish'));
    }
}
