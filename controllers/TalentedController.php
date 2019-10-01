<?php

class TalentedController extends Controller {

    public function addMaterial()
    {
        $this->validate(array_merge($_POST, $_FILES), [
            'body' => 'required',
            'file' => 'requiredFile'
        ]);

        session_start();
        $talented = User::find($_SESSION['user_id'])->getTalented();

        $dir = 'public/uploads/materials/';
        $file_name = uniqid() . '-' . str_replace(" ", "-", strtolower($_FILES['file']['name']));
        move_uploaded_file($_FILES['file']['tmp_name'], $dir . $file_name);

        $talented->createMaterial([
            'body' => $_POST['body'],
            'media' => $file_name
        ]);

        return $this->redirectTo('/profile?id='.$_SESSION['user_id']);

    }


    public function like()
    {
        $material = Material::find($_GET['material_id']);
        $user = User::find($_POST['user_id']);
        $material->addLikeBy($user_id);
    }




    public function showUpdateForm()
    {
        $user_talents = $this->getLoggedUser()->getTalented()->getTalents();
        $talents = TalentType::selectAll();
        
        require 'views/talented/update-profile.view.php';
    }



    public function updateProfile()
    {
        $this->validate($_POST, [
            'name' => 'required',
            'current-password' => 'required',
            'talent-types' => 'required',
            'password' => 'confirmed',
        ]);
        
        $user = $this->getLoggedUser();
        if(password_verify($_POST['current-password'], $user->password)){
            $user->updateInfo($_POST);
            Talented::update($user->getTalented()->id, [
                'talents_ids' => implode(',', $_POST['talent-types'])
            ]);

            return $this->redirectTo('/profile?id='.$user->id);
        }

        $_SESSION['errors'][] = 'Current Password is invalid';
        return $this->redirectTo($_SERVER['HTTP_REFERER']);
        
        
    }





    public function getTalentedOf()
    {
        $talented_users = TalentType::find($_GET['id'])->getTalented();
        // var_dump($talented_users);
        require 'views/talented.view.php';
    }
    

}