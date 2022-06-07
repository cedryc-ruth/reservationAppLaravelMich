<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\ArtistType;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin')->except('index','show');  // On applique un middleware pour eviter qu'une personne mal intentionnée
        // puisse effectuer des opération de destroy & update à travers l'url
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists =  Artist::paginate(6);
        // dd($artists);
        return view('artist.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artist = Artist::where('id', $id)->firstOrfail();
        $artist_type = ArtistType::where('artist_id', $artist->id)->get();
        return view('artist.show', compact('artist', 'artist_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
