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

        padding: 1px;

    }

    p {
        font-size: 14px;
        font-weight: normal;

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

    #maintable2 {
        font-family: nikosh, sans-serif;
        table-layout: fixed;
        width: 100%;
        border: 0px solid black;
    }

    #maintable2 td {
        text-align: left;
        vertical-align: top;
        padding: 10px 0px 10px 50px;
        font-size: 14px;
        border: 0px solid black;
    }

    #maintable3 {
        font-family: nikosh, sans-serif;
        table-layout: fixed;
        width: 100%;
        border: 1px solid black;
    }

    #maintable3 td {
        text-align: center;
        vertical-align: top;
        padding: 10px 0px 10px 50px;
        font-size: 14px;
        border: 1px solid black;
        background-color: rgba(239, 229, 229, 0.477)
    }

    #ss {
        text-align: center;
        vertical-align: top;
        padding: 10px 0px 0px 50px;
        font-size: 12px;
        border: 0px solid black;
    }
</style>

<body>
    <?php

    function bn2enNumber($number)
    {
        $replace_array = ['১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', '/'];
        $search_array = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0', '-'];
        $bn_number = str_replace($search_array, $replace_array, $number);

        return $bn_number;
    }

    ?>
    <table id="maintable">

        <tr>
            <td width="10%"> <img style="width:100px;height:100px;" src="/img/gonoprojatontrik.png"></td>

            <td width="100%" height="100px" style="text-align:center;margin-top:-1px; padding-top:1%">
                <h1 style="font-size: 27px;">TRADING CORPORATION OF BANGLADESH (TCB)</h1>
                <h2 style="font-size: 23px;"> Ministry of Commerce</h2>
                <h2 style="font-size: 23px;font-weight:400">Government of the People's Republic of Bangladesh</h2>
            </td>

        </tr>
        <tr></tr>
        {{-- <tr>
<td width="20%" style="font-size: 16px;padding: 10px 0px 0px 10px;">
  <p>GOVT. ID :13568653568</p>
  <p>NAME</p>
  <p>NAME (in Bangla):</p>
</td>
<td width="40%" style="text-align:right;"> <img style="width:130px;height:130px;" src="/img/gonoprojatontrik.png">
      </td>

    </tr> --}}
    </table>

    <br>

    <table id="maintable2">
        <TBODY>
            <tr>
                <td colspan="4">
                    <p></p><br><br>
                    <p><span style="font-weight:bold;font-size:14">GOVT. ID : </span> {{ $employee->info?->govt_id }}
                    </p>
                    <p><span style="font-weight: bold;font-size:14">NAME : </span> {{ $employee->first_name }}
                        {{ $employee->last_name }} </p>
                    <p style="font-size:20"><span style="font-weight: bold;font-size:14">NAME (in Bangla) :
                        </span>{{ $employee->info?->bangla_name }}</p>
                </td>
                <td></td>
                {{-- <td width="20%" colspan="2" style="background-color: blue">helli</td> --}}
                {{-- <td colspan="3"  style="background-color: green"></td> --}}
                <td width="20%" colspan="2"> <img style="width:130px;height:130px;"
                        src="{{setImage($employee->image)}}">
                </td>
            </tr>
        </TBODY>
    </table>
            <table id="maintable2">
        <TBODY>
            <tr>
                <td colspan="10" width="100%" style="text-align: center">
                    <h2 style="font-weight: bold;">GENERAL INFORMATION</h2>
                    <hr>
                </td>

            </tr>
            <tr>
                <td style="text-align:left">
                    <p>Father's Name</p>
                </td>

                <td style="text-align:left">
                    <p>: {{ $employee->info?->fatherName }}</p>
                </td>

                <td>
                    <p>Rank</p>
                </td>


                <td>
                    <p> : {{ $employee->position?->name }}</p>
                </td>

            </tr>
            <tr>
                <td style="text-align:left">
                    <p>Mother's Name</p>
                </td>

                <td style="text-align:left">
                    <p>: {{ $employee->info?->motherName }}</p>
                </td>

                <td>
                    <p>Designation</p>
                </td>


                <td>
                    <p> : {{ $employee->position?->name }}</p>
                </td>

            </tr>
            <tr>
                <td style="text-align:left">
                    <p>Permanent Address</p>
                </td>

                <td style="text-align:left">
                    <p>: {{ $employee->info?->homeDistrict }}</p>
                </td>

                <td>
                    <p>Organization</p>
                </td>


                <td>
                    <p> : {{ $employee->department?->name }}</p>
                </td>

            </tr>
            <tr>
                <td style="text-align:left">
                    <p>Date Of Birth</p>
                </td>

                <td style="text-align:left">
                    <p>: {{ Carbon\Carbon::parse($employee->birth_date)->format('d-m-Y') }}</p>
                </td>

                <td>
                    <p>Order Date</p>
                </td>


                <td>
                    <p> : {{ Carbon\Carbon::parse( $employee->info?->orderDate)->format('d-m-Y') }}</p>
                </td>

            </tr>
            <tr>
                <td style="text-align:left">
                    <p>NID </p>
                </td>

                <td style="text-align:left">
                    <p>: {{ $employee->info?->nid }}</p>
                </td>

                <td>
                    <p>Join Date</p>
                </td>


                <td>
                    <p> : {{  Carbon\Carbon::parse($employee->joining_date)->format('d-m-Y') }}</p>
                </td>

            </tr>
            <tr>
                <td style="text-align:left">
                    <p>Religion</p>
                </td>

                <td style="text-align:left">
                    <p>: {{ $employee->info?->religion }}</p>
                </td>

                <td>
                    <p>Cadre</p>
                </td>


                <td>
                    <p> : {{ $employee->info?->cadre }}</p>
                </td>

            </tr>
            <tr>
                <td style="text-align:left">
                    <p>Gender</p>
                </td>

                <td style="text-align:left">
                    <p>: {{ $employee->gender == 1 ? 'Male' : 'Female' }}</p>
                </td>

                <td>
                    <p>Cadre Date</p>
                </td>


                <td>
                    <p> : {{  Carbon\Carbon::parse($employee->info?->cadreDate)->format('d-m-Y') }}</p>
                </td>

            </tr>
            <tr>
                <td style="text-align:left">
                    <p>Marital Status</p>
                </td>

                <td style="text-align:left">
                    <p>: {{ $employee->info?->maritalStat }}</p>
                </td>

                <td>
                    <p>Batch</p>
                </td>


                <td>
                    <p> : {{ $employee->info?->batch }}</p>
                </td>

            </tr>
            <tr>
                <td style="text-align:left">
                    <p>Email </p>
                </td>

                <td style="text-align:left">
                    <p>: {{$employee->email }}</p>
                </td>

                <td>
                    <p>Confirmation G.O. Date</p>
                </td>


                <td>
                    <p> : {{  Carbon\Carbon::parse($employee->info?->confirmationGODate)->format('d-m-Y') }}</p>
                </td>

            </tr>
            <tr>
                <td style="text-align:left">
                    <p>Freedom Fighter </p>
                </td>

                <td style="text-align:left">
                    <p>: {{ $employee->info?->freedomFighter }}</p>
                </td>

                <td>
                    <p>Prl/Lpr Date</p>
                </td>


                <td>
                    <p> : {{ Carbon\Carbon::parse( $employee->info?->prlLprDate)->format('d-m-Y') }}</p>
                </td>


            </tr>
            <tr>
                <td colspan="10" width="100%" style="text-align: center">
                    <hr>

                </td>

            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td colspan="10" width="100%" style="text-align: center">

                    <h2 style="font-weight: bold;">SPOUSE INFORMATION</h2>
                    <hr>
                </td>

            </tr>
            <tr>
                <td style="text-align:left">
                    <p>Name </p>
                </td>

                <td style="text-align:left">
                    <p>: {{ $employee->info?->spouseName }}</p>
                </td>

                <td>
                    <p>Permanent Addresss </p>
                </td>


                <td>
                    <p>: {{ $employee->info?->spouseHomeDist }}</p>
                </td>


            </tr>
            <tr>
                <td style="text-align:left">
                    <p>Occupation </p>
                </td>

                <td style="text-align:left">
                    <p>: {{ $employee->info?->spouseOccupation }}</p>
                </td>

                <td>
                    <p></p>
                </td>


                <td>
                    <p> </p>
                </td>


            </tr>

        </TBODY>

    </table>
    <h2 style="font-weight: bold;text-align: center">EDUCATIONAL QUALIFICATION</h2>
    <hr>
    <table id="maintable3">
        <TBODY>


            <tr>
                <td>
                    <p>Degree</p>
                </td>


                <td>
                    <p> Year</p>
                </td>



                <td>
                    <p> Result</p>
                </td>

                <td>
                    <p> Subject</p>
                </td>
                <td>
                    <p> GPA/CGPA</p>
                </td>
                <td>
                    <p> Distinction</p>
                </td>

            </tr>
            @foreach ($employee->educations as $item)
                <tr>
                    <td>
                        <p>{{$item->degree}}</p>
                    </td>


                    <td>
                        <p> {{$item->year}}</p>
                    </td>



                    <td>
                        <p> {{$item->result}}</p>
                    </td>

                    <td>
                        <p> {{$item->subject}}</p>
                    </td>
                    <td>
                        <p> {{$item->cgpa}}</p>
                    </td>
                    <td>
                        <p> {{$item->distinction}}</p>
                    </td>

                </tr>
            @endforeach


        </TBODY>
    </table>
    <h2 style="font-weight: bold;text-align: center">LOCAL TRAINING (MANDATORY)</h2>
    <hr>
    <table id="maintable3">
        <TBODY>


            <tr>
                <td>
                    <p>Course Title </p>
                </td>


                <td>
                    <p> Institution</p>
                </td>



                <td  style="text-align: center">
                    <p style="text-align: center"> From Date</p>
                </td>

                <td>
                    <p> To Date</p>
                </td>
                <td>
                    <p> Duration
                        (Y-M-D)</p>
                </td>


            </tr>
            @foreach ($employee->trainings->where('type',1) as $training)


            <tr>
                <td>
                    <p>{{$training->title}} </p>
                </td>


                <td>
                    <p> {{$training->institution}}</p>
                </td>



                <td  style="text-align: center">
                    <p> {{ Carbon\Carbon::parse($training->from_date)->format('d-m-Y')}}</p>
                </td>

                <td  style="text-align: center">
                    <p> {{ Carbon\Carbon::parse($training->to_date)->format('d-m-Y')}}</p>
                </td>
                <td>
                    <p> {{$training->duration}}</p>
                </td>


            </tr>
 @endforeach
        </TBODY>
    </table>
    <h2 style="font-weight: bold;text-align: center">LOCAL TRAINING</h2>
    <hr>
    <table id="maintable3">
        <TBODY>


            <tr>
                <td>
                    <p>Course Title </p>
                </td>


                <td>
                    <p> Institution</p>
                </td>



                <td>
                    <p> From Date</p>
                </td>

                <td>
                    <p> To Date</p>
                </td>
                <td>
                    <p> Duration
                        (Y-M-D)</p>
                </td>


            </tr>
             @foreach ($employee->trainings->where('type',2) as $training)


            <tr>
                <td>
                    <p>{{$training->title}} </p>
                </td>


                <td>
                    <p> {{$training->institution}}</p>
                </td>



                <td>
                    <p> {{ Carbon\Carbon::parse($training->from_date)->format('d-m-Y')}}</p>
                </td>

                <td>
                    <p> {{ Carbon\Carbon::parse($training->to_date)->format('d-m-Y')}}</p>
                </td>
                <td>
                    <p> {{$training->duration}}</p>
                </td>


            </tr> @endforeach

        </TBODY>
    </table>
    <h2 style="font-weight: bold;text-align: center">FOREIGN TRAINING</h2>
    <hr>
    <table id="maintable3">
        <TBODY>


            <tr>
                <td>
                    <p>Course Title </p>
                </td>


                <td>
                    <p> Institution</p>
                </td>



                <td>
                    <p> From Date</p>
                </td>

                <td>
                    <p> To Date</p>
                </td>
                <td>
                    <p> Duration
                        (Y-M-D)</p>
                </td>


            </tr>
             @foreach ($employee->trainings->where('type',3) as $training)


            <tr>
                <td>
                    <p>{{$training->title}} </p>
                </td>


                <td>
                    <p> {{$training->institution}}</p>
                </td>



                <td>
                    <p> {{ Carbon\Carbon::parse($training->from_date)->format('d-m-Y')}}</p>
                </td>

                <td>
                    <p> {{ Carbon\Carbon::parse($training->to_date)->format('d-m-Y')}}</p>
                </td>
                <td>
                    <p> {{$training->duration}}</p>
                </td>


            </tr> @endforeach

        </TBODY>
    </table>
    <h2 style="font-weight: bold;text-align: center">POSTION RECORDS</h2>
    <hr>
    <table id="maintable3">
        <TBODY>


            <tr>
                <td>
                    <p>Designation</p>
                </td>


                <td>
                    <p> Organization</p>
                </td>



                <td>
                    <p>Location</p>
                </td>

                <td>
                    <p>From Date</p>
                </td>
                <td>
                    <p> To Date</p>
                </td>


            </tr>
             @foreach ($employee->postings as $posting)


            <tr>
                <td>
                    <p>{{$posting->designation}} </p>
                </td>


                <td>
                    <p> {{$posting->organization}}</p>
                </td>



                <td>
                    <p> {{$posting->location}}</p>
                </td>

                <td>
                    <p> {{ Carbon\Carbon::parse($posting->from_date)->format('d-m-Y')}}</p>
                </td>
                <td>
                    <p> {{ Carbon\Carbon::parse($posting->to_date)->format('d-m-Y')}}</p>
                </td>


            </tr> @endforeach

        </TBODY>
    </table>
    <!--
 <div style=" width: 100%; border-top: 1px dashed black; margin-top: 20px;margin-bottom: 10px;"></div> -->




</body>

</html>
