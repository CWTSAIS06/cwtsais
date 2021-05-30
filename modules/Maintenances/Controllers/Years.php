<?php
namespace Modules\Maintenances\Controllers;

use Modules\Maintenances\Models\YearsModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;

class Years extends BaseController
{

	public function __construct()
	{
		parent:: __construct();

		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

  public function index()
  {
  	$this->hasPermissionRedirect('list-year');

  	$model = new YearsModel();

    $data['year'] = $model->getYear();

    $data['function_title'] = "Year List";
    $data['viewName'] = 'Modules\Maintenances\Views\years\index';
    echo view('App\Views\theme\index', $data);
  }


  public function add_year()
  {
  	$this->hasPermissionRedirect('add-year');

  	helper(['form', 'url']);
  	$model = new YearsModel();

  	if(!empty($_POST))
  	{
    	if (!$this->validate('year'))
	    {
	    	$data['errors'] = \Config\Services::validation()->getErrors();
	      $data['function_title'] = "Adding Year";
	      $data['viewName'] = 'Modules\Maintenances\Views\years\frmYear';
	      echo view('App\Views\theme\index', $data);
	    }
	    else
	    {
	        if($model->add_maintenance($_POST))
	        {
	        	$_SESSION['success'] = 'You have added a new record';
						$this->session->markAsFlashdata('success');
	        	return redirect()->to(base_url('years'));
	        }
	        else
	        {
	        	$_SESSION['error'] = 'You have an error in adding a new record';
						$this->session->markAsFlashdata('error');
	        	return redirect()->to(base_url('years'));
	        }
	    }
  	}
  	else
  	{
    	$data['function_title'] = "Adding Year";
      $data['viewName'] = 'Modules\Maintenances\Views\years\frmYear';
      echo view('App\Views\theme\index', $data);
  	}
  }

  public function edit_year($id)
  {
  	$this->hasPermissionRedirect('edit-year');
  	helper(['form', 'url']);
  	$model = new YearsModel();
  	$data['rec'] = $model->find($id);

		// die($_POST['status']);

  	if(!empty($_POST))
  	{
			if (!$this->validate('year'))
			{
				$data['errors'] = \Config\Services::validation()->getErrors();
					$data['function_title'] = "Edit of Year";
					$data['viewName'] = 'Modules\Maintenances\Views\years\frmYear';
					echo view('App\Views\theme\index', $data);
			}
			else
			{
				if($model->edit_maintenance($_POST, $id))
					{
						$_SESSION['success'] = 'You have updated a record';
						$this->session->markAsFlashdata('success');
						return redirect()->to(base_url('years'));
					}
					else
					{
						$_SESSION['error'] = 'You an error in updating a record';
						$this->session->markAsFlashdata('error');
						return redirect()->to( base_url('years'));
					}
			}
  	}
  	else
  	{
			$data['function_title'] = "Edit of Year";
			$data['viewName'] = 'Modules\Maintenances\Views\years\frmYear';
			echo view('App\Views\theme\index', $data);
  	}
  }
	public function delete_year($id)
	{
		$this->hasPermissionRedirect('delete-year');
		$model = new YearsModel();
		$model->delete_maintenance($id);
	}
}
