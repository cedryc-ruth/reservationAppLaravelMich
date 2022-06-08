<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Show;
use App\Exports\ShowExport;
use App\Imports\ShowImport;
use Illuminate\Http\Request;
use App\Models\Representation;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;


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

        // dd(request()->reservable);

        if (request()->reservable == '1') {
            $shows = $shows->where('bookable', '=', 1);
        } elseif (request()->reservable == '0') {
            $shows = $shows->where('bookable', '=', 0);
        }
              
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
    
        //Recherche de spectacles par titre

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

    public function searchByDate(Request $request)
    {

        // On récupère les dates du formulaire de recherche à travers l'objet Request (de type string)

        $d1 = $request->date1;  // date du début
        $d2 = $request->date2;  // date de fin
    

        // On instancie 2 objets DateTime qui encapsule les dates récuperées dans l'objet Request pour pouvoir les utiliser dans la requête eloquent

        $date1 = new DateTime($request->date1);
        $date2 = new DateTime($request->date2);
        $today = new DateTime(now());  // On récupère la date du jour courant

        $shows = Show::join('representations', 'show_id', '=', 'shows.id')
                 ->where('when', '>=', $today->format('Y-m-d'))
                //  ->whereBetween('when', [$date1->format('Y-m-d H:i:s'),$date2->format('Y-m-d H:i:s')])
                ->whereDate('when', '>=', $date1->format('Y-m-d'))
                ->whereDate('when', '<=', $date2->format('Y-m-d'));

        
        //Si on applique le filtre de réservation sous le critère "bookable"
        
        if (request()->reservable == '1') {
            $shows = $shows->where('bookable', '=', 1);
        }
        
        if (request()->reservable == '0') {
            $shows = $shows->where('bookable', '=', 0);
        }


        // Si on applique le filtre de recherche par prix croissant ou décroissant sur les résultats de recherche

        if (request()->sort == 'asc') {
            $shows = $shows->distinct()->orderBy('price', 'ASC')->paginate(3, ['shows.*']);
        } elseif (request()->sort == 'desc') {
            $shows = $shows->distinct()->orderBy('price', 'DESC')->paginate(3, ['shows.*']);
        } else {
            $shows = $shows->distinct()->orderBy('when', 'asc')->paginate(3, ['shows.*']);
        }

        return view('show.searchbydate', compact('shows', 'd1', 'd2')); // On passe les dates en string pour pouvoir
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

        if ($request->price1 && $request->price2) {
            $p1 = $request->price1;
            $p2 = $request->price2;
            $shows = $shows->whereBetween('price', [$p1, $p2]);
        }


        //Si on applique le filtre de réservation sous le critère "bookable"
        
        if (request()->reservable == '1') {
            $shows = $shows->where('bookable', '=', 1);
        }
        
        if (request()->reservable == '0') {
            $shows = $shows->where('bookable', '=', 0);
        }


        // Tri par filtre des prix croissants ou décroissants

        if (request()->sort == 'asc') {
            $shows = $shows->distinct()->orderBy('price', 'ASC')->paginate(3, ['shows.*']);
        } elseif (request()->sort == 'desc') {
            $shows = $shows->distinct()->orderBy('price', 'DESC')->paginate(3, ['shows.*']);
        } else {
            $shows = $shows->distinct()->orderBy('when', 'asc')->paginate(3, ['shows.*']);
        }
        
        return view('show.searchbyprice', compact('shows', 'p1', 'p2'));
    }


    /**
     * Deux fonctions qui exportent les shows aux formats Excel & CSV
     */

    public function exportIntoExcel()
    {
        return Excel::download(new ShowExport, 'showlist.xlsx');
    }

    public function exportIntoCSV()
    {
        return Excel::download(new ShowExport, 'showlist.csv');
    }

    /**
     * Fonctions pour exporter les shows en fichier PDF
     */

    // public function getAllShow()  // On crée une fonction qui encapsule des données dans une vue qui va se transformer en fichier PDF
    // {
    //     $shows = Show::all();
    //     return view('show.allshows',compact('shows'));
    // }

    public function downloadPDF()
    {
        $shows = Show::all();
        $pdf = Pdf::loadView('show.allshows', compact('shows'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('showlist.pdf');
    }

    // Fonction pour afficher le formulaire d'importation du fichier CSV ou Excel

    public function importForm()
    {
        return view('show.import-form');
    }

    // Fonction pour importer le fichier CSV ou Excel

    public function import(Request $request)
    {
        $request->validate([   // Contrôle de règles de validation
            'file' => 'required|file|max:1024'
        ], [
            'file.required' => 'Aucun fichier chargé!',
            'file.file' =>'Vous devez charger un fichier!',
            'file.max' => 'Votre fichier dépasse 1024 MB',
            // 'file.mimes' => 'Votre fichier doit être de type csv,xlsx,xls'
        ]);

        $import = Excel::import(new ShowImport, $request->file);

        if (!$import) {  // Si l'import échoue
            return redirect()->back()->with('danger', 'L\'importation a échoué');
        }
        return redirect()->back()->with('success', 'L\'importation s\'est bien déroulée'); // Si import est un succès
    }

    public function getApi()  // Retourne une page où l'on explique le fonctionnement de notre api
    {
        return view('show.api');
    }

    public function contact()
    {
        return view('show.contact');
    }
}
