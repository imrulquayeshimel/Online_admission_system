@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Approved Applicants List</div>

                <div class="panel-body">
                    <table class="table table-bordered js-basic-example dataTable" style="font-size:12px">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Dept.</th>
                    <th>Payment <br> TXN ID</th>
                    <!-- <th>Reg. Token</th> -->
                    <th>Exam Roll</th>
                    <th>Status</th>
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
                            <td>{{ $applicant->dept }}</td>
                            <td>{{ $applicant->txn_id }}</td>
                            <!-- <td>{{ $applicant->reg_token }}</td> -->
                            <td>{{ $applicant->exam_roll }}</td>
                            <td>{{ $applicant->getStatus() }}</td>
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



<!-- !DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/pdf_style.css') }}">
    </head>
    <body>
        <div class="text-center">
            <h3>Gono Bishwabidyalay</h3>
            <small>Exam Season : {{ $exam_season->exam_season }}</small>
        </div>
        <br>

    </body>
</html> -->
