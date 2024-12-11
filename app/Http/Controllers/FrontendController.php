<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function products(){
        $data['products'] = Product::with('variants')->orderBy('id', 'ASC')->paginate(3);
        return view('products', $data);
    }


    public function productSearch(Request $request){
        $search = $request->searchValue;

        $products = Product::where('name', 'LIKE', "%$search%")
            ->orWhere('sku', 'LIKE', "%$search%")
            ->get()
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'sku' => $product->sku,
                    'image' => $product->image,
                    'selling_price' => $product->selling_price,
                    'show_product_discount' => $product->show_product_discount, // Include accessor value
                    'show_product_discount_price' => $product->show_product_discount_price, // Include if required
                ];
            });

        return response()->json(['products' => $products]);
    }

    public function productCartView(Request $request)
    {
        $product = Product::with('variants')->findOrFail($request->product_id);
        $variants = $this->productVariants($product->variants);

        return view('product_cart_view', compact('product', 'variants'));
    }

    protected function productVariants($variants)
    {
        $allVariants = collect([]);
        foreach ($variants as $item) {
            $allVariants->push($item->variants);
        }

        $result = [];

        foreach ($allVariants as $item) {
            foreach ($item as $key => $value) {
                if (!isset($result[$key])) {
                    $result[$key] = [];
                }
                if (!in_array($value, $result[$key])) {
                    $result[$key][] = $value;
                }
            }
        }

        return $result;
    }

    public function findProductWithVariants(Request $request)
    {
        $record = ProductVariant::where('product_id', $request->id)
            ->whereJsonContains('variants', $request->variants)
            ->first();

        if ($record) {
            $record->show_product_variant_discount_price = $record->show_product_variant_discount_price;
            return response()->json($record);
        } else {
            return response()->json(['message' => 'Record not found']);
        }

    }

    public function productCartStore(Request $request)
    {
        $productVariant = ProductVariant::with('product')->where('product_id', $request->id)
            ->whereJsonContains('variants', $request->variants)
            ->first();

        if ($request->qty <= 0) {
            return response()->json(['message' => 'Product quantity must be greater than 0']);

        }if (!$productVariant) {
            return response()->json(['message' => 'Product variant not found']);
        }

        $data = [
            'variant_id' => $productVariant->id,
            'variant_name' => $productVariant->variant_name,
            'product_id' => $productVariant->product_id,
            'product_name' => optional($productVariant->product)->name,
            'product_image' => asset('assets/uploads/product/'.optional($productVariant->product)->image),
            'product_qty' => (int) $request->qty,
            'selling_price' => $productVariant->selling_price,
            'discount' => optional($productVariant->product)->discount,
            'tax' => optional($productVariant->product)->tax,
        ];

        return response()->json($data);

    }
}
