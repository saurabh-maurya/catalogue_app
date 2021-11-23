@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload Product</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form name="myForm" action="/upload" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <input type="text" class="col-md-6 form-control" name="name" required>
                        </div>
                        <div class="form-group row">
                            <label for="mrp" class="col-md-4 col-form-label text-md-right">{{ __('MRP') }}</label>
                            <input type="number" class="col-md-6 form-control" name="mrp" required>
                        </div>
                        <div class="form-group row">
                            <label for="size" class="col-md-4 col-form-label text-md-right">{{ __('Size') }}</label>
                            <select name="size" class="col-md-6 form-control">
                                <option value=""></option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('Color') }}</label>
                            <input type="text" class="col-md-6 form-control" name="color" required>
                        </div>
                        <div class="form-group row">
                            <label for="dimension" class="col-md-4 col-form-label text-md-right">{{ __('Dimension' ) }}</label>
                            <input id="dimension" type="text" class="col-md-6 form-control" name="dimension"placeholder="Length(cms),Width(cms),Height(cms),Weight(gms)" required>
                        </div>
                        <div class="form-group row ">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                            <input type="file" name="image[]" multiple required>
                        </div>
                        <input type="submit" value="Upload" class="btn btn-success btn-lg text-md-right float-right"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
