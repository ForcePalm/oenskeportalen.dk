<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\AboutU> $aboutUs
 */
?>
<div class="content-container about-wrapper">
    <h3>Om Os</h3>
    <div class="row">
    <?php foreach ($aboutUs as $aboutU): ?>
        <div class="col-md-6">
            <div>
                <h4><?= $aboutU->title ?></h4>
                <p><?= $aboutU->content ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

