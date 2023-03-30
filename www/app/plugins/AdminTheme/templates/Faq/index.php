<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $faq
 */
?>
<div class="faq index content">
    <?= $this->Html->link(__('Ny Faq'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('FAQ') ?></h3>
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
                <?php foreach ($faq as $faq): ?>
                <tr>
                    <td><?= $this->Number->format($faq->id) ?></td>
                    <td><?= h($faq->title) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Se'), ['action' => 'view', $faq->id]) ?>
                        <?= $this->Html->link(__('Rediger'), ['action' => 'edit', $faq->id]) ?>
                        <?= $this->Form->postLink(__('Slet'), ['action' => 'delete', $faq->id], ['confirm' => __('Are you sure you want to delete # {0}?', $faq->id)]) ?>
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
