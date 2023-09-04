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

    function bn2enNumber($number)
    {
        $replace_array = ['১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', '.'];
        $search_array = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0', '-'];
        $bn_number = str_replace($search_array, $replace_array, $number);

        return $bn_number;
    }

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
                <p style="text-decoration: underline">{{ $category_name }} wise Employees list : </p>
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
    @if ($print_type == 2)
 <table>
            <THEAD>
                <tr>
                    <th style="width: 5%">SL</th>
                    <th @if ($category_name) style="width:  20%" @else style="width:  40%"@endif >Name</th>

                    <th style="width: 20%">Designation

                    </th>
                    <th style="width: 15%">Mobile

                    </th>
                    <th style="width: 20%">NID

                    </th>
                  @if ($category_name !=null)
                  <th style="width: 20%">{{ $category_name }} </th>
                  @endif


                </tr>
            </THEAD>
            <TBODY>
                <?php $i = 1; ?>
                @foreach ($employees as $employee)
                    <tr>
                             <td class="fixed-width-data" style="text-align: center;">{{$i++ }}</td>
                                <td class="fixed-width-data">{{ $employee->first_name }} {{ $employee->last_name }}</td>

                                <td class="fixed-width-data" >{{ $employee->position->name }}</td>
                                <td class="fixed-width-data" >{{ $employee->phone }}</td>
                                <td class="fixed-width-data" >{{ $employee->info->govt_id }}</td>
                                  @if ($type == 'employee' && $category)
                                   @if ($category == 'position' || $category == 'department')
                                    <td class="fixed-width-data" style="text-align: center;">{{ $employee[$category]['name'] }}</td>

                                    @else<td class="fixed-width-data" style="text-align: center;">{{ $employee[$category] }}</td>@endif
                                @else
                                 <td class="fixed-width-data" style="text-align: center;">{{ $employee->info[$category] }}</td>
                                </tr>

                                  @endif

                      @endforeach
            </TBODY>
 </table>
 @else


    @foreach ($items as $item)
        <p>{{ $category_name }} : {{ $item!='1'?$item : '' }}</p>

        <table>
            <THEAD>
                <tr>
                    <th style="width: 10%">SL</th>
                    <th style="width: 50%">Name</th>

                    <th style="width: 40%">Designation

                    </th>


                </tr>
            </THEAD>
            <TBODY>
                <?php $i = 1; ?>



                @foreach ($employees as $employee)
                <p>hello</p>
                    <tr>

                        @if ($type == 'info')

                            @if(count($items) == 1)
                             <td class="fixed-width-data" width="20%" style="text-align: center;">{{$i++ }}</td>
                                <td class="fixed-width-data" width="30%">{{ $employee->first_name }} {{ $employee->last_name }}</td>

                                <td class="fixed-width-data" width="30%">{{ $employee->position->name }}</td>
                            @elseif ($item == $employee->info[$category])
                                <td class="fixed-width-data" style="text-align: center;">{{ $i++ }}</td>
                                <td class="fixed-width-data">{{ $employee->first_name }} {{ $employee->last_name }}</td>

                                <td class="fixed-width-data">{{ $employee->position->name }}</td>
                            @endif
                        @elseif($type == 'employee')
                            @if ($category == 'position' || $category == 'department')
                                @if ($item == $employee[$category]['name'])
                                    <td class="fixed-width-data" width="20%" style="text-align: center;">{{ $i++ }}
                                    </td>
                                    <td class="fixed-width-data" width="30%">{{ $employee->first_name }} {{ $employee->last_name }}</td>

                                    <td class="fixed-width-data" width="30%">{{ $employee->position->name }}</td>
                                @endif
                            @else
                                     {{-- @if ($item == $employee[$category]) --}}
                                <td class="fixed-width-data" width="20%" style="text-align: center;">{{ $i++ }}</td>
                                <td class="fixed-width-data" width="30%">{{ $employee->first_name}} {{ $employee->last_name }}</td>

                                <td class="fixed-width-data" width="30%">{{ $employee->position->name }}</td>
                                {{-- @endif --}}
                            @endif
                        @endif
                    </tr>
                    {{-- @endif --}}
                @endforeach



            </TBODY>
        </table>
    @endforeach
  @endif
</body>

</html>
