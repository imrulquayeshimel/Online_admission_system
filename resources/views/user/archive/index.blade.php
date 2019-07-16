@extends('layouts.user')

@section('content')
    <div  class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Applicants</h2>
                </div>
                <div class="body">
                    <div class="">
                        <ul class="list-group">
                            @if ($seasons->count())
                                @foreach ($seasons as $season)
                                    <li class="list-group-item">
                                        <span>{{ $season->examSeason->exam_season }}</span> ----
                                        <a href="{!! route('dept.archive.list',['season_id'=>$season->examSeason->id,'approve'=>'approved']) !!}">Approved</a> |
                                        <a href="{!! route('dept.archive.list',['season_id'=>$season->examSeason->id,'approve'=>'unapproved']) !!}">Unapproved</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
