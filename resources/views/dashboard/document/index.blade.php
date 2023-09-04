@extends('layouts.app')

@section('content')
   
    <div class="container-fluid" id="list">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Dashboard</a></li>
                                           
                                            <li class="breadcrumb-item active">Document List</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Document List</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <button onclick="openForm()" class="btn btn-success rounded-pill mb-3"><i class="mdi mdi-plus"></i> Create Document</button>
                            </div>
                            <div class="col-sm-8">
                                {{-- <div class="text-sm-end">
                                    <div class="btn-group mb-3">
                                        <button type="button" class="btn btn-primary">All</button>
                                    </div>
                                    <div class="btn-group mb-3 ms-1">
                                        <button type="button" class="btn btn-light">Ongoing</button>
                                        <button type="button" class="btn btn-light">Finished</button>
                                    </div>
                                    <div class="btn-group mb-3 ms-2 d-none d-sm-inline-block">
                                        <button type="button" class="btn btn-secondary"><i class="ri-function-line"></i></button>
                                    </div>
                                    <div class="btn-group mb-3 d-none d-sm-inline-block">
                                        <button type="button" class="btn btn-link text-muted"><i class="ri-list-check-2"></i></button>
                                    </div>
                                </div> --}}
                            </div><!-- end col-->
                        </div> 
                        <!-- end row-->

                        <div class="row">
                        @foreach ($documents as $document)
                            
                         <div class="col-md-6 col-xxl-3">
                                <!-- project card -->
                                
                                        <!-- project title-->
                                       <div class="card m-1 shadow-none border">
                                        
                                    <div class="card-body">
                                        <div class="dropdown card-widgets">
                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                                <!-- item-->
                                                <a href="" class="dropdown-item"><i class=" ri-archive-fill me-1"></i>Archive</a>
                                                <!-- item-->
                                               
                                            </div>
                                        </div>
                                                            <div class="p-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto">
                                                                        <div class="avatar-sm">
                                                                            <a href="{{setImage($document->file)}}">
                                                                            <span class="avatar-title bg-light text-secondary rounded">
                                                                             @if ($document->type == 'PDF')
                                                                                 <i class="mdi mdi-file-pdf-box font-18"></i>
                                                                             @elseif($document->type == 'Compressed')
                                                                                 <i class="mdi mdi-folder-zip font-18"></i>
                                                                            @elseif($document->type == 'Image')
                                                                            <i class="mdi mdi-file-image-outline font-18"></i>
                                                                            @elseif($document->type == 'Audio')
                                                                            <i class="mdi mdi-file-music-outline font-18"></i>
                                                                            @elseif($document->type == 'Video')
                                                                            <i class="mdi mdi-file-video font-18"></i>
                                                                            @elseif($document->type == 'Word')
                                                                            <i class=" ri-file-word-2-line font-18"></i>
                                                                            @elseif($document->type == 'Power Point')
                                                                            <i class="  ri-file-ppt-2-line font-18"></i>
                                                                            @elseif($document->type == 'Excel')
                                                                            <i class="  ri-file-excel-2-line font-18"></i>
                                                                            @else 
                                                                            <i class="  ri-folder-2-line font-18"></i>
                                                                             @endif   
                                                                            </span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <a href="{{setImage($document->file)}}" class="text-muted fw-bold">{{$document->name}}  <i  class="ri-download-2-line"></i></a>
                                                                       
                                                                    </div>
                                                                </div> <!-- end row -->
                                                            </div> <!-- end .p-2-->
                                                        </div>
                                       
                                    </div> <!-- end card-body-->
                                   
                                <!-- end card-->
                            </div> <!-- end col -->

                           
                        @endforeach   </div>
                        <!-- end row-->

                       
                        <!-- end row-->
                        
    </div> <!-- container -->
     <div class="container-fluid" id="form" hidden>

                        <!-- start page title -->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                                            <li class="breadcrumb-item active">Create Project</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Create Document</h4>
                                </div>
                                  <div class="col-sm-4">
                                <button onclick="closeForm()" class="btn btn-primary rounded-pill mb-3"><i class=" ri-file-list-line"></i> Document List</button>
                            </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <form action="{{route('document.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-xl-8 mx-5">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label"><span class="text-danger">*</span> Name</label>
                                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter project name">
                                                </div>

                                               

                                                <div class="mb-0">
                                                    <label for="project-overview" class="form-label"><span class="text-danger">*</span> File Type</label>
                                                    
                                                    <select class="form-control select2" name="type" data-toggle="select2">
                                                        <option>Select</option>
                                                        <option value="Image">Image</option>
                                                        <option value="PDF">PDF</option>
                                                        <option value="Audio">Audio</option>
                                                        <option value="Video">Video</option>
                                                        <option value="Word">Word</option>
                                                        <option value="Excel">Excel</option>
                                                        <option value="Power Point">Power Point</option>
                                                        
                                                        <option value="Compressed">Compressed</option>
                                                        <option value="Others">Others</option>
                                                    </select>

                                                    
        
                                                </div>
                                                <div class="mb-0">
                                                    <label for="project-overview" class="form-label">Department</label>
                                                    
                                                    <select class="form-control select2" name="department_id" data-toggle="select2">
                                                        <option value="{{null}}">Select</option>
                                                        @foreach (App\Models\Department::all() as $department)
                                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                                        @endforeach
                                                        
                                                      
                                                    </select>

                                                    
        
                                                </div>

                                            
                                                <div class="mb-3 mt-3 mt-xl-0">
                                                    <label for="projectname" class="mb-0"><span class="text-danger">*</span> File</label>
                                                   

                                                 
                                                            <input name="file" type="file" class="form-control" />
                                                        
                                                    <!-- Preview -->
                                                   
                                                    <!-- end file preview template -->
                                                </div>

                                               <button type="submit" class="btn btn-info float-end">Save</button>
                                            </div> <!-- end col-->
                                        </div>
                                        <!-- end row -->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </form>
                        </div>
                        <!-- end row-->
                        
                    </div>
                        <!-- end row-->
                        
                    </div>
@endsection
@section('js')
 

    <script>
            function openForm(){
                let form = document.getElementById('form')
                let list = document.getElementById('list')
                form.hidden = false;
                list.hidden = true;
            }
            function closeForm(){
                let form = document.getElementById('form')
                let list = document.getElementById('list')
                form.hidden = true;
                list.hidden = false;
            }
           
          </script>
@endsection
