<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductPurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function productPurchase(Request $request)
    {
        DB::beginTransaction();
        try {
            $productIds = $request->input('product_id', []);
            $productVariants = $request->input('product_variant', []);
            $productQuantities = $request->input('product_quantity', []);
            $productPrices = $request->input('product_price', []);

            $purchaseDetails = collect($productIds)->map(function ($productId, $index) use ($productVariants, $productQuantities, $productPrices) {
                $product = Product::select('id', 'name')->find($productId);
                return $product ? [
                    'product_id' => $productId,
                    'product_name' => $product->name,
                    'product_variant' => $productVariants[$index] ?? null,
                    'product_quantity' => $productQuantities[$index] ?? 0,
                    'product_price' => $productPrices[$index] ?? 0,
                ] : null;
            })->filter()->values()->toArray();


          ProductPurchase::create([
                'user_id' => Auth::id(),
                'purchase_code' => Str::random(10),
                'sub_total' => $request->input('cart_sub_total', 0),
                'discount' => $request->input('cart_discount', 0),
                'tax' => $request->input('cart_tax', 0),
                'grand_total' => $request->input('cart_grand_total', 0),
                'purchase_details' => $purchaseDetails,
            ]);

            DB::commit();

            return redirect()->route('products')->with('success', 'Product Purchase Successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors([$e->getMessage()]);
        }
    }

}
