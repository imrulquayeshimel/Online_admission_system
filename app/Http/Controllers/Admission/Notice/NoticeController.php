<?php

namespace App\Http\Controllers\Admission\Notice;

use PDF;
use Illuminate\Http\Request;
use App\Models\Admin\ExamSeason;
use App\Http\Controllers\Controller;
use App\Models\Admission\Form\Student;

class NoticeController extends Controller
{
    public function approvedAppicantsListPDF($season_id)
    {
        $exam_season = ExamSeason::find($season_id);

        $applicants = Student::select('students.id','name','dept','txn_id','students.status','reg_token','exam_roll')
                                ->where('students.exam_season_id' , $season_id)
                                ->where('students.status', 1)
                                ->join('payments','payments.student_id','=','students.id')
                                ->join('departments','departments.id','=','students.department_id')
                                ->orderBy('departments.dept')
                                ->get();

        // $name = 'approve_list_' . time();
        // $pdf = PDF::loadView('notice.pdf', ['applicants'=>$applicants,'exam_season'=>$exam_season])->setPaper('a4', 'portrait');
        // return $pdf->download($name.'.pdf');

        return view('notice.pdf')
                ->with('applicants', $applicants)
                ->with('exam_season', $exam_season);
    }
}
