<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shared $shared
 * @var string[]|\Cake\Collection\CollectionInterface $wishlists
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $shared->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $shared->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Shared'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="shared form content">
            <?= $this->Form->create($shared) ?>
            <fieldset>
                <legend><?= __('Edit Shared') ?></legend>
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
