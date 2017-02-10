<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li> <h3 style='color:red'> <?= $user_connect->role->typ ?></h3> </li>
        <li> <h3 style='color:green'> <?= $user_connect->name  ?></h3> </li>
        <li class="heading"><?= __('Actions') ?></li>

<!-- Si l'utilisateur connecté est un patient, alors il a le droit de droit d'accéder à ces liens -->
        <?php if ($user_connect->role_id == 1) :?>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
         <?php endif; ?>
        <li><?= $this->Html->link(__('List Commands'), ['controller' => 'Commands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Contributions'), ['controller' => 'Contributions', 'action' => 'index']) ?> </li>

<!--  Un patient ou un contributeur n'a pas le droit d'acccéder à ces liens     -->
       <!-- <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('New Command'), ['controller' => 'Commands', 'action' => 'add']) ?> </li>
        
        <li><?= $this->Html->link(__('New Contribution'), ['controller' => 'Contributions', 'action' => 'add']) ?> </li> -->
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
      <!--  <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->typ, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Surname') ?></th>
            <td><?= h($user->surname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($user->phone) ?></td>
        </tr>

      <!-- çà ne nous sert à rien de voir un mot de passe hashé
       <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($user->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mail') ?></th>
            <td><?= h($user->mail) ?></td>
        </tr>
      
    </table>

<!-- Si l'utilisateur connecté est un patient, alors il a le droit d'accéder à cette partie -->
    <?php if ($user_connect->role_id == 1) :?>
    <div class="related">
        <h4><?= __('Related Commands') ?></h4>
        <?php if (!empty($user->commands)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
<!--  Il n'est pas nécessaire de voir  ces information ici, car on peut les voir dans les détails (view)
             <th scope="col"><?= __('Patient') ?></th>
                <th scope="col"><?= __('Pharmacy Id') ?></th>-->
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Comment') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->commands as $commands): ?>
            <tr>
                <td><?= h($commands->id) ?></td>
<!--  Il n'est pas nécessaire de voir  ces information ici, car on peut les voir dans les détails (view)
                <td><?= h($user->name) ?></td>
                <td><?= h($commands->pharmacy_id) ?></td> -->
                <td><?= h($commands->amount) ?></td>
                <td><?= h($commands->status) ?></td>
                <td><?= h($commands->comment) ?></td>
                <td><?= h($commands->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Commands', 'action' => 'view', $commands->id]) ?>

<!-- Un user ne peut ni Editer ni supprimer une commande
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Commands', 'action' => 'edit', $commands->id]) ?>
                   <?= $this->Form->postLink(__('Delete'), ['controller' => 'Commands', 'action' => 'delete', $commands->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commands->id)]) ?> -->
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <?php endif; ?>

  <!--  <div class="related">
        <h4><?= __('Related Contributions') ?></h4>
        <?php if (!empty($user->contributions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Command Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Comment') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->contributions as $contributions): ?>
            <tr>
                <td><?= h($contributions->id) ?></td>
                <td><?= h($contributions->user_id) ?></td>
                <td><?= h($contributions->command_id) ?></td>
                <td><?= h($contributions->amount) ?></td>
                <td><?= h($contributions->status) ?></td>
                <td><?= h($contributions->comment) ?></td>
                <td><?= h($contributions->created) ?></td>
                <td><?= h($contributions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Contributions', 'action' => 'view', $contributions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Contributions', 'action' => 'edit', $contributions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contributions', 'action' => 'delete', $contributions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contributions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div> -->
</div>
