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
                return $this->redirectTo('profile?id='.$user->id);
            }

            return $this->redirectTo('/login');
        }
        
    }


    public function showRegisterForm()
    {
        $talents = TalentType::selectAll();

        require 'views/register.view.php';
    }
    
    
    public function register()
    {
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 12]);

        if(array_search(null, $_POST)){
            //some error;
        }

        $user = User::insert([
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'username' => $_POST['username'],
            'full_name' => $_POST['full_name'],
            'user_type' => $_POST['user_type']
        ]);

        session_start();
        $_SESSION['user_id'] = $user->id;

        return $this->redirectTo('/profile?id'.$user->id);
    }

}