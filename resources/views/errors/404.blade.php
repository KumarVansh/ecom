@extends('layouts.app')

@section('title')
    <title>{{config('app.name')}}-404</title>
@endsection

@section('main')

<div class="my-3 hero-section">
    <h1>Page Not Found</h1>
    <div class="items">
        <div class="content">
        <a href="/" class="me-3">Home</a>
        <a href="/about"><i class="fa fa-angle-right mt-1"></i><span class="ms-3">Page Not Found</span></a>
        </div>
    </div>
</div>

<div class="container-fluid wow fadeIn " data-wow-delay="0.3s">
    <div class="container text-center py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                <h1 class="display-1">404</h1>
                <h1 class="mb-4">Page Not Found</h1>
                <p class="mb-4">We're sorry,the page you have looked for does not exist in our website| Maybe go to our home page or try to use a serch?</p>
                <a class="btn btn-primary rounded-pill py-3 px-5" href="/">Go Back To Home</a>
            </div>
        </div>
    </div>
</div>
@endsection