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
                <a href="<?= $this->Url->build(['controller' => 'Shared', 'action' => 'view', $share->uuid]) ?>">
                    <div>
                        <p><?= $share->name ?></p>
                        <p><?= $share->wishes ? $share->wishes[0]->count : '0' ?> ønsker</p>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
