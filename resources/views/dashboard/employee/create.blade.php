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


                    <div class="tab-content">
                        <form action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
                            @csrf



                            <h4 class="header-title" data-bs-toggle="collapse" href="#generalInfo" role="button"><i class='uil uil-angle-down font-32' style="font-size: 26px;"></i>General Information</h4>

                            <div class="collapse" id="generalInfo">
                                <div class="row ms-5">
                                    <div class="mb-3 col-10">
                                        <label for="example-fileinput" class="form-label">Image </label>
                                        <input type="file" id="image" name="image" class="form-control">
                                        @error('image')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="govt_id" class="form-label">Govt Id </label>
                                        <input type="text" id="govt_id" name="govt_id" placeholder="Enter Govt Id" class="form-control">
                                         @error('govt_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5"></div>

                                    <div class="mb-3 col-5">
                                        <label for="simpleinput" class="form-label">First Name </label>
                                        <input type="text" id="first_name" name="first_name" placeholder="Enter First Name" class="form-control">
                                        @error('first_name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="simpleinput" class="form-label">Last Name </label>
                                        <input type="text" id="last_name" name="last_name" placeholder="Enter Last Name" class="form-control">
                                        @error('last_name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-10">
                                        <label for="simpleinput" class="form-label">Name (Bangla) </label>
                                        <input type="text" id="bangla_name" name="bangla_name" placeholder="বাংলায় পূর্ণ নাম লিখুন" class="form-control">
                                         @error('bangla_name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="fatherName" class="form-label">Father Name </label>
                                        <input type="text" id="fatherName" name="fatherName" placeholder="Enter Father Name" class="form-control"> @error('fatherName')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror

                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="motherName" class="form-label">Mother Name </label>
                                        <input type="text" id="motherName" name="motherName" placeholder="Enter Mother Name" class="form-control">
                                         @error('motherName')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="dob" class="form-label">Date of Birth </label>
                                        <input type="date" id="birth_date" name="birth_date" placeholder="Enter Date of Birth" class="form-control">
                                         @error('birth_date')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-5">
                                        <label for="prlLprDate" class="form-label">PRL/LPR Date </label>
                                        <input type="date" id="prlLprDate" name="prlLprDate" placeholder="Enter PRL/LPR Date" class="form-control">
                                        @error('prlLprDate')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                            </div>


                                    {{-- <div class="mb-3 col-5">
                                        <label for="example-select" class="form-label ">Rank </label>
                                        <select class="form-select select2" name="position_id" id="position_id">
                                            @foreach (App\Models\Position::all() as $position)
                                            <option value="{{$position->id}}">{{$position->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('position_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div> --}}

                                    <div class="mb-3 col-5">
                                        <label for="homeDistrict" class="form-label">Home District </label>
                                        <input type="text" id="homeDistrict" name="homeDistrict" placeholder="Enter Home District" class="form-control">
                                          @error('homeDistrict')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-5">
                                        <label for="example-select" class="form-label ">Designation </label>
                                        <select class="form-select select2" name="position_id" id="position_id">
                                            @foreach (App\Models\Position::all() as $position)
                                            <option value="{{$position->id}}">{{$position->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('position_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>


                                    <div class="mb-3 col-5">
                                        <label for="example-select" class="form-label ">Organization </label>
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
                                        <label for="orderDate" class="form-label">Order Date </label>
                                        <input type="date" id="orderDate" name="orderDate" placeholder="Enter Order Date" class="form-control">
                                          @error('orderDate')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-5">
                                        <label for="joining_date" class="form-label">Join Date </label>
                                        <input type="date" id="joining_date" name="joining_date" placeholder="Enter Join Date" class="form-control">
                                         @error('joining_date')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-5">
                                        <label for="cadre" class="form-label">Cadre </label>
                                        <input type="text" id="cadre" name="cadre" placeholder="Enter Cadre" class="form-control">
                                         @error('cadre')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-5">
                                        <label for="cadreDate" class="form-label">Cadre Date </label>
                                        <input type="date" id="cadreDate" name="cadreDate" placeholder="Enter Cadre Date" class="form-control">
                                         @error('cadreDate')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                     <div class="mb-3 col-5">
                                        <label for="starting_grade" class="form-label">Starting grade </label>
                                        <select id="starting_grade" name="starting_grade" class="form-control">
                                            <option value="" selected>Select Starting Grade</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>

                                        </select>
                                        @error('starting_grade')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="current_grade" class="form-label">Current grade </label>
                                        <select id="current_grade" name="current_grade" class="form-control">
                                            <option value="" selected>Select Current Grade</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>

                                        </select>
                                        @error('current_grade')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>


                                    <div class="mb-3 col-5">
                                        <label for="current_grade_date" class="form-label">Current grade Date </label>
                                        <input type="date" id="current_grade_date" name="current_grade_date" placeholder="Enter Cadre Date" class="form-control">
                                         @error('current_grade_date')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="batch" class="form-label">Batch </label>
                                        <input type="text" id="batch" name="batch" placeholder="Enter Batch" class="form-control">
                                         @error('batch')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="confirmationGODate" class="form-label">Confirmation G.O. Date </label>
                                        <input type="date" id="confirmationGODate" name="confirmationGODate" class="form-control">
                                         @error('confirmationGODate')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 ml-3 col-5 ">
                                        <label for="example-select" class="form-label ">Gender </label>
                                        <br>
                                        <div class="form-check-inline">
                                            <input type="radio" id="customRadio1" value="Male" name="gender" class="form-check-input">
                                            <label class="form-check-label" for="customRadio1"><i class=" ri-men-line"></i> Male </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <input type="radio" id="customRadio2" value="Female" name="gender" class="form-check-input">
                                            <label class="form-check-label" for="customRadio2"><i class="ri-women-line"></i> Female </label>
                                        </div>
                                        @error('gender')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="religion" class="form-label">Religion </label>
                                        <select id="religion" name="religion" class="form-control">
                                            <option value="">Select Religion</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Hinduism">Hinduism</option>
                                            <option value="Christianity">Christianity</option>
                                            <option value="Buddhism">Buddhism</option>
                                            <option value="Other">Other</option>
                                        </select>
                                         @error('religion')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-5">
                                        <label for="maritalStat" class="form-label">Marital Status </label>
                                        <select id="maritalStat" name="maritalStat" class="form-control">
                                            <option value="" selected>Select Marital Status</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>
                                        @error('maritalStat')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="nid" class="form-label">National ID </label>
                                        <input type="text" id="nid" name="nid" placeholder="Enter National ID" class="form-control">
                                        @error('nid')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="freedomFighter" class="form-label">Freedom Fighter </label>
                                        <select id="freedomFighter" name="freedomFighter" class="form-control">
                                            <option value="" selected>Select Freedom Fighter Status</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        @error('freedomFighter')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="example-password" class="form-label">Phone </label>
                                        <input type="tel" id="phome" name="phone" placeholder="Enter Phone Number" class="form-control">
                                        @error('phone')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="email" class="form-label">Email </label>
                                        <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control" placeholder="Email">
                                        @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                </div>

                            </div>
                            <h4 class="header-title" data-bs-toggle="collapse" href="#spouseInfo" role="button"><i class='uil uil-angle-down font-32' style="font-size: 26px;"></i>FAMILY INFORMATION</h4>
                            <div class="collapse" id="spouseInfo">
                                <div class="row ms-5">
                                    <div class="mb-3 col-5">
                                        <label for="spouseName" class="form-label">Spouse Name </label>
                                        <input type="text" id="spouseName" name="spouseName" placeholder="Enter Spouse Name" class="form-control">
                                        @error('spouseName')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="spouseHomeDist" class="form-label">Home District </label>
                                        <input type="text" id="spouseHomeDist" name="spouseHomeDist" placeholder="Enter Spouse Home District" class="form-control">
                                         @error('spouseHomeDist')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="spouseOccupation" class="form-label">Occupation </label>
                                        <select id="spouseOccupation" name="spouseOccupation" class="form-select">
                                            <option value="">Select Occupation</option>
                                            <option value="Doctor">Doctor</option>
                                            <option value="Engineer">Engineer</option>
                                            <option value="Teacher">Teacher</option>
                                            <option value="Businessman">Businessman</option>
                                            <option value="Lawyer">Lawyer</option>
                                            <option value="Banker">Banker</option>
                                            <option value="Government Employee">Government Employee</option>
                                            <option value="Private Employee">Private Employee</option>
                                            <option value="Student">Student</option>
                                            <option value="Housewife">Housewife</option>
                                            <option value="Other">Other</option>
                                        </select>
                                         @error('spouseOccupation')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    
                                    
                                </div>
                                <div class="row ms-5">
                                    <div class="mb-3 col-5">
                                        <label for="spouseName" class="form-label">Childrens (Male) </label>
                                        <input type="number" id="spouseName" name="child_boy" placeholder="Enter Number of Male Children" class="form-control">
                                        @error('spouseName')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-5">
                                        <label for="spouseName" class="form-label">Childrens (Female) </label>
                                        <input type="number" id="spouseName" name="child_girl" placeholder="Enter Number of female Children" class="form-control">
                                        @error('spouseName')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                   
                                    
                                    
                                </div>
                               
                          
                            </div>
                            <h4 class="header-title" data-bs-toggle="collapse" href="#educationalQualification" role="button"><i class='uil uil-angle-down font-32' style="font-size: 26px;"></i>EDUCATIONAL QUALIFICATION</h4>
                            <div class="collapse" id="educationalQualification">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    <th>Degree</th>
                                    <th>Year</th>
                                    <th>Result</th>
                                    <th>Subject Name</th>
                                    <th>GPA/CGPA</th>
                                    <th>Distinction</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>
                                        <select name="education[degree][]" class="form-control">
                                        <option value="">Select Degree</option>
                                        <option value="SSC">SSC</option>
                                        <option value="HSC">HSC</option>
                                        <option value="Bachelors">Bachelors</option>
                                        <option value="Masters">Masters</option>
                                        <option value="PhD">PhD</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="education[year][]" class="form-control">
                                        <option value="">Select Year</option>
                                        <?php
                                            for ($i = 2023; $i >= 1971; $i--) {
                                            echo "<option value='{$i}'>{$i}</option>";
                                            }
                                        ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="education[result][]" class="form-control">
                                        <option value="">Select Result</option>
                                        <option value="First Class">First Class</option>
                                        <option value="Second Class">Second Class</option>
                                        <option value="Third Class">Third Class</option>
                                        <option value="Pass">Pass</option>
                                        <option value="Not Applicable">Not Applicable</option>
                                        </select>
                                    </td>
                                    <td><input type="text" name="education[subject][]" class="form-control" placeholder="Subject Name"></td>
                                    <td><input type="number" step="0.01" min="0" max="4" name="education[gpa][]" class="form-control" placeholder="CGPA"></td>
                                    <td><input type="text" name="education[distinction][]" class="form-control" placeholder="distinction"></td>
                                    <td><button type="button" class="btn btn-danger remove-row">-</button></td>
                                    </tr>
                                </tbody>
                                </table>
                                <button type="button" class="btn btn-primary" id="addRow">+</button>
                            </div>
                            </div>
                            <script>
                            // Add new row to the table
                            document.getElementById("addRow").addEventListener("click", function() {
                                var tableBody = document.querySelector("table tbody");
                                var newRow = tableBody.insertRow();
                                var cols = ["degree", "year", "result", "subject", "gpa", "distinction"];
                                for (var i = 0; i < cols.length; i++) {
                                var cell = newRow.insertCell();
                                var input = document.createElement("input");
                                input.type = "text";
                                input.name ="education["+ cols[i]+"]"+ "[]";
                                input.className = "form-control";
                                if(cols[i] === "degree") {
                                    // Add degree dropdown options
                                    var degreeOptions = ["SSC", "HSC", "Bachelor", "Masters", "PhD"];
                                    input = document.createElement("select");
                                    input.name ="education["+ cols[i]+"]" + "[]";
                                    input.className = "form-control";
                                    var option = document.createElement("option");
                                    option.value = "";
                                    option.text = "Select Degree";
                                    option.disabled = true;
                                    option.selected = true;
                                    input.appendChild(option);
                                    for (var j = 0; j < degreeOptions.length; j++) {
                                    option = document.createElement("option");
                                    option.value = degreeOptions[j];
                                    option.text = degreeOptions[j];
                                    input.appendChild(option);
                                    }
                                } else if(cols[i] === "year") {
                                    // Add year dropdown options
                                    input = document.createElement("select");
                                    input.name ="education["+ cols[i]+"]" + "[]";
                                    input.className = "form-control";
                                    var currentYear = new Date().getFullYear();
                                    var option = document.createElement("option");
                                    option.value = "";
                                    option.text = "Select Year";
                                    option.disabled = true;
                                    option.selected = true;
                                    input.appendChild(option);
                                    for (var j = currentYear; j >= currentYear - 53; j--) {
                                    option = document.createElement("option");
                                    option.value = j;
                                    option.text = j;
                                    input.appendChild(option);
                                    }
                                } else if(cols[i] === "result") {
                                    // Add result dropdown options
                                    var resultOptions = ["First Division", "Second Division", "Third Division", "Pass", "Fail", "Not Applicable"];
                                    input = document.createElement("select");
                                    input.name ="education["+ cols[i]+"]" +"[]";
                                    input.className = "form-control";
                                    var option = document.createElement("option");
                                    option.value = "";
                                    option.text = "Select Result";
                                    option.disabled = true;
                                    option.selected = true;
                                    input.appendChild(option);
                                    for (var j = 0; j < resultOptions.length; j++) {
                                    option = document.createElement("option");
                                    option.value = resultOptions[j];
                                    option.text = resultOptions[j];
                                    input.appendChild(option);
                                    }
                                } else if(cols[i] === "gpa") {
                                    // Add number input for GPA/CGPA
                                    input = document.createElement("input");
                                    input.type = "number";
                                    input.name ="education["+ cols[i]+"]" + "[]";
                                    input.step = "0.01";
                                    input.min = "0";
                                    input.max = "4";
                                    input.className = "form-control";
                                }
                                cell.appendChild(input);
                                }

                                // Add remove button to the new row
                                var removeCell = newRow.insertCell();
                                var removeButton = document.createElement("button");
                                removeButton.type = "button";
                                removeButton.className = "btn btn-danger";
                                removeButton.innerHTML = "x";
                                removeButton.addEventListener("click", function() {
                                tableBody.removeChild(newRow);
                                });
                                removeCell.appendChild(removeButton);
                            });
                            </script>
                              <h4 class="header-title" data-bs-toggle="collapse" href="#mandTraining" role="button"><i class='uil uil-angle-down font-32' style="font-size: 26px;"></i>LOCAL TRAINING (MANDATORY)</h4>
                            <div class="collapse" id="mandTraining">
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>Course Title</th>
                                      <th>Institution</th>
                                      <th>From Date</th>
                                      <th>To Date</th>
                                      <th>Duration(Y-M-D)</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td><input type="text" name="mand_training[course_title][]" class="form-control" placeholder="Enter Course Title"></td>
                                      <td><input type="text" name="mand_training[institution][]" class="form-control" placeholder="Enter Institution"></td>
                                      <td><input type="date" name="mand_training[from_date][]" class="form-control"></td>
                                      <td><input type="date" name="mand_training[to_date][]" class="form-control"></td>
                                      <td><input type="text" name="mand_training[duration][]" class="form-control" placeholder="Y-M-D"></td>
                                      <td><button type="button" class="btn btn-danger remove-row">-</button></td>
                                    </tr>
                                  </tbody>
                                </table>
                                <button type="button" class="btn btn-primary" id="addRowMandTraining">+</button>
                              </div>
                            </div>
                            <script>
                              // Add new row to the table
                              document.getElementById("addRowMandTraining").addEventListener("click", function() {
                                var tableBody = document.querySelector("#mandTraining table tbody");
                                var newRow = tableBody.insertRow();
                                var cols = ["course_title", "institution", "from_date", "to_date", "duration"];
                                for (var i = 0; i < cols.length; i++) {
                                  var cell = newRow.insertCell();
                                  var input = document.createElement("input");
                                  if (cols[i] === "from_date" || cols[i] === "to_date") {
                                    input.type = "date";
                                  } else {
                                    input.type = "text";
                                  }
                                  input.name ="mand_training["+ cols[i] +"]" + "[]";
                                  input.className = "form-control";
                                  if (cols[i] === "course_title") {
                                    input.placeholder = "Enter Course Title";
                                  } else if (cols[i] === "institution") {
                                    input.placeholder = "Enter Institution";
                                  } else if (cols[i] === "duration") {
                                    input.placeholder = "Y-M-D";
                                  }
                                  cell.appendChild(input);
                                }

                                // Add remove button to the new row
                                var removeCell = newRow.insertCell();
                                var removeButton = document.createElement("button");
                                removeButton.type = "button";
                                removeButton.className = "btn btn-danger";
                                removeButton.innerHTML = "x";
                                removeButton.addEventListener("click", function() {
                                  tableBody.removeChild(newRow);
                                });
                                removeCell.appendChild(removeButton);

                              });
                            </script>
                           <h4 class="header-title" data-bs-toggle="collapse" href="#localTraining" role="button"><i class='uil uil-angle-down font-32' style="font-size: 26px;"></i>LOCAL TRAINING</h4>
                            <div class="collapse" id="localTraining">
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>Course Title</th>
                                      <th>Institution</th>
                                      <th>From Date</th>
                                      <th>To Date</th>
                                      <th>Duration(Y-M-D)</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td><input type="text" name="training[course_title][]" class="form-control" placeholder="Enter Course Title"></td>
                                      <td><input type="text" name="training[institution][]" class="form-control" placeholder="Enter Institution"></td>
                                      <td><input type="date" name="training[from_date][]" class="form-control"></td>
                                      <td><input type="date" name="training[to_date][]" class="form-control"></td>
                                      <td><input type="text" name="training[duration][]" class="form-control" placeholder="Y-M-D"></td>
                                      <td><button type="button" class="btn btn-danger remove-row">-</button></td>
                                    </tr>
                                  </tbody>
                                </table>
                                <button type="button" class="btn btn-primary" id="addRowLocalTraining">+</button>
                              </div>
                            </div>

                            <script>
                              // Add new row to the table
                              document.getElementById("addRowLocalTraining").addEventListener("click", function() {
                                var tableBody = document.querySelector("#localTraining table tbody");
                                var newRow = tableBody.insertRow();
                                var cols = ["course_title", "institution", "from_date", "to_date", "duration"];
                                for (var i = 0; i < cols.length; i++) {
                                  var cell = newRow.insertCell();
                                  var input = document.createElement("input");
                                  if (cols[i] === "from_date" || cols[i] === "to_date") {
                                    input.type = "date";
                                  } else {
                                    input.type = "text";
                                  }
                                  input.name = "training["+cols[i]+"]" + "[]";
                                  input.className = "form-control";
                                  if (cols[i] === "course_title") {
                                    input.placeholder = "Enter Course Title";
                                  } else if (cols[i] === "institution") {
                                    input.placeholder = "Enter Institution";
                                  } else if (cols[i] === "duration") {
                                    input.placeholder = "Y-M-D";
                                  }
                                  cell.appendChild(input);
                                }

                                // Add remove button to the new row
                                var removeCell = newRow.insertCell();
                                var removeButton = document.createElement("button");
                                removeButton.type = "button";
                                removeButton.className = "btn btn-danger";
                                removeButton.innerHTML = "x";
                                removeButton.addEventListener("click", function() {
                                  tableBody.removeChild(newRow);
                                });
                                removeCell.appendChild(removeButton);

                              });
                            </script>

                            <h4 class="header-title" data-bs-toggle="collapse" href="#foreignTraining" role="button"><i class='uil uil-angle-down font-32' style="font-size: 26px;"></i>FOREIGN TRAINING</h4>
                            <div class="collapse" id="foreignTraining">
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>Course Title</th>
                                      <th>Country</th>
                                      <th>From Date</th>
                                      <th>To Date</th>
                                      <th>Duration(Y-M-D)</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td><input type="text" name="fr_training[foreign_course_title][]" class="form-control" placeholder="Enter Course Title"></td>
                                      <td><input type="text" name="fr_training[foreign_institution][]" class="form-control" placeholder="Enter Institution"></td>
                                      <td><input type="date" name="fr_training[foreign_from_date][]" class="form-control"></td>
                                      <td><input type="date" name="fr_training[foreign_to_date][]" class="form-control"></td>
                                      <td><input type="text" name="fr_training[foreign_duration][]" class="form-control" placeholder="Y-M-D"></td>
                                      <td><button type="button" class="btn btn-danger remove-row">-</button></td>
                                    </tr>
                                  </tbody>
                                </table>
                                <button type="button" class="btn btn-primary" id="addRowForeignTraining">+</button>
                              </div>
                            </div>
                            <script>
                              // Add new row to the table
                              document.getElementById("addRowForeignTraining").addEventListener("click", function() {
                                var tableBody = document.querySelector("#foreignTraining table tbody");
                                var newRow = tableBody.insertRow();
                                var cols = ["foreign_course_title", "foreign_institution", "foreign_from_date", "foreign_to_date", "foreign_duration"];
                                for (var i = 0; i < cols.length; i++) {
                                  var cell = newRow.insertCell();
                                  var input = document.createElement("input");
                                  if (cols[i] === "foreign_from_date" || cols[i] === "foreign_to_date") {
                                    input.type = "date";
                                  } else {
                                    input.type = "text";
                                  }
                                  input.name ="fr_training[" +cols[i] +"]"+ "[]";
                                  input.className = "form-control";
                                  if (cols[i] === "foreign_course_title") {
                                    input.placeholder = "Enter Course Title";
                                  } else if (cols[i] === "foreign_institution") {
                                    input.placeholder = "Enter Institution";
                                  } else if (cols[i] === "foreign_duration") {
                                    input.placeholder = "Y-M-D";
                                  }
                                  cell.appendChild(input);
                                }

                                // Add remove button to the new row
                                var removeCell = newRow.insertCell();
                                var removeButton = document.createElement("button");
                                removeButton.type = "button";
                                removeButton.className = "btn btn-danger";
                                removeButton.innerHTML = "x";
                                removeButton.addEventListener("click", function() {
                                  tableBody.removeChild(newRow);
                                });
                                removeCell.appendChild(removeButton);

                              });
                            </script>

                            <h4 class="header-title" data-bs-toggle="collapse" href="#postingRecords" role="button"><i class='uil uil-angle-down font-32' style="font-size: 26px;"></i>POSTING RECORDS</h4>
                            <div class="collapse" id="postingRecords">
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>Designation</th>
                                      <th>Organization</th>
                                      <th>Location</th>
                                      <th>From Date</th>
                                      <th>To Date</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td><input type="text" name="posting[posting_designation][]" class="form-control" placeholder="Enter Designation"></td>
                                      <td><input type="text" name="posting[posting_organization][]" class="form-control" placeholder="Enter Organization"></td>
                                      <td><input type="text" name="posting[posting_location][]" class="form-control" placeholder="Enter Location"></td>
                                      <td><input type="date" name="posting[posting_from_date][]" class="form-control"></td>
                                      <td><input type="date" name="posting[posting_to_date][]" class="form-control"></td>
                                      <td><button type="button" class="btn btn-danger remove-row">-</button></td>
                                    </tr>
                                  </tbody>
                                </table>
                                <button type="button" class="btn btn-primary" id="addRowPostingRecords">+</button>
                              </div>
                            </div>
                            <script>
                              // Add new row to the table
                              document.getElementById("addRowPostingRecords").addEventListener("click", function() {
                                var tableBody = document.querySelector("#postingRecords table tbody");
                                var newRow = tableBody.insertRow();
                                var cols = ["posting_designation", "posting_organization", "posting_location", "posting_from_date", "posting_to_date"];
                                for (var i = 0; i < cols.length; i++) {
                                  var cell = newRow.insertCell();
                                  var input = document.createElement("input");
                                  if (cols[i] === "posting_from_date" || cols[i] === "posting_to_date") {
                                    input.type = "date";
                                  } else {
                                    input.type = "text";
                                  }
                                  input.name ="posting["+ cols[i] +"]"+ "[]";
                                  input.className = "form-control";
                                  if (cols[i] === "posting_designation") {
                                    input.placeholder = "Enter Designation";
                                  } else if (cols[i] === "posting_organization") {
                                    input.placeholder = "Enter Organization";
                                  } else if (cols[i] === "posting_location") {
                                    input.placeholder = "Enter Location";
                                  }
                                  cell.appendChild(input);
                                }

                                // Add remove button to the new row
                                var removeCell = newRow.insertCell();
                                var removeButton = document.createElement("button");
                                removeButton.type = "button";
                                removeButton.className = "btn btn-danger";
                                removeButton.innerHTML = "x";
                                removeButton.addEventListener("click", function() {
                                  tableBody.removeChild(newRow);
                                });
                                removeCell.appendChild(removeButton);

                              });
                            </script>




                            <div class="row ms-5">
                                <div class="mb-3 col-10 text-end">
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
