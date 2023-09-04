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
                <p style="text-decoration: underline">Employees Postings and Duration List : </p>
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
                <th style="width: 5%">SL</th>
                <th style="width: 15%">Name & Designation</th>

                <th style="width: 10%">
                    Home District
                </th>
                <th style="width: 10%">Joining Date

                </th>
                <th colspan="3" style="width: 60%">Postings

                </th>
                {{-- <th style="width: 20%">Postings

                </th><th style="width: 20%">Postings --}}

                </th>



            </tr>
        </THEAD>
        <TBODY>
            <?php $i = 1; ?>



            @foreach ($employees as $employee)
                <tr>

                    <td>{{ $i++ }}</td>
                    <td>{{ $employee->first_name }} {{ $employee->last_name }}, {{ $employee->position->name }}
                    </td>

                    <td>{{ $employee->info->homeDistrict }}</td>
                    <td>{{ Carbon\Carbon::parse($employee->joining_date)->format('d-m-Y') }}</td>vc

                    <?php
                        $cnt = 0;
                        $flag = false;
                        foreach ($employee->postings as $key => $item) {


                            if($cnt==0){
                              if(!$flag){
                                $flag= true;
                                ?>

                    <td>
                        <p>{{ $item->organization }} </p>
                        <span>{{ Carbon\Carbon::parse($item->to_date)->format('d-m-Y') }} -
                            {{ Carbon\Carbon::parse($item->from_date)->format('d-m-Y') }} </span>
                    </td>
                    <?php
                              }
                              else{

                              ?>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td>
                        <p>{{ $item->organization }} </p>
                        <span>{{ Carbon\Carbon::parse($item->to_date)->format('d-m-Y') }} -
                            {{ Carbon\Carbon::parse($item->from_date)->format('d-m-Y') }} </span>
                    </td>
                    <?php
                              }

                            }
                            else {
                              // $flag = true;
                               ?>
                    <td>
                        <p>{{ $item->organization }} </p>
                        <span>{{ Carbon\Carbon::parse($item->to_date)->format('d-m-Y') }} -
                            {{ Carbon\Carbon::parse($item->from_date)->format('d-m-Y') }} </span>
                    </td>
                    <?php

                            }

                            $cnt++;
                            $cnt%=3;
                        }
                        while($cnt<3)
                            {
                              $cnt++;
                                 ?>
                    <td style="text-align: center"> - </td>
                    <?php
                            }
                      ?>
                </tr>
                {{-- @foreach ($employee->postings as $key => $item)

                            <td>
                                <p>{{ $item->organization }} </p>
                                <span>{{ Carbon\Carbon::parse($item->to_date)->format('d-m-Y') }} -
                                    {{ Carbon\Carbon::parse($item->from_date)->format('d-m-Y') }} </span>
                            </td>
                        @endforeach --}}
                </td>
                </tr>
            @endforeach
        </TBODY>
    </table>

</body>

</html>
