<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <!-- S'il y a un utilisateur connecté, alors il a le droit  d'accéder à ces liens -->
       <?php if ($user_connect->id != null) :?>
       <li> <h3 style='color:red'> <?= $user_connect->role->typ  ?></h3> </li>
       <li> <h3 style='color:green'> <?= $user_connect->name  ?></h3> </li>
        <li class="heading"><?= __('Actions') ?></li>
         <?php endif; ?>

         <li><?= $this->Html->link(__('List Commands'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Contributions'), ['controller' => 'Contributions', 'action' => 'index']) ?> </li>
        
       <!-- Un user n'a pas le droit d'accéder à ces liens
        <li><?= $this->Form->postLink(__('Delete Command'), ['action' => 'delete', $command->id], ['confirm' => __('Are you sure you want to delete # {0}?', $command->id)]) ?> </li>
        <li><?= $this->Html->link(__('Edit Command'), ['action' => 'edit', $command->id]) ?> </li>
        <li><?= $this->Html->link(__('New Command'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacies'), ['controller' => 'Pharmacies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy'), ['controller' => 'Pharmacies', 'action' => 'add']) ?> </li>
        
        <li><?= $this->Html->link(__('New Contribution'), ['controller' => 'Contributions', 'action' => 'add']) ?> </li>
    -->
    </ul>
</nav>
<div class="commands view large-9 medium-8 columns content">
    
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Patient') ?></th>
            <td><?= $command->has('user') ? $this->Html->link($command->user->name, ['controller' => 'Users', 'action' => 'view', $command->user->id]) : '' ?></td>
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
        <tr>
            <th scope="row"><?= __('Reste à Payer') ?></th>
            <td><?= h($rest) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($command->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($command->comment)); ?>
    </div>

<?php if ($command->user->id != $user_connect->id) :?>
    <div class="right">
            <h3 style="background-color:powderblue;">    <?= $this->Html->link(__('Payer'), ['controller' => 'Contributions', 'action' => 'add', $command->id]) ?> 
            </h3>
        </div>
  <?php endif; ?>

<?= $this->Form->end(); ?>
    
 
 <?php if ($user_connect->id != null And $user_connect->role_id == 1  ) :?>
               
    <div class="related">
        <h4><?= __('Related Contributions') ?></h4>
        <?php if (!empty($command->contributions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                
                <th scope="col"><?= __('Contributeur') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Comment') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($command->contributions as $contributions): ?>
            <tr>
               
                <td><?= h($contributions->user_id) ?></td>
                <td><?= h($contributions->amount) ?></td>
                <td><?= h($contributions->status) ?></td>
                <td><?= h($contributions->comment) ?></td>
                <td><?= h($contributions->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Contributions', 'action' => 'view', $contributions->id]) ?>
    <!-- Un user n'a ni le droit de modifier ni le droit de supprimer une commande       
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Contributions', 'action' => 'edit', $contributions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contributions', 'action' => 'delete', $contributions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contributions->id)]) ?> -->
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
<?php endif; ?>


</div>
