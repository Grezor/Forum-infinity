<?php
// Notre page d'accueil de l'administration
$router->get('/admin', 'Admin@home');
// Notre page pour gérer les forums/catégories
$router->get('/admin/forums', 'Admin@forum');
// Ajout d'une catégorie
$router->post('/admin/categories/new', 'Admin@postNewCategory');
// Modification d'une catégorie
$router->post('/admin/categories/:idCategory/edit', 'Admin@postEditCategory');
// Suppression d'une catégorie
$router->post('/admin/categories/:idCategory/remove', 'Admin@postRemoveCategory');
// Ajout d'un forum
$router->post('/admin/forums/new', 'Admin@postNewForum');
// Modification d'un forum
$router->post('/admin/forums/:idForum/edit', 'Admin@postEditForum');
// Suppression d'un forum
$router->post('/admin/forums/:idForum/remove', 'Admin@postRemoveForum');
