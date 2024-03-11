<?php

namespace App\Http\Controllers;

use App\Models\Category_Product;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 2;
        return view('items', ['items' => Item::paginate($perpage)->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('item_create_view', ['categories' => Category_Product::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:items|max:255',
            'category_id' => 'integer',
            'weight' => 'required|integer',
            'price' => 'required|integer'
        ]);
        $item = new Item($validated);
        $item->save();
        return redirect('/item');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('item_edit', ['item' => Item::all()->where('id', $id)->first(), 'categories'=>Category_Product::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:items|max:255',
            'category_id' => 'integer',
            'weight' => 'required|integer',
            'price' => 'required|integer'
        ]);
        $item = Item::all()->where('id', $id)->first();
        $item->name = $validated['name'];
        $item->category_id = $validated['category_id'];
        $item->weight = $validated['weight'];
        $item->price = $validated['price'];
        $item->save();
        return redirect('/item');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Gate::allows('destroy-item', Item::all()->where('id', $id)->first())){
            return redirect('/error')->with('message', 'У вас нет прав удалить товар номер ' .$id);
        }
        Item::destroy($id);
        return redirect('/item');
    }
}
