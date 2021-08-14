<?php
namespace Modules\Dashboard\Controllers;

use Modules\StudentManagement\Models\StudentModel;
use Modules\StudentManagement\Models\EnrollModel;
use Modules\PenaltyManagement\Models\PenaltyModel;
use Modules\Announcement\Models\AnnouncementModel;
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
    	$announcementModel = new AnnouncementModel();
		if($_SESSION['rid'] == "1" || $_SESSION['rid'] == "2" || $_SESSION['rid'] == "4"){
			$student = $studentModel->getStudent();
			$penalty = $penaltyModel->getPenalty();
			$enrolled = $enrollModel->getAllEnrolled();
			$complete = $enrollModel->getComplete();
			$data['students'] =  count($student);
			$data['penalties'] =  count($penalty);
			$data['enrolled'] =  count($enrolled);
			$data['complete'] =  count($complete);

			$data['event_today'] = $announcementModel->getAnnouncementToday();
			$data['event_upcoming'] = $announcementModel->getUpcommingAnnouncement();
			$data['function_title'] = "Dashboard";
			$data['viewName'] = 'Modules\Dashboard\Views\dashboard\dashboard';
			echo view('App\Views\theme\index', $data);
		}else{
			$data['event_today'] = $announcementModel->getAnnouncementToday();
			$data['event_upcoming'] = $announcementModel->getUpcommingAnnouncement();
			$data['function_title'] = "Dashboard";
			$data['viewName'] = 'Modules\Dashboard\Views\dashboard\dashboard';
			echo view('App\Views\theme\index', $data);
		}

    }


}
