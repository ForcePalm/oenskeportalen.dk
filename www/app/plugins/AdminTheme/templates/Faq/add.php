<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $faq
 */
?>
<div class="faq form content">
    <?= $this->Form->create($faq) ?>
    <fieldset>
        <h3>Ny FAQ</h3>
        <?php
            echo $this->Form->control('title', ['label' => 'Titel']);
            echo $this->Form->control('content', ['label' => 'Indhold', 'value' => '']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Opret')) ?>
    <?= $this->Form->end() ?>
</div>

