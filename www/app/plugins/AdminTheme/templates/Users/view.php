<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $user
 */
?>
<div class="users view content">
    <h3><?= h($user->name) ?></h3>
    <table>
        <tr>
            <th><?= __('Uuid') ?></th>
            <td><?= h($user->uuid) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Navn') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Reset Request Token') ?></th>
            <td><?= h($user->reset_request_token) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Fødselsdag') ?></th>
            <td><?= h($user->birthday->format('d/m/Y')) ?></td>
        </tr>
        <tr>
            <th><?= __('Oprettet') ?></th>
            <td><?= h($user->created->format('d/m/Y, H:i')) ?></td>
        </tr>
        <tr>
            <th><?= __('Redigeret') ?></th>
            <td><?= h($user->modified->format('d/m/Y, H:i')) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Groups') ?></h4>
        <?php if (!empty($user->groups)) : ?>
        <div class="table-responsive">
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <th><?= __('Group Name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($user->groups as $groups) : ?>
                <tr>
                    <td><?= h($groups->id) ?></td>
                    <td><?= h($groups->group_name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Groups', 'action' => 'view', $groups->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Groups', 'action' => 'edit', $groups->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Groups', 'action' => 'delete', $groups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $groups->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Shared') ?></h4>
        <?php if (!empty($user->shared)) : ?>
        <div class="table-responsive">
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <th><?= __('Wishlist Id') ?></th>
                    <th><?= __('User Id') ?></th>
                    <th><?= __('Share Token') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($user->shared as $shared) : ?>
                <tr>
                    <td><?= h($shared->id) ?></td>
                    <td><?= h($shared->wishlist_id) ?></td>
                    <td><?= h($shared->user_id) ?></td>
                    <td><?= h($shared->share_token) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Shared', 'action' => 'view', $shared->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Shared', 'action' => 'edit', $shared->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Shared', 'action' => 'delete', $shared->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shared->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Wishlists') ?></h4>
        <?php if (!empty($user->wishlists)) : ?>
        <div class="table-responsive">
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <th><?= __('Uuid') ?></th>
                    <th><?= __('Name') ?></th>
                    <th><?= __('Description') ?></th>
                    <th><?= __('User Id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($user->wishlists as $wishlists) : ?>
                <tr>
                    <td><?= h($wishlists->id) ?></td>
                    <td><?= h($wishlists->uuid) ?></td>
                    <td><?= h($wishlists->name) ?></td>
                    <td><?= h($wishlists->description) ?></td>
                    <td><?= h($wishlists->user_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Wishlists', 'action' => 'view', $wishlists->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Wishlists', 'action' => 'edit', $wishlists->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Wishlists', 'action' => 'delete', $wishlists->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wishlists->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>

