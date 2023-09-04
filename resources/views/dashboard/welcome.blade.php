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
                    {{-- <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Projects</li>
                                        </ol>
                                    </div> --}}
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card widget-inline">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-sm-6 col-lg-3">
                                <div class="card rounded-0 shadow-none m-0">
                                    <div class="card-body text-center">
                                        <i class=" ri-folder-5-fill text-muted font-24"></i>
                                        <h3><span>{{ App\Models\Document::count() }}</span></h3>
                                        <p class="text-muted font-15 mb-0">Total Documents</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-3">
                                <div class="card rounded-0 shadow-none m-0 border-start border-light">
                                    <div class="card-body text-center">
                                        <i class="ri-list-check-2 text-muted font-24"></i>
                                        <h3><span>{{ App\Models\Task::count() }}</span></h3>
                                        <p class="text-muted font-15 mb-0">Total Tasks</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-3">
                                <div class="card rounded-0 shadow-none m-0 border-start border-light">
                                    <div class="card-body text-center">
                                        <i class="ri-group-line text-muted font-24"></i>
                                        <h3><span>{{ App\Models\Employee::count() }}</span></h3>
                                        <p class="text-muted font-15 mb-0">Employees</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-3">
                                <div class="card rounded-0 shadow-none m-0 border-start border-light">
                                    <div class="card-body text-center">
                                        <i class="ri-line-chart-line text-muted font-24"></i>
                                        <h3><span>93%</span> <i class="mdi mdi-arrow-up text-success"></i></h3>
                                        <p class="text-muted font-15 mb-0">Productivity</p>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end row -->
                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col-->
        </div>
        <!-- end row-->



        <!-- end row-->

        <div class="container-fluid">

            <!-- start page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Employee List</h4>
                            <p class="text-muted font-14">
                                This is the list for all employees data in our database
                            </p>
                            <div class="col-lg-5">
                                <form action="{{ route('getEmployees') }}" method="POST">
                                    @csrf
                                    <label for="">Category</label>
                                    <select class="form-select mb-3" name="category" id="category">
                                        <option selected value="">-- Select --</option>



                                        {{-- <option value="position_id">Rank</option> --}}
                                        <option value="gender">Gender</option>
                                        <option value="position_id">Designation</option>
                                        <option value="department_id">Organization</option>
                                        <option value="joining_date">Join Date</option>
                                        <option value="birth_date">Birth Date</option>


                                        <option value="homeDistrict">Home District</option>
                                        <option value="orderDate">Order Date</option>
                                        <option value="cadre">Cadre</option>
                                        <option value="cadreDate">Cadre Date</option>
                                        <option value="batch">Batch</option>
                                        <option value="prlLprDate">PRL/LPR Date</option>
                                        <option value="confirmationGODate">Confirmation G.O. Date</option>
                                        <option value="religion">Religion</option>
                                        <option value="maritalStat">Marital Status</option>
                                        <option value="freedomFighter">Freedom Fighter</option>
                                    </select>
                                    <input type="hidden" name="selected_category" id="selected_category">
                                    <input type="hidden" name="selected" id="selected">
                                    <label for="">Item</label>
                                    <select class="form-select mb-3" name="item" id="item">
                                        <option selected value="">-- Select --</option>

                                    </select>
                                    <div class="mb-3 ml-3 col-5 ">
                                        <label for="example-select" class="form-label ">Type<span
                                                class="text-danger"></span></label>
                                        <br>
                                        <div class="form-check-inline">
                                            <input type="radio" id="customRadio1" value="1" name="type"
                                                class="form-check-input">
                                            <label class="form-check-label" for="customRadio1"> Group By<span
                                                    class="text-danger"></span></label>
                                        </div>
                                        <div class="form-check-inline">
                                            <input type="radio" id="customRadio2" value="2" name="type"
                                                class="form-check-input">
                                            <label class="form-check-label" for="customRadio2"> Single Table<span
                                                    class="text-danger"></span></label>
                                        </div>
                                        @error('gender')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="row ms-5">
                                        <div class="mb-3 col-10 text-end">
                                            <button type="submit" class="btn btn-xs btn-success ">Report
                                                Generate</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
                                                    <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                                                    <td>{{ $employee->uid }}</td>
                                                    <td>{{ $employee->position->name }}</td>
                                                    <td>{{ $employee->department->name }}</td>
                                                    <td>{{ $employee->phone }}</td>
                                                    <td>
                                                        <a href="{{ route('employee.show', $employee->id) }}"> <i
                                                                class="ri-profile-line"></i>View</a>
                                                        <a href="{{ route('employee.report', $employee->id) }}"> <i
                                                                class="ri-profile-line"></i>Report</a>
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

        <!-- end row-->


        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="header-title">Your Calendar</h4>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Weekly Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Monthly Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                    </div>
                </div>
            </div>

            <div class="card-body pt-0">
                <div class="col-10">

                    <h4 class="text-center"> <a href="{{ route('welcome', ['month' => 'prev', 'now' => $month]) }}"
                            class=" btn btn-primary rounded"><i class=" ri-arrow-left-fill"></i></a> {{ $month }}
                        <a href="{{ route('welcome', ['month' => 'next', 'now' => $month]) }}" class="btn btn-primary"><i
                                class="  ri-arrow-right-fill"></i></a></h4>
                </div>
                <div class="tab-content row">

                    @for ($i = 0; $i < $empty; $i++)
                        <div class="card p-1  m-2" style="width:12%">
                            <div class="card-header">
                                @if ($i == 0)
                                    <p class="text">Sun</p>
                                @elseif($i == 1)
                                    <p class="text">Mon</p>
                                @elseif($i == 2)
                                    <p class="text">Tue</p>
                                @elseif($i == 3)
                                    <p class="text">Wed</p>
                                @elseif($i == 4)
                                    <p class="text">Thu</p>
                                @elseif($i == 5)
                                    <p class="text text-danger">Fri</p>
                                @endif


                            </div>
                            <div class="card-body">



                            </div>
                        </div>
                    @endfor
                    @while ($start < $end)
                        @php
                            $hl = false;
                            $holidate = null;
                        @endphp
                        @foreach ($holidays as $holiday)
                            @php
                            if ($holiday->date == $start->format('Y-m-d')) {
                                    $hl = true;
                                    $holidate = $holiday;
                                }
                            @endphp
                        @endforeach

                        <div class="card p-1  m-2" style="width:12%">
                            <div class="card-header">
                                @if ($start->format('D') == 'Fri' || $start->format('D') == 'Sat' || $hl == true)
                                    <p class="text text-danger">{{ $start->format('D') }}</p>
                                @else
                                    <p class="text">{{ $start->format('D') }}</p>
                                @endif

                            </div>
                            <div class="card-body">
                                @if ($start->format('D') == 'Fri' || $start->format('D') == 'Sat' || $hl == true)
                                    <h1 class="text text-danger">{{ $start->format('d') }}</h1>
                                    @if ($hl == true)
                                        <p class="text text-primary">{{ $holidate->title }}</p>
                                        @if ($holidate->type == 1)
                                            <span class="badge bg-success">Public Holiday</span>
                                        @elseif($holidate->type == 2)
                                            <span class="badge bg-primary">Reserved Holiday</span>
                                        @elseif($holidate->type == 3)
                                            <span class="badge bg-info">Emergency Holiday</span>
                                        @elseif($holidate->type == 4)
                                            <span class="badge bg-danger">Natural Calamities</span>
                                        @endif
                                    @endif
                                @else
                                    <h1 class="text ">{{ $start->format('d') }}</h1>
                                @endif
                            </div>
                        </div>

                        @php
                            $start->addDay();
                            // $holidate = null;
                        @endphp
                    @endwhile
                </div>

            </div> <!-- end card body-->

            <!-- end row-->


        </div> <!-- container -->
    @endsection
    @section('js')
        <!-- Apex Charts js -->
        {{-- <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
        <!-- Dashboard App js -->
        <script src="{{ asset('assets/js/pages/demo.dashboard.js') }}"></script>
        <!-- Datatables js -->
        <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
        <script src="assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>


        <script src="assets/js/pages/demo.datatable-init.js"></script>

        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script> --}}
        <script>
            $(document).ready(function() {
                $('select[name="item"]').on('change', function() {
                    var dd = $("#item :selected").text();
                    $('#selected').val(dd);
                });
                $('select[name="category"]').on('change', function() {
                    var category = $(this).val();

                    if (category) {

                        var dd = $("#category :selected").text();
                        $('#selected_category').val(dd);
                        // if(category == 'gender')
                        // {
                        //   data1 = {
                        //     1=>'Male',
                        //             2=> 'Female',
                        //           3=>'Other'
                        //   };
                        //   //  var d=$('select[name="item"]').empty();
                        //   //   $.each(data1, function(key, value){
                        //   //     $('select[name="item"]').append('<option value="'+value+'">'+value+'</option>');
                        //   //   });
                        // }
                        console.log(category)
                        $.ajax({
                            url: "{{ url('items') }}/" + category,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                console.log(data);
                                var d = $('select[name="item"]').empty();
                                var d = $('select[name="item"]').append(
                                    '<option value="" selected>-- Select  --</option>');


                                $.each(data, function(key, value) {
                                    // console.log(value,key);
                                    $('select[name="item"]').append('<option value="' +
                                        key + '">' + value + '</option>');
                                });
                                // d.append('<option value="">'"Select"'</option>');
                            },
                        });
                    } else {
                        alert('danger');
                    }
                });
            });
        </script>
    @endsection
