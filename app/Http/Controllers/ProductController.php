<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    function index() {
        return view('product.index', ['liproduct' => 'active',
                                        'products' => Product::orderBy('name')->get(),]);
    }

    function create() {
        return view('product.create', ['liproduct' => 'active']);
    }

    function store(Request $request) {
        $validated = $request->validate([
            'name'  => 'required|unique:product|max:100|min:2',
            'price' => 'required|numeric|gte:0|lte:100000',
        ]);
        $object = new Product($request->all());
        try {
            //$result = $object->save();
            $object = Product::create($request->all());
            return redirect('product')->with(['message' => 'The product has been created.']);
        } catch(\Exception $e) {
            //si no lo he guardado volver a la página anterior con sus datos para volver a rellenar el formulario y mensaje
            return back()->withInput()->withErrors(['message' => 'The product has not been created.']);
        }
    }

    function show(Product $product) {
        return view('product.show', ['liproduct' => 'active',
                                        'product' => $product,]);
    }

    function edit(Product $product) {
        return view('product.edit', ['liproduct' => 'active',
                                        'product' => $product,]);
    }

    function update(Request $request, Product $product) {
        $validated = $request->validate([
            'name'  => 'required|max:100|min:2|unique:product,name,' . $product->id,
            'price' => 'required|numeric|gte:0|lte:100000',
        ]);
        try {
            $result = $product->update($request->all());
            //$product->fill($request->all());
            //$result = $product->save();
            return redirect('product')->with(['message' => 'The product has been updated.']);
        } catch(\Exception $e) {
            return back()->withInput()->withErrors(['message' => 'The product has not been updated.']);
        }
    }

    function destroy(Product $product) {
        try {
            $product->delete();
            return redirect('product')->with(['message' => 'The product has been deleted.']);
        } catch(\Exception $e) {
             return back()->withErrors(['message' => 'The product has not been deleted.']);
        }
    }
}