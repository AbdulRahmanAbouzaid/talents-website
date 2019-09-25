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
        $user = $this->getLoggedUser();
        $user->updateInfo($_POST);
        Organization::update($user->getOrganization()->id, [
            'description' => $_POST['description']
        ]);

        return $this->redirectTo('/profile?id='.$user->id);

    }

}