<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\AboutU> $aboutUs
 */
?>
<div class="content-container about-wrapper">
    <h3 class="default-text-color">Om Os</h3>
    <div class="row">
    <?php foreach ($aboutUs as $aboutU): ?>
        <div class="col-md-6">
            <div class="default-background default-text-color default-border">
                <h4><?= $aboutU->title ?></h4>
                <p><?= $aboutU->content ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

