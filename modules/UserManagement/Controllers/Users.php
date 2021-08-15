<?php
namespace Modules\UserManagement\Controllers;

use Modules\UserManagement\Models\UsersModel;
use Modules\UserManagement\Models\RolesModel;
// use Modules\UserManagement\Models\UserDetailsModel;
// use Modules\SystemSettings\Models\AreasModel;
// use Modules\SystemSettings\Models\DepartmentsModel;
// use Modules\SystemSettings\Models\ProgramsModel;
use App\Controllers\BaseController;

class Users extends BaseController
{
	private $roles;

	public function __construct()
	{
		parent:: __construct();

		$role_model = new RolesModel();
		$this->roles = $role_model->getRoleWithCondition(['status' => 'a']);
	}

	public function show_user($id)
	{
		//die("here");
		$this->hasPermissionRedirect('show-user');
		$data['permissions'] = $this->permissions;

		$model = new UsersModel();
		// $model_areas = new AreasModel();
		// $model_departments = new DepartmentsModel();
		// $model_user_details = new UserDetailsModel();
		// $model_ac_details = new ProgramsModel();

		// $data['areas'] = $model_areas->where('status', 'a')->findAll();
		// $data['academic_programs'] = $model_ac_details->where('status', 'a')->findAll();
		// $data['departments'] = $model_departments->where('status', 'a')->findAll();

		$data['user'] = $model->getUserWithCondition(['id' => $id]);
		// $data['user_detail'] = $model_user_details->getCredential($id);

		// print_r($data['user_detail']); die("here");

		$data['function_title'] = "User Profile";
        $data['viewName'] = 'Modules\UserManagement\Views\users\userProfile';
        echo view('App\Views\theme\index', $data);
	}

	public function add_credentials()
	{
			$data = array(
						 'user_id'  => $_POST['user_id'],
						 // 'area_id'  => $_POST['area_id'],
						 // 'department_id' => $_POST['department_id'],
						 // 'academic_program_id' => $_POST['academic_program_id'],
						 'created_at' => (new \DateTime())->format('Y-m-d H:i:s')
				 );

			// $model_user_details = new UserDetailsModel();
			// $jdata = $model_user_details->addUserDetail($data);
			echo json_encode($jdata);
	}

	public function edit_credentials($id)
	{
			$data = array(
						 'user_id'  => $_POST['user_id'],
						 // 'area_id'  => $_POST['area_id'],
						 // 'department_id' => $_POST['department_id'],
						 // 'academic_program_id' => $_POST['academic_program_id'],
						 'created_at' => (new \DateTime())->format('Y-m-d H:i:s')
				 );

			// return json_encode($id);
			// $model_user_details = new UserDetailsModel();
			// $jdata = $model_user_details->editUserDetail($data, $id);
			echo json_encode($jdata);
	}

	public function user_own_profile($id)
	{
		$this->hasPermissionRedirect('user-own-profile');

		if($id != $_SESSION['uid'])
		{
			header('Location: '.base_url());
			session_destroy();
			exit;
		}

		$model = new UsersModel();

		$data['user'] = $model->getUserWithCondition(['id' => $id]);

		$data['function_title'] = "User Own Profile";
        $data['viewName'] = 'Modules\UserManagement\Views\users\userOwnProfile';
        echo view('App\Views\theme\index', $data);
	}

    public function index($offset = 0)
    {
    	$this->hasPermissionRedirect('list-user');

    	$model = new UsersModel();

    	//kailangan ito para sa pagination
       	$data['all_items'] = $model->getUserWithCondition(['status'=> 'a']);
       	$data['offset'] = $offset;

        $data['users'] = $model->getUsersAndRole();

        $data['function_title'] = "List of Users";
        $data['viewName'] = 'Modules\UserManagement\Views\users\index';
        echo view('App\Views\theme\index', $data);
    }

