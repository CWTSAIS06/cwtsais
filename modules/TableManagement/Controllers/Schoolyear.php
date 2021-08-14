<?php
namespace Modules\TableManagement\Controllers;

use Modules\TableManagement\Models\SchoolyearModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;

class Schoolyear extends BaseController
{
	//private $permissions;

	public function __construct()
	{
		parent:: __construct();
		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

    public function index($offset = 0)
    {
    	$this->hasPermissionRedirect('list-schyear');

    	$model = new SchoolyearModel();

    	//kailangan ito para sa pagination
       	$data['schyear'] = $model->getSchoolyearWithCondition();
        $data['function_title'] = "List of School Year";
        $data['viewName'] = 'Modules\TableManagement\Views\schyear\index';
        echo view('App\Views\theme\index', $data);
    }

    public function show_schyear($id)
	{
		$this->hasPermissionRedirect('show-schyear');
		$data['permissions'] = $this->permissions;

		$model = new SchoolyearModel();

		$data['schyear'] = $model->getSchoolyearWithCondition(['id' => $id]);

		$data['function_title'] = "School Year Details";
    $data['viewName'] = 'Modules\TableManagement\Views\schyear\schyearDetails';
    echo view('App\Views\theme\index', $data);
	}

    public function add_schyear()
    {
    	$this->hasPermissionRedirect('add-schyear');

    	$permissions_model = new PermissionsModel();

    	$data['permissions'] = $this->permissions;

    	helper(['form', 'url']);
    	$model = new SchoolyearModel();

    	if(!empty($_POST))
    	{
	    	if (!$this->validate('schyears'))
		    {
		    	$data['errors'] = \Config\Services::validation()->getErrors();
		        $data['function_title'] = "Adding School Year";
		        $data['viewName'] = 'Modules\TableManagement\Views\schyear\frmSchyear';
		        echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
		        if($model->addSchoolyear($_POST))
		        {
		        	//$role_id = $model->insertID();
		        	//$permissions_model->update_permitted_role($role_id, $_POST['function_id']);
		        	$_SESSION['success'] = 'You have added a new record';
					$this->session->markAsFlashdata('success');
		        	return redirect()->to(base_url('schyear'));
		        }
		        else
		        {
		        	$_SESSION['error'] = 'You have an error in adding a new record';
					$this->session->markAsFlashdata('error');
		        	return redirect()->to(base_url('schyear'));
		        }
		    }
    	}
    	else
    	{

	    	$data['function_title'] = "Adding School Year";
	        $data['viewName'] = 'Modules\TableManagement\Views\schyear\frmSchyear';
	        echo view('App\Views\theme\index', $data);
    	}
    }

    public function edit_schyear($id)
    {
    	$this->hasPermissionRedirect('edit-schyear');
    	helper(['form', 'url']);
    	$model = new SchoolyearModel();
    	$data['rec'] = $model->find($id);

    	$permissions_model = new PermissionsModel();

    	$data['permissions'] = $this->permissions;

    	if(!empty($_POST))
    	{

	    	if (!$this->validate('edit_schyears'))
		    {
				//die("here");
		    		$data['errors'] = \Config\Services::validation()->getErrors();
		        $data['function_title'] = "Edit School Year";
		        $data['viewName'] = 'Modules\TableManagement\Views\schyear\frmSchyear';
		        echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
		    	if($model->editSchoolyear($_POST, $id))
		        {
		        //$permissions_model->update_permitted_role($id, $_POST['function_id'], $data['rec']['function_id']);
		        	$_SESSION['success'] = 'You have updated a record';
							$this->session->markAsFlashdata('success');
		        	return redirect()->to(base_url('schyear'));
		        }
		        else
		        {
		        	$_SESSION['error'] = 'You an error in updating a record';
					$this->session->markAsFlashdata('error');
		        	return redirect()->to( base_url('schyear'));
		        }
		    }
    	}
    	else
    	{
	    	$data['function_title'] = "Editing School Year";
	        $data['viewName'] = 'Modules\TableManagement\Views\schyear\frmSchyear';
	        echo view('App\Views\theme\index', $data);
    	}
    }

    public function inactive($id)
    {
    	$this->hasPermissionRedirect('delete-schyear');
    	$model = new SchoolyearModel();
    	$model->inactiveSchoolyear($id);
	}

	public function active($id)
    {
    	$this->hasPermissionRedirect('delete-schyear');
    	$model = new SchoolyearModel();
    	$model->activeSchoolyear($id);
	}



}
