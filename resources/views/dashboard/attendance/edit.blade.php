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
                            <li class="breadcrumb-item"><a href="{{ route('attendance.index') }}">Attendance List</a></li>
                            <li class="breadcrumb-item active">Attendance Update</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Attendance Update</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                            

                      
                        
                        
                                        <div class="text-center mt-2 mb-4">
                                            <a href="index.html" class="text-success">
                                                <span><img src="assets/images/logo-dark.png" alt=""
                                                        height="28"></span>
                                            </a>
                                        </div>

                                        <form action="{{ route('attendance.update',$attendance->id) }}" method="post" class="ps-3 pe-3">
                                            @method('put')
                                            @csrf
                                            <div class="row">
                                            <div class="mb-3 col-9">
                                                <label for="emailaddress1" class="form-label">Employee </label>
                                                <input disabled class="form-control" value="{{$attendance->employee->first_name}} {{$attendance->employee->last_name}} ({{$attendance->employee->uid}})">
                                                
                                            </div>
                                            <div class="mb-3 col-4">
                                                <label for="emailaddress1" class="form-label">Department </label>
                                                <input disabled class="form-control" value="{{$attendance->employee->department->name}} ">
                                                
                                            </div>
                                            <div class="mb-3 col-4">
                                                <label for="emailaddress1" class="form-label">Position </label>
                                                <input disabled class="form-control" value="{{$attendance->employee->position->name}} ">
                                                
                                            </div>
                                            <div class="mb-3 col-4">
                                                <label for="emailaddress1" class="form-label">Date </label>
                                                <input disabled class="form-control" value="{{Carbon\Carbon::parse($attendance->date)->format('d-m-Y')}} ">
                                                
                                            </div>
                                            <div class="mb-3 ml-3 col-8 ">
                                    <label for="example-select" class="form-label ">Employee Status</label>
                                    <br>
                                    <div class="form-check-inline">
                                        <input type="radio"  id="customRadio1" {{$attendance->in_leave==0?'checked':''}} onchange="showForm()"  value="0" name="in_leave" class="form-check-input">
                                        <label class="form-check-label text-success" for="customRadio1"> Present</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input type="radio" id="customRadio2" onchange="hideForm()" value="1" name="in_leave" {{$attendance->in_leave==1?'checked':''}} class="form-check-input">
                                        <label class="form-check-label text-danger" for="customRadio2"> Absent</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input type="radio" id="customRadio3" {{$attendance->in_leave==2?'checked':''}} onchange="hideForm()"  value="2" name="in_leave" class="form-check-input">
                                        <label class="form-check-label text-warning" for="customRadio2"> In leave</label>
                                    </div>
                                     @error('in_leave')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div> 
                                <div id="hideFormInput" {{$attendance->in_leave!=0?'hidden':''}} class="col-8 row">
                                            <div class="mb-3 col-5">
                                                <label for="emailaddress1" class="form-label">In Time <span class="text-danger">*</span></label>
                                               <input type="time" name="in_time" value="{{Carbon\Carbon::parse($attendance->in_time)->format('h:m')}}"  class="form-control">
                                               <input type="hidden" name="date"  value="{{$attendance->date}}">
                                            </div>
                                            <div class="mb-3 col-5">
                                                <label for="emailaddress1" class="form-label">Out Time</label>
                                               <input type="time" name="out_time" value="{{$attendance->out_time?Carbon\Carbon::parse($attendance->out_time)->format('h:m'):''}}" id="out_time" class="form-control">
                                            </div>
                                            <div class="mb-3 col-8">
                                                <label for="emailaddress1" class="form-label">Shift <span class="text-danger">*</span></label>
                                               <select name="shift" class="form-control" >
                                               
                                                    <option value="morning"{{$attendance->shift=='morning'?'selected':''}}>Morning</option>
                                                    <option value="evening" {{$attendance->shift=='evening'?'selected':''}}>Evening</option>
                                               </select>
                                            </div>

                                            </div>



                                            <div class="mb-3 text-center">
                                                <button class="btn rounded-pill btn-primary" type="submit">Update</button>
                                            </div>
                                      </div>
                                        </form>




                    
                  
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
