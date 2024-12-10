<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
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

    public function productList()
    {
        $data['products'] = Product::with('variants')
            ->selectRaw('id, name, sku, image, created_at, (SELECT COUNT(*) FROM product_variants WHERE product_variants.product_id = products.id) as total_variants')
            ->orderBy('id', 'ASC')
            ->paginate(2);

        return view('admin.dashboard.product_list', $data);
    }
}
