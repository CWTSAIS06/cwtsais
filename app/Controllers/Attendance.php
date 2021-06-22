<?php
namespace app\Controllers;

use Modules\Attendance\Models\AttendanceModel;
use Modules\PenaltyManagement\Models\PenaltyModel;
use Modules\StudentManagement\Models\StudentModel;
use Modules\StudentManagement\Models\EnrollModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;

class Attendance extends BaseController
{

	public function __construct()
	{
		parent:: __construct();
		
	}

	public function index()
	{
	  echo "Hello, World" . PHP_EOL;
	}

	public function message($to = 'World')
	{
		echo "Hello {$to}!".PHP_EOL;
	}

  

}
