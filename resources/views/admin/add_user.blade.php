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

            <h1 class="h3 mb-3">Manage WebSite Users</h1>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Add Website Users</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-6">

                                    <div class="card">

                                        <form action="add_user" method="POST">
                                            @csrf
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Username</h5>
                                            </div>

                                            <div class="card-body">
                                                <input type="text" value="{{ old('username') }}" name="username"
                                                    class="form-control" placeholder="Enter Username">

                                                @error('username')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror

                                            </div>

                                            <div class="card-header">
                                                <h5 class="card-title mb-0">User Full Name</h5>
                                            </div>
                                            <div class="card-body">
                                                <input type="text" value="{{ old('user_fullname') }}"
                                                    name="user_fullname" class="form-control"
                                                    placeholder="Enter User Full Name">
                                                @error('user_fullname')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="card-header">
                                                <h5 class="card-title mb-0">User Phone</h5>
                                            </div>
                                            <div class="card-body">
                                                <input type="text" inputmode="numeric"pattern="[0-9\s]{10,10}"
                                                    maxlength="10" value="{{ old('user_phone') }}" name="user_phone"
                                                    class="form-control" placeholder="Enter User Phone">
                                                @error('user_phone')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="card-header">
                                                <h5 class="card-title mb-0">User Email</h5>
                                            </div>
                                            <div class="card-body">
                                                <input type="email" value="{{ old('user_email') }}" name="user_email"
                                                    class="form-control" placeholder="Enter User Email">
                                                @error('user_email')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>


                                            <div class="card-header">
                                                <h5 class="card-title mb-0">User Type</h5>
                                            </div>
                                            <div class="card-body">

                                                <select class="form-select mb-3" name="isAdmin" required="required">
                                                    <option value="">Select User Type</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">User</option>
                                                </select>
                                                @error('user_type')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="card-header">
                                                <h5 class="card-title mb-0">User Faculty</h5>
                                            </div>
                                            <div class="card-body">

                                                <select class="form-select mb-3" name="user_faculty" required="required">
                                                    <option value="">Select User Faculty / Office</option>
                                                    @foreach ($departments as $departments_query)

                                                    <option value="{{$departments_query->faculty_code}}">{{$departments_query->Department_name_en}}</option>


                                                    @endforeach
                                                </select>
                                                @error('user_faculty')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="text-center">

                                                <button class="btn btn btn-success">Add User</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($users != null)
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">View Website Users</h5>
                            </div>
                            <div class="card-body">

                                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Full Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Faculty</th>
                                            <th>Type</th>
                                            <th>Edit</th>
                                            <th>DEL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td> {{ $user->username }}</td>
                                                <td> {{ $user->user_fullname }}</td>
                                                <td> {{ $user->user_phone }} </td>
                                                <td> {{ $user->user_email }}</td>
                                                <td> {{ $user_dept }} </td>
                                                <td>
                                                    {{ $user->isAdmin == '1' ? 'Admin' : 'User' }}
                                                </td>
                                           
                                                <td><a href="{{route('edit_user' ,$user->id,'edit')}}" class="btn btn btn-info">Edit</a></td>

                                                <!-- {{-- edit_user/{{$user->id}}/edit -- real one--}} -->
                                                    
                                                <!-- <td><a href="" class="btn btn btn-info">Edit</a></td> -->

                                                <td><a href="{{route('delete_user' ,$user->id,'delete')}}" class="btn btn btn-danger" onClick="return confirm('Are You Sure You Want to Delete this User ?')">Delete</a></td>
                                            
                                                 <!-- {{-- add_user/{{$user->id}}/delete -- real one --}} -->
                                                    
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
