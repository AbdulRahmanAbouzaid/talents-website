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




    public function addEvent()
    {
        $this->validate(array_merge($_POST, $_FILES), [
            'title' => 'required',
            'content' => 'required',
            'date' => 'required',
        ]);

        session_start();

        $user = $this->getLoggedUser();

        // $dir = 'public/uploads/events/';
        // $file_name = uniqid() . '-' . str_replace(" ", "-", strtolower($_FILES['file']['name']));
        // move_uploaded_file($_FILES['file']['tmp_name'], $dir . $file_name);

        // $_POST['file'] = $file_name; 

        $user->getOrganization()->createEvent($_POST);

        return $this->redirectTo('/profile?id=' . $user->id);

    }

}