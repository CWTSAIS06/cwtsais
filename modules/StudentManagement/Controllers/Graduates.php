<?php
namespace Modules\StudentManagement\Controllers;

use Modules\StudentManagement\Models\StudentModel;
use Modules\StudentManagement\Models\EnrollModel;
use App\Controllers\BaseController;

class Graduates extends BaseController
{

	public function __construct()
	{
		parent:: __construct();
		
	}

	public function index(){
		$enroll = new EnrollModel;

		$graduates = $enroll->getAllGraduates();
		// print_r($graduates);
		$data['graduates'] = $graduates;

		$data['function_title'] = "List of Graduates";
        $data['viewName'] = 'Modules\StudentManagement\Views\graduates\index';
        echo view('App\Views\theme\index', $data);
	}

}
