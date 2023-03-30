<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $user
 * @var \Cake\Collection\CollectionInterface|string[] $groups
 */
?>
<div class="users form content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <h3>Ny bruger</h3>
        <?php
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('name', ['label' => 'Navn']);
            echo $this->Form->control('birthday', ['empty' => true, 'label' => 'Fødselsdag']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Opret')) ?>
    <?= $this->Form->end() ?>
</div>

