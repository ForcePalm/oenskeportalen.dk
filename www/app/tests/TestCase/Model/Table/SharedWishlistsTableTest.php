<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SharedWishlistsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SharedWishlistsTable Test Case
 */
class SharedWishlistsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SharedWishlistsTable
     */
    protected $SharedWishlists;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.SharedWishlists',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SharedWishlists') ? [] : ['className' => SharedWishlistsTable::class];
        $this->SharedWishlists = $this->getTableLocator()->get('SharedWishlists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->SharedWishlists);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SharedWishlistsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SharedWishlistsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
