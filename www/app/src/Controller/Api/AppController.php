<?php
namespace App\Controller\Api;
class AppController extends \App\Controller\AppController

{


public function initialize(): void
{
    parent::initialize();
    $this->viewBuilder()->setOption('serialize', true);
}

}