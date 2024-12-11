<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\ProductPurchase;
use App\Traits\ProductStoreTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
            ->paginate(3);

        return view('admin.dashboard.product_list', $data);
    }

    public function orderList(Request $request)
    {
        $search = $request->all();
        $fromDate = Carbon::parse($request->from_date);
        $toDate = Carbon::parse($request->to_date)->addDay();

        $data['orders'] = ProductPurchase::
            when(isset($search['purchase_code']), function ($query) use ($search) {
                return $query->where('purchase_code', 'LIKE', "%{$search['purchase_code']}%");
            })
            ->when(isset($search['from_date']), function ($q2) use ($fromDate) {
                return $q2->whereDate('created_at', '>=', $fromDate);
            })
            ->when(isset($search['to_date']), function ($q2) use ($fromDate, $toDate) {
                return $q2->whereBetween('created_at', [$fromDate, $toDate]);
            })
            ->paginate(3);
        return view('admin.order.list', $data);
    }

    public function orderDetails($orderId)
    {
        $data['orderDetails'] = ProductPurchase::select('id', 'purchase_details')->findOrFail($orderId);
        return view('admin.order.details', $data);
    }
}
