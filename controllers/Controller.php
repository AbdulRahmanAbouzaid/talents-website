<?php

class Controller {
    
    public function getLoggedUser()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['user_id']) ? User::find($_SESSION['user_id']) : false;
    }



    public function redirectTo($destination)
    {
        header('Location: '. $destination);
    }


    public function validate($requset, $validatedData)
    {
        $validator = new Validator;
        $errors = $validator->validate($requset, $validatedData);
        if(!empty($errors)){
            session_start();
            $_SESSION['errors'] = $errors;
            $this->redirectTo($_SERVER['HTTP_REFERER']);
            exit;
        }

    }



    public function middleware($type)
    {
        $user = $this->getLoggedUser();
        if($type == 'admin' && (!$user || !$user->isAdmin())){
            return $this->redirectTo('/admin/login');
        }elseif($type == 'auth' && !$user){
            return $this->redirectTo('/login');
        }elseif($type == 'guest' && $user){
            return $this->redirectTo('/profile?id=' . $user->id);
        }
    }

}