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

    <h1 class="h3 mb-3">Update Staff</h1>


    <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- <div class="card-header">
                            <h5 class="card-title mb-0">Add Staff </h5>
                        </div> -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-6">

                                    <div class="card">

                                        <form action="{{route('update_staff',$staff_data->staff_id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Staff Name</h5>
                                            </div>

                                            <div class="card-body">
                                                <input type="text" required = "required" value="{{ old('staff_name',$staff_data->staff_name) }}" name="staff_name"
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
                                                    <option value="{{$staff_data->staff_dep_id}}">{{$staff_data->Department_name_en}}</option>
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
                                                <input type="text" required="required" value="{{ old('staff_email',$staff_data->staff_email) }}"
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
                                                <input type="text" required="required" value="{{ old('staff_position',$staff_data->staff_position) }}" name="staff_position"
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
                                                <input type="text" value="{{ old('staff_phone',$staff_data->staff_phone) }}" name="staff_phone"
                                                    class="form-control" placeholder="Enter Phone">
                                                @error('staff_phone')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                            
                        
                                            <div class="text-center">

                                                <button class="btn btn btn-success">Edit Staff</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
</main>

@endsection