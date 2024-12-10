<?php

namespace App\Traits;

use App\Models\ProductVariant;
use App\Models\Product;
use Intervention\Image\Facades\Image;

trait ProductStoreTrait
{
    /**
     * Handle storing a product.
     *
     * @param array $data
     * @param mixed $imageFile
     * @return Product
     */
    public function storeProduct($request)
    {

        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->unit_quantity = $request->unit_quantity ?? 0;
        $product->unit_value = $request->unit_value;
        $product->discount = $request->discount ?? 0;
        $product->tax = $request->tax ?? 0;

        if ($request->hasFile('image')) {
            $product->image = $this->uploadImage($request->image, 'assets/uploads/product/');
            if (!$product->image) throw new \Exception('Product Image could not been uploaded.');
        }

        $product->save();

        return $product;
    }

    public function variantsStore($request, $productId)
    {
        if (json_decode($request->variantsComObj) !== null) {
            foreach (json_decode($request->variantsComObj) as $item) {
                $productVariant = new ProductVariant();
                $productVariant->product_id = $productId;
                $productVariant->variant_name = $item->variant_name;
                $productVariant->variant_sku = $item->variants_sku;
                $productVariant->purchase_price = $item->purchase_price;
                $productVariant->selling_price = $item->selling_price;
                $productVariant->variants = $item->variants;
                $productVariant->save();
            }
        } else {
            throw new \Exception('Please provide product variants.');
        }
    }

    /**
     * Handle image upload.
     *
     * @param mixed $file
     * @return string
     */
    protected function uploadImage($file, $location)
    {
        $path = $this->makeDirectory($location);

        if (!$path) throw new \Exception('File could not been created.');

        $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();

        $image = Image::make($file);
        $image->save($location . '/' . $filename);

        return $filename;
    }

    public function makeDirectory($path)
    {
        if (file_exists($path)) return true;
        return mkdir($path, 0755, true);
    }
}
