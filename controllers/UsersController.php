<?php

class UsersController extends Controller{
    
    public function index()
    {
        $this->middleware('auth');
     
        $user = User::find($_GET['id']);
        if($user->isTalented()){
            $materials = $user->getTalented()->getMaterials();
            require 'views/talented/profile.view.php';
        }elseif($user->isOrganization()){
            $events = $user->getOrganization()->getEvents();
            require 'views/organizations/profile.view.php';
        }
    }



    public function showUpdateForm()
    {
        $this->middleware('auth');

        $user = $this->getLoggedUser();
        if($user->isTalented()){
            $user_talents = $user->getTalented()->getTalents();
            $talents = TalentType::selectAll();    
            require 'views/talented/update-profile.view.php';
        }elseif($user->isOrganization()){
            $organization = $user->getOrganization();
            require 'views/organizations/update-profile.view.php';
        }
    }

}