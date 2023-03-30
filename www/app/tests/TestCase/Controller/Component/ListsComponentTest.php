<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\ListsComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\ListsComponent Test Case
 */
class ListsComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\ListsComponent
     */
    protected $Lists;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Lists = new ListsComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Lists);

        parent::tearDown();
    }
}
