<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Wish Entity
 *
 * @property int $id
 * @property string $uuid
 * @property int $wishlist_id
 * @property string $wish_name
 * @property string $wish_description
 * @property float $wish_price
 * @property string $wish_link
 * @property string $wish_img
 * @property int $is_reserved
 * @property int|null $reserved_by
 *
 * @property \App\Model\Entity\User $user
 */
class Wish extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'uuid' => true,
        'wishlist_id' => true,
        'wish_name' => true,
        'wish_description' => true,
        'wish_price' => true,
        'wish_link' => true,
        'wish_img' => true,
        'is_reserved' => true,
        'reserved_by' => true,
        'user' => true,
    ];
}
