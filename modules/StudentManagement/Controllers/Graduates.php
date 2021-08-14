<?php
namespace Modules\StudentManagement\Controllers;

use Modules\StudentManagement\Models\StudentModel;
use Modules\StudentManagement\Models\EnrollModel;
use Modules\TableManagement\Models\SchoolyearModel;
use Modules\TableManagement\Models\CourseModel;
use App\Controllers\BaseController;

class Graduates extends BaseController
{

	public function __construct()
	{
		parent:: __construct();

	}

	public function index(){
		$enroll = new EnrollModel;
		$schoolyearModel = new SchoolyearModel;
		$courseModel = new CourseModel;
		$graduates = $enroll->getAllGraduates();
		$data['graduates'] = $graduates;
		$data['schoolyears'] = $schoolyearModel->getSchoolyear();
		$data['courses'] = $courseModel->getCourse();

		if(!empty($_POST)){
			$graduates = $enroll->getAllGraduatesByCourseSY($_POST['course_id'],$_POST['schyear_id'],$_POST['gender']);
			$data['graduates'] = $graduates;	
			$data['rec'] = $_POST;
		}
		
		$data['function_title'] = "List of NSTP Graduates";
        $data['viewName'] = 'Modules\StudentManagement\Views\graduates\index';
        echo view('App\Views\theme\index', $data);
	}


	public function add()
    {
    	helper(['form', 'url']);
		$enroll = new EnrollModel;

    	if(!empty($_POST))
    	{
	    	if (!$this->validate('graduates'))
		    {
		    	$data['errors'] = \Config\Services::validation()->getErrors();
		        $data['function_title'] = "Adding of Graduates";
		        $data['viewName'] = 'Modules\TableManagement\Views\graduate\frmGraduate';
		        echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
		        if($model->add($_POST))
		        {
		        	//$role_id = $model->insertID();
		        	//$permissions_model->update_permitted_role($role_id, $_POST['function_id']);
		        	$_SESSION['success'] = 'You have added a new record';
					$this->session->markAsFlashdata('success');
		        	return redirect()->to(base_url('course'));
		        }
		        else
		        {
		        	$_SESSION['error'] = 'You have an error in adding a new record';
					$this->session->markAsFlashdata('error');
		        	return redirect()->to(base_url('course'));
		        }
		    }
    	}
    	else
    	{

	    	$data['function_title'] = "Adding of Programs";
	        $data['viewName'] = 'Modules\TableManagement\Views\graduate\frmGraduate';
	        echo view('App\Views\theme\index', $data);
    	}
    }

}
