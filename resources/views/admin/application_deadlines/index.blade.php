@extends('layouts.admin')

@section('content')
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Application Deadlines</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a class="btn btn-primary" href="{!! route('application-deadlines.create') !!}">+ Add New</a>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="">
                        <table class="table table-bordered js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Deadlines</th>
                                    <th>Exam Season</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @php
                                $i = 1
                            @endphp
                            <tbody>
                                @if ($ads->count())
                                    @foreach ($ads as $ad)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $ad->deadline }}</td>
                                            <td>{{ $ad->examSeason->exam_season }}</td>
                                            <td>{{ $ad->status?'Accomplished':'Unaccomplished' }}</td>
                                            <td>
                                                @if ($ad->status)
                                                    <a class="btn btn-sm btn-danger" href="{{route('application-deadlines.status', $ad->id)}}"> Unaccomplished</a>
                                                    @if ($ad->is_published)
                                                        <a class="btn btn-sm btn-danger" href="{{route('application-deadlines.publish', $ad->id)}}"> Unpublished</a>
                                                    @else
                                                        <a class="btn btn-sm btn-success" href="{{route('application-deadlines.publish', $ad->id)}}"> Published</a>
                                                    @endif
                                                @else
                                                    <a class="btn btn-sm btn-info" href="{{route('application-deadlines.status', $ad->id)}}"> Accomplished</a>
                                                    <a class="btn btn-sm btn-primary" href="{{route('application-deadlines.edit', $ad->id)}}"> Edit</a>
                                                    <a class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#{{ $ad->id }}">Delete</a>
                                                @endif

                                                <form action="{{ route('application-deadlines.destroy', $ad->id) }}" method="post">
                                                    {{ csrf_field() }} {{ method_field('delete') }}



                                                    {{-- some change need
                                                    data-target 1 changed by databse id
                                                    and then id of the next line changed by the same database id
                                                    and must be set form action
                                                    --}}


                                                    {{-- -------------------- delete Pop Up ---------------------------  --}}
                                                    <div class="modal fade" id="{{ $ad->id }}" role="dialog">
                                                        @include('includes.delete')
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center" colspan="3">No Application Deadlines Found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
