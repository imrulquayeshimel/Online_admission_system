<?php

namespace App\Http\Controllers\Admin\Department;

use Session;
use Illuminate\Http\Request;
use App\Models\Admin\Department;
use App\Http\Controllers\Controller;

class DepartmentsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('admin.department.index')
                ->with('depts', Department::all());
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
            'dept' => 'required|min:2|max:50|unique:departments,dept'

        ]);
        $input = $request->all();

        if (Department::create($input)) {
            Session::flash('success','Department create successfull.');
        }
        return redirect()->route('department.index');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        return view('admin.department.edit')
                ->with('dept', Department::find($id));
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
            'dept' => 'required|min:2|max:50|unique:departments,dept,'.$id,
        ]);
        $dept = Department::find($id);
        $input = $request->all();

        if ($dept->update($input)) {
            Session::flash('success','Department update successfull.');
        }
        return redirect()->route('department.index');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $dept = Department::find($id);

        if ($dept->delete()) {
            Session::flash('success','Department is deleted succesfully');
        }else {
            Session::flash('fail', 'Department is not deleted');
        }
        return redirect()->route('department.index');
    }
}
