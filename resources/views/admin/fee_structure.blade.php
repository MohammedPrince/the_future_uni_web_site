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

    <h1 class="h3 mb-3">Manage Fee</h1>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Add Fee </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-6">

                            <div class="card">

                                <form action="add_fee" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Addmission Year</h5>
                                    </div>

                                    <div class="card-body">
                                        <select type="text" required = "required" name="admission_year"
                                            class="form-control">

                                            <option value=""> Select Admission Year</option>
                                                @for ($i = 2015; $i <= 2030; $i++)
                                             <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                        
                                        </select>

                                        @error('admission_year')
                                            <div class="alert error text-center">
                                                <p class="inner">{{ $message }}</p>
                                            </div>
                                        @enderror

                                    </div>


                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Program</h5>
                                    </div>
                                     <div class="card-body">
                                        <select class="form-select mb-3"  name="program_code" required="required">
                                            <option value="">Select Program</option>

                                            @foreach($program as $program_data)

                                            <option value="{{$program_data->prog_id}}">{{$program_data->program_name_en}}</option>
                                    @endforeach
                                        </select>
                                        @error('program')
                                            <div class="alert error text-center">
                                                <p class="inner">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Fee Type</h5>
                                    </div>

                                    <div class="card-body">
                                        <select type="text" required = "required" name="fee_type"
                                            class="form-control">

                                            <option value=""> Select Fee Type</option>
                                             
                                             <option value="Sudanese">Sudanese</option>
                                             <option value="foreigners">foreigners</option>

                                    
                                        </select>

                                        @error('fee_type')
                                            <div class="alert error text-center">
                                                <p class="inner">{{ $message }}</p>
                                            </div>
                                        @enderror

                                    </div>

                                    <div class="card-header">
                                                <h5 class="card-title mb-0">Fee</h5>
                                            </div>
                                            <div class="card-body">
                                                <input type="text" required = "required" value="{{ old('fee') }}" name="fee"
                                                    class="form-control" placeholder="Enter Program Fee">
                                                @error('fee')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                            

                                    <div class="text-center">

                                        <button class="btn btn btn-success">Add Fee</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@if(isset($structure_data))  
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
                                    <th>admission year</th>
                                    <th>program code</th>
                                    <th>fee code</th>
                                    <th>Email</th>
                                    <th>fee type</th>
                                    <th>Action</th>

                            
                                </tr>
                            </thead>
                            <tbody>
                          @foreach($structure_data as $structures_data)
                                    <tr>
                                        <td>{{ $structures_data->admission_year }}</td>
                                        <td>{{ $structures_data->program_code }} </td>
                                        <td>{{ $structures_data->fee_code }}  </td>
                                        <td>{{ $structures_data->fee_type }} </td>
                                      <td>dfh</td>
                                        <td><a href="edit_linkage/{{$structures_data->link_id}}/edit" class="btn btn btn-info">Edit</a>
                                        <a href="linkage/{{$structures_data->link_id}}/delete" class="btn btn btn-danger" onClick="return confirm('Are You Sure You Want to Delete this User ?')">Delete</a>
                                    
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