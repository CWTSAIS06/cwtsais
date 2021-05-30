<?php
namespace Modules\TableManagement\Controllers;

use Modules\TableManagement\Models\SubjectModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;

class Subject extends BaseController
{

	public function __construct()
	{
		parent:: __construct();
		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

    public function index($offset = 0)
    {
    	$this->hasPermissionRedirect('list-subject');

    	$model = new SubjectModel();

    	//kailangan ito para sa pagination
       	$data['all_items'] = $model->getSubjectWithCondition(['status'=> 'a']);
       	$data['offset'] = $offset;
				$data['subject'] = $model->getSubjectWithFunction(['status'=> 'a','limit' => PERPAGE, 'offset' =>  $offset]);

        $data['function_title'] = "Subject List";
        $data['viewName'] = 'Modules\TableManagement\Views\subjects\index';
        echo view('App\Views\theme\index', $data);
    }

    public function show_subject($id)
	{
		$this->hasPermissionRedirect('show-subject');
		$data['permissions'] = $this->permissions;

		$model = new SubjectModel();

		$data['subject'] = $model->getSubjectWithCondition(['id' => $id]);

		$data['function_title'] = "Subject Details";
    $data['viewName'] = 'Modules\TableManagement\Views\subjects\subjectDetails';
    echo view('App\Views\theme\index', $data);
	}

    public function add_subject()
    {
    	$this->hasPermissionRedirect('add-subject');

    	$permissions_model = new PermissionsModel();

    	$data['permissions'] = $this->permissions;

    	helper(['form', 'url']);
    	$model = new SubjectModel();

    	if(!empty($_POST))
    	{
	    	if (!$this->validate('subjects'))
		    {
		    	$data['errors'] = \Config\Services::validation()->getErrors();
		        $data['function_title'] = "Adding Subject";
		        $data['viewName'] = 'Modules\TableManagement\Views\subjects\frmSubject';
		        echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
		        if($model->addSubject($_POST))
		        {
		        	//$role_id = $model->insertID();
		        	//$permissions_model->update_permitted_role($role_id, $_POST['function_id']);
		        	$_SESSION['success'] = 'You have added a new record';
					$this->session->markAsFlashdata('success');
		        	return redirect()->to(base_url('subject'));
		        }
		        else
		        {
		        	$_SESSION['error'] = 'You have an error in adding a new record';
					$this->session->markAsFlashdata('error');
		        	return redirect()->to(base_url('subject'));
		        }
		    }
    	}
    	else
    	{

	    	$data['function_title'] = "Adding Subject";
	        $data['viewName'] = 'Modules\TableManagement\Views\subjects\frmSubject';
	        echo view('App\Views\theme\index', $data);
    	}
    }

    public function edit_subject($id)
    {
    	$this->hasPermissionRedirect('edit-subject');
    	helper(['form', 'url']);
    	$model = new SubjectModel();
    	$data['rec'] = $model->find($id);

    	$permissions_model = new PermissionsModel();

    	$data['permissions'] = $this->permissions;

    	if(!empty($_POST))
    	{

	    	if (!$this->validate('subjects'))
		    {
				//die("here");
		    		$data['errors'] = \Config\Services::validation()->getErrors();
		        $data['function_title'] = "Edit Subject";
		        $data['viewName'] = 'Modules\TableManagement\Views\subjects\frmSubject';
		        echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
		    	if($model->editSubject($_POST, $id))
		        {
		        //$permissions_model->update_permitted_role($id, $_POST['function_id'], $data['rec']['function_id']);
		        	$_SESSION['success'] = 'You have updated a record';
							$this->session->markAsFlashdata('success');
		        	return redirect()->to(base_url('subject'));
		        }
		        else
		        {
		        	$_SESSION['error'] = 'You an error in updating a record';
					$this->session->markAsFlashdata('error');
		        	return redirect()->to( base_url('subject'));
		        }
		    }
    	}
    	else
    	{
	    	$data['function_title'] = "Editing Subject";
	        $data['viewName'] = 'Modules\TableManagement\Views\subjects\frmSubject';
	        echo view('App\Views\theme\index', $data);
    	}
    }

    public function delete_subject($id)
    {
    	$this->hasPermissionRedirect('delete-subject');
    	$model = new SubjectModel();
    	$model->deleteSubject($id);
    }

}
