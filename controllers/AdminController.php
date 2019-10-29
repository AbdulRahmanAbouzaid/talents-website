<?php


class AdminController extends Controller {

    public function viewLogin()
    {
        if($this->getLoggedUser()){
            return $this->redirectTo('/admin/home');
        }
		require 'views/admin/login.view.php';        
    }



    public function login()
    {
        session_start();        
        $this->validate($_POST, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $_POST['email'];
        if($result = User::where('email', '=', $email)){
            $user = $result[0];
            $input_password = $_POST['password'];
            if(password_verify($input_password, $user->password)){
                $_SESSION['user_id'] = $user->id;
                return $this->redirectTo('/admin/home');
            }
        }
        $_SESSION['errors'][] = 'Invalid Email or Password, please try agian';
        return $this->redirectTo('/admin/login');
    }



    function logout()
    {
        $this->middleware('admin');
        session_start();
        unset($_SESSION['user_id']);
        session_destroy();
        return $this->redirectTo('/admin/login');
    }


	public function index()
	{
        $this->middleware('admin');
		require 'views/admin/home.view.php';
	}


    public function viewAllUsers()
    {
        $this->middleware('admin');
        $users = User::selectAll();
        $talents = TalentType::selectAll();
        require 'views/admin/users.view.php';
    }


	public function viewTalented()
	{
        $this->middleware('admin');
        $all_talented = Talented::selectAll();
		require 'views/admin/talented.view.php';
    }
    


    public function viewOrganizations()
	{
        $this->middleware('admin');
        $organizations = Organization::selectAll();
		require 'views/admin/organizations.view.php';
    }
    


    public function viewAdmins()
	{
        $this->middleware('admin');
        $admins = User::where('type', '=', 1);
		require 'views/admin/admins.view.php';
    }
    


    public function viewVisitors()
	{
        $this->middleware('admin');
        $visitors = User::where('type', '=', 4);
		require 'views/admin/visitors.view.php';
    }
    



    public function updateUser()
    {
        $this->middleware('admin');
        $this->validate($_POST, [
            'name' => 'required',
        ]);
        
        $user = User::find($_POST['id']);
        
        $user->updateInfo($_POST);

        return $this->redirectTo($_SERVER['HTTP_REFERER']);
    }





    public function deleteUser()
    {
        $this->middleware('admin');
        User::find($_GET['id'])->deleteAll();
        User::delete($_GET['id']);
        return $this->redirectTo($_SERVER['HTTP_REFERER']);        
    }




    public function createUser()
    {
        $this->middleware('admin');
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
        $this->middleware('admin');
        $materials = Material::selectAll([
            'sort' => ['likes', 'desc']
        ]);
		require 'views/admin/materials.view.php';
    }




    public function deleteMaterial()
    {
        $this->middleware('admin');
        Material::delete($_GET['id']);
        return $this->redirectTo($_SERVER['HTTP_REFERER']);        
    }




    public function viewEvents()
    {
        $this->middleware('admin');
        $events = Event::selectAll([
            'sort' => ['created_at', 'desc']
        ]);
		require 'views/admin/events.view.php';
    }




    public function deleteEvent()
    {
        $this->middleware('admin');
        Event::delete($_GET['id']);
        return $this->redirectTo($_SERVER['HTTP_REFERER']);        
    }



    public function viewTalents()
    {
        $this->middleware('admin');
        $talents = TalentType::selectAll();
		require 'views/admin/talents.view.php';
    }




    public function deleteTalent()
    {
        $this->middleware('admin');
        TalentType::delete($_GET['id']);
        return $this->redirectTo($_SERVER['HTTP_REFERER']);        
    }




    public function updateTalent()
    {
        $this->validate($_POST, [
            'name' => 'required'
        ]);
        
        $this->middleware('admin');
        TalentType::modify(array_merge($_POST, $_FILES));
        return $this->redirectTo($_SERVER['HTTP_REFERER']);       
    }




    public function createTalent()
    {
        $this->validate(array_merge($_POST, $_FILES), [
            'name' => 'required',
            'icon' => 'requiredFile'
        ]);
        $this->middleware('admin');
        TalentType::create(array_merge($_POST, $_FILES));
        return $this->redirectTo($_SERVER['HTTP_REFERER']);        
    }

}