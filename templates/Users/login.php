<?php 
    $this->layout = 'test';
?>

<div class="formulaire-profil">
    <?= $this->Flash->render() ?>
    <h1>Connexion</h1>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __("Veuillez s'il vous plaît entrer votre email et votre mot de passe") ?></legend>
        <?= $this->Form->control('email', ['required' => true]) ?>
        <?= $this->Form->control('password', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Login')); ?>
    <?= $this->Form->end() ?>

    <?= $this->Html->link("Pas inscrit ?", ['action' => 'add']) ?>
</div>