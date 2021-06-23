<?php 
    $this->layout = 'test';
?>

<h1>Inscription</h1>

<div class='formulaire-profil'> 
<?php
    echo $this->form->create($user);
    echo $this->form->control('nom');
    echo $this->form->control('prenom');
    echo $this->form->control('pseudo');
    echo $this->form->control('email');
    echo $this->form->control('password');
    echo $this->form->button('valider');    
    echo $this->form->end();
    echo $this->Html->link('Retour', ['action' => 'login'])
?>
</div>