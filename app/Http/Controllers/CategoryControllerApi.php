<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category_Product;


class CategoryControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json([Category_Product::limit($request->perpage ?? 5) //добавление обработки страниц
        ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
        ->get()]);
        //return response(Category_Product::all());
    }

    public function total()//получение общего количества записей БД
    {
        return response()->json([Category_Product::all()->count()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response(Category_Product::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
