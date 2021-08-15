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
	
	public function insert_graduates()
	{
		$studentModel = new StudentModel;
		$courseModel = new CourseModel;
		$schoolyearModel = new SchoolyearModel;

		$csvFile = $_POST['file'];
		$lineCount = 0;
		$returnArr = array();

		$returnArr["with_error"] = 0;
		$returnArr["line_number"] = 0;
		$returnArr["message"] = "";

		$created = date('Y-m-d H:i:s');

		$columnCount = 12;
		foreach($csvFile as $file){

			$dataFile = explode(",", $file);
            if (count($dataFile) !== $columnCount) {
				$returnArr["with_error"] = 1;
				$returnArr["line_number"] = $lineCount+1;
				$returnArr["message"] = "invalid parameter count ( possible unwanted comma detected )";
				break 1;
			}

            $serial_num = trim($dataFile[0]);
			$stud_num = trim($dataFile[1]);
			$firstname = trim($dataFile[2]);
			$lastname = trim($dataFile[3]);
			$middlename = trim($dataFile[4]);
			$course = trim($dataFile[5]);
			$birthdate = trim($dataFile[6]);
			$age = trim($dataFile[7]);
			$gender = trim($dataFile[8]);
			$address = trim($dataFile[9]);
			$contact_no = trim($dataFile[10]);
			$school_year = trim($dataFile[11]);


			if($lineCount == 0){

				// check for correct header
				if($serial_num != "Serial No" || $stud_num != "Student No" || $firstname != "First Name" || $lastname != "Last Name"  || $middlename != "Middle Name" || $course != "Course" || $birthdate != "Date of Birth"
				|| $age != "Age" || $gender != "Gender" || $address != "Address" || $contact_no != "Contact No" || $school_year != "School Year"){
					$returnArr["with_error"] = 1;
					$returnArr["line_number"] = $lineCount+1;
					$returnArr["message"] = "invalid header";
					break 1;
				}

			}
			else {
				

                // if(!ctype_alnum($code)){
				// 	$returnArr["with_error"] = 1;
				// 	$returnArr["line_number"] = $lineCount+1;
				// 	$returnArr["message"] = "Invalid characters found for account classification code. Please use letters and numbers only.";
				// 	break 1;
				// }
				// print_r($dataFile);

				$db = \Config\Database::connect();
                try {
					$course = $courseModel->getCourseByName($course);
					$course_id = $course['id'];
					$schoolyear = $schoolyearModel->getCurrentSchoolYear($school_year);
					$sy_id = $schoolyear['id'];
			
					if($gender == 'm' || $gender == 'M' || $gender == 'male' || $gender == 'Male' ){
						$gender = 1;
					}else if ($gender == 'f' || $gender == 'F' || $gender == 'female' || $gender == 'Female') {
						$gender = 2;
					}
					$db->query( "INSERT INTO student (serial_num,stud_num, firstname, lastname,middlename,course_id,birthdate,age,gender,address,contact_no,status,created_at)
					VALUES ('$serial_num','$stud_num','$firstname','$lastname','$middlename','$course_id','$birthdate','$age',$gender,'$address','$contact_no','a','$created')
					ON DUPLICATE KEY UPDATE serial_num = '$serial_num', stud_num = '$stud_num', firstname = '$firstname' ");
					
					$student = $studentModel->getStudentByStudnum($stud_num);
					$student_id = $student['id'];
					
					$db->query( "INSERT INTO enrollment (schyear_id,student_id,stud_num,status,created_at)
					VALUES ('$sy_id','$student_id','$stud_num','g','$created')
					ON DUPLICATE KEY UPDATE stud_num = '$stud_num', status = 'g' ");

				} catch (\Exception $error) {
					$returnArr["with_error"] = 1;
					$returnArr["line_number"] = $lineCount+1;
					$returnArr["message"] = $error->errorInfo[2];
					print_r($error);

					break 1;
				}

			}

			$lineCount++;
		}

		echo json_encode( $returnArr );
	}

}
