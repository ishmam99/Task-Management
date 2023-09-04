<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Meeting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Meeting::whereDate('schedule',today())->orderBy('schedule')->get();
        $upcoming = Meeting::whereDate('schedule','>',today())->orderBy('schedule')->get();
        $older = Meeting::whereDate('schedule','<',today())->orderBy('schedule')->get();
        return view('dashboard.meeting.index',compact('today','upcoming','older'));
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
        // dd($request);

      $request->validate([
        'title'         =>  'required|string',
        'date'          =>  'required',
        'time'          =>  'required',
        'location'      =>  'required',
        'details'       =>  'required',
        'type'          =>  'required',
        'employee_id'   =>  'nullable'  ,
        'duration'   =>  'nullable'  ,
        'agenda'   =>  'nullable'  ,
        'sarok'   =>  'nullable'  ,
       ]);
       if($request->hasFile('file'))
       {
        $data['file'] = uploadFile($request->file('file'));
       }
       $data['schedule']    = Carbon::parse($request->date.$request->time);
       $data['title']       = $request->title;
       $data['agenda']       = $request->agenda;
       $data['duration']       = $request->duration;
       $data['sarok']       = $request->sarok;
       $data['location']    = $request->location;
       $data['type']        = $request->type;
       $data['details']     = $request->details;
       if($request->department_id == 0){


        $data['employee_type'] = 0;

       }
       else{
            $data['department_id'] = $request->department_id;
        if(!$request->employee_id){

                $data['employee_type'] = 1;

        }
        else
        {
            $data['employee_type'] = 2;
            $list = [];
           foreach($request->employee_id as $emp)
           {
            $employee = Employee::findOrfail($emp);
            $employee->load('position','department');
            $list[] =$employee;
           }
           $data['employees'] = json_encode($list);

        }
       }



    // dd($data);
       Meeting::create($data);
       return redirect()->back()->with('success','Meeting Scheduled for '.$data['schedule']->format('M d Y, h:m:s a'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function show(Meeting $meeting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function edit(Meeting $meeting)
    {
       return view('dashboard.meeting.edit',compact('meeting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meeting $meeting)
    {
        // $request->validate([
        //     'title'         =>  'required|string',
        //     'date'          =>  'required',
        //     'time'          =>  'required',
        //     'location'      =>  'required',
        //     'details'       =>  'required',
        //     'type'          =>  'required',
        //     'employee_id'   =>  'nullable',
        //     'duration'   =>  'nullable',
        //     'agenda'   =>  'nullable',
        //     'sarok'   =>  'nullable',
        // ]);
        //  dd($request);
        if ($request->hasFile('file')) {

            $data['file'] = uploadFile($request->file('file'));
        }
        $data['schedule']    = Carbon::parse($request->date . $request->time);
        $data['title']       = $request->title;
        $data['agenda']       = $request->agenda;
        $data['duration']       = $request->duration;
        $data['sarok']       = $request->sarok;
        $data['location']    = $request->location;
        $data['type']        = $request->type;
        $data['details']     = $request->details;
        if ($request->department_id == 0) {


            $data['employee_type'] = 0;
        } else {
            $data['department_id'] = $request->department_id;
            if (!$request->employee_id) {

                $data['employee_type'] = 1;
            } else {
                $data['employee_type'] = 2;
                $list = [];
                foreach ($request->employee_id as $emp) {
                    $employee = Employee::findOrfail($emp);
                    $employee->load('position', 'department');
                    $list[] = $employee;
                }
                $data['employees'] = json_encode($list);
            }
        }
        $meeting->update($data);
        return redirect()->back()->with('success', 'Meeting Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting)
    {
       $meeting->delete();
        return redirect()->back()->with('success', 'Meeting Data Deleted');
    }
}
