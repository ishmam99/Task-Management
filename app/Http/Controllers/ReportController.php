<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Report;
use App\Models\Salary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('dashboard.report.index');
    }

    public function posting()
    {

            $employees = Employee::with('postings')->orderBy('position_id')->get();

        $employees =  $employees->sortBy('position.rank');

        // dd($employees);
        return $pdf = PDF::loadView(
            'dashboard.report.posting',
            [
                'employees' => $employees,


            ],
            [],
            [
                'mode' => '',
                'format'               => 'A4',
                'default_font_size'    => '12',
                'default_font'         => 'nikosh',
                'margin_left'          => 10,
                'margin_right'         => 10,
                'margin_top'           => 15,
                'margin_bottom'        => 5,
                'margin_header'        => -10,
                'margin_footer'        => 0,
                'orientation'          => 'L',
                'title'                => 'TRADING CORPORATION OF BANGLADESH (TCB) Employee Details ',
                'show_watermark'       => false,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage'
            ]
        )->stream('employees_posting.pdf');
    }
    public function education()
    {
        $employees = Employee::with('postings','info','educations')->orderBy('position_id')->get();

        $employees =  $employees->sortBy('position.rank');

        // dd($employees);
        return $pdf = PDF::loadView(
            'dashboard.report.education',
            [
                'employees' => $employees,


            ],
            [],
            [
                'mode' => '',
                'format'               => 'A4',
                'default_font_size'    => '12',
                'default_font'         => 'nikosh',
                'margin_left'          => 10,
                'margin_right'         => 10,
                'margin_top'           => 15,
                'margin_bottom'        => 5,
                'margin_header'        => -10,
                'margin_footer'        => 0,
                'orientation'          => 'L',
                'title'                => 'TRADING CORPORATION OF BANGLADESH (TCB) Employee Details ',
                'show_watermark'       => false,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage'
            ]
        )->stream('employees_education.pdf');
    }
    public function training()
    {
        $employees = Employee::with('postings', 'info', 'trainings')->orderBy('position_id')->get();

        $employees =  $employees->sortBy('position.rank');

        // dd($employees);
        return $pdf = PDF::loadView(
            'dashboard.report.training',
            [
                'employees' => $employees,


            ],
            [],
            [
                'mode' => '',
                'format'               => 'A4',
                'default_font_size'    => '12',
                'default_font'         => 'nikosh',
                'margin_left'          => 10,
                'margin_right'         => 10,
                'margin_top'           => 15,
                'margin_bottom'        => 5,
                'margin_header'        => -10,
                'margin_footer'        => 0,
                'orientation'          => 'L',
                'title'                => 'TRADING CORPORATION OF BANGLADESH (TCB) Employee Details ',
                'show_watermark'       => false,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage'
            ]
        )->stream('employees_training.pdf');
    }
    public function salary(Request $request)
    {

        $employees = Employee::with('salaries')->get();
        $date  = Carbon::parse($request->date);
        $employees =  $employees->sortBy('position.rank');
        $empID = $employees->pluck('id');
        $salaries = Salary::whereMonth('issued_at',$date->format('m'))->whereIn('employee_id',$empID)->get()->sortBy('employee.position.rank');
        // dd($salaries);
        return $pdf = PDF::loadView(
            'dashboard.report.salary',
            [
                'salaries' => $salaries,
                'type'      => $request->type,
                'date'      => $date

            ],
            [],
            [
                'mode' => 'utf-8',
                'format'               => 'A4-L',
                'default_font_size'    => '12',
                'default_font'         => 'nikosh',
                'margin_left'          => 10,
                'margin_right'         => 10,
                'margin_top'           => 15,
                'margin_bottom'        => 5,
                'margin_header'        => -10,
                'margin_footer'        => 0,
                'orientation'          => 'L',
                'title'                => 'TRADING CORPORATION OF BANGLADESH (TCB) Employee Details ',
                'show_watermark'       => false,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage'
            ]
        )->stream('employees_salaries.pdf');
    }
}
