<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Validator;

class SubCategoryController extends Controller
{
    public function index(){

         $Categories = Category::all();
        $SubCategories = SubCategory::join('categories','categories.id','=','sub_categories.category_id')
                ->select('sub_categories.category_id','categories.category')
                    ->groupBy('sub_categories.category_id','categories.category')
                    ->get();
            // ->get(['sub_categories.*','categories.category']);
            // print_r($SubCategories);

        return view('subcategory',[
            'SubCategories' => $SubCategories,
            'Categories' => $Categories,
        ]);
    } 
    
    function saveSubCategory(Request $req)
    {
        // return view('employee');
        $validator = Validator::make($req->all(),[
            "category_id" => 'required|max:191',
            "sub_category" => 'required|unique:sub_categories,sub_category,'.$req->input('sub_category'),
            'sub_category_img' => 'required|max:191'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages("plz fill all field required"),
            ]);
        }else{
            $model = new SubCategory;
            $model->category_id = $req->input('category_id');
            $model->sub_category = $req->input('sub_category');
            // $model->category_img = $req->input('category_img');
            
            // $model->category_name = strtolower($req->input('category_name'));
            // if ($req->hasFile('category_img')){
            //     if($req->input('category_id') > 0)
            //     {   
                    $subCategoryImage = public_path('storage/').$model->subcategory_img;
                    if(file_exists($subCategoryImage)){
                        @unlink($subCategoryImage); 
                    }
            //     }
                $model->sub_category_img = $req->file('sub_category_img')->store('image/subcategory'. $req->input('sub_category_img'),'public');            
            
           
            if($model->save()){
                return response()->json([   
                    'status'=>200,

                ]);
                // return redirect('category');
            }
        }
    }

    
    public function editSubCategory($sub_category_id)
    {
        $sub_category = SubCategory::find($sub_category_id);
        // print_r($sub_category);
        return response()->json([
            'status'=>200,
            'sub_category'=>$sub_category
        ]);
    }


    public function updateSubCategory(Request $req, $sub_category_id)
    {
        $validator = Validator::make($req->all(),[
            "category_id" => 'required|max:191',
            "sub_category" => 'required|max:191',
            // 'sub_category_img' => 'required|max:191',
            // 'category' => 'required|unique:categories,category,'.$category_id,
            // $item_name = 'required|unique:items,item_name,'.$item_id;

        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $model = SubCategory::find($sub_category_id);
            $model->category_id = $req->input('category_id');
            // $model->category_img = $req->input('category_img');
            
            $model->sub_category = $req->input('sub_category');
            if ($req->hasFile('sub_category_img')){
                if($req->input('sub_category') > 0)
                {   
                    $subCategoryImage = public_path('storage/').$model->sub_category_img;
                    if(file_exists($subCategoryImage)){
                        @unlink($subCategoryImage); 
                    }
                }

                $model->sub_category_img = $req->file('sub_category_img')->store('image/category'. $req->input('sub_category_img'),'public');
            
            }
            if($model->save()){
                return response()->json([
                    'status'=>200,
                ]);
            }
        }
    }

    public function deleteSubCategory($sub_category_id){
        {
            $delete_sub_category = SubCategory::find($sub_category_id);
            $delete_sub_category->delete();
            return response()->json([
                'status'=>200
            ]);
        }
    
    }

    public function getSubCategoryByCategory($category_id){

        $data = SubCategory::where(['category_id'=>$category_id])->get(['id' , 'category_id', 'sub_category']);

        $html = "";
        $html .= "<option selected disabled >Sub Category</option>";
        foreach($data as $list)
        {
            $html.= "<option value='" . $list->id . "'>" . $list->sub_category . "</option>";
        }
        return response()->json([
            'status'=> 200,
            'html'=> $html,
        ]);
    }

}



