<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodCategoryResource;
use App\Models\FoodCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function foodCategory()
    {
        $categories = FoodCategory::with("product")->get() ;

        return FoodCategoryResource::collection($categories);
    }
}
