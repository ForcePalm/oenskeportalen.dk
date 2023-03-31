<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Shared;

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
        $this->loadModel('Wishlists');

        $shared = $this->Wishlists->find()->contain([
            'Wishes'=> function ($q) {
            return $q->select(
                [
                    'wishlist_id',
                    'count' => $q->func()->count('*')
                ])->group('wishlist_id');
            }])->innerJoinWith('Shared')->where([
                'Shared.user_id' => $this->getCurrentUser()
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

        $share = $this->Wishlists->find()->contain([
            'Wishes',
        ])->where([
            'uuid' => $uuid,
        ])->firstOrFail();

        if($share->user_id == $this->getCurrentUser()){
            return $this->redirect(['controller' => 'Wishlists','action' => 'view', $uuid]);
        }

        $shared = $this->Shared->find()->where([
            'user_id' => $this->getCurrentUser(),
            'wishlist_id' => $share->id,
        ])->first();

        if(!$shared){

            $shared = $this->Shared->newEmptyEntity();
            $shared->user_id = $this->getCurrentUser();
            $shared->wishlist_id = $share->id;

            $n = 20;
            $token = bin2hex(random_bytes($n));
            $shared->share_token = $token;
            $shared = $this->Shared->patchEntity($shared, $this->request->getData());
            if ($this->Shared->save($shared)) {
                $this->Flash->success(__('Du har nu fået tilføjet denne delte ønskeliste'));

                return $this->redirect(['action' => 'view', $uuid]);
            }
            $this->Flash->error(__('Kunne ikke tilføje den delte ønskeliste. Prøv venligst igen.'));
        }

        $this->set(compact('share'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Shared id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($uuid = null)
    {
        $this->loadModel('Wishlists');

        $share = $this->Wishlists->find()->where([
            'uuid' => $uuid,
        ])->first();

        $shared = $this->Shared->find()->where([
            'user_id' => $this->getCurrentUser(),
            'wishlist_id' => $share->id,
        ])->first();

        if ($this->Shared->delete($shared)) {
            $this->Flash->success(__('Ønskelisten er fjerne fra delte'));
            return $this->redirect(['controller' => 'dashboard','action' => 'index']);
        } else {
            $this->Flash->error(__('Kunne ikke fjerne den delte ønskeliste. Prøv venligst igen.'));
            return $this->redirect(['controller' => 'dashboard','action' => 'index']);
        }

    }

    public function wish($uuid = null){
        $this->loadModel('Wishlists');
        $this->loadModel('Wishes');

        $wish = $this->Wishes->find()->contain([
            'Users',
            'Wishlists',
        ])->where([
            'Wishes.uuid' => $uuid,
        ])->firstOrFail();

        $shared = $this->Wishlists->find()->where([
            'user_id' => $this->getCurrentUser(),
            'id' => $wish->wishlist_id,
        ])->first();

        if($shared){
            return $this->redirect(['controller' => 'Wishes','action' => 'view', $uuid]);
        }

        $this->set(compact('wish'));
    }
}
