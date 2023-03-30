<?php
declare(strict_types=1);

namespace OenskeportalTheme\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * WishesFixture
 */
class WishesFixture extends TestFixture
{
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
                'uuid' => 'Lorem ipsum dolor sit amet',
                'wishlist_id' => 1,
                'wish_name' => 'Lorem ipsum dolor sit amet',
                'wish_description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'wish_price' => 1,
                'wish_link' => 'Lorem ipsum dolor sit amet',
                'wish_img' => 'Lorem ipsum dolor sit amet',
                'is_reserved' => 1,
                'reserved_by' => 1,
            ],
        ];
        parent::init();
    }
}
