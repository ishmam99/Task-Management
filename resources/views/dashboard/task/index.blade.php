@extends('layouts.app')
@section('css')
    <!-- Datatables css -->
    <link href="assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

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
                                                    <button class="input-group-text btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
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
                                    <h4 class="page-title">Task Management <button onclick="openForm()"  class="btn btn-success btn-sm ms-3">Add New</button></h4>
                                </div>
                                <!-- end page title -->
                                    <div class="card m-5 p-3" hidden id="form">
                                        <div class="card-title text-center">
                                            <h3>Create Task <i class="text-success  uil-clipboard-alt"></i></h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{route('task.store')}}" method="post">
                                            @csrf

                                            <div class="row">

                                            <div class="mb-3 px-5 col-10">
                                                <label for="simpleinput" class="form-label">Title</label>
                                                <input type="text" id="title" name="title" placeholder="Enter Meeting Title" class="form-control">
                                            </div>
                                            <div class="mb-3 col-5 px-5">
                                                <label class="form-label">Select Deadline </label>
                                                <input type="text" name="deadline" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                                            </div>
                                            <div class="mb-3 col-5 px-5">
                                                <label class="form-label">Select Alert Date </label>
                                                <input type="text" name="alert" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                                            </div>

                                             <div class="mb-3 col-5 px-5">
                                            <label for="example-select" class="form-label"> Select Priority Label</label>
                                            <select class="form-select" name="type" id="example-select">
                                                <option value="Low" class="text text-warning">Low</option>
                                                <option value="Medium" class="text text-success">Medium</option>
                                                <option value="High" class="text text-danger">High</option>

                                            </select>
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
                                            <div class="mb-3 px-5">
                                            <label for="example-textarea" class="form-label">Details</label>
                                            <textarea class="form-control" name="details" id="example-textarea" placeholder="Enter Meeting Details" rows="5"></textarea>
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
                                        <a class="text-dark" data-bs-toggle="collapse" href="#todayTasks" role="button" aria-expanded="false" aria-controls="todayTasks">
                                            <i class='uil uil-angle-down font-18'></i>Today <span class="text-muted">({{$today->count()}})</span>
                                        </a>
                                    </h5>

                                    <div class="collapse show" id="todayTasks">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <!-- task -->
                                                @foreach ($today as $meeting)


                                                <div class="row justify-content-sm-between">
                                                    <div class="col-sm-2 mb-2 mb-sm-0">
                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                           class="form-check-input"  @if ($meeting->status==1)
                                                                checked
                                                            @endif id="task1">
                                                            <label class="form-check-label" for="task1">
                                                                {{$meeting->title}}
                                                            </label>
                                                        </div> <!-- end checkbox -->
                                                    </div> <!-- end col -->
                                                    <div class="col-sm-7">
                                                        <div class="d-flex justify-content-between">
                                                          <div class="d-flex">
                                                            @foreach ($meeting->employees->take(3) as $item)
                                                                <span class="badge mx-1 badge-info-lighten rounded-pill">{{ $item->employee->name }}</span>
                                                            @endforeach
                                                              @if ($meeting->employees->count() > 3)
                                                                <span class="badge badge-secondary-lighten rounded-pill">+{{ $meeting->employees->count()-3 }}</span>
                                                              @endif
                                                          </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="d-flex justify-content-between">
                                                            {{-- <div id="tooltip-container">
                                                                <img src="assets/images/users/avatar-9.jpg" alt="image" class="avatar-xs rounded-circle me-1"
                                                                data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Assigned to Arya S" />
                                                            </div> --}}
                                                            <div>
                                                             <a href="{{ route('task.show',$meeting->id) }}">  <ul class="list-inline font-13 text-end">
                                                                    <li class="list-inline-item">
                                                                        <i class='uil uil-schedule font-16 me-1'></i> {{Carbon\Carbon::parse($meeting->deadline)->format('D M Y')}}
                                                                    </li>
                                                                    {{-- <li class="list-inline-item ms-1">
                                                                        <i class=' ri-time-line font-16 me-1'></i>{{Carbon\Carbon::parse($meeting->schedule)->format('H:m A')}}
                                                                    </li> --}}
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

                                                                </ul></a>
                                                            </div>
                                                        </div> <!-- end .d-flex-->
                                                    </div> <!-- end col -->
                                                </div>
                                                  @endforeach
                                                <!-- end task -->




                                            </div> <!-- end card-body-->
                                        </div> <!-- end card -->
                                    </div> <!-- end .collapse-->
                                </div> <!-- end .mt-2-->

                                <!-- upcoming tasks -->
                                <div class="mt-4">

                                    <h5 class="m-0 pb-2">
                                        <a class="text-dark" data-bs-toggle="collapse" href="#upcomingTasks" role="button" aria-expanded="false" aria-controls="upcomingTasks">
                                            <i class='uil uil-angle-down font-18'></i>Upcoming <span class="text-muted">({{$upcoming->count()}})</span>
                                        </a>
                                    </h5>

                                    <div class="collapse show" id="upcomingTasks">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <!-- task -->
                                               @foreach ($upcoming as $meeting)


                                                  <div class="row justify-content-sm-between">
                                                    <div class="col-sm-2 mb-2 mb-sm-0">
                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                           class="form-check-input"  @if ($meeting->status==1)
                                                                checked
                                                            @endif id="task1">
                                                            <label class="form-check-label" for="task1">
                                                                {{$meeting->title}}
                                                            </label>
                                                        </div> <!-- end checkbox -->
                                                    </div> <!-- end col -->
                                                    <div class="col-sm-7">
                                                        <div class="d-flex justify-content-between">
                                                          <div class="d-flex">
                                                            @foreach ($meeting->employees->take(3) as $item)
                                                                <span class="badge mx-1 badge-info-lighten rounded-pill">{{ $item->employee->name }}</span>
                                                            @endforeach
                                                              @if ($meeting->employees->count() > 3)
                                                                <span class="badge badge-secondary-lighten rounded-pill">+{{ $meeting->employees->count()-3 }}</span>
                                                              @endif
                                                          </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="d-flex justify-content-between">
                                                            {{-- <div id="tooltip-container">
                                                                <img src="assets/images/users/avatar-9.jpg" alt="image" class="avatar-xs rounded-circle me-1"
                                                                data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Assigned to Arya S" />
                                                            </div> --}}
                                                            <div>
                                                             <a href="{{ route('task.show',$meeting->id) }}">  <ul class="list-inline font-13 text-end">
                                                                    <li class="list-inline-item">
                                                                        <i class='uil uil-schedule font-16 me-1'></i> {{Carbon\Carbon::parse($meeting->deadline)->format('D M Y')}}
                                                                    </li>
                                                                    {{-- <li class="list-inline-item ms-1">
                                                                        <i class=' ri-time-line font-16 me-1'></i>{{Carbon\Carbon::parse($meeting->schedule)->format('H:m A')}}
                                                                    </li> --}}
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

                                                                </ul></a>
                                                            </div>
                                                        </div> <!-- end .d-flex-->
                                                    </div> <!-- end col -->
                                                </div>
                                                  @endforeach
                                                <!-- end task -->
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card -->
                                    </div> <!-- end collapse-->
                                </div>
                                <!-- end upcoming tasks -->

                                <!-- start other tasks -->
                                <div class="mt-4 mb-4">
                                    <h5 class="m-0 pb-2">
                                        <a class="text-dark" data-bs-toggle="collapse" href="#otherTasks" role="button" aria-expanded="false" aria-controls="otherTasks">
                                            <i class='uil uil-angle-down font-18'></i>Older <span class="text-muted">({{$older->count()}})</span>
                                        </a>
                                    </h5>

                                    <div class="collapse show" id="otherTasks">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <!-- task -->
                                                 @foreach ($older as $meeting)


                                                  <div class="row justify-content-sm-between">
                                                    <div class="col-sm-2 mb-2 mb-sm-0">
                                                        <div class="form-check">
                                                            <input type="checkbox"
                                                           class="form-check-input"  @if ($meeting->status==1)
                                                                checked
                                                            @endif id="task1">
                                                            <label class="form-check-label" for="task1">
                                                                {{$meeting->title}}
                                                            </label>
                                                        </div> <!-- end checkbox -->
                                                    </div> <!-- end col -->
                                                    <div class="col-sm-7">
                                                        <div class="d-flex justify-content-between">
                                                          <div class="d-flex">
                                                            @foreach ($meeting->employees->take(3) as $item)
                                                                <span class="badge mx-1 badge-info-lighten rounded-pill">{{ $item->employee->name }}</span>
                                                            @endforeach
                                                              @if ($meeting->employees->count() > 3)
                                                                <span class="badge badge-secondary-lighten rounded-pill">+{{ $meeting->employees->count()-3 }}</span>
                                                              @endif
                                                          </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="d-flex justify-content-between">
                                                            {{-- <div id="tooltip-container">
                                                                <img src="assets/images/users/avatar-9.jpg" alt="image" class="avatar-xs rounded-circle me-1"
                                                                data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Assigned to Arya S" />
                                                            </div> --}}
                                                            <div>
                                                             <a href="{{ route('task.show',$meeting->id) }}">  <ul class="list-inline font-13 text-end">
                                                                    <li class="list-inline-item">
                                                                        <i class='uil uil-schedule font-16 me-1'></i> {{Carbon\Carbon::parse($meeting->deadline)->format('D M Y')}}
                                                                    </li>
                                                                    {{-- <li class="list-inline-item ms-1">
                                                                        <i class=' ri-time-line font-16 me-1'></i>{{Carbon\Carbon::parse($meeting->schedule)->format('H:m A')}}
                                                                    </li> --}}
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

                                                                </ul></a>
                                                            </div>
                                                        </div> <!-- end .d-flex-->
                                                    </div> <!-- end col -->
                                                </div>
                                                  @endforeach
                                                <!-- end task -->
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card -->
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <!-- task details -->

                </div> <!-- content -->
                <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">

</div>

        @endsection
        @section('js')
            <!-- Datatables js -->
            <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
            <script src="assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
            <script src="assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

            <!-- Datatable Init js -->
            <script src="assets/js/pages/demo.datatable-init.js"></script>
          <script>
            function openForm(){
                let form = document.getElementById('form')
                form.hidden = false;
            }
            function closeForm(){
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
          </script>

        @endsection
