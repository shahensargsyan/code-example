<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuizResource;
use App\Models\Post;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Get data for show in quiz widget
     *
     * @param array $mainCategoryId
     * @param int $limit
     * @return mixed
     */
    public function index(Request $request, int $limit = Post::LIMIT_QUIZ)
    {
        return QuizResource::collection(Post::quiz()->notHaveParent()->haveCategories([$request->input('mainCategory')])->orderBy('id', 'desc')->limit($limit)->get());
    }
}
