@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">

                            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Recruitment</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Recruitment</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                           <div class="col-5">
                            <h4 class="header-title">Applicants List</h4>
                            <p class="text-muted font-14">
                                This is the list for all Departments data in our database
                            </p>
                            </div>
                            <div class="col-3 m-1">
                            
                               
                            <label for="department">Sort By Department</label>
                                
                              <form action="{{route('applicant.index')}}" method="get"><select name="department" class=" form-control select2" onchange="this.form.submit()" data-toggle="select2" id="">
                                                    <option value="">--Select Department -- </option>
                                                    <option value="">--All Department -- </option>
                                        @foreach (App\Models\Department::all() as $department)
                                            <option  value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                              </form>            
                            
                            </div>
                            <div class="col-3 m-1">
                            
                               
                            <label for="department">Sort By Position</label>
                                  <form action="{{route('applicant.index')}}" method="get">
                                     <select name="position" class="form-control select2" onchange="this.form.submit()" data-toggle="select2" id="">
                                        <option value="">--Select Position -- </option>
                                        @foreach (App\Models\Position::all() as $position)
                                            <option  value="{{$position->id}}">{{$position->name}}</option>
                                        @endforeach
                                    </select>
                                       </form>                 
                            
                            </div>
                        </div>
                        


                        <div class="tab-content">
                            <div class="tab-pane show active" id="basic-datatable-preview">
                                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>UID</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Department</th>
                                            <th>Applied For</th>
                                          <th>Action</th>

                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($applicants as $applicant)
                                            <tr>
                                                <td>{{ $applicant->name }}</td>
                                                <td>{{ $applicant->uid }}</td>
                                                <td>{{ $applicant->email }}</td>
                                                <td>{{ $applicant->phone }}</td>
                                                <td>{{ $applicant->department->name }}</td>
                                                <td>{{ $applicant->position->name }}</td>

                                                <td>
                                                    <a href="{{ route('applicant.show', $applicant->id) }}" class="btn btn-info"> <i
                                                            class="  ri-file-text-line"></i></a>
                                                    <a href="{{ route('applicant.edit', $applicant->id) }}" class="btn btn-primary"> <i
                                                            class=" ri-edit-box-line"></i></a>
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
