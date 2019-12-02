<?php

class AuthController extends Controller{

    function showLoginForm()
    {
        // die(password_hash('secret', PASSWORD_BCRYPT, ['cost' => 12]));

        $this->middleware('guest');

        require 'views/login.view.php';
    }



    public function login()
    {
        session_start();        

        $this->validate($_POST, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $_POST['email'];
        if($result = User::where('email', '=', $email)){
            $user = $result[0];
            $input_password = $_POST['password'];
            if(password_verify($input_password, $user->password)){
                $_SESSION['user_id'] = $user->id;
                $this->handleRememberMe($_POST);
                return $this->redirectTo('profile?id='.$user->id);
            }
        }
        $_SESSION['errors'][] = 'Invalid Email or Password, please try agian';

        return $this->redirectTo('/login');
        
    }


    public function showRegisterForm()
    {
        $this->middleware('guest');

        $talents = TalentType::selectAll();

        require 'views/register.view.php';
    }
    
    
    public function register()
    {
        $this->validate($_POST, [
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|minSize:6',
            'full_name' => 'required',
            'talent-types' => 'requiredIf:user_type=2',
            'user_type' => 'required'
        ]);

        $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 12]);

        $user_id = User::create($_POST);
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



    public function handleRememberMe($request)
    {
        if(!empty($request["remember"])) {
            setcookie ("email",$request["email"],time()+ 3600);
            setcookie ("password",$request["password"],time()+ 3600);
        } else {
            setcookie("username","");
            setcookie("password","");
        }
        
    }

}