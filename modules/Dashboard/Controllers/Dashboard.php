<?php
namespace Modules\Dashboard\Controllers;

use Modules\StudentManagement\Models\StudentModel;
use Modules\StudentManagement\Models\EnrollModel;
use Modules\PenaltyManagement\Models\PenaltyModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{

	public function __construct()
	{
		parent:: __construct();
	}

    public function index()
    {
		$studentModel = new StudentModel();
		$penaltyModel = new PenaltyModel();
		$enrollModel = new EnrollModel();
		if($_SESSION['rid'] == "1"){
			$student = $studentModel->getAllStudents();
			$penalty = $penaltyModel->getPenalty();
			$enrolled = $enrollModel->getAllEnrolled();
			$complete = $enrollModel->getComplete();
			$data['students'] =  count($student);
			$data['penalties'] =  count($penalty);
			$data['enrolled'] =  count($enrolled);
			$data['complete'] =  count($complete);
			$data['function_title'] = "Dashboard";
			$data['viewName'] = 'Modules\Dashboard\Views\dashboard\dashboard';
			echo view('App\Views\theme\index', $data);
		}else{
			return redirect()->to(base_url());
		}

    }


}
