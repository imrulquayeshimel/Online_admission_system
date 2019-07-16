@extends('layouts.admin')

@section('content')
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Exam Season</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a class="btn btn-primary" href="{!! route('exam_seasons.create') !!}">+ Add New</a>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="">
                        <table class="table table-bordered js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Exam Season</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @php
                                $i = 1
                            @endphp
                            <tbody>
                                @if ($exam_seasons->count())
                                    @foreach ($exam_seasons as $es)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $es->exam_season }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{route('exam_seasons.edit', $es->id)}}"> Edit</a>
                                                <a class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#{{ $es->id }}">Delete</a>

                                                <form action="{{ route('exam_seasons.destroy', $es->id) }}" method="post">
                                                    {{ csrf_field() }} {{ method_field('delete') }}



                                                    {{-- some change need
                                                    data-target 1 changed by databse id
                                                    and then id of the next line changed by the same database id
                                                    and must be set form action
                                                    --}}


                                                    {{-- -------------------- delete Pop Up ---------------------------  --}}
                                                    <div class="modal fade" id="{{ $es->id }}" role="dialog">
                                                        @include('includes.delete')
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center" colspan="3">No Exam Season Found</td>
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
