<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesListController extends Controller
{
    public function index(){
        return view('favorites-list');
    }

}
