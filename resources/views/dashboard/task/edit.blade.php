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



                                <!-- end page title -->
                                    <div class="card m-5 p-3"  id="form">
                                        <div class="card-title text-center">
                                            <h3>Update Task <i class="text-success  uil-clipboard-alt"></i></h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{route('task.update',$task->id)}}" method="post">
                                              @method('put')
                                            @csrf

                                            <div class="row">

                                            <div class="mb-3 px-5 col-10">
                                                <label for="simpleinput" class="form-label">Title</label>
                                                <input type="text" id="title" name="title" value="{{ $task->title }}" placeholder="Enter Meeting Title" class="form-control">
                                            </div>
                                            <div class="mb-3 col-5 px-5">
                                                <label class="form-label">Select Deadline </label>
                                                <input class="form-control" id="example-date" type="date"  name="deadline" value="{{ Carbon\Carbon::parse($task->deadline)->format('Y-m-d')}}">

                                            </div>
                                            <div class="mb-3 col-5 px-5">
                                                <label class="form-label">Select Alert Date </label>
                                               <input class="form-control" id="example-date" type="date"  name="alert" value="{{ Carbon\Carbon::parse($task->alert)->format('Y-m-d')}}">
                                            </div>

                                             <div class="mb-3 col-5 px-5">
                                            <label for="example-select" class="form-label"> Select Priority Label</label>
                                            <select class="form-select" name="type" id="example-select">
                                                <option value="Low" @if ($task->type =="Low")
                                                          selected
                                                @endif class="text text-warning">Low</option>
                                                <option value="Medium" class="text text-success"  @if ($task->type =="Medium")
                                                          selected
                                                @endif >Medium</option>
                                                <option value="High" class="text text-danger"  @if ($task->type =="High")
                                                          selected
                                                @endif >High</option>

                                            </select>
                                        </div>
                                          {{-- <div class="mb-3 col-5 px-5">
                                <label for="example-select" class="form-label"> Select Department</label>
                                <select class="form-select select2" data-toggle="select2" required onchange="setEmployees()"
                                    name="department_id" id="department">

                                    <option value="0">**All Department**</option>
                                    @foreach (App\Models\Department::with('employees.position', 'employees.department')->get() as $department)
                                        <option value="{{ $department->id }}" data-id="{{ $department }}">
                                            {{ $department->name }}</option>
                                    @endforeach

                                </select>
                            </div> --}}
                            <div class="mb-3 col-8 px-5"  id="divEmp">
                                <label for="example-select" class="form-label"> Select Employees</label>
                                <select class="form-select select2-multiple" multiple="multiple" data-toggle="select2"
                                    name="employee_id[]" id="employee" value="{{ $task->employees->pluck('employee_id') }}">
                                    @foreach (App\Models\Employee::all() as $employee)
                                    <option value="{{ $employee->id }}" @if ($task->employees->where('employee_id',$employee->id)->first())
                                      selected
                                    @endif>{{ $employee->name }}</option>
                                        @endforeach
                                    {{--
                                            for future use if multiple Department can be selected
                                            onchange="addEmployee()" --}}
                                </select>
                            </div>
                                            <div class="mb-3 px-5">
                                            <label for="example-textarea" class="form-label">Details</label>
                                            <textarea class="form-control" name="details" value="" id="example-textarea" placeholder="Enter Meeting Details" rows="5">{{ $task->details }}</textarea>
                                        </div>

                                        </div>
                                        <div class="modal-footer">
                                                <button type="submit" class="btn btn-success m-3 ">Save</button>

                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                <!-- tasks panel -->

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
