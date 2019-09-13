<?php

class AuthController extends Controller{

    function showLoginForm()
    {
        require 'views/auth/login.view.php';
    }

    public function login()
    {
        new User;
        $email = $_POST['email'];
        if($user = User::where('email', '=', $email)){
            $input_password = $_POST['password'];
            if(password_verify($input_password, $user[0]->password)){
                $_SESSION['user_id'] = $user->id;
                $this->redirectTo('profile?'.$user->id);
            }
            //$_SESSION['error'] = 'Wrong Password';
            $this->redirectTo('/login');
        }
        
    }


    public function showRegisterForm()
    {
        require 'views/auth/register.view.php';
    }
    
    
    public function register()
    {
        $data['username'] = !empty($_POST['username']) ? $_POST['username'] : null;
        $data['password'] = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 12]) : null;
        $data['email'] = !empty($_POST['email']) ? $_POST['email'] : null;
        $data['full_name'] = !empty($_POST['full_name']) ? $_POST['full_name'] : null;
        if(array_search(null, $data)){
            //some error;
        }
        $user->insert($data);

    }

}