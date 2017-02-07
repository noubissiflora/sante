<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Contribution'), ['action' => 'edit', $contribution->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contribution'), ['action' => 'delete', $contribution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contribution->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contributions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contribution'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Commands'), ['controller' => 'Commands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Command'), ['controller' => 'Commands', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contributions view large-9 medium-8 columns content">
    <h3><?= h($contribution->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $contribution->has('user') ? $this->Html->link($contribution->user->name, ['controller' => 'Users', 'action' => 'view', $contribution->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Command') ?></th>
            <td><?= $contribution->has('command') ? $this->Html->link($contribution->command->id, ['controller' => 'Commands', 'action' => 'view', $contribution->command->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($contribution->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($contribution->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($contribution->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($contribution->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($contribution->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($contribution->comment)); ?>
    </div>
</div>
