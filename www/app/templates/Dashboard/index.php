<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Wishlist> $wishlists
 * @var iterable<\App\Model\Entity\Shared> $shared
 */

?>
<div class="content-container dashboard-wrapper">
    <h3>Dashboard</h3>
    <div>
        <div class="row dashboard-header">
            <h4 class="col">Dine seneste ønskelister</h4>
            <div class="col options-header">
                <a href="<?= $this->Url->build(['controller' => 'Wishlists', 'action' => 'index']) ?> ">Vis alle</a>                
            </div>
        </div>
        <div class="row">
            <?php foreach ($wishlists as $list) : ?>
            <div class="col-md-3">
                <a href="<?= $this->Url->build(['controller' => 'Wishlists', 'action' => 'view', $list->uuid]) ?>">
                    <div>
                        <p><?= $list->name ?></p>
                        <p>Ønsker: <?= $list->wishes ? $list->wishes[0]->count: '0' ?></p>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
            <div class="col-md-3">
                <a href="<?= $this->Url->build(['controller' => 'Wishlists', 'action' => 'add']) ?>">
                    <div>
                        <span class="fa-solid fa-plus new-wishlist"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div>
        <div class="row dashboard-header">
            <h4 class="col">Ønskelister delt med mig</h4>
            <div class="col options-header">
                <a href="<?= $this->Url->build(['controller' => 'Shared', 'action' => 'index']) ?> ">Vis alle</a>                
            </div>
        </div>
        <div class="row">
            <?php foreach ($shared as $share) :?>
            <div class="col-md-3">
                <a href="<?= $this->Url->build(['controller' => 'Shared', 'action' => 'view', $share->uuid]) ?>">
                    <div>
                        <p><?= $share->name ?></p>
                        <p>Ønsker: <?= $share->wishes ? $share->wishes[0]->count : '0' ?></p>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>