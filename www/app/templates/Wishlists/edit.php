<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wishlist $wishlist
 */
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wish $wish
 */
?>
<div class="form-container default-text-color">
    <?= $this->Flash->render() ?>
    <h3>Ændre Ønskeliste</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <?= $this->Form->control('name', [
            'required' => true,
            'label' => 'Ønskelistenavn',
            'value' => $wishlist->name,
            ]) ?>
        <?= $this->Form->control('description', [
            'type'     => 'textarea',
            'required' => true,
            'label' => 'Beskrivelse',
            'value' => $wishlist->description,
            ]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Gem')); ?>
    <?= $this->Form->end() ?>
</div>