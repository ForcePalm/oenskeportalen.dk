<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $user
 * @var string[]|\Cake\Collection\CollectionInterface $groups
 */
?>
<div class="users form content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <h3>Rediger bruger</h3>
        <?php
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('name',['label' => 'Navn']);
            echo $this->Form->control('birthday',['label' => 'Fødselsdag']);
            echo $this->Form->control('groups._ids', ['options' => $groups]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Opdater')) ?>
    <?= $this->Form->end() ?>
</div>
