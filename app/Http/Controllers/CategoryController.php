<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::all();
        return response([
            "message" => "Category has been founded",
            "data" => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|unique:categories,category_name'
        ]);

        Category::create([
            'category_name' => $request->category_name
        ]);

        return response([
            "message" => "Category has been created",
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Category::find($id);

        return isset($data) ? response([
                "message" => "Category has been founded",
                "data" => $data
            ]) : response([
            "message" => "Category not founded",
            "data" => $data
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Category::find($id);

        if(isset($data)){
            $request->validate([
                'category_name' => 'required|string|unique:categories,category_name'
            ]);
            $data->category_name = $request->category_name;
            $data->save();
            return  response([
                "message" => "Category has been updated",
                "data" => $data
            ]);
        }

        return response([
            "message" => "Category has not founded",
            "data" => $data
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Category::find($id);

        if(isset($data)){
            $data->delete();
            return  response([
                "message" => "Category has been deleted",
                "data" => $data
            ]);
        }

        return response([
            "message" => "Category has not founded",
            "data" => $data
        ], 404);
    }
}
