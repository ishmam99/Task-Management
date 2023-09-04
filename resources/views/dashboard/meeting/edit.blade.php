@extends('layouts.app')
@section('css')
    <!-- Datatables css -->
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
                            <li class="breadcrumb-item "><a href="{{ route('meeting.index') }}">Meeting List</a></li>
                            <li class="breadcrumb-item active">Meeting Edit</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Meetings</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <h4 class="header-title">Edit Meeting</h4>
                                <p class="text-muted font-14">
                                    {{-- This is the list for all Meetings data in our database --}}
                                </p>
                            </div>

                            <form action="{{ route('meeting.update', $meeting->id) }}" enctype="multipart/form-data" method="post" class="ps-3 pe-3">
                                @method('PUT')
                                @csrf
                                <div class="row">

                            <div class="mb-3 px-5 col-10">
                                <label for="simpleinput" class="form-label">Title</label>
                                <input type="text" id="title" name="title" placeholder="Enter Meeting Title"
                                    class="form-control" value="{{ $meeting->title }}">
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 px-5 col-10">
                                <label for="example-fileinput" class="form-label">Attachment</label>
                                <img height="300px"  width="300px" src="{{ setImage($meeting->file) }}" alt="">
                                <input type="file" id="file" name="file" class="form-control">
                                @error('file')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="mb-3 col-5 px-5">
                                <label class="form-label">Select Date </label>
                                <input type="text" name="date" class="form-control date" id="birthdatepicker"  value="{{ $meeting->date }}"
                                    data-toggle="date-picker" data-single-date-picker="true">
                                @error('date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-5 px-5">
                                <label class="form-label">Select Time </label>
                                <div class="input-group" id="timepicker-input-group1">
                                    <input id="timepicker" type="time" name="time" class="form-control"
                                        data-provide="timepicker">
                                    <span class="input-group-text"><i class="ri-time-line"></i></span>

                                </div> @error('time')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}
                            <div class="mb-3 col-5 px-5">
                                <label for="example-select" class="form-label"> Select Priority Label</label>
                                <select class="form-select" name="type" id="example-select">
                                    <option value="Low" @if ($meeting->type == 'Low')
selected
                                    @endif   class="text text-warning">Low</option>
                                    <option value="Medium" @if ($meeting->type == 'Medium')
selected
                                    @endif    class="text text-success">Medium</option>
                                    <option value="High" @if ($meeting->type == 'High')
selected
                                    @endif    class="text text-danger">High</option>

                                </select>
                                @error('type')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-5 px-5">
                                <label for="example-select" class="form-label"> Select Department</label>
                                <select class="form-select select2" data-toggle="select2" required onchange="setEmployees()"
                                    name="department_id" id="department">
                                    {{-- <option value="">--Select Department--</option> --}}
                                    <option value="0"  @if ($meeting->department_id == null)
selected
                                    @endif>**All Department**</option>
                                    @foreach (App\Models\Department::with('employees.position', 'employees.department')->get() as $department)
                                        <option value="{{ $department->id }}" @if ($meeting->department_id == $department->id)
selected
                                    @endif    data-id="{{ $department }}">
                                            {{ $department->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            {{-- <div class="mb-3 col-8 px-5" hidden id="divEmp">
                                <label for="example-select" class="form-label"> Select Employees</label>
                                <select class="form-select select2-multiple" multiple="multiple" data-toggle="select2"
                                    name="employee_id[]" id="employee">
                                    <option value="">--Select Employee--</option>

                                </select>
                            </div> --}}

                            <div class="mb-3 px-5 col-10">
                                <label for="simpleinput" class="form-label">Location</label>
                                <input type="text" id="location" placeholder="Enter Meeting Location"
                                    name="location" class="form-control" value="{{ $meeting->location }}">
                                @error('location')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 px-5 col-10">
                                <label for="simpleinput" class="form-label">Meeting Minutes</label>
                                <input type="text" id="duration" placeholder="Enter Meeting Duration"
                                    name="duration" class="form-control"  value="{{ $meeting->duration }}">
                                @error('duration')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 px-5 col-10">
                                <label for="simpleinput" class="form-label">Meeting Agenda</label>
                                <input type="text" id="agenda"  value="{{ $meeting->agenda }}" placeholder="Enter Meeting Agenda" name="agenda"
                                    class="form-control">
                                @error('agenda')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 px-5 col-10">
                                <label for="simpleinput" class="form-label">Sarok No</label>
                                <input type="text" id="sarok"  value="{{ $meeting->sarok }}" placeholder="Enter Sarok No" name="sarok"
                                    class="form-control">
                                @error('agenda')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 px-5">
                                <label for="example-textarea" class="form-label">Description</label>
                                <textarea class="form-control"  value="{{ $meeting->details }}" name="details" id="example-textarea" placeholder="Enter Meeting Details"
                                    rows="5">{{ $meeting->details }}</textarea>
                                @error('details')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                       <div class="mb-3 text-center">
                                                <button class="btn rounded-pill btn-primary" type="submit">Save</button>
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
@endsection
