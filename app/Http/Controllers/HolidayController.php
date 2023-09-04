<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
      
        $now = today();
        $month = date('F Y');
        if ($request->month == 'next') {
            
            $month = Carbon::parse($request->now)->addMonth();
            $now = $month;
        }
        else if ($request->month == 'prev') {
            
            $month = Carbon::parse($request->now)->addMonths(-1);
            $now = $month;
        }
        $monthNow =Carbon::parse($month)->format('m');
        $yearNow = Carbon::parse($month)->format('Y');
        $holidays = Holiday::whereMonth('date', $monthNow)
            ->whereYear('date', $yearNow)->get();
      
        $start = date('Y-m-01', strtotime($now));
        $end = date('Y-m-t', strtotime($now));
        $start = Carbon::parse($start);
        $end = Carbon::parse($end)->addDay();
        $month = Carbon::parse($month)->format('M Y');

        if($start->format('D') == 'Sat')$empty = 6;
        elseif($start->format('D') == 'Fri') $empty = 5;
        elseif($start->format('D') == 'Thu') $empty = 4;
        elseif($start->format('D') == 'Wed') $empty = 3;
        elseif($start->format('D') == 'Tue') $empty = 2;
        elseif($start->format('D') == 'Mon') $empty = 1;
        else $empty = 0;
        return view('dashboard.holiday.index',compact('holidays','start','end','month','empty'));
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
        
        $input = $request->validate([
            'title'     => 'required|string',
            'type'     => 'required|numeric',
            'date'      => 'required|string',
        ]);
       $input['date'] = Carbon::parse($request->date);
       Holiday::create($input);
       return redirect()->back()->with('success','Holiday Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function show(Holiday $holiday)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function edit(Holiday $holiday)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Holiday $holiday)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function destroy(Holiday $holiday)
    {
        //
    }
}
