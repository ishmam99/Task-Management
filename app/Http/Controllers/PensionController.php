<?php

namespace App\Http\Controllers;

use App\Models\Pension;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pensions = Pension::all();
        return view('dashboard.pension.index',compact('pensions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->except(['_token']);
        $input['month'] =
        Carbon::parse($request->month)->format('F Y');
        Pension::create($input);
        return redirect()->back()->with('success','Pension Data Store Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pension  $pension
     * @return \Illuminate\Http\Response
     */
    public function show(Pension $pension)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pension  $pension
     * @return \Illuminate\Http\Response
     */
    public function edit(Pension $pension)
    {
        return view('dashboard.pension.edit', compact('pension'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pension  $pension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pension $pension)
    {

        $input = $request->except(['_token']);
        $input['month'] =
        Carbon::parse($request->month)->format('F Y');
        $pension->update($input);
        return redirect()->back()->with('success', 'Pension Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pension  $pension
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pension $pension)
    {
        $pension->delete();
        return redirect()->back()->with('success', 'Pension Data Deleted Successfully');
    }
}
