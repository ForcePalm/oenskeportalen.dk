<div class="form-container">
    <?= $this->Flash->render() ?>
    <h3>Nulstill adgangkode</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <?= $this->Form->control('password', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Skift Password')); ?>
    <?= $this->Form->end() ?>
</div>