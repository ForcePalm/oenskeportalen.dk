<?php
declare(strict_types=1);

namespace AdminTheme\Controller;

use AdminTheme\Controller\AppController;
use Cake\Http\UploadedFile;

/**
 * Settings Controller
 *
 * @property \AdminTheme\Model\Table\SettingsTable $Settings
 * @method \AdminTheme\Model\Entity\Setting[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SettingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $settings = $this->paginate($this->Settings);

        $this->set(compact('settings'));
    }

    /**
     * View method
     *
     * @param string|null $id Setting id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $setting = $this->Settings->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('setting'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $setting = $this->Settings->newEmptyEntity();
        
        if ($this->request->is('post')) {

            $setting = $this->Settings->patchEntity($setting, $this->request->getData());

            // Handle file upload
            $file = $this->request->getData('site_logo');
            if ($file->getClientFileName()) {
                $path = WWW_ROOT . 'img' . DS . 'uploads' . DS . 'Settings';
                $setting->site_logo = $this->upload($file, $path);
            }else{
                $setting->site_logo = null;
            }
            if ($this->Settings->save($setting)) {
                $this->Flash->success(__('The wish has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wish could not be saved. Please, try again.'));
        }

        $this->set(compact('setting'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Setting id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $setting = $this->Settings->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $setting = $this->Settings->patchEntity($setting, $this->request->getData());

            // Handle file upload
            $file = $this->request->getData('site_logo');
            if ($file->getClientFileName()) {
                $path = WWW_ROOT . 'img' . DS . 'uploads' . DS . 'Settings';
                if($setting->site_logo){
                    unlink($path . DS . $setting->site_logo);
                }
                $setting->site_logo = $this->upload($file, $path);
            }else{
                $setting->site_logo = $setting->site_logo;
            }
            
            if ($this->Settings->save($setting)) {
                $this->Flash->success(__('The setting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The setting could not be saved. Please, try again.'));
        }
        $this->set(compact('setting'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Setting id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $setting = $this->Settings->get($id);
        if ($this->Settings->delete($setting)) {
            // Folder path to be flushed
            dd($path = WWW_ROOT . 'img' . DS . 'uploads' . DS . 'Settings' . DS . $setting->site_logo);

            //Deletes the img
            unlink($path);

            $this->Flash->success(__('The setting has been deleted.'));
        } else {
            $this->Flash->error(__('The setting could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
