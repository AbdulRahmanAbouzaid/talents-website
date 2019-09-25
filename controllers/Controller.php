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
}