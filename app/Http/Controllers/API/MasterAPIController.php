<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class MasterAPIController extends Controller
{
    //

    public function getCategory()
    {
        $categories = Category::all();
        return response()->json([
            'data'=>$categories,
        ]); 
    }

    public function getSubCategory($category_id)
    {
        $sub_categories = SubCategory::where(['category_id'=>$category_id])->get();
        return response()->json([
            'data'=>$sub_categories,
        ]); 
    }

    
}
