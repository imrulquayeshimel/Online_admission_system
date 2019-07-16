@extends('layouts.admin')

@section('content')
    <div  class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Applicants</h2>
                </div>
                <div class="body">
                    <div class="">
                        <table class="table table-bordered js-basic-example dataTable" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    {{-- <th>Gender</th> --}}
                                    <th>Nationality</th>
                                    <th width="24.0057px">SSC GPA</th>
                                    <th width="44.0057px">Passing year</th>
                                    <th width="24.0057px">HSC GPA</th>
                                    <th width="44.0057px">Passing year</th>
                                    {{-- <th>Guardian Name</th>
                                    <th>Contact Number</th>
                                    <th>Relationship</th> --}}
                                    <th>Dept.</th>
                                    <th width="67px">Payment <br> TXN ID</th>
                                    <th>Reg. Token</th>
                                    <th>Exam Roll</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @php
                                $i = 1
                            @endphp
                            <tbody>
                                @if ($applicants->count())
                                    @foreach ($applicants as $applicant)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $applicant->name }}</td>
                                            {{-- <td>{{ $applicant->getGender() }}</td> --}}
                                            <td>{{ $applicant->nationality }}</td>
                                            <td>{{ $applicant->educationalQualification->ssc_gpa }}</td>
                                            <td>{{ $applicant->educationalQualification->ssc_passing_year }}</td>
                                            <td>{{ $applicant->educationalQualification->hsc_gpa }}</td>
                                            <td>{{ $applicant->educationalQualification->hsc_passing_year }}</td>
                                            {{-- <td>{{ $applicant->guardian->name }}</td>
                                            <td>{{ $applicant->guardian->contact_number }}</td>
                                            <td>{{ $applicant->guardian->relationship_of_student }}</td> --}}
                                            <td>{{ $applicant->department->dept }}</td>
                                            <td>{{ $applicant->payment?$applicant->payment->txn_id:'' }}</td>
                                            <td>{{ $applicant->reg_token }}</td>
                                            <td>{{ $applicant->exam_roll }}</td>
                                            <td>{{ $applicant->getStatus() }}</td>
                                            <td>
                                                <div class="dropdown pull-right">
                                                    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Action
                                                        <span class="caret"></span></button>
                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                            @if ($applicant->status)
                                                                <li role="presentation"><a href="{{route('applicant.unapprove', $applicant->id)}}"> Unapproved</a></li>
                                                            @else
                                                                <li role="presentation"><a href="{{route('applicant.approve', $applicant->id)}}"> Approved</a></li>
                                                            @endif
                                                            <li role="presentation" class="divider"></li>
                                                            <li role="presentation"><a href="{{route('applicant.show', $applicant->id)}}"> Show</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
