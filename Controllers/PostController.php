<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;
use App\Http\Resources\{PostResource, PostSearchResource};
use App\Jobs\PostViewJob;
use App\Models\Post;
use Exception;

class PostController extends Controller
{
    /**
     * @param string $slug
     * @return PostResource|string
     */
    public function getBySlug(string $slug): PostResource|string
    {
        try {
            $post = Post::getBySlug($slug);
            PostViewJob::dispatch($post);

            return PostResource::make($post);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param Request $request
     * @return object|string
     */
    public function getByType(Request $request): object
    {
        try {
            $data =  Post::getByType(
                $request->input('type'),
                $request->input('category'),
                $request->input('limit'),
                $request->input('offset')
            );

            return response()->json([
                'data' => PostResource::collection($data),
                'count' => $data->total(),
            ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param Request $request
     * @param int $category
     * @return object
     */
    public function getNewsFeeds(Request $request, int $category): object|string
    {
        try {
            $data = Post::getNewsFeeds(
                $category,
                $request->input('limit'),
                $request->input('offset')
            );

            return response()->json([
                'data' => PostResource::collection($data),
                'count' => $data->total(),
            ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param int $category
     * @return AnonymousResourceCollection|string
     */
    public function getSliders(int $category): AnonymousResourceCollection|string
    {
        try {
            return PostResource::collection(Post::getSliders($category));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param Request $request
     * @param string $slug
     * @return JsonResponse|string
     */
    public function getRelated(Request $request, string $slug): object|string
    {
        try {
            $data = Post::getRelated(
                $slug,
                $request->input('limit'),
                $request->input('offset')
            );

            return response()->json([
                'data' => PostResource::collection($data),
                'count' => $data?$data->total():null,
            ]);

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param Request $request
     * @return AnonymousResourceCollection|string
     */
    public function search(Request $request): AnonymousResourceCollection|string
    {
        try {
            return PostSearchResource::collection(Post::getPosts($request->input('query')));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param Request $request
     * @return AnonymousResourceCollection|string
     */
    public function searchByDate(Request $request): AnonymousResourceCollection|string
    {
        try {
            return PostSearchResource::collection(Post::searchByDate($request->input('query')));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse|string
     */
    public function getByTag(Request $request): object|string
    {
        try {
            $data = Post::getByTag(
                $request->input('tag'),
                $request->input('limit'),
                $request->input('offset'),
                $request->input('category')
            );

            return response()->json([
                'data' => PostResource::collection($data),
                'count' => $data->total(),
            ]);

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
