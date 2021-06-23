<?php
namespace Modules\StudentManagement\Controllers;

use Modules\StudentManagement\Models\StudentModel;
use Modules\StudentManagement\Models\EnrollModel;
use Modules\TableManagement\Models\CourseModel;
use Modules\TableManagement\Models\SchoolyearModel;
use Modules\TableManagement\Models\SubjectModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;

class Enroll extends BaseController
{

	public function __construct()
	{
		parent:: __construct();
		$course_model = new CourseModel();
		$schyear_model = new SchoolyearModel();
		$this->course = $course_model->getCourseWithCondition(['status' => 'a']);
		$this->schyear = $schyear_model->getSchoolyearWithCondition(['status' => 'a']);
	}

    public function index($offset = 0)
    {
    	$this->hasPermissionRedirect('list-student');

    	$model = new EnrollModel();
		$data['students'] = $model->getStudents();
        $data['function_title'] = "List of Enrolled Students";
        $data['viewName'] = 'Modules\StudentManagement\Views\enroll\index';
        echo view('App\Views\theme\index', $data);
    }

    public function add_enroll()
    {
    	$this->hasPermissionRedirect('enroll-student');

    	$permissions_model = new PermissionsModel();
    	$course_model = new CourseModel();
    	$schyear_model = new SchoolyearModel();
			$model = new EnrollModel();
			$student_model = new StudentModel();
			$subject_model = new SubjectModel();

    	$data['permissions'] = $this->permissions;
    	$data['course'] = $this->course;
    	$data['schyear'] = $this->schyear;
			$data['subjects'] = $subject_model->getSubjectWithCondition(['status' => 'a']);
			$data['students'] = $student_model->getStudent();
    	helper(['form', 'url']);

    	if(!empty($_POST))
    	{
	    	if (!$this->validate('enroll'))
		    {
		    	$data['errors'] = \Config\Services::validation()->getErrors();
		       $data['function_title'] = "Adding of Student";
		       $data['viewName'] = 'Modules\StudentManagement\Views\enroll\frmEnroll';
		       echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
						// print_r($student_model->selectStudent('2018-00293-TG-0'));
						// die();
		        if (count($model->selectStudent($_POST['stud_id'])) == 0) {
							$_POST['stud_id'] = $student_model->selectStudent($_POST['stud_id'])[0]['id'];
							if($model->addStudentEnroll($_POST))
			        {
			        	$_SESSION['success'] = 'You have added a new record';
								$this->session->markAsFlashdata('success');
			        	return redirect()->to(base_url('enroll'));
			        }
			        else
			        {
			        	$_SESSION['error'] = 'You have an error in adding a new record';
								$this->session->markAsFlashdata('error');
			        	return redirect()->to(base_url('enroll'));
			        }
		        } else {
							$_SESSION['error'] = 'This student is currently enrolled';
							$this->session->markAsFlashdata('error');
							return redirect()->to(base_url('enroll'));
						}
		    }
    	}
    	else
    	{
	    	$data['function_title'] = "Adding of Student";
	       $data['viewName'] = 'Modules\StudentManagement\Views\enroll\frmEnroll';
	       echo view('App\Views\theme\index', $data);
    	}
    }
	public function delete_student($id)
	{
			$this->hasPermissionRedirect('delete-student');
		$model = new EnrollModel();
		$model->deleteStudent($id);
	}

	public function enroll_student(){

		$permissions_model = new PermissionsModel();
    	$course_model = new CourseModel();
    	$schyear_model = new SchoolyearModel();
		$model = new EnrollModel();
		$student_model = new StudentModel();
		$subject_model = new SubjectModel();

    	$data['permissions'] = $this->permissions;
    	$data['course'] = $this->course;
    	$data['schyear'] = $schyear_model->getCurrentSchoolYear(date('Y'));
		$data['subjects'] = $subject_model->getSubjectWithCondition(['status' => 'a']);
		$data['students'] = $student_model->getStudentByUserId($_SESSION['uid']);

    	helper(['form', 'url']);


    	if(!empty($_POST))
    	{

	    	if (!$this->validate('enroll'))
		    {
		    	$data['errors'] = \Config\Services::validation()->getErrors();
		       $data['function_title'] = "Enrollment";
		       $data['viewName'] = 'Modules\StudentManagement\Views\enroll\enroll_student';
		       echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
				$isEnrolled = $model->selectStudent($_POST['student_id']);
				//next step check if already complete to previous subject
		        if (!isset($isEnrolled)){
					$subject = $subject_model->getSubjectWithCondition(['id' => $_POST['subject_id']]);
					$_POST['required_hrs'] = $subject[0]['required_hrs'];
					if($model->addStudentEnroll($_POST))
					{
						$_SESSION['success'] = 'You are now enrolled!';
						$this->session->markAsFlashdata('success');
						return redirect()->to(base_url('enroll/enrollStudent'));
					}
					else
					{
						$_SESSION['error1'] = 'You have an error in adding a new record';
						$this->session->markAsFlashdata('error1');
						return redirect()->to(base_url('enroll/enrollStudent'));
					}
		        } else {
					$_SESSION['error1'] = 'You are currently enrolled or not complete';
					$this->session->markAsFlashdata('error1');
					return redirect()->to(base_url('enroll/enrollStudent'));
				}
		    }
    	}
    	else
    	{
		   $data['function_title'] = "Enrollment";
	       $data['viewName'] = 'Modules\StudentManagement\Views\enroll\enroll_student';
	       echo view('App\Views\theme\index', $data);
    	}
	}

}
