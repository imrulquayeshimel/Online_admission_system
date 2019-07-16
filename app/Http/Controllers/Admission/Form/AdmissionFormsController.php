<?php

namespace App\Http\Controllers\Admission\form;

use PDF;
use Session;
use Illuminate\Http\Request;
use App\Models\Admin\Department;
use App\Http\Controllers\Controller;
use App\Models\Admission\Form\Student;
use App\Models\Admission\Form\Parents;
use App\Models\Admission\Form\Guardian;
use App\Models\Admission\Form\Payment;
use App\Models\Admin\ApplicationDeadlines as AD;
use App\Http\Requests\AdmissionFormCreateRequest;
use App\Models\Admission\Form\EducationalQualification as EQ;

class AdmissionFormsController extends Controller
{
    public function create()
    {
        $department = [];
        $ad = AD::where('status',AD::UNACCOMPLISHED)->orderBy('deadline','desc')->first();

        if ($ad) {
            $department = Department::orderBy('dept')->pluck('dept','id')->all();
        }

        return view('admission_form.form')
                ->with('ad', $ad)
                ->with('blood_group', Student::BLOOD_GROUP)
                ->with('reg_token', $this->registration_token())
                ->with('depts', $department);
    }

    public function registration_token()
    {
        return rand(1000,9999).chr(rand(65,90)).rand(10,99).chr(rand(65,90)).chr(rand(65,90)).rand(100,900);
    }

    public function store(AdmissionFormCreateRequest $request)
    {
        $input = $request->all();

        $student_exam_roll = Student::select('exam_roll')->where('exam_season_id',$input['exam_season_id'])->orderBy('exam_roll','desc')->first();
        if ($student_exam_roll) {
            $input['exam_roll'] = $student_exam_roll->exam_roll+1;
        }else {
            $input['exam_roll'] = date("Ym").'01';
        }


        // student
        $input['dob']       = date('Y-m-d',strtotime($request->date_of_birth));
        $input['photo']     = $this->imageUpload($request->photo,'students/photo');
        $input['signature'] = $this->imageUpload($request->signature,'students/signature');
        $student            = Student::create($input);

        // Payment
        // $input['student_id']    = $student->id;
        // Payment::create($input);

        // Educational Qualification
        $input['student_id']    = $student->id;
        $input['ssc_marksheet'] = $this->imageUpload($request->ssc_marksheet,'marksheets/ssc');
        $input['hsc_marksheet'] = $this->imageUpload($request->hsc_marksheet,'marksheets/hsc');
        EQ::create($input);

        // Parents
        $input['student_id']   = $student->id;
        $input['father_photo'] = $this->imageUpload($request->father_photo,'parents/father');
        $input['mother_photo'] = $this->imageUpload($request->mother_photo,'parents/mother');
        Parents::create($input);

        // Guardian
        $guardian                          = new Guardian;
        $guardian->student_id              = $student->id;
        $guardian->name                    = $request->guardian_name;
        $guardian->photo                   = $this->imageUpload($request->guardian_photo,'guardians/photo');
        $guardian->occupation              = $request->guardian_occupation;
        $guardian->salary                  = $request->guardian_salary;
        $guardian->email                   = $request->guardian_email;
        $guardian->contact_number          = $request->guardian_contact_number;
        $guardian->relationship_of_student = $request->relationship_of_student;
        $guardian->signature               = $this->imageUpload($request->guardian_signature,'guardians/signature');

        if ($guardian->save()) {
            Session::flash('success','Application submitted successfully');
        }
        return redirect()->route('payment.view',['reg_token'=>$input['reg_token']]);
    }

    public function imageUpload($image,$path)
    {
        $new_name = '';
        if ($image) {
            $new_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('public/uploads/'.$path.'/',$new_name);
        }
        return $new_name;
    }

    public function paymentView(Request $request)
    {
        return view('admission_form.payment')
                ->with('reg_token', $request->reg_token);
    }

    public function paymentStore(Request $request)
    {
        $this->validate($request,[
            'registration_token' => 'required',
            'payment_method'     => 'required|numeric',
            'transaction_number' => 'required|min:8',
            'txn_id'             => 'required|min:3',
        ]);
        $input = $request->all();
        $student = Student::select('id')->where('reg_token',$request->registration_token)->first();
        $input['student_id'] = $student->id;

        if (Payment::create($input)) {
            Session::flash('success','Payment submitted successfully');
        }
        return redirect()->route('applicant.details',['reg_token'=>$request->registration_token]);
    }

    public function submittedFormView(Request $request)
    {
        $student = Student::where('reg_token',$request->reg_token)->first();
        if (!$student) {
            Session::flash('info','No student found');
            return redirect()->back();
        }
        return view('admission_form.submitted_form')
                ->with('student', $student);
    }

    public function formPDF(Request $request)
    {
        $student = Student::where('reg_token',$request->reg_token)->first();

        $name = 'admission_form_' . time();
        $pdf = PDF::loadView('admission_form.form_pdf', ['student'=>$student])->setPaper('a4', 'portrait');
        return $pdf->download($name.'.pdf');

        // return view('admission_form.form_pdf')
        //         ->with('student', $student);
    }

    public function admitCardPDF(Request $request)
    {
        $student = Student::where('reg_token',$request->reg_token)->first();

        $name = 'admit_card_' . time();
        $pdf = PDF::loadView('admission_form.admit_card_pdf', ['student'=>$student])->setPaper('a4', 'portrait');
        return $pdf->download($name.'.pdf');

        // return view('admission_form.admit_card_pdf')
        //         ->with('student', $student);
    }
}
