<?php
// src/Model/Entity/Article.php
namespace OenskeportalTheme\Model\Entity;

use Cake\ORM\Entity;

class Groups extends Entity
{
    protected $_accessible = [
        '*' => true,
        'group_name' => false,
    ];
}