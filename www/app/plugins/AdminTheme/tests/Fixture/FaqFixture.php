<?php
declare(strict_types=1);

namespace AdminTheme\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FaqFixture
 */
class FaqFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'faq';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            ],
        ];
        parent::init();
    }
}
