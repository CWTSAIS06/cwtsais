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
  	// $this->hasPermissionRedirect('year-and-section');

	$model = new YearsModel();
	$courseModel = new CourseModel();

	$years = $model->getYear();
	foreach($years as $key => $year){
		$course = $courseModel->getCourseById($year['course_id']);
		$years[$key]['courses'] = $course['course'];
	}
	// print_r($years[0]);

    $data['years'] = $years;
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
			$db = \Config\Database::connect();
			$year = $_POST['year'];
			$course_id = $_POST['course_id'];
	
			$str = "SELECT p.* FROM years p WHERE p.status = 'a' AND p.year = '$year' AND p.course_id = '$course_id'";
			$query = $db->query($str)->getResultArray();
		
	        if($model->add_maintenance($_POST))
	        {
				if(empty($query)){
					unset($_POST['year']);
					$id = $model->insertID();
					$sections = $_POST['section'];
					for($i=1; $i <= $sections; $i++){
						$_POST['section'] = $i;
						
						$section->add_maintenance($_POST, $id);
					}
				}else{
					$id = $query[0]['id'];
					$sections = $_POST['section'];
					for($i=1; $i <= $sections; $i++){
						$_POST['section'] = $i;
						
						$section->add_maintenance($_POST, $id);
					}
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

	  $data['rec'] = $section->getSectionById($id);
	  $data['courses'] = $course->getCourse();
	  if(!empty($_POST))
	  {
	
		if($section->edit_maintenance($_POST, $id))
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
	  else
	  {
		  $data['function_title'] = "Editing Year and Section";
		  $data['viewName'] = 'Modules\Maintenances\Views\years\frmYear';
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
