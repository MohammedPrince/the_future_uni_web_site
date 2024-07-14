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

            <h1 class="h3 mb-3">Profile</h1>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Edit Profile</h5>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-lg-6">

                                    <div class="card">

                                        <form action="edit_user/{{$user->id}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Username</h5>
                                            </div>

                                            <div class="card-body">
                                                <input type="text" value="{{ old('username',$user->username ) }}" name="username"
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
                                                <input type="text" value="{{ old('user_fullname',$user->user_fullname) }}"
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
                                                    maxlength="10" value="{{ old('user_phone',$user->user_phone) }}" name="user_phone"
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
                                                <input type="email" value="{{ old('user_email',$user->user_email) }}" name="user_email"
                                                    class="form-control" placeholder="Enter User Email">
                                                @error('user_email')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>

{{-- <option value="{{ $shopping->id }}" {{$company->shopping_id == $shopping->id  ? 'selected' : ''}}>
    {{ $shopping->fantasyname}}
</option> --}}
                                            
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">User Type</h5>
                                            </div>
                                            <div class="card-body">

                                                <select class="form-select mb-3" name="isAdmin" required="required">
                                                    <option value="{{ $user->isAdmin }}"> {{ $user->isAdmin == '1' ? 'Admin' : 'User' }}</option>
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
                                                    <option value="{{ $user->user_faculty }}">Select User Faculty / Office</option>
                                                    <option value="1">Faculty of Engineering</option>
                                                    <option value="2">Faculty of Computer Science</option>
                                                    <option value="3">Faculty of Information Technology</option>
                                                    <option value="4">Faculty of Telecommunication Engineering</option>
                                                    <option value="5">Faculty of Architecture Engineering</option>
                                                    <option value="7">Faculty of Fine Arts and Design</option>
                                                    <option value="14">Faculty of Geoinformatics</option>
                                                    <option value="21">Faculty of Basic Sciences</option>
                                                    <option value="22">Faculty of Postgraduate Studies</option>
                                                    <option value="23">Business Administration</option>
                                                    <option value="01">CESD</option>
                                                    <option value="02">CTS</option>
                                                    <option value="04">IRDC</option>
                                                    <option value="05">Admission and Registration</option>
                                                    <option value="06">Marketing</option>
                                                    <option value="07">Academic Affairs</option>
                                                    <option value="08">Students Affairs</option>
                                                </select>
                                                @error('user_faculty')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="text-center">

                                                <button class="btn btn btn-success">Edit User</button>
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
