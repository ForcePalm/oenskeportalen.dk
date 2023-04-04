<div class="form-container default-text-color">
    <?= $this->Flash->render() ?>
    <h3>Nulstil Adgangskode</h3>
    <p>Du modtager en mail med et link til at nulstille din adgangskode</p>
    <?= $this->Form->create() ?>
    <fieldset>
        <?= $this->Form->control('email', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Send')); ?>
    <?= $this->Form->end() ?>

    <div class="link-container">
        <?= $this->Html->link("Har du ikke en bruger så registrer dig her", [
            'action' => 'add',
        ], 
        [
            'class' => 'link',
        ]) ?>
        
    </div>

    <div class="link-container">
        <?= $this->Html->link("Har du allerede en bruger så login her", [
            'action' => 'login',
        ], 
        [
            'class' => 'link',
        ]) ?>
        
    </div>
</div>