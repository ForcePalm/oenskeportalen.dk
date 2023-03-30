<?php
declare(strict_types=1);

namespace OenskeportalTheme\Controller;

use OenskeportalTheme\Controller\AppController;

/**
 * Wishlists Controller
 *
 * @property \App\Model\Table\WishlistsTable $Wishlists
 * @method \App\Model\Entity\Wishlist[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WishlistsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $wishlists = $this->Wishlists->find()->contain('Wishes', function ($q) {
            return $q->select(
                [
                    'wishlist_id',
                    'count' => $q->func()->count('*')
                ])->group('wishlist_id');
            })->where([
            'user_id' => $this->request->getAttribute('identity')->getIdentifier(),
        ])->all();

        $this->set(compact('wishlists'));
    }

    /**
     * View method
     *
     * @param string|null $id Wishlist id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($uuid = null)
    {
        $wishlist = $this->Wishlists->find()->contain([
            'Wishes',
        ])->where([
            'uuid' => $uuid,
        ])->firstOrFail();

        $this->set(compact('wishlist'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $wishlist = $this->Wishlists->newEmptyEntity();
        if ($this->request->is('post')) {
            $n = 20;
            $uuid = bin2hex(random_bytes($n));
    
            $wishlist->uuid    = $uuid;
            $wishlist->user_id = $this->request->getAttribute('identity')->getIdentifier();
            $wishlist = $this->Wishlists->patchEntity($wishlist, $this->request->getData());
            if ($this->Wishlists->save($wishlist)) {
                $this->Flash->success(__('The wishlist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wishlist could not be saved. Please, try again.'));
        }
        $this->set(compact('wishlist'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Wishlist id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($uuid = null)
    {
        $wishlist = $this->Wishlists->find()->where([
            'uuid' =>  $uuid,
        ])->first();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $wishlist = $this->Wishlists->patchEntity($wishlist, $this->request->getData());
            if ($this->Wishlists->save($wishlist)) {
                $this->Flash->success(__('The wishlist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wishlist could not be saved. Please, try again.'));
        }
        $this->set(compact('wishlist'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Wishlist id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($uuid = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $wishlist = $this->Wishlists->find()->where([
            'uuid' =>  $uuid,
        ])->first();

        if ($this->Wishlists->delete($wishlist)) {
            $this->Flash->success(__('The wishlist has been deleted.'));
        } else {
            $this->Flash->error(__('The wishlist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
