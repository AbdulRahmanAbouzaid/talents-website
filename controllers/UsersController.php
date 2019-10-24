<?php

class UsersController extends Controller{
    
    public function index()
    {
        $this->middleware('auth');
     
        $user = User::find($_GET['id']);
        if($user->isTalented()){
            $materials = $user->getTalented()->getMaterials();
            if(isset($_GET['notification_id'])){
                Notification::find($_GET['notification_id'])->markCommentAsRead();
            }
            require 'views/talented/profile.view.php';
        }elseif($user->isOrganization()){
            $talents = TalentType::selectAll();
            $events = $user->getOrganization()->getEvents();
            require 'views/organizations/profile.view.php';
        }else{
            $this->redirectTo('/');
        }
    }



    public function showUpdateForm()
    {
        $this->middleware('auth');

        $user = $this->getLoggedUser();
        if($user->isTalented()){
            $user_talents = $user->getTalented()->getTalents();
            $talents = TalentType::selectAll();
            $update_action = '/organization/update-profile'; 
        }elseif($user->isOrganization()){
            $organization = $user->getOrganization();
            $update_action = '/talented/update-profile'; 
        }else {
            $update_action = '/user/update-profile';
        }
        require 'views/update-profile.view.php';
    }




    public function updateProfile()
    {
        $this->validate($_POST, [
            'name' => 'required',
            'current-password' => 'required',
            'password' => 'confirmed',
        ]);
        
        $user = $this->getLoggedUser();
        if(password_verify($_POST['current-password'], $user->password)){
            $user->updateInfo($_POST);
            return $this->redirectTo('/profile?id='.$user->id);
        }

        $_SESSION['errors'][] = 'Current Password is invalid';
        return $this->redirectTo($_SERVER['HTTP_REFERER']);
    }






    public function changeProfileImage()
    {
        $this->validate($_FILES, [
            'profilePicture' => 'required',
        ]);

        $imgData =addslashes (file_get_contents($_FILES['profilePicture']['tmp_name']));

        $user = $this->getLoggedUser();
        
        User::update($user->id, [
            'photo' => $imgData
        ]);

        return $this->redirectTo('/profile?id='.$user->id);
        
    }





    public function deleteAccount()
    {
        User::find($_GET['id'])->deleteAll();
        User::delete($_GET['id']);
        return $this->redirectTo('/logout');
    }
}