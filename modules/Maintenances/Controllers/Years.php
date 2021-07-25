<?php
namespace Modules\Maintenances\Controllers;

use Modules\Maintenances\Models\YearsModel;
use Modules\Maintenances\Models\SectionsModel;
use Modules\TableManagement\Models\CourseModel;
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
  	$this->hasPermissionRedirect('year-and-section');

  	$model = new YearsModel();
    $data['years'] = $model->getYear();

    $data['function_title'] = "List of Year & Sections";
    $data['viewName'] = 'Modules\Maintenances\Views\years\index';
    echo view('App\Views\theme\index', $data);
  }


  public function add_year()
  {
  	$this->hasPermissionRedirect('add-year');

  	helper(['form', 'url']);
  	$model = new YearsModel();
	$course = new CourseModel();
	$section = new SectionsModel();

  	if(!empty($_POST))
  	{
    	if (!$this->validate('year'))
	    {
	      $data['errors'] = \Config\Services::validation()->getErrors();
		  $data['function_title'] = "Adding Year & Section";
		  $data['courses'] = $course->getCourse();
	      $data['viewName'] = 'Modules\Maintenances\Views\years\frmYear';
	      echo view('App\Views\theme\index', $data);
	    }
	    else
	    {

	        if($model->add_maintenance($_POST))
	        {
				unset($_POST['year']);
				$id = $model->insertID();
				$sections = $_POST['section'];
				for($i=1; $i <= $sections; $i++){
					$_POST['section'] = $i;
					$section->add_maintenance($_POST, $id);
				}
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
	  $data['function_title'] = "Adding Year & Section";
	  $data['courses'] = $course->getCourse();
      $data['viewName'] = 'Modules\Maintenances\Views\years\frmYear';
      echo view('App\Views\theme\index', $data);
  	}
  }

  public function edit_year($id)
  {
	//   $this->hasPermissionRedirect('edit-year');
	  helper(['form', 'url']);
	  $model = new YearsModel();
	  $course = new CourseModel();
	  $section = new SectionsModel();

	  $data['rec'] = $model->getYearAndSectionById($id);
	  $data['courses'] = $course->getCourse();
	  if(!empty($_POST))
	  {

		  if (!$this->validate('penaltys'))
		  {
			  //die("here");
				  $data['errors'] = \Config\Services::validation()->getErrors();
			  $data['function_title'] = "Edit Year and Section";
			  $data['viewName'] = 'Modules\Maintenances\Views\years\edit_year';
			  echo view('App\Views\theme\index', $data);
		  }
		  else
		  {
			  if($model->editPenalty($_POST, $id))
			  {
			  //$permissions_model->update_permitted_role($id, $_POST['function_id'], $data['rec']['function_id']);
				  $_SESSION['success'] = 'You have updated a record';
						  $this->session->markAsFlashdata('success');
				  return redirect()->to(base_url('penalty'));
			  }
			  else
			  {
				  $_SESSION['error'] = 'You an error in updating a record';
				  $this->session->markAsFlashdata('error');
				  return redirect()->to( base_url('penalty'));
			  }
		  }
	  }
	  else
	  {
		  $data['function_title'] = "Editing Year and Section";
		  $data['viewName'] = 'Modules\Maintenances\Views\years\edit_year';
		  echo view('App\Views\theme\index', $data);
	  }
  }
	public function delete_year($id)
	{
		$section = new SectionsModel();
		$section->delete_sections($id);
	}

	public function activate_year($id){
		$section = new SectionsModel();
		$section->active_sections($id);
	}


}
