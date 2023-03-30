<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Shared> $shared
 */
?>
<div class="content-container dashboard-wrapper">
    <h3>Delte Ønskelister</h3>
    <div>
        <div class="row dashboard-header">
            <h4 class="col">Delte ønskelister</h4>
        </div>
        <div class="row">
        <?php foreach ($shared as $share) : ?>
            <div class="col-md-3">
                <a href="<?= $this->Url->build(['controller' => 'Shared', 'action' => 'view', $share->wishlists[0]->uuid]) ?>">
                    <div>
                        <p><?= $share->wishlists[0]->name ?></p>
                        <p><?= $share->wishlists[0]->wishes ? $share->wishlists[0]->wishes[0]->count : '0' ?> ønsker</p>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
