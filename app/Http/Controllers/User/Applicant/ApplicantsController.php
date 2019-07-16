<?php

namespace App\Http\Controllers\User\Applicant;

use Auth;
use PDF;
use Session;
use Illuminate\Http\Request;
use App\Models\Admin\ExamSeason;
use App\Http\Controllers\Controller;
use App\Models\Admission\Form\Student;
use App\Models\Admin\ApplicationDeadlines as AD;

class ApplicantsController extends Controller
{
    public function index()
    {
        $ad = AD::where('status',AD::UNACCOMPLISHED)->orderBy('deadline','desc')->first();
        if ($ad) {
            $applicants = Student::where('department_id',Auth::user()->department_id)->where('exam_season_id',$ad->exam_season_id)->get();
        }else {
            Session::flash('info','No unaccomplished exam season found');
            return redirect()->back();
        }
        return view('user.applicants.index')
                ->with('applicants', $applicants);
    }

    public function show($applicant_id)
    {
        $student = Student::find($applicant_id);
        $next_id = Student::where('department_id',Auth::user()->department_id)->where('id','>',$student->id)->min('id');
		$prev_id = Student::where('department_id',Auth::user()->department_id)->where('id','<',$student->id)->max('id');

        return view('user.applicants.show')
                ->with('next_id', $next_id)
                ->with('prev_id', $prev_id)
                ->with('applicant', $student);
    }

    public function makeApproved($applicant_id)
    {
        $student = Student::find($applicant_id);
        $student->status = true;
        if ($student->save()) {
            Session::flash('success','Applicants approved successfully');
        }
        return redirect()->back();

    }

    public function makeUnapproved($applicant_id)
    {
        $student = Student::find($applicant_id);
        $student->status = false;
        if ($student->save()) {
            Session::flash('success','Applicants unapproved successfully');
        }
        return redirect()->back();

    }

    public function archiveSeasonList()
    {
        return view('user.archive.index')
                ->with('seasons', AD::where('status', AD::ACCOMPLISHED)->orderBy('deadline','desc')->get());
    }

    public function archiveList($season_id,$approve)
    {
        if ($approve == 'approved') {
            $is_approved = '1';
        }elseif ($approve == 'unapproved') {
            $is_approved = '0';
        }

        $applicants = Student::where('department_id',Auth::user()->department_id)->where([
            'exam_season_id' => $season_id,
            'status' => $is_approved,
        ])->get();
        return view('user.archive.show')
                ->with('season_id', $season_id)
                ->with('applicants', $applicants)
                ->with('approved', $approve);
    }

    public function archiveListPDF($season_id,$approve)
    {
        if ($approve == 'approved') {
            $is_approved = '1';
        }elseif ($approve == 'unapproved') {
            $is_approved = '0';
        }

        $exam_season = ExamSeason::find($season_id);

        $applicants = Student::select('students.id','name','dept','txn_id','students.status','reg_token','exam_roll')
                                ->where('students.department_id',Auth::user()->department_id)
                                ->where('students.exam_season_id' , $season_id)
                                ->where('students.status', $is_approved)
                                ->join('payments','payments.student_id','=','students.id')
                                ->join('departments','departments.id','=','students.department_id')
                                ->orderBy('departments.dept')
                                ->get();

        $name = 'approve_list_' . time();
        $pdf = PDF::loadView('user.archive.pdf', ['applicants'=>$applicants,'exam_season'=>$exam_season])->setPaper('a4', 'portrait');
        return $pdf->download($name.'.pdf');

        // return view('user.archive.pdf')->with('applicants', $applicants);
    }
}
