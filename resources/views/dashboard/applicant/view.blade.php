@extends('layouts.app')

@section('content')
    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="{{route('applicant.index')}}">Applicant List</a></li>
                                            <li class="breadcrumb-item active">Applicant Details</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Applicant Details</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <!-- Invoice Logo-->
                                        <div class="clearfix">
                                            <div class="float-start mb-3">
                                             <a href="{{setImage($applicant->image,'user')}}">  <img src="{{setImage($applicant->image,'user')}}" alt="dark logo" height="62"></a> 
                                            </div>
                                            <div class="float-end">
                                                <h4 class="m-0 d-print-none">Data</h4>
                                                <p class="font-13"><strong>Issue Date: </strong> &nbsp;&nbsp;&nbsp; {{Carbon\Carbon::parse($applicant->created_at)->format('d M Y')}}</p>
                                                    <p class="font-13"><strong>Hiring Status: </strong> @if($applicant->is_hired == 1) <span class="badge bg-success float-end">Hired</span>
                                                    @else
                                                    <span class="badge bg-warning float-end">Pending</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Invoice Detail-->
                                        <div class="row">
                                            
                                            <div class="col-sm-8">
                                                <div class="float-start row mt-3">
                                                    <div class="col-6">
                                                        <p>Applicant Name :</p> 
                                                    </div>
                                                    <div class="col-6">
                                                        <p>
                                                            <b>{{$applicant->name}} </b>
                                                        </p>
                                                    </div>
                                                    
                                                    <div class="col-6">
                                                        <p>Applicant UID :</p> 
                                                    </div>
                                                    <div class="col-6">
                                                        <p>
                                                            <b>{{$applicant->uid}} </b>
                                                        </p>
                                                    </div>
                                                    
                                                    <div class="col-6">
                                                        <p>Email :</p> 
                                                    </div>
                                                    <div class="col-6">
                                                        <p>
                                                            <b>{{$applicant->email}} </b>
                                                        </p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p>Phone :</p> 
                                                    </div>
                                                    <div class="col-6">
                                                        <p>
                                                            <b>{{$applicant->phone}} </b>
                                                        </p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p>Birth Date :</p> 
                                                    </div>
                                                    <div class="col-6">
                                                        <p>
                                                            <b>{{Carbon\Carbon::parse($applicant->birth_date)->format('d M Y')}} </b>
                                                        </p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p>Gender :</p> 
                                                    </div>
                                                    <div class="col-6">
                                                        <p>
                                                            @if ($applicant->gernder == 1)
                                                             <b>   Male <i class=" ri-men-line"></i></b>
                                                            @elseif($applicant->gender==2)
                                                              <b> Female <i class="ri-women-line"></i></b> 
                                                                @else
                                                               <b> Other <i class="ri-genderless-line"></i></b>
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-6">
                                                        Applied for Post :
                                                    </div>
                                                    <div class="col-6">
                                                        <p ><b>{{$applicant->position->name}}</b></p>
                                                    </div>
                                                    <div class="col-6">
                                                        Applied To Department :
                                                    </div>
                                                    <div class="col-6">
                                                        <p ><b>{{$applicant->department->name}}</b></p>
                                                    </div>
                                                    <div class="col-6">
                                                        Present Address :
                                                    </div>
                                                    <div class="col-6">
                                                        <p ><b>{{$applicant->present_address}}</b></p>
                                                    </div>
                                                    <div class="col-6">
                                                        Permanent Address :
                                                    </div>
                                                    <div class="col-6">
                                                        <p ><b>{{$applicant->permanent_address}}</b></p>
                                                    </div>
                                                    
                                                </div>
            
                                            </div><!-- end col -->
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <p>Resume</p>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="ratio ratio-21x9">
                                                                <iframe src="{{setImage($applicant->resume)}}"></iframe>
                                                            </div>
                                                        <a href="{{setImage($applicant->resume)}}"><button class="p-2 m-2 btn btn-primary">View <i class="ri-download"></i></button></a>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <p>Certificates</p>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="ratio ratio-21x9">
                                                                <iframe src="{{setImage($applicant->certificates)}}"></iframe>
                                                            </div>
                                                        <a href="{{setImage($applicant->certificates)}}"><button class="p-2 m-2 btn btn-primary">View <i class="ri-download"></i></button></a>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <!-- end row -->
            
                                        
                                       

                                        
                                        <!-- end row-->
    
                                       
                                        <!-- end buttons -->

                                    </div> <!-- end card-body-->
                                </div> <!-- end card -->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                        
                    </div> 
            
@endsection
