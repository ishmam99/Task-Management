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
                {{-- <p style="text-decoration: underline">Employees Postings and Duration List : </p> --}}
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
                <th style="width: 10%">SL</th>
                <th style="width: 15%" >Name </th>
                <th  style="width: 15%"> Designation</th>

                <th style="width: 15%">
                    Home District
                </th>
                <th style="width: 15%">
                   Date of Birth
                </th>
                <th style="width: 15%">Education

                </th>
                <th style="width: 15%">PRL/LPR Date

                </th>


            </tr>
        </THEAD>
        <TBODY>
            <?php $i = 1; ?>



            @foreach ($employees as $employee)
                <tr>




                    <td>{{ $i++ }}</td>
                    <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                    <td> {{ $employee->position->name }}
                    </td> <td>{{ $employee->info->homeDistrict }}</td>
                    <td>{{ Carbon\Carbon::parse($employee->birth_date)->format('d-m-Y') }}</td>


                    <td>{{ $employee->educations->last()?->degree }}</td>
                    <td>{{ Carbon\Carbon::parse($employee->info->prlLprDate)->format('d-m-Y') }}</td>
                    <td>
                      </td>
                </tr>
            @endforeach
        </TBODY>
    </table>

</body>

</html>
