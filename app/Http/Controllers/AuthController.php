<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;


class AuthController extends Controller
{
    public function profile(){
        return view('layouts.profile_admin');
    }

     public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
        ]);
       
        return redirect()->route('products')->with('success','Update thành cônggg');
     }

  
}
