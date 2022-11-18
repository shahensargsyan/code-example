<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryWithPostResource;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryController extends Controller
{
    /**
     * @return AnonymousResourceCollection|string
     */
    final public function index(): AnonymousResourceCollection|string
    {
        try {
            return CategoryResource::collection(Category::getMains());
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param string $slug
     * @return CategoryResource|string
     */
    final public function getBySlug(string $slug): CategoryResource|string
    {
        try {
            return CategoryResource::make(Category::getBySlug($slug));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    final public function getByType(Request $request)
    {
        try {
            return CategoryResource::collection(
                Category::getByType(
                    $request->input('type'),
                    $request->input('limit'),
                    $request->input('offset')
                ));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    final public function getShowIn(Request $request): AnonymousResourceCollection|string
    {
        try {
            return CategoryWithPostResource::collection(
                Category::getShowInForSports(
                    $request->input('type'),
                    $request->input('limit'),
                    $request->input('offset')
                ));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
