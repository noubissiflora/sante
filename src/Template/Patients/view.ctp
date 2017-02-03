<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
       <li><?= $this->Html->link(__('Edit Patient'), ['action' => 'edit', $patient->id]) ?> </li>
        <!-- <li><?= $this->Form->postLink(__('Delete Patient'), ['action' => 'delete', $patient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patient->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Patients'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li> -->
        <li><?= $this->Html->link(__('List Commands'), ['controller' => 'Commands', 'action' => 'index']) ?> </li>
         <!-- <li><?= $this->Html->link(__('New Command'), ['controller' => 'Commands', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contributions'), ['controller' => 'Contributions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contribution'), ['controller' => 'Contributions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>-->
    </ul>
</nav>
<div class="patients view large-9 medium-8 columns content">
    <h3><?= h($patient->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $patient->has('role') ? $this->Html->link($patient->role->typ, ['controller' => 'Roles', 'action' => 'view', $patient->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($patient->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Surname') ?></th>
            <td><?= h($patient->surname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($patient->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($patient->country) ?></td>
        </tr>
       <!-- <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($patient->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($patient->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($patient->modified) ?></td>
        </tr>-->
    </table>

      
    
    <div class="related">
        <h4><?= __('Related Commands') ?></h4>
        <?php if (!empty($patient->commands)): ?>
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
            <?php foreach ($patient->commands as $commands): ?>
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
    </div>
    <div class="related">
        <h4><?= __('Related Contributions') ?></h4>
        <?php if (!empty($patient->contributions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Patient Id') ?></th>
                <th scope="col"><?= __('Command Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Comment') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($patient->contributions as $contributions): ?>
            <tr>
                <td><?= h($contributions->id) ?></td>
                <td><?= h($contributions->patient_id) ?></td>
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
    </div>
   <!-- <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($patient->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Patient Id') ?></th>
                <th scope="col"><?= __('Login') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($patient->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->patient_id) ?></td>
                <td><?= h($users->login) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->status) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div> -->
</div>
