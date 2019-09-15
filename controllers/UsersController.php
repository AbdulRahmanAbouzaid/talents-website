<?php

class UsersController {
    
    public function index()
    {
        $user = User::find($_GET['id']);

        require 'views/profile.view.php';
    }

}