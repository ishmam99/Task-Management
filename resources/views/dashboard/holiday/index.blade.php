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
                            <li class="breadcrumb-item active">Holiday</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Holiday</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                           <div class="col-10">
                            <h4 class="header-title">Holidays List</h4>
                             <h4 class="text-center"> <a href="{{route('holiday.index',['month'=>'prev','now'=>$month])}}" class=" btn btn-primary rounded"><i class=" ri-arrow-left-fill"></i></a> {{$month}} <a href="{{route('holiday.index',['month'=>'next','now'=>$month])}}" class="btn btn-primary"><i class="  ri-arrow-right-fill"></i></a></h4>
                            </div>
                            <div class="col-2">
                            <button type="button" class="btn btn-info " data-bs-toggle="modal"
                                data-bs-target="#login-modal"><i class=" ri-add-line font-16">Add Holiday</i> </button>
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

                                        <form action="{{route('holiday.store')}}" method="post" class="ps-3 pe-3">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="emailaddress1" class="form-label">Title</label>
                                                <input class="form-control" type="text" name="title" id="title" required=""
                                                    placeholder="Enter Title">
                                            </div>
                                           
                                            <div class="mb-3">
                                                <label for="emailaddress1" class="form-label">Type</label>
                                                <select name="type" class="form-control" id="type">
                                                    <option value="1">Public Holiday</option>
                                                    <option value="2">Reserved Holiday</option>
                                                    <option value="3">Emergency Holiday</option>
                                                    <option value="4">Natural Calamities</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailaddress1" class="form-label">Date</label>
                                                <input type="date" name="date" class="form-control">
                                            </div>

                                            

                                           

                                            <div class="mb-3 text-center">
                                                <button class="btn rounded-pill btn-primary" type="submit">Save</button>
                                            </div>

                                        </form>

                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->


                        <div class="tab-content row">
                           
                         @for($i=0;$i<$empty;$i++)
                            <div class="card p-1  m-2" style="width:12%">
                                <div class="card-header">
                                    @if ($i==0)
                                        <p class="text">Sun</p>
                                    @elseif($i==1)
                                         <p class="text">Mon</p>
                                    @elseif($i==2)
                                         <p class="text">Tue</p>
                                    @elseif($i==3)
                                         <p class="text">Wed</p>
                                    @elseif($i==4)
                                         <p class="text">Thu</p>
                                    @elseif($i==5)
                                         <p class="text text-danger">Fri</p>
                                    @endif
                                    
                                   
                                </div>
                                <div class="card-body">
                                    
                                  
                                     
                            </div>
                            </div>
                            @endfor
                           @while ( $start <$end )
                           @php
                               $hl = false;
                               $holidate = null;
                           @endphp
                          @foreach ($holidays as $holiday)
                              @php if($holiday->date == $start->format('Y-m-d'))
                                       {
                                        $hl =true;
                                        $holidate = $holiday;
                                       } 
                                @endphp
                           @endforeach
                         
                           <div class="card p-1  m-2" style="width:12%">
                                <div class="card-header">
                                    @if ($start->format('D') == 'Fri' || $start->format('D') == 'Sat' || $hl==true)
                                        <p class="text text-danger">{{$start->format('D')}}</p>
                                    @else
                                        <p class="text">{{$start->format('D')}}</p>
                                    @endif
                                    
                                </div>
                                <div class="card-body">
                                     @if ($start->format('D') == 'Fri' || $start->format('D') == 'Sat' || $hl==true)
                                   
                                    <h1 class="text text-danger">{{$start->format('d')}}</h1>
                                        @if($hl==true) <p class="text text-primary">{{$holidate->title}}</p>
                                          @if($holidate->type ==1)  <span class="badge bg-success">Public Holiday</span>
                                          @elseif($holidate->type == 2)  <span class="badge bg-primary">Reserved Holiday</span>
                                          @elseif($holidate->type == 3)  <span class="badge bg-info">Emergency Holiday</span>
                                          @elseif($holidate->type == 4)  <span class="badge bg-danger">Natural Calamities</span>
                                        @endif
                                        @endif
                                 @else
                                       <h1 class="text ">{{$start->format('d')}}</h1>
                                    @endif
                            </div>
                            </div>
                            
                            @php
                                $start->addDay(); 
                                // $holidate = null;
                            @endphp
                           @endwhile
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
    <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

    <!-- Datatable Init js -->
    <script src="assets/js/pages/demo.datatable-init.js"></script>
@endsection
