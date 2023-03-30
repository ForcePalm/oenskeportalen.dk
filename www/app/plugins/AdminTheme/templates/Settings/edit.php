<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $setting
 */
?>
<div class="settings form content">
    <?= $this->Form->create($setting,[
        'type' => 'file',
    ]) ?>
    <fieldset>
        <h3>Rediger Indstillinger</h3>
        <?php
            echo $this->Form->control('site_name', ['label' => 'Hjememside Navn']);
            echo $this->Form->control('site_description', ['label' => 'Hjememside Beskrivelse']);
            echo $this->Form->control('site_logo', ['label' => 'Logo', 'type' => 'file']);
        ?>
    </fieldset>
    <?php 
        if($setting->site_logo){
            ?>
                <img id="uploadImg" src="../../../img/<?= $setting->site_logo ?>" alt="logo">
            <?php
        }else{
            ?>
                <img class="hidden" id="uploadImg" alt="logo">
            <?php
        }
    ?>
    
    <?= $this->Form->button(__('Opdater')) ?>
    <?= $this->Form->end() ?>
</div>
<?= $this->Html->script(['modules/preview_upload']) ?>

