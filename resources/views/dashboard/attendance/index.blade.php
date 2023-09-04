@extends('layouts.app')
@section('css')
    <!-- Datatables css -->
    <!--<link href="assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />-->
    <!--<link href="assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"-->
        <!--type="text/css" />-->
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
                            <li class="breadcrumb-item active">Attendance</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Attendance</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                
                               
                                <h4 class="text-center d-flex justify-content-center"> <a
                                        href="{{ route('attendance.index', ['date' => 'prev', 'now' => Carbon\Carbon::parse($date)->format('d-M-Y')]) }}"
                                        class=" btn btn-primary rounded" style="
    margin-right: 38px;
"><i
                                            class=" ri-arrow-left-fill"></i></a> <span id="showDate" class="mt-2" onclick="openDate()">
                                        {{ Carbon\Carbon::parse($date)->format('d-M-Y') }}</span>
                                    <form action="" id="date" hidden> <input type="date"  name="date">
                                        <button type="submit" class="btn btn-success">Get</button>
                                        <button type="button" class="btn btn-danger" onclick="closeDate()">Cancel</button></form> <a
                                        href="{{ route('attendance.index', ['date' => 'next', 'now' => Carbon\Carbon::parse($date)->format('d-M-Y')]) }}"
                                        class="btn btn-primary" style="
    margin-left: 38px;
"><i class="  ri-arrow-right-fill"></i></a>
                                </h4>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-10">
                                <h4 class="header-title">Attendance List</h4>

                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-info " data-bs-toggle="modal"
                                    data-bs-target="#myModal" data-id="1234"><i class=" ri-add-line font-16">Add Attendance</i>
                                </button>
                            </div>
                        </div>
                        <div id="myModal" class="modal fade"  role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="text-center mt-2 mb-4">
                                            <a href="index.html" class="text-success">
                                                <span><img src="assets/images/logo-dark.png" alt=""
                                                        height="28"></span>
                                            </a>
                                        </div>

                                        <form action="{{ route('attendance.store') }}" method="post" class="ps-3 pe-3">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="emailaddress1" class="form-label">Employee <span class="text-danger">*</span></label>
                                               <select name="employee_id" required data-toggle="select2" class="form-control select2" id="mySelect2">
                                                @foreach ($employees as $employee)
                                                    <option value="{{$employee->id}}">{{$employee->first_name}} {{$employee->last_name}} ({{$employee->uid}})  </option>
                                                @endforeach
                                               </select>
                                            </div>
                                            <div class="mb-3 ml-3 col-10 ">
                                    <label for="example-select" class="form-label ">Employee Status</label>
                                    <br>
                                    <div class="form-check-inline">
                                        <input type="radio"  id="customRadio1" checked onchange="showForm()"  value="0" name="in_leave" class="form-check-input">
                                        <label class="form-check-label text-success" for="customRadio1"> Present</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input type="radio" id="customRadio2" onchange="hideForm()" value="1" name="in_leave" class="form-check-input">
                                        <label class="form-check-label text-danger" for="customRadio2"> Absent</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input type="radio" id="customRadio3" onchange="hideForm()"  value="2" name="in_leave" class="form-check-input">
                                        <label class="form-check-label text-warning" for="customRadio2"> In leave</label>
                                    </div>
                                     @error('in_leave')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div> 
                                <div id="hideFormInput">
                                            <div class="mb-3">
                                                <label for="emailaddress1" class="form-label">In Time <span class="text-danger">*</span></label>
                                               <input type="time" name="in_time"  class="form-control">
                                               <input type="hidden" name="date"  value="{{$date}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailaddress1" class="form-label">Out Time</label>
                                               <input type="time" name="out_time" id="out_time" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailaddress1" class="form-label">Shift <span class="text-danger">*</span></label>
                                               <select name="shift" class="form-control" >
                                               
                                                    <option value="morning">Morning</option>
                                                    <option value="evening">Evening</option>
                                               </select>
                                            </div>

                                            </div>



                                            <div class="mb-3 text-center">
                                                <button class="btn rounded-pill btn-primary" type="submit">Save</button>
                                            </div>

                                        </form>

                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->


                        <div class="tab-content card p-2 mt-5">
                            <div class="tab-pane show active" id="basic-datatable-preview">
                                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>

                                            <th>Employee ID</th>
                                            <th>Employee Name</th>
                                            <th>Department</th>   
                                            <th>In Time</th>
                                            <th>Out Time</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($attendances as $attendance)
                                            <tr>
                                                <td>{{ $attendance->employee->uid }}</td>
                                                <td>{{ $attendance->employee->first_name }} {{ $attendance->employee->last_name }}</td>
                                                <td>{{ $attendance->employee->department->name }} </td>
                                                <td>{{$attendance->in_time ?Carbon\Carbon::parse($attendance->in_time)->format('h:m a') :'N\A'}}</td>
                                                <td>{{$attendance->out_time ?Carbon\Carbon::parse($attendance->out_time)->format('h:m a') :'N\A'}}</td>
                                                <td>
                                                    @if ($attendance->in_leave == 0)
                                                        <span class="badge bg-success">Present</span>
                                                    @elseif($attendance->in_leave == 1)
                                                        <span class="badge bg-danger">Absent</span>
                                                    @else
                                                        <span class="badge bg-warning">Leave</span>
                                                    @endif
                                                </td>
                                                <td><a href="{{route('attendance.edit',$attendance->id)}}"><i class="ri-edit-box-line"></i></a></td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-content card p-2 mt-5">
                             <h4 class="m-0 pb-2">
                                        <a class="text-muted" data-bs-toggle="collapse" href="#todayTasks" role="button" aria-expanded="false" aria-controls="todayTasks">
                                            <i class='uil uil-angle-down font-18'></i>Attendance missing Employees List  <span class="text-muted">({{$employees->count()}})</span>
                                        </a>
                                    </h4>
                            
                                     <div class="collapse show" id="todayTasks">
                            <div class="tab-pane show active" id="basic-datatable-preview">
                                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>

                                            <th>Employee ID</th>
                                            <th>Employee Name</th>
                                            <th>Department</th>   
                                            <th>Position</th>
                                            
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->uid }}</td>
                                                <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                                                <td>{{ $employee->department->name }} </td>
                                                <td>{{ $employee->position->name }} </td>
                                               

                                                
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
    </div>
@endsection
@section('js')
    <!-- Datatables js -->
    <!--<script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>-->
    <!--<script src="assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>-->
    <!--<script src="assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>-->
    <!--<script src="assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>-->

    <!-- Datatable Init js -->
    <!--<script src="assets/js/pages/demo.datatable-init.js"></script>-->
    <script>
        function openDate() {
            let date = document.getElementById('date');
            date.hidden = false;
            let dateSpan = document.getElementById('showDate');
            dateSpan.hidden = true;
        }
        function closeDate() {
            let date = document.getElementById('date');
            date.hidden = true;
            let dateSpan = document.getElementById('showDate');
            dateSpan.hidden = false;
        }
        function hideForm() {
            let div = document.getElementById('hideFormInput');
            console.log(div);
            div.hidden = true;
        }
        function showForm() {
            let div = document.getElementById('hideFormInput');
            div.hidden = false;
        }
       

    </script>
    <script>
    $('#mySelect2').select2({
        dropdownParent: $('#myModal')
    });
</script>
@endsection
