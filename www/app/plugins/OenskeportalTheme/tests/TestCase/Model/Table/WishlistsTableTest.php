<?php
declare(strict_types=1);

namespace OenskeportalTheme\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use OenskeportalTheme\Model\Table\WishlistsTable;

/**
 * OenskeportalTheme\Model\Table\WishlistsTable Test Case
 */
class WishlistsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \OenskeportalTheme\Model\Table\WishlistsTable
     */
    protected $Wishlists;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'plugin.OenskeportalTheme.Wishlists',
        'plugin.OenskeportalTheme.Users',
        'plugin.OenskeportalTheme.Shared',
        'plugin.OenskeportalTheme.Wishes',
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
     * @uses \OenskeportalTheme\Model\Table\WishlistsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \OenskeportalTheme\Model\Table\WishlistsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
