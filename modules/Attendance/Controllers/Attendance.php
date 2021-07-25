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
		$model = new AttendanceModel();
		$penaltyModel = new PenaltyModel();
		
		$attendances = $model->getAttendances();
	
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
			if(empty($attendance)){
				$schedule = $enrollModel->getStudentSchedule(date('l'),$students[0]['student_id'], date('H:i:s', time()));

				if(!empty($schedule)){
						//check if student is late less than 60 minutes
						$start_time = strtotime($schedule['start_time']);
						$current_time = time();
						// $from_time = strtotime('13:34:00');
						$difference = $start_time - $current_time;
						$difference_minute =  $difference/60;
					
						if(abs(intval($difference_minute)) <= 60){
							//split hrs and minute
							$old_required = explode('.',$schedule['required_hrs']);
							//add old required_hrs minutes to penalty minutes
							$old_required_minutes = isset($old_required[1]) ? $old_required[1]:'00';
							$total_added_time = strtotime('00:'.$old_required_minutes.'+ '.abs(intval($difference_minute)).' minutes' );
							//split new added time to hrs and minutes again
							$split_time =  explode(':',date('H:i', $total_added_time));
							//add old hrs from required_hrs to new penalty hrs
							$added = $split_time[0] + $old_required[0];
							//add new time
							$new_required_hrs = number_format($added + ('.'.$split_time[1]),2,'.','');

							$enrollModel->updateRequiredHours($new_required_hrs, $schedule['id']);
							if($attendance[0]['status'] !== 'absent'){
								if (empty($attendance)) {
									if($attendanceModel->insertAttendance($data)){
										$_SESSION['success'] = 'You have succesfully time in, You are late of '.abs(intval($difference_minute)).' minutes';
										$this->session->markAsFlashdata('success');
										return redirect()->to(base_url('attendance'));
									} else {
										$_SESSION['success'] = 'Something Went Wrong!';
										$this->session->markAsFlashdata('error');
										return redirect()->to(base_url('attendance'));
									}
								} else {
									
								}
							}else{
								$_SESSION['error'] = "You cannot time-in, you already absent";
								$this->session->markAsFlashdata('error');
								return redirect()->to(base_url('attendance'));
							}

						}else if(abs(intval($difference_minute)) >= 60){
							$data['enroll_id'] = $students[0]['id'];
			
							$attendanceModel->absent($data);
								$_SESSION['error'] = "You cannot time-in, you already absent";
								$this->session->markAsFlashdata('error');
								return redirect()->to(base_url('attendance'));
						}else{

							if($attendance[0]['status'] !== 'absent'){
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
									
								}
							}else{
								$_SESSION['error'] = "You cannot time-in, you already absent";
								$this->session->markAsFlashdata('error');
								return redirect()->to(base_url('attendance'));
							}
						}
				}else{
					$_SESSION['error'] = "You cannot time-in, you dont have schedule today";
					$this->session->markAsFlashdata('error');
					return redirect()->to(base_url('attendance'));
				}
			}else{
			
				if($attendance[0]['status'] == 'absent'){
					$_SESSION['error'] = "You cannot time-in, you already absent";
				}else{
					$_SESSION['error'] = "You already time-in, you cant time-in again!";

				}
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

			if ($attendance[0]['timeout'] == null && $attendance[0]['status'] !== 'absent') {
				if ($attendanceModel->timeOut($attendance[0]['id'])) {
					$enrolled = $enrollModel->getEnrolledById($attendance[0]['enroll_id']);
					$current_attendance = $attendanceModel->getAttendanceById($attendance[0]['id']);
						$total = number_format((float)(abs(strtotime($current_attendance[0]['timein']) - strtotime($current_attendance[0]['timeout'])) / 60) / 60, 2, '.', '');
						$total_hrs = number_format($enrolled['accumulated_hrs'], 2, '.', '') + number_format($total, 2, '.', '');
						$enrollModel->updateAccumulatedHours($total_hrs, $attendance[0]['enroll_id']);

					$_SESSION['success'] = 'You have succesfully time out!';
					$this->session->markAsFlashdata('success');
					return redirect()->to(base_url('attendance'));
				} else {
					$_SESSION['error'] = 'Something Went Wrong!';
					$this->session->markAsFlashdata('error');
					return redirect()->to(base_url('attendance'));
				}
			}else{
					$_SESSION['error'] = "You cant time out, Please Time-in on another day!";
					$this->session->markAsFlashdata('error');
					return redirect()->to(base_url('attendance'));
			}
		} else{
			$_SESSION['error'] = 'Student Number Not Found';
			$this->session->markAsFlashdata('error');
			return redirect()->to(base_url('attendance'));
		}
			
	}


	public function penalty(){
		$enrollModel = new EnrollModel();
		$attendanceModel = new AttendanceModel();
		
		$data = [];
		$current_day = date('l');
		$current_time = time();
		$schedules = $enrollModel->getAllSchedule($current_day, date('H:i:s',strtotime($current_time)));
		foreach($schedules as $schedule){
		
		$to_time = strtotime($schedule['start_time']);

		$difference = $to_time - $current_time;
		$difference_minute =  $difference/60;
		$attendance = $attendanceModel->getAttendance($schedule['id']);
			if(empty($attendance)){
				if(abs(intval($difference_minute)) >= 60){
					$data['enroll_id'] = $schedule['id'];
					$attendanceModel->absent($data);
				}
			}
			
		}
		
	}

	public function nstp1(){
		$model = new AttendanceModel();
		$enrollModel = new EnrollModel();
		$enroll = $enrollModel->selectNstp1($_SESSION['student_id']);

		$attendances = $model->getAttendancesNstp1ByEnrollId($enroll['id']);
		if(!empty($enroll)){
			if($enroll['accumulated_hrs'] >= $enroll['required_hrs']){
				$_SESSION['success'] = 'Congratulation you can enrolled nstp2';
				$this->session->markAsFlashdata('success');
			}
		}
	
		$data['attendances'] = $attendances;
       	$data['accumulated_hrs'] = $enroll['accumulated_hrs'];
        $data['function_title'] = "Attendance Section";
        $data['viewName'] = 'Modules\Attendance\Views\attendances\nstp1';
		echo view('App\Views\theme\index', $data);
        // echo view('Modules\Attendance\Views\attendances\header', $data);
        // echo view('Modules\Attendance\Views\attendances\nstp1', $data);
		// echo view('Modules\Attendance\Views\attendances\footer', $data);
		// echo view('Modules\Attendance\Views\attendances\notification', $data);
	}

	public function nstp2(){
		$model = new AttendanceModel();
		$enrollModel = new EnrollModel();
		$enroll = $enrollModel->selectNstp2($_SESSION['student_id']);

		$attendances = $model->getAttendancesNstp2ByEnrollId($enroll['id']);
		
		$data['attendances'] = $attendances;
       	$data['accumulated_hrs'] = $enroll['accumulated_hrs'];
        $data['function_title'] = "Attendance Section";
        $data['viewName'] = 'Modules\Attendance\Views\attendances\nstp2';
		echo view('App\Views\theme\index', $data);
        // echo view('Modules\Attendance\Views\attendances\header', $data);
        // echo view('Modules\Attendance\Views\attendances\nstp2', $data);
		// echo view('Modules\Attendance\Views\attendances\footer', $data);
		// echo view('Modules\Attendance\Views\attendances\notification', $data);
	}
	
}
