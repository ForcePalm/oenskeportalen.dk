<div class="form-container default-text-color">
    <?= $this->Flash->render() ?>
    <h3>Login</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <?= $this->Form->control('email', ['required' => true],) ?>
        <?= $this->Form->control('password', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Login')); ?>
    <?= $this->Form->end() ?>

    <div class="link-container">
        <?= $this->Html->link("Har du ikke en bruger så registrer dig her", [
            'action' => 'register',
        ], 
        [
            'class' => 'link',
        ]) ?>
        
    </div>

    <div class="link-container">
        <?= $this->Html->link("Glemt password ?", [
            'action' => 'forgotLogin',
        ], 
        [
            'class' => 'link',
        ]) ?>
        
    </div>
</div>