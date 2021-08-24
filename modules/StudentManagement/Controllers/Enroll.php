<?php
namespace Modules\StudentManagement\Controllers;

use Modules\StudentManagement\Models\StudentModel;
use Modules\StudentManagement\Models\EnrollModel;
use Modules\TableManagement\Models\CourseModel;
use Modules\TableManagement\Models\SchoolyearModel;
use Modules\TableManagement\Models\SubjectModel;
use Modules\UserManagement\Models\PermissionsModel;
use Modules\UserManagement\Models\UsersModel;
use Modules\Maintenances\Models\YearsModel;
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
		$model = new EnrollModel();
		$courseModel = new CourseModel();
		$yearsModel = new YearsModel();


		$data['courses'] = $courseModel->getCourse();
		$data['sections'] = $yearsModel->getYearAndSection();
		
		if($_SESSION['rid'] == '4'){
			$enrolled = $model->getEnrolledByProfessorId($_SESSION['uid']);
			$data['students'] = $enrolled;

			if(!empty($_POST)){
				$yearAndSection = explode('-',$_POST['year_section']);
				$year = $yearAndSection[0];
				$section = $yearAndSection[1];
				$enrolled = $model->getEnrolledByProfessorByCourseYS($_SESSION['uid'],$_POST['course_id'],$year,$section,$_POST['gender']);
				$data['students'] = $enrolled;
				$_POST['section_id'] = $section;
				$_POST['year_id'] = $year;
				$data['rec'] = $_POST;
			}
		}else{
			$enrolled = $model->getStudents();
			$data['students'] = $enrolled;

			if(!empty($_POST)){
				$yearAndSection = explode('-',$_POST['year_section']);
				$year = $yearAndSection[0];
				$section = $yearAndSection[1];
				$enrolled = $model->getStudentsByCourseYS($_POST['course_id'],$year,$section,$_POST['gender']);
				$data['students'] = $enrolled;
				
				$_POST['section_id'] = $section;
				$_POST['year_id'] = $year;
				$data['rec'] = $_POST;
			}

		}
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
	       $data['function_title'] = "Enrollment";
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
    	helper(['form', 'url']);

		$permissions_model = new PermissionsModel();
    	$course_model = new CourseModel();
    	$schyear_model = new SchoolyearModel();
		$model = new EnrollModel();
		$student_model = new StudentModel();
		$subject_model = new SubjectModel();
		$user_model = new UsersModel();
		
    	$data['permissions'] = $this->permissions;
    	$data['course'] = $this->course;
    	$data['schyear'] = $schyear_model->getCurrentSchoolYear(date('Y'));
		$data['subjects'] = $subject_model->getSubjectWithCondition(['status' => 'a']);
		$data['students'] = $student_model->getStudentByUserId($_SESSION['uid']);
		$data['professors'] = $user_model->getProfessors();



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
				$time_interval = explode(',',$_POST['schedule']);
				$start_time = date("H:i:s", strtotime($time_interval[0]));
				$end_time = date("H:i:s", strtotime($time_interval[1]));
				$_POST['start_time'] = $start_time;
				$_POST['end_time'] = $end_time;
				unset($_POST['schedule']);
				$isEnrolled = $model->selectStudent($_POST['student_id']);
				$canEnrolledNSTP2 = $model->checkIfEnrolledNstp1($_POST['student_id']);
				//next step check if already complete to previous subject

				if($_POST['subject_id'] == 1){
						$isEnrolledNstp1 = $model->checkIfEnrolledNstp1($_POST['student_id']);

					if (empty($isEnrolledNstp1)){

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
						$_SESSION['error1'] = 'You are already enrolled NSTP1!';
						$this->session->markAsFlashdata('error1');
						return redirect()->to(base_url('enroll/enrollStudent'));
					}

				}

				if($_POST['subject_id'] == 2){
					$isCompleteNstp1 = $model->checkIfCompleteNstp1($_POST['student_id']);

					$isEnrolledNstp2 = $model->checkIfEnrolledNstp2($_POST['student_id']);
				
					if($isCompleteNstp1){
						
						if (empty($isEnrolledNstp2)){
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
							$_SESSION['error1'] = 'You are already enrolled NSTP2!';
							$this->session->markAsFlashdata('error1');
							return redirect()->to(base_url('enroll/enrollStudent'));
						}
					}else{
						$_SESSION['error1'] = 'Your subject NSTP1 is not enrolled first or not complete';
						$this->session->markAsFlashdata('error1');
						return redirect()->to(base_url('enroll/enrollStudent'));
					}
				
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
