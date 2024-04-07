<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);


        return view('admin.product.list', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexWeb()
    {
        $products = Product::paginate(10);


        return view('web.product.list', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        return view('admin.product.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Product::$rules);

        $product = Product::create($request->all());

        return redirect()->route('admin.products.index', app()->getLocale())
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        
        return view('web.product.detail', [
            "product" => $product,
            "id" => $id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', [
            "product" => $product,
            "id" => $id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Product::$rules);

        $product = Product::findOrFail($id);
    
        $product->update($request->all());

        return redirect()->route('admin.products.index', app()->getLocale())
            ->with('success', 'Product updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('admin.products.index', app()->getLocale())
            ->with('success', 'Product deleted successfully');
    }
}
