<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeInfo;
use App\Models\Holiday;
use App\Models\Position;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Mpdf\Tag\Th;
use Throwable;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::all()->sortBy('position.rank');
        $now = today();
        $month = date('F Y');
        if ($request->month == 'next') {

            $month = Carbon::parse($request->now)->addMonth();
            $now = $month;
        } else if ($request->month == 'prev') {

            $month = Carbon::parse($request->now)->addMonths(-1);
            $now = $month;
        }
        $monthNow = Carbon::parse($month)->format('m');
        $yearNow = Carbon::parse($month)->format('Y');
        $holidays = Holiday::whereMonth('date', $monthNow)
            ->whereYear('date', $yearNow)->get();

        $start = date('Y-m-01', strtotime($now));
        $end = date('Y-m-t', strtotime($now));
        $start = Carbon::parse($start);
        $end = Carbon::parse($end)->addDay();
        $month = Carbon::parse($month)->format('M Y');

        if ($start->format('D') == 'Sat') $empty = 6;
        elseif ($start->format('D') == 'Fri') $empty = 5;
        elseif ($start->format('D') == 'Thu') $empty = 4;
        elseif ($start->format('D') == 'Wed') $empty = 3;
        elseif ($start->format('D') == 'Tue') $empty = 2;
        elseif ($start->format('D') == 'Mon') $empty = 1;
        else $empty = 0;

        return view('dashboard.welcome',compact('holidays', 'start', 'end', 'month', 'empty','employees'));
    }
     public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect()->to('login');
    }
    public function getItems($item)
    {
    //    try{
        if($item != '1')
        {
            if($item == 'position_id')
            {
                $data = Position::orderBy('id','DESC')->get()->pluck('name','id');

            }
            elseif($item == 'department_id')
            {
                $data = Department::orderBy('id', 'ASC')->get()->pluck('name','id');


            }
            elseif($item == 'gender')
            {
                $data = [1=>'Male',2=>'Female',3=>'Other'];
            }
            else{
                $data = EmployeeInfo::where($item,'!=',null)->distinct()->pluck($item,'id');
               $data = $data->unique();
                // dd($data,$item);

            }
        }
        return json_encode($data);
    // }
    // catch(Throwable $e)
    // {
    //         $data =[];
    //         return json_encode($data);
    // }
    }
}
