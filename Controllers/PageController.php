<?php

namespace App\Http\Controllers;

use App\Http\Resources\PageListResource;
use App\Http\Resources\PageResource;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getPages()
    {
        try {
            return PageListResource::collection(Page::all());
        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getBySlug($slug)
    {
        try {
            return PageResource::make(Page::query()->where('slug', $slug)->first());
        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
