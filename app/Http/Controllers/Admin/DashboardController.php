<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){

        return view('admin.dashboard.index');
    }

    public function addProductForm(){
        return view('admin.dashboard.add_product_form');
    }

    public function productStore(StoreProductRequest $request){
        dd($request->all());
    }

}
