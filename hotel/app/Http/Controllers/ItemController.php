<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function getAttributes(Request $request)
    {
        return $request->validate([
            'name' => 'required',
            'category' => 'required',
            'quantity' => 'required',
            'unit_of_measurement' => 'required',
            'cost_per_unit' => 'required',
            'min_stock_level' => 'required',
            'location' => 'required',
            'date_of_purchase' => 'required',
            'expiry_date' => 'required',
            'notes' => 'required',
            'status' => 'required',
            'hotel_id' => 'required',
        ]);
    }

    public function updateQuantity(Request $request, $id)
    {
        $request->validate([
            'newQuantity' => 'required|integer|min:0',
        ]);

        Item::findOrFail($id)->update(['quantity' => $request->newQuantity]);


        return response()->json(['success' => true, 'message' => 'Quantity updated successfully']);
    }
    public function index()
    {
        $items = Item::paginate(30);
        return view('dashboard.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $this->getAttributes($request);

        Item::create($attributes);

        return redirect()->route('item.index')->with('success', 'Item created successfully.');
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
        $item = Item::findOrFail($id);
        return view('dashboard.items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $attributes = $this->getAttributes($request);

        Item::findOrFail($id)->update($attributes);

        return redirect()->route('item.index')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Item::findOrFail($id)->delete();
        return redirect()->route('item.index')->with('success', 'Item deleted successfully.');
    }
}
