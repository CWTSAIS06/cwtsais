<?php
namespace Modules\Attendance\Controllers;

use Modules\Attendance\Models\AttendanceModel;
use Modules\StudentManagement\StudentModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;

class Attendance extends BaseController
{

	public function __construct()
	{
		parent:: __construct();
		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

    public function index($offset = 0)
    {
    	$this->hasPermissionRedirect('list-attendance');

    	$model = new AttendanceModel();

    	//kailangan ito para sa pagination
       	$data['all_items'] = $model->getAttendanceWithCondition(['status'=> 'a']);
       	$data['offset'] = $offset;
				$data['attendance'] = $model->getAttendanceWithFunction(['status'=> 'a','limit' => PERPAGE, 'offset' =>  $offset]);
        $data['function_title'] = "Attendance List";
        $data['viewName'] = 'Modules\Attendance\Views\attendance\index';
        echo view('App\Views\theme\index', $data);
    }

    public function show_attendance($id)
	{
		$this->hasPermissionRedirect('show-attendance');
		$data['permissions'] = $this->permissions;

		$model = new AttendanceModel();

		$data['attendance'] = $model->getAttendanceWithCondition(['id' => $id]);

		$data['function_title'] = "Attendance Details";
    $data['viewName'] = 'Modules\Attendance\Views\attendances\AttendanceDetails';
    echo view('App\Views\theme\index', $data);
	}

    public function add_attendance()
    {
    	$this->hasPermissionRedirect('add-attendance');

    	$permissions_model = new PermissionsModel();

    	$data['permissions'] = $this->permissions;

    	helper(['form', 'url']);
    	$model = new AttendanceModel();

    	if(!empty($_POST))
    	{
	    	if (!$this->validate('attendances'))
		    {
		    	$data['errors'] = \Config\Services::validation()->getErrors();
		        $data['function_title'] = "Adding Attendance";
		        $data['viewName'] = 'Modules\Attendance\Views\attendances\frmAttendance';
		        echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
		        if($model->addAttendance($_POST))
		        {
		        	//$role_id = $model->insertID();
		        	//$permissions_model->update_permitted_role($role_id, $_POST['function_id']);
		        	$_SESSION['success'] = 'You have added a new record';
					$this->session->markAsFlashdata('success');
		        	return redirect()->to(base_url('attendance'));
		        }
		        else
		        {
		        	$_SESSION['error'] = 'You have an error in adding a new record';
					$this->session->markAsFlashdata('error');
		        	return redirect()->to(base_url('attendance'));
		        }
		    }
    	}
    	else
    	{

	    	$data['function_title'] = "Adding Attendance";
	        $data['viewName'] = 'Modules\Attendance\Views\attendances\frmAttendance';
	        echo view('App\Views\theme\index', $data);
    	}
    }

    public function edit_attendance($id)
    {
    	$this->hasPermissionRedirect('edit-attendance');
    	helper(['form', 'url']);
    	$model = new AttendanceModel();
    	$data['rec'] = $model->find($id);

    	$permissions_model = new PermissionsModel();

    	$data['permissions'] = $this->permissions;

    	if(!empty($_POST))
    	{

	    	if (!$this->validate('attendances'))
		    {
				//die("here");
		    		$data['errors'] = \Config\Services::validation()->getErrors();
		        $data['function_title'] = "Edit Attendance";
		        $data['viewName'] = 'Modules\Attendance\Views\attendances\frmAttendance';
		        echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
		    	if($model->editAttendance($_POST, $id))
		        {
		        //$permissions_model->update_permitted_role($id, $_POST['function_id'], $data['rec']['function_id']);
		        	$_SESSION['success'] = 'You have updated a record';
							$this->session->markAsFlashdata('success');
		        	return redirect()->to(base_url('attendance'));
		        }
		        else
		        {
		        	$_SESSION['error'] = 'You an error in updating a record';
					$this->session->markAsFlashdata('error');
		        	return redirect()->to( base_url('attendance'));
		        }
		    }
    	}
    	else
    	{
	    	$data['function_title'] = "Editing Attendance";
	        $data['viewName'] = 'Modules\Attendance\Views\attendances\frmAttendance';
	        echo view('App\Views\theme\index', $data);
    	}
    }

    public function delete_attendance($id)
    {
    	$this->hasPermissionRedirect('delete-attendance');
    	$model = new AttendanceModel();
    	$model->deleteAttendance($id);
    }


}
