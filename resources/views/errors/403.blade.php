@extends('errors.minimal')

@php
    // Keep a specific reason given by the code (e.g. "Open this action from the admin panel.").
    $reason = isset($exception) ? trim((string) $exception->getMessage()) : '';
    $reason = in_array($reason, ['', 'Forbidden', 'Unauthorized', 'This action is unauthorized.'], true) ? '' : $reason;
@endphp

@section('title', 'Access Denied')
@section('code', '403')
@section('message', 'Access Denied')
@section('arabic_title', 'غير مسموح بالدخول')
@section('description', $reason !== '' ? $reason : 'You do not have permission to open this page.')
@section('arabic', 'ليس لديك صلاحية لفتح هذه الصفحة.')
