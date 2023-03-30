<?php
declare(strict_types=1);

namespace AdminTheme\Test\TestCase\Model\Table;

use AdminTheme\Model\Table\AboutUsTable;
use Cake\TestSuite\TestCase;

/**
 * AdminTheme\Model\Table\AboutUsTable Test Case
 */
class AboutUsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \AdminTheme\Model\Table\AboutUsTable
     */
    protected $AboutUs;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'plugin.AdminTheme.AboutUs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AboutUs') ? [] : ['className' => AboutUsTable::class];
        $this->AboutUs = $this->getTableLocator()->get('AboutUs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AboutUs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \AdminTheme\Model\Table\AboutUsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
