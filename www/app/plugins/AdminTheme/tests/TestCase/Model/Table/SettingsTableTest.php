<?php
declare(strict_types=1);

namespace AdminTheme\Test\TestCase\Model\Table;

use AdminTheme\Model\Table\SettingsTable;
use Cake\TestSuite\TestCase;

/**
 * AdminTheme\Model\Table\SettingsTable Test Case
 */
class SettingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \AdminTheme\Model\Table\SettingsTable
     */
    protected $Settings;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'plugin.AdminTheme.Settings',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Settings') ? [] : ['className' => SettingsTable::class];
        $this->Settings = $this->getTableLocator()->get('Settings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Settings);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \AdminTheme\Model\Table\SettingsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
