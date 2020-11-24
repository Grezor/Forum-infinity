<?php
namespace App\Account;

use App\Render\PhpRenderTrait;
use App\Render\RedirectTrait;

class AccountController {
    
    use PhpRenderTrait, RedirectTrait;

    public function __construct()
    {

    }

    public function register()
    {
        echo "test";
    }

    public function postRegister()
    {

    }

    public function login()
    {

    }

    public function postLogin()
    {

    }

    public function checlMail()
    {

    }

    public function logout()
    {
        
    }
}