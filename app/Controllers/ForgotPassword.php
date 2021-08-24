<?php namespace App\Controllers;

use Modules\UserManagement\Models\UsersModel;
use Modules\StudentManagement\Models\StudentModel;

class ForgotPassword extends BaseController
{
	public function index()
	{
      if(!empty($_POST))
      {
            if (!$this->validate('forgot_password'))
            {
                $data['errors'] = \Config\Services::validation()->getErrors();
                $data['rec'] = $_POST;
		        $data['viewName'] = 'forgot_password';
                return view('App\Views\forgot_password', $data);
            }
            else
            {
		      $usersModel = new UsersModel();

              $user = $usersModel->getUserByEmail($_POST['email']);
              if(!empty($user)){
                $temp_password = $this->generateRandomString();
             
                $email = \Config\Services::email();
                $email->setFrom('cwtsaispupt@gmail.com', 'CWTS Reset Password');
                $email->setTo($_POST['email']);

                $email->setSubject('CWTS-AIS Reset Password');
                $email->setMessage('Seems like you forgot your password for CWTS-AIS
                <br>
                <br>
                This is your temporary password: '.$temp_password);

                $val_array = array();
                $val_array['password'] = $temp_password;
                $usersModel->editUsers($val_array, $user['id']);

                if($email->send()){
                    $_SESSION['success'] = 'Email Sent!';
                    $this->session->markAsFlashdata('success');
                    return redirect()->to(base_url('forgot-password'));
                }
                
              }else{

                    $_SESSION['error'] = 'Email is not found.';
                    $this->session->markAsFlashdata('error');
                    return redirect()->to(base_url('forgot-password'));
              }
            //   die('sucess');
            }
        }
        
		return view('App\Views\forgot_password');
		
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


	
}
