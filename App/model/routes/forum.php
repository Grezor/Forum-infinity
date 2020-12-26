<?php

$router->get('/forums/:idForum', "Forum@topic");

$router->get('/forums/:idForum/topics/:id_topics', 'Forum@post');

$router->post('/forums/:idForum/topics/:idTopic', 'Forum@postPost');

$router->get('/forums/:idForum/newTopic', 'Forum@newTopic');
$router->post('/forums/:idForum/newTopic', 'Forum@postNewTopic');

$router->get('/forums/:idForum/topics/:idTopic/posts/:idPost/update', 'Forum@updatePost');
$router->post('/forums/:idForum/topics/:idTopic/posts/:idPost/update', 'Forum@postUpdatePost');

// Suppression d'un post
$router->post('/forums/:idForum/topics/:idTopic/posts/:idPost/remove', 'Forum@postRemovePost');
