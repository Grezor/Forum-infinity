<?php
use App\Controller\Account\AccountController;
use App\Controller\Database\DatabaseController;

$user = new AccountController(DatabaseController::getPDO());
$user->postRegister();
?>

<form action="/login" method="POST">
    <label for="username">Nom d'utilisateur</label>
    <input type="text" name="username" id="username">
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password">
    <button type="submit" class="btn btn-primary">se connecter</button>
</form>
