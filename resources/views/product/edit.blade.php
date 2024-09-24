@extends('product.base')

@section('basecontent')

    <form action="{{url('product/' . $product->id)}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">product name</label>
            <input value="{{old('name', $product->name)}}" required type="text" class="form-control" id="name" name="name" placeholder="product name">
        </div>
        <div class="form-group">
            <label for="price">product price</label>
            <input value="{{old('price', $product->price)}}" required type="number" step="0.001" class="form-control" id="price" name="price" placeholder="product price">
        </div>
        <button type="submit" class="btn btn-primary">edit</button>
    </form>

@endsection