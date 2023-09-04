<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Payroll;
use App\Models\Salary;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $monthNow = date('m');
        $yearNow = date('Y');
        $month = date('F Y');
        if($request->month=='next')
        {
            $month = Carbon::parse($request->now)->addMonth();
            $monthNow =$month->format('m');
            $yearNow = Carbon::parse($request->now)->addMonth()->format('Y');

        }
        elseif($request->month=='prev')
        {
            $month = Carbon::parse($request->now)->addMonths(-1);
            $monthNow = $month->format('m');
            $yearNow = Carbon::parse($request->now)->addMonths(-1)->format('Y');

        }
        $salaries =Salary::whereMonth('issued_at', $monthNow)
        ->whereYear('issued_at', $yearNow)
        ->get()->
        sortBy('employee.position.rank');

        $emp = $salaries->pluck('employee_id');
        $employees = Employee::whereNotIn('id',$emp)->get()->sortBy('position.rank');
            
        $month = Carbon::parse($month)->format('M Y');
        return view('dashboard.salary.index',compact('salaries','month','employees'));
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

        $data = $request->validate([
            'issued_at' => 'required',
              ]);
              $date =Carbon::parse($request->issued_at);
              if($date < now())
              {
                $employees = Salary::whereMonth('issued_at',$date->format('m'))->pluck('employee_id');

        $payrolls = Payroll::whereNotIn('employee_id',$employees)->get();

        foreach($payrolls as $payroll){
        $input = $payroll->only([
            'employee_id',
            'basic',
            'house_rent',
            'medical',
            'education',
            'charge_allow',
            'entertainment',
            'mobile',
            'telephone',
            'washing',
            'conveyance',
            'tiffin',
            'car_maintenance',
            'group_insurance',
            'pf_loan',
            'provident_fund',
            'house_building_loan',
            'house_repairing_loan',
            'car_loan',
            'motor_cycle_loan',
            'bi_cycle_loan',
            'computer_loan',
            'welfare_loan',
            'income_tax',
            'transport',
            'group_insurance_deduction',
            'benevolent_fund',
            'municipal_tax',
            'water_bill',
            'gas_bill',
            'revenue_stamp',
            'officer_welfare_assoc',
            'union_subscription',
            'others',
            'dearness',

        ]);

        $allowence = $payroll->dearness+$payroll->house_rent+$payroll->medical + $payroll->education + $payroll->charge_allow+$payroll->entertainment+$payroll->mobile+$payroll->telephone+$payroll->washing+$payroll->conveyance+$payroll->tiffin+$payroll->car_maintenance+$payroll->group_insurance;
        $deduction = $payroll->provident_fund+$payroll->pf_loan+$payroll->house_building_loan + $payroll->house_repairing_loan + $payroll->car_loan+$payroll->motor_cycle_loan+$payroll->bi_cycle_loan+$payroll->computer_loan+$payroll->welfare_loan+$payroll->income_tax+$payroll->transport+$payroll->group_insurance_deduction+$payroll->benevolent_fund+$payroll->municipal_bill+$payroll->water_bill+$payroll->gas_bill+$payroll->revenue_stamp+$payroll->officer_welfare_assoc+$payroll->union_subscription+$payroll->others;
        $input['total_allowance'] = $allowence;
        $input['gross_salary'] = $payroll->basic+$allowence;
        $input['total_deduction'] = $deduction;
        $input['net_payable'] = $payroll->basic + $allowence - $deduction;
        $input['issued_at'] = Carbon::parse($request->issued_at);


        Salary::create($input);
       
    } return redirect()->back()->with('success','Salary Request Created Successfully');
}
    else {

            return redirect()->back()->with('error', 'Salary Generate for given month is unavailable');
    }


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
    public function edit(Salary $salary)
    {
        return view('dashboard.salary.edit',compact('salary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Salary $salary, Request $request)
    {
     $salary->update($request->all());
     $payroll = $salary;
        $allowence = $payroll->dearness + $payroll->house_rent + $payroll->medical + $payroll->education + $payroll->charge_allow + $payroll->entertainment + $payroll->mobile + $payroll->telephone + $payroll->washing + $payroll->conveyance + $payroll->tiffin + $payroll->car_maintenance + $payroll->group_insurance;
        $deduction = $payroll->provident_fund + $payroll->pf_loan + $payroll->house_building_loan + $payroll->house_repairing_loan + $payroll->car_loan + $payroll->motor_cycle_loan + $payroll->bi_cycle_loan + $payroll->computer_loan + $payroll->welfare_loan + $payroll->income_tax + $payroll->transport + $payroll->group_insurance_deduction + $payroll->benevolent_fund + $payroll->municipal_bill + $payroll->water_bill + $payroll->gas_bill + $payroll->revenue_stamp + $payroll->officer_welfare_assoc + $payroll->union_subscription + $payroll->others;
        $input['total_allowance'] = $allowence;
        $input['gross_salary'] = $payroll->basic + $allowence;
        $input['total_deduction'] = $deduction;
        $input['net_payable'] = $payroll->basic + $allowence - $deduction;
        $salary->update($input);
        return redirect()->back()->with('success','Salary Status updated');
    }
    public function updateStatus(Salary $salary)
    {
        $salary->update(['status'=>1,'paid_at'=>now()]);
        return redirect()->back()->with('success','Salary Status updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salary.index')->with('success','Salary Details Deleted Successfully');
    }
}
