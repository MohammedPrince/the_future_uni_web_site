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
                                                <textarea name="news_desc" class="form-control " data-rich-editor 
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


                                            @include('admin.partials.faculty_order_fields', ['item' => null])

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
                                           
                                            <div class="card-body">
                                                <input type="hidden" name="publish" value="0">
                                                <label class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="publish" value="1" {{ old('publish', '1') === '1' ? 'checked' : '' }}>
                                                    <span class="form-check-label">Publish now (untick to save it hidden and publish it later)</span>
                                                </label>
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

            @if ($news->isNotEmpty())

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">View Website News</h5>
                                <p class="text-muted mb-0">Hidden items stay here but are not shown on the website. Press Publish to show them.</p>
                            </div>
                            <div class="card-body">

                                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Faculty</th>
                                            <th>By</th>
                                            <th>Home Order</th>
                                            <th>Current Status</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>DEL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($news as $new)
                                            <tr>
                                                <td>{{ $new->news_title }}</td>
                                                <td>{{ $new->news_date }}</td>
                                                <td>{{ \App\Models\MainApp::getFacultiesAndOffices($new->faculty_id) }}</td>
                                                <td>{{ optional($new->users)->user_fullname }}</td>
                                                <td>{{ $new->home_order ?: '-' }}</td>
                                                <td>
                                                    @if ($new->news_status == '1')
                                                        <span class="badge bg-success">Published</span>
                                                    @else
                                                        <span class="badge bg-secondary">Hidden</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($new->news_status == '1')
                                                        <a href="{{ url('add_news/' . $new->id . '/status/0') }}" class="btn btn-danger">Hide</a>
                                                    @else
                                                        <a href="{{ url('add_news/' . $new->id . '/status/1') }}" class="btn btn-primary">Publish</a>
                                                    @endif
                                                </td>
                                                <td><a href="{{ url('edit_news/' . $new->id . '/edit') }}" class="btn btn btn-info">Edit</a></td>
                                                <td><a href="{{ url('add_news/' . $new->id . '/delete') }}" class="btn btn btn-danger" onClick="return confirm('Are You Sure You Want to Delete this news ?')">Delete</a></td>
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
