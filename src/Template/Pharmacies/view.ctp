<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <!--<li><?= $this->Html->link(__('Edit Pharmacy'), ['action' => 'edit', $pharmacy->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pharmacy'), ['action' => 'delete', $pharmacy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacy->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('New Command'), ['controller' => 'Commands', 'action' => 'add']) ?> </li> -->
        <li><?= $this->Html->link(__('List Commands'), ['controller' => 'Commands', 'action' => 'index']) ?> </li>
        
    </ul>
</nav>
<div class="pharmacies view large-9 medium-8 columns content">
    <h3><?= h($pharmacy->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($pharmacy->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($pharmacy->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($pharmacy->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($pharmacy->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Responsible 1') ?></th>
            <td><?= h($pharmacy->responsible_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Responsible 2') ?></th>
            <td><?= h($pharmacy->responsible_2) ?></td>
        </tr>
       <!-- <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pharmacy->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($pharmacy->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($pharmacy->modified) ?></td>
        </tr> -->
    </table>
  <!--  <div class="related">
        <h4><?= __('Related Commands') ?></h4>
        <?php if (!empty($pharmacy->commands)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Patient Id') ?></th>
                <th scope="col"><?= __('Pharmacy Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Comment') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pharmacy->commands as $commands): ?>
            <tr>
                <td><?= h($commands->id) ?></td>
                <td><?= h($commands->patient_id) ?></td>
                <td><?= h($commands->pharmacy_id) ?></td>
                <td><?= h($commands->amount) ?></td>
                <td><?= h($commands->status) ?></td>
                <td><?= h($commands->comment) ?></td>
                <td><?= h($commands->created) ?></td>
                <td><?= h($commands->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Commands', 'action' => 'view', $commands->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Commands', 'action' => 'edit', $commands->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Commands', 'action' => 'delete', $commands->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commands->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div> -->
</div>
