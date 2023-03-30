<?php
declare(strict_types=1);
namespace OenskeportalTheme\Controller;

use OenskeportalTheme\Controller\AppController;
use Cake\Http\UploadedFile;

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
        $wish = $this->Wishes->find()->where([
            'uuid' => $uuid,
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
        ])->firstOrFail();

        $wish = $this->Wishes->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $n = 20;
            $uuid = bin2hex(random_bytes($n));
    
            $wish->uuid = $uuid;
            $wish->wishlist_id = $wishlists->id;
            $wish = $this->Wishes->patchEntity($wish, $this->request->getData());

            // Handle file upload
            $file = $this->request->getData('wish_img');
            if ($file) {
                $targetPath = WWW_ROOT . 'img' . DS . 'uploads' . DS;
                $targetFile = $targetPath . $file->getClientFileName();
                if ($file->getError() === UPLOAD_ERR_OK) {
                    if(move_uploaded_file($file->getStream()->getMetadata('uri'), $targetFile)) {
                        $wish->wish_img = $file->getClientFileName();
                    } else {
                        $this->Flash->error(__('The file could not be uploaded. Please try again.'));
                    }
                } else {
                    $this->Flash->error(__('An error occurred. Please try again.'));
                }
            }

            if ($this->Wishes->save($wish)) {
                $this->Flash->success(__('The wish has been saved.'));

                return $this->redirect(['controller' => 'Wishlists', 'action' => 'view', $wishlist_uuid]);
            }
            $this->Flash->error(__('The wish could not be saved. Please, try again.'));
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
    public function edit($id = null)
    {
        $wish = $this->Wishes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $wish = $this->Wishes->patchEntity($wish, $this->request->getData());
            if ($this->Wishes->save($wish)) {
                $this->Flash->success(__('The wish has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wish could not be saved. Please, try again.'));
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
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $wish = $this->Wishes->get($id);
        if ($this->Wishes->delete($wish)) {
            $this->Flash->success(__('The wish has been deleted.'));
        } else {
            $this->Flash->error(__('The wish could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function reserve($uuid = null){
        $wish = $this->Wishes->find()->where([
            'uuid' => $uuid,
        ])->firstOrFail();

        $wish->is_reserved = 1;
        $wish->reserved_by = $this->request->getAttribute('identity')->getIdentifier();

        if ($this->Wishes->save($wish)) {
            $this->Flash->success(__('The wish has been saved.'));

            return $this->redirect(['controller' => 'Shared', 'action' => 'wish', $wish->uuid]);
        }
        $this->Flash->error(__('The wish could not be saved. Please, try again.'));
    }

    public function cancel($uuid = null){
        $wish = $this->Wishes->find()->where([
            'uuid' => $uuid,
        ])->firstOrFail();

        

        if($wish->reserved_by == $this->request->getAttribute('identity')->getIdentifier()){
            $wish->is_reserved = 0;
            $wish->reserved_by = null;
            if ($this->Wishes->save($wish)) {
                $this->Flash->success(__('The wish has been saved.'));
    
                return $this->redirect(['controller' => 'Shared', 'action' => 'wish', $wish->uuid]);
            }
            $this->Flash->error(__('The wish could not be saved. Please, try again.'));
        }
        
    }
}
