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
                            <h5 class="card-title mb-0">Edit Website News</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-12">

                                    <div class="card">

                                        <!-- <form action="edit_news/{{ $news->id }}" method="POST" enctype="multipart/form-data"> -->
                                        <form action="{{ route('editnews_submit',$news->id) }}" method="POST" enctype="multipart/form-data">

                                        
                                            @csrf
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Title</h5>
                                            </div>

                                            <div class="card-body col-6 col-lg-6">
                                                <input type="text" value="{{ old('news_title',$news->news_title) }}" name="news_title"
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
                                                <textarea name="news_desc" class="form-control" data-rich-editor
                                                    placeholder="Enter News Description">{{ old('news_desc', \App\Support\RichText::forEditor($news->news_desc)) }}</textarea>
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
                                                    value="{{ old('news_date',$news->news_date) }}" name="news_date"
                                                    class="form-control" placeholder="Select Event Date">
                                                @error('news_date')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>

                                            @include('admin.partials.faculty_order_fields', ['item' => $news])

                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Current Images</h5>
                                                <p class="text-muted mb-0">Tick "Remove" under an image to delete it when you save.</p>
                                            </div>
                                            <div class="card-body col-12">
                                                @include('admin.partials.current_images', ['folder' => 'news_imgs', 'images' => $news->news_imgs, 'removeName' => 'news_imgs_remove'])
                                            </div>

                                            @include('admin.partials.image_upload', ['name' => 'news_imgs', 'editing' => true])

                                            <div class="text-center">

                                                <button class="btn btn btn-success">Edit News</button>
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
