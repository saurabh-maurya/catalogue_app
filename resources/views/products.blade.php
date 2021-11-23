@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Product List</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table cellpadding="10">
                        <tr>
                            <th>NAME</th>
                            <th>MRP</th>
                            <th>SIZE</th>
                            <th>COLOR</th>
                            <th>DIMENSION</th>
                            <th>STATUS</th>
                        </tr>
                        @foreach($products as $product)
                            <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->mrp}}</td>
                            <td>{{$product->size}}</td>
                            <td>{{$product->color}}</td>
                            <td>{{$product->dimensions}}</td>
                            <td>{{$product->status == 1 ? "Approved" : "Rejected"}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
