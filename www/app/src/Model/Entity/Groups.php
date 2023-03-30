<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Groups extends Entity
{
    protected $_accessible = [
        '*' => true,
        'group_name' => false,
    ];
}