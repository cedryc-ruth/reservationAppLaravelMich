<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Show;
use Illuminate\Http\Request;
use App\Models\Representation;
use Illuminate\Support\Carbon;
use Symfony\Component\Console\Input\Input;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Requête de base qui affiche tous les spectacles sans filtre

        $today = new DateTime(now());
        $shows = Show::join('representations', 'show_id', '=', 'shows.id')
                 ->where('when', '>=', $today->format('Y-m-d H:i:s'));
              
        // Filtrage par prix croissant et décroissant sur la page index

        if (request()->sort == 'asc') {
            $shows = $shows->distinct()->orderBy('price', 'ASC')->paginate(3, ['shows.*']);
        } elseif (request()->sort == 'desc') {
            $shows = $shows->distinct()->orderBy('price', 'DESC')->paginate(3, ['shows.*']);
        } else {
            $shows = $shows->distinct()->orderBy('when', 'asc')->paginate(3, ['shows.*']);
        }
    
        
        return view('show.index', compact('shows'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // Affichage d'un spectacle grâce à son slug

        $show = Show::where('slug', $slug)->firstOrFail();
        $representation = Representation::where('show_id', $show->id)->firstOrFail();
        return view('show.show', compact('show', 'representation'));
    }

    public function search(Request $request)
    {
    
        //Recherche des produits sur titre

        $request->validate([   // Contrôle de règles de validation
            'search' => 'required|min:2'
        ], [
            'search.required' => 'Veuillez saisir un mot pour effectuer la recherche',
            'search.min' =>'Le mot à recherche dans les titres des spectacles doit comporter au moins 2 caractères'
        ]);

        $q = request()->input('search');

        $today = new DateTime(now());  // Récupération de la date du jour courant pour pouvoir filtrer les spectacles par à lui

        $shows = Show::join('representations', 'show_id', '=', 'shows.id')
                 ->where('when', '>=', $today->format('Y-m-d H:i:s'))
                 ->where('title', 'like', "%$q%")   // Requête where ... like sur le titre
                 ->distinct()
                 ->orderBy('when', 'asc')
                 ->paginate(3, ['shows.*']);
           

        return view('show.search', compact('shows'));
    }

    public function contact()
    {
        return view('show.contact');
    }

    public function searchByDate(Request $request)
    {

        // On récupère les dates du formulaire de recherche à travers l'objet Request
        $d1 = $request->date1;  // date du début
        $d2 = $request->date2;  // date de fin
    

        // On instancie 2 objets date Carbon pour leur assignent un format de date spécifique

        $startDate = Carbon::createFromFormat('Y-m-d', $d1);
        $endDate = Carbon::createFromFormat('Y-m-d', $d2);

        // $date1 = new DateTime($request->date1);
        // $date2 = new DateTime($request->date2);
        $today = new DateTime(now());  // On récupère la date du jour courant

        $shows = Show::join('representations', 'show_id', '=', 'shows.id')
                 ->where('when', '>=', $today->format('Y-m-d'))
                //  ->whereBetween('when', [$date1->format('Y-m-d H:i:s'),$date2->format('Y-m-d H:i:s')])
                ->whereDate('when', '>=', $startDate)
                ->whereDate('when', '<=', $endDate);


        $p1 = 0;
        $p2 = 0;
        // Si on applique une requête de recherche par intervalle de prix , on récupère les 2 prix saisis dans les input du formulaire

        if ($request->price1 && $request->price2) {
            $p1 = $request->price1;
            $p2 = $request->price2;
            $shows = $shows->whereBetween('price', [$p1, $p2]);  // On cherche les spectacles entre cet intervalle de prix
        }

        

        // Si on applique le filtre de recherche par prix croissant ou décroissant sur les résultats de recherche

        if (request()->sort == 'asc') {
            $shows = $shows->distinct()->orderBy('price', 'ASC')->paginate(3, ['shows.*']);
        } elseif (request()->sort == 'desc') {
            $shows = $shows->distinct()->orderBy('price', 'DESC')->paginate(3, ['shows.*']);
        } else {
            $shows = $shows->distinct()->orderBy('when', 'asc')->paginate(3, ['shows.*']);
        }

        return view('show.searchbydate', compact('shows', 'd1', 'd2', 'p1', 'p2'));
    }

    public function searchByPrice(Request $request)
    {
        // Requête de Base qui affiche tous les spectacles sans filtre

        $today = new DateTime(now());
        $shows = Show::join('representations', 'show_id', '=', 'shows.id')
                 ->where('when', '>=', $today->format('Y-m-d H:i:s'));
                

        // On effectue la recherche par intervalle de prix

        $p1 = 0;
        $p2 = 0;

        $d1 = new DateTime();
        $d2 = new DateTime();

        if ($request->price1 && $request->price2) {
            $p1 = $request->price1;
            $p2 = $request->price2;
            $shows = $shows->whereBetween('price', [$p1, $p2]);
        }

        // Si l'utilisateur applique le filtre par date

        if ($request->date1 && $request->date2) {
            $d1 = $request->date1;
            $d2 = $request->date2;

            $startDate = Carbon::createFromFormat('Y-m-d', $d1);
            $endDate = Carbon::createFromFormat('Y-m-d', $d2);
            
            $shows = $shows->whereDate('when', '>=', $startDate)
                           ->whereDate('when', '<=', $endDate);
        }
        // Tri par filtre des prix croissants ou décroissants

        if (request()->sort == 'asc') {
            $shows = $shows->distinct()->orderBy('price', 'ASC')->paginate(3, ['shows.*']);
        } elseif (request()->sort == 'desc') {
            $shows = $shows->distinct()->orderBy('price', 'DESC')->paginate(3, ['shows.*']);
        } else {
            $shows = $shows->distinct()->orderBy('when', 'asc')->paginate(3, ['shows.*']);
        }

    
        
        return view('show.searchbyprice', compact('shows', 'p1', 'p2', 'd1', 'd2'));
    }
}
