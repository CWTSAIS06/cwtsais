<?php
namespace Modules\StudentManagement\Controllers;

use Modules\StudentManagement\Models\StudentModel;
use Modules\StudentManagement\Models\EnrollModel;
use Modules\PenaltyManagement\Models\PenaltyModel;
use Modules\Attendance\Models\AttendanceModel;
use App\Libraries\Pdf;
use Modules\TableManagement\Models\CourseModel;
use Modules\TableManagement\Models\SchoolyearModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;

class Student extends BaseController
{

	public function __construct()
	{
		parent:: __construct();
		$course_model = new CourseModel();
		$schyear_model = new SchoolyearModel();
		$this->course = $course_model->getCourseWithCondition(['status' => 'a']);
		$this->schyear = $schyear_model->getSchoolyearWithCondition(['status' => 'a']);
	}

    public function index($offset = 0)
    {
    	$this->hasPermissionRedirect('list-student');
			// die($_SESSION['uid']);
    	$model = new StudentModel();
		 		$data['student'] = $model->getStudent();
			 	// $data['student'] = $model->getStudentWithSchyear(['status'=> 'a', 'limit' => PERPAGE, 'offset' =>  $offset]);
        $data['function_title'] = "Student List";
        $data['viewName'] = 'Modules\StudentManagement\Views\students\index';
        echo view('App\Views\theme\index', $data);
    }

    public function show_student($id)
	{
		$this->hasPermissionRedirect('show-student');
		// $data['permissions'] = $this->permissions;

		$model = new StudentModel();
		$enrollModel = new EnrollModel();
		$attendanceModel = new AttendanceModel();
		$penaltyModel = new PenaltyModel();
		$data['attendances'] = $attendanceModel->getAttendancesById($id);
		$data['penalties'] = $penaltyModel->getPenaltyById($id);
		$data['students'] = $model->getStudentById($id);
		$data['enrolls'] = $enrollModel->getSpecificStudentById($id);
		// echo "<pre>";
		// print_r($data);
		// die();
		$data['function_title'] = "Student Information";
    $data['viewName'] = 'Modules\StudentManagement\Views\students\studentDetails';
    echo view('App\Views\theme\index', $data);
	}

    public function add_student()
    {
    	$this->hasPermissionRedirect('add-student');

    	$permissions_model = new PermissionsModel();
    	$course_model = new CourseModel();
    	$schyear_model = new SchoolyearModel();

    	$data['permissions'] = $this->permissions;
    	$data['course'] = $this->course;
    	$data['schyear'] = $this->schyear;

    	helper(['form', 'url']);
    	$model = new StudentModel();

    	if(!empty($_POST))
    	{
	    	if (!$this->validate('students'))
		    {
		    	$data['errors'] = \Config\Services::validation()->getErrors();
		        $data['function_title'] = "Adding Student";
		        $data['viewName'] = 'Modules\StudentManagement\Views\students\frmStudent';
		        echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
		        if($model->addStudent($_POST))
		        {
		        	$_SESSION['success'] = 'You have added a new record';
							$this->session->markAsFlashdata('success');
		        	return redirect()->to(base_url('student'));
		        }
		        else
		        {
		        	$_SESSION['error'] = 'You have an error in adding a new record';
							$this->session->markAsFlashdata('error');
		        	return redirect()->to(base_url('student'));
		        }
		    }
    	}
    	else
    	{
	    	$data['function_title'] = "Adding Student";
	        $data['viewName'] = 'Modules\StudentManagement\Views\students\frmStudent';
	        echo view('App\Views\theme\index', $data);
    	}
    }

    public function edit_student($id)
    {
    	$this->hasPermissionRedirect('edit-student');
    	helper(['form', 'url']);
    	$model = new StudentModel();
    	$data['rec'] = $model->find($id);

    	$permissions_model = new PermissionsModel();
			$course_model = new CourseModel();
			$schyear_model = new SchoolyearModel();

			$data['course'] = $this->course;
			$data['schyear'] = $this->schyear;
			$data['permissions'] = $this->permissions;

    	if(!empty($_POST))
    	{

	    	if (!$this->validate('edit_students'))
		    {
				//die("here");
		    		$data['errors'] = \Config\Services::validation()->getErrors();
		        $data['function_title'] = "Edit Student Information";
		        $data['viewName'] = 'Modules\StudentManagement\Views\students\frmStudent';
		        echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
		    	if($model->editStudent($_POST, $id))
		        {
		        	$_SESSION['success'] = 'You have updated a record';
							$this->session->markAsFlashdata('success');
		        	return redirect()->to(base_url('student'));
		        }
		        else
		        {
		        	$_SESSION['error'] = 'You an error in updating a record';
					$this->session->markAsFlashdata('error');
		        	return redirect()->to( base_url('student'));
		        }
		    }
    	}
    	else
    	{
	    	$data['function_title'] = "Editing Student";
	        $data['viewName'] = 'Modules\StudentManagement\Views\students\frmStudent';
	        echo view('App\Views\theme\index', $data);
    	}
    }

    public function delete_student($id)
    {
    	$this->hasPermissionRedirect('delete-student');
    	$model = new StudentModel();
    	$model->deleteStudent($id);
    }

		public function pdf($id){
			$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

			// set document information

			// set default header data
			$pdf->SetHeaderData('pup.png', 180, '', '', array(0,64,255), array(0,64,128));
			$pdf->setFooterData(array(0,64,0), array(0,64,128));

			// set header and footer fonts
			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

			// set default monospaced font
			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

			// set margins
			$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

			// set auto page breaks
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

			// set image scale factor
			$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

			// set some language-dependent strings (optional)
			if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			    require_once(dirname(__FILE__).'/lang/eng.php');
			    $pdf->setLanguageArray($l);
			}

			// ---------------------------------------------------------

			// set default font subsetting mode
			$pdf->setFontSubsetting(true);

			// Set font
			// dejavusans is a UTF-8 Unicode font, if you only need to
			// print standard ASCII chars, you can use core fonts like
			// helvetica or times to reduce file size.
			$pdf->SetFont('dejavusans', '', 14, '', true);

			// Add a page
			// This method has several options, check the source code documentation for more information.
			$pdf->AddPage();

			// set text shadow effect
			$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

			// Set some content to print
			$model = new StudentModel();
			$enrollModel = new EnrollModel();
			$attendanceModel = new AttendanceModel();
			$penaltyModel = new PenaltyModel();
			$data['attendances'] = $attendanceModel->getAttendancesById($id);
			$data['penalties'] = $penaltyModel->getPenaltyById($id);
			$data['students'] = $model->getStudentById($id);
			$data['enrolls'] = $enrollModel->getSpecificStudentById($id);
			$html = view('Modules\StudentManagement\Views\students\studentPDF', $data);
			// Print text using writeHTMLCell()
			$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

			// ---------------------------------------------------------

			// Close and output PDF document
			// This method has several options, check the source code documentation for more information.
			$pdf->Output('example_001.pdf', 'I');
			die();
		}

}
