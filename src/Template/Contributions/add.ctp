<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Contributions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Commands'), ['controller' => 'Commands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Command'), ['controller' => 'Commands', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contributions form large-9 medium-8 columns content">
    <?= $this->Form->create($contribution) ?>
    <fieldset>
        <legend><?= __('Add Contribution') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('command_id', ['options' => $commands]);
            echo $this->Form->input('amount');
            echo $this->Form->input('status');
            echo $this->Form->input('comment');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
