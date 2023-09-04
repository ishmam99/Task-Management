@extends('layouts.app')
@section('css')
<style>
table td{
width: 200px;
margin-left: 5px;
padding-left: 20px;
}
table th{
width: 200px;
margin-left: 5px;
padding-left: 20px;
}
table tr{
border: solid 2px;
}

</style>
@endsection
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Hyper</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('salary.index') }}">Salary List</a></li>
                            <li class="breadcrumb-item active">Salary Individual</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Salary</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Invoice Logo-->
                        <div class="clearfix">
                            <div class="text-center mb-3">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="dark logo" height="50">
                            </div>
                            <div class="float-end">
                                <h4 class="m-0 d-print-none">Salary</h4>
                            </div>
                        </div>

                        <!-- Invoice Detail-->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="float-start mt-3">
                                    <p>Employee Name : <b>{{ $salary->employee->first_name }}
                                            {{ $salary->employee->last_name }}</b></p>
                                    <p>Designation : {{ $salary->employee->position->name }}</p>
                                    <p>Department : {{ $salary->employee->department->name }}</p>

                                </div>

                            </div><!-- end col -->
                            <div class="col-sm-4 offset-sm-2">
                                <div class="mt-3 float-sm-end">
                                    <p class="font-13"><strong>Issue Date: </strong> &nbsp;&nbsp;&nbsp;
                                        {{ Carbon\Carbon::parse($salary->issued_at)->format('d M Y') }}</p>
                                    <p class="font-13"><strong>Payment Status: </strong>
                                        @if ($salary->status == 1)
                                            <span class="badge bg-success float-end">Paid</span>
                                        @else
                                            <span class="badge bg-warning float-end">Pending</span>
                                        @endif
                                    </p>

                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->


                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="table">
                                    <table class="table-bordered mt-4">
                                        <thead>
                                            <tr>


                                                <th colspan="2">Salary</th>
                                                <th colspan="2">Deduction</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td>Basic Salary</td>
                                                <td>{{ $salary->basic }}</td>
                                                <td>Provident Fund</td>
                                                <td>{{ $salary->provident_fund }}</td>
                                            </tr>
                                            <tr>
                                                <td>Dearness/Others</td>
                                                <td>{{ $salary->dearness }}</td>
                                                <td>P F Loan</td>
                                                <td>{{ $salary->pf_loan }}</td>
                                            </tr>

                                            <tr>
                                                <td>Total Salary</td>
                                                <td>{{ $salary->total_salary }}</td>
                                                <td>House Building Loan</td>
                                                <td>{{ $salary->house_building_loan }}</td>
                                            </tr>
                                               <tr><th colspan="2">Other Allowance</th>
                                                 <td>House Repairing Loan</td>
                                                <td>{{ $salary->house_repairing_loan }}</td>
                                              </tr>
                                            <tr>
                                                <td>House Rent</td>
                                                <td>{{ $salary->house_rent }}</td>
                                                <td>Car Loan</td>
                                                <td>{{ $salary->car_loan }}</td>

                                            </tr>
                                            <tr>
                                                <td>Medical</td>
                                                <td>{{ $salary->medical }}</td>
                                                <td>Motor Cycle Loan</td>
                                                <td>{{ $salary->motor_cycle_loan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Edication</td>
                                                <td>{{ $salary->education }}</td>
                                                <td>Bi Cycle Loan</td>
                                                <td>{{ $salary->bi_cycle_loan }}</td>
                                            </tr>
                                            <tr>

                                                <td>Charge Allow</td>
                                                <td>{{ $salary->charge_allow }}</td>
                                                <td>Computer Loan</td>
                                                <td>{{ $salary->computer_loan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Entertainment</td>
                                                <td>{{ $salary->entertainment }}</td>
                                                <td>Welfare Loan</td>
                                                <td>{{ $salary->welfare_loan }}</td>
                                            </tr>
                                            <td>Mobile</td>
                                            <td>{{ $salary->mobile }}</td>
                                            <td>Income Tax</td>
                                            <td>{{ $salary->income_tax }}</td>
                                            </tr>
                                            <tr>
                                                <td>Telephone</td>
                                                <td>{{ $salary->telephone }}</td>
                                                <td>Transport</td>
                                                <td>{{ $salary->transport }}</td>
                                            </tr>
                                            <tr>
                                                <td>Washing</td>
                                                <td>{{ $salary->washing }}</td>
                                                <td>Group Insurance</td>
                                                <td>{{ $salary->gropu_insurance_deduction }}</td>
                                            </tr>
                                            <tr>
                                                <td>Conveyance</td>
                                                <td>{{ $salary->conveyance }}</td>
                                                <td>Benevolent Fund</td>
                                                <td>{{ $salary->benevolent_fund }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tiffin</td>
                                                <td>{{ $salary->tiffin }}</td>
                                                <td>Municipal Tax</td>
                                                <td>{{ $salary->municipal_tax }}</td>
                                            </tr>
                                            <tr>
                                                <td>Car Maintenance</td>
                                                <td>{{ $salary->car_maintenance }}</td>
                                                <td>Water Bill</td>
                                                <td>{{ $salary->water_bill }}</td>
                                            </tr>
                                            <tr>
                                                <td>Group Insurance</td>
                                                <td>{{ $salary->group_insurance }}</td>
                                                <td>Gas Bill</td>
                                                <td>{{ $salary->gas_bill }}</td>
                                            </tr>
                                            <tr>
                                                <td>Total Allowance</td>
                                                <td>{{ $salary->total_allowance }}</td>
                                                <td>Revenue Stamp</td>
                                                <td>{{ $salary->revenue_stamp }}</td>
                                            </tr>
                                            <tr>
                                                <td>Gross Salary</td>
                                                <td>{{ $salary->gross_salary }}</td>
                                                <td>Officer Welfare_assoc</td>
                                                <td>{{ $salary->officer_welfare_assoc }}</td>
                                            </tr>
                                            <tr>
                                              <td></td><td></td>

                                                      <td>Union Subscription</td>
                                                <td>{{ $salary->union_subscription }}</td>

                                            </tr>
                                            <tr>
                                              <td></td><td></td>

                                                      <td>Others</td>
                                                <td>{{ $salary->others }}</td>

                                            </tr>

                                            <tr>
                                               <td>Net Payable</td>
                                                <td>{{ $salary->net_payable }}</td>
                                                   <td>Total Deduction</td>
                                                <td>{{ $salary->total_deduction }}</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="clearfix pt-3">
                                    <h6 class="text-muted">Notes:</h6>
                                    <small>
                                        All accounts are to be paid within 7 days from receipt of
                                        invoice. To be paid by cheque or credit card or direct payment
                                        online. If account is not paid within 7 days the credits details
                                        supplied as confirmation of work undertaken will be charged the
                                        agreed quoted fee noted above.
                                    </small>
                                </div>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row-->

                        <div class="d-print-none mt-4">
                            <div class="float-end d-flex">

                                <button onclick="printIt()" class="m-1 btn btn-primary"><i class="mdi mdi-printer"></i>
                                    Print</button>
                                @if ($salary->status == 0)
                                    <form action="{{ route('salary.destroy', $salary->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="m-1 btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#warning-alert-modal-delete">Delete</button>
                                        <div id="warning-alert-modal-delete" class="modal fade" tabindex="-1"
                                            role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-body p-4">
                                                        <div class="text-center">
                                                            <i class="ri-alert-line h1 text-danger"></i>
                                                            <h4 class="mt-2">!!DELETE Warning!!</h4>
                                                            <p class="mt-3">Please make sure you have checked the data
                                                                correctly . If once Delete button is pressed there will be
                                                                no rollback and the given salary data will be lost . Press
                                                                Cancel if you don't want to change the status of this salary
                                                                bill.
                                                                <br>
                                                                <hr>
                                                                The given salary data will be DELETED and restored to Make
                                                                Salary section in Salary Page
                                                            </p>
                                                            <button type="button" class="btn btn-primary my-2"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit"
                                                                class="m-1 btn btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </form>
                                    <button type="button" class="btn btn-success my-1" data-bs-toggle="modal"
                                        data-bs-target="#warning-alert-modal">Make Paid</button>
                                    <button type="button" class="btn btn-warning m-1" data-bs-toggle="modal"
                                        data-bs-target="#edit-alert-modal">Edit</button>
                                @else
                                    <button class="btn btn-info m-1">Payment Done <i
                                            class="ri-check-double-fill"></i></button>
                                @endif

                            </div>
                        </div>
                        <!-- end buttons -->

                    </div> <!-- end card-body-->
                </div> <!-- end card -->
            </div> <!-- end col-->
        </div>
        <!-- end row -->

    </div>
    <div id="warning-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="ri-alert-line h1 text-warning"></i>
                        <h4 class="mt-2">!! Make Paid Warning !!</h4>
                        <p class="mt-3">Please make sure you have checked the data correctly . If once Make Paid button is
                            pressed there will be no rollback and the given salary will be marked as paid . Press Cancel if
                            you don't want to change the status of this salary bill.
                            <br>
                            <hr>
                            To update any data simply Delete this data and make request from Salary Page
                        </p>
                        <button type="button" class="btn btn-danger my-2" data-bs-dismiss="modal">Cancel</button>
                        <a href="{{ route('salary.updateStatus', $salary->id) }}" class="m-1 btn btn-success">Make Paid</a>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div id="edit-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
<div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Modal Heading</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">


                <form method="POST" action="{{ route('salary.update',$salary->id) }}" class="ps-3 pe-3" action="#">
                    @csrf
                   <div class="row">
                    <div class="col-6"> <h5 class="text-success">Basic & Allowance</h5></div>
                    <div class="col-6"> <h5 class="text-danger" for="">Deductions</h5></div>
                   <div class="row col-6">

                    @foreach ($salary->only('basic',
                     'dearness',
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

           ) as $key => $value)
{{-- {{ dd($key,$value) }} --}}
        <div class="mb-3 col-6">
            <label for="{{ $key }}" class="form-label">{{ucfirst(str_replace('_', ' ', $key)) }}</label>
            <input class="form-control" type="number" id="{{ $key }}" name="{{ $key }}" value="{{ $value }}">
        </div>

@endforeach
</div>

                   <div class="row col-6">

                    @foreach ($salary->only('pf_loan',
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
            'others'
           ) as $key => $value)
{{-- {{ dd($key,$value) }} --}}
        <div class="mb-3 col-6">
            <label for="{{ $key }}" class="form-label">{{ucfirst(str_replace('_', ' ', $key)) }}</label>
            <input class="form-control" type="number" id="{{ $key }}" name="{{ $key }}" value="{{ $value }}">
        </div>

@endforeach
</div>

                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div>
    </div><!-- /.modal -->
@endsection
@section('js')
    <script>
        function printIt() {
            console.log(';');
            window.print();
        }
    </script>
@endsection
