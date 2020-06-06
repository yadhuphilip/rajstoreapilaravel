<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
class ApiController extends Controller
{


    public function getAllCategories() {
        $category = Category::get()->toJson(JSON_PRETTY_PRINT);
        return  response($category, 200);
    }
  
    public function createCategory(Request $request) {
        $category = new Category;
        if(Category::where('cat_id', $request->cat_id)->exists()){
            return response()->json(["message"=> "category already exists"],201);
        }
        $category->cat_name = $request->cat_name;
        $category->cat_id = $request->cat_id;
        $category->save();

        return response()->json([
            "message" => "category added"
        ], 201);

    }

    public function getCategory($cat_id) {
        if(Category::where('cat_id', $cat_id)->exists()){
            $category = Category::where('cat_id',$cat_id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($category,200);
        }
        else{
            return response()->json(["message"=> "category not found"],404);
        }
    }

    public function deleteCategory($cat_id) {
        if(Category::where('cat_id',$cat_id)->exists()){ 
            $category = Category::find($cat_id);
            $category->delete();
            return response()->json(["message"=> "category deleted"],202);
        }
        else{
            return response()->json(["message"=> "category not found"],404);
        }
    }


    //PRODUCTS

    public function createProduct(Request $request) {
        $product = new Product;
        if(Product::where('p_id', $request->p_id)->exists()){
            return response()->json(["message"=> "product already exists"],201);
        }
        else{
            if(Category::where('cat_id', $request->cat_id)->exists()){   
                $product->p_name = $request->p_name;
                $product->p_id = $request->p_id;
                $product->cat_id = $request->cat_id;
                $product->save();

                return response()->json([
                    "message" => "Product added"
                ], 201);
            }
            else{
                return response()->json(["message"=> "category does  not exists"],404);
            }
        }
    }

    public function getAllProducts() {
        $product = Product::get()->toJson(JSON_PRETTY_PRINT);
        return  response($product, 200);
    }
    public function getProduct($p_id) {
        if(Product::where('p_id', $p_id)->exists()){
            $product = Product::where('p_id',$p_id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($product,200);
        }
        else{
            return response()->json(["message"=> "product not found"],404);
        }
    }


    public function deleteProduct($p_id) {
        if(Product::where('p_id',$p_id)->exists()){ 
            $product = Product::find($p_id);
            $product->delete();
            return response()->json(["message"=> "Product deleted"],202);
        }
        else{
            return response()->json(["message"=> "product not found"],404);
        }
    }


}
