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

            <h1 class="h3 mb-3">Manage Linkages</h1>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Add Link </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-6">

                                    <div class="card">

                                        <form action="add_linkage" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Link Name</h5>
                                            </div>

                                            <div class="card-body">
                                                <input type="text" required = "required" value="{{ old('link_name') }}" name="link_name"
                                                    class="form-control" placeholder="Enter link name">

                                                @error('link_name')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror

                                            </div>


                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Link Type</h5>
                                            </div>
                                             <div class="card-body">
                                                <select class="form-select mb-3"  name="link_type" required="required">
                                                    <option value="">Select Link Type</option>
                                                    <option value="Local">Local</option>
                                                    <option value="International">International</option>
                                                </select>
                                                @error('link_type')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Link Date</h5>
                                            </div>
                                            <div class="card-body">
                                                <input  type="date" value="{{ old('link_date') }}"
                                                    name="link_date" class="form-control"
                                                    placeholder="Link Date">
                                                @error('link_date')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Link Duration</h5>
                                            </div>
                                            <div class="card-body">
                                                <input type="text" value="{{ old('link_duration') }}" name="link_duration"
                                                    class="form-control" placeholder="Enter Link Duration">
                                                @error('link_duration')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Link Url</h5>
                                            </div>
                                            <div class="card-body">
                                                <input type="url" required = "required" value="{{ old('link_url') }}" name="link_url"
                                                    class="form-control" title="Include http:// or https://" placeholder="https://example.com" pattern="https?://.+">
                                                @error('link_url')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>

                                            
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Link Discription</h5>
                                            </div>
                                            <div class="card-body">
                                                <textarea type="text" value="{{ old('link_desc') }}" name="link_desc"
                                                    class="form-control" placeholder="Enter Link Description"></textarea>
                                                @error('link_desc')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                            

                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Link Logo</h5>
                                            </div>
                                            <div class="card-body">
                                                <input type="file" value="{{ old('link_logo',) }}" name="link_logo"
                                                    class="form-control" placeholder="Enter Logo">
                                                @error('link_logo')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>


                                            <div class="text-center">

                                                <button class="btn btn btn-success">Add Link</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@if(isset($linkage_data))  
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">View Links </h5>
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
                                  @foreach($linkage_data as $link_data)
                                            <tr>
                                                <td>{{ $link_data->link_name }}</td>
                                                <td>{{ $link_data->link_date }} </td>
                                                <td>{{ $link_data->link_duration }}  </td>
                                                <td>{{ $link_data->link_url }} </td>
                                                <td>{{ $link_data->link_desc }}  </td>
                                                <td>
                                                {{ $link_data->link_type == '1' ? 'Local' : 'International' }}
                                                </td>
 
                                                <td><a href="edit_linkage/{{$link_data->link_id}}/edit" class="btn btn btn-info">Edit</a></td>
                                                <td><a href="linkage/{{$link_data->link_id}}/delete" class="btn btn btn-danger" onClick="return confirm('Are You Sure You Want to Delete this Link ?')">Delete</a></td>
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