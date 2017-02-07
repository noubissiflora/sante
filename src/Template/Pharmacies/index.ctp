<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        
       <li><?= $this->Html->link(__('List Commands'), ['controller' => 'Commands', 'action' => 'index']) ?></li>
       <!--  <li><?= $this->Html->link(__('New Pharmacy'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('New Command'), ['controller' => 'Commands', 'action' => 'add']) ?></li>-->
    </ul>
</nav>
<div class="pharmacies index large-9 medium-8 columns content">
    <h3><?= __('Pharmacies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                 <!--<th scope="col"><?= $this->Paginator->sort('id') ?></th>-->
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
               <!-- <th scope="col"><?= $this->Paginator->sort('responsible_1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('responsible_2') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>-->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pharmacies as $pharmacy): ?>
            <tr>
               <!-- <td><?= $this->Number->format($pharmacy->id) ?></td> -->
                <td><?= h($pharmacy->name) ?></td>
                <td><?= h($pharmacy->address) ?></td>
                <td><?= h($pharmacy->phone) ?></td>
                <td><?= h($pharmacy->email) ?></td>
                <!-- <td><?= h($pharmacy->responsible_1) ?></td>
                <td><?= h($pharmacy->responsible_2) ?></td>
                <td><?= h($pharmacy->created) ?></td>
                <td><?= h($pharmacy->modified) ?></td>-->
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pharmacy->id]) ?>
                    <!-- <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pharmacy->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pharmacy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacy->id)]) ?>-->
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
