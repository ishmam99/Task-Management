<?php

namespace App\Http\Controllers;

use App\Models\EmployeeEducation;
use App\Models\EmployeePosting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EmployeeEducation::create($request->all());
        return redirect()->back()->with('success', 'Employee Education Data Saved Successfully');
    }
    public function postingStore(Request $request)
    {
        $from_date = Carbon::parse($request->from_date)->format('Y-m-d');
        $to_date = Carbon::parse($request->to_date)->format('Y-m-d');
        $input = [
            'designation'   => $request->designation,
            'organization'   =>  $request->organization,
            'location'   =>  $request->location,
            'employee_id'   =>  $request->employee_id,
            'from_date'   => $from_date,
            'to_date'   =>   $to_date
        ];
        EmployeePosting::create($input);
        return redirect()->back()->with('success', 'Employee Posting Data Saved Successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeEducation $employeeEducation)
    {
        $employeeEducation->delete();
        return redirect()->back()->with('success', 'Employee Education Data Deleted Successfully');
    }
    public function destroyPosting(EmployeePosting $employeePosting)
    {
        $employeePosting->delete();
        return redirect()->back()->with('success', 'Employee Posting Data Deleted Successfully');
    }
}
