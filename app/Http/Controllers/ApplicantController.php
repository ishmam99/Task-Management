<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $applicants = Applicant::when($request->department,function ($q,$department) {
            $q->where('department_id', $department);
        })->when($request->position, function ($q, $position) {
            $q->where('position_id', $position);
        })->get();
        return view('dashboard.applicant.index',compact('applicants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.applicant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'first_name'                  =>  'required|alpha',
            'last_name'                  =>  'required|alpha',
            'middle_name'                  =>  'required|alpha',
        ]);
        $input = $request->validate([
            'department_id'         =>  'required|exists:departments,id',
            'position_id'           =>  'required|exists:positions,id',
            'phone'                =>  'required|unique:applicants',
            'email'                 =>  'required|unique:applicants|email',
            'gender'                =>  'required',
            'image'                 =>   'nullable|image',
            'certificates'          =>   'nullable|file',
            'resume'                =>   'nullable|file',
            'present_address'       =>   'nullable|string',
            'permanent_address'     =>   'nullable|string',
            'birth_date'            =>   'required|date',

        ]);
        $input['name']   = $request->first_name.' '.$request->middle_name.' '.$request->last_name;
        if($request->hasFile('image')) $input['image'] = uploadFile($request->file('image'));

        if($request->hasFile('resume')) $input['resume'] = uploadFile($request->file('resume'));

        if($request->hasFile('certificates')) $input['certificates'] = uploadFile($request->file('certificates'));

        $input['birth_date']    = Carbon::parse($request->birth_date);
        $input['uid']    = now()->format('Ymdhms');
        Applicant::create($input);

        return redirect()->route('applicant.index')->with('success','Applicant Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        return view('dashboard.applicant.view',compact('applicant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        return view('dashboard.applicant.edit', compact('applicant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}
