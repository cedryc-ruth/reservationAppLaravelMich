<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArtistViaApiController extends Controller
{
    public function index()
    {
        $response = Http::get("https://api.theatredelaville-paris.com/people");
        $collection = null;

        if ($response->status() === 200) {
            $collection = $response->json("hydra:member");
        }

        return view('artist.api_artists', compact('collection'));
    }
}
