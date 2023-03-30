<?php
declare(strict_types=1);

namespace AdminTheme\Test\TestCase\Controller;

use AdminTheme\Controller\GroupsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * AdminTheme\Controller\GroupsController Test Case
 *
 * @uses \AdminTheme\Controller\GroupsController
 */
class GroupsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'plugin.AdminTheme.Groups',
        'plugin.AdminTheme.Users',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \AdminTheme\Controller\GroupsController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \AdminTheme\Controller\GroupsController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \AdminTheme\Controller\GroupsController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \AdminTheme\Controller\GroupsController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \AdminTheme\Controller\GroupsController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
