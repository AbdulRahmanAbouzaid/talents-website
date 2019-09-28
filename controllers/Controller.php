<?php

class Controller {
    
    public function getLoggedUser()
    {
        session_start();
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

}