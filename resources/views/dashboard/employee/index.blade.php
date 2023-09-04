@extends('layouts.app')
@section('css')
    <!-- Datatables css -->
    {{-- <link href="assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
        type="text/css" /> --}}
@endsection
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">

                                            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Employees</li>
                                        </ol>
                                    </div>
                    <h4 class="page-title">Employees</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Employee List</h4>
                        <p class="text-muted font-14">
                           This is the list for all employees data in our database
                        </p>


                        <div class="tab-content">
                            <div class="tab-pane show active" id="basic-datatable-preview">
                                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Employee ID</th>
                                            <th>Position</th>
                                            <th>Department</th>
                                            <th>Phone</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($employees as $employee)


                                        <tr>
                                            <td>{{$employee->first_name}} {{$employee->last_name}}</td>
                                            <td>{{$employee->uid}}</td>
                                            <td>{{$employee->position->name}}</td>
                                            <td>{{$employee->department->name}}</td>
                                            <td>{{$employee->phone}}</td>
                                            <td >
                                                <a href="{{route('employee.show',$employee->id)}}"> <i class="ri-profile-line"></i>View</a>
                                                <a href="{{route('employee.report',$employee->id)}}"> <i class="ri-profile-line"></i>Report</a>
                                                <form action="{{ route('employee.destroy',$employee->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"> Delete</button>
                                                </form>
                                            </td>
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
        @endsection
        @section('js')
            <!-- Datatables js -->
            {{-- <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
            <script src="assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
            <script src="assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

            <!-- Datatable Init js -->
            <script src="assets/js/pages/demo.datatable-init.js"></script>
            <script>

            </script> --}}
        @endsection
