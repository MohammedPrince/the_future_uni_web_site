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

    <h1 class="h3 mb-3">Edit Linkages</h1>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Link </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-6">

                            <div class="card">
<!--  -->
                                <form action="add_linkage" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Link Name</h5>
                                    </div>

                                    <div class="card-body">
                                        <input type="text" required = "required" value="{{ old('link_name',$link_data->link_name) }}" name="link_name"
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
                                            <option value="{{link_data->link_type}}">{{link_data->link_type}}</option>
                                            <option value="1">Local</option>
                                            <option value="2">International</option>
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
                                        <input type="date" value="{{ old('link_date') }}"
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
                                        <input type="file" value="{{ old('link_logo') }}" name="link_logo"
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




</div>
</main>




@endsection