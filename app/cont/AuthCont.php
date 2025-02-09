<?php

require_once(__DIR__ . '/../mod/User.php');
class AuthCont
{
    public function index()
    {
        echo  'auth';
    }
    public function  login()
    {
        // echo  'login';
        require_once(__DIR__ . '/../view/auth/login.php');
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $user =  new User();
            $user->setEmail(htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8'));
            $user->setPassword(htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8'));
            echo  $user->getEmail()  . $user->getPassword();
            $user->login();
        }
        // $user->login(); htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }
    public function register()
    {
        echo  '   ::   ';
        require_once(__DIR__ . '/../view/auth/register.php');
        if (isset($_POST['email'])  && isset($_POST['password']) && isset($_POST['role']) && isset($_POST['confirmPassword']) && isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['register'])) {

            $user =  new User();
            $user->setNom(htmlspecialchars($_POST['firstName'], ENT_QUOTES, 'UTF-8'));
            $user->setPrenom(htmlspecialchars($_POST['lastName'], ENT_QUOTES,  'UTF-8'));
            $user->setEmail(htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8'));
            $user->setPassword(htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8'));
            $user->setRole(htmlspecialchars($_POST['role'], ENT_QUOTES, 'UTF-8'));
            
        $user->setDate_creation();
            // echo  "hello " . $user->getNom() . ' ' . $user->getPrenom() .' ' . $user->getEmail() .' '.$user->getPassword() . ' ' . $user->getRole() .' '.$user->getDate_creation();
            $user->createUser();
            header("Location: login");
            exit();
        } else
            echo 'sils tu lpus remple';
        // $user->signUp();  lastName email password confirmPassword  role 
    }
}
