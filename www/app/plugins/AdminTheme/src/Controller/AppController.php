<?php
declare(strict_types=1);

namespace AdminTheme\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // for all controllers in our application, make index and view
        // actions public, skipping the authentication check
        $this->loadModel('Users');

        $user = $this->Users->find()->contain([
            'Groups'
        ])->where([
            'id' => $this->request->getAttribute('identity')->getIdentifier(),
        ])->first();
        if($user->groups[0]->id != 2){
            $this->redirect(['plugin' => null]);
        }
    }
}
