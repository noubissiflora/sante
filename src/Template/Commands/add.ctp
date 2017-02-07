<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Commands'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacies'), ['controller' => 'Pharmacies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy'), ['controller' => 'Pharmacies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contributions'), ['controller' => 'Contributions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contribution'), ['controller' => 'Contributions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="commands form large-9 medium-8 columns content">
    <?= $this->Form->create($command) ?>
    <fieldset>
        <legend><?= __('Add Command') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('pharmacy_id', ['options' => $pharmacies]);
            echo $this->Form->input('amount');
            echo $this->Form->input('status');
            echo $this->Form->input('comment');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
