<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wishlist $wishlist
 */
?>
<div class="form-container default-text-color">
    <?= $this->Flash->render() ?>
    <h3>Ny Ønskeliste</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <?= $this->Form->control('name', [
            'required' => true,
            'label' => 'Ønskelistenavn'
            ]) ?>
        <?= $this->Form->control('description', [
            'type'     => 'textarea',
            'required' => true,
            'label' => 'Beskrivelse'
            ]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Opret')); ?>
    <?= $this->Form->end() ?>
</div>
