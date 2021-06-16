<?php namespace Modules\PenaltyManagement\Controllers;

use Modules\PenaltyManagement\Models\PenaltyModel;
use Modules\StudentManagement\Models\EnrollModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;

class Penalty extends BaseController
{

	public function __construct()
	{
		parent:: __construct();
		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

    public function index($offset = 0)
    {
    	$this->hasPermissionRedirect('list-penalty');

    	$model = new PenaltyModel();
    	//kailangan ito para sa pagination
       	$data['penalties'] = $model->getPenaltyWithCondition();
        $data['function_title'] = "Penalty List";
        $data['viewName'] = 'Modules\PenaltyManagement\Views\penaltys\index';
        echo view('App\Views\theme\index', $data);
    }

    public function show_penalty($id)
	{
		$this->hasPermissionRedirect('show-penalty');
		$data['permissions'] = $this->permissions;

		$model = new PenaltyModel();

		$data['penalty_type'] = $model->getPenaltyWithCondition(['id' => $id]);

		$data['function_title'] = "Penalty Details";
    $data['viewName'] = 'Modules\PenaltyManagement\Views\penaltys\penaltyDetails';
    echo view('App\Views\theme\index', $data);
	}

    public function add_penalty()
    {
    	$this->hasPermissionRedirect('add-penalty');

    	$permissions_model = new PermissionsModel();

    	$data['permissions'] = $this->permissions;
		$eModel = new EnrollModel();
		$data['students'] = $eModel->getStudentsForm();
    	helper(['form', 'url']);
    	$model = new PenaltyModel();

    	if(!empty($_POST))
    	{
	    	if (!$this->validate('penaltys'))
		    {
				$data['errors'] = \Config\Services::validation()->getErrors();
		        $data['function_title'] = "Adding Penalty";
		        $data['viewName'] = 'Modules\PenaltyManagement\Views\penaltys\frmPenalty';
		        echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
		        if($model->addPenalty($_POST))
		        {
		        	//$role_id = $model->insertID();
		        	//$permissions_model->update_permitted_role($role_id, $_POST['function_id']);
		        	$_SESSION['success'] = 'You have added a new record';
					$this->session->markAsFlashdata('success');
		        	return redirect()->to(base_url('penalty'));
		        }
		        else
		        {
		        	$_SESSION['error'] = 'You have an error in adding a new record';
					$this->session->markAsFlashdata('error');
		        	return redirect()->to(base_url('penalty'));
		        }
		    }
    	}
    	else
    	{

	    	$data['function_title'] = "Adding Penalty";
			$data['viewName'] = 'Modules\PenaltyManagement\Views\penaltys\frmPenalty';
	     	echo view('App\Views\theme\index', $data);
    	}
    }

    public function edit_penalty($id)
    {
    	$this->hasPermissionRedirect('edit-penalty');
    	helper(['form', 'url']);
    	$model = new PenaltyModel();
    	$data['rec'] = $model->find($id);
			$eModel = new EnrollModel();
			$data['students'] = $eModel->getStudentsForm();
    	$permissions_model = new PermissionsModel();

    	$data['permissions'] = $this->permissions;

    	if(!empty($_POST))
    	{

	    	if (!$this->validate('penaltys'))
		    {
				//die("here");
		    		$data['errors'] = \Config\Services::validation()->getErrors();
		        $data['function_title'] = "Edit Penalty";
		        $data['viewName'] = 'Modules\PenaltyManagement\Views\penaltys\frmPenalty';
		        echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
		    	if($model->editPenalty($_POST, $id))
		        {
		        //$permissions_model->update_permitted_role($id, $_POST['function_id'], $data['rec']['function_id']);
		        	$_SESSION['success'] = 'You have updated a record';
							$this->session->markAsFlashdata('success');
		        	return redirect()->to(base_url('penalty'));
		        }
		        else
		        {
		        	$_SESSION['error'] = 'You an error in updating a record';
					$this->session->markAsFlashdata('error');
		        	return redirect()->to( base_url('penalty'));
		        }
		    }
    	}
    	else
    	{
	    	$data['function_title'] = "Editing Penalty";
	        $data['viewName'] = 'Modules\PenaltyManagement\Views\penaltys\frmPenalty';
	        echo view('App\Views\theme\index', $data);
    	}
    }

    public function delete_penalty($id)
    {
    	$this->hasPermissionRedirect('delete-penalty');
    	$model = new PenaltyModel();
    	$model->deletePenalty($id);
    }

}
