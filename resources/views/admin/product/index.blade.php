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
                    <a href="{{ route('admin-create-product') }}"><i class="fa fa-plus text-light float-end"></i></a>
                </h5>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Maincategory</th>
                                <th>Subcategory</th>
                                <th>Brand</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Base Price</th>
                                <th>Discount</th>
                                <th>Final Price</th>
                                <th>Stock </th>
                                <th>Stock Quantity</th>
                                <th>Pic</th>
                                <th>Active</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->maincategory->name }}</td>
                                    <td>{{ $item->subcategory->name }}</td>
                                    <td>{{ $item->brand->name }}</td>
                                    <td>{{ $item->color }}</td>
                                    <td>{{ $item->size }}</td>
                                    <td>&#8377;{{ $item->baseprice }}</td>
                                    <td>{{ $item->discount }}% off</td>
                                    <td>&#8377;{{ $item->finalprice }}</td>
                                    <td class="{{ $item->active ? 'text-success' : 'text-danger' }}">
                                        {{ $item->stock ? 'Yes' : 'No' }}
                                    </td>
                                    <td>{{ $item->stockquantity }}</td>
                                    <td>
                                        <div class=".admin-product-pic">
                                            @foreach ($item->images as $pic)
                                                <a href="{{ $pic->pic() }}">
                                                    <img src="{{ $pic->pic() }}" alt="" height="50px"
                                                        weight="80px">
                                                </a>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="{{ $item->active ? 'text-success' : 'text-danger' }}">
                                        {{ $item->active ? 'Yes' : 'No' }}</td>
                                    <td><a href="{{ route('admin-edit-product', $item->id) }}" class="btn btn-secondary"><i
                                                class="fa fa-edit"></i></a></td>
                                    <td><a href="{{ route('admin-destroy-product', $item->id) }}" class="btn btn-danger"><i
                                                class="fa fa-trash"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
