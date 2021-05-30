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
    	$this->hasPermissionRedirect('list-announcement');

    	$model = new AnnouncementModel();

    	//kailangan ito para sa pagination
       	$data['all_items'] = $model->getAnnouncementWithCondition(['status'=> 'a']);
       	$data['offset'] = $offset;
				if($_GET['search'] != null)
				{
					$data['announcement'] = $model->getAnnouncementWithConditionWithFunction(['status'=> 'a', 'search' => $_GET['search'],'limit' => PERPAGE, 'offset' =>  $offset]);
				}
				else {
					$data['announcement'] = $model->getAnnouncementWithConditionWithFunction(['status'=> 'a','limit' => PERPAGE, 'offset' =>  $offset]);
				}
        $data['function_title'] = "Announcement List";
        $data['viewName'] = 'Modules\Announcement\Views\announcements\index';
        echo view('App\Views\theme\index', $data);
    }

    public function show_announcement($id)
	{
		$this->hasPermissionRedirect('show-announcement');
		$data['permissions'] = $this->permissions;

		$model = new AnnouncementModel();

		$data['announcement'] = $model->getAnnouncementWithCondition(['id' => $id]);

		$data['function_title'] = "Announcement Details";
    $data['viewName'] = 'Modules\Announcement\Views\announcements\announcementDetails';
    echo view('App\Views\theme\index', $data);
	}

    public function add_announcement()
    {
    	$this->hasPermissionRedirect('add-announcement');

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
		        	//$role_id = $model->insertID();
		        	//$permissions_model->update_permitted_role($role_id, $_POST['function_id']);
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
    	$this->hasPermissionRedirect('edit-announcement');
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

    public function delete_announcement($id)
    {
    	$this->hasPermissionRedirect('delete-announcement');
    	$model = new AnnouncementModel();
    	$model->deleteAnnouncement($id);
    }

}
