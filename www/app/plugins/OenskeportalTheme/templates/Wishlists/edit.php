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

use function PHPSTORM_META\type;

?>
<div class="form-container">
    <?= $this->Flash->render() ?>
    <h3>Ændre Ønskeliste</h3>
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
    <?= $this->Form->submit(__('Gem')); ?>
    <?= $this->Form->end() ?>
</div>