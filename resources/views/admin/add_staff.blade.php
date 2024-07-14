@extends('components.admin-layout')
@section('main-admin-content')



<main class="content">

<center>
    @if (session()->has('success'))
        <div class="alert success text-center">

            <p class="inner">
                {{ session()->get('success') }}
            </p>
        </div>
    @endif

    @if (session()->has('failure'))
        <div class="alert error text-center">

            <p class="inner">
                {{ session()->get('failure') }}
            </p>
        </div>
    @endif
</center>

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Manage Staff</h1>


    <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Add Staff </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-6">

                                    <div class="card">

                                        <form action="add_staff" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Staff Name</h5>
                                            </div>

                                            <div class="card-body">
                                                <input type="text" required = "required" value="{{ old('staff_name') }}" name="staff_name"
                                                    class="form-control" placeholder="Enter Staff name">

                                                @error('staff_name')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror

                                            </div>
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Staff Department</h5>
                                            </div>
                                                    <div class="card-body">

                                                <select class="form-select mb-3" name="staff_dep_id" required="required">
                                                    <option value="">Select Staff Faculty / Department</option>
                                                    @foreach ($departments as $departments_query)

                                                    <option value="{{$departments_query->deprt_id}}">{{$departments_query->Department_name_en}}</option>


                                                    @endforeach
                                                </select>
                                                @error('staff_dep_id')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>


                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Email</h5>
                                            </div>
                                            <div class="card-body">
                                                <input type="text" value="{{ old('staff_email') }}"
                                                    name="staff_email" class="form-control"
                                                    placeholder="Staff Email">
                                                @error('staff_email')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Position</h5>
                                            </div>
                                            <div class="card-body">
                                                <input type="text" value="{{ old('staff_position') }}" name="staff_position"
                                                    class="form-control" placeholder="Enter Position">
                                                @error('staff_position')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                            <!-- staff_phone -->
                                   
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Phone</h5>
                                            </div>
                                            <div class="card-body">
                                                <input type="text" value="{{ old('staff_phone') }}" name="staff_phone"
                                                    class="form-control" placeholder="Enter Phone">
                                                @error('staff_phone')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                            
                        
                                            <div class="text-center">

                                                <button class="btn btn btn-success">Add Staff</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 @if(isset($staff_data)) 
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">View Fee </h5>
                    </div>
                    <div class="card-body">

                        <table id="datatables-buttons" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    <th>Phone</th>
                                    <th>Action</th>

                            
                                </tr>
                            </thead>
                            <tbody>
                          @foreach($staff_data as $staf_data)  
                                    <tr>
                                        <td>{{ $staf_data->staff_name }}</td>
                                        <td>{{ $staf_data->Department_name_en}} </td>
                                        <td>{{ $staf_data->staff_email }}  </td>
                                        <td>{{ $staf_data->staff_position }} </td>
                                      <td>{{ $staf_data->staff_phone }}</td>
                                        <td><a href="edit_linkage/{{$staf_data->staff_id}}/edit" class="btn btn btn-info">Edit</a>
                                        <a href="saff_cv/{{$staf_data->staff_id}}/staff_cv" target="_blank" class="btn btn btn-info">CV</a>
                                        <a href="linkage/{{ $staf_data->staff_id  }}/delete" class="btn btn btn-danger" onClick="return confirm('Are You Sure You Want to Delete this User ?')">Delete</a>
                                    
                                    </td>
                                        <!-- <td></td> -->
                                    </tr>
                             @endforeach 

                            </tbody>

                        </table>
                    
                    </div>
                    
                </div>
            </div>
        </div>
 @endif 



</div>
</main>










@endsection