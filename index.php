<?php
require 'vendor/autoload.php';


$router = new App\Router\Router($_GET['url']);

// $router->get('/', "home@show");
// $router->get('/inscription', "auth@show");
// $router->get('/connexion', 'auth@show');
// $router->get('/topics', '')


$router->get('/posts', function(){ echo 'tous les articles'; });
$router->get('/posts/:id-slug-', function($id, $slug) use ($router){ echo $router->url('posts.show', ['id' => 1, 'slug' => 'salut-les-gens']);}, 'post.show')->with('id', '[0-9]+')->with('slug', '[a-z\-0-9]+');
$router->get('/articles/:id', "Post@show");
$router->get('/posts/:id', function($id){ 
    ?>
    <form action="" method="POST">
        <input type="text" name="name">
        <button type="submit">Envoyer</button>
    </form>

    <?php

 });
$router->post('/posts/:id', function($id){ echo 'afficher l\'article' . $id . '<pre>' . print_r($_POST). '</pre>'; });

$router->run();