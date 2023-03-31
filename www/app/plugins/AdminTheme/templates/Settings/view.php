<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $setting
 */
?>
<div class="settings view content">
    <h3>Indstillinger</h3>
    <table>
        <tr>
            <th><?= __('Hjemmeside Navn') ?></th>
            <td><?= h($setting->site_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Hjemmeside Beskrivelse') ?></th>
            <td><?= h($setting->site_description) ?></td>
        </tr>
        <tr>
            <th><?= __('Logo') ?></th>
            <td><?= h($setting->site_logo) ?><img src="../../../img/uploads/Settings/<?= $setting->site_logo ?>" alt="logo"></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($setting->id) ?></td>
        </tr>
    </table>
</div>

