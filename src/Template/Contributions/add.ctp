<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        
        <li> <h3 style='color:red'> <?= $user->role->typ  ?></h3> </li>
        <li> <h3 style='color:green'> <?= $user->name  ?></h3> </li>
        <li class="heading"><?= __('Actions') ?></li>
        
        <li><?= $this->Html->link(__('List Commands'), ['controller' => 'Commands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Contributions'), ['action' => 'index']) ?></li>
       <!-- 
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('New Command'), ['controller' => 'Commands', 'action' => 'add']) ?></li> -->
    </ul>
</nav>
<div class="contributions form large-9 medium-8 columns content">
    
    <fieldset>
        <legend><?= __('Add Contribution') ?></legend>
        
         <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Patient') ?></th>
            <td><?= h($command->user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pharmacy') ?></th>
            <td><?= h($command->pharmacy->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= h($command->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($command->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remaining Amount') ?></th>
            <td><?= h($rest) ?></td>
        </tr>
        
    </table>
    <?= $this->Form->create($contribution) ?>

        <?php
            echo $this->Form->input('amount');
            echo $this->Form->input('card');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
