<?php
namespace Modules\Maintenances\Controllers;

use Modules\Maintenances\Models\PenaltiesModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;

class Penalties extends BaseController
{

	public function __construct()
	{
		parent:: __construct();

		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

  public function index()
  {
  	$this->hasPermissionRedirect('list-penalty');

  	$model = new PenaltiesModel();

    $data['penalty'] = $model->getPenalty();

    $data['function_title'] = "List of Penalty Maintenance";
    $data['viewName'] = 'Modules\Maintenances\Views\penalties\index';
    echo view('App\Views\theme\index', $data);
  }


  public function add_penalty()
  {
  	$this->hasPermissionRedirect('add-penalty');

  	helper(['form', 'url']);
  	$model = new PenaltiesModel();

  	if(!empty($_POST))
  	{
    	if (!$this->validate('penalty'))
	    {
	    	$data['errors'] = \Config\Services::validation()->getErrors();
	      $data['function_title'] = "Adding Penalty";
	      $data['viewName'] = 'Modules\Maintenances\Views\penalties\frmPenalty';
	      echo view('App\Views\theme\index', $data);
	    }
	    else
	    {
	        if($model->add_maintenance($_POST))
	        {
	        	$patient_id = $model->insertID();
	        	//$permissions_model->update_permitted_role($role_id, $_POST['function_id']);
	        	$_SESSION['success'] = 'You have added a new record';
						$this->session->markAsFlashdata('success');
	        	return redirect()->to(base_url('penalties'));
	        }
	        else
	        {
	        	$_SESSION['error'] = 'You have an error in adding a new record';
						$this->session->markAsFlashdata('error');
	        	return redirect()->to(base_url('penalties'));
	        }
	    }
  	}
  	else
  	{
    	$data['function_title'] = "Adding Penalty";
      $data['viewName'] = 'Modules\Maintenances\Views\penalties\frmPenalty';
      echo view('App\Views\theme\index', $data);
  	}
  }

  public function edit_penalty($id)
  {
  	$this->hasPermissionRedirect('edit-penalty');
  	helper(['form', 'url']);
  	$model = new PenaltiesModel();
  	$data['rec'] = $model->find($id);

		// die($_POST['status']);

  	if(!empty($_POST))
  	{
			if (!$this->validate('penalty'))
			{
				$data['errors'] = \Config\Services::validation()->getErrors();
					$data['function_title'] = "Edit of Penalty";
					$data['viewName'] = 'Modules\Maintenances\Views\penalties\frmPenalty';
					echo view('App\Views\theme\index', $data);
			}
			else
			{
				if($model->edit_maintenance($_POST, $id))
					{
						$_SESSION['success'] = 'You have updated a record';
						$this->session->markAsFlashdata('success');
						return redirect()->to(base_url('penalties'));
					}
					else
					{
						$_SESSION['error'] = 'You an error in updating a record';
						$this->session->markAsFlashdata('error');
						return redirect()->to( base_url('penalties'));
					}
			}
  	}
  	else
  	{
			$data['function_title'] = "Edit of Penalty";
			$data['viewName'] = 'Modules\Maintenances\Views\penalties\frmPenalty';
			echo view('App\Views\theme\index', $data);
  	}
  }

	public function inactive($id)
	{
		$this->hasPermissionRedirect('delete-penalty');
		$model = new PenaltiesModel();
		$model->inactive_status($id);
	}


	public function active($id)
	{
		$this->hasPermissionRedirect('delete-penalty');
		$model = new PenaltiesModel();
		$model->active_status($id);
	}
}
