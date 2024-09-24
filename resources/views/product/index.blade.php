@extends('product.base')

@section('title', 'product list')

@section('basecontent')

    <table class="table table-striped table-hover" id="tablaProducto">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>price</th>
                @if(session('user'))
                    <th>delete</th>
                    <th>edit</th>
                @endif
                <th>view</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    @if(session('user'))
                        <td><a href="#" data-href="{{url('product/' . $product->id)}}" class = "borrar">delete</a></td>
                        <td><a href="{{url('product/' . $product->id . '/edit')}}">edit</a></td>
                    @endif
                    <td><a href="{{url('product/' . $product->id)}}">view</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        @if(session('user'))
            <a href="{{url('product/create')}}" class="btn btn-success">add product</a>
            <form id="formDelete" action="{{ url('') }}" method="post">
                @csrf
                @method('delete')
            </form>
        @endif
    </div>

@endsection

@section('scripts')
    <script src="{{url('assets/scripts/script.js')}}"></script>
@endsection