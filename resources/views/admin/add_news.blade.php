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

            <h1 class="h3 mb-3">Manage WebSite News</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Add Website News</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-12">

                                    <div class="card">

                                        <form action="add_news" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Title</h5>
                                            </div>

                                            <div class="card-body col-6 col-lg-6">
                                                <input type="text" value="{{ old('news_title') }}" name="news_title"
                                                    class="form-control" placeholder="Enter News Title">

                                                @error('news_title')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror

                                            </div>

                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Description</h5>
                                            </div>
                                            <div class="card-body col-12 col-lg-12">
                                                <textarea name="news_desc" class="form-control " id="markdown-editor" 
                                                    placeholder="Enter News Description" rows="3">{{ old('news_desc') }}</textarea>
                                                @error('news_desc')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>

                                          
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Date</h5>
                                            </div>
                                            <div class="card-body col-6 col-lg-6">
                                                <input type="date" 
                                                    value="{{ old('news_date') }}" name="news_date"
                                                    class="form-control" placeholder="Select Event Date">
                                                @error('news_date')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>


                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Image</h5>
                                            </div>
                                            <div class="card-body col-6 col-lg-6">
                                                <input type="file" name="news_imgs[]" multiple  class="form-control" placeholder="Select News Images">
                                                @error('news_imgs')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                           
                                            <div class="text-center">

                                                <button class="btn btn btn-success">Add News</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($news != false)

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">View Website News</h5>
                            </div>
                            <div class="card-body">

                                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Faculty</th>
                                            <th>By</th>
                                            <th>Current Status</th>
                                            <!-- <th>Status</th> -->
                                            <th>Edit</th>
                                            <th>DEL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($news as $new)
                                            <tr>
                                                <td>{{ $new->news_title }}</td>
                                                <td>{{ $new->news_date }}</td>
                                                <td>{{ $dept_name }}</td>
                                                <td>{{ $news_by}}</td>
                                                <td> 

                                                    @if ($new->news_status == '0')
                                                    Not Published
                                                    @endif
                                                    @if ($new->news_status == '1')
                                                    Published
                                                    @endif

                                                </td>
                                                {{--
                                                <!-- <td>
                                                   @if ($new->news_status == '0')
                                                   <a href="add_news/{{$new->id}}/status/1" class="btn btn-primary">Published</a>    
                                                   @endif
                                                   @if ($new->news_status == '1')
                                                   <a href="add_news/{{$new->id}}/status/0" class="btn btn-danger">Not</a>   
                                                   @endif

                                                </td> -->

                                                --}}
                                            
                                                <td><a href="edit_news/{{$new->id}}/edit" class="btn btn btn-info">Edit</a></td>
                                                <td><a href="add_news/{{$new->id}}/delete" class="btn btn btn-danger" onClick="return confirm('Are You Sure You Want to Delete this news ?')">Delete</a></td>
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
