<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $aboutU
 */
?>
<div class="aboutUs form content">
    <?= $this->Form->create($aboutU) ?>
    <fieldset>
        <h3>Ny Om Os</h3>
        <?php
            echo $this->Form->control('title', ['label' => 'Titel']);
            echo $this->Form->control('content', ['label' => 'indhold', 'value' => '']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Opret')) ?>
    <?= $this->Form->end() ?>
</div>

