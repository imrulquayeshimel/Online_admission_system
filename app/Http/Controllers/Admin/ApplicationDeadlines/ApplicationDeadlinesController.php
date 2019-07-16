<?php

namespace App\Http\Controllers\Admin\ApplicationDeadlines;

use Session;
use Illuminate\Http\Request;
use App\Models\Admin\ExamSeason;
use App\Http\Controllers\Controller;
use App\Models\Admin\ApplicationDeadlines as AD;

class ApplicationDeadlinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.application_deadlines.index')
                ->with('ads', AD::orderBy('deadline','desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.application_deadlines.create')
                ->with('exam_seasons', ExamSeason::pluck('exam_season','id')->all());
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
            'exam_season' => 'required',
            'deadline' => 'required|date_format:"d-m-Y"',
        ]);

        $ad = new AD;

        $ad->exam_season_id = $request->exam_season;
        $ad->deadline = date('Y-m-d',strtotime($request->deadline));

        if ($ad->save()) {
            Session::flash('success','Application Deadlines created successfully');
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
        return view('admin.application_deadlines.edit')
                ->with('ad', AD::find($id))
                ->with('exam_seasons', ExamSeason::pluck('exam_season','id')->all());
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
            'exam_season' => 'required',
            'deadline' => 'required|date_format:"d-m-Y"',
        ]);

        $ad = AD::find($id);

        $ad->exam_season_id = $request->exam_season;
        $ad->deadline = date('Y-m-d',strtotime($request->deadline));

        if ($ad->save()) {
            Session::flash('success','Application Deadlines updated successfully');
        }
        return redirect()->route('application-deadlines.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = AD::find($id);

        if ($ad->delete()) {
            Session::flash('success','Application Deadlines deleted successfully');
        }
        return redirect()->route('application-deadlines.index');
    }

    public function status($id)
    {
        $ad = AD::find($id);

        if ($ad->status) {
            $ad->status = AD::UNACCOMPLISHED;
            $ad->is_published = AD::UNPUBLISHED;
            Session::flash('success','Application Deadlines unaccomplished successfully');
        }else{
            $ad->status = AD::ACCOMPLISHED;
            Session::flash('success','Application Deadlines accomplished successfully');
        }
        $ad->save();
        return redirect()->route('application-deadlines.index');
    }

    public function isPublished($id)
    {
        $ad = AD::find($id);

        if ($ad->is_published) {
            $ad->is_published = AD::UNPUBLISHED;
            Session::flash('success','Application Deadlines unpublished successfully');
        }else{
            $ad->is_published = AD::PUBLISHED;
            Session::flash('success','Application Deadlines published successfully');
        }
        $ad->save();
        return redirect()->route('application-deadlines.index');
    }
}
