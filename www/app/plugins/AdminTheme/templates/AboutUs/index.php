<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $aboutUs
 */
?>
<div class="aboutUs index content">
    <?= $this->Html->link(__('Ny om os'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Om Os') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title', 'Titel') ?></th>
                    <th class="actions"><?= __('Handlinger') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($aboutUs as $aboutU): ?>
                <tr>
                    <td><?= $this->Number->format($aboutU->id) ?></td>
                    <td><?= h($aboutU->title) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Se'), ['action' => 'view', $aboutU->id]) ?>
                        <?= $this->Html->link(__('Rediger'), ['action' => 'edit', $aboutU->id]) ?>
                        <?= $this->Form->postLink(__('Slet'), ['action' => 'delete', $aboutU->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aboutU->id)]) ?>
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
