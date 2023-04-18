<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Faq Controller
 *
 * @property \App\Model\Table\FaqTable $Faq
 * @method \App\Model\Entity\Faq[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FaqController extends AppController
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
        
        $faq = $this->paginate($this->Faq);

        $this->set(compact('faq'));
        
    }
}
