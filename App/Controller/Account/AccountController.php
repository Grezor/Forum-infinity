<?php
namespace App\Controller\Account;

use App\Render\RedirectTrait;
use App\Render\PhpRenderTrait;
use App\Controller\Database\DatabaseController;
use App\model\Users;

class AccountController {

    use PhpRenderTrait, RedirectTrait;

    private $db;
    private $errors = [];

    public function __construct(DatabaseController $db)
    {
        $this->db = $db;
    }

    public function register()
    {
        return $this->render('Account/register');
    }

    public function postRegister()
    {
       
    }

    public function login()
    {        
        return $this->render('Account/login');
    }

    public function postLogin()
    {


    }

    public function checkMail()
    {

    }

    public function logout()
    {

    }
    
}