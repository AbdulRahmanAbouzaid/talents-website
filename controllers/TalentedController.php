<?php

class TalentedController extends Controller {

    public function addMaterial()
    {
        session_start();
        $talented = User::find($_SESSION['user_id'])->getTalented();

        $dir = 'public/uploads/materials/';
        $file_name = uniqid().'-'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $dir . $file_name);

        $talented->createMaterial([
            'description' => $_POST['description'],
            'file' => $file_name
        ]);

        return $this->redirectTo('/profile?id='.$_SESSION['user_id']);

    }


    public function addComment(Type $var = null)
    {
        # code...
    }

}