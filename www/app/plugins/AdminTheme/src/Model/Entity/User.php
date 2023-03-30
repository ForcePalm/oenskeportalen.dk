<?php
declare(strict_types=1);

namespace AdminTheme\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string|null $uuid
 * @property string $email
 * @property string $password
 * @property string|null $name
 * @property \Cake\I18n\FrozenDate|null $birthday
 * @property string|null $reset_request_token
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \AdminTheme\Model\Entity\Shared[] $shared
 * @property \AdminTheme\Model\Entity\Wishlist[] $wishlists
 * @property \AdminTheme\Model\Entity\Group[] $groups
 */
class User extends Entity
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
        'email' => true,
        'password' => true,
        'name' => true,
        'birthday' => true,
        'reset_request_token' => true,
        'created' => true,
        'modified' => true,
        'shared' => true,
        'wishlists' => true,
        'groups' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];
}
