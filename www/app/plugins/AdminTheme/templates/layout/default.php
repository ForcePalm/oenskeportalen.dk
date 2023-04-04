<?php
use Cake\Core\Configure;
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 * 
 */
$cakeDescription = 'Ønskeportalen: Din online ønskeliste';

?>
<!DOCTYPE html>
<html lang="da">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="preload" as="font">

    <?= $this->Html->css(['reset', 'normalize.min', 'milligram.min','bootstrap/bootstrap.min', 'cake', 'core', 'modules/admin', 'toastr/toastr.min']) ?>
    <?= $this->Html->script(['jquery/jquery-3.6.4.min','bootstrap/bootstrap.bundle.min', 'vue/vue.global', 'toastr/toastr.min']) ?>

    <script src="https://kit.fontawesome.com/7a26c8da44.js" crossorigin="anonymous"></script>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->fetch('vendor') ?>
</head>
<body>
    <!--Get controller name-->
    <?php $c_name = $this->request->getParam('controller'); ?>
    <header class="admin-header">
        <div >
                <a href="<?= $this->Url->build('/admin') ?>"><span><?= ucfirst(Configure::read('name')) ?></span></a>
        </div>
    </header>
    <div class="admin-wrapper">
        <div class="navigator-wrapper">
            <nav class="admin-nav">
                <ul>
                    <li><a class="<?= $c_name == 'Pages'?'admin-active': '' ?>" href="/admin"><span class="fa-solid fa-gauge"></span> Oversigt</a></li>
                    <li><a class="<?= $c_name == 'Users'?'admin-active': '' ?>" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>"><span class="fa-solid fa-circle-user"></span> Brugere</a></li>
                    <li><a class="<?= $c_name == 'Faq'?'admin-active': '' ?>" href="<?= $this->Url->build(['controller' => 'Faq', 'action' => 'index']) ?>"><span class="fa-solid fa-circle-question"></span> FAQ</a></li>
                    <li><a class="<?= $c_name == 'AboutUs'?'admin-active': '' ?>" href="<?= $this->Url->build(['controller' => 'AboutUs', 'action' => 'index']) ?>"><span class="fa-solid fa-circle-info"></span> Om Os</a></li>
                    <li><a class="<?= $c_name == 'Settings'?'admin-active': '' ?>" href="<?= $this->Url->build(['controller' => 'Settings', 'action' => 'index']) ?>"><span class="fa-solid fa-gear"></span> Indstillinger</a></li>
                </ul>
            </nav>
        </div>
        <div class="content-wrapper">
            <main class="admin-main">
                <div class="container-fluid">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div>
            </main>
        </div>


        
    </div>
    <!--append scripts-->
    <?= $this->Html->script(['modules/mobile_menu']) ?>
</body>
</html>