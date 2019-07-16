<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Admission\Form\Student;
use App\Models\Admin\ApplicationDeadlines as AD;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $approved_applicants = [];
        $unapproved_applicants = [];
        $ad = AD::where('status',AD::UNACCOMPLISHED)->orderBy('deadline','desc')->first();

        if (Auth::user()->is_admin) {
            if ($ad) {
                $approved_applicants = Student::where('exam_season_id',$ad->exam_season_id)->where('status',1)->get();
                $unapproved_applicants = Student::where('exam_season_id',$ad->exam_season_id)->where('status',0)->get();
            }

            return view('home')
                    ->with('approved_applicants', $approved_applicants)
                    ->with('unapproved_applicants', $unapproved_applicants);
        }else {
            if ($ad) {
                $approved_applicants = Student::where('exam_season_id',$ad->exam_season_id)
                                                ->where('status',1)
                                                ->where('department_id',Auth::user()->department_id)
                                                ->get();
                $unapproved_applicants = Student::where('exam_season_id',$ad->exam_season_id)
                                                    ->where('status',0)
                                                    ->where('department_id',Auth::user()->department_id)
                                                    ->get();
            }

            return view('user.home')
                    ->with('approved_applicants', $approved_applicants)
                    ->with('unapproved_applicants', $unapproved_applicants);
        }
    }
}
