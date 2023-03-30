<?php
declare(strict_types=1);

namespace OenskeportalTheme\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use OenskeportalTheme\Controller\FaqController;

/**
 * OenskeportalTheme\Controller\FaqController Test Case
 *
 * @uses \OenskeportalTheme\Controller\FaqController
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
        'plugin.OenskeportalTheme.Faq',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \OenskeportalTheme\Controller\FaqController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \OenskeportalTheme\Controller\FaqController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \OenskeportalTheme\Controller\FaqController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \OenskeportalTheme\Controller\FaqController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \OenskeportalTheme\Controller\FaqController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
