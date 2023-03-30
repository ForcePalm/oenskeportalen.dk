<?php
declare(strict_types=1);

namespace OenskeportalTheme\Model\Entity;

use Cake\ORM\Entity;

/**
 * Wishlist Entity
 *
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $description
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Shared[] $shared
 * @property \App\Model\Entity\Wish[] $wishes
 */
class Wishlist extends Entity
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
        'name' => true,
        'description' => true,
        'user_id' => true,
        'user' => true,
        'shared' => true,
        'wishes' => true,
    ];
}
