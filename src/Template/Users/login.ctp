<h1>Connexion</h1>
<?= $this->Form->create() ?>
<?= $this->Form->input('phone') ?>
<?= $this->Form->input('password') ?>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>
<?= $this->Html->link(__('Create Account'), ['controller' => 'Users', 'action' => 'add']) ?>