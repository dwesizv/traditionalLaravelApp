@extends('product.base')

@section('basecontent')

    <form action="{{url('product')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">product name</label>
            <input value="{{old('name')}}" required type="text" class="form-control" id="name" name="name" placeholder="product name">
        </div>
        <div class="form-group">
            <label for="price">product price</label>
            <input value="{{old('price')}}" required type="number" step="0.001" class="form-control" id="price" name="price" placeholder="product price">
        </div>
        <button type="submit" class="btn btn-primary">add</button>
    </form>

@endsection