<?php
namespace App\View\Helper;

use Cake\View\Helper;

class UsersHelper extends Helper
{
    public function makeEdit()
    {
        $user = $this->Users->find()->where([
            'id' => get_current_user(),
         ])->first();

         return $user;
    }
}