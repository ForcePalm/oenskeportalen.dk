<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wish $wish
 */
?>
<div class="form-container default-text-color">
    <?= $this->Flash->render() ?>
    <h3>Nyt Ønske</h3>
    <?= $this->Form->create($wish, [
        'type' => 'file'
    ]) ?>
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
            'label'   => 'Pris',
            'pattern' => '\d*',
        ]) ?>
        <?= $this->Form->control('wish_link', [
            'label' => 'Link',
            'type' => 'url'
        ]) ?>
        <?= $this->Form->control('wish_img', [
            'label' => 'Billede',
            'type' => 'file'
        ]) ?>
        <div id="uploadImg" class="upload-img" style="background-image: url(../../img/<?= $wish->wish_img ? 'uploads/Wishlists/'. $wish->wishlist->uuid . '/' . $wish->wish_img : 'nopic.webp' ?>)"></div>
    </fieldset>
    <?= $this->Form->submit(__('Opdater')); ?>
    <?= $this->Form->end() ?>
</div>
<!--append scripts-->
<?= $this->Html->script(['modules/preview_upload']) ?>
