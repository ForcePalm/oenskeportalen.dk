<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Wish> $wishes
 */
?>
<div class="wishes index content">
    <?= $this->Html->link(__('New Wish'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Wishes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('uuid') ?></th>
                    <th><?= $this->Paginator->sort('wishlist_uuid') ?></th>
                    <th><?= $this->Paginator->sort('wish_name') ?></th>
                    <th><?= $this->Paginator->sort('wish_price') ?></th>
                    <th><?= $this->Paginator->sort('wish_link') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($wishes as $wish): ?>
                <tr>
                    <td><?= $this->Number->format($wish->id) ?></td>
                    <td><?= h($wish->uuid) ?></td>
                    <td><?= $this->Number->format($wish->wishlist_uuid) ?></td>
                    <td><?= h($wish->wish_name) ?></td>
                    <td><?= $this->Number->format($wish->wish_price) ?></td>
                    <td><?= h($wish->wish_link) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $wish->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $wish->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $wish->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wish->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
