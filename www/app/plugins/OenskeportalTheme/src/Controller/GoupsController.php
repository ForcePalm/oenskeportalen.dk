<?php
declare(strict_types=1);

namespace OenskeportalTheme\Controller;

use OenskeportalTheme\Controller\AppController;

/**
 * Goups Controller
 *
 * @method \OenskeportalTheme\Model\Entity\Goup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GoupsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $goups = $this->paginate($this->Goups);

        $this->set(compact('goups'));
    }

    /**
     * View method
     *
     * @param string|null $id Goup id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $goup = $this->Goups->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('goup'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $goup = $this->Goups->newEmptyEntity();
        if ($this->request->is('post')) {
            $goup = $this->Goups->patchEntity($goup, $this->request->getData());
            if ($this->Goups->save($goup)) {
                $this->Flash->success(__('The goup has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The goup could not be saved. Please, try again.'));
        }
        $this->set(compact('goup'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Goup id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $goup = $this->Goups->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $goup = $this->Goups->patchEntity($goup, $this->request->getData());
            if ($this->Goups->save($goup)) {
                $this->Flash->success(__('The goup has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The goup could not be saved. Please, try again.'));
        }
        $this->set(compact('goup'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Goup id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $goup = $this->Goups->get($id);
        if ($this->Goups->delete($goup)) {
            $this->Flash->success(__('The goup has been deleted.'));
        } else {
            $this->Flash->error(__('The goup could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
