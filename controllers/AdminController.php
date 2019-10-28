<?php


class AdminController extends Controller {

    

	public function index()
	{
		require 'views/admin/home.view.php';
	}


    public function viewAllUsers()
    {
        $users = User::selectAll();
        $talents = TalentType::selectAll();
        require 'views/admin/users.view.php';
    }


	public function viewTalented()
	{
        $all_talented = Talented::selectAll();
		require 'views/admin/talented.view.php';
    }
    


    public function viewOrganizations()
	{
        $organizations = Organization::selectAll();
		require 'views/admin/organizations.view.php';
    }
    


    public function viewAdmins()
	{
		require 'views/admin/admin.view.php';
    }
    


    public function viewVisitors()
	{
        $visitors = User::where('type', '=', 4);
		require 'views/admin/visitors.view.php';
    }
    



    public function updateUser()
    {
        $this->validate($_POST, [
            'name' => 'required',
        ]);
        
        $user = User::find($_POST['id']);
        
        $user->updateInfo($_POST);

        return $this->redirectTo($_SERVER['HTTP_REFERER']);
    }





    public function deleteUser()
    {
        User::find($_GET['id'])->deleteAll();
        User::delete($_GET['id']);
        return $this->redirectTo($_SERVER['HTTP_REFERER']);        
    }




    public function createUser()
    {
        $this->validate($_POST, [
            'email' => 'required|unique:users',
            'password' => 'required',
            'full_name' => 'required',
            'talent-types' => 'requiredIf:user_type=2'
        ]);

        $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 12]);

        $user_id = User::create($_POST);
        $user = User::find($user_id);
        if($_POST['user_type'] == 2) {
            $user->addTalented($_POST['talent-types']);
        }elseif($_POST['user_type'] == 3){
            $user->addOrganization();
        }

        return $this->redirectTo($_SERVER['HTTP_REFERER']);        
    }




    public function viewMaterials()
    {
        $materials = Material::selectAll([
            'sort' => ['likes', 'desc']
        ]);
		require 'views/admin/materials.view.php';
    }




    public function viewEvents()
    {
        $events = Event::selectAll([
            'sort' => ['created_at', 'desc']
        ]);
		require 'views/admin/events.view.php';
    }

}