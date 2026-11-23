@extends('errors.minimal')

@section('title', 'Page Not Found')
@section('code', '404')
@section('message', 'Page Not Found')
@section('arabic_title', 'الصفحة غير موجودة')
@section('description', 'Sorry, the page you are looking for does not exist or has been moved.')
@section('arabic', 'عذراً، الصفحة التي تبحث عنها غير موجودة أو تم نقلها.')

@section('actions')
    <a class="btn btn-primary" href="{{ url('/') }}">Home page</a>
    <a class="btn btn-outline" href="{{ url('News-and-Events') }}">News &amp; Events</a>
    <a class="btn btn-outline" href="{{ url('Undergraduate-Admission') }}">Admission</a>
@endsection
