<?php

class AuthController extends Controller{

    function showLoginForm()
    {
        // die(password_hash('secret', PASSWORD_BCRYPT, ['cost' => 12]));
        session_start();
        if(isset($_SESSION['user_id'])){
            return $this->redirectTo('/profile?id='.$_SESSION['user_id']);            
        }
        require 'views/login.view.php';
    }

    public function login()
    {
        session_start();
        $email = $_POST['email'];
        if($result = User::where('email', '=', $email)){
            $user = $result[0];
            $input_password = $_POST['password'];
            if(password_verify($input_password, $user->password)){
                $_SESSION['user_id'] = $user->id;
                return $this->redirectTo('profile?id='.$user->id);
            }
        }
        $_SESSION['error'] = 'Invalid Email or Password, please try agian';

        return $this->redirectTo('/login');
        
    }


    public function showRegisterForm()
    {
        session_start();
        if(isset($_SESSION['user_id'])){
            return $this->redirectTo('/profile?id='.$_SESSION['user_id']);
        }

        $talents = TalentType::selectAll();

        require 'views/register.view.php';
    }
    
    
    public function register()
    {
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 12]);

        $user_id = User::insert([
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'username' => $_POST['username'],
            'full_name' => $_POST['full_name'],
            'type' => $_POST['user_type']
        ]);
        $user = User::find($user_id);
        if($_POST['user_type'] == 2) {
            $user->addTalented($_POST['talent-types']);
        }elseif($_POST['user_type'] == 3){
            $user->addOrganization();
        }

        session_start();
        $_SESSION['user_id'] = $user->id;

        return $this->redirectTo('/profile?id='.$user->id);
    }



    public function logout()
    {
        session_start();
        unset($_SESSION['user_id']);
        session_destroy();
        return $this->redirectTo('login');
    }

}