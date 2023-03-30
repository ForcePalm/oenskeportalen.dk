<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Wishlist> $wishlists
 */
?>
<div class="content-container dashboard-wrapper">
    <h3>Dine Ønskelister</h3>
    <div>
        <div class="row dashboard-header">
            <h4 class="col">Dine ønskelister</h4>
            <div class="col options-header">
                <a href="wishlists/add">Opret ønskeliste<span class="fa-solid fa-plus fa-xl"></span></a>                
            </div>
        </div>
        <div class="row">
        <?php foreach ($wishlists as $list) : ?>
            <div class="col-md-3">
                <a href="<?= $this->Url->build(['controller' => 'wishlists', 'action' => 'view', $list->uuid]) ?>">
                    <div>
                        <p><?= $list->name ?></p>
                        <p>Ønsker: <?= $list->wishes ? $list->wishes[0]->count : '0' ?></p>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>