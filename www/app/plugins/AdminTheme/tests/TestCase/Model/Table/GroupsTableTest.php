<?php
declare(strict_types=1);

namespace AdminTheme\Test\TestCase\Model\Table;

use AdminTheme\Model\Table\GroupsTable;
use Cake\TestSuite\TestCase;

/**
 * AdminTheme\Model\Table\GroupsTable Test Case
 */
class GroupsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \AdminTheme\Model\Table\GroupsTable
     */
    protected $Groups;

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
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Groups') ? [] : ['className' => GroupsTable::class];
        $this->Groups = $this->getTableLocator()->get('Groups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Groups);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \AdminTheme\Model\Table\GroupsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
