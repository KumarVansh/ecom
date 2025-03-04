@extends('layouts.app')

@section('title')
      <title>{{config('app.name')}}-{{$title}}</title>
@endsection

@section('main')
      @include('partials.hero')
      @include('partials.brands')
      @include('partials.about')
      @include('partials.features')
      @include('partials.testimonials')

@endsection

