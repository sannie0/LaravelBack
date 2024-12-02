<?php

namespace App\Http\Controllers;

use App\Models\Category_Product;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json([Item::limit($request->perpage ?? 5) //добавление обработки страниц
        ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
            ->get()]);
        /*return response(Item::all());
        $items = Item::paginate($request->input('perpage', 5));
        return response()->json($items);-*/
    }

    public function total()//получение общего количества записей БД
    {
       return response()->json([Item::all()->count()]);
        //return response()->json(['total' => Item::count()]);
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
        return response(Item::find($id));
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
