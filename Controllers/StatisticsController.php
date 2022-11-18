<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use JsonException;

class StatisticsController extends Controller
{
    public const GET_LEAGUE_URL = 'https://krosstats.betconstruct.com/api/hy/900/93f428d0-6591-48da-859d-b6c326db2448/League/GetLeagueTableByCompetitionId?';

    /**
     * @param Request $request
     * @return mixed
     * @throws GuzzleException
     * @throws JsonException
     */
    public function index(Request $request): mixed
    {
        $client = new Client();
        $cid = $request->input('cid');
        $stid = $request->input('stid');
        $cacheKayName = 'statistics.' . $cid . '.' . $stid;
        $url = self::GET_LEAGUE_URL . 'cId=' . $cid . '&stId=' . $stid . '&r=0';

        return Cache::remember($cacheKayName, 3600 * 2, static function () use ($client, $url) {
            return json_decode($client->request('GET', $url, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ]])->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR);
        });
    }
}
