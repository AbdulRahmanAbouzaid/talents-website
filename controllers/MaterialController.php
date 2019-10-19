<?php 


class MaterialController extends Controller {

    
    public function like()
    {
        $material = Material::find($_POST['material_id']);
        $user = $this->getLoggedUser();
        $material->addLikeBy($user->id);
        Material::update($material->id, [
            'likes' => $material->likes + 1
        ]);
    }




    
    public function unlike()
    {
        $material = Material::find($_GET['id']);
        $user = $this->getLoggedUser();
        $material->unlike($user->id);
        Material::update($material->id, [
            'likes' => $material->likes - 1
        ]);
    }




    public function addComment()
    {
        // var_dump($_POST);
        $this->validate($_POST, [
            'body' => 'required'
        ]);

        $material = Material::find($_POST['material_id']);
        $body = $_POST['body'];
        $_POST['user_id'] = $this->getLoggedUser()->id;

        $material->addComment($_POST);
        Material::update($material->id, [
            'comments' => $material->comments + 1
        ]);
        // return $this->redirectTo($_SERVER['HTTP_REFERER']);
    }





    public function deleteComment()
    {
        $material = Comment::find($_GET['comment_id'])->material();
        Comment::delete($_GET['comment_id']);
        Material::update($material->id, [
            'comments' => $material->comments - 1
        ]);
    }




    public function deleteMaterial()
    {
        Material::delete($_GET['id']);
    }
}