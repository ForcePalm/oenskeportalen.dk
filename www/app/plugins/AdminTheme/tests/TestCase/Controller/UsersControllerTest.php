<?php
declare(strict_types=1);

namespace AdminTheme\Test\TestCase\Controller;

use AdminTheme\Controller\UsersController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * AdminTheme\Controller\UsersController Test Case
 *
 * @uses \AdminTheme\Controller\UsersController
 */
class UsersControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'plugin.AdminTheme.Users',
        'plugin.AdminTheme.Shared',
        'plugin.AdminTheme.Wishes',
        'plugin.AdminTheme.Wishlists',
        'plugin.AdminTheme.Groups',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \AdminTheme\Controller\UsersController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \AdminTheme\Controller\UsersController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \AdminTheme\Controller\UsersController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \AdminTheme\Controller\UsersController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \AdminTheme\Controller\UsersController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
