@extends('layouts.app')

@section('title')
      <title>{{config('app.name')}} - {{$title}}</title>
@endsection

@section('main')
      @include('partials.hero')
      <div class="container-fluid my-3">
            <div class="row">
                  <div class="col-md-3">
                        @include('partials.admin-sidebar')
                  </div>
                  <div class="col-md-9">
                        <h5 class="bg-secondary text-center p-2 text-center text-light">{{$title}}</h5>
                        @include('partials.profile') 
                  </div>
            </div>
      </div>
@endsection
