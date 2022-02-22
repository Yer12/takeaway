<?php

namespace Tests\Unit;

use App\Http\Resources\ProductCategoriesResource;
use App\Models\ProductCategory;
use Tests\TestCase;

class ProductCategoriesResourceTest extends TestCase
{
    public function testCorrectDataIsReturnedInResponse(): void
    {
        $productCategory = ProductCategory::factory()->create();
        $resource        = (new ProductCategoriesResource($productCategory))->jsonSerialize();

        $this->assertEquals([
            'product_category_id'   => $productCategory->id,
            'product_category_name' => $productCategory->name,
        ], $resource);
    }
}
