<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorityController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('products.authority', compact('user'));
    }

    public function author(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->has('admin')) {
            $user->usertype = 'admin';
        } elseif ($request->has('user')) {
            $user->usertype = 'user';
        }
        dd($request->has('admin'));



    }
    public function update(Request $request, $id)
    {
        
        $user = User::findOrFail($id);
        if ($request->has('admin')) {
            $user->usertype = 'admin';

        }
        if ($request->has('user')) {
            $user->usertype = 'user';
            
        }
        if($request->has('admin') && $request->has('user')){
            $user->usertype = 'user';
        }
        if($request->has('admin')==false && $request->has('user')==false){
            $user->usertype = 'user';
        }
        $user->save();
       
        return redirect()->back()->with('success', 'Trao quyền thành cônggg');
    }

    public function destroy($id)
    {
        


        $user = User::findOrFail($id);
         
        if($user->usertype === "user"){
          $user->delete();
          return redirect()->back()->with('success','Xóa user thành cônggg');
        }else{
            return redirect()->back()->with('success','Không thể xóa admin  ');
        }
      
    }

}