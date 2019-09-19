<?php

class UsersController {
    
    public function index()
    {
        $user = User::find($_GET['id']);
        if($user->isTalented()){
            $materials = $user->getTalented()->getMaterials();
            require 'views/talented/profile.view.php';
        }elseif($user->isOrganization()){
            $events = $user->getOrganization()->getEvents();
            require 'views/organizations/profile.view.php';
        }
    }

}