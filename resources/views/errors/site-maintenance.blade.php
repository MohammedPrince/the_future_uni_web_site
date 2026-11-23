{{-- Shown to visitors while maintenance mode is on (Admin > Site Settings). --}}
@extends('errors.minimal')

@section('title', 'Back Soon')
@section('message', 'We will be back soon')
@section('arabic_title', 'نعود إليكم قريباً')
@section('description', $message)
{{-- No buttons: every link would lead back to this page. --}}
@section('hide_actions', 'yes')
