<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Traits\ProductStoreTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use ProductStoreTrait;

    public function addProductForm()
    {
        return view('admin.dashboard.add_product_form');
    }

    public function productStore(StoreProductRequest $request)
    {
        DB::beginTransaction();
        try {

            $product = $this->storeProduct($request);
            $this->variantsStore($request, $product->id);

            DB::commit();

            return back()->with('success', 'Product added successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
