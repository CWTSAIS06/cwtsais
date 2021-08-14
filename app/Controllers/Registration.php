<?php namespace App\Controllers;

use Modules\UserManagement\Models\UsersModel;
use Modules\StudentManagement\Models\StudentModel;

class Registration extends BaseController
{
	public function index()
	{
      if(!empty($_POST))
      {
            if (!$this->validate('registration'))
            {
                $data['errors'] = \Config\Services::validation()->getErrors();
                $data['rec'] = $_POST;
                return view('registration/index', $data);
            }
            else
            {
                if($_POST['password'] == $_POST['password_retype']){

                    $users_model = new UsersModel();
                    $student_model = new StudentModel();
                    unset($_POST['password_retype']);
                   
                    if($users_model->addStudentAccount($_POST)){
                        $user_id = $users_model->insertID();
                        if($student_model->addRegisteredStudent($_POST, $user_id)){
                            $_SESSION['success_registered'] = 'You Successfuly have CWTS-AIS Account!';
                            $this->session->markAsFlashdata('success_registered');
                            return redirect()->to( base_url());
                        }
                        
                    }else{
                        $_SESSION['error'] = 'You have an error in adding a new record';
                        $this->session->markAsFlashdata('error');
                        return redirect()->to( base_url('users'));
                    }
                    
                }else{
                    $_SESSION['error_login'] = 'Your Password and Re-type Password mismatch!';
                    $this->session->markAsFlashdata('error_login');
                    return redirect()->to(base_url("Registration"));
                }
            }
        }
        
		return view('App\Views\registration\index');
		
	}


	
}
