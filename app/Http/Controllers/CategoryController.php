<?php

namespace App\Http\Controllers;

use App\Models\Categori;

use App\Models\Product;
use Database\Seeders\CategoriSeeder;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Categori::orderBy('id', 'DESC')->get();
        return view('products.category')->with('category', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('products.create_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $category = Categori::create([
            'name' => $request->input('name'),
        ]);
        return redirect()->route('products_category')->with('success', 'Thêm loại sản phẩm thành công');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categori = Categori::findOrFail($id);
        return view('products.show_category',compact('categori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categori = Categori::findOrFail($id);
        return view('products.edit_category',compact('categori'));
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
        $categori = Categori::findOrFail($id);
        $categori->update($request->all());
        return redirect()->route('products_category')->with('success', 'Thêm loại sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //mã sản phẩm
        $product = Product::pluck('product_type');
       
        $category = Categori::findOrFail($id);
       if($product->contains($category->id)){
        return redirect()->route('products_category')->with('success', 'Không thể xóa loại sản phẩm vì có sản phẩm ');
      
       }else{
        $category->delete();
        return redirect()->route('products_category')->with('success', 'Xóa loại sản phẩm thành cônggg');
       }
     
    }
}
