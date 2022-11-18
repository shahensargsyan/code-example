<?php

namespace App\Http\Controllers;

use App\Enums\BannerPosition;
use App\Http\Resources\BannerPositionResource;
use App\Http\Resources\BannerResource;
use App\Models\Banner;

class BannerController extends Controller
{
    public function get()
    {
        try {
            return BannerResource::collection(Banner::all());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getTypes()
    {
        try {
            return BannerPositionResource::collection(BannerPosition::all());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getByPosition($position)
    {
        try {
            $banner = Banner::query()->where('position', $position)->first();
            if ($banner) {
                return BannerResource::make($banner);
            } else {
                return response()->json([
                    'error' => 'Not found!'
                ]);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
