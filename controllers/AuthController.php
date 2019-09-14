<?php

class AuthController extends Controller{

    function showLoginForm()
    {
        // die(password_hash('secret', PASSWORD_BCRYPT, ['cost' => 12]));
        require 'views/login.view.php';
    }

    public function login()
    {
        $email = $_POST['email'];
        if($user = User::where('email', '=', $email)[0]){
            $input_password = $_POST['password'];
            if(password_verify($input_password, $user->password)){
                session_start();
                $_SESSION['user_id'] = $user->id;
                return $this->redirectTo('/');
                //$this->redirectTo('profile?'.$user->id);
            }

            return $this->redirectTo('/login');
        }
        
    }


    public function showRegisterForm()
    {
        require 'views/register.view.php';
    }
    
    
    public function register()
    {
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 12]);
        $_POST['user_type'] = 2;
        if(array_search(null, $_POST)){
            //some error;
        }
        User::insert($_POST);
        session_start();
        $_SESSION['user_id'] = $user->id;
        return $this->redirectTo('/');
    }

}