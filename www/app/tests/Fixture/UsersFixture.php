<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'name' => 'Lorem ipsum dolor sit amet',
                'birthday' => '2023-03-27',
                'reset_request_token' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-03-27 08:38:48',
                'modified' => '2023-03-27 08:38:48',
            ],
        ];
        parent::init();
    }
}
