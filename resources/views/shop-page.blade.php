@extends('layouts.app')

@section('title')
      <title>{{config('app.name')}}-{{$title}}</title>
@endsection

@section('main')
      @include('partials.hero')

@endsection

