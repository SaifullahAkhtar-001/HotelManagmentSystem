<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function index(int $id)
    {
        $hotel = Hotel::with('term')->findOrFail($id);
        return view('dashboard.terms.index',compact('hotel'));
    }

    public function store(Request $request)
    {
         $attributes = $request->validate([
            'hotel_id' => 'required',
            'term' => 'required',
        ]);
        Term::create($attributes);
        return redirect()->back()->with('success','Term created successfully');
    }

    public function edit(int $id)
    {
        $term = Term::findOrFail($id);
        return view('dashboard.terms.edit',compact('term'));
    }

    public function update(Request $request, int $id)
    {
        $attributes = $request->validate([
            'term' => 'required',
        ]);
        $term = Term::with('hotel')->findOrFail($id);
        $term->update($attributes);

        return redirect()->route('admin.hotels.terms', $term->hotel->id )->with('success','Term updated successfully');
    }
    public function destroy(int $id)
    {
        Term::findOrFail($id)->delete();
        return redirect()->back()->with('success','Term deleted successfully');
    }
}
