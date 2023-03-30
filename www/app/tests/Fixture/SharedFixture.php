<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SharedFixture
 */
class SharedFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'shared';
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
                'wishlist_id' => 1,
                'user_id' => 1,
                'share_token' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
