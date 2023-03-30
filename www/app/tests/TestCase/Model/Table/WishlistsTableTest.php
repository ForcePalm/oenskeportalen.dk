<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WishlistsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WishlistsTable Test Case
 */
class WishlistsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WishlistsTable
     */
    protected $Wishlists;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Wishlists',
        'app.Users',
        'app.Shared',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Wishlists') ? [] : ['className' => WishlistsTable::class];
        $this->Wishlists = $this->getTableLocator()->get('Wishlists', $config);
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

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\WishlistsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\WishlistsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
