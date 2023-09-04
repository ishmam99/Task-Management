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
                            <li class="breadcrumb-item "><a href="{{ route('pension.index') }}">Pension List</a></li>
                            <li class="breadcrumb-item active">Pension Edit</li>
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
                            <h4 class="header-title">Edit Pension</h4>
                            <p class="text-muted font-14">
                                {{-- This is the list for all pensions data in our database --}}
                            </p>
                            </div>

                                        <form action="{{route('pension.update',$pension->id)}}" method="post" class="ps-3 pe-3">
                                          @method('PUT')
                                            @csrf
                                            <div class="row">

                                             <div class="mb-3 col-5">
                                                <label for="emailaddress1" class="form-label">Month ({{ $pension->month }})</label>
                                                <input class="form-control" type="date" name="month" id="month" required=""
                                                value="{{ Carbon\Carbon::parse($pension->month) }}"
                                                    placeholder="Enter Pension Month">
                                            </div>
                                            <div class="mb-3 col-5">
                                                <label for="emailaddress1" class="form-label"> Name</label>
                                                <input class="form-control" type="text" name="name" id="name" required="" value="{{ $pension->name }}"
                                                    placeholder="Enter pension Name">
                                            </div>

                                            <div class="mb-3 col-5">
                                                <label for="emailaddress1" class="form-label">ID</label>
                                                <input class="form-control" type="text" name="id_no" id="id_no" required=""  value="{{ $pension->id_no }}"
                                                    placeholder="Enter Pension ID">
                                            </div>
                                            <div class="mb-3 col-5">
                                                <label for="emailaddress1" class="form-label">Basic</label>
                                                <input class="form-control" type="numeric" name="basic" id="basic" required=""  value="{{ $pension->basic }}"
                                                    placeholder="Enter Pension Basic">
                                            </div>
                                            <div class="mb-3 col-5">
                                                <label for="emailaddress1" class="form-label">Treatment Cost</label>
                                                <input class="form-control" type="numeric" name="treatment_cost" id="treatment_cost" required=""  value="{{ $pension->treatment_cost }}"
                                                    placeholder="Enter Treatment Cost">
                                            </div>
                                            <div class="mb-3 col-5">
                                                <label for="emailaddress1" class="form-label">Festival Allowance</label>
                                                <input class="form-control" type="numeric"   value="{{ $pension->festival_allowance }}"name="festival_allowance" id="festival_allowance" required=""
                                                    placeholder="Enter Festival Allowance">
                                            </div>
                                            <div class="mb-3 col-5">
                                                <label for="emailaddress1" class="form-label">Boishaki</label>
                                                <input class="form-control" type="numeric" name="boishaki" id="boishaki" required=""  value="{{ $pension->boishaki }}"
                                                    placeholder="Enter Boishaki">
                                            </div>
                                            <div class="mb-3 col-5">
                                                <label for="emailaddress1" class="form-label">Year Bonus</label>
                                                <input class="form-control" type="numeric" name="bonus"  value="{{ $pension->bonus }}"id="bonus" required=""
                                                    placeholder="Enter Bonus">
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

@endsection
