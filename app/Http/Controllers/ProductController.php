<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use File;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataForm = $request->except('_token');
        $product = new Product;
        $this->validate($request, $product->rules, $product->messages);

        $imgNewName = null;
        if($request->hasFile('image')){
            $fileName = $request->file('image')->getClientOriginalName();
            $exploded = explode('.', $fileName);
            $ext = strtolower(end($exploded));
            $imgNewName = md5(time()) . '.' . $ext;
            $request['imgNewName'] = $imgNewName;
            $this->saveImage($request);
        } else {
            $imgNewName = 'no-image.png';
        }
        $dataForm['image'] = $imgNewName;


        $insert = Product::create($dataForm);
        if($insert)
            return redirect()->route('products.index');
        else
            return redirect()->route('products.create');
    }

    public function saveImage($request)
    {
        $file = $request->file('image');
        
        if($request->hasFile('image') && $file->isValid()) {
            $imgNewName = $request['imgNewName'];
            $file->move('products-images', $imgNewName);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $oldProduct = Product::find($id);
        $dataForm = $request->except('_token');
        $product = new Product;
        $this->validate($request, $product->rules, $product->messages);

        $imgNewName = $oldProduct->image;
        if($request->hasFile('image')){
            // dd($oldProduct->image);
            $fileName = $request->file('image')->getClientOriginalName();
            $exploded = explode('.', $fileName);
            $ext = strtolower(end($exploded));
            $imgNewName = md5(time()) . '.' . $ext;
            $request['imgNewName'] = $imgNewName;
            $this->saveImage($request);
            
            $fileName = "products-images/{$oldProduct->image}";
            File::delete($fileName);
        }
        $dataForm['image'] = $imgNewName;

        // dd($imgNewName);


        $update = $oldProduct->update($dataForm);
        if($update)
            return redirect()->route('products.index');
        else
            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $fileName = "products-images/{$product->getAttributes()['image']}";
        File::delete($fileName);
        Product::destroy($id);
        return back();
    }

    public function listProducts($admin)
    {
        $products = Product::paginate(3);
        $products->adminMode = $admin;
        return view('layouts\productsPagination', compact('products'));
    }
}
