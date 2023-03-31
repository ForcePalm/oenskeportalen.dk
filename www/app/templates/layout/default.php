<?php
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

    <meta name="description" content="Opdel ønskelister nemt og undgå dobbeltgaver med Ønskeportalen. Opret din gratis ønskeliste i dag og find den helt rigtige gave.">

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="preload" as="font">

    <?= $this->Html->css(['reset', 'normalize.min', 'milligram.min','bootstrap/bootstrap.min', 'cake', 'home', 'core', 'toastr/toastr.min'], ['media' => 'screen']) ?>
    <?= $this->Html->script(['jquery/jquery-3.6.4.min','bootstrap/bootstrap.bundle.min', 'vue/vue.global', 'toastr/toastr.min']) ?>

    <script src="https://kit.fontawesome.com/7a26c8da44.js" crossorigin="anonymous"></script>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->fetch('vendor') ?>
</head>
<body>
    <header class="main-header">
        <nav class="top-nav">
            <div class="top-nav-title">
                <a href="<?= $this->Url->build('/') ?>"><span class="home-link"><img src="<?= $this->Url->image('logo.webp') ?>" width="45px" height="45px" alt="Gave">Ønskeportalen</span></a>
            </div>

            <div class="mobile-menu">
                <span class="fa-solid fa-bars"></span>
            </div>

            <div class="top-nav-links menu-closed">
                <div>
                    <a href="<?= $this->Url->build('/AboutUs') ?>">Om os</a>
                    <?php if ($this->request->getAttribute('identity')) { ?>
                        <a href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'index']) ?>">Min side <?= $test ?></a>
                        <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'edit', $this->request->getAttribute('identity')->get('uuid')]) ?>"><?= $this->request->getAttribute('identity')->get('name') ?></a>
                        <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'logout']) ?>">Log af</a>
                    <?php }else{ ?>
                    <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'login']) ?>">Log ind</a>
                    <?php } ?>
                </div>
                
            </div>
        </nav>
    </header>
    
    <main class="main-content">
        <div class="container-fluid">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
        <a href="<?= $this->Url->build('/') ?>"><span class="home-link">Ønskeportalen</span></a>
        <p>Copyright © <?=  date("Y") ?> Ønskeportalen</p>
        <ul>
            <li><a href="<?= $this->Url->build(['controller' => 'Faq', 'action' => 'index']) ?>">FAQ</a></li>
            <li><a href="<?= $this->Url->build('/AboutUs') ?>">Om os</a></li>
            <li><a href="mailto:noreply.oenskeportalen@gmail.com">Kontakt</a></li>
        </ul>
    </footer>
    
    <!--append scripts-->
    <?= $this->Html->script(['modules/mobile_menu']) ?>
</body>
</html>
