@extends('layouts.admin')

@section('content')
    <style media="screen">
        .no-padding tr td{
            padding-bottom: 5px !important;
            padding-top: 0 !important;
        }
    </style>
    <div  class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Applicants</h2>
                </div>
                <div class="body">
                    <div class="">
                        <table class="table no-border">
                            <tr width="50%">
                                <td>
                                    <table class="table no-border no-padding">
                                        <tr>
                                            <td width="150px">Name</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->name }}</td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Registration Token</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->reg_token }}</td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Exam Roll</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->exam_roll }}</td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Date of Birth</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->dob }}</td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Gender</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->getGender() }}</td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Blood group</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->getBloodGroup() }}</td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Email</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->email }}</td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Contact number</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->contact_number }}</td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Present address</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->present_address }}</td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Permanent address</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->permanent_address }}</td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Nationality</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->nationality }}</td>
                                        </tr>

                                        <tr>
                                            <td width="150px">Religion</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->religion }}</td>
                                        </tr>

                                        <tr>
                                            <td width="150px">Signature</td>
                                            <td width="1px">:</td>
                                            <td><img width="150px" src="{{ $applicant->signature }}" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Status</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->getStatus() }}</td>
                                        </tr>

                                    </table>
                                </td>
                                <td width="50%">
                                    <img width="150px" class="pull-right" src="{{ $applicant->photo }}" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="pull-right">
                                        @if ($applicant->status)
                                            <a class="btn btn-danger" href="{{ route('applicant.unapprove',$applicant->id) }}">Unapproved</a>
                                        @else
                                            <a class="btn btn-success" href="{{ route('applicant.approve',$applicant->id) }}">Approved</a>
                                        @endif

                                        @if ($prev_id)
                                            <a class="btn btn-primary" href="{{ route('applicant.show',$prev_id) }}"><< Applicants</a>
                                        @endif
                                        @if ($next_id)
                                            <a class="btn btn-primary" href="{{ route('applicant.show',$next_id) }}">Applicants >></a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Educational Qualification</h2>
                </div>
                <div class="body">
                    <div class="">
                        <table class="table table-bordered">
                            <thead>
                                <th>Degree</th>
                                <th>Board</th>
                                <th>Name of institute</th>
                                <th>Passing year</th>
                                <th>GPA</th>
                                <th>Marksheet</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>SSC</td>
                                    <td>{{ $applicant->educationalQualification->ssc_board}}</td>
                                    <td>{{ $applicant->educationalQualification->ssc_name_of_institute}}</td>
                                    <td>{{ $applicant->educationalQualification->ssc_passing_year}}</td>
                                    <td>{{ $applicant->educationalQualification->ssc_gpa}}</td>
                                    <td>
                                        @if ($applicant->educationalQualification->getOriginal('ssc_marksheet') != '')
                                            <a target="_blank" href="{{ $applicant->educationalQualification->ssc_marksheet }}">SSC Marksheet</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>HSC</td>
                                    <td>{{ $applicant->educationalQualification->hsc_board }}</td>
                                    <td>{{ $applicant->educationalQualification->hsc_name_of_institute }}</td>
                                    <td>{{ $applicant->educationalQualification->hsc_passing_year }}</td>
                                    <td>{{ $applicant->educationalQualification->hsc_gpa }}</td>
                                    <td>
                                        @if ($applicant->educationalQualification->getOriginal('hsc_marksheet') != '')
                                            <a target="_blank" href="{{ $applicant->educationalQualification->hsc_marksheet }}">HSC Marksheet</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4"> <b class="pull-right">Total GPA</b> </td>
                                    <td colspan="2">{{ $applicant->educationalQualification->ssc_gpa + $applicant->educationalQualification->hsc_gpa }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Payment</h2>
                </div>
                <div class="body">
                    <div class="">
                        <table class="table no-border no-padding">
                            <tr>
                                <td width="150px">Payment Method</td>
                                <td width="1px">:</td>
                                <td>{{ $applicant->payment ? $applicant->payment->getPaymentMethod() : '' }}</td>
                            </tr>
                            <tr>
                                <td width="150px">Transaction Number</td>
                                <td width="1px">:</td>
                                <td>{{ $applicant->payment ? $applicant->payment->transaction_number : '' }}</td>
                            </tr>
                            <tr>
                                <td width="150px">TXN ID</td>
                                <td width="1px">:</td>
                                <td>{{ $applicant->payment ? $applicant->payment->txn_id : '' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Parents</h2>
                </div>
                <div class="body">
                    <div class="">
                        <table class="table no-border">
                            <tr width="50%">
                                <td>
                                    <table class="table no-border no-padding">
                                        <tr>
                                            <td width="150px">Father name</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->parents->father_name }}</td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Father occupation</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->parents->father_occupation }}</td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Father contact</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->parents->father_contact }}</td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Mother name</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->parents->mother_name }}</td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Mother occupation</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->parents->mother_occupation }}</td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Mother contact</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->parents->mother_contact }}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="50%">
                                    <div class="pull-right text-center" class="">
                                        <div class="img-thumbnail">
                                            <img style="paddin-right:10px !important" width="150px"  src="{{ $applicant->parents->father_photo }}" alt="">
                                            <p style="padding-top:10px">Father's Photo</p>
                                        </div>
                                        <div class="img-thumbnail">
                                            <img style="paddin-right:10px !important" width="150px"  src="{{ $applicant->parents->mother_photo }}" alt="">
                                            <p style="padding-top:10px">Mother's Photo</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Guardian</h2>
                </div>
                <div class="body">
                    <div class="">
                        <table class="table no-border">
                            <tr width="50%">
                                <td>
                                    <table class="table no-border no-padding">
                                        <tr>
                                            <td width="180px">Name</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->guardian->name }}</td>
                                        </tr>
                                        <tr>
                                            <td width="180px">Occupation</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->guardian->occupation }}</td>
                                        </tr>
                                        <tr>
                                            <td width="180px">Salary</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->guardian->salary }}</td>
                                        </tr>
                                        <tr>
                                            <td width="180px">Email</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->guardian->email }}</td>
                                        </tr>
                                        <tr>
                                            <td width="180px">Contact number</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->guardian->contact_number }}</td>
                                        </tr>
                                        <tr>
                                            <td width="180px">Relationship with student</td>
                                            <td width="1px">:</td>
                                            <td>{{ $applicant->guardian->relationship_of_student }}</td>
                                        </tr>
                                        <tr>
                                            <td width="180px">Signature</td>
                                            <td width="1px">:</td>
                                            <td><img width="150px" src="{{ $applicant->guardian->signature }}" alt=""></td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="50%">
                                    <div class="pull-right text-center" class="">
                                        <img style="paddin-right:10px !important" width="150px"  src="{{ $applicant->guardian->photo }}" alt="">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
