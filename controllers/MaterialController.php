<?php 


class MaterialController extends Controller {

    
    public function like()
    {
        $material = Material::find($_POST['material_id']);
        $user = $this->getLoggedUser();
        $material->addLikeBy($user->id);
    }




    
    public function unlike()
    {
        $material = Material::find($_GET['material_id']);
        $user = $this->getLoggedUser();
        $material->unlike($user->id);
    }




}