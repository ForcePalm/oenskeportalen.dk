<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wish $wish
 */
?>
<div class="form-container">
    <?= $this->Flash->render() ?>
    <h3>Nyt Ønske</h3>
    <?= $this->Form->create($wish) ?>
    <fieldset>
        <?= $this->Form->control('wish_name', [
            'required' => true,
            'label' => 'Ønske',
        ]) ?>
        <?= $this->Form->control('wish_description', [
            'type' => 'textarea',
            'label' => 'Beskrivelse'
        ]) ?>
         <?= $this->Form->control('wish_price', [
            'label' => 'Pris'
        ]) ?>
        <?= $this->Form->control('wish_link', [
            'label' => 'Link',
            'type' => 'url'
        ]) ?>
        <?= $this->Form->control('wish_img', [
            'label' => 'Billede',
            'type' => 'file'
        ]) ?>
        <div id="uploadImg" class="upload-img" style="background-image: url(https://www.komplett.dk/img/p/800/1111557_2.jpg)"></div>
    </fieldset>
    <?= $this->Form->submit(__('Opret')); ?>
    <?= $this->Form->end() ?>
</div>
<!--append scripts-->
<?= $this->Html->script(['modules/preview_upload']) ?>
