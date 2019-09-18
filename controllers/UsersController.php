<?php

class UsersController {
    
    public function index()
    {
        $user = User::find($_GET['id']);
        $materials = $user->getTalented()->getMaterials();
        require 'views/profile.view.php';
    }

}