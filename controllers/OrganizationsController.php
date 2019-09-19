<?php 

class OrganizationsConroller extends Controller {

    public function index()
    {
        $user = User::find($_GET['id']);
        $materials = $user->getOrganization()->getEvents();
        require 'views/organizations/profile.view.php';
    }

}