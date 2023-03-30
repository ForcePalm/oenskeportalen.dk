<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FaqTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FaqTable Test Case
 */
class FaqTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FaqTable
     */
    protected $Faq;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Faq',
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
     * @uses \App\Model\Table\FaqTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
