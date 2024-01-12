<?php

namespace App\Http\Controllers;

use App\Models\ImgGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImgGalleryController extends Controller
{
    public function destroy($id)
    {
        $image = ImgGallery::find($id);
        $imagePathRelativeToDisk = Str::after($image->url, '/storage');
        Storage::disk('public')->delete($imagePathRelativeToDisk);
        $image->delete();
        return redirect()->back()->with('success', 'Image deleted');
    }
}
