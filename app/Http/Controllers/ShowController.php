<?php

namespace App\Http\Controllers;

use App\Models\Representation;
use Illuminate\Http\Request;
use App\Models\Show;
use DateTime;


class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = new DateTime(now());

        // Requête de jointure eloquent pour afficher uniquement des spectacles qui ne sont pas expiré.

        $shows = Show::join('representations', 'show_id', '=', 'shows.id')
                 ->where('when', '>=', $today->format('Y-m-d H:i:s'))
                //  ->where('bookable', '1')
                 ->distinct()->orderBy('when', 'asc')
                 ->paginate(3, ['shows.*']);

        // dd($shows);

        
        return view('show.index', compact('shows'));
    }

    public function nextIndex()
    {
        $today = new DateTime(now());

        $shows = Show::join('representations', 'show_id', '=', 'shows.id')
                 ->where('when', '>=', $today->format('Y-m-d H:i:s'))
                 ->where('bookable', '0')
                 ->distinct()->orderBy('when', 'asc')
                 ->paginate(3, ['shows.*']);

        return view('show.nextindex', compact('shows'));

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
        return view('show.show', compact('show', 'representation'));
    }

    public function search(Request $request)
    {
       
        //Requête eloquent de Recherche des produits

        $request->validate([
            'search' => 'required|min:2'
        ], [
            'search.required' => 'Veuillez saisir un mot pour effectuer la recherche',
            'search.min' =>'Le mot à recherche dans les titres des spectacles doit comporter au moins 2 caractères'
        ]);

        $q = request()->input('search');

       

        $today = new DateTime(now());

        $shows = Show::join('representations', 'show_id', '=', 'shows.id')
                 ->where('when', '>=', $today->format('Y-m-d H:i:s'))
                 ->where('title', 'like', "%$q%")   // Recherche sur le titre
                 ->distinct()->orderBy('when', 'asc')
                 ->paginate(3, ['shows.*']);

        return view('show.search', compact('shows'));
    }

    public function contact()
    {
        return view('show.contact');
    }
}
