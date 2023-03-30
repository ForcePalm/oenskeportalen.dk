<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        $this->loadComponent('FormProtection');
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // for all controllers in our application, make index and view
        // actions public, skipping the authentication check

        //$this->viewBuilder()->setTheme('OenskeportalTHeme');
    }

    public function getCurrentUser()
    {
        return $this->request->getAttribute('identity')->getIdentifier();
    }

    public function upload($file, $path){
        //Checks if folder exists, else it makes a folder
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        //Path to upload folder
        $targetPath = $path . DS;
        
        //Gets the file type
        $fileExtension = trim(substr($file->getclientMediaType(), strpos($file->getclientMediaType(), '/') + 1));

        //Random string
        $i = 20;
        $randomString = bin2hex(random_bytes($i));

        $fileName = $randomString . '.' . $fileExtension;

        $targetFile = $targetPath . $fileName;
        if ($file->getError() === UPLOAD_ERR_OK) {
            if(move_uploaded_file($file->getStream()->getMetadata('uri'), $targetFile)) {
                return $fileName;
            } else {
                $this->Flash->error(__('Kunne ikke upload billedet. Prøv venligst igen.'));
            }
        } else {
            $this->Flash->error(__('Der skete en fejl. Prøv venligst igen.'));        
        }
    }
}