<?php
namespace Modules\Maintenances\Controllers;

use Modules\Maintenances\Models\SubjectsModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;

class Subjects extends BaseController
{

	public function __construct()
	{
		parent:: __construct();

		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

  public function index()
  {
  	$this->hasPermissionRedirect('list-subject');

  	$model = new SubjectsModel();

    $data['subject'] = $model->getSubject();

    $data['function_title'] = "List of Subjects";
    $data['viewName'] = 'Modules\Maintenances\Views\subjects\index';
    echo view('App\Views\theme\index', $data);
  }


  public function add_subject()
  {
  	$this->hasPermissionRedirect('add-subject');

  	helper(['form', 'url']);
  	$model = new SubjectsModel();

  	if(!empty($_POST))
  	{
    	if (!$this->validate('subject'))
	    {
	    	$data['errors'] = \Config\Services::validation()->getErrors();
	      $data['function_title'] = "Adding Subject";
	      $data['viewName'] = 'Modules\Maintenances\Views\subjects\frmSubject';
	      echo view('App\Views\theme\index', $data);
	    }
	    else
	    {
	        if($model->add_maintenance($_POST))
	        {
	        	$_SESSION['success'] = 'You have added a new record';
						$this->session->markAsFlashdata('success');
	        	return redirect()->to(base_url('subjects'));
	        }
	        else
	        {
	        	$_SESSION['error'] = 'You have an error in adding a new record';
						$this->session->markAsFlashdata('error');
	        	return redirect()->to(base_url('subjects'));
	        }
	    }
  	}
  	else
  	{
    	$data['function_title'] = "Adding Subject";
      $data['viewName'] = 'Modules\Maintenances\Views\subjects\frmSubject';
      echo view('App\Views\theme\index', $data);
  	}
  }

  public function edit_subject($id)
  {
  	$this->hasPermissionRedirect('edit-subject');
  	helper(['form', 'url']);
  	$model = new SubjectsModel();
  	$data['rec'] = $model->find($id);

		// die($_POST['status']);

  	if(!empty($_POST))
  	{
	print_r($_POST);
		if (!$this->validate('subject'))
			{
				$data['errors'] = \Config\Services::validation()->getErrors();
					$data['function_title'] = "Edit of Subject";
					$data['viewName'] = 'Modules\Maintenances\Views\subjects\frmSubject';
					echo view('App\Views\theme\index', $data);
			}
			else
			{
				if($model->edit_maintenance($_POST, $id))
					{
						$_SESSION['success'] = 'You have updated a record';
						$this->session->markAsFlashdata('success');
						return redirect()->to(base_url('subjects'));
					}
					else
					{
						$_SESSION['error'] = 'You an error in updating a record';
						$this->session->markAsFlashdata('error');
						return redirect()->to( base_url('subjects'));
					}
			}
  	}
  	else
  	{
			$data['function_title'] = "Edit of Subject";
			$data['viewName'] = 'Modules\Maintenances\Views\subjects\frmSubject';
			echo view('App\Views\theme\index', $data);
  	}
  }
	public function inactive($id)
	{
		$this->hasPermissionRedirect('delete-subject');
		$model = new SubjectsModel();
		$model->inactive_maintenance($id);
	}

	public function active($id)
	{
		$this->hasPermissionRedirect('delete-subject');
		$model = new SubjectsModel();
		$model->active_maintenance($id);
	}
}
