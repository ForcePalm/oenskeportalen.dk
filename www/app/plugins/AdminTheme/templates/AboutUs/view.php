<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $aboutU
 */
?>
<div class="aboutUs view content">
    <h3><?= h($aboutU->title) ?></h3>
    <table>
        <tr>
            <th><?= __('Titel') ?></th>
            <td><?= h($aboutU->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($aboutU->id) ?></td>
        </tr>
    </table>
    <div class="text">
        <strong><?= __('Indhold') ?></strong>
        <blockquote>
            <?= $this->Text->autoParagraph(h($aboutU->content)); ?>
        </blockquote>
    </div>
</div>

