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
                            <li class="breadcrumb-item active">Employee</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Employee</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Employee Details</h4>



                        <div class="tab-content">
                            <form action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row ms-5">
                                <div class="mb-3 col-5">
                                    <label for="simpleinput" class="form-label">First Name</label>
                                    <input type="text" id="first_name" 
                                    name="first_name" placeholder="Enter First Name" class="form-control">
                                     @error('first_name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-5">
                                    <label for="simpleinput" class="form-label">Last Name</label>
                                    <input type="text" id="last_name"
                                    name="last_name" placeholder="Enter Last Name" class="form-control">
                                     @error('last_name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-5">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control"
                                        placeholder="Email">
                                     @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-5">
                                    <label for="example-password" class="form-label">Phone</label>
                                    <input type="tel" id="phome" name="phone" placeholder="Enter Phone Number" class="form-control" >
                                     @error('phone')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-5">
                                    <label for="example-select" class="form-label ">Department</label>
                                    <select class="form-select select2" name="department_id" id="department_id">
                                      @foreach (App\Models\Department::all() as $department)
                                           <option value="{{$department->id}}">{{$department->name}}</option>
                                      @endforeach 
                                    </select>
                                     @error('department_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-5">
                                    <label for="example-select" class="form-label ">Position</label>
                                    <select class="form-select select2" name="position_id" id="position_id">
                                      @foreach (App\Models\Position::all() as $position)
                                           <option value="{{$position->id}}">{{$position->name}}</option>
                                      @endforeach 
                                    </select>
                                     @error('position_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-10">
                                    <label for="example-fileinput" class="form-label">Image</label>
                                    <input type="file" id="image" name="image" class="form-control">
                                     @error('image')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 ml-3 col-10 ">
                                    <label for="example-select" class="form-label ">Gender</label>
                                    <br>
                                    <div class="form-check-inline">
                                        <input type="radio"  id="customRadio1" value="1" name="gender" class="form-check-input">
                                        <label class="form-check-label" for="customRadio1"><i class=" ri-men-line"></i> Male</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input type="radio" id="customRadio2" value="2" name="gender" class="form-check-input">
                                        <label class="form-check-label" for="customRadio2"><i class="ri-women-line"></i> Female</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input type="radio" id="customRadio3" value="3" name="gender" class="form-check-input">
                                        <label class="form-check-label" for="customRadio2"><i class="ri-genderless-line"></i> Other</label>
                                    </div>
                                     @error('gender')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div> 
                                <div class="mb-3 ml-5 col-5">
                                        <label class="form-label">Birth Date</label>
                                        <input type="text" class="form-control date" id="birth_date" name="birth_date" data-toggle="date-picker" data-single-date-picker="true">
                                         @error('birth_date')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                <div class="mb-3 ml-5 col-5">
                                        <label class="form-label">Joining Date</label>
                                        <input type="text" class="form-control date" id="joining_date" name="joining_date" data-toggle="date-picker" data-single-date-picker="true">
                                         @error('joining_date')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>

                               

                                <div class="mb-3 col-10">
                                    <label for="example-textarea" class="form-label">Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="5"></textarea>
                                     @error('address')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                               
                                <div class="col-10 text-end">
                                       <button type="submit" class="btn btn-xs btn-success ">Save</button>
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
