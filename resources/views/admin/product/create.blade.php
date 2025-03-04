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
                    <a href="{{ route('admin-product') }}" class="float-end text-light"><i
                            class="fa fa-backward text-light"></i>Back</a>
                </h5>
                <form action="{{ route('admin-store-product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Name*</label>
                        <input type="text" name="name" placeholder="Full Name"
                            class="form-control border-3 border-secondary" value="{{ old('name') }}">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-sm-6 mb-3">
                            <label>Maincategory*</label>
                            <select name="maincategory_id" class="form-select border-secondary border-3">
                                @foreach ($maincategories as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('maincategory_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <label>Subcategory*</label>
                            <select name="subcategory_id" class="form-select border-secondary border-3">
                                @foreach ($subcategories as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('subcategory_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <label>Brand*</label>
                            <select name="brand_id" class="form-select border-secondary border-3">
                                @foreach ($brands as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('brand_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <label>Stock*</label>
                            <select name="stock" class="form-select border-secondary border-3">
                                <option value="1" {{ old('stock') == '1' ? 'selected' : '' }}>yes</option>
                                <option value="0" {{ old('stock') == '0' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>color*</label>
                            <input type="text" name="color" class="form-control border-3 border-secondary"
                                placeholder="Product Color" value="{{ old('color') }}">
                            @error('color')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>size*</label>
                            <input type="text" name="size" class="form-control border-3 border-secondary"
                                placeholder="Product Size" value="{{ old('size') }}">
                            @error('size')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Base Price*</label>
                            <input type="number" name="basePrice" class="form-control border-3 border-secondary"
                                placeholder="Product Base Price" value="{{ old('basePrice') }}">
                            @error('basePrice')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Discount*</label>
                            <input type="number" name="discount" class="form-control border-3 border-secondary"
                                placeholder="Discount on Product in %" value="{{ old('discount') }}">
                            @error('discount')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <label>Description*</label>
                            <textarea name="discription" id="RichTextEditor" rows="5" style="border:3px solid gray">{{ old('discription') }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Stock Quantity*</label>
                            <input type="number" name="stockQuantity" value="{{ old('stockQuantity') }}"
                                placeholder="Stock Quantity" class="form-control border-3 border-secondary">
                            @error('stockQuantity')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Pic*</label>
                            <input type="file" name="pic[]" multiple class="form-control border-3 border-secondary">
                            @error('pic')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            @error('pic.*')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Active*</label>
                            <select name="active" class="form-select border-3 border-secondary">
                                <option value="1" {{ old('active') == '1' ? 'selected' : '' }}>yes</option>
                                <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>No</option>
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
