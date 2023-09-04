@extends('layouts.app')
@section('css')
    <!-- Datatables css -->
    {{-- <link href="assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css" /> --}}
@endsection
@php
    $employees = [];
@endphp
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">


            <!-- start page title -->
            <div class="page-title-box">
                <div class="page-title-right">
                    <div class="app-search">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search..." />
                                <span class="mdi mdi-magnify search-icon"></span>
                                <button class="input-group-text btn btn-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class='uil uil-sort-amount-down'></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Due Date</a>
                                    <a class="dropdown-item" href="#">Added Date</a>
                                    <a class="dropdown-item" href="#">Assignee</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <h4 class="page-title">Mettings <button onclick="openForm()" class="btn btn-success btn-sm ms-3">Add
                        New</button> <button class="btn btn-primary btn-sm ms-3">Notification</button></h4>
            </div>
            <!-- end page title -->
            <div class="card m-5 p-3" @if (!$errors->any()) hidden @endif id="form">
                <div class="card-title text-center">
                    <h3>Schedule Meeting <i class="text-primary ri-alarm-line"></i></h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('meeting.store') }}" method="post">
                        @csrf

                        <div class="row">

                            <div class="mb-3 px-5 col-10">
                                <label for="simpleinput" class="form-label">Title</label>
                                <input type="text" id="title" name="title" placeholder="Enter Meeting Title"
                                    class="form-control">
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 px-5 col-10">
                                <label for="example-fileinput" class="form-label">Attachment</label>
                                <input type="file" id="file" name="file" class="form-control">
                                @error('file')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-5 px-5">
                                <label class="form-label">Select Date </label>
                                <input type="text" name="date" class="form-control date" id="birthdatepicker"
                                    data-toggle="date-picker" data-single-date-picker="true">
                                @error('date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-5 px-5">
                                <label class="form-label">Select Time </label>
                                <div class="input-group" id="timepicker-input-group1">
                                    <input id="timepicker" type="time" name="time" class="form-control"
                                        data-provide="timepicker">
                                    <span class="input-group-text"><i class="ri-time-line"></i></span>

                                </div> @error('time')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-5 px-5">
                                <label for="example-select" class="form-label"> Select Priority Label</label>
                                <select class="form-select" name="type" id="example-select">
                                    <option value="Low" class="text text-warning">Low</option>
                                    <option value="Medium" class="text text-success">Medium</option>
                                    <option value="High" class="text text-danger">High</option>

                                </select>
                                @error('type')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-5 px-5">
                                <label for="example-select" class="form-label"> Select Department</label>
                                <select class="form-select select2" data-toggle="select2" required onchange="setEmployees()"
                                    name="department_id" id="department">
                                    {{-- <option value="">--Select Department--</option> --}}
                                    <option value="0">**All Department**</option>
                                    @foreach (App\Models\Department::with('employees.position', 'employees.department')->get() as $department)
                                        <option value="{{ $department->id }}" data-id="{{ $department }}">
                                            {{ $department->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="mb-3 col-8 px-5" hidden id="divEmp">
                                <label for="example-select" class="form-label"> Select Employees</label>
                                <select class="form-select select2-multiple" multiple="multiple" data-toggle="select2"
                                    name="employee_id[]" id="employee">
                                    <option value="">--Select Employee--</option>
                                    {{--
                                            for future use if multiple Department can be selected
                                            onchange="addEmployee()" --}}
                                </select>
                            </div>
                            {{--
                                                 for future use if multiple Department can be selected
                                                <div class="mb-3 col-10  px-5" hidden id="divEmpLi">
                                            <label for="example-select" class="form-label"> Selected Employees List</label>
                                            <ol class="list-group  list-group-numbered" id="employee_list">

                                            </ol>
                                           <div id="list">
                                            </div>
                                        </div> --}}
                            <div class="mb-3 px-5 col-10">
                                <label for="simpleinput" class="form-label">Location</label>
                                <input type="text" id="location" placeholder="Enter Meeting Location"
                                    name="location" class="form-control">
                                @error('location')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 px-5 col-10">
                                <label for="simpleinput" class="form-label">Meeting Minutes</label>
                                <input type="text" id="duration" placeholder="Enter Meeting Duration"
                                    name="duration" class="form-control">
                                @error('duration')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 px-5 col-10">
                                <label for="simpleinput" class="form-label">Meeting Agenda</label>
                                <input type="text" id="agenda" placeholder="Enter Meeting Agenda" name="agenda"
                                    class="form-control">
                                @error('agenda')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 px-5 col-10">
                                <label for="simpleinput" class="form-label">Sarok No</label>
                                <input type="text" id="sarok" placeholder="Enter Sarok No" name="sarok"
                                    class="form-control">
                                @error('agenda')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 px-5">
                                <label for="example-textarea" class="form-label">Description</label>
                                <textarea class="form-control" name="details" id="example-textarea" placeholder="Enter Meeting Details"
                                    rows="5"></textarea>
                                @error('details')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success m-3 ">Save</button>
                            <button type="button" onclick="closeForm()" class="btn btn-primary ">Close</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- tasks panel -->
            <div class="mt-2">
                <h5 class="m-0 pb-2">
                    <a class="text-dark" data-bs-toggle="collapse" href="#todayTasks" role="button"
                        aria-expanded="false" aria-controls="todayTasks">
                        <i class='uil uil-angle-down font-18'></i>Today <span
                            class="text-muted">({{ $today->count() }})</span>
                    </a>
                </h5>

                <div class="collapse " id="todayTasks">
                    <div class="tab-content overflow-scroll">
                        <div class="tab-pane show active" id="basic-datatable-preview">
                            <table id="basic-datatable1" class="table table-striped overflow-scroll">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Sarok No</th>
                                        <th>Schedule</th>
                                        <th>Meeting Minutes</th>
                                        <th>Department</th>
                                        <th>Employees</th>
                                        <th>Priority</th>
                                        <th>Details</th>
                                        <th>Agenda</th>
                                        <th>Location</th>




                                        <th>Action</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($today as $meeting)
                                        <tr>
                                            <td>{{ $meeting->title }}</td>
                                            <td>{{ $meeting->sarok }}</td>
                                            <td> <i class='uil uil-schedule font-16 me-1'></i>
                                                {{ Carbon\Carbon::parse($meeting->schedule)->format('D M Y') }}
                                                {{ Carbon\Carbon::parse($meeting->schedule)->format('h:m A') }}</td>
                                                <td>{{$meeting->duration}}</td>
                                            <td> @if ($meeting->employee_type == 0)
                                                                    <span class="badge bg-success">All Department</span>
                                                                 @else
                                                                 <span class="badge bg-info">{{$meeting->department->name}}</span>

                                                                 @endif</td>
                                            <td>
                                                @if ($meeting->employee_type == 0)
                                                    <div class="dropdown">
                                                        <button class="btn btn-light btn-sm dropdown-toggle"
                                                            type="button" id="dropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Attending Employees

                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            @foreach (App\Models\Employee::all()->sortBy('position.rank') as $item)
                                                                <a class="dropdown-item"
                                                                    href="{{ route('employee.show', $item->id) }}">{{ $item->first_name }}({{ $item->position->name }})</a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @elseif($meeting->employee_type == 1)
                                                    <div class="dropdown">
                                                        <button class="btn btn-light btn-sm dropdown-toggle"
                                                            type="button" id="dropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Attending Employees

                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            @foreach ($meeting->department->employees as $item)
                                                                <a class="dropdown-item"
                                                                    href="{{ route('employee.show', $item->id) }}">{{ $item->first_name }}({{ $item->position->name }})</a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="dropdown">
                                                        <button class="btn btn-light btn-sm dropdown-toggle"
                                                            type="button" id="dropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Attending Employees
                                                            {{-- {{(json_decode($meeting->employees,true)['Department'])}} --}}
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            @foreach (json_decode($meeting->employees, true) as $item)
                                                                <a class="dropdown-item"
                                                                    href="{{ route('employee.show', $item['id']) }}">{{ $item['first_name'] }}({{ $item['position']['name'] }})</a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($meeting->type == 'High')
                                                    <li class="list-inline-item ms-2">
                                                        <span class="badge badge-danger-lighten p-1">High</span>
                                                    </li>
                                                @elseif($meeting->type == 'Low')
                                                    <li class="list-inline-item ms-2">
                                                        <span class="badge badge-success-lighten p-1">Low</span>
                                                    </li>
                                                @else
                                                    <li class="list-inline-item ms-2">
                                                        <span class="badge badge-info-lighten p-1">Medium</span>
                                                    </li>
                                                @endif
                                            </td>
                                            <td>{{ $meeting->details }}</td>
                                            <td>{{ $meeting->agenda }}</td>
                                            <td>{{ $meeting->location }}</td>
                                            {{-- <td>{{ $meeting->status }}</td> --}}

                                            <td class="d-flex flex-row">
                                                <a href="{{ route('meeting.edit', $meeting->id) }}"
                                                    class="btn btn-primary m-1"> <i class=" ri-edit-box-line"></i>Edit</a>

                                                <form action="{{ route('meeting.destroy', $meeting->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger m-1">Delete</button>
                                                </form> <a href="{{ setImage($meeting->file) }}"
                                                    class="btn btn-primary m-1"> <i class=" ri-edit-box-line"></i>Attachment</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="card mb-0">
                                            <div class="card-body">
                                                <!-- task -->
                                                @foreach ($today as $meeting)



                                                <div class="row justify-content-sm-between">
                                                    <div class="col-sm-4 mb-2 mb-sm-0">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input"  @if ($meeting->status == 1)
                                                                checked
                                                            @endif id="task1">
                                                            <label class="form-check-label" for="task1">
                                                                {{$meeting->title}}
                                                            </label>
                                                        </div> <!-- end checkbox -->
                                                    </div> <!-- end col -->
                                                    <div class="col-sm-8">
                                                        <div class="d-flex justify-content-between">
                                                            <div id="tooltip-container">
                                                                 @if ($meeting->employee_type == 0)
                                                                    <span class="badge bg-success">All Department</span>
                                                                 @else
                                                                 <span class="badge bg-info">{{$meeting->department->name}}</span>

                                                                 @endif
                                                            </div>
                                                            <div>
                                                                <ul class="list-inline font-13 text-end">
                                                                    <li class="list-inline-item">
                                                                  Sarok : {{$meeting->sarok}}
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                 <p class="text-white px-1 bg-info"> Agenda : {{$meeting->sarok}}</p>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <i class=' ri-time-line font-16 me-1'></i> {{$meeting->duration}} minutes
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <i class='uil uil-schedule font-16 me-1'></i> {{Carbon\Carbon::parse($meeting->schedule)->format('D M Y')}}
                                                                    </li>
                                                                    <li class="list-inline-item ms-1">
                                                                        <i class=' ri-time-line font-16 me-1'></i>{{Carbon\Carbon::parse($meeting->schedule)->format('H:m A')}}
                                                                    </li>
                                                                    <li class="list-inline-item ms-1">
                                                                        <i class='uil uil-comment-message font-16 me-1'></i>
                                                                    </li>
                                                                    @if ($meeting->type == 'High')
                                                                         <li class="list-inline-item ms-2">
                                                                        <span class="badge badge-danger-lighten p-1">High</span>
                                                                    </li>
                                                                    @elseif($meeting->type == 'Low')
                                                                        <li class="list-inline-item ms-2">
                                                                        <span class="badge badge-success-lighten p-1">Low</span>
                                                                    </li>
                                                                    @else
                                                                     <li class="list-inline-item ms-2">
                                                                        <span class="badge badge-info-lighten p-1">Medium</span>
                                                                    </li>
                                                                    @endif

                                                                </ul>
                                                            </div>
                                                            <div >
                                                                @if ($meeting->employee_type == 0)
                                                                    <div class="dropdown">
                                                                    <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                   Attending Employees

                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        @foreach (App\Models\Employee::all()->sortBy('position.rank') as $item)
                                                                          <a class="dropdown-item" href="{{route('employee.show',$item->id)}}">{{$item->first_name}}({{$item->position->name}})</a>
                                                                          @endforeach
                                                                    </div>
                                                                </div>
                                                                @elseif($meeting->employee_type == 1)

                                                                    <div class="dropdown">
                                                                    <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                   Attending Employees

                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        @foreach ($meeting->department->employees as $item)
                                                                          <a class="dropdown-item" href="{{route('employee.show',$item->id)}}">{{$item->first_name}}({{$item->position->name}})</a>
                                                                          @endforeach
                                                                    </div>
                                                                </div>
                                                                @else

                                                               <div class="dropdown">
                                                                    <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Attending Employees

                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        @foreach (json_decode($meeting->employees, true) as $item)
                                                                          <a class="dropdown-item" href="{{route('employee.show',$item['id'])}}">{{$item['first_name']}}({{$item['position']['name']}})</a>
                                                                          @endforeach
                                                                    </div>
                                                                </div>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                  @endforeach





                                            </div>
                                        </div> --}}
                </div> <!-- end .collapse-->
            </div> <!-- end .mt-2-->

            <!-- upcoming tasks -->
            <div class="mt-2">
                <h5 class="m-0 pb-2">
                    <a class="text-dark" data-bs-toggle="collapse" href="#upcomingTasks" role="button"
                        aria-expanded="false" aria-controls="upcomingTasks">
                        <i class='uil uil-angle-down font-18'></i>Upcoming <span
                            class="text-muted">({{ $upcoming->count() }})</span>
                    </a>
                </h5>

                <div class="collapse " id="upcomingTasks">
                    <div class="tab-pane show overflow-scroll" id="basic-datatable-preview">
                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Sarok No</th>
                                    <th>Schedule</th>
                                    <th>Meeting Minutes</th>
                                    <th>Department</th>
                                    <th>Employees</th>
                                    <th>Priority</th>
                                    <th>Details</th>
                                    <th>Agenda</th>
                                    <th>Location</th>




                                    <th>Action</th>

                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($upcoming as $meeting)
                                    <tr>
                                        <td>{{ $meeting->title }}</td>
                                        <td>{{ $meeting->sarok }}</td>
                                        <td> <i class='uil uil-schedule font-16 me-1'></i>
                                            {{ Carbon\Carbon::parse($meeting->schedule)->format('D M Y') }}
                                            {{ Carbon\Carbon::parse($meeting->schedule)->format('h:m A') }}</td>
                                         <td>{{$meeting->duration}}</td>
                                        <td> @if ($meeting->employee_type == 0)
                                                                    <span class="badge bg-success">All Department</span>
                                                                 @else
                                                                 <span class="badge bg-info">{{$meeting->department->name}}</span>

                                                                 @endif</td>
                                        <td>
                                            @if ($meeting->employee_type == 0)
                                                <div class="dropdown">
                                                    <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Attending Employees

                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        @foreach (App\Models\Employee::all()->sortBy('position.rank') as $item)
                                                            <a class="dropdown-item"
                                                                href="{{ route('employee.show', $item->id) }}">{{ $item->first_name }}({{ $item->position->name }})</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @elseif($meeting->employee_type == 1)
                                                <div class="dropdown">
                                                    <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Attending Employees

                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        @foreach ($meeting->department->employees as $item)
                                                            <a class="dropdown-item"
                                                                href="{{ route('employee.show', $item->id) }}">{{ $item->first_name }}({{ $item->position->name }})</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @else
                                                <div class="dropdown">
                                                    <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Attending Employees
                                                        {{-- {{(json_decode($meeting->employees,true)['Department'])}} --}}
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        @foreach (json_decode($meeting->employees, true) as $item)
                                                            <a class="dropdown-item"
                                                                href="{{ route('employee.show', $item['id']) }}">{{ $item['first_name'] }}({{ $item['position']['name'] }})</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($meeting->type == 'High')
                                                <li class="list-inline-item ms-2">
                                                    <span class="badge badge-danger-lighten p-1">High</span>
                                                </li>
                                            @elseif($meeting->type == 'Low')
                                                <li class="list-inline-item ms-2">
                                                    <span class="badge badge-success-lighten p-1">Low</span>
                                                </li>
                                            @else
                                                <li class="list-inline-item ms-2">
                                                    <span class="badge badge-info-lighten p-1">Medium</span>
                                                </li>
                                            @endif
                                        </td>
                                        <td>{{ $meeting->details }}</td>
                                        <td>{{ $meeting->agenda }}</td>
                                        <td>{{ $meeting->location }}</td>
                                        {{-- <td>{{ $meeting->status }}</td> --}}

                                       <td class="d-flex flex-row">
                                            <a href="{{ route('meeting.edit', $meeting->id) }}"
                                                class="btn btn-primary m-1"> <i class=" ri-edit-box-line"></i>Edit</a>

                                            <form action="{{ route('meeting.destroy', $meeting->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger m-1">Delete</button>
                                            </form> <a href="{{ setImage($meeting->file) }}"
                                                    class="btn btn-primary m-1"> <i class=" ri-edit-box-line"></i>Attachment</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div> <!-- end .collapse-->
            </div>

            <!-- end upcoming tasks -->

            <!-- start other tasks -->
            <div class="mt-2">
                <h5 class="m-0 pb-2">
                    <a class="text-dark" data-bs-toggle="collapse" href="#olderTasks" role="button"
                        aria-expanded="false" aria-controls="olderTasks">
                        <i class='uil uil-angle-down font-18'></i>Older <span
                            class="text-muted">({{ $older->count() }})</span>
                    </a>
                </h5>

                <div class="collapse " id="olderTasks">
                    <div class="tab-pane show overflow-scroll" id="basic-datatable-preview">
                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Sarok No</th>
                                    <th>Schedule</th>
                                    <th>Meeting Minutes</th>
                                    <th>Department</th>
                                    <th>Employees</th>
                                    <th>Priority</th>
                                    <th>Details</th>
                                    <th>Agenda</th>
                                    <th>Location</th>




                                    <th>Action</th>

                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($older as $meeting)
                                    <tr>
                                        <td>{{ $meeting->title }}</td>
                                        <td>{{ $meeting->sarok }}</td>
                                        <td> <i class='uil uil-schedule font-16 me-1'></i>
                                            {{ Carbon\Carbon::parse($meeting->schedule)->format('D M Y') }}
                                            {{ Carbon\Carbon::parse($meeting->schedule)->format('h:m A') }}</td>
                                             <td>{{$meeting->duration}}</td>
                                        <td> @if ($meeting->employee_type == 0)
                                                                    <span class="badge bg-success">All Department</span>
                                                                 @else
                                                                 <span class="badge bg-info">{{$meeting->department->name}}</span>

                                                                 @endif</td>
                                        <td>
                                            @if ($meeting->employee_type == 0)
                                                <div class="dropdown">
                                                    <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Attending Employees

                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        @foreach (App\Models\Employee::all() as $item)
                                                            <a class="dropdown-item"
                                                                href="{{ route('employee.show', $item->id) }}">{{ $item->first_name }}({{ $item->position->name }})</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @elseif($meeting->employee_type == 1)
                                                <div class="dropdown">
                                                    <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Attending Employees

                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        @foreach ($meeting->department->employees as $item)
                                                            <a class="dropdown-item"
                                                                href="{{ route('employee.show', $item->id) }}">{{ $item->first_name }}({{ $item->position->name }})</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @else
                                                <div class="dropdown">
                                                    <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Attending Employees
                                                        {{-- {{(json_decode($meeting->employees,true)['Department'])}} --}}
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        @foreach (json_decode($meeting->employees, true) as $item)
                                                            <a class="dropdown-item"
                                                                href="{{ route('employee.show', $item['id']) }}">{{ $item['first_name'] }}({{ $item['position']['name'] }})</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($meeting->type == 'High')
                                                <li class="list-inline-item ms-2">
                                                    <span class="badge badge-danger-lighten p-1">High</span>
                                                </li>
                                            @elseif($meeting->type == 'Low')
                                                <li class="list-inline-item ms-2">
                                                    <span class="badge badge-success-lighten p-1">Low</span>
                                                </li>
                                            @else
                                                <li class="list-inline-item ms-2">
                                                    <span class="badge badge-info-lighten p-1">Medium</span>
                                                </li>
                                            @endif
                                        </td>
                                        <td>{{ $meeting->details }}</td>
                                        <td>{{ $meeting->agenda }}</td>
                                        <td>{{ $meeting->location }}</td>
                                        {{-- <td>{{ $meeting->status }}</td> --}}

                                          <td class="d-flex flex-row">
                                            <a href="{{ route('meeting.edit', $meeting->id) }}"
                                                class="btn btn-primary m-1"> <i class=" ri-edit-box-line"></i>Edit</a>

                                            <form action="{{ route('meeting.destroy', $meeting->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger m-1">Delete</button>
                                            </form> <a href="{{ setImage($meeting->file) }}"
                                                    class="btn btn-primary m-1"> <i class=" ri-edit-box-line"></i>Attachment</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end .collapse-->
            </div>
        </div> <!-- end col -->

        <!-- task details -->

    </div> <!-- content -->
    <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
        aria-hidden="true">

    </div>
@endsection
@section('js')
    <!-- Datatables js -->
    {{-- <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
            <script src="assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
            <script src="assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

            <!-- Datatable Init js -->
            <script src="assets/js/pages/demo.datatable-init.js"></script> --}}
    <script>
        let employeeList = [];

        function openForm() {
            let form = document.getElementById('form')
            form.hidden = false;
        }

        function closeForm() {
            let form = document.getElementById('form')
            form.hidden = true;
        }

        function setEmployees() {
            let ed = document.getElementById("department");
            let e = ed.options[ed.selectedIndex].getAttribute("data-id");

            if (e == null) {
                // document.getElementById('divEmpLi').hidden = true;
                document.getElementById('divEmp').hidden = true;
                return;
            }
            // document.getElementById('divEmpLi').hidden = false;
            document.getElementById('divEmp').hidden = false;
            let emp = document.getElementById("employee");
            emp.textContent = '';
            let opt = document.createElement('option');
            opt.innerText = '-- Select Employee --';
            opt.value = 0;
            emp.appendChild(opt);



            let department = JSON.parse(e);
            department.employees.forEach(element => {
                //   console.log(element);
                let opt = document.createElement('option');
                opt.value = element.id;

                opt.innerText = element.first_name + ' ' + element.last_name + '(' + element.position.name + ')';
                emp.appendChild(opt);
            });
            //    console.log(emp)
        }

        //  *** for future use if multiple Department can be selected   ***
        //  function addEmployee()
        //     {
        //         let employeeOption = document.getElementById('employee');
        //         let employeeUl = document.getElementById('employee_list');
        //         let listDiv = document.getElementById('list');
        //         let empInput = document.createElement('input');
        //         let employee = employeeOption.value;

        //        if(employee != 0){

        //         if(employeeList.includes(JSON.parse(employee).id)){

        //         alert('Emplployee Already Selected');
        //             return ;
        //         }
        //        let emp = JSON.parse(employee);

        //         empInput.setAttribute('name','employees[]');
        //         empInput.setAttribute('id',emp.id);
        //         empInput.setAttribute('type','hidden');
        //         let list = document.createElement('li');
        //         list.classList.add("list-group-item", "m-2","d-flex","justify-content-between","align-items-start");
        //         list.innerHTML =`<div class="ms-2 me-auto">
    //     <div class="fw-bold">${emp.first_name+' '+emp.last_name}</div>
    //     ${emp.position.name},<br>${emp.department.name}
    // </div>

    //   <button type="button"   onClick='deleteEmployee(${emp.id},this)' class='btn btn '><i class=" ri-delete-bin-fill text text-danger"></i></button>`;
        //         employeeUl.appendChild(list);
        //          empInput.setAttribute('value',emp.id);
        //          employeeList.push(emp.id);
        //             listDiv.appendChild(empInput);

        //        }
        //     }
        //     function deleteEmployee(data,li)
        //     {
        //        let inp = document.getElementById(data);
        //        employeeList.splice(employeeList.indexOf(data),1);
        //        li.parentElement.remove();
        //        inp.remove();
        //     }
    </script>
@endsection
{{-- <ol class="list-group list-group-numbered">
    <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
            <div class="fw-bold">Subheading</div>
            Cras justo odio
        </div>
        <span class="badge bg-primary rounded-pill">14</span>
    </li> --}}
