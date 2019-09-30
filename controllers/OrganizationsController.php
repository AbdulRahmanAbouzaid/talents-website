<?php 

class OrganizationsController extends Controller {

    public function index()
    {
        $user = User::find($_GET['id']);
        $materials = $user->getOrganization()->getEvents();
        require 'views/organizations/profile.view.php';
    }



    public function updateProfile()
    {
        $this->validate($_POST, [
            'name' => 'required',
            'current-password' => 'required',
            'password' => 'confirmed',
            'description' => 'required'
        ]);
        
        $user = $this->getLoggedUser();
        if(password_verify($_POST['current-password'], $user->password)){
            $user->updateInfo($_POST);
            Organization::update($user->getOrganization()->id, [
                'description' => $_POST['description']
            ]);

            return $this->redirectTo('/profile?id='.$user->id);
        }

        $_SESSION['errors'][] = 'Current Password is invalid';
        return $this->redirectTo($_SERVER['HTTP_REFERER']);

    }

}