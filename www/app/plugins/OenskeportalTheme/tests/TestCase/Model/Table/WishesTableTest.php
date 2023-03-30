<?php
declare(strict_types=1);

namespace OenskeportalTheme\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use OenskeportalTheme\Model\Table\WishesTable;

/**
 * OenskeportalTheme\Model\Table\WishesTable Test Case
 */
class WishesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \OenskeportalTheme\Model\Table\WishesTable
     */
    protected $Wishes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'plugin.OenskeportalTheme.Wishes',
        'plugin.OenskeportalTheme.Wishlists',
        'plugin.OenskeportalTheme.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Wishes') ? [] : ['className' => WishesTable::class];
        $this->Wishes = $this->getTableLocator()->get('Wishes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Wishes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \OenskeportalTheme\Model\Table\WishesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \OenskeportalTheme\Model\Table\WishesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