    public function add_user()
    {
    	$this->hasPermissionRedirect('add-user');

    	$data['roles'] = $this->roles;

    	helper(['form', 'url']);
    	$model = new UsersModel();
    	if(!empty($_POST))
    	{
	    	if (!$this->validate('user'))
		    {
		    	$data['errors'] = \Config\Services::validation()->getErrors();
		        $data['function_title'] = "Adding of User";
		        $data['viewName'] = 'Modules\UserManagement\Views\users\frmUser';
		        echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
		    	unset($_POST['password_retype']);
		        if($model->addUsers($_POST))
		        {
		        	$_SESSION['success'] = 'You have added a new record';
					$this->session->markAsFlashdata('success');
		        	return redirect()->to( base_url('users'));
		        }
		        else
		        {
		        	$_SESSION['error'] = 'You have an error in adding a new record';
					$this->session->markAsFlashdata('error');
		        	return redirect()->to( base_url('users'));
		        }
		    }
    	}
    	else
    	{

	    	$data['function_title'] = "Adding User Account";
	        $data['viewName'] = 'Modules\UserManagement\Views\users\frmUser';
	        echo view('App\Views\theme\index', $data);
    	}
    }

    public function edit_user($id)
    {
    	$this->hasPermissionRedirect('edit-user');

    	$data['roles'] = $this->roles;

    	helper(['form', 'url', 'html']);

    	$model = new UsersModel();
    	$data['rec'] = $model->find($id);

    	if(!empty($_POST))
    	{
	    	if (!$this->validate('user_edit'))
		    {
		    	$data['errors'] = \Config\Services::validation()->getErrors();
		        $data['function_title'] = "Editing of User Account";
		        $data['viewName'] = 'Modules\UserManagement\Views\users\frmUser';
		        echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
		    	unset($_POST['password_retype']);
		    	if($model->editUsers($_POST, $id))
		        {
		        	$_SESSION['success'] = 'You have updated a record';
					$this->session->markAsFlashdata('success');
		        	return redirect()->to( base_url('users'));
		        }
		        else
		        {
		        	$_SESSION['error'] = 'You an errot in updating a record';
					$this->session->markAsFlashdata('error');
		        	return redirect()->to( base_url('users'));
		        }
		    }
    	}
    	else
    	{
    		$data['function_title'] = "Editing of User Account";
	        $data['viewName'] = 'Modules\UserManagement\Views\users\frmUser';
	        echo view('App\Views\theme\index', $data);
    	}
    }

    public function delete_user($id)
    {
    	$this->hasPermissionRedirect('delete-user');

    	$model = new UsersModel();
    	$model->deleteUser($id);
    }


	public function change_password($id)
    {
    	helper(['form', 'url', 'html']);

    	$model = new UsersModel();

		if(!empty($_POST))
    	{
	    	if (!$this->validate('change_password'))
		    {
		    	$data['errors'] = \Config\Services::validation()->getErrors();
		        $data['function_title'] = "Change Password";
		        $data['viewName'] = 'Modules\UserManagement\Views\users\changePassword';
		        echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
		    	if($model->editUsers($_POST, $id))
		        {
		        	$_SESSION['success'] = 'You have updated a record';
					$this->session->markAsFlashdata('success');
		        	return redirect()->to( base_url('users/change-password/'.$id));
		        }
		        else
		        {
		        	$_SESSION['error'] = 'You an errot in updating a record';
					$this->session->markAsFlashdata('error');
		        	return redirect()->to( base_url('users/change-password/'.$id));
		        }
		    }
    	}
    	else
    	{
    		$data['function_title'] = "Change Password";
	        $data['viewName'] = 'Modules\UserManagement\Views\users\changePassword';
	        echo view('App\Views\theme\index', $data);
    	}
	}
	
	public function edit_profile($id)
    {

    	$data['roles'] = $this->roles;

    	helper(['form', 'url', 'html']);

    	$model = new UsersModel();
    	$data['rec'] = $model->find($id);

    	if(!empty($_POST))
    	{
	    	if (!$this->validate('edit_profile'))
		    {
		    	$data['errors'] = \Config\Services::validation()->getErrors();
		        $data['function_title'] = "Editing of User Account";
		        $data['viewName'] = 'Modules\UserManagement\Views\users\profile';
		        echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
		    	if($model->editUsers($_POST, $id))
		        {
		        	$_SESSION['success'] = 'You have updated a record';
					$this->session->markAsFlashdata('success');
		        	return redirect()->to( base_url('users/edit-profile/'.$id));
		        }
		        else
		        {
		        	$_SESSION['error'] = 'You an errot in updating a record';
					$this->session->markAsFlashdata('error');
		        	return redirect()->to( base_url('users/edit-profile/'.$id));
		        }
		    }
    	}
    	else
    	{
    		$data['function_title'] = "Editing of User Account";
	        $data['viewName'] = 'Modules\UserManagement\Views\users\profile';
	        echo view('App\Views\theme\index', $data);
    	}
    }
}
