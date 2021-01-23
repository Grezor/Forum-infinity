<?php
namespace App\Controller\Account;

use App\Render\RedirectTrait;
use App\Render\PhpRenderTrait;
use App\Controller\Database\DatabaseController;
use App\model\Users;
use App\Controller\Controller;

class AccountController extends Controller{

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
        $userController = new Users($this->db);

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['pass_confirm'];
        
        // erreur 1
        if(empty($name) || empty($email) || empty($password) || empty($password_confirm)){
           $errors[] = 'tout les champs doivent etre remplis';
        }
        // erreur 2
        $nameLength = strlen($name);
        if ($nameLength < 3 || $nameLength > 20) {
            $errors[] = 'Votre pseudo doit être compris entre 3 et 20 caractères';
        }
        // erreur 3
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Votre email est dans un format invalide';
        }
        //erreur 4
        $passLength = strlen($password);
        if ($passLength < 8) {
            $errors[] = 'Votre mot de passe n\'est pas assez long (8 caractères minimum)';
        }
        //erreur 5
        if ($password != $password_confirm) {
            $errors[] = 'Vos mots de passe ne sont pas identique';
        }
        // erreur 6
        $user = $userController->getUserByNameOrEmail($this->db, $name, $email);

        if ($user) {
            // Explication de la syntaxe et ajout de l'erreur
            $errors[] = 'Un compte existe déjà avec le pseudo ou le mail que vous avez choisi';
        }

        if (empty($errors)) {
            // on genere un token de 60 caractère
            $token = $this->str_random(60);

            $user = [
                'name' => $name,
                'email' => $email,
                'password' => password_hash($name.'#-$'. $password, PASSWORD_BCRYPT, ['cost' => 12]),
                'emailToken' => $token
            ];

            $user['id'] = $userController->registerUser($this->db, $user);
            $this->setFlash('success', 'un mail a été envoyer');
        } else {
             $this->setErrors($errors, [
                'name' => $name,
                'email' => $email,
            ]);
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

    }
    
}