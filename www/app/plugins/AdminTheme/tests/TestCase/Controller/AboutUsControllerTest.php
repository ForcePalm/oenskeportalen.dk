<?php
declare(strict_types=1);

namespace AdminTheme\Test\TestCase\Controller;

use AdminTheme\Controller\AboutUsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * AdminTheme\Controller\AboutUsController Test Case
 *
 * @uses \AdminTheme\Controller\AboutUsController
 */
class AboutUsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'plugin.AdminTheme.AboutUs',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \AdminTheme\Controller\AboutUsController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \AdminTheme\Controller\AboutUsController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \AdminTheme\Controller\AboutUsController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \AdminTheme\Controller\AboutUsController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \AdminTheme\Controller\AboutUsController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
