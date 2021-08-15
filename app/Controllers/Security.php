<?php namespace App\Controllers;

use Modules\UserManagement\Models\UsersModel;
use Modules\StudentManagement\Models\StudentModel;

class Security extends BaseController
{
	public function index()
	{
		$model = new UsersModel();
		$studentModel = new StudentModel();
		if($_POST)
		{
			$loginOK = 0;
			$users = $model->getUserWithCondition(['username' => $_POST['username'],'status'=>'a']);

			//checking of user existense
			if(!empty($users))
			{
				foreach($users as $user)
				{
					if(password_verify($_POST['password'], $user['password']))
					{
						$student = $studentModel->getStudentByUserId($user['id']);
						$loginOK = 1;
						$_SESSION['uid'] = $user['id'];
						$_SESSION['uname'] = $user['username'];
						$_SESSION['rid'] = $user['role_id'];
						if(!empty($student)){
							$_SESSION['student_id'] = $student['id'];
						}else{
							$_SESSION['student_id'] = 0;

						}
						$_SESSION['user_logged_in'] = 1;
						break;
					}
				}
			}
			else
			{

				$_SESSION['error_login'] = 'Cannot Find Username';
				$this->session->markAsFlashdata('error_login');
	        	return redirect()->to(base_url());
			}

			//checking if user is user credential is valid
			if($loginOK == 1)
			{
				$landing_page = $model->getLandingPage($_SESSION['rid']);
				// die('logged in');
				$_SESSION['success_login'] = 'Welcome '.$user['username'].'!';
				$this->session->markAsFlashdata('success_login');
				// if($landing_page['role_name'] == 'Student'){
				// 	// return redirect()->to(base_url('student/profileStudent'));
				// 	return redirect()->to(base_url('dashboard'));

				// }else
				 if($_SESSION['rid'] == '1' || $_SESSION['rid'] == '2' || $_SESSION['rid'] == '4'){
					return redirect()->to(base_url('dashboard'));
				}else{
					// return redirect()->to(base_url($landing_page['table_name']));
					return redirect()->to(base_url('dashboard'));

				}
			}
			else
			{
				//die('error login');
				$_SESSION['error_login'] = 'Username and Password mismatch!';
				$this->session->markAsFlashdata('error_login');
	        	return redirect()->to(base_url());
			}
		}
		else
		{
			echo view('App\Views\login');
		}
	}

	public function student_login(){
		$model = new UsersModel();
		$studentModel = new StudentModel();
		if($_POST)
		{
			$loginOK = 0;
			$users = $model->getUserWithCondition(['username' => $_POST['username'],'status'=>'a','role_id' => '3']);

			//checking of user existense
			if(!empty($users))
			{
				foreach($users as $user)
				{
					if(password_verify($_POST['password'], $user['password']))
					{
						$student = $studentModel->getStudentByUserId($user['id']);
						$loginOK = 1;
						$_SESSION['uid'] = $user['id'];
						$_SESSION['uname'] = $user['username'];
						$_SESSION['full_name'] = $user['firstname'].' '.$user['lastname'];
						$_SESSION['rid'] = $user['role_id'];
						if(!empty($student)){
							$_SESSION['student_id'] = $student['id'];
						}else{
							$_SESSION['student_id'] = 0;

						}
						$_SESSION['user_logged_in'] = 1;
						break;
					}
				}
			}
			else
			{

				$_SESSION['error_login'] = 'Cannot Find Your Student Number';
				$this->session->markAsFlashdata('error_login');
	        	return redirect()->to(base_url('student-login'));
			}

			//checking if user is user credential is valid
			if($loginOK == 1)
			{
				$landing_page = $model->getLandingPage($_SESSION['rid']);
				// die('logged in');
				$_SESSION['success_login'] = 'Welcome '.$user['username'].'!';
				$this->session->markAsFlashdata('success_login');
				return redirect()->to(base_url('dashboard'));
			}
			else
			{
				//die('error login');
				$_SESSION['error_login'] = 'Username and Password mismatch!';
				$this->session->markAsFlashdata('error_login');
	        	return redirect()->to(base_url('student-login'));
			}
		}else{
			return view('App\Views\student');
		}
	}

	public function faculty_login(){
		$model = new UsersModel();
		$studentModel = new StudentModel();
		if($_POST)
		{
			$loginOK = 0;
			$users = $model->getUserWithCondition(['username' => $_POST['username'],'status'=>'a','role_id !=' => '3a']);

			//checking of user existense
			if(!empty($users))
			{
				foreach($users as $user)
				{
					if(password_verify($_POST['password'], $user['password']))
					{
						$student = $studentModel->getStudentByUserId($user['id']);

						$loginOK = 1;
						$_SESSION['uid'] = $user['id'];
						$_SESSION['uname'] = $user['username'];
						$_SESSION['rid'] = $user['role_id'];
						if(!empty($student)){
							$_SESSION['student_id'] = $student['id'];
						}else{
							$_SESSION['student_id'] = 0;

						}
						$_SESSION['user_logged_in'] = 1;
						break;
					}
				}
			}
			else
			{

				$_SESSION['error_login'] = 'Cannot Find Username';
				$this->session->markAsFlashdata('error_login');
	        	return redirect()->to(base_url('faculty'));
			}

			//checking if user is user credential is valid
			if($loginOK == 1)
			{
				$landing_page = $model->getLandingPage($_SESSION['rid']);
				// die('logged in');
				$_SESSION['success_login'] = 'Welcome '.$user['username'].'!';
				$this->session->markAsFlashdata('success_login');
				return redirect()->to(base_url('dashboard'));
			}
			else
			{
				//die('error login');
				$_SESSION['error_login'] = 'Username and Password mismatch!';
				$this->session->markAsFlashdata('error_login');
	        	return redirect()->to(base_url('faculty'));
			}
		}else{
			return view('App\Views\faculty');
		}
	}
	public function logout()
	{
		session_destroy();
		$_SESSION['success'] = 'Thank you. Come Again!';
		$this->session->markAsFlashdata('success');
    	return redirect()->to(base_url());
	}
}
