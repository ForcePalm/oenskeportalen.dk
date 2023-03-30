<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $setting
 */
?>
<div class="settings form content">
    <?= $this->Form->create($setting, [
        'type' => 'file',
    ]) ?>
    <fieldset>
        <h3>Indstillinger</h3>
        <?php
            echo $this->Form->control('site_name', ['label' => 'Hjemmeside Navn']);
            echo $this->Form->control('site_description', ['label' => 'Hjemmeside beskrivelse', 'type' => 'textarea']);
            echo $this->Form->control('site_logo', ['label' => 'Logo', 'type' => 'file', 'required' => false]);
        ?>
    </fieldset>
    <img id="uploadImg" alt="logo" class="hidden">
    <?= $this->Form->button(__('Opret')) ?>
    <?= $this->Form->end() ?>
</div>
<?= $this->Html->script(['modules/preview_upload']) ?>
