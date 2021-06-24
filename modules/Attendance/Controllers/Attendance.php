<?php
namespace Modules\Attendance\Controllers;

use Modules\Attendance\Models\AttendanceModel;
use Modules\PenaltyManagement\Models\PenaltyModel;
use Modules\StudentManagement\Models\StudentModel;
use Modules\StudentManagement\Models\EnrollModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;

class Attendance extends BaseController
{

	public function __construct()
	{
		parent:: __construct();
		$studentModel = new StudentModel();
		$attendanceModel = new AttendanceModel();
		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

	public function message($to = 'World')
	{
		echo "Hello {$to}!".PHP_EOL;
	}

    public function index($offset = 0)
    {
    	$this->hasPermissionRedirect('list-attendance');
		$model = new AttendanceModel();
		$penaltyModel = new PenaltyModel();
		// print_r($_SESSION['uid']);
		if($_SESSION['rid'] == 3){
			$attendances = $model->getAttendancesAndPenaltyByUserId($_SESSION['uid']);
			
		}else{
			$attendances = $model->getAttendances();
		}
	
       	$data['attendances'] = $attendances;
        $data['function_title'] = "Attendance Section";
        $data['viewName'] = 'Modules\Attendance\Views\attendances\frmAttendance';
        echo view('Modules\Attendance\Views\attendances\header', $data);
        echo view('Modules\Attendance\Views\attendances\frmAttendance', $data);
		echo view('Modules\Attendance\Views\attendances\footer', $data);
		echo view('Modules\Attendance\Views\attendances\notification', $data);
		
    }
	public function timeout(){
		$studentModel = new StudentModel();
		$attendanceModel = new AttendanceModel();
		$students = $studentModel->getSpecificStudent($_POST['stud_num']);
		$attendance = $attendanceModel->getAttendance($students[0]['id']);

		if( empty($students)){
			die('error');
		}else{
			$attendanceModel->timeOut($students[0]['id']);{
			$_SESSION['success'] = 'You have succesfully time out!';
			$this->session->markAsFlashdata('success');
			return redirect()->to(base_url('attendance'));
		}
	}


	}
public function verify(){
	$studentModel = new StudentModel();
	$enrollModel = new EnrollModel();
	$penaltyModel = new PenaltyModel();
	$attendanceModel = new AttendanceModel();
	$students = $enrollModel->selectSpecificEnroll($_POST['stud_num']);

	if(!empty($students) ) {
		$data['enroll_id'] = $students[0]['id'];
		$attendance = $attendanceModel->getAttendance($students[0]['id']);

		if (empty($attendance)) {
			if($attendanceModel->insertAttendance($data)){
				$_SESSION['success'] = 'You have succesfully time in!';
				$this->session->markAsFlashdata('success');
				return redirect()->to(base_url('attendance'));
			} else {
				$_SESSION['success'] = 'Something Went Wrong!';
				$this->session->markAsFlashdata('error');
				return redirect()->to(base_url('attendance'));
			}
		} else {
			$_SESSION['error'] = 'You already time-in this day';
			$this->session->markAsFlashdata('error');
			return redirect()->to(base_url('attendance'));
		}

	} else{
		$_SESSION['error1'] = 'Student Number Not Found';
		$this->session->markAsFlashdata('error1');
		return redirect()->to(base_url('attendance'));
	}
}

public function attendance_time_out(){
	$studentModel = new StudentModel();
	$enrollModel = new EnrollModel();
	$penaltyModel = new PenaltyModel();
	$attendanceModel = new AttendanceModel();
	$students = $enrollModel->selectSpecificEnroll($_POST['student_number']);
	if(!empty($students) ) {
		$data['enroll_id'] = $students[0]['id'];
		$attendance = $attendanceModel->getAttendance($students[0]['id']);

		if ($attendance[0]['timeout'] == null) {
			if ($attendanceModel->timeOut($attendance[0]['id'])) {
				$enrolled = $enrollModel->getEnrolledById($attendance[0]['enroll_id']);
				$current_attendance = $attendanceModel->getAttendanceById($attendance[0]['id']);
					$total = number_format((float)(abs(strtotime($current_attendance[0]['timein']) - strtotime($current_attendance[0]['timeout'])) / 60) / 60, 2, '.', '');
					$total_hrs = number_format($enrolled['accumulated_hrs'], 2, '.', '') + number_format($total, 2, '.', '');
					$enrollModel->updateAccumulatedHours($total_hrs, $attendance[0]['enroll_id']);

				// if (!isset($penaltyModel->getPenaltyByEnrollId($data['enroll_id'])[0]['hours'])) {
				// 	$required = $penaltyModel->getPenaltyByEnrollId($data['enroll_id'])[0]['hours'] +  $students[0]['required_hrs'];
				// } else {
				// 	$required =  $students[0]['required_hrs'];
				// }
				// 	$total = 0;
				// foreach ($attendanceModel->getAttendancesByEnrollId($students[0]['id']) as $attendance) {
				// 	$total += number_format((float)(abs(strtotime($attendance['timein']) - strtotime($attendance['timeout'])) / 60) / 60, 2, '.', '');
				// }
				// if ($required <= $total) {
				// 	if ($enrollModel->markComplete($students[0]['id'])) {
				// 		$_SESSION['success'] = 'You have succesfully finished the subject!';
				// 		$this->session->markAsFlashdata('success');
				// 		return redirect()->to(base_url('attendance'));
				// 	} else {
				// 		$_SESSION['error'] = 'Something Went Wrong!';
				// 		$this->session->markAsFlashdata('error');
				// 		return redirect()->to(base_url('attendance'));
				// 	}
				// }
				$_SESSION['success'] = 'You have succesfully time out!';
				$this->session->markAsFlashdata('success');
				return redirect()->to(base_url('attendance'));
			} else {
				$_SESSION['error'] = 'Something Went Wrong!';
				$this->session->markAsFlashdata('error');
				return redirect()->to(base_url('attendance'));
			}
		}else{
			// if($attendanceModel->insertAttendance($data)){
			// 	$_SESSION['success'] = 'You have succesfully time in!';
			// 	$this->session->markAsFlashdata('success');
			// 	return redirect()->to(base_url('attendance'));
			// }else{
				$_SESSION['error'] = "You cant time out again! Please Time-in on another day!";
				$this->session->markAsFlashdata('error');
				return redirect()->to(base_url('attendance'));
			// }
		}
	} else{
		$_SESSION['error1'] = 'Student Number Not Found';
		$this->session->markAsFlashdata('error1');
		return redirect()->to(base_url('attendance'));
	}
		
}

}
