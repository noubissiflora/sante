<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <!--<li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $command->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $command->id)]
            )
        ?></li>-->
        <li><?= $this->Html->link(__('List Commands'), ['action' => 'index']) ?></li>
        <!-- <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacies'), ['controller' => 'Pharmacies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy'), ['controller' => 'Pharmacies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contributions'), ['controller' => 'Contributions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contribution'), ['controller' => 'Contributions', 'action' => 'add']) ?></li> -->
    </ul>
</nav>
<div class="commands form large-9 medium-8 columns content">
    <?= $this->Form->create($command) ?>
    <fieldset>
        <legend><?= __('Edit Command') ?></legend>
        <?php

            echo $this->Form->input('patient_id', ['options' => $patients]);
            echo $this->Form->input('pharmacy_id', ['options' => $pharmacies]);
            echo $this->Form->input('amount',['readonly'=>'true']);
            echo $this->Form->input('status' ,['readonly'=>'true']);
           
            echo $this->Form->input('comment');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
