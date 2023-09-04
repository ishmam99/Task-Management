<?php ini_set('pcre.backtrack_limit', '2000000000'); ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style type="text/css" media="print">
    body {
        font-family: 'nikosh', sans-serif;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 1px;
        table-layout: fixed;

        border: 1px solid black;
        font-family: 'nikosh', sans-serif;
    }

    th {
        text-align: center;
        padding: 1px;
        font-weight: normal;
        font-size: 19px;
        border: 1px solid black;
    }

    td {

        border: 1px solid black;
        padding: 5px 2px 5px 12px;

    }

    p {
        font-size: 17px;

    }

    #maintable {
        font-family: nikosh, sans-serif;
        table-layout: fixed;
        width: 100%;
        border: 0px solid black;
    }

    #maintable td {
        text-align: left;
        padding: 2px;
        font-size: 12px;
        border: 0px solid black;
    }
</style>

<body>
    <?php

    ?>
    <table id="maintable">
        <tr>
            <td width="20%"> <img style="width:100px;height:100px;" src="/img/gonoprojatontrik.png"></td>
            <td width="70%" style="text-align:center;">
               <h1 style="font-size: 27px;">TRADING CORPORATION OF BANGLADESH (TCB)</h1>
                <h2 style="font-size: 23px;"> Ministry of Commerce</h2>
                <h2 style="font-size: 23px;font-weight:400">Government of the People's Republic of Bangladesh</h2>


                <br>
                <br>
                <p style="text-decoration: underline">Employees Salary {{ $type == 1 ? 'Summary' : ($type == 2 ? 'Allowance' :'Deduction') }} List : {{ $date->format('M Y') }}</p>
            </td>

        </tr>
        <tr>
            <td width="20%"></td>
            <td width="60%" style="text-align:center;">


            </td>
            <td width="20%" style="text-align:right;">
                <p>Date : {{ date('d-m-Y', time() - 6 * 3600) }} </p>
            </td>
        </tr>
    </table>

    <br>

    <table>
        <THEAD>
            <tr>
                @if ($type == 1)
                <th style="width: 5%">SL</th>
                <th style="width: 10%" >Name </th>
                <th  style="width: 10%"> Designation</th>


                 <th style="width:10%">Basic</th>
                <th style="width:10%">Dearness\Others</th>
                <th style="width:10%">Total Salary</th>
                <th style="width:10%">Total Allowance</th>
                <th style="width:10%">Gross Salary</th>
                <th style="width:10%">Total Deduction</th>
                <th style="width:10%">Net Payable</th>
                @elseif ($type ==2)
                  <th style="width: 2%">SL</th>
                <th style="width: 7%" >Name </th>
                <th  style="width: 7%"> Designation</th>
                 <th style="width:6%">Basic</th>
                 <th style="width:6%">House Rent</th>
                 <th style="width:6%">Medical</th>
                 <th style="width:6%">Education</th>
                 <th style="width:6%">Charge Allow</th>
                 <th style="width:6%">Entertainment</th>
                 <th style="width:6%">Mobile</th>
                 <th style="width:6%">Telephone</th>
                 <th style="width:6%">Washing</th>
                 <th style="width:6%">Conveyance</th>
                 <th style="width:6%">Tiffin</th>
                 <th style="width:6%">Car Maintenance</th>
                 <th style="width:6%">Group Insurance</th>
                 <th style="width:6%">Total Allowance</th>
                 <th style="width:10%">Total Deduction</th>
                <th style="width:10%">Net Payable</th>
                 @elseif($type == 3)
                   <th style="width: 2%">SL</th>
                <th style="width: 5%" >Name </th>
                <th  style="width: 5%"> Designation</th>
                  <th style="width:4%">Basic</th>
                  <th style="width:4%">Provident Fund</th>
                  <th style="width:4%">P F Loan</th>
                  <th style="width:4%">House Building Rent</th>
                  <th style="width:4%">House Repairing Rent</th>
                  <th style="width:4%">Car Loan</th>
                  <th style="width:4%">Motor Cycle Loan</th>
                  <th style="width:4%">Bi Cycle Loan</th>
                  <th style="width:4%">Computer Loan</th>
                  <th style="width:4%">Welfare Loan</th>
                  <th style="width:4%">Income Tax</th>
                  <th style="width:4%">Transport</th>
                  <th style="width:4%">Group Insurance</th>
                  <th style="width:4%">Benevolent Fund</th>
                  <th style="width:4%">Municipal Tax</th>
                  <th style="width:4%">Water Bill</th>
                  <th style="width:4%">Gas Bill</th>
                  <th style="width:4%">Revenue Stamp</th>
                  <th style="width:4%">Office Welfare Assoc</th>
                  <th style="width:4%">Union Subscription</th>
                  <th style="width:4%">Others</th>
                  <th style="width:4%">Total Allowance</th>
                   <th style="width:10%">Total Deduction</th>
                <th style="width:10%">Net Payable</th>
                @endif




            </tr>
        </THEAD>
        <TBODY>




            @foreach ($salaries as $key=>$salary)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $salary->employee->first_name }} {{ $salary->employee->last_name }}</td>
                  <td>{{ $salary->employee->position->name }}</td>
                  <td>{{ $salary->basic }}</td>
                  @if ($type == 1)
                   <td>{{ $salary->dearness }}</td>
                   <td>{{ $salary->dearness+$salary->basic }}</td>
                   <td>{{ $salary->total_allowance }}</td>
                   <td>{{ $salary->gross_salary }}</td>
                   <td>{{ $salary->total_deduction }}</td>
                   <td>{{ $salary->net_payable }}</td>
                   @elseif ($type == 2)
                    <td>{{ $salary->house_rent }}</td>
                    <td>{{ $salary->medical }}</td>
                    <td>{{ $salary->education }}</td>
                    <td>{{ $salary->charge_allow }}</td>
                    <td>{{ $salary->entertainment }}</td>
                    <td>{{ $salary->mobile }}</td>
                    <td>{{ $salary->telephone }}</td>
                    <td>{{ $salary->washing }}</td>
                    <td>{{ $salary->conveyance }}</td>
                    <td>{{ $salary->tiffin }}</td>
                    <td>{{ $salary->car_maintenance }}</td>
                    <td>{{ $salary->group_insurance }}</td>
                    <td>{{ $salary->gross_salary }}</td>
                    <td>{{ $salary->total_deduction }}</td>
                    <td>{{ $salary->net_payable }}</td>
                    @elseif($type ==3)
                     <td>{{ $salary->provident_fund }}</td>
                     <td>{{ $salary->pf_loan }}</td>
                     <td>{{ $salary->house_building_loan }}</td>
                     <td>{{ $salary->house_repairing_loan }}</td>
                     <td>{{ $salary->car_loan }}</td>
                     <td>{{ $salary->motor_cycle_loan }}</td>
                     <td>{{ $salary->bi_cycle_loan }}</td>
                     <td>{{ $salary->computer_loan }}</td>
                     <td>{{ $salary->welfare_loan }}</td>
                     <td>{{ $salary->income_tax }}</td>
                     <td>{{ $salary->transport }}</td>
                     <td>{{ $salary->group_insurance_deduction }}</td>
                     <td>{{ $salary->benevolent_fund }}</td>
                     <td>{{ $salary->municipal_tax }}</td>
                     <td>{{ $salary->water_bill }}</td>
                     <td>{{ $salary->gas_bill }}</td>
                     <td>{{ $salary->revenue_stamp }}</td>
                     <td>{{ $salary->officer_welfare_assoc }}</td>
                     <td>{{ $salary->union_subscription }}</td>
                     <td>{{ $salary->others }}</td>
                     <td>{{ $salary->gross_salary }}</td>
                     <td>{{ $salary->total_deduction }}</td>
                     <td>{{ $salary->net_payable }}</td>
                     @endif
                </tr>
            @endforeach
        </TBODY>
    </table>

</body>

</html>
