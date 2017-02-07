<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Contribution'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Commands'), ['controller' => 'Commands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Command'), ['controller' => 'Commands', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contributions index large-9 medium-8 columns content">
    <h3><?= __('Contributions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('command_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contributions as $contribution): ?>
            <tr>
                <td><?= $this->Number->format($contribution->id) ?></td>
                <td><?= $contribution->has('user') ? $this->Html->link($contribution->user->name, ['controller' => 'Users', 'action' => 'view', $contribution->user->id]) : '' ?></td>
                <td><?= $contribution->has('command') ? $this->Html->link($contribution->command->id, ['controller' => 'Commands', 'action' => 'view', $contribution->command->id]) : '' ?></td>
                <td><?= $this->Number->format($contribution->amount) ?></td>
                <td><?= h($contribution->status) ?></td>
                <td><?= h($contribution->created) ?></td>
                <td><?= h($contribution->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $contribution->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contribution->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contribution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contribution->id)]) ?>
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
