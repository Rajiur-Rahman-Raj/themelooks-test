<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){

        return view('admin.dashboard.index');
    }

    public function addProductForm(){
        return view('admin.dashboard.add_product_form');
    }

}
