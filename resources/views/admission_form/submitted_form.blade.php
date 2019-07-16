@extends('layouts.front')
@section('content')
        <div class="card">
            <div class="header">
                <h2>Applicant Details</h2>
            </div>
            <div class="body">
                <table class="table no-border">
                    <tr>
                        <td width="200px">Name</td>
                        <td width="5px">:</td>
                        <td>{{ $student->name }}</td>
                    </tr>
                    <tr>
                        <td width="200px">Email</td>
                        <td width="5px">:</td>
                        <td>{{ $student->email }}</td>
                    </tr>
                    <tr>
                        <td width="200px">Contact number</td>
                        <td width="5px">:</td>
                        <td>{{ $student->contact_number }}</td>
                    </tr>
                    <tr>
                        <td width="200px">Guardian Name</td>
                        <td width="5px">:</td>
                        <td>{{ $student->guardian->name }}</td>
                    </tr>
                    <tr>
                        <td width="200px">Guardian Contact number</td>
                        <td width="5px">:</td>
                        <td>{{ $student->guardian->contact_number }}</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            @if ($student->examSeason->applicationDeadlines->is_published && $student->status)
                                <a  href="{!! route('admit-card.pdf',['reg_token'=>$student->reg_token]) !!}" class="btn btn-xm btn-primary">Admit card PDF</a>
                            @endif
                            <a href="{!! route('applicant.details.pdf',['reg_token'=>$student->reg_token]) !!}" class="btn btn-xm btn-primary">Admission Form PDF</a>
                        </td>
                    </tr>
                </table>
                <div class="pull-right">

                </div>
            </div>
        </div>
@endsection
