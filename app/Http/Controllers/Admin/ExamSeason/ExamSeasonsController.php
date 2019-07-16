<?php

namespace App\Http\Controllers\Admin\ExamSeason;

use Session;
use Illuminate\Http\Request;
use App\Models\Admin\ExamSeason;
use App\Http\Controllers\Controller;

class ExamSeasonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.exam_season.index')
        ->with('exam_seasons', ExamSeason::orderBy('exam_season','desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exam_season.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'exam_season' => 'required|min:3|unique:exam_seasons,exam_season',
        ]);

        $es = new ExamSeason;
        $es->exam_season = $request->exam_season;
        $es->slug = str_slug($request->exam_season);

        if ($es->save()) {
            Session::flash('success','Exam season created successfully');
        }
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.exam_season.edit')
        ->with('exam_season', ExamSeason::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'exam_season' => 'required|min:3|unique:exam_seasons,exam_season,'.$id,
        ]);

        $es = ExamSeason::find($id);
        $es->exam_season = $request->exam_season;
        $es->slug = str_slug($request->exam_season);

        if ($es->save()) {
            Session::flash('success','Exam season updated successfully');
        }
        return redirect()->route('exam_seasons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $es = ExamSeason::find($id);

        if ($es->delete()) {
            Session::flash('success','Exam season deleted successfully');
        }
        return redirect()->back();
    }
}
