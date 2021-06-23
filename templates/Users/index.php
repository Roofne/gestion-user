<?php 
    $this->layout = 'test';
?>

<h1>User</h1>

<table>
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Pseudo</th>
        <th>Email</th>
        <th>Password</th>
        <th>Date Création</th>
        <th>Date Modification</th>
    </tr>

    <tr>
        <td>
            <?= $user->nom;?>
        </td>
        <td>
            <?= $user->prenom?>
        </td>
        <td>
            <?= $user->pseudo?>
        </td>
        <td>
            <?= $user->email?>
        </td>
        <td>
            ********
        </td>
        <td>
            <?= $user->created?>
        </td>
        <td>
            <?= $user->modified?>
        </td>
    </tr>
</table>

<p>
    <?= $this->Html->link('Edit', ['action' => 'edit', $user->slug]) ?>
    |
    <?= $this->Html->link('Logout', ['action' => 'logout']) ?>
</p>
