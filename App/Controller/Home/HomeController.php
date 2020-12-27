<?php
namespace App\Controller\Home;

use App\Render\PhpRenderTrait;

class HomeController
{

    use PhpRenderTrait;

    public function __construct()
    {
        
    }
    
    public function show()
    {
        $this->render('Home/show', ['username' => 'Test'], 'front');
    }
}