@extends('product.base')

@section('basecontent')

    <div class="form-group">
        product id #:
        {{$product->id}}
    </div>
    <div class="form-group">
        product name:
        {{$product->name}}
    </div>
    <div class="form-group">
        product price:
        {{$product->price}}
    </div>
    <div class="form-group">
        <a href="{{url()->previous()}}">back</a>
    </div>

@endsection