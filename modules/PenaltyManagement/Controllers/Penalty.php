<?php namespace Modules\PenaltyManagement\Controllers;

use Modules\PenaltyManagement\Models\PenaltyModel;
use Modules\StudentManagement\Models\EnrollModel;
use Modules\UserManagement\Models\PermissionsModel;
use Modules\Maintenances\Models\PenaltiesModel;
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
		
    	$penaltiesModel = new PenaltiesModel();
		$data['penaltys'] = $penaltiesModel->getPenalty();

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
					$enrolled = $eModel->getEnrolledById($_POST['enrollment_id']);
					$total_hrs = number_format($_POST['hours'], 2, '.', '') + number_format($enrolled['required_hrs'], 2, '.', '');
					$eModel->updateRequiredHours($total_hrs, $_POST['enrollment_id']);

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
		$penaltiesModel = new PenaltiesModel();
		$data['penaltys'] = $penaltiesModel->getPenalty();
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
		$model = new PenaltyModel();
		$eModel = new EnrollModel();

		$penalty = $model->getSpecificPenalty($id);

		$enrolled = $eModel->getEnrolledById($penalty['enrollment_id']);

		$total_hrs = number_format($penalty['hours'], 2, '.', '') - number_format($enrolled['required_hrs'], 2, '.', '');
		$eModel->updateRequiredHours(abs($total_hrs), $penalty['enrollment_id']);

    	$model->deletePenalty($id);
	}
	
	public function active($id)
    {
		$model = new PenaltyModel();
		$eModel = new EnrollModel();

		$penalty = $model->getSpecificPenalty($id);

		$enrolled = $eModel->getEnrolledById($penalty['enrollment_id']);

		$total_hrs = number_format($penalty['hours'], 2, '.', '') + number_format($enrolled['required_hrs'], 2, '.', '');
		$eModel->updateRequiredHours(abs($total_hrs), $penalty['enrollment_id']);

    	$model->activePenalty($id);
    }

}
