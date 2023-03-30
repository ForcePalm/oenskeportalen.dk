<?php
declare(strict_types=1);

namespace App\Controller;
use App\Controller\AppController;

/**
 * Dashboard Controller
 *
 * @property \App\Model\Table\WishlistsTable $Wishlists
 * @method \App\Model\Entity\Wishlist[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DashboardController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->loadModel('Wishlists');
        $wishlists = $this->Wishlists->find()->contain('Wishes', function ($q) {
            return $q->select(
                [
                    'wishlist_id',
                    'count' => $q->func()->count('*')
                ])->group('wishlist_id');
            })->where([
            'user_id' => $this->request->getAttribute('identity')->getIdentifier(),
        ])->order([
            'Wishlists.id' => 'DESC',
        ])->limit(3)->all();

        $shared = $this->Wishlists->find()->contain([
            'Wishes'=> function ($q) {
            return $q->select(
                [
                    'wishlist_id',
                    'count' => $q->func()->count('*')
                ])->group('wishlist_id');
            }])->innerJoinWith('Shared')->where([
                'Shared.user_id' => $this->request->getAttribute('identity')->getIdentifier()
            ])->order([
                'Wishlists.id' => 'DESC',
            ])->limit(4)->all();


        $this->set([
            'wishlists' => $wishlists, 
            'shared'    => $shared,
        ]);
    }
}