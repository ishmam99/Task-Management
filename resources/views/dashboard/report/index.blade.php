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
                            <li class="breadcrumb-item active">Reports</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Reports</h4>
                </div>
            </div>
        </div>
        <div class="tab-content">




            <h4 class="header-title" data-bs-toggle="collapse" href="#generalInfo" role="button"><i
                    class='uil uil-angle-down font-32' style="font-size: 26px;"></i>Category Wise report </h4>
            <div class="collapse" id="generalInfo">
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
                        <label for="example-select" class="form-label ">Type<span class="text-danger"></span></label>
                        <br>
                        <div class="form-check-inline">
                            <input type="radio" id="customRadio1" value="1" name="type" class="form-check-input">
                            <label class="form-check-label" for="customRadio1"> Group By<span
                                    class="text-danger"></span></label>
                        </div>
                        <div class="form-check-inline">
                            <input type="radio" id="customRadio2" value="2" name="type" class="form-check-input">
                            <label class="form-check-label" for="customRadio2"> Single Table<span
                                    class="text-danger"></span></label>
                        </div>

                    </div>
                    <div class="row ms-5">
                        <div class="mb-3 col-10 text-end">
                            <button type="submit" class="btn btn-xs btn-success ">Report
                                Generate</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="tab-content">




            <h4 class="header-title" data-bs-toggle="collapse" href="#posting" role="button"><i
                    class='uil uil-angle-down font-32' style="font-size: 26px;"></i>Posting report </h4>
            <div class="collapse" id="posting">


                    <div class="row ms-5">
                        <div class="mb-3 col-10 text-end">
                          <a href="{{ route('getEmployees.posting') }}">
                            <button type="submit" class="btn btn-xs btn-success ">Report
                                Generate</button></a>
                        </div>
                    </div>

            </div>
        </div>
        <div class="tab-content">




            <h4 class="header-title" data-bs-toggle="collapse" href="#education" role="button"><i
                    class='uil uil-angle-down font-32' style="font-size: 26px;"></i>Education report </h4>
            <div class="collapse" id="education">


                    <div class="row ms-5">
                        <div class="mb-3 col-10 text-end">
                          <a href="{{ route('getEmployees.education') }}">
                            <button type="submit" class="btn btn-xs btn-success ">Report
                                Generate</button></a>
                        </div>
                    </div>

            </div>
        </div>
        <div class="tab-content">




            <h4 class="header-title" data-bs-toggle="collapse" href="#training" role="button"><i
                    class='uil uil-angle-down font-32' style="font-size: 26px;"></i>Training report </h4>
            <div class="collapse" id="training">


                    <div class="row ms-5">
                        <div class="mb-3 col-10 text-end">
                          <a href="{{ route('getEmployees.training') }}">
                            <button type="submit" class="btn btn-xs btn-success ">Report
                                Generate</button></a>
                        </div>
                    </div>

            </div>
        </div>
        <div class="tab-content">




            <h4 class="header-title" data-bs-toggle="collapse" href="#salary" role="button"><i
                    class='uil uil-angle-down font-32' style="font-size: 26px;"></i>Salary report </h4>
            <div class="collapse" id="salary">

<div class=" card">
  <form action="{{  route('getEmployees.salary') }}" method="POST">
  @csrf

  <div class="card-header">Select Salary report type

  </div>
  <div class="card-body">
  <div class="mb-3 col-5">
        <label for="">Type</label>
                    <select class="form-select mb-3" name="type" id="item" required>
                        <option selected value="1">Salary Samary</option>
                        <option selected value="2">Allowance </option>
                        <option selected value="3">Deducation</option>

                    </select>
  </div>
                     <div class="mb-3 col-5">
                                        <label for="dob" class="form-label">Date<span class="text-danger">*</span></label>
                                        <input type="date" id="date" name="date" placeholder="Select Date " class="form-control">


                                    </div>
                        <div class="mb-3 col-4 text-start">

                            <button type="submit" class="btn btn-xs btn-primary ">Salary  Report</button>
                        </div>

</div></form>
  </div>
</div></div>



            </div>



    </div>
@endsection
@section('js')
    <!-- Apex Charts js -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <!-- Dashboard App js -->
    <script src="{{ asset('assets/js/pages/demo.dashboard.js') }}"></script>
    <!-- Datatables js -->
    <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

    <!-- Datatable Init js -->
    <script src="assets/js/pages/demo.datatable-init.js"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
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
