<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Command'), ['action' => 'edit', $command->id]) ?> </li>
      
        <li><?= $this->Html->link(__('List Commands'), ['action' => 'index']) ?> </li>
        <!--  <li><?= $this->Form->postLink(__('Delete Command'), ['action' => 'delete', $command->id], ['confirm' => __('Are you sure you want to delete # {0}?', $command->id)]) ?> </li>
        <li><?= $this->Html->link(__('New Command'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacies'), ['controller' => 'Pharmacies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy'), ['controller' => 'Pharmacies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contributions'), ['controller' => 'Contributions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contribution'), ['controller' => 'Contributions', 'action' => 'add']) ?> </li> -->
    </ul>
</nav>
<div class="commands view large-9 medium-8 columns content">
    <h3><?= h($command->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Patient') ?></th>
            <td><?= $command->has('patient') ? $this->Html->link($command->patient->name, ['controller' => 'Patients', 'action' => 'view', $command->patient->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pharmacy') ?></th>
            <td><?= $command->has('pharmacy') ? $this->Html->link($command->pharmacy->name, ['controller' => 'Pharmacies', 'action' => 'view', $command->pharmacy->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($command->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($command->amount) ?></td>
        </tr>
       <!-- <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($command->id) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($command->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($command->modified) ?></td>
        </tr>-->
    </table>
    <div class="row">
        <h4><?= __('Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($command->comment)); ?>
    </div>

    <!-- <?= $this->Form->postButton('Edit Command', ['action' => 'edit', $command->id]) ?> -->
    
    <div class="related">
        <h4><?= __('Related Contributions') ?></h4>
        <?php if (!empty($command->contributions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Patient Id') ?></th>
                <th scope="col"><?= __('Command Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Comment') ?></th>
                <th scope="col"><?= __('Created') ?></th>
               <!-- <th scope="col"><?= __('Modified') ?></th>-->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($command->contributions as $contributions): ?>
            <tr>
                <td><?= h($contributions->id) ?></td>
                <td><?= h($contributions->patient_id) ?></td>
                <td><?= h($contributions->command_id) ?></td>
                <td><?= h($contributions->amount) ?></td>
                <td><?= h($contributions->status) ?></td>
                <td><?= h($contributions->comment) ?></td>
                <td><?= h($contributions->created) ?></td>
               <!-- <td><?= h($contributions->modified) ?></td>-->
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Contributions', 'action' => 'view', $contributions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Contributions', 'action' => 'edit', $contributions->id]) ?>
                   <!-- <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contributions', 'action' => 'delete', $contributions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contributions->id)]) ?>
                </td> -->
            </tr>
            <?php endforeach; ?>
        </table>

        <?php endif; ?>
    </div>
</div>
