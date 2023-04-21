<?php
declare(strict_types=1);

namespace App\Controller\Api;
use Cake\View\JsonView;

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
    public function viewClasses(): array
    {
        return [JsonView::class];
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
}
