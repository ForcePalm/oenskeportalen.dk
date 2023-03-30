<?php
declare(strict_types=1);

namespace OenskeportalTheme\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use OenskeportalTheme\Model\Table\FaqTable;

/**
 * OenskeportalTheme\Model\Table\FaqTable Test Case
 */
class FaqTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \OenskeportalTheme\Model\Table\FaqTable
     */
    protected $Faq;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'plugin.OenskeportalTheme.Faq',
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
     * @uses \OenskeportalTheme\Model\Table\FaqTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
