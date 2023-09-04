<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeInfo;
use App\Models\Position;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use PDF;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all()->sortBy('position.rank');
        return view('dashboard.employee.index', compact('employees'));
    }

    public function approve(Employee $employee)
    {
        $employee->update(['status' => 1]);
        return redirect()->back()->with('success', 'Employee Approved Successfully');
    }
    public function create()
    {
        return view('dashboard.employee.create');
    }
    public function createPublic()
    {
        return view('dashboard.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // try{
        $input = $request->validate([
            'first_name'        =>  'nullable|string',
            'last_name'         =>  'nullable|string',
            'position_id'       =>  'nullable|exists:positions,id',
            'department_id'     =>  'nullable|exists:departments,id',
            'phone'             =>  'nullable|string',
            'gender'            =>  'nullable',
            'email'             =>  'nullable|string',
            'joining_date'      =>  'nullable',
            'birth_date'        =>  'nullable',
            'bangla_name'            =>  'nullable',
            'address'           =>  'nullable',
            'govt_id'           =>  'nullable',
            'fatherName'           =>  'nullable',
            'motherName'           =>  'nullable',
            'starting_grade'           =>  'nullable',
            'current_grade'           =>  'nullable',
            'current_grade_date'           =>  'nullable',
            'child_boy'           =>  'nullable',
            'child_girl'           =>  'nullable',
            'prlLprDate'           =>  'nullable',
            'homeDistrict'           =>  'nullable',
            'orderDate'           =>  'nullable',
            'cadre'           =>  'nullable',
            'cadreDate'           =>  'nullable',
            'batch'           =>  'nullable',
            'confirmationGODate'           =>  'nullable',
            'religion'           =>  'nullable',
            'maritalStat'           =>  'nullable',
            'nid'           =>  'nullable',
            'freedomFighter'           =>  'nullable',
            'spouseName'           =>  'nullable',
            'spouseHomeDist'           =>  'nullable',
            'spouseOccupation'           =>  'nullable',
        ]);
        $input['confirmationGODate']  = Carbon::parse($request->confirmationGODate)->format('Y-m-d');
        $input['current_grade_date']  = Carbon::parse($request->cadreDate)->format('Y-m-d');
        $input['cadreDate']  = Carbon::parse($request->cadreDate)->format('Y-m-d');
        $input['orderDate']  = Carbon::parse($request->orderDate)->format('Y-m-d');
        $input['prlLprDate']  = Carbon::parse($request->prlLprDate)->format('Y-m-d');
        $input['joining_date']  = Carbon::parse($request->joining_date)->format('Y-m-d');
        $input['birth_date']  = Carbon::parse($request->birth_date)->format('Y-m-d');
        $input['uid']    = now()->format('Ymdhms');
        if ($request->hasFile('image')) {
            $input['image'] = uploadFile($request->file('image'));
        }
        $employee = Employee::create($input);

        $employee->info()->create([
            'bangla_name'    =>  $input['bangla_name'],
            'govt_id'        =>  $input['govt_id'],
            'fatherName'   =>  $input['fatherName'],
            'motherName'   =>  $input['motherName'],
            'bangla_name'   =>  $input['bangla_name'],
            'prlLprDate'   =>  $input['prlLprDate'],
            'homeDistrict'   =>  $input['homeDistrict'],
            'orderDate'   =>  $input['orderDate'],
            'starting_grade'   =>  $input['starting_grade'],

            'current_grade_date'   =>  $input['current_grade_date'],
            'cadre'   =>  $input['cadre'],
            'cadreDate'   =>  $input['cadreDate'],
            'batch'   =>  $input['batch'],
            'confirmationGODate'   =>  $input['confirmationGODate'],
            'religion'   =>  $input['religion'],
            'maritalStat'   =>  $input['maritalStat'],
            'nid'   =>  $input['nid'],

            'freedomFighter'   =>  $input['freedomFighter'],
            'child_boy' => $input['child_boy'],    
            'child_girl' => $input['child_girl'],    
            'spouseName'   =>  $input['spouseName'],
            'spouseHomeDist'   =>  $input['spouseHomeDist'],
            'spouseOccupation'   =>  $input['spouseOccupation'],
        ]);
        if($request->childName)
        {
            $employee->childrens()->create([
                'name'  => $request->childName,
                'birth_date' => Carbon::parse($request->childbirthDate),
                'gender'    => $request->genderChild,
                'education' =>$request->childEducation
                ]);
        }
        if ($request->education['degree'][0] != null) {
            foreach ($request->education['degree']  as $key => $data) {
                $employee->educations()->create([

                    'degree'   => $request->education['degree'][$key],
                    'result'   =>  $request->education['result'][$key],
                    'cgpa'   => $request->education['gpa'][$key],
                    'distinction'   =>   $request->education['distinction'][$key],
                    'subject'   =>   $request->education['subject'][$key],
                    'year'   =>   $request->education['year'][$key],
                ]);
            }
        }
        if ($request->mand_training['course_title'][0] != null) {
            foreach ($request->mand_training['course_title']  as $key => $data) {
                $from_date = Carbon::parse($request->mand_training['from_date'][$key])->format('Y-m-d');
                $to_date = Carbon::parse($request->mand_training['to_date'][$key])->format('Y-m-d');
                $employee->trainings()->create([
                    'type'      => 1,
                    'title'   => $request->mand_training['course_title'][$key],
                    'institution'   =>  $request->mand_training['institution'][$key],
                    'from_date'   => $from_date,
                    'to_date'   =>   $to_date,
                    'duration'   =>   $request->mand_training['duration'][$key],
                ]);
            }
        }
        if ($request->training['course_title'][0] != null) {
            foreach ($request->training['course_title']  as $key => $data) {
                $from_date = Carbon::parse($request->training['from_date'][$key])->format('Y-m-d');
                $to_date = Carbon::parse($request->training['to_date'][$key])->format('Y-m-d');
                $employee->trainings()->create([
                    'type'      => 3,
                    'title'   => $request->training['course_title'][$key],
                    'institution'   =>  $request->training['institution'][$key],
                    'from_date'   => $from_date,
                    'to_date'   =>   $to_date,
                    'duration'   =>   $request->training['duration'][$key],
                ]);
            }
        }
        if ($request->fr_training['foreign_course_title'][0] != null) {
            foreach ($request->fr_training['foreign_course_title']  as $key => $data) {
                $from_date = Carbon::parse($request->fr_training['foreign_from_date'][$key])->format('Y-m-d');
                $to_date = Carbon::parse($request->fr_training['foreign_to_date'][$key])->format('Y-m-d');
                $employee->trainings()->create([
                    'type'      => 2,
                    'title'   => $request->fr_training['foreign_course_title'][$key],
                    'institution'   =>  $request->fr_training['foreign_institution'][$key],
                    'from_date'   => $from_date,
                    'to_date'   =>   $to_date,
                    'duration'   =>   $request->fr_training['foreign_duration'][$key],
                ]);
            }
        }
        if ($request->posting['posting_designation'][0] != null) {
            foreach ($request->posting['posting_designation']  as $key => $data) {
                $from_date = Carbon::parse($request->posting['posting_from_date'][$key])->format('Y-m-d');
                $to_date = Carbon::parse($request->posting['posting_to_date'][$key])->format('Y-m-d');
                $employee->postings()->create([

                    'designation'   => $request->posting['posting_designation'][$key],
                    'organization'   =>  $request->posting['posting_organization'][$key],
                    'location'   =>  $request->posting['posting_location'][$key],
                    'from_date'   => $from_date,
                    'to_date'   =>   $to_date,
                ]);
            }
        }
        return redirect()->back()->with('success', 'Employee Data Stored Successfully');
    }
    // catch(Exception $th)
    // {

    //         return redirect()->back()->with('error', 'Employee Data Store Failed, Please Fill all red(*) marked inputs');
    // }
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $payroll = $employee->payrolls->where('status', 0)->first();
        return view('dashboard.employee.show', compact('employee', 'payroll'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function infoUpdate(Request $request, EmployeeInfo $employeeInfo)
    {
        $input = $request->validate([

            'bangla_name'            =>  'nullable',
            'address'           =>  'nullable',
            'govt_id'           =>  'nullable',
            'fatherName'           =>  'nullable',
            'motherName'           =>  'nullable',
            'child_boy'           =>  'nullable',
            'child_girl'           =>  'nullable',

            'prlLprDate'           =>  'nullable',
            'homeDistrict'           =>  'nullable',
            'orderDate'           =>  'nullable',
            'starting_grade'           =>  'nullable',
            'current_grade_date'           =>  'nullable',
            'batch'           =>  'nullable',
            'confirmationGODate'           =>  'nullable',
            'religion'           =>  'nullable',
            'maritalStat'           =>  'nullable',
            'nid'           =>  'nullable',
            'freedomFighter'           =>  'nullable',
            'spouseName'           =>  'nullable',
            'spouseHomeDist'           =>  'nullable',
            'spouseOccupation'           =>  'nullable',
        ]);
        $input['confirmationGODate']  = Carbon::parse($request->confirmationGODate)->format('Y-m-d');
        $input['current_grade_date']  = Carbon::parse($request->cadreDate)->format('Y-m-d');
        $input['orderDate']  = Carbon::parse($request->orderDate)->format('Y-m-d');
        $input['prlLprDate']  = Carbon::parse($request->prlLprDate)->format('Y-m-d');
        $employeeInfo->update($input);
        return redirect()->back()->with('success', 'Employee Data Updated Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        // dd($request);
        $input = $request->validate([
            'first_name'        =>  'nullable|string',
            'last_name'         =>  'nullable|string',
            'position_id'       =>  'nullable|exists:positions,id',
            'current_grade'     =>  'nullable',
            'department_id'     =>  'nullable|exists:departments,id',
            'phone'             =>  'nullable|string',
            'gender'            =>  'nullable',
            'email'             =>  'nullable|string',
            'joining_date'      =>  'nullable',
            'birth_date'        =>  'nullable',
        ]);
        $input['birth_date']  = Carbon::parse($request->birth_date)->format('Y-m-d');
        $input['joining_date']  = Carbon::parse($request->joining_date)->format('Y-m-d');

        if ($request->hasFile('image')) {
            $input['image'] = uploadFile($request->file('image'));
        }
        // dd($input);
        $employee->update($input);
        return redirect()->back()->with('success', 'Employee Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        if ($employee->image)
            deleteFile($employee->image);
        $employee->delete();
        return redirect()->back()->with('success', 'Employee Data Deleted Successfully');
    }
    public function report(Employee $employee)
    {
        //  dd($employee->info);
        return $pdf = PDF::loadView(
            'dashboard.employee.report',
            [
                'employee' => $employee->load('info', 'educations', 'trainings', 'postings'),
                'image' => 'dd',
                'user'  => 'f',
                'id'    => 'dc'

            ],
            [],
            [
                'mode' => '',
                'format'               => 'A4',
                'default_font_size'    => '12',
                'default_font'         => 'nikosh',
                'margin_left'          => 10,
                'margin_right'         => 10,
                'margin_top'           =>   0,
                'margin_bottom'        => 5,
                'margin_header'        => -10,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'TRADING CORPORATION OF BANGLADESH (TCB) Employee Details ',
                'show_watermark'       => false,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage'
            ]
        )->stream('employee-' . $employee->uid . '.pdf');
    }
    public function massReport(Request $request)
    {

        if($request->category == null)
       {
        $employees = Employee::orderBy('position_id')->get();
         $items[] = 1;
        $request->category = null;
                // 'dateE' => $dateE,
                // 'userArray' => $userArray,
         $type = 'employee';
         $category_name = null;
       }else{

        $items = [];
        if ($request->category == 'position_id' || $request->category == 'gender' || $request->category == 'department_id' || $request->category == 'joining_date' || $request->category == 'birth_date') {
            $type = 'employee';
            if ($request->item != null) {
                $employees = Employee::where($request->category, $request->item)->get();
                $items[] = $request->selected;
                // $category_name = $request->selected;

            } else
                $employees = Employee::where($request->category, '!=', null)->orderBy('position_id')->get();
        } else {
            $type = 'info';
            if ($request->item != null) {
                $employees = EmployeeInfo::where($request->category, $request->selected)->get();
                // dd($employees, $request->selected, $request->category);
                $items[] = $request->selected;
            } else
                $employees = EmployeeInfo::with('employee.position')->where($request->category, '!=', null)->get();
            $items = $employees->pluck($request->category)->unique();
            // dd($items);
            $employees = $employees->pluck(['employee']);
        }
        // dd($employees);
        if ($request->item == null && $type == 'employee') {
            if ($request->category == 'position_id') {
                $items = $employees->pluck('position.name')->unique();

                $request->category = 'position';
            } elseif ($request->category == 'department_id') {
                $items = $employees->pluck('department.name')->unique();
                $request->category = 'department';
            } else {
                $items =
                    $items = $employees->pluck($request->category)->unique();
                // $category_name = $request->category;
            }
        }
    }
        // dd($type);
        $employees =  $employees->sortBy('position.rank');
        // dd($type);
        // dd($items,$type, ($request->type && $request->item == null) ? $request->type : 1);
        // dd($request->category);
        // dd($request->selected_category);
        return $pdf = PDF::loadView(
            'dashboard.employee.mass',
            [
                'employees' => $employees,
                'items' => $items,
                'category' => $request->category,
                // 'dateE' => $dateE,
                // 'userArray' => $userArray,
                'type' => $type,
                'print_type' => ($request->type && $request->item == null)? $request->type : 1,
                'category_name' => $request->selected_category

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
        )->stream('employees.pdf');
    }
}
