<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="form-container default-text-color">
    <h3>Tilmelding</h3>
    
    <?= $this->Form->create($user, [
    'class' => 'was-validated'
    ]) ?>
    
    <fieldset>
        
            <?= $this->Form->control('name', [
                'required' => true,
                'label' => 'Navn',
            ]); ?>
            <?= $this->Form->control('email', [
                'required' => true
            ]); ?>
            <?= $this->Form->control('birthday', [
                'type' => 'date',
                'label' => 'Fødselsdag',
                'minYear' => date('Y') - 100, // minimum årstal (her 100 år tilbage)
                'maxYear' => date('Y') - 18, // maksimalt årstal (her 18 år tilbage)
                'required' => true,
                'onfocus' => "this.showPicker()"
            ]); ?>
            <?= $this->Form->control('password', [
                'type' => 'password',
                'required' => true,
            ]); ?>
            <?= $this->Form->control('repeat_password', [
                'type' => 'password',
                'required' => true,
                'label' => 'Gentag Password',
            ]); ?>
            
        
    </fieldset>
    <?= $this->Form->button(__('Tilmeld')) ?>
    <?= $this->Form->end() ?>
    
    <div class="link-container">
        <?= $this->Html->link("Har du allerede en bruger så login her", [
            'action' => 'login',
        ], 
        [
            'class' => 'link',
        ]) ?>
    </div>
    
</div>