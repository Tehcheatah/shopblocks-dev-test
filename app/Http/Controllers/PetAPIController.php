<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class PetAPIController extends Controller
{
    public function getAPIResponse(string $url, array $parameters)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'x-api-key' => env('API_CAT')
        ])->get($url, $parameters);

        return json_decode($response, false);
    }

    public function index()
    {
        if (Cache::has('allCatData')) {
            $catDataRows = Cache::get('allCatData');
        } else {
            $APIParams = ([
                'has_breeds' => true,
                'limit' => 25,
                'size' => 'thumb'
            ]);

            $catDataRows = $this->getAPIResponse('https://api.thecatapi.com/v1/images/search', $APIParams);

            Cache::put('allCatData', $catDataRows, 120);
        }

        return view('dashboard', compact('catDataRows'));
    }

    public function search(Request $request)
    {
        $searchTerm = strtolower($request->input('searchInput'));

        if (Cache::has('search-'.$searchTerm)) {
            $breedDataRows = Cache::get('search-'.$searchTerm);
        } else {
            $APIParams = ([
                'attach_image' => 1,
                'q' => $searchTerm
            ]);

            $breedDataRows = $this->getAPIResponse('https://api.thecatapi.com/v1/breeds/search', $APIParams);

            Cache::put('search-'.$searchTerm, $breedDataRows, 120);
        }

        return view('dashboard', compact('breedDataRows'));
    }

    public function specificBreed($breedID)
    {

        if (Cache::has('breed-'.$breedID)) {
            $breedData = Cache::get('breed-'.$breedID);
        } else {
            $APIParams = [];

            $breedData = $this->getAPIResponse('https://api.thecatapi.com/v1/breeds/'.$breedID, $APIParams);

            Cache::put('breed-'.$breedID, $breedData, 120);
        }

        return view('view-breed', compact('breedData'));
    }
}
