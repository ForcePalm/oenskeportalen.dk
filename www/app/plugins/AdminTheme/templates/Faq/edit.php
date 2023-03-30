<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $faq
 */
?>
<div class="faq form content">
    <?= $this->Form->create($faq) ?>
    <fieldset>
        <h3>Rediger FAQ</h3>
        <?php
            echo $this->Form->control('title', ['label' => 'Titel']);
            echo $this->Form->control('content', ['label' => 'Indhold']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Opdater')) ?>
    <?= $this->Form->end() ?>
</div>
