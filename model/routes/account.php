<?php
// Inscription
$router->get('/register', 'Account\\Account@register');
$router->post('/register', 'Account\\Account@postRegister');
// connexion
$router->get('/login', 'Account\\Account@login');
$router->post('/login', 'Account\\Account@postLogin');
// Vérification de l'adresse mail
$router->get('/verify/:id-:token', 'Account\\Account@checkMail');
// Déconnexion
$router->get('/logout', 'Account\\Account@logout');