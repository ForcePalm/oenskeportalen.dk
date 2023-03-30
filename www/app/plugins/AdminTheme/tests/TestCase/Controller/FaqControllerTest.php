<?php
declare(strict_types=1);

namespace AdminTheme\Test\TestCase\Controller;

use AdminTheme\Controller\FaqController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * AdminTheme\Controller\FaqController Test Case
 *
 * @uses \AdminTheme\Controller\FaqController
 */
class FaqControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'plugin.AdminTheme.Faq',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \AdminTheme\Controller\FaqController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \AdminTheme\Controller\FaqController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \AdminTheme\Controller\FaqController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \AdminTheme\Controller\FaqController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \AdminTheme\Controller\FaqController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
