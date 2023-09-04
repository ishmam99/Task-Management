<?php

namespace App\Http\Controllers;

use App\Models\Children;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name'  =>  'required',
            'employee_id'  =>  'required',
            'education'  =>  'nullable',
            'gender'  =>  'nullable',
            'birth_date'  =>  'nullable',
        ]);
        $input['birth_date'] = Carbon::parse($request->birth_date);
        Children::create($input);
        return redirect()->back()->with('success', 'Children Data Stored Successfully');
    }


    public function delete(Children $children)
    {
        $children->delete();
        return redirect()->back()->with('success','Children Data Deleted Successfully');
    }
}
