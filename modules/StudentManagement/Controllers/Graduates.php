<?php
namespace Modules\StudentManagement\Controllers;

use Modules\StudentManagement\Models\StudentModel;
use Modules\StudentManagement\Models\EnrollModel;
use Modules\TableManagement\Models\SchoolyearModel;
use Modules\TableManagement\Models\CourseModel;
use Modules\TableManagement\Models\SubjectModel;
use App\Controllers\BaseController;
use App\Libraries\pdf;

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
		        $data['viewName'] = 'Modules\StudentManagement\Views\graduates\frmGraduate';
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
	        $data['viewName'] = 'Modules\StudentManagement\Views\graduates\frmGraduate';
	        echo view('App\Views\theme\index', $data);
    	}
	}
	
	
    public function edit_graduate($id)
    {
    	helper(['form', 'url']);
    	$model = new StudentModel();
    	$data['rec'] = $model->find($id);


    	if(!empty($_POST))
    	{

	    	if (!$this->validate('graduates'))
		    {
				//die("here");
				$data['errors'] = \Config\Services::validation()->getErrors();
		        $data['function_title'] = "Editing of Serial No.";
		        $data['viewName'] = 'Modules\StudentManagement\Views\graduates\frmGraduate';
		        echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
		    	if($model->editSerialNum($_POST, $id))
		        {
		        	$_SESSION['success'] = 'You have updated a record';
					$this->session->markAsFlashdata('success');
		        	return redirect()->to(base_url('graduates'));
		        }
		        else
		        {
		        	$_SESSION['error'] = 'You an error in updating a record';
					$this->session->markAsFlashdata('error');
		        	return redirect()->to( base_url('graduates'));
		        }
		    }
    	}
    	else
    	{
	    	$data['function_title'] = "Editing of Serial No.";
	        $data['viewName'] = 'Modules\StudentManagement\Views\graduates\frmGraduate';
	        echo view('App\Views\theme\index', $data);
    	}
    }

	public function insert_graduates()
	{
		$studentModel = new StudentModel;
		$courseModel = new CourseModel;
		$schoolyearModel = new SchoolyearModel;
		$subjectModel = new SubjectModel;

		$csvFile = $_POST['file'];
		$lineCount = 0;
		$returnArr = array();

		$returnArr["with_error"] = 0;
		$returnArr["line_number"] = 0;
		$returnArr["message"] = "";

		$created = date('Y-m-d H:i:s');

		$columnCount = 11;
	
		foreach($csvFile as $file){
		
			$serial_num = trim($file['serial_no']);
			$firstname = trim($file['first_name']);
			$middlename = trim($file['middle_name']);
			$lastname = trim($file['last_name']);
			$course_abbrev = trim($file['course']);
			$date_of_birth = $file['date_of_birth'];
			$age = trim($file['age']);
			$gender = trim($file['gender']);
			$address = '"'.trim($file['address']).'"';
			$contact_no = trim($file['tel_no']);
			$school_year = trim($file['school_year']);
		

			$db = \Config\Database::connect();
			try {
				$course = $courseModel->getCourseByName($course_abbrev);

				if($course){
					$course_id = $course['id'];
				}else{
					$if_exists_course = $db->query("SELECT course FROM course WHERE course = '$course_abbrev' ");
				
					if(count($if_exists_course->getResultArray()) > 0){
						$db->query("UPDATE course SET course = '$course_abbrev' AND description = ' '");
					}else{
						$db->query( "INSERT INTO course (course,description,status,created_at)
						VALUES ('$course_abbrev','','a','$created')
						ON DUPLICATE KEY UPDATE course = '$course_abbrev'");
					}

					$course = $courseModel->getCourseByName($course_abbrev);
					$course_id = $course['id'];
				
				}

				$schoolyear = $schoolyearModel->getCurrentSchoolYear($school_year);
				
				if($schoolyear){
					$sy_id = $schoolyear['id'];
				}else{
					$if_exists_schoolyear = $db->query("SELECT schyear FROM schyear WHERE schyear = '$school_year' ");
			
					if(count($if_exists_schoolyear->getResultArray()) > 0){
						$db->query("UPDATE schyear SET schyear = '$school_year'");
					}else{
						$db->query( "INSERT INTO schyear (schyear,status,created_at)
						VALUES ('$school_year','a','$created')
						ON DUPLICATE KEY UPDATE schyear = '$school_year'   ");
					}

					$schoolyear = $schoolyearModel->getCurrentSchoolYear($school_year);
					$sy_id = $schoolyear['id'];

				}

				if($gender == 'm' || $gender == 'M' || $gender == 'male' || $gender == 'Male' ){
					$gender = 1;
				}else if ($gender == 'f' || $gender == 'F' || $gender == 'female' || $gender == 'Female') {
					$gender = 2;
				}
				$birthdate = (date('Y-m-d', strtotime($date_of_birth))) ?? '';
				
				$if_exists_student = $db->query("SELECT stud_num FROM student WHERE stud_num = '$serial_num' ");
				if(count($if_exists_student->getResultArray()) > 0){
					$db->query("UPDATE student SET serial_num = '$serial_num'");
				}else{
					$db->query( "INSERT INTO student (serial_num,stud_num, firstname, lastname,middlename,course_id, schyear_id,birthdate,age,gender,address,contact_no,status,created_at)
					VALUES ('$serial_num','$serial_num','$firstname','$lastname','$middlename','$course_id', '$sy_id','$birthdate','$age',$gender,$address,'$contact_no','a','$created')
					ON DUPLICATE KEY UPDATE serial_num = '$serial_num'   ");

				}
			
				$student = $studentModel->getStudentByStudnum($serial_num);
				$student_id = ($student['id'] !== '') ? $student['id']:'0';
				
				$if_exists_enrolled = $db->query("SELECT stud_num FROM enrollment WHERE stud_num = '$serial_num'");

				if(count($if_exists_enrolled->getResultArray()) > 0){
					$db->query("UPDATE enrollment SET status = 'g' ");
				}else{
					$db->query( "INSERT IGNORE INTO enrollment (schyear_id,student_id,stud_num,status,created_at)
					VALUES ('$sy_id','$student_id','$serial_num','g','$created')
					ON DUPLICATE KEY UPDATE stud_num = '$serial_num', status = 'g' ");
				}

			} catch (\Exception $error) {
				$returnArr["with_error"] = 1;
				$returnArr["line_number"] = $lineCount+1;
				$returnArr["message"] = $error->errorInfo[2];
				print_r($error);

				break 1;
			}

			

			$lineCount++;
		}

		echo json_encode( $returnArr );
	}

}
