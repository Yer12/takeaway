<?php

namespace Tests\Unit;

use App\Http\Resources\ProductsResource;
use App\Models\Product;
use Tests\TestCase;

class ProductsResourceTest extends TestCase
{
    public function testCorrectDataIsReturnedInResponse(): void
    {
        $product  = Product::factory()->create();
        $resource = (new ProductsResource($product))->jsonSerialize();

        $this->assertEquals([
            'product_id'   => $product->id,
            'product_name' => $product->name,
            'price'        => $product->price,
            'description'  => $product->description,
            'image'        => $product->image,
        ], $resource);
    }
}
