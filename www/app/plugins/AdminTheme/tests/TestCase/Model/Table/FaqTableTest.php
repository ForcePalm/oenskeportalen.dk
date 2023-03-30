<?php
declare(strict_types=1);

namespace AdminTheme\Test\TestCase\Model\Table;

use AdminTheme\Model\Table\FaqTable;
use Cake\TestSuite\TestCase;

/**
 * AdminTheme\Model\Table\FaqTable Test Case
 */
class FaqTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \AdminTheme\Model\Table\FaqTable
     */
    protected $Faq;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'plugin.AdminTheme.Faq',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Faq') ? [] : ['className' => FaqTable::class];
        $this->Faq = $this->getTableLocator()->get('Faq', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Faq);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \AdminTheme\Model\Table\FaqTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
