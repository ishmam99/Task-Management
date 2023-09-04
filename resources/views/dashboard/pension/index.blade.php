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

                            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pension</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Pensions</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                           <div class="col-10">
                            <h4 class="header-title">Pensions List</h4>
                            <p class="text-muted font-14">
                                This is the list for all Pensions data in our database
                            </p>
                            </div>
                            <div class="col-2">
                            <button type="button" class="btn btn-info " data-bs-toggle="modal"
                                data-bs-target="#login-modal"><i class=" ri-add-line font-16">Add Pension</i> </button>
                            </div>
                        </div>
                        <div id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="text-center mt-2 mb-4">
                                            <a href="index.html" class="text-success">
                                                <span><img src="assets/images/logo-dark.png" alt=""
                                                        height="28"></span>
                                            </a>
                                        </div>

                                        <form action="{{route('pension.store')}}" method="post" class="ps-3 pe-3">
                                            @csrf
                                            <div class="row">
                                            <div class="mb-3 col-5">
                                                <label for="emailaddress1" class="form-label">Month</label>
                                                <input class="form-control" type="date" name="month" id="month" required=""
                                                    placeholder="Enter Pension Month">
                                            </div>
                                            <div class="mb-3 col-10">
                                                <label for="emailaddress1" class="form-label"> Name</label>
                                                <input class="form-control" type="text" name="name" id="name" required=""
                                                    placeholder="Enter  Name">
                                            </div>
                                            <div class="mb-3 col-10">
                                                <label for="emailaddress1" class="form-label">ID</label>
                                                <input class="form-control" type="text" name="id_no" id="id_no" required=""
                                                    placeholder="Enter Pension ID">
                                            </div>
                                            <div class="mb-3 col-5">
                                                <label for="emailaddress1" class="form-label">Basic</label>
                                                <input class="form-control" type="number" name="basic" id="basic" required=""
                                                    placeholder="Enter Pension Basic">
                                            </div>
                                            
                                            <div class="mb-3 col-5">
                                                <label for="emailaddress1" class="form-label">Treatment Cost</label>
                                                <input class="form-control" type="number" name="treatment_cost" id="treatment_cost" required=""
                                                    placeholder="Enter Treatment Cost">
                                            </div>
                                            <div class="mb-3 col-5">
                                                <label for="emailaddress1" class="form-label">Festival Allowance</label>
                                                <input class="form-control" type="number" name="festival_allowance" id="festival_allowance" required=""
                                                    placeholder="Enter Festival Allowance">
                                            </div>
                                            <div class="mb-3 col-5">
                                                <label for="emailaddress1" class="form-label">Boishaki</label>
                                                <input class="form-control" type="number" name="boishaki" id="boishaki" required=""
                                                    placeholder="Enter Boishaki">
                                            </div>
                                            <div class="mb-3 col-5">
                                                <label for="emailaddress1" class="form-label">Year Bonus</label>
                                                <input class="form-control" type="number" name="bonus" id="bonus" required=""
                                                    placeholder="Enter Bonus">
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


                        <div class="tab-content">
                            <div class="tab-pane show active" id="basic-datatable-preview">
                                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>ID</th>
                                            <th>Month</th>
                                            <th>Basic</th>
                                            <th>Treatment Cost</th>
                                            <th>Festival Allowance</th>
                                            <th>Boishaki</th>
                                            <th>Yearly Bonus</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($pensions as $pension)
                                            <tr>
                                                <td>{{ $pension->name }}</td>
                                                <td>{{ $pension->id_no }}</td>
                                                <td>{{ $pension->month }}</td>
                                                <td>{{ $pension->basic }}</td>
                                                <td>{{ $pension->treatment_cost}}</td>
                                                <td>{{ $pension->festival_allowance }}</td>
                                                <td>{{ $pension->boishaki }}</td>
                                                <td>{{ $pension->bonus }}</td>

                                                <td>
                                                    <a href="{{ route('pension.edit', $pension->id) }}"> <i
                                                            class=" ri-edit-box-line"></i></a>

                                                      <form action="{{ route('pension.destroy',$pension->id) }}" method="POST">
                                                          @csrf
                                                          @method('DELETE')
                                                          <button class="btn btn-danger">Delete</button>
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
    <script src="assets/js/pages/demo.datatable-init.js"></script> --}}
@endsection
