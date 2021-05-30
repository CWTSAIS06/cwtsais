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

    public function index($offset = 0)
    {
    	$this->hasPermissionRedirect('list-attendance');
    	$model = new AttendanceModel();
       	$data['attendances'] = $model->getAttendances();
        $data['function_title'] = "Attendance Section";
        $data['viewName'] = 'Modules\Attendance\Views\attendances\frmAttendance';
        echo view('Modules\Attendance\Views\attendances\header', $data);
        echo view('Modules\Attendance\Views\attendances\frmAttendance', $data);
        echo view('Modules\Attendance\Views\attendances\footer', $data);
    }
	public function timeout(){
			$studentModel = new StudentModel();
			$attendanceModel = new AttendanceModel();
			$students = $studentModel->getSpecificStudent($_POST['stud_num']);
			$attendance = $attendanceModel->getAttendance($students[0]['id']);

			if( empty($students)) {
				die('error');
			} else {
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
		}
		else {
		if ($attendance[0]['timeout'] == null) {
				if ($attendanceModel->timeOut($attendance[0]['id'])) {
					if (!empty($penaltyModel->getPenaltyByEnrollId($data['enroll_id'])[0]['hours'])) {
						$required = $penaltyModel->getPenaltyByEnrollId($data['enroll_id'])[0]['hours'] +  $students[0]['required_hrs'];
					} else {
						$required =  $students[0]['required_hrs'];
					}
						$total = 0;
					foreach ($attendanceModel->getAttendancesByEnrollId($students[0]['id']) as $attendance) {
						$total += number_format((float)(abs(strtotime($attendance['timein']) - strtotime($attendance['timeout'])) / 60) / 60, 2, '.', '');
					}
					if ($required <= $total) {
						if ($enrollModel->markComplete($students[0]['id'])) {
							$_SESSION['success'] = 'You have succesfully finished the subject!';
							$this->session->markAsFlashdata('success');
							return redirect()->to(base_url('attendance'));
						} else {
							$_SESSION['success'] = 'Something Went Wrong!';
							$this->session->markAsFlashdata('error');
							return redirect()->to(base_url('attendance'));
						}
					}
					$_SESSION['success'] = 'You have succesfully time out!';
					$this->session->markAsFlashdata('success');
					return redirect()->to(base_url('attendance'));
				} else {
					$_SESSION['success'] = 'Something Went Wrong!';
					$this->session->markAsFlashdata('error');
					return redirect()->to(base_url('attendance'));
				}
			}
		else {
		if($attendanceModel->insertAttendance($data)){
					$_SESSION['success'] = 'You have succesfully time in!';
					$this->session->markAsFlashdata('success');
					return redirect()->to(base_url('attendance'));
				} else {
					$_SESSION['error'] = 'Something Went Wrong';
					$this->session->markAsFlashdata('error');
					return redirect()->to(base_url('attendance'));
				}
			}
		}

	} else{
		$_SESSION['error'] = 'Data Not Found';
		$this->session->markAsFlashdata('error');
		return redirect()->to(base_url('attendance'));
	}
}
// public function show_attendance(){
// 		$this->hasPermissionRedirect('list-attendance');
// 		$model = new AttendanceModel();
// 		$data['all_items'] = $model->getAttendanceWithCondition(['status'=> 'a']);
// 		$data['offset'] = $offset;
// 		$data['attendance'] = $model->getAttendanceWithFunction(['status'=> 'a','limit' => PERPAGE, 'offset' =>  $offset]);
// 		$data['function_title'] = "Attendance Section";
// 		$data['viewName'] = 'Modules\Attendance\Views\attendances\index';
// 		echo view('App\Views\theme\index', $data);
// }

}
