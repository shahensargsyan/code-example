<?php

namespace App\Http\Controllers;

use App\Http\Resources\GalleryResource;
use App\Http\Resources\GallerySingleResource;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GalleryController extends Controller
{
    final public function index(Request $request, int $category): AnonymousResourceCollection|string
    {
        try {
            return GalleryResource::collection(Gallery::getByCategory($category, $request->input('limit'), $request->input('offset')));
        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    final public function getBySlug(string $slug)
    {
        try {
            return GallerySingleResource::make(Gallery::getBySlug($slug));
        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
