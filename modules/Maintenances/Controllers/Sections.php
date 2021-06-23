<?php
namespace Modules\Maintenances\Controllers;

use Modules\Maintenances\Models\SectionsModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;

class Sections extends BaseController
{

	public function __construct()
	{
		parent:: __construct();

		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

  public function index()
  {
  	$this->hasPermissionRedirect('list-section');

  	$model = new SectionsModel();

    $data['section'] = $model->getSection();

    $data['function_title'] = "List of Year & Sections";
    $data['viewName'] = 'Modules\Maintenances\Views\sections\index';
    echo view('App\Views\theme\index', $data);
  }


  public function add_section()
  {
  	$this->hasPermissionRedirect('add-section');

  	helper(['form', 'url']);
  	$model = new SectionsModel();

  	if(!empty($_POST))
  	{
    	if (!$this->validate('section'))
	    {
	    	$data['errors'] = \Config\Services::validation()->getErrors();
	      $data['function_title'] = "Adding Section";
	      $data['viewName'] = 'Modules\Maintenances\Views\sections\frmSection';
	      echo view('App\Views\theme\index', $data);
	    }
	    else
	    {
	        if($model->add_maintenance($_POST))
	        {
	        	$_SESSION['success'] = 'You have added a new record';
						$this->session->markAsFlashdata('success');
	        	return redirect()->to(base_url('sections'));
	        }
	        else
	        {
	        	$_SESSION['error'] = 'You have an error in adding a new record';
						$this->session->markAsFlashdata('error');
	        	return redirect()->to(base_url('sections'));
	        }
	    }
  	}
  	else
  	{
    	$data['function_title'] = "Adding Section";
      $data['viewName'] = 'Modules\Maintenances\Views\sections\frmSection';
      echo view('App\Views\theme\index', $data);
  	}
  }

  public function edit_section($id)
  {
  	$this->hasPermissionRedirect('edit-section');
  	helper(['form', 'url']);
  	$model = new SectionsModel();
  	$data['rec'] = $model->find($id);

		// die($_POST['status']);

  	if(!empty($_POST))
  	{
			if (!$this->validate('section'))
			{
				$data['errors'] = \Config\Services::validation()->getErrors();
					$data['function_title'] = "Edit of Section";
					$data['viewName'] = 'Modules\Maintenances\Views\sections\frmSection';
					echo view('App\Views\theme\index', $data);
			}
			else
			{
				if($model->edit_maintenance($_POST, $id))
					{
						$_SESSION['success'] = 'You have updated a record';
						$this->session->markAsFlashdata('success');
						return redirect()->to(base_url('sections'));
					}
					else
					{
						$_SESSION['error'] = 'You an error in updating a record';
						$this->session->markAsFlashdata('error');
						return redirect()->to( base_url('sections'));
					}
			}
  	}
  	else
  	{
			$data['function_title'] = "Edit of Section";
			$data['viewName'] = 'Modules\Maintenances\Views\sections\frmSection';
			echo view('App\Views\theme\index', $data);
  	}
  }

			    public function delete_section($id)
			    {
			    	$this->hasPermissionRedirect('delete-section');
			    	$model = new SectionsModel();
			    	$model->delete_maintenance($id);
			    }
}
