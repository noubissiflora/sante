<?php
/**
  * @var \App\View\AppView $this
  */
?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li> <h3 style='color:red'> <?= $user->role->typ ?></h3> </li>
        <li> <h3 style='color:green'> <?= $user->name  ?></h3> </li>
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pharmacies'), ['controller' => 'Pharmacies', 'action' => 'index']) ?></li>
        <!--
        <li><?= $this->Html->link(__('New Command'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy'), ['controller' => 'Pharmacies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contributions'), ['controller' => 'Contributions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contribution'), ['controller' => 'Contributions', 'action' => 'add']) ?></li> -->
    </ul>
</nav>
<div class="commands index large-9 medium-8 columns content">
    <h3><?= __('Commands') ?></h3>
    <table cellpadding="0" cellspacing="0" >
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pharmacy_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commands as $command): ?>
            <tr>
                <td><?= $this->Number->format($command->id) ?></td>
                <td><?= $command->has('user') ? $this->Html->link($command->user->name, ['controller' => 'Users', 'action' => 'view', $command->user->id]) : '' ?></td>
                <td><?= $command->has('pharmacy') ? $this->Html->link($command->pharmacy->name, ['controller' => 'Pharmacies', 'action' => 'view', $command->pharmacy->id]) : '' ?></td>
                <td><?= $this->Number->format($command->amount) ?></td>
                <td><?= h($command->status) ?></td>
                <td><?= h($command->created) ?></td>
                <td><?= h($command->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $command->id]) ?>
                  <!--   <?= $this->Html->link(__('Edit'), ['action' => 'edit', $command->id]) ?>
                   <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $command->id], ['confirm' => __('Are you sure you want to delete # {0}?', $command->id)]) ?>
              -->
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>


