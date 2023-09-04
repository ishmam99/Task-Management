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
                            <li class="breadcrumb-item"><a href="{{ route('employee.index') }}">Employee List</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Employee Profile </h4>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ setImage($employee->image, 'user') }}" class="rounded-circle avatar-lg img-thumbnail"
                            alt="profile-image">

                        <h4 class="mb-0 mt-2">{{ $employee->first_name }} </h4>
                        <p class="text-muted font-14">{{ $employee->position->name }}</p>



                        <div class="text-start mt-3">
                            <h4 class="font-13 text-uppercase">Department :</h4>
                            <p class="text-muted font-13 mb-3">
                                {{ $employee->department->name }}
                            </p>
                            <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span
                                    class="ms-2">{{ $employee->first_name }} {{ $employee->last_name }}</span></p>

                            <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span
                                    class="ms-2">{{ $employee->phone }}</span></p>

                            <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span
                                    class="ms-2 ">{{ $employee->email }}</span></p>

                            <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span
                                    class="ms-2">{{ $employee->address }}</span></p>
                        </div>

                        <ul class="social-list list-inline mt-3 mb-0">
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i
                                        class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                                        class="mdi mdi-google"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                        class="mdi mdi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i
                                        class="mdi mdi-github"></i></a>
                            </li>
                        </ul>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->

                <!-- Messages-->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h4 class="header-title">Messages</h4>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                </div>
                            </div>
                        </div>

                        <div class="inbox-widget">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/images/users/avatar-2.jpg"
                                        class="rounded-circle" alt=""></div>
                                <p class="inbox-item-author">Tomaslau</p>
                                <p class="inbox-item-text">I've finished it! See you so...</p>
                                <p class="inbox-item-date">
                                    <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                </p>
                            </div>
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/images/users/avatar-3.jpg"
                                        class="rounded-circle" alt=""></div>
                                <p class="inbox-item-author">Stillnotdavid</p>
                                <p class="inbox-item-text">This theme is awesome!</p>
                                <p class="inbox-item-date">
                                    <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                </p>
                            </div>
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/images/users/avatar-4.jpg"
                                        class="rounded-circle" alt=""></div>
                                <p class="inbox-item-author">Kurafire</p>
                                <p class="inbox-item-text">Nice to meet you</p>
                                <p class="inbox-item-date">
                                    <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                </p>
                            </div>

                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/images/users/avatar-5.jpg"
                                        class="rounded-circle" alt=""></div>
                                <p class="inbox-item-author">Shahedk</p>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <p class="inbox-item-date">
                                    <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                </p>
                            </div>
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/images/users/avatar-6.jpg"
                                        class="rounded-circle" alt=""></div>
                                <p class="inbox-item-author">Adhamdannaway</p>
                                <p class="inbox-item-text">This theme is awesome!</p>
                                <p class="inbox-item-date">
                                    <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                </p>
                            </div>
                        </div> <!-- end inbox-widget -->
                    </div> <!-- end card-body-->
                </div> <!-- end card-->

            </div> <!-- end col-->

            <div class="col-xl-8 col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            <li class="nav-item">
                                <a href="#settings" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link rounded-0 active">
                                    Profile Settings
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#timeline" data-bs-toggle="tab" aria-expanded="true"
                                    class="nav-link rounded-0 ">
                                    Payroll
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#aboutme" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link rounded-0">
                                    Others
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="aboutme">


                                <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant me-1"></i>
                                    Others</h5>

                                <h5 class="mb-4 text-uppercase"><i class=" ri-currency-fill me-1"></i>Education
                                    Info <button type="button" onclick="showEduCreate()"
                                        class="btn btn-info  float-end">Create New <i class=" ri-add-fill"></i></button>
                                </h5>

                                <form action="{{ route('education.store') }}" method="post">
                                    @csrf


                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">Degree</label>
                                                <select name="degree" class="form-control">
                                                    <option value="">Select Degree</option>
                                                    <option value="SSC">SSC</option>
                                                    <option value="HSC">HSC</option>
                                                    <option value="Bachelors">Bachelors</option>
                                                    <option value="Masters">Masters</option>
                                                    <option value="PhD">PhD</option>
                                                </select>
                                                @error('basic')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="lastname" class="form-label">Year</label>
                                                <select name="year" class="form-control">
                                                    <option value="">Select Year</option>
                                                    <?php
                                                    for ($i = 2023; $i >= 1971; $i--) {
                                                        echo "<option value='{$i}'>{$i}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="lastname" class="form-label">Result</label>
                                                <select name="result" class="form-control">
                                                    <option value="">Select Result</option>
                                                    <option value="First Class">First Class</option>
                                                    <option value="Second Class">Second Class</option>
                                                    <option value="Third Class">Third Class</option>
                                                    <option value="Pass">Pass</option>
                                                    <option value="Not Applicable">Not Applicable</option>
                                                </select>
                                            </div>
                                        </div> <!-- end col -->

                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="lastname" class="form-label">Subject</label>
                                                <input type="text" name="subject" class="form-control"
                                                    placeholder="Subject Name">
                                                @error('others')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="lastname" class="form-label">CGPA\GPA</label>
                                                <input type="number" step="0.01" min="0" max="5"
                                                    name="cgpa" class="form-control" placeholder="CGPA">
                                                @error('others')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div> <!-- end col -->
                                        <input type="hidden" name="employee_id" value="{{ $employee->id }}"
                                            id="">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="lastname" class="form-label">Distinction</label>
                                                <input type="text" name="distinction" class="form-control"
                                                    placeholder="distinction">
                                                @error('others')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success mt-2"><i
                                                    class="mdi mdi-content-save"></i> Save</button>
                                        </div>
                                    </div> <!-- end row -->


                                </form>

                                <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant me-1"></i>

                                    <a class="text-dark" data-bs-toggle="collapse" href="#otherTasks" role="button"
                                        aria-expanded="false" aria-controls="otherTasks">
                                        <i class='uil uil-angle-down font-18'></i> Educational Info
                                    </a>
                                </h5>
                                <div class="collapse show" id="otherTasks">
                                    <div class="card mb-0">
                                        <div class="card-body">
                                            <div class="tab-pane table-responsive show active"
                                                id="basic-datatable-preview">
                                                <table id="basic-datatable10" class="table dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Degree</th>
                                                            <th>Subject</th>
                                                            <th>Result</th>
                                                            <th>CGPA/GPA</th>
                                                            <th>Distinction</th>
                                                            <th>Year</th>
                                                            <th>Action</th>

                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        @foreach ($employee->educations->sortByDESC('year') as $education)
                                                            <tr>
                                                                <td>{{ $education->degree }}
                                                                </td>

                                                                <td>{{ $education->subject }}</td>
                                                                <td>{{ $education->result }}</td>
                                                                <td>{{ $education->cgpa }}</td>
                                                                <td>{{ $education->distinction }}</td>
                                                                <td>{{ $education->year }}</td>
                                                                <td>
                                                                    <a href="{{ route('education.delete', $education->id) }}"
                                                                        class="m-2"> <button type="submit"
                                                                            class="btn btn-xs btn-danger ">Delete</button></a>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="mb-4 text-uppercase"><i class=" ri-currency-fill me-1"></i>Postings <button
                                        type="button" onclick="showEduCreate()" class="btn btn-info  float-end">Create
                                        New <i class=" ri-add-fill"></i></button></h5>

                                <form action="{{ route('posting.store') }}" method="post">
                                    @csrf


                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">Designation</label>
                                                <input type="text" name="designation" class="form-control"
                                                    placeholder="Enter Designation">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="lastname" class="form-label">Organization</label>
                                                <input type="text" name="organization" class="form-control"
                                                    placeholder="Enter Organization">
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="lastname" class="form-label">Location</label>
                                                <input type="text" name="location" class="form-control"
                                                    placeholder="Enter Location">
                                            </div>
                                        </div> <!-- end col -->
                                        <input type="hidden" name="employee_id" value="{{ $employee->id }}"
                                            id="">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="lastname" class="form-label">From Date</label>
                                                <input type="date" name="from_date" class="form-control">
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="lastname" class="form-label">To Date</label>
                                                <input type="date" name="to_date" class="form-control">
                                            </div>
                                        </div> <!-- end col -->
                                        <input type="hidden" name="employee_id" value="{{ $employee->id }}"
                                            id="">

                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success mt-2"><i
                                                    class="mdi mdi-content-save"></i> Save</button>
                                        </div>
                                    </div> <!-- end row -->


                                </form>
                                <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant me-1"></i>

                                    <a class="text-dark" data-bs-toggle="collapse" href="#posting" role="button"
                                        aria-expanded="false" aria-controls="posting">
                                        <i class='uil uil-angle-down font-18'></i> Posting History
                                    </a>
                                </h5>




                                <div class="collapse show" id="posting">
                                    <div class="tab-pane table-responsive show active" id="basic-datatable-preview">
                                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Designation</th>
                                                    <th>Organization</th>
                                                    <th>Location</th>
                                                    <th>From Date</th>
                                                    <th>To Date</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach ($employee->postings as $posting)
                                                    <tr>
                                                        <td>{{ $posting->designation }}</td>
                                                        <td>{{ $posting->organization }}</td>
                                                        <td>{{ $posting->location }}</td>
                                                        <td>{{ Carbon\Carbon::parse($posting->from_date)->format('M-Y') }}
                                                        </td>
                                                        <td>{{ Carbon\Carbon::parse($posting->to_date)->format('M-Y') }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('posting.delete', $posting->id) }}"
                                                                class="m-2"> <button type="submit"
                                                                    class="btn btn-xs btn-danger ">Delete</button></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                                <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant me-1"></i>

                                    <a class="text-dark" data-bs-toggle="collapse" href="#traininglo" role="button"
                                        aria-expanded="false" aria-controls="traininiglo">
                                        <i class='uil uil-angle-down font-18'></i> Training History -
                                        LOCAL TRAINING (MANDATORY)
                                    </a>
                                </h5>
                                <div class="collapse show" id="traininglo">
                                    <div class="tab-pane table-responsive show active" id="basic-datatable-preview">
                                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Instituition</th>
                                                    <th>Duration</th>
                                                    <th>From Date</th>
                                                    <th>To Date</th>

                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach ($employee->trainings->where('type', 1) as $training)
                                                    <tr>
                                                        <td>{{ $training->title }}</td>
                                                        <td>{{ $training->institution }}</td>
                                                        <td>{{ $training->duration }}</td>

                                                        <td>{{ Carbon\Carbon::parse($training->from_date)->format('M-Y') }}
                                                        </td>
                                                        <td>{{ Carbon\Carbon::parse($training->to_date)->format('M-Y') }}
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                                <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant me-1"></i>

                                    <a class="text-dark" data-bs-toggle="collapse" href="#training" role="button"
                                        aria-expanded="false" aria-controls="traininig">
                                        <i class='uil uil-angle-down font-18'></i> Training History -
                                        LOCAL TRAINING
                                    </a>
                                </h5>
                                <div class="collapse show" id="training">
                                    <div class="tab-pane table-responsive show active" id="basic-datatable-preview">
                                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Instituition</th>
                                                    <th>Duration</th>
                                                    <th>From Date</th>
                                                    <th>To Date</th>

                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach ($employee->trainings->where('type', 2) as $training)
                                                    <tr>
                                                        <td>{{ $training->title }}</td>
                                                        <td>{{ $training->institution }}</td>
                                                        <td>{{ $training->duration }}</td>

                                                        <td>{{ Carbon\Carbon::parse($training->from_date)->format('M-Y') }}
                                                        </td>
                                                        <td>{{ Carbon\Carbon::parse($training->to_date)->format('M-Y') }}
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                                <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant me-1"></i>

                                    <a class="text-dark" data-bs-toggle="collapse" href="#trainingfr" role="button"
                                        aria-expanded="false" aria-controls="traininigfr">
                                        <i class='uil uil-angle-down font-18'></i> Training History -
                                        FOREIGN TRAINING
                                    </a>
                                </h5>
                                <div class="collapse show" id="trainingfr">
                                    <div class="tab-pane table-responsive show active" id="basic-datatable-preview">
                                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Instituition</th>
                                                    <th>Duration</th>
                                                    <th>From Date</th>
                                                    <th>To Date</th>

                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach ($employee->trainings->where('type', 3) as $training)
                                                    <tr>
                                                        <td>{{ $training->title }}</td>
                                                        <td>{{ $training->institution }}</td>
                                                        <td>{{ $training->duration }}</td>

                                                        <td>{{ Carbon\Carbon::parse($training->from_date)->format('M-Y') }}
                                                        </td>
                                                        <td>{{ Carbon\Carbon::parse($training->to_date)->format('M-Y') }}
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div> <!-- end tab-pane -->
                            <!-- end about me section content -->

                            <div class="tab-pane " id="timeline">
                                @php
                                    $payroll = $employee->payrolls->where('status', 0)->first();

                                @endphp
                                <form action="{{ route('payroll.update', $payroll->id) }}" id="payrollUpdate"
                                    method="post">
                                    @csrf
                                    @method('put')
                                    <h5 class="mb-4 text-uppercase"><i class=" ri-currency-fill me-1"></i>Current Payroll
                                        Info <button onclick="showCreate()" type="button"
                                            class="btn btn-info  float-end">Create New <i
                                                class=" ri-add-fill"></i></button></h5>
                                    <p>Update Payroll Info</p>
                                    <!--<p class="text text-danger">***Note : Updating the current payroll system will be-->
                                        <!--effective form next month salary***</p>-->
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="text-success">Basic & Allowance</h5>
                                        </div>

                                        <div class="row col-12">

                                            @foreach ($payroll->only('basic', 'dearness', 'house_rent', 'medical', 'education', 'charge_allow', 'entertainment', 'mobile', 'telephone', 'washing', 'conveyance', 'tiffin', 'car_maintenance', 'group_insurance') as $key => $value)
                                                {{-- {{ dd($key,$value) }} --}}
                                                <div class="mb-3 col-6">
                                                    <label for="{{ $key }}"
                                                        class="form-label">{{ ucfirst(str_replace('_', ' ', $key)) }}</label>
                                                    <input class="form-control" type="number" id="{{ $key }}"
                                                        name="{{ $key }}" value="{{ $value }}">
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-12">
                                            <h5 class="text-danger" for="">Deductions</h5>
                                        </div>
                                        <div class="row col-12">

                                            @foreach ($payroll->only('pf_loan', 'provident_fund', 'house_building_loan', 'house_repairing_loan', 'car_loan', 'motor_cycle_loan', 'bi_cycle_loan', 'computer_loan', 'welfare_loan', 'income_tax', 'transport', 'group_insurance_deduction', 'benevolent_fund', 'municipal_tax', 'water_bill', 'gas_bill', 'revenue_stamp', 'officer_welfare_assoc', 'union_subscription', 'others') as $key => $value)
                                                {{-- {{ dd($key,$value) }} --}}
                                                <div class="mb-3 col-6">
                                                    <label for="{{ $key }}"
                                                        class="form-label">{{ ucfirst(str_replace('_', ' ', $key)) }}</label>
                                                    <input class="form-control" type="number" id="{{ $key }}"
                                                        name="{{ $key }}" value="{{ $value }}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3 text-end">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </form>
                                <form action="{{ route('payroll.store') }}" id="payrollForm" hidden method="post">
                                    @csrf
                                    <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                                    <h5 class="mb-4 text-uppercase"><i class=" ri-currency-fill me-1"></i>Add New Payroll
                                        Info <button onclick="hideCreate()" type="button"
                                            class="btn btn-primary  float-end">Update Existing <i
                                                class=" ri-edit-box-line"></i></button></h5>
                                    <p>Create new Payroll </p>
                                    <p class="text text-danger">***Note : After creating new Payroll , all prevous payrolls
                                        will be disabled and go to Payroll History ***</p>
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="text-success">Basic & Allowance</h5>
                                        </div>

                                        <div class="row col-12">

                                            @foreach ($employee->payrolls->first()->only('basic', 'dearness', 'house_rent', 'medical', 'education', 'charge_allow', 'entertainment', 'mobile', 'telephone', 'washing', 'conveyance', 'tiffin', 'car_maintenance', 'group_insurance') as $key => $value)
                                                {{-- {{ dd($key,$value) }} --}}
                                                <div class="mb-3 col-6">
                                                    <label for="{{ $key }}"
                                                        class="form-label">{{ ucfirst(str_replace('_', ' ', $key)) }}</label>
                                                    <input class="form-control" type="number" id="{{ $key }}"
                                                        name="{{ $key }}" value="0.0">
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-12">
                                            <h5 class="text-danger" for="">Deductions</h5>
                                        </div>

                                        <div class="row col-12">

                                            @foreach ($employee->payrolls->first()->only('pf_loan', 'provident_fund', 'house_building_loan', 'house_repairing_loan', 'car_loan', 'motor_cycle_loan', 'bi_cycle_loan', 'computer_loan', 'welfare_loan', 'income_tax', 'transport', 'group_insurance_deduction', 'benevolent_fund', 'municipal_tax', 'water_bill', 'gas_bill', 'revenue_stamp', 'officer_welfare_assoc', 'union_subscription', 'others') as $key => $value)
                                                {{-- {{ dd($key,$value) }} --}}
                                                <div class="mb-3 col-6">
                                                    <label for="{{ $key }}"
                                                        class="form-label">{{ ucfirst(str_replace('_', ' ', $key)) }}</label>
                                                    <input class="form-control" type="number" id="{{ $key }}"
                                                        name="{{ $key }}" value="0.0">
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="col-12 mb-3 text-end">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>

                                </form>

                            </div>


                            </form>

                            <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant me-1"></i>

                                <a class="text-dark" data-bs-toggle="collapse" href="#otherTasks" role="button"
                                    aria-expanded="false" aria-controls="otherTasks">
                                    <i class='uil uil-angle-down font-18'></i> Payroll History
                                </a>
                            </h5>
                            <div class="collapse show" id="otherTasks">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="tab-pane table-responsive show active" id="basic-datatable-preview">
                                            <table id="basic-datatable3" class="table dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Issued At</th>
                                                        <th>Basic</th>
                                                        <th>Total Allowence</th>
                                                        <th>Total Deduction</th>
                                                        <th>Gross Salary</th>
                                                        <th>Net Payable</th>
                                                        <th>Action</th>

                                                        <th>Dearness/Others</th>
                                                        <th>House Rent</th>
                                                        <th>Medical</th>
                                                        <th>Education</th>
                                                        <th>Charge Allow</th>
                                                        <th>Entertainment</th>
                                                        <th>Mobile</th>
                                                        <th>Telephone</th>
                                                        <th>Washing</th>
                                                        <th>Conbeyance</th>
                                                        <th>Tiffin</th>
                                                        <th>Car Maintenance</th>
                                                        <th>Group Insurance</th>

                                                        <th>Provident Fund</th>
                                                        <th>P F loan</th>
                                                        <th>House Building Loan</th>
                                                        <th>House Repairing Loan</th>
                                                        <th>Car Loan</th>
                                                        <th>Motor Cycle Loan</th>
                                                        <th>Bi Cycle Loan</th>
                                                        <th>Computer Loan</th>
                                                        <th>Welfare Loan</th>
                                                        <th>Income Tax</th>
                                                        <th>Transport</th>
                                                        <th>Group Insurance</th>
                                                        <th>Benevolent Fund</th>
                                                        <th>Municipal Tax</th>
                                                        <th>Water Bill</th>
                                                        <th>Gas Bill</th>
                                                        <th>Revenue Stamp</th>
                                                        <th>Officer Welfare Assoc</th>
                                                        <th>Union Subscription</th>
                                                        <th>Others</th>




                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    @foreach ($employee->payrolls->where('status', 1) as $payroll)
                                                        <tr>

                                                            <td>{{ $payroll->created_at }} </td>
                                                            <td>{{ $payroll->basic }}</td>
                                                            <td>{{ calculateAllowance($payroll) }}
                                                            </td>
                                                            <td>{{ calculateDeduction($payroll) }}
                                                            </td>
                                                            <td>{{ grossSalary($payroll) }}
                                                            </td>

                                                            <td>{{ netPayable($payroll) }}
                                                            </td>
                                                            <td>Make</td>
                                                            <td>{{ $payroll->dearness }}</td>
                                                            <td>{{ $payroll->house_rent }}</td>
                                                            <td>{{ $payroll->medical }}</td>
                                                            <td>{{ $payroll->education }}</td>
                                                            <td>{{ $payroll->charge_allow }}</td>
                                                            <td>{{ $payroll->entertainment }}</td>
                                                            <td>{{ $payroll->mobile }}</td>
                                                            <td>{{ $payroll->telephone }}</td>
                                                            <td>{{ $payroll->washing }}</td>
                                                            <td>{{ $payroll->conveyance }}</td>
                                                            <td>{{ $payroll->tiffin }}</td>
                                                            <td>{{ $payroll->car_maintenance }}</td>
                                                            <td>{{ $payroll->group_insurance }}</td>

                                                            <td>{{ $payroll->provident_fund }}</td>
                                                            <td>{{ $payroll->pf_loan }}</td>
                                                            <td>{{ $payroll->house_building_loan }}</td>
                                                            <td>{{ $payroll->house_repairing_loan }}</td>
                                                            <td>{{ $payroll->car_loan }}</td>
                                                            <td>{{ $payroll->motor_cycle_loan }}</td>
                                                            <td>{{ $payroll->bi_cycle_loan }}</td>
                                                            <td>{{ $payroll->computer_loan }}</td>
                                                            <td>{{ $payroll->welfare_loan }}</td>
                                                            <td>{{ $payroll->income_tax }}</td>
                                                            <td>{{ $payroll->transport }}</td>
                                                            <td>{{ $payroll->group_insurance_deduction }}</td>
                                                            <td>{{ $payroll->benevolent_fund }}</td>
                                                            <td>{{ $payroll->municipal_tax }}</td>
                                                            <td>{{ $payroll->water_bill }}</td>
                                                            <td>{{ $payroll->gas_bill }}</td>
                                                            <td>{{ $payroll->revenue_stamp }}</td>
                                                            <td>{{ $payroll->officer_welfare_assoc }}</td>
                                                            <td>{{ $payroll->union_subscription }}</td>
                                                            <td>{{ $payroll->others }}</td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant me-1"></i>

                                <a class="text-dark" data-bs-toggle="collapse" href="#salary" role="button"
                                    aria-expanded="false" aria-controls="salary">
                                    <i class='uil uil-angle-down font-18'></i> Salary History
                                </a>
                            </h5>
                           <div class="collapse show" id="otherTasks">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="tab-pane table-responsive show active" id="basic-datatable-preview">
                                    <table id="basic-datatable4" class="table dt-responsive nowrap w-100">
                                        <thead>
                                            <thead>
                                                <tr>

                                                    <th>Month</th>
                                                    <th>Status</th>
                                                    <th>Basic</th>
                                                    <th>Total Allowence</th>
                                                    <th>Total Deduction</th>
                                                    <th>Gross Salary</th>
                                                    <th>Net Payable</th>


                                                    <th>Dearness/Others</th>
                                                    <th>House Rent</th>
                                                    <th>Medical</th>
                                                    <th>Education</th>
                                                    <th>Charge Allow</th>
                                                    <th>Entertainment</th>
                                                    <th>Mobile</th>
                                                    <th>Telephone</th>
                                                    <th>Washing</th>
                                                    <th>Conbeyance</th>
                                                    <th>Tiffin</th>
                                                    <th>Car Maintenance</th>
                                                    <th>Group Insurance</th>

                                                    <th>Provident Fund</th>
                                                    <th>P F loan</th>
                                                    <th>House Building Loan</th>
                                                    <th>House Repairing Loan</th>
                                                    <th>Car Loan</th>
                                                    <th>Motor Cycle Loan</th>
                                                    <th>Bi Cycle Loan</th>
                                                    <th>Computer Loan</th>
                                                    <th>Welfare Loan</th>
                                                    <th>Income Tax</th>
                                                    <th>Transport</th>
                                                    <th>Group Insurance</th>
                                                    <th>Benevolent Fund</th>
                                                    <th>Municipal Tax</th>
                                                    <th>Water Bill</th>
                                                    <th>Gas Bill</th>
                                                    <th>Revenue Stamp</th>
                                                    <th>Officer Welfare Assoc</th>
                                                    <th>Union Subscription</th>
                                                    <th>Others</th>

                                                </tr>
                                            </thead>


                                        <tbody>
                                            @foreach ($employee->salaries as $payroll)
                                                <tr>

                                                    <td>{{ $payroll->issued_at }}</td>
                                                    <td>
                                                        @if ($payroll->status == 0)
                                                            <span
                                                                class="badge badge-pill bg-warning badge-secondary">Pending</span>
                                                        @else
                                                            <span
                                                                class="badge badge-pill bg-success badge-success">Paid</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $payroll->basic }}</td>
                                                    <td>{{ $payroll->total_allowance }}
                                                    </td>
                                                    <td>{{ $payroll->total_deduction }}
                                                    </td>
                                                    <td>{{ $payroll->gross_salary }}
                                                    </td>

                                                    <td>{{ $payroll->net_payable }}
                                                    </td>




                                                    <td>{{ $payroll->dearness }}</td>
                                                    <td>{{ $payroll->house_rent }}</td>
                                                    <td>{{ $payroll->medical }}</td>
                                                    <td>{{ $payroll->education }}</td>
                                                    <td>{{ $payroll->charge_allow }}</td>
                                                    <td>{{ $payroll->entertainment }}</td>
                                                    <td>{{ $payroll->mobile }}</td>
                                                    <td>{{ $payroll->telephone }}</td>
                                                    <td>{{ $payroll->washing }}</td>
                                                    <td>{{ $payroll->conveyance }}</td>
                                                    <td>{{ $payroll->tiffin }}</td>
                                                    <td>{{ $payroll->car_maintenance }}</td>
                                                    <td>{{ $payroll->group_insurance }}</td>

                                                    <td>{{ $payroll->provident_fund }}</td>
                                                    <td>{{ $payroll->pf_loan }}</td>
                                                    <td>{{ $payroll->house_building_loan }}</td>
                                                    <td>{{ $payroll->house_repairing_loan }}</td>
                                                    <td>{{ $payroll->car_loan }}</td>
                                                    <td>{{ $payroll->motor_cycle_loan }}</td>
                                                    <td>{{ $payroll->bi_cycle_loan }}</td>
                                                    <td>{{ $payroll->computer_loan }}</td>
                                                    <td>{{ $payroll->welfare_loan }}</td>
                                                    <td>{{ $payroll->income_tax }}</td>
                                                    <td>{{ $payroll->transport }}</td>
                                                    <td>{{ $payroll->group_insurance_deduction }}</td>
                                                    <td>{{ $payroll->benevolent_fund }}</td>
                                                    <td>{{ $payroll->municipal_tax }}</td>
                                                    <td>{{ $payroll->water_bill }}</td>
                                                    <td>{{ $payroll->gas_bill }}</td>
                                                    <td>{{ $payroll->revenue_stamp }}</td>
                                                    <td>{{ $payroll->officer_welfare_assoc }}</td>
                                                    <td>{{ $payroll->union_subscription }}</td>
                                                    <td>{{ $payroll->others }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>


                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- end timeline content-->

                        <div class="tab-pane show active" id="settings">
                            <form action="{{ route('employee.update', $employee->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Basic Info
                                </h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name"
                                                value="{{ $employee->first_name }}" placeholder="Enter first name">
                                            @error('first_name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lastname" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="last_name"
                                                value="{{ $employee->last_name }}" id="last_name"
                                                placeholder="Enter last name">
                                            @error('last_name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->



                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $employee->email }}" id="email"
                                                placeholder="Enter email">
                                            @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div> <!-- end row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="tel" class="form-control" name="phone"
                                                value="{{ $employee->phone }}" id="phone"
                                                placeholder="Enter Phone">
                                            @error('phone')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div> <!-- end row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="dob" class="form-label">Date of Birth<span
                                                    class="text-danger">*</span></label>
                                            <input type="date" id="birth_date" name="birth_date"
                                                placeholder="Enter Date of Birth" class="form-control"
                                                value="{{ $employee->birth_date }}">
                                            @error('birth_date')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 ml-3 col-5 ">
                                        <label for="example-select" class="form-label ">Gender<span
                                                class="text-danger">*</span></label>
                                        <br>
                                        <div class="form-check-inline">
                                            <input type="radio" id="customRadio1" value="Male" name="gender"
                                                class="form-check-input" @if ($employee->gender == 'Male') checked @endif>
                                            <label class="form-check-label" for="customRadio1"><i
                                                    class=" ri-men-line"></i> Male<span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="form-check-inline">
                                            <input type="radio" id="customRadio2" value="Female"
                                                @if ($employee->gender == 'Female') checked @endif name="gender"
                                                class="form-check-input">
                                            <label class="form-check-label" for="customRadio2"><i
                                                    class="ri-women-line"></i> Female<span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        @error('gender')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 col-10">
                                    <label for="example-fileinput" class="form-label">Image<span
                                            class="text-danger">*</span></label>
                                    <input type="file" id="image" name="image" class="form-control">
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-5"></div>
                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building me-1"></i>
                                    Company Info</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="cwebsite" class="form-label">Department</label>
                                            <div class="form-group">
                                                <select class="form-control select2" name="department_id"
                                                    data-toggle="select2">

                                                    @foreach (App\Models\Department::all() as $department)
                                                        <option value="{{ $department->id }}"
                                                            {{ $department->id == $employee->department_id ? 'selected' : null }}>
                                                            {{ $department->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('department_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="cwebsite" class="form-label">Designation</label>
                                            <div class="form-group">
                                                <select class="form-control select2" name="position_id"
                                                    data-toggle="select2" id="">
                                                    @foreach (App\Models\Position::all() as $position)
                                                        <option value="{{ $position->id }}"
                                                            {{ $position->id == $employee->position_id ? 'selected' : null }}>
                                                            {{ $position->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('position_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> <!-- end col -->
                                    <div class="mb-3 col-5">
                                        <label for="joining_date" class="form-label">Join Date<span
                                                class="text-danger">*</span></label>
                                        <input type="date" id="joining_date" name="joining_date"
                                            value="{{ $employee->joining_date }}" placeholder="Enter Join Date"
                                            class="form-control">
                                        @error('joining_date')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="current_grade" class="form-label">Current grade<span
                                                class="text-danger">*</span></label>
                                        <select id="current_grade" name="current_grade" class="form-control">
                                            <option value="" selected>Select Current Grade</option>
                                            @for ($i = 1; $i <= 20; $i++)
                                                <option @if ($employee->current_grade == $i) selected @endif
                                                    value="{{ $i }}">{{ $i }}</option>
                                            @endfor



                                        </select>
                                        @error('current_grade')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div> <!-- end row -->
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success mt-2"><i
                                            class="mdi mdi-content-save"></i> Save</button>
                                </div>
                            </form>
                            <form method="POST" action="{{ route('employee.info-update', $employee->info->id) }}">
                                @csrf
                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i> Info
                                </h5>
                                <div class="row ">



                                    <div class="mb-3 col-10">
                                        <label for="simpleinput" class="form-label">Name (Bangla)<span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="bangla_name" name="bangla_name"
                                            value="{{ $employee->info->bangla_name }}"
                                            placeholder="বাংলায় পূর্ণ নাম লিখুন" class="form-control">
                                        @error('bangla_name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="fatherName" class="form-label">Father Name<span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="fatherName" name="fatherName"
                                            value="{{ $employee->info->fatherName }}" placeholder="Enter Father Name"
                                            class="form-control"> @error('fatherName')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="motherName" class="form-label">Mother Name<span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="motherName" name="motherName"
                                            value="{{ $employee->info->motherName }}" placeholder="Enter Mother Name"
                                            class="form-control">
                                        @error('motherName')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-5">
                                        <label for="govt_id" class="form-label">Govt Id<span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="govt_id" name="govt_id"
                                            value="{{ $employee->info->govt_id }}" placeholder="Enter Govt Id"
                                            class="form-control">
                                        @error('govt_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="prlLprDate" class="form-label">PRL/LPR Date<span
                                                class="text-danger">*</span></label>
                                        <input type="date" id="prlLprDate" name="prlLprDate"
                                            value="{{ $employee->info->prlLprDate }}" placeholder="Enter PRL/LPR Date"
                                            class="form-control">
                                        @error('prlLprDate')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>




                                    <div class="mb-3 col-5">
                                        <label for="homeDistrict" class="form-label">Home District<span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="homeDistrict" name="homeDistrict"
                                            value="{{ $employee->info->homeDistrict }}"
                                            placeholder="Enter Home District" class="form-control">
                                        @error('homeDistrict')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>






                                    <div class="mb-3 col-5">
                                        <label for="orderDate" class="form-label">Order Date<span
                                                class="text-danger">*</span></label>
                                        <input type="date" id="orderDate" name="orderDate"
                                            value="{{ $employee->info->orderDate }}" placeholder="Enter Order Date"
                                            class="form-control">
                                        @error('orderDate')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>




                                    <div class="mb-3 col-5">
                                        <label for="starting_grade" class="form-label">Starting grade<span
                                                class="text-danger">*</span></label>
                                        <select id="starting_grade" name="starting_grade" class="form-control">
                                            <option value="" selected>Select Starting Grade</option>
                                            @for ($i = 1; $i <= 20; $i++)
                                                <option @if ($employee->info->starting_grade == $i) selected @endif
                                                    value="{{ $i }}">{{ $i }}</option>
                                            @endfor



                                        </select>
                                        @error('starting_grade')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>



                                    <div class="mb-3 col-5">
                                        <label for="current_grade_date" class="form-label">Current grade Date<span
                                                class="text-danger">*</span></label>
                                        <input type="date" id="current_grade_date" name="current_grade_date"
                                            value="{{ $employee->info->current_grade_date }}"
                                            placeholder="Enter Cadre Date" class="form-control">
                                        @error('current_grade_date')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="batch" class="form-label">Batch<span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="batch" name="batch"
                                            value="{{ $employee->info->batch }}" placeholder="Enter Batch"
                                            class="form-control">
                                        @error('batch')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="confirmationGODate" class="form-label">Confirmation G.O. Date<span
                                                class="text-danger">*</span></label>
                                        <input type="date" id="confirmationGODate" name="confirmationGODate"
                                            value="{{ $employee->info->confirmationGODate }}" class="form-control">
                                        @error('confirmationGODate')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <div class="mb-3 col-5">
                                        <label for="religion" class="form-label">Religion<span
                                                class="text-danger">*</span></label>
                                        <select id="religion" name="religion" class="form-control">
                                            <option value="">Select Religion</option>
                                            <option @if ($employee->info->religion == 'Islam') selected @endif value="Islam">
                                                Islam</option>
                                            <option @if ($employee->info->religion == 'Hinduism') selected @endif value="Hinduism">
                                                Hinduism</option>
                                            <option @if ($employee->info->religion == 'Christianity') selected @endif value="Christianity">
                                                Christianity</option>
                                            <option @if ($employee->info->religion == 'Buddhism') selected @endif value="Buddhism">
                                                Buddhism</option>
                                            <option @if ($employee->info->religion == 'Other') selected @endif value="Other">
                                                Other</option>
                                        </select>
                                        @error('religion')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-5">
                                        <label for="maritalStat" class="form-label">Marital Status<span
                                                class="text-danger">*</span></label>
                                        <select id="maritalStat" name="maritalStat" class="form-control">
                                            <option value="" selected>Select Marital Status</option>
                                            <option @if ($employee->info->maritalStat == 'Single') selected @endif value="Single">
                                                Single</option>
                                            <option @if ($employee->info->maritalStat == 'Married') selected @endif value="Married">
                                                Married</option>
                                            <option @if ($employee->info->maritalStat == 'Divorced') selected @endif value="Divorced">
                                                Divorced</option>
                                            <option @if ($employee->info->maritalStat == 'Widowed') selected @endif value="Widowed">
                                                Widowed</option>
                                        </select>
                                        @error('maritalStat')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="nid" class="form-label">National ID<span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="nid" name="nid"
                                            value="{{ $employee->info->nid }}" placeholder="Enter National ID"
                                            class="form-control">
                                        @error('nid')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="freedomFighter" class="form-label">Freedom Fighter<span
                                                class="text-danger">*</span></label>
                                        <select id="freedomFighter" name="freedomFighter" class="form-control">
                                            <option value="" selected>Select Freedom Fighter Status</option>
                                            <option @if ($employee->info->freedomFighter == 'Yes') selected @endif value="Yes">
                                                Yes</option>
                                            <option @if ($employee->info->freedomFighter == 'No') selected @endif value="No">
                                                No</option>
                                        </select>
                                        @error('freedomFighter')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <h4 class="header-title">FAMILY INFORMATION</h4>

                                    <div class="row ">
                                        <div class="mb-3 col-5">
                                            <label for="spouseName" class="form-label">Spouse Name<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="spouseName" name="spouseName"
                                                value="{{ $employee->info->spouseName }}"
                                                placeholder="Enter Spouse Name" class="form-control">
                                            @error('spouseName')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-5">
                                            <label for="spouseHomeDist" class="form-label">Home District<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="spouseHomeDist" name="spouseHomeDist"
                                                value="{{ $employee->info->spouseHomeDist }}"
                                                placeholder="Enter Spouse Home District" class="form-control">
                                            @error('spouseHomeDist')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-5">
                                            <label for="spouseOccupation" class="form-label">Occupation<span
                                                    class="text-danger">*</span></label>
                                            <select id="spouseOccupation" name="spouseOccupation" class="form-select">
                                                <option value="">Select Occupation</option>
                                                <option @if ($employee->info->spouseOccupation == 'Doctor') selected @endif value="Doctor">
                                                    Doctor</option>
                                                <option @if ($employee->info->spouseOccupation == 'Engineer') selected @endif
                                                    value="Engineer">Engineer</option>
                                                <option @if ($employee->info->spouseOccupation == 'Teacher') selected @endif
                                                    value="Teacher">Teacher</option>
                                                <option @if ($employee->info->spouseOccupation == 'Businessman') selected @endif
                                                    value="Businessman">Businessman</option>
                                                <option @if ($employee->info->spouseOccupation == 'Lawyer') selected @endif value="Lawyer">
                                                    Lawyer</option>
                                                <option @if ($employee->info->spouseOccupation == 'Banker') selected @endif value="Banker">
                                                    Banker</option>
                                                <option @if ($employee->info->spouseOccupation == 'Government Employee') selected @endif
                                                    value="Government Employee">Government Employee</option>
                                                <option @if ($employee->info->spouseOccupation == 'Private Employee') selected @endif
                                                    value="Private Employee">Private Employee</option>
                                                <option @if ($employee->info->spouseOccupation == 'Student') selected @endif
                                                    value="Student">Student</option>
                                                <option @if ($employee->info->spouseOccupation == 'Housewife') selected @endif
                                                    value="Housewife">Housewife</option>
                                                <option @if ($employee->info->spouseOccupation == 'Other') selected @endif value="Other">
                                                    Other</option>
                                            </select>
                                            @error('spouseOccupation')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-5">
                                            <label for="child_boy" class="form-label">Childrens (Male)<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" id="child_boy" name="child_boy"
                                                value="{{ $employee->info->child_boy }}"
                                                placeholder="Enter Children Number (Male)" class="form-control">
                                            @error('child_boy')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-5">
                                            <label for="child_girl" class="form-label">Childrens (Female)<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" id="child_girl" name="child_girl"
                                                value="{{ $employee->info->child_girl }}"
                                                placeholder="Enter Children Number (Female)" class="form-control">
                                            @error('child_girl')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success mt-2"><i
                                            class="mdi mdi-content-save"></i> Save</button>
                                </div>
                            </form>

                              <h5 class="mb-4 text-uppercase"><i class=" ri-currency-fill me-1"></i>Childrens INFO
                                </h5>

                                <form action="{{ route('children.store') }}" method="POST">
                                    @csrf


                                    <div class="row">
                                      <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="lastname" class="form-label">Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Child Name">
                                                @error('name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="lastname" class="form-label">Gender</label>
                                                <select name="gender" class="form-control">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>

                                                </select>
                                            </div>
                                        </div> <!-- end col -->

                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="lastname" class="form-label">Education</label>
                                                <input type="text" name="education" class="form-control"
                                                    placeholder="Education">
                                                @error('education')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div> <!-- end col -->
                                        <!-- end col -->
                                        <input type="hidden" name="employee_id" value="{{ $employee->id }}"
                                            id="">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="lastname" class="form-label">Date Of Birth</label>
                                                <input type="date" name="birth_date" class="form-control"
                                                    placeholder="birth_date">
                                                @error('others')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success mt-2"><i
                                                    class="mdi mdi-content-save"></i> Save</button>
                                        </div>
                                    </div> <!-- end row -->


                                </form>

                                <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant me-1"></i>

                                    <a class="text-dark" data-bs-toggle="collapse" href="#otherTasks" role="button"
                                        aria-expanded="false" aria-controls="otherTasks">
                                        <i class='uil uil-angle-down font-18'></i> Children INFO LIST
                                    </a>
                                </h5>
                                <div class="collapse show" id="otherTasks">
                                    <div class="card mb-0">
                                        <div class="card-body">
                                            <div class="tab-pane table-responsive show active"
                                                id="basic-datatable-preview">
                                                <table id="basic-datatable10" class="table dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Gender</th>
                                                            <th>Education</th>
                                                            <th>Date Of Birth</th>
                                                            <th>Action</th>

                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        @foreach ($employee->childrens as $child)
                                                            <tr>
                                                                <td>{{ $child->name }}
                                                                </td>

                                                                <td>{{ $child->gender }}</td>
                                                                <td>{{ $child->education }}</td>
                                                                <td>{{ Carbon\Carbon::parse($child->birth_date)->format('D M Y') }}</td>

                                                                <td>
                                                                    <a href="{{ route('children.delete', $child->id) }}"
                                                                        class="m-2"> <button type="submit"
                                                                            class="btn btn-xs btn-danger ">Delete</button></a>
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


                        <!-- end settings content-->

                        <!-- end tab-content -->
                    </div> <!-- end card body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div>
@endsection
@section('js')
    <!-- Datatables js -->



    <script>
        $("#basic-datatable10").DataTable({
            keys: !0,
            language: {
                paginate: {
                    previous: "<i class='mdi mdi-chevron-left'>",
                    next: "<i class='mdi mdi-chevron-right'>",
                },
            },
            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass(
                    "pagination-rounded"
                );
            },
        });
        $("#basic-datatable2").DataTable({
            keys: !0,
            language: {
                paginate: {
                    previous: "<i class='mdi mdi-chevron-left'>",
                    next: "<i class='mdi mdi-chevron-right'>",
                },
            },
            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass(
                    "pagination-rounded"
                );
            },
        });
        $("#basic-datatable3").DataTable({
            keys: !0,
            language: {
                paginate: {
                    previous: "<i class='mdi mdi-chevron-left'>",
                    next: "<i class='mdi mdi-chevron-right'>",
                },
            },
            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass(
                    "pagination-rounded"
                );
            },
        });
        $("#basic-datatable4").DataTable({
            keys: !0,
            language: {
                paginate: {
                    previous: "<i class='mdi mdi-chevron-left'>",
                    next: "<i class='mdi mdi-chevron-right'>",
                },
            },
            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass(
                    "pagination-rounded"
                );
            },
        });

        function showCreate() {
            document.getElementById('payrollForm').hidden = false;
            document.getElementById('payrollUpdate').hidden = true;
        }

        function hideCreate() {
            document.getElementById('payrollForm').hidden = true;
            document.getElementById('payrollUpdate').hidden = false;
        }
    </script>
@endsection
