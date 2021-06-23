<?php
namespace Modules\TableManagement\Controllers;

use Modules\TableManagement\Models\CourseModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;

class Course extends BaseController
{

	public function __construct()
	{
		parent:: __construct();
		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

    public function index($offset = 0)
    {
    	$this->hasPermissionRedirect('list-course');

    	$model = new CourseModel();

    	//kailangan ito para sa pagination
       	$data['all_items'] = $model->getCourseWithCondition();
       	$data['offset'] = $offset;
				$data['course'] = $model->getCourseWithFunction(['limit' => PERPAGE, 'offset' =>  $offset]);

        $data['function_title'] = "List of Programs";
        $data['viewName'] = 'Modules\TableManagement\Views\courses\index';
        echo view('App\Views\theme\index', $data);
    }

    public function show_course($id)
	{
		$this->hasPermissionRedirect('show-course');
		$data['permissions'] = $this->permissions;

		$model = new CourseModel();

		$data['course'] = $model->getCourseWithCondition(['id' => $id]);

		$data['function_title'] = "Course Details";
    $data['viewName'] = 'Modules\TableManagement\Views\courses\courseDetails';
    echo view('App\Views\theme\index', $data);
	}

    public function add_course()
    {
    	$this->hasPermissionRedirect('add-course');

    	$permissions_model = new PermissionsModel();

    	$data['permissions'] = $this->permissions;

    	helper(['form', 'url']);
    	$model = new CourseModel();

    	if(!empty($_POST))
    	{
	    	if (!$this->validate('courses'))
		    {
		    	$data['errors'] = \Config\Services::validation()->getErrors();
		        $data['function_title'] = "Adding of Programs";
		        $data['viewName'] = 'Modules\TableManagement\Views\courses\frmCourse';
		        echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
		        if($model->addCourse($_POST))
		        {
		        	//$role_id = $model->insertID();
		        	//$permissions_model->update_permitted_role($role_id, $_POST['function_id']);
		        	$_SESSION['success'] = 'You have added a new record';
					$this->session->markAsFlashdata('success');
		        	return redirect()->to(base_url('course'));
		        }
		        else
		        {
		        	$_SESSION['error'] = 'You have an error in adding a new record';
					$this->session->markAsFlashdata('error');
		        	return redirect()->to(base_url('course'));
		        }
		    }
    	}
    	else
    	{

	    	$data['function_title'] = "Adding of Programs";
	        $data['viewName'] = 'Modules\TableManagement\Views\courses\frmCourse';
	        echo view('App\Views\theme\index', $data);
    	}
    }

    public function edit_course($id)
    {
    	$this->hasPermissionRedirect('edit-course');
    	helper(['form', 'url']);
    	$model = new CourseModel();
    	$data['rec'] = $model->find($id);

    	$permissions_model = new PermissionsModel();

    	$data['permissions'] = $this->permissions;

    	if(!empty($_POST))
    	{

	    	if (!$this->validate('edit_courses'))
		    {
				//die("here");
		    		$data['errors'] = \Config\Services::validation()->getErrors();
		        $data['function_title'] = "Editing of Program";
		        $data['viewName'] = 'Modules\TableManagement\Views\courses\frmCourse';
		        echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
		    	if($model->editCourse($_POST, $id))
		        {
		        //$permissions_model->update_permitted_role($id, $_POST['function_id'], $data['rec']['function_id']);
		        	$_SESSION['success'] = 'You have updated a record';
							$this->session->markAsFlashdata('success');
		        	return redirect()->to(base_url('course'));
		        }
		        else
		        {
		        	$_SESSION['error'] = 'You an error in updating a record';
					$this->session->markAsFlashdata('error');
		        	return redirect()->to( base_url('course'));
		        }
		    }
    	}
    	else
    	{
	    	$data['function_title'] = "Editing of Program";
	        $data['viewName'] = 'Modules\TableManagement\Views\courses\frmCourse';
	        echo view('App\Views\theme\index', $data);
    	}
    }

    public function inactive($id)
    {
    	$this->hasPermissionRedirect('delete-course');
    	$model = new CourseModel();
    	$model->inactiveCourse($id);
	}

	public function active($id)
    {
    	$this->hasPermissionRedirect('delete-course');
    	$model = new CourseModel();
    	$model->activeCourse($id);
    }

}
