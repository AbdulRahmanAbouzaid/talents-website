<?php

class TalentedController extends Controller {

    public function index()
    {
        $user = User::find($_GET['id']);
        $materials = $user->getTalented()->getMaterials();
        require 'views/talented/profile.view.php';
    }


    public function addMaterial()
    {
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

}