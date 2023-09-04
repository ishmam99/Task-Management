<ul class="side-nav">

    <li class="side-nav-title side-nav-item">Navigation</li>

    <li class="side-nav-item">
        <a href="{{ route('welcome') }}" class="side-nav-link">
            <i class="uil-home-alt"></i>

            <span> Dashboard </span>
        </a>

    </li>

    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarEmployees" aria-expanded="false" aria-controls="sidebarEmployees"
            class="side-nav-link">
            <i class="ri-user-2-fill"></i>
            <span> Employees </span>
        </a>
        <div class="collapse" id="sidebarEmployees">
            <ul class="side-nav-second-level">
                <li>
                    <a href="{{ route('employee.index') }}" class="side-nav-link"><i class=" ri-list-ordered"></i>
                        Employee List</a>
                </li>
                <li>
                    <a href="{{ route('employee.create') }}" class="side-nav-link"><i class=" ri-user-add-fill"></i> Add
                        New Employee</a>
                </li>

            </ul>
        </div>
    </li>




    <li class="side-nav-item">
        <a href="{{ route('attendance.index') }}" class="side-nav-link">
            <i class=" ri-calendar-todo-fill"></i>
            <span> Attendance </span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="{{ route('salary.index') }}" class="side-nav-link">
            <i class=" ri-currency-fill"></i>
            <span> Salaries </span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="{{ route('meeting.index') }}" class="side-nav-link">
            <i class=" ri-time-fill"></i>
            <span> Meetings </span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="{{ route('task.index') }}" class="side-nav-link">
            <i class=" uil-clipboard-alt"></i>
            <span> Task Management </span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="{{ route('document.index') }}" class="side-nav-link">
            <i class=" ri-folder-open-fill"></i>
            <span> Document Management </span>
        </a>
    </li>
     <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarApplicant" aria-expanded="false" aria-controls="sidebarApplicant"
            class="side-nav-link">
            <i class="ri-team-fill"></i>
            <span>Recruitment Process </span>
        </a>
        <div class="collapse" id="sidebarApplicant">
            <ul class="side-nav-second-level">
               <li class="side-nav-item">
                    <a href="{{ route('applicant.index') }}" class="side-nav-link">
                        <i class="  ri-file-list-fill"></i>
                        <span> Applicant List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('applicant.create') }}" class="side-nav-link"><i class=" ri-user-add-fill"></i> Add
                        New Applicant</a>
                </li>

            </ul>
        </div>
    </li>
     <li class="side-nav-item">
        <a href="{{ route('reports') }}" class="side-nav-link">
            <i class="ri-file-list-fill"></i>
            <span> Reports </span>
        </a>
    </li>
     <li class="side-nav-item">
        <a href="{{ route('pension.index') }}" class="side-nav-link">
            <i class="ri-file-list-fill"></i>
            <span> Pensions </span>
        </a>
    </li>


<li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarSettings" aria-expanded="false"
            aria-controls="sidebarSettingssidebarSettings" class="side-nav-link">
            <i class=" ri-settings-2-line"></i>
            <span> Settings </span>
        </a>
        <div class="collapse" id="sidebarSettings">
            <ul class="side-nav-second-level">
                <li class="side-nav-item">
                    <a href="{{ route('department.index') }}" class="side-nav-link">
                        <i class="ri-community-line"></i>
                        <span> Department </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{ route('position.index') }}" class="side-nav-link">
                        <i class=" ri-function-fill"></i>
                        <span> Position </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{ route('holiday.index') }}" class="side-nav-link">
                        <i class="  ri-calendar-event-line"></i>
                        <span> Holiday </span>
                    </a>
                </li>


            </ul>
        </div>
    </li>
</ul>
