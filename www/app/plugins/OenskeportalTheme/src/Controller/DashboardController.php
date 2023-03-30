<?php
declare(strict_types=1);

namespace OenskeportalTheme\Controller;

use OenskeportalTheme\Controller\AppController;

/**
 * Dashboard Controller
 *
 * @property \OenskeportalTheme\Model\Table\WishlistsTable $Wishlists
 * @method \OenskeportalTheme\Model\Entity\Wishlist[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
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
        $this->loadModel('OenskeportalTheme.Wishlists');
        $this->loadModel('OenskeportalTheme.Shared');
        
        $wishlists = $this->Wishlists->find()->contain(
            'Wishes', function ($q) {
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


        $this->set([
            'wishlists' => $wishlists, 
            'shared'    => $shared,
        ]);
    }
}