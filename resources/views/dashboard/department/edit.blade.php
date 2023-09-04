@extends('layouts.app')
@section('css')
    <!-- Datatables css -->
    <link href="assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
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
                            <li class="breadcrumb-item "><a href="{{ route('department.index') }}">Department List</a></li>
                            <li class="breadcrumb-item active">Department Edit</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Departments</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                           <div class="col-10">
                            <h4 class="header-title">Edit Department</h4>
                            <p class="text-muted font-14">
                                {{-- This is the list for all Departments data in our database --}}
                            </p>
                            </div>

                                        <form action="{{route('department.update',$department->id)}}" method="post" class="ps-3 pe-3">
                                          @method('PUT')
                                            @csrf
                                            <div class="row">


                                            <div class="mb-3 col-5">
                                                <label for="emailaddress1" class="form-label">Department Name</label>
                                                <input class="form-control" type="text" name="name" id="name" required="" value="{{ $department->name }}"
                                                    placeholder="Enter Department Name">
                                            </div>
                                           


                                            <div class="mb-3 text-center">
                                                <button class="btn rounded-pill btn-primary" type="submit">Save</button>
                                            </div>
                                              </div>
                                        </form>
                        </div>




                    </div>
                </div>
            </div>
        </div>
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
@endsection
