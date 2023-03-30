<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\WishlistsComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\WishlistsComponent Test Case
 */
class WishlistsComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\WishlistsComponent
     */
    protected $Wishlists;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Wishlists = new WishlistsComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Wishlists);

        parent::tearDown();
    }
}
