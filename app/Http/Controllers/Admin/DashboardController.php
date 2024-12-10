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

}
