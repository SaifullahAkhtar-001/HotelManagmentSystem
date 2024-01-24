<?php

namespace App\Http\Controllers;

use App\Models\ImgGallery;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            'hotel_id' => 'required',
        ]);
    }

    private function storeImage(Request $request)
    {
        $image = $request->file('item_img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('images', $imageName, 'public');
        return Storage::url($path);
    }

    private function deleteImage($oldImagePath)
    {
        if ($oldImagePath) {
            $oldImagePathRelativeToDisk = Str::after($oldImagePath, '/storage');
            Storage::disk('public')->delete($oldImagePathRelativeToDisk);
        }
    }

    public function updateQuantity(Request $request, $id)
    {
        $request->validate([
            'newQuantity' => 'required|integer|min:0',
        ]);

        $item = Item::findOrFail($id);
        //set status
        if ($request->newQuantity < $item->min_stock_level && $request->newQuantity > 0 ) {
            $status = 'Low Stock';
        } elseif ($request->newQuantity == 0) {
            $status = 'Out of Stock';
        } else {
            $status = 'Available';
        }
        $item->update(['quantity' => $request->newQuantity, 'status' => $status]);


        return response()->json(['success' => true, 'message' => 'Quantity updated successfully']);
    }
    public function index(Request $request)
    {
        $items = Item::query();

        $category = null;
        if ($request->filled('category')) {
            $category = $request->input('category');
            $items->where('category', $category);
        }

        $filteredItems = $items->paginate(30);
        return view('dashboard.items.index', compact('filteredItems', 'category'));
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

        if ($request->quantity < $request->min_stock_level || $request->quantity > 0 ){
            $status = 'Low Stock';
        }elseif ($request->quantity == 0){
            $status = 'Out of Stock';}
        else{
            $status = 'Available';
        }

        $attributes['status'] = $status;

        $request->validate([
            'item_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $item = Item::create($attributes);

        $imageUrl = $this->storeImage($request);

        ImgGallery::create([
            'url' => $imageUrl,
            'imagable_id' => $item->id,
            'imagable_type' => Item::class
        ]);
        return redirect()->route('item.index')->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::findOrFail($id);
        return view('dashboard.items.show', compact('item'));
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

        $request->validate([
            'item_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $item = Item::findOrFail($id)->update($attributes);

        $oldImagePath = $item->imggallery->first()->url ?? null;

        if ($request->hasFile('item_img')) {
            $imageUrl = $this->storeImage($request);

            // Update the image in ImgGallery
            $item->imgGallery()->update(['url' => $imageUrl]);

            $this->deleteImage($oldImagePath);
        }

        return redirect()->route('item.index')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::findOrFail($id);
        $oldImagePath = $item->imggallery->first()->url ?? null;

        $this->deleteImage($oldImagePath);

        ImgGallery::where('imagable_id', $item->id)->where('imagable_type', Item::class)->delete();

        $item->delete();
        return redirect()->route('item.index')->with('success', 'Item deleted successfully.');
    }
}
