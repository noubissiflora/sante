<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <!-- On affiche le role de lutilisateur connecté-->
        <li> <h3 style='color:red'> <?= $user_connect->role->typ ?></h3> </li>
        <li> <h3 style='color:green'> <?= $user_connect->name ?></h3> </li>
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Contributions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Commands'), ['controller' => 'Commands', 'action' => 'index']) ?> </li>
<!-- Un user n'a pas le roit d'accéder aux liens ci-dessus
        <li><?= $this->Html->link(__('Edit Contribution'), ['action' => 'edit', $contribution->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contribution'), ['action' => 'delete', $contribution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contribution->id)]) ?> </li>
        <li><?= $this->Html->link(__('New Contribution'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('New Command'), ['controller' => 'Commands', 'action' => 'add']) ?> </li> -->
    </ul>
</nav>
<div class="contributions view large-9 medium-8 columns content">
    <!-- <h3><?= h($contribution->id) ?></h3>-->
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Patient') ?></th>
            <td><?= $contribution->has('user') ? $this->Html->link($command->user->name, ['controller' => 'Users', 'action' => 'view', $command->user_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Command') ?></th>
            <td><?= $contribution->has('command') ? $this->Html->link($contribution->command->id, ['controller' => 'Commands', 'action' => 'view', $contribution->command->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount Command') ?></th>
            <td><?= $this->Number->format($command->amount) ?></td>
        </tr>
         <tr>
            <th scope="row"><?= __('Remaining Amount') ?></th>
            <td><?= $this->Number->format($rest) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($contribution->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount Contribution') ?></th>
            <td><?= $this->Number->format($contribution->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($contribution->created) ?></td>
        </tr>
        
    </table>
    <div class="row">
        <h4><?= __('Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($contribution->comment)); ?>
    </div>
</div>
