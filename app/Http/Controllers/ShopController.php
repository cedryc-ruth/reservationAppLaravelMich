<?php

namespace App\Http\Controllers;

use App\Models\Representation;
use App\Models\Show;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = new DateTime(now());
        $shows = Show::join('representations', 'show_id', '=', 'shows.id')
                 ->where('when', '>=', $today->format('Y-m-d H:i:s'))
                 ->distinct()->orderBy('when', 'asc')
                 ->paginate(3, ['shows.*']);
        return view('spectacle', compact('shows'));
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
    public function show($slug)
    {
        $show = Show::where('slug', $slug)->firstOrFail();
        $representation = Representation::where('show_id', $show->id)->firstOrFail();
        return view('product', compact('show', 'representation'));
    }

    public function showById($id)
    {
        $show = Show::where('id', $id)->firstOrFail();
        $representation = Representation::where('show_id', $show->id)->firstOrFail();
        return view('product', compact('show', 'representation'));
    }


    public function search(Request $request)
    {
       
        //Requête eloquent de Recherche des produits

        $request->validate([
            'search' => 'required|min:2'
        ],[
            'search.required' => 'Veuillez saisir un mot pour effectuer la recherche',
            'search.min' =>'Le mot à recherche dans les titres des spectacles doit comporter au moins 2 caractères'
        ]);

        $q = request()->input('search');

        $today = new DateTime(now());
        $shows = Show::join('representations', 'show_id', '=', 'shows.id')
                 ->where('when', '>=', $today->format('Y-m-d H:i:s'))
                 ->where('title', 'like', "%$q%")
                //  ->orWhere('description', 'like', "%$q%")
                 ->distinct()->orderBy('when', 'asc')
                 ->paginate(3, ['shows.*']);

        return view('search', compact('shows'));
    }

    public function contact()
    {
        return view('contact');
    }
}
