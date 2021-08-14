<?php
namespace Modules\Announcement\Controllers;

use Modules\Announcement\Models\AnnouncementModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;

class Announcement extends BaseController
{

	public function __construct()
	{
		parent:: __construct();
		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

    public function index($offset = 0)
    {

    	$model = new AnnouncementModel();

    	//kailangan ito para sa pagination
       	$data['events'] = $model->getAnnouncement();

        $data['function_title'] = "Announcement List";
        $data['viewName'] = 'Modules\Announcement\Views\announcements\index';
        echo view('App\Views\theme\index', $data);
    }

    public function show_announcement($id)
	{
		$data['permissions'] = $this->permissions;

		$model = new AnnouncementModel();

		$data['announcement'] = $model->getAnnouncementWithCondition(['id' => $id]);

		$data['function_title'] = "Announcement Details";
    $data['viewName'] = 'Modules\Announcement\Views\announcements\announcementDetails';
    echo view('App\Views\theme\index', $data);
	}

    public function add_announcement()
    {

    	$permissions_model = new PermissionsModel();

    	$data['permissions'] = $this->permissions;

    	helper(['form', 'url']);
    	$model = new AnnouncementModel();

    	if(!empty($_POST))
    	{
	    	if (!$this->validate('announcements'))
		    {
		    	$data['errors'] = \Config\Services::validation()->getErrors();
		        $data['function_title'] = "Adding Announcement";
		        $data['viewName'] = 'Modules\Announcement\Views\announcements\frmAnnouncement';
		        echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
		        if($model->addAnnouncement($_POST))
		        {
		        	$_SESSION['success'] = 'You have added a new record';
					$this->session->markAsFlashdata('success');
		        	return redirect()->to(base_url('announcement'));
		        }
		        else
		        {
		        	$_SESSION['error'] = 'You have an error in adding a new record';
					$this->session->markAsFlashdata('error');
		        	return redirect()->to(base_url('announcement'));
		        }
		    }
    	}
    	else
    	{

	    	$data['function_title'] = "Adding Announcement";
	        $data['viewName'] = 'Modules\Announcement\Views\announcements\frmAnnouncement';
	        echo view('App\Views\theme\index', $data);
    	}
    }

    public function edit_announcement($id)
    {
    	helper(['form', 'url']);
    	$model = new AnnouncementModel();
    	$data['rec'] = $model->find($id);

    	$permissions_model = new PermissionsModel();

    	$data['permissions'] = $this->permissions;

    	if(!empty($_POST))
    	{

	    	if (!$this->validate('announcements'))
		    {
				//die("here");
		    		$data['errors'] = \Config\Services::validation()->getErrors();
		        $data['function_title'] = "Edit Announcement";
		        $data['viewName'] = 'Modules\Announcement\Views\announcement\frmAnnouncement';
		        echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
		    	if($model->editAnnouncement($_POST, $id))
		        {
		        //$permissions_model->update_permitted_role($id, $_POST['function_id'], $data['rec']['function_id']);
		        	$_SESSION['success'] = 'You have updated a record';
							$this->session->markAsFlashdata('success');
		        	return redirect()->to(base_url('announcement'));
		        }
		        else
		        {
		        	$_SESSION['error'] = 'You an error in updating a record';
					$this->session->markAsFlashdata('error');
		        	return redirect()->to( base_url('announcement'));
		        }
		    }
    	}
    	else
    	{
	    	$data['function_title'] = "Editing Announcement";
	        $data['viewName'] = 'Modules\Announcement\Views\announcements\frmAnnouncement';
	        echo view('App\Views\theme\index', $data);
    	}
    }

	public function inactive($id)
	{
		$model = new AnnouncementModel();
		$model->inactive_status($id);
	}


	public function active($id)
	{
		$model = new AnnouncementModel();
		$model->active_status($id);
	}

}
