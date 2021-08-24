<?php
namespace Modules\Attendance\Controllers;

use Modules\Attendance\Models\AttendanceModel;
use Modules\PenaltyManagement\Models\PenaltyModel;
use Modules\StudentManagement\Models\StudentModel;
use Modules\StudentManagement\Models\EnrollModel;
use Modules\UserManagement\Models\PermissionsModel;
use Modules\TableManagement\Models\CourseModel;
use Modules\TableManagement\Models\SchoolyearModel;
use Modules\Maintenances\Models\YearsModel;

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
						// $current_time = strtotime('14:01:00');
						$difference = $start_time - $current_time;
						$difference_minute =  $difference/60;

						if(abs(intval($difference_minute)) <= 60 && abs(intval($difference_minute)) >= 30){
							//split hrs and minute
							$old_required = explode('.',$schedule['required_hrs']);
							//add old required_hrs minutes to penalty minutes
							$old_required_minutes = isset($old_required[1]) ? $old_required[1]:'00';
							$late = abs(intval($difference_minute)) - 30;
							$total_added_time = strtotime('00:'.$old_required_minutes.'+ '.$late.' minutes' );
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
										$_SESSION['success'] = 'You have succesfully time in, You are late of '.$late.' minutes';
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
						else if(abs(intval($difference_minute)) >= 60){
							$data['enroll_id'] = $students[0]['id'];
							$attendanceModel->absent($data);
								$_SESSION['error'] = "You cannot time-in, you already absent";
								$this->session->markAsFlashdata('error');
								return redirect()->to(base_url('attendance'));
						}
						else{

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

			if(!empty($attendance)){
				if ($attendance[0]['timeout'] == null && $attendance[0]['status'] !== 'absent') {
				
					if ($attendanceModel->timeOut($attendance[0]['id'])) {
						$enrolled = $enrollModel->getEnrolledById($attendance[0]['enroll_id']);
						
						$current_attendance = $attendanceModel->getAttendanceById($attendance[0]['id']);
						// $current_attendance[0]['timeout'] = date('H:i:s',strtotime('16:30:00'));
						$total = number_format((float)(abs(strtotime($current_attendance[0]['timein']) - strtotime($current_attendance[0]['timeout'])) / 60) / 60, 2, '.', '');
						$time_in = strtotime($current_attendance[0]['timein']);
						$time_out = strtotime($current_attendance[0]['timeout']);
						$diff = ($time_out - $time_in);
						$difference_minute = $diff/60;
						
						$formatted = array();

						$formatted["hours"]   = floor($difference_minute/60);
						$formatted["minutes"] = $difference_minute - $formatted["hours"]*60;

						if($enrolled['accumulated_hrs'] == '') { $enrolled['accumulated_hrs'] = 0; }
						$current_accumulated_hrs = explode('.',$enrolled['accumulated_hrs']);

						$accumulated_hr = $current_accumulated_hrs[0] + $formatted["hours"];
						$accumulated_minute = $current_accumulated_hrs[1] + $formatted["minutes"];

						$total_added_time = strtotime('00:00 + '.abs(intval($accumulated_minute)).' minutes' );
						$split_time =  explode(':',date('H:i', $total_added_time));
						
						$total_current_accumulated = $accumulated_hr + $split_time[0].'.'.$split_time[1];
				
						
						$enrollModel->updateAccumulatedHours($total_current_accumulated, $attendance[0]['enroll_id']);
						
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
		$penaltyModel = new PenaltyModel();
		
		$data = [];
		$current_day = date('l');
		$current_time = time();
		$schedules = $enrollModel->getAllSchedule($current_day, date('H:i:s',time()));
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
			else{

				if(date('H:i:s', time()) > date('H:i:s', strtotime($schedule['end_time'])) ){

					if($attendance[0]['timeout'] == NULL && $attendance[0]['status'] == 'present'){

						if ($attendanceModel->autoTimeOut($attendance[0]['id'],$schedule['end_time'])) {
							$enrolled = $enrollModel->getEnrolledById($attendance[0]['enroll_id']);
							
							$current_attendance = $attendanceModel->getAttendanceById($attendance[0]['id']);
							// $current_attendance[0]['timeout'] = date('H:i:s',strtotime('16:30:00'));
							$total = number_format((float)(abs(strtotime($current_attendance[0]['timein']) - strtotime($current_attendance[0]['timeout'])) / 60) / 60, 2, '.', '');
							$time_in = strtotime($current_attendance[0]['timein']);
							$time_out = strtotime($current_attendance[0]['timeout']);
							$diff = ($time_out - $time_in);
							$difference_minute = $diff/60;
							$formatted = array();
	
							$formatted["hours"]   = floor($difference_minute/60);
							$formatted["minutes"] = $difference_minute - $formatted["hours"]*60;
	
							if($enrolled['accumulated_hrs'] == '') { $enrolled['accumulated_hrs'] = 0; }
							$current_accumulated_hrs = explode('.',$enrolled['accumulated_hrs']);
	
							$accumulated_hr = $current_accumulated_hrs[0] + $formatted["hours"];
							$accumulated_minute = $current_accumulated_hrs[1] + $formatted["minutes"];
	
							$total_added_time = strtotime('00:00 + '.abs(intval($accumulated_minute)).' minutes' );
							$split_time =  explode(':',date('H:i', $total_added_time));
							
							$total_current_accumulated = $accumulated_hr + $split_time[0].'.'.$split_time[1];
					
							$enrollModel->updateAccumulatedHours(abs($total_current_accumulated), $attendance[0]['enroll_id']);
						
						}
					}

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
				$data['nstp1_success'] = 1;
				$enrollModel->markCompleteNSTP1($enroll['id']);
			}
		}
	
		$data['attendances'] = $attendances;
       	$data['accumulated_hrs'] = $enroll['accumulated_hrs'];
        $data['function_title'] = "Attendance Section";
        $data['viewName'] = 'Modules\Attendance\Views\attendances\nstp1';
		echo view('App\Views\theme\index', $data);
	}

	public function nstp2(){
		$model = new AttendanceModel();
		$enrollModel = new EnrollModel();
		$studentModel = new StudentModel();
		$permissions_model = new PermissionsModel();
		$course_model = new CourseModel();
		$schyear_model = new SchoolyearModel();
		$year_model = new YearsModel();
		$id = $_SESSION['uid'];

		$enroll = $enrollModel->selectNstp2($_SESSION['student_id']);

		$attendances = $model->getAttendancesNstp2ByEnrollId($enroll['id']);
		if(!empty($enroll)){
			if($enroll['accumulated_hrs'] >= $enroll['required_hrs']){
				$data['is_nstp2_complete'] = 1;
			}

			if($enroll['status'] == 'c' || $enroll['status'] == 'g'){
				$data['is_nstp2_graduate'] = 1;
			}else{
				$data['is_nstp2_graduate'] = 0;

			}
		}  



		$data['course'] = $course_model->getCourseWithCondition(['status' => 'a']);
		$data['schyear'] = $schyear_model->getSchoolyearWithCondition(['status' => 'a']);
		$data['student'] = $studentModel->where('user_id', $id)->first();

		$data['sections'] = $year_model->getYearAndSectionByCourse($data['student']['course_id']);

		$data['attendances'] = $attendances;
       	$data['accumulated_hrs'] = $enroll['accumulated_hrs'];
        $data['function_title'] = "Attendance Section";
        $data['viewName'] = 'Modules\Attendance\Views\attendances\nstp2';
		echo view('App\Views\theme\index', $data);
	}

	public function check_if_graduate(){
		$enrollModel = new EnrollModel();

		$enroll = $enrollModel->selectNstp2($_POST['student_id']);
		if($enroll['status'] == 'c' || $enroll['status'] == 'g'){
			$is_graduated = 1;
			echo $is_graduated;
		}else{
			$is_graduated = 0;
			echo $is_graduated;
		}

	}
	
}
