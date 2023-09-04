@extends('layouts.app')
@section('css')
    <!-- Datatables css -->
    <link href="assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
   <div class="content">

                     <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('task.index') }}">Tasks</a></li>
                                            <li class="breadcrumb-item active">Task Details</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Task Details</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                          <div class="col-1"></div>
                            <div class="col-10">
                                <!-- project card -->
                                <div class="card d-block">
                                    <div class="card-body">
                                        <div class="dropdown card-widgets">
                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class='uil uil-ellipsis-h'></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->

                                                <!-- item-->
                                                <a href="{{ route('task.edit',$task->id) }}" class="dropdown-item">
                                                    <i class='uil uil-edit me-1'></i>Edit
                                                </a>
                                                <!-- item-->

                                                <div class="dropdown-divider"></div>
                                                <!-- item-->
                                                 <form action="{{ route('task.destroy', $task->id) }}" method="post" id="taskForm">
                                          @method('DELETE')
                                          @csrf
                                                <button class="dropdown-item text-danger" type="submit">
                                                    <i class='uil uil-trash-alt me-1'></i>Delete
                                                </button>
                                                 </form>
                                            </div> <!-- end dropdown menu-->
                                        </div> <!-- end dropdown-->

                                        <div class="form-check float-start">
                                       @if (
                                        $task->status == 1
                                       )
                            <span class="badge bg-success">Completed</span>
                                       @else

                                        <form action="{{ route('task.update', $task->id) }}" method="post" id="taskForm">
                                          @method('PUT')
                                          @csrf
                                          <input type="checkbox" name="status" value="1" class="form-check-input" id="completedCheck">
                                          <label class="form-check-label" for="completedCheck">
                                              Mark as completed
                                          </label>
                                      </form>
                                         @endif
                                        </div> <!-- end form-check-->

                                        <div class="clearfix"></div>

                                        <h3 class="mt-3">{{ $task->title }}</h3>

                                        <div class="row">
                                            <div class="col-6">
                                                <!-- assignee -->
                                                <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Assigned To</p>
                                               @foreach ($task->employees as $user)

                                               <div class="d-flex">
                                                    <img src="{{ setImage($user->employee->image,'user') }}" alt="Arya S" class="rounded-circle me-2" height="24" />
                                                    <div>
                                                        <h5 class="mt-1 font-14">
                                                           {{ $user->employee->name }}
                                                        </h5>
                                                    </div>
                                                </div> @endforeach
                                                <!-- end assignee -->
                                            </div> <!-- end col -->

                                            <div class="col-6">
                                                <!-- start due date -->
                                                <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Due Date</p>
                                                <div class="d-flex">
                                                    <i class='uil uil-schedule font-18 text-success me-1'></i>
                                                    <div>
                                                        <h5 class="mt-1 font-14">
                                                            {{ Carbon\Carbon::parse($task->deadline)->diffForHumans() }}
                                                        </h5>
                                                    </div>
                                                </div>
                                                <!-- end due date -->
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->


                                        <h5 class="mt-3">Overview:</h5>

                                        <p class="text-muted mb-4">
                                           {{ $task->details }}
                                        </p>

                                        <!-- start sub tasks/checklists -->
                                        {{-- <h5 class="mt-4 mb-2 font-16">Checklists/Sub-tasks</h5>
                                        <div class="form-check mt-1">
                                            <input type="checkbox" class="form-check-input" id="checklist1">
                                            <label class="form-check-label strikethrough" for="checklist1">
                                                Find out the old contract documents
                                            </label>
                                        </div>

                                        <div class="form-check mt-1">
                                            <input type="checkbox" class="form-check-input" id="checklist2">
                                            <label class="form-check-label strikethrough" for="checklist2">
                                                Organize meeting sales associates to understand need in detail
                                            </label>
                                        </div>

                                        <div class="form-check mt-1">
                                            <input type="checkbox" class="form-check-input" id="checklist3">
                                            <label class="form-check-label strikethrough" for="checklist3">
                                                Make sure to cover every small details
                                            </label>
                                        </div> --}}
                                        <!-- end sub tasks/checklists -->

                                    </div> <!-- end card-body-->

                                </div> <!-- end card-->


                                <!-- end card-->
                            </div> <!-- end col -->
  <div class="col-1"></div>

                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->
                <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">

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
            function openForm(){
                let form = document.getElementById('form')
                form.hidden = false;
            }
            function closeForm(){
                let form = document.getElementById('form')
                form.hidden = true;
            }
          </script>
<script>
    const completedCheck = document.getElementById('completedCheck');
    const taskForm = document.getElementById('taskForm');

    completedCheck.addEventListener('change', function() {
        if (this.checked) {
            taskForm.submit();
        }
    });
</script>

        @endsection
