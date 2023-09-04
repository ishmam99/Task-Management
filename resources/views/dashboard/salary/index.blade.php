@extends('layouts.app')
@section('css')
 
@endsection
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">

                            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Salary</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Salaries</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <h4 class="header-title">Salaryt List of </h4>
                                <h4 class="text-center"> <a
                                        href="{{ route('salary.index', ['month' => 'prev', 'now' => $month]) }}"
                                        class=" btn btn-primary rounded"><i class=" ri-arrow-left-fill"></i></a>
                                    {{ $month }} <a
                                        href="{{ route('salary.index', ['month' => 'next', 'now' => $month]) }}"
                                        class="btn btn-primary"><i class="  ri-arrow-right-fill"></i></a></h4>
                                <p class="text-muted font-14">
                                    This is the list for all Positions data in our database
                                </p>
                            </div>
                            <div class="col-2">
                                <form action="{{ route('salary.store') }}" method="post">@csrf <input type="hidden"
                                        class="form-control" value="{{ $month }}" name="issued_at"><button
                                        class="btn btn-success rounded">Generate Salary</button>
                                </form>
                            </div>

                        </div>



                        <div class="tab-content">
                            <div class="tab-pane show active" id="basic-datatable-preview">
                                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Employee Name</th>
                                            <th>Basic</th>
                                            <th>Total Allowence</th>
                                            <th>Total Deduction</th>
                                            <th>Gross Salary</th>
                                            <th>Net Payable</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Dearness/Others</th>
                                            <th>House Rent</th>
                                            <th>Medical</th>
                                            <th>Education</th>
                                            <th>Charge Allow</th>
                                            <th>Entertainment</th>
                                            <th>Mobile</th>
                                            <th>Telephone</th>
                                            <th>Washing</th>
                                            <th>Conbeyance</th>
                                            <th>Tiffin</th>
                                            <th>Car Maintenance</th>
                                            <th>Group Insurance</th>

                                            <th>Provident Fund</th>
                                            <th>P F loan</th>
                                            <th>House Building Loan</th>
                                            <th>House Repairing Loan</th>
                                            <th>Car Loan</th>
                                            <th>Motor Cycle Loan</th>
                                            <th>Bi Cycle Loan</th>
                                            <th>Computer Loan</th>
                                            <th>Welfare Loan</th>
                                            <th>Income Tax</th>
                                            <th>Transport</th>
                                            <th>Group Insurance</th>
                                            <th>Benevolent Fund</th>
                                            <th>Municipal Tax</th>
                                            <th>Water Bill</th>
                                            <th>Gas Bill</th>
                                            <th>Revenue Stamp</th>
                                            <th>Officer Welfare Assoc</th>
                                            <th>Union Subscription</th>
                                            <th>Others</th>

                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($salaries as $payroll)
                                            <tr>
                                                 <td>{{ $payroll->employee->first_name }} {{ $payroll->employee->last_name }}</td>
                                                <td>{{ $payroll->basic }}</td>
                                                <td>{{$payroll->total_allowance}}
                                                </td>
                                                <td>{{ $payroll->total_deduction }}
                                                </td>
                                                <td>{{ $payroll->gross_salary }}
                                                </td>

                                                <td>{{ $payroll->net_payable}}
                                                </td>
                                             <td>
                                                    @if ($payroll->status == 0)
                                                        <span
                                                            class="badge badge-pill bg-warning badge-secondary">Pending</span>
                                                    @else
                                                        <span class="badge badge-pill bg-success badge-success">Paid</span>
                                                    @endif
                                                </td>


                                                <td>
                                                    <a href="{{ route('salary.edit', $payroll->id) }}" class="btn btn-primary">Edit </a>
                                                </td>
                                                <td>{{ $payroll->dearness }}</td>
                                                <td>{{ $payroll->house_rent }}</td>
                                                <td>{{ $payroll->medical }}</td>
                                                <td>{{ $payroll->education }}</td>
                                                <td>{{ $payroll->charge_allow }}</td>
                                                <td>{{ $payroll->entertainment }}</td>
                                                <td>{{ $payroll->mobile }}</td>
                                                <td>{{ $payroll->telephone }}</td>
                                                <td>{{ $payroll->washing }}</td>
                                                <td>{{ $payroll->conveyance }}</td>
                                                <td>{{ $payroll->tiffin }}</td>
                                                <td>{{ $payroll->car_maintenance }}</td>
                                                <td>{{ $payroll->group_insurance }}</td>

                                                <td>{{ $payroll->provident_fund }}</td>
                                                <td>{{ $payroll->pf_loan }}</td>
                                                <td>{{ $payroll->house_building_loan }}</td>
                                                <td>{{ $payroll->house_repairing_loan }}</td>
                                                <td>{{ $payroll->car_loan }}</td>
                                                <td>{{ $payroll->motor_cycle_loan }}</td>
                                                <td>{{ $payroll->bi_cycle_loan }}</td>
                                                <td>{{ $payroll->computer_loan }}</td>
                                                <td>{{ $payroll->welfare_loan }}</td>
                                                <td>{{ $payroll->income_tax }}</td>
                                                <td>{{ $payroll->transport }}</td>
                                                <td>{{ $payroll->group_insurance_deduction }}</td>
                                                <td>{{ $payroll->benevolent_fund }}</td>
                                                <td>{{ $payroll->municipal_tax }}</td>
                                                <td>{{ $payroll->water_bill }}</td>
                                                <td>{{ $payroll->gas_bill }}</td>
                                                <td>{{ $payroll->revenue_stamp }}</td>
                                                <td>{{ $payroll->officer_welfare_assoc }}</td>
                                                <td>{{ $payroll->union_subscription }}</td>
                                                <td>{{ $payroll->others }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <h4 class="header-title">Employees List of Salary Bill Pending</h4>

                                <p class="text-muted font-14">
                                    This is the list for all Positions data in our database
                                </p>
                            </div>

                        </div>



                        <div class="tab-content">
                             <div class="tab-pane show active" id="basic-datatable-preview">
                                <table id="basic-datatable1" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Employee Name</th>
                                            <th>Basic</th>
                                            <th>Total Allowence</th>
                                            <th>Total Deduction</th>
                                            <th>Gross Salary</th>
                                            <th>Net Payable</th>
                                            <th>Action</th>

                                            <th>Dearness/Others</th>
                                            <th>House Rent</th>
                                            <th>Medical</th>
                                            <th>Education</th>
                                            <th>Charge Allow</th>
                                            <th>Entertainment</th>
                                            <th>Mobile</th>
                                            <th>Telephone</th>
                                            <th>Washing</th>
                                            <th>Conbeyance</th>
                                            <th>Tiffin</th>
                                            <th>Car Maintenance</th>
                                            <th>Group Insurance</th>

                                            <th>Provident Fund</th>
                                            <th>P F loan</th>
                                            <th>House Building Loan</th>
                                            <th>House Repairing Loan</th>
                                            <th>Car Loan</th>
                                            <th>Motor Cycle Loan</th>
                                            <th>Bi Cycle Loan</th>
                                            <th>Computer Loan</th>
                                            <th>Welfare Loan</th>
                                            <th>Income Tax</th>
                                            <th>Transport</th>
                                            <th>Group Insurance</th>
                                            <th>Benevolent Fund</th>
                                            <th>Municipal Tax</th>
                                            <th>Water Bill</th>
                                            <th>Gas Bill</th>
                                            <th>Revenue Stamp</th>
                                            <th>Officer Welfare Assoc</th>
                                            <th>Union Subscription</th>
                                            <th>Others</th>




                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($employees as $employee)
                                            <tr>
                                                @php
                                                    $payroll = $employee->payrolls->where('status', 0)->first();
                                                @endphp
                                                <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                                                <td>{{ $payroll->basic }}</td>
                                                <td>{{calculateAllowance($payroll)}}
                                                </td>
                                                <td>{{ calculateDeduction($payroll) }}
                                                </td>
                                                <td>{{ grossSalary($payroll) }}
                                                </td>

                                                <td>{{ netPayable($payroll)}}
                                                </td>
                                                <td>Make</td>
                                                <td>{{ $payroll->dearness }}</td>
                                                <td>{{ $payroll->house_rent }}</td>
                                                <td>{{ $payroll->medical }}</td>
                                                <td>{{ $payroll->education }}</td>
                                                <td>{{ $payroll->charge_allow }}</td>
                                                <td>{{ $payroll->entertainment }}</td>
                                                <td>{{ $payroll->mobile }}</td>
                                                <td>{{ $payroll->telephone }}</td>
                                                <td>{{ $payroll->washing }}</td>
                                                <td>{{ $payroll->conveyance }}</td>
                                                <td>{{ $payroll->tiffin }}</td>
                                                <td>{{ $payroll->car_maintenance }}</td>
                                                <td>{{ $payroll->group_insurance }}</td>

                                                <td>{{ $payroll->provident_fund }}</td>
                                                <td>{{ $payroll->pf_loan }}</td>
                                                <td>{{ $payroll->house_building_loan }}</td>
                                                <td>{{ $payroll->house_repairing_loan }}</td>
                                                <td>{{ $payroll->car_loan }}</td>
                                                <td>{{ $payroll->motor_cycle_loan }}</td>
                                                <td>{{ $payroll->bi_cycle_loan }}</td>
                                                <td>{{ $payroll->computer_loan }}</td>
                                                <td>{{ $payroll->welfare_loan }}</td>
                                                <td>{{ $payroll->income_tax }}</td>
                                                <td>{{ $payroll->transport }}</td>
                                                <td>{{ $payroll->group_insurance_deduction }}</td>
                                                <td>{{ $payroll->benevolent_fund }}</td>
                                                <td>{{ $payroll->municipal_tax }}</td>
                                                <td>{{ $payroll->water_bill }}</td>
                                                <td>{{ $payroll->gas_bill }}</td>
                                                <td>{{ $payroll->revenue_stamp }}</td>
                                                <td>{{ $payroll->officer_welfare_assoc }}</td>
                                                <td>{{ $payroll->union_subscription }}</td>
                                                <td>{{ $payroll->others }}</td>


                                                {{-- <td>
                                                    <form action="{{ route('salary.store') }}" method="post">@csrf
                                                        <label for="bonus">Bonus <span
                                                                class="text-success">(+)</span></label>
                                                        <input type="number" class="form-control" value="0.0"
                                                            name="bonus">
                                                        <label for="bonus">Deducted <span
                                                                class="text-danger">(-)</span></label>
                                                        <input type="number" class="form-control" value="0.0"
                                                            name="deducted">
                                                        <label for="bonus">Overtime <span
                                                                class="text-success">(+)</span></label>
                                                        <input type="number" class="form-control" value="0.0"
                                                            name="overtime">
                                                        <input type="hidden" class="form-control"
                                                            value="{{ $month }}" name="issued_at">
                                                        <input type="hidden" class="form-control" name="payroll_id"
                                                            value="{{ $employee->payrolls->where('status', 0)->first()->id }}">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                Sub Total =</div>
                                                            <div class="col-8">
                                                                <p id="total{{ $employee->id }}">
                                                                    {{ $employee->payrolls->where('status', 0)->first()->basic + $employee->payrolls->where('status', 0)->first()->ta + $employee->payrolls->where('status', 0)->first()->da + $employee->payrolls->where('status', 0)->first()->mb + $employee->payrolls->where('status', 0)->first()->others }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <button class="btn mt-2 btn-success">Submit</button>
                                                    </form>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
   
@endsection
