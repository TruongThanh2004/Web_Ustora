<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $product = Product::where('product_name', 'like', '%' . $req->key . '%')
            ->orderBy('created_at','DESC')
            ->paginate(8);
        return view('products.indexadmin')->with('product',$product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categori = Categori::all();
        $category = Category::all();
        return view('products.create',compact('categori','category'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('fileUpload')){
            $file = $request->fileUpload;
            // $ext = $request->fileUpload->extension();
            $file_name =$file->getClientoriginalName();
            $file->move(public_path('img'),$file_name);
            // dd($file_name);
        }
        $request->merge(['product_image'=>$file_name]);
        Product::create($request->all());
        return redirect()->route('products')->with('success','Thêm sản phẩm thành côngg!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit',compact('product'));
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
        if($request->has('fileUpload')){
            $file = $request->fileUpload;
            // $ext = $request->fileUpload->extension();
            $file_name =$file->getClientoriginalName();
            $file->move(public_path('img'),$file_name);
            // dd($file_name);
        }
       
        $product = Product::findOrFail($id);
        $request->merge(['product_image'=>$file_name]);
        $product->update($request->all());
        return redirect()->route('products')->with('success','Update thành cônggg');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products')->with('success','Xóa thành cônggg');
    }
}
