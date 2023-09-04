<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date = today();
        if($request->date)
        {
            if($request->date == 'next')
            {
                $date = Carbon::parse($request->now)->addDay();
            }
            elseif($request->date == 'prev'){
                $date = Carbon::parse($request->now)->addDays(-1);
            }
            else
            {
                $date = Carbon::parse($request->date);
            }
        }
        $attendances = Attendance::whereDate('date',$date)->get();
        $emp = $attendances->pluck('employee_id');
        $employees = Employee::whereNotIn('id', $emp)->get()->sortBy('position.rank');
        return view('dashboard.attendance.index',compact('attendances','date','employees'));
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
       
       $input =  $request->validate([
            'employee_id'   =>  'required|exists:employees,id',
            'in_time'       =>  'nullable',
            'out_time'      =>  'nullable',
            'shift'         =>  'nullable|string',
            'in_leave'      =>  'required',
            
        ]);
        $date = Carbon::parse($request->date)->format('Y-m-d');
        if($request->in_leave!=0) 
        {
            Attendance::create([
                'employee_id'   =>  $request->employee_id,
                'in_leave'      =>  $request->in_leave,
                'date'       =>  $date
                ]);
        }
        else{
        $input['date']  =   $date;
        $input['in_time']   =Carbon::parse($request->in_time)->format('h:m:s');

        if($request->out_time)  $input['out_time']   = Carbon::parse($request->out_time)->format('h:m:s');
        Attendance::create($input);
        }
        return back()->with('success','Attendance added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        return view('dashboard.attendance.edit',compact('attendance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        $input =  $request->validate([
            
            'in_time'       =>  'nullable',
            'out_time'      =>  'nullable',
            'shift'         =>  'nullable|string',
            'in_leave'      =>  'required',

        ]);
        $date = Carbon::parse($request->date)->format('Y-m-d');
        if ($request->in_leave != 0) {
            $attendance->update([
               
                'in_leave'      =>  $request->in_leave,
                'date'       =>  $date
            ]);
        } else {
            $input['date']  =   $date;
            $input['in_time']   = Carbon::parse($request->in_time)->format('h:m:s');

            if ($request->out_time)  $input['out_time']   = Carbon::parse($request->out_time)->format('h:m:s');
           $attendance->update($input);
        }
        return back()->with('success', 'Attendance updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
