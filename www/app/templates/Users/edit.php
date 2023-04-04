<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="form-container default-text-color">
    <h3>Rediger bruger</h3>
    <?= $this->Form->create($user, [
    'class' => 'was-validated'
    ]) ?>
    <fieldset>
        <?= $this->Form->control('name', [
            'required' => true,
            'label'    => 'Navn',
            ]); ?>
        <?= $this->Form->control('email', [
            'required' => true,
        ]); ?>
        <?= $this->Form->control('birthday', [
            'type'     => 'date',
            'label'    => 'Fødselsdato',
            'minYear'  => date('Y') - 100, // minimum årstal (her 100 år tilbage)
            'maxYear'  => date('Y') - 18, // maksimalt årstal (her 18 år tilbage)
            'required' => true,
            'onfocus'  => "this.showPicker()",
        ]); ?>
        <?= $this->Form->control('password', [
            'value'    => '',
            'required' => false,
        ]); ?>
    </fieldset>
    <?= $this->Form->button(__('Gem')) ?>
    <?= $this->Form->end() ?>
    <br>
    <?= $this->Form->postLink(__('Slet profil'), ['action' => 'delete', $user->uuid],['class' => 'btn btn-danger text-white w-100'], ['confirm' => __('Er du helt sikker på at du ønsker at slette din bruger?')]) ?>
</div>
