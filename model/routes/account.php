<?php
// Inscription
$router->get('/register', 'Account@register');
$router->post('/register', 'Account@postRegister');
// connexion
$router->get('/login', 'Account@login');
$router->post('/login', 'Account@postLogin');
// Vérification de l'adresse mail
$router->get('/verify/:id-:token', 'Account@checkMail');
// Déconnexion
$router->get('/logout', 'Account@logout');