@extends('layouts.app')

@section('title')
    <title>{{ config('app.name') }} - {{ $title }}</title>
@endsection

@section('main')
    @include('partials.hero')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-3">
                @include('partials.admin-sidebar')
            </div>
            <div class="col-md-9">
                <h5 class="bg-secondary text-center p-2 text-center text-light">{{ $title }}
                    <a href="{{ route('admin-brand') }}" class="float-end text-light"><i
                            class="fa fa-backward text-light"></i>Back</a>
                </h5>
                <form action="{{ route('admin-update-brand', $data->id) }}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Name*</label>
                        <input type="text" name="name" placeholder="Full Name"
                            value="{{ old('name') ? old('name') : $data->name }}"
                            class="form-control border-3 border-secondary">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Pic</label>
                                <input type="file" name="pic" placeholder="Image"
                                    class="form-control border-3 border-secondary">
                                @error('pic')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Active</label>
                                <select name="active" class="form-select border-3 border-secondary">
                                    <option
                                        value="1"{{ (old('active') ? old('active') == '1' : $data->active == '1') ? 'selected' : '' }}>
                                        yes</option>
                                    <option
                                        value="0"{{ (old('active') ? old('active') == '0' : $data->active == '1') ? 'selected' : '' }}>
                                        No</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-secondary form-control">Submit</button>
                        </div>
                </form>
            </div>
        </div>
        </form>
    </div>
    </div>
    </div>
    </div>
@endsection
