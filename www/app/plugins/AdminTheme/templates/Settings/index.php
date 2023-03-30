<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $settings
 */
?>
<div class="settings index content">
    <?= $this->Html->link(__('Ny side'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3>Indstillinger</h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('site_name', 'Hjemmeside Titel') ?></th>
                    <th><?= $this->Paginator->sort('site_description', 'Hjemmeside beskrivelse') ?></th>
                    <th><?= $this->Paginator->sort('site_logo', 'Logo') ?></th>
                    <th class="actions">Handlinger</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($settings as $setting): ?>
                <tr>
                    <td><?= $this->Number->format($setting->id) ?></td>
                    <td><?= h($setting->site_name) ?></td>
                    <td><?= h($setting->site_description) ?></td>
                    <td><?= h($setting->site_logo) ?><img src="../img/uploads/Settings/<?= $setting->site_logo?>" alt="logo"></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Se'), ['action' => 'view', $setting->id]) ?>
                        <?= $this->Html->link(__('Rediger'), ['action' => 'edit', $setting->id]) ?>
                        <?= $this->Form->postLink(__('Slet'), ['action' => 'delete', $setting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $setting->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Første')) ?>
            <?= $this->Paginator->prev('< ' . __('Tidligere')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Næste') . ' >') ?>
            <?= $this->Paginator->last(__('Sidste') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Side {{page}} af {{pages}}, viser {{current}} record(s) ud af {{count}} total')) ?></p>
    </div>
</div>
