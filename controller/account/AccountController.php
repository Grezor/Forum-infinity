<?php

namespace App\Account;

use App\Render\RedirectTrait;
use App\Render\PhpRenderTrait;
use App\Database\DatabaseController;
use App\model\users;


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
        $user = new Users($this->db);
        if (empty($this->username) || empty($this->password)) {
            $errors[] = 'Tous les champs doivent être remplis';
        }
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
        return $this->render('Account/login');
    }
}