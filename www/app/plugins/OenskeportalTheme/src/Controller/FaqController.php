<?php
declare(strict_types=1);

namespace OenskeportalTheme\Controller;

use OenskeportalTheme\Controller\AppController;

/**
 * Faq Controller
 *
 * @property \OenskeportalTheme\Model\Table\FaqTable $Faq
 * @method \OenskeportalTheme\Model\Entity\Faq[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FaqController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $faq = $this->paginate($this->Faq);

        $this->set(compact('faq'));
    }

    /**
     * View method
     *
     * @param string|null $id Faq id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $faq = $this->Faq->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('faq'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $faq = $this->Faq->newEmptyEntity();
        if ($this->request->is('post')) {
            $faq = $this->Faq->patchEntity($faq, $this->request->getData());
            if ($this->Faq->save($faq)) {
                $this->Flash->success(__('The faq has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The faq could not be saved. Please, try again.'));
        }
        $this->set(compact('faq'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Faq id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $faq = $this->Faq->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $faq = $this->Faq->patchEntity($faq, $this->request->getData());
            if ($this->Faq->save($faq)) {
                $this->Flash->success(__('The faq has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The faq could not be saved. Please, try again.'));
        }
        $this->set(compact('faq'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Faq id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $faq = $this->Faq->get($id);
        if ($this->Faq->delete($faq)) {
            $this->Flash->success(__('The faq has been deleted.'));
        } else {
            $this->Flash->error(__('The faq could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
