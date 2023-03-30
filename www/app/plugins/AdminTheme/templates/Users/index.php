<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $users
 * 
 */
use Cake\I18n\FrozenTime;
?>
<div class="users index content">
    <?= $this->Html->link(__('Ny bruger'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Brugere') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('name', 'Navn') ?></th>
                    <th><?= $this->Paginator->sort('birthday', 'Fødselsdag') ?></th>
                    <th><?= $this->Paginator->sort('created', 'Oprettet') ?></th>
                    <th><?= $this->Paginator->sort('modified', 'Redigeret') ?></th>
                    <th class="actions"><?= __('Handlinger') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->name) ?></td>
                    <td><?= h($user->birthday->format('d/m/Y')) ?></td>
                    <td><?= h($user->created->format('d/m/Y, H:i')) ?></td>
                    <td><?= h($user->modified->format('d/m/Y, H:i')) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Se'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Rediger'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink('Slet', ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
