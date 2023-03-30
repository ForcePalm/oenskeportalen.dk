<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $faq
 */
?>
<div class="faq view content">
    <h3><?= h($faq->title) ?></h3>
    <table>
        <tr>
            <th><?= __('Titel') ?></th>
            <td><?= h($faq->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($faq->id) ?></td>
        </tr>
    </table>
    <div class="text">
        <strong><?= __('Indhold') ?></strong>
        <blockquote>
            <?= $this->Text->autoParagraph(h($faq->content)); ?>
        </blockquote>
    </div>
</div>
