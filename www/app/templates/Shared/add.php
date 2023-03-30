<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shared $shared
 * @var \Cake\Collection\CollectionInterface|string[] $wishlists
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Shared'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="shared form content">
            <?= $this->Form->create($shared) ?>
            <fieldset>
                <legend><?= __('Add Shared') ?></legend>
                <?php
                    echo $this->Form->control('wishlist_id', ['options' => $wishlists]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
