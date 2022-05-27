<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);  // POur que l'utilisateur ait accès à son espace personnel, il faut qu'il soit authentifié et son email vérifié
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() // Affichage de l'index de la page home du client authentifié
    {
        $languages = Language::all();
        $user = auth()->user();
        return view('home.index', compact('user', 'languages'));
    }

    public function updateUserInfo(UserRequest $request, User $user)
    {
        $request->validated();

        $user->name = $request->name;
        $user->email =$request->email;
    }

    public function changePasswordPost(Request $request)  // fonction pour changer le mot de passe 
    {

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // Si les deux mots de passe se ressemblent
            return redirect()->back()->with("error", "Le mot de passe saisi ne correspond pas à votre de passe actuel");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            // Si le nouveau mot de passe ressemblent à l'ancien mot de passe
            return redirect()->back()->with("error", "Le nouveau mot de passe ne peut pas être le même que votre mot de passe actuel");
        }

        // On vérifie si les données saisies respectées les règles définies

        $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ],[
            'current-password.required' => 'Veuillez saisir votre mot de passe actuel.',
            'new-password.required' => 'Veuillez saisir votre nouveau mot de passe.',
            'new-password.string' => 'Votre nouveau mot de passe doit être composé par des caractères alphanumériques.',
            'new-password.min' => 'Votre nouveau mot de passe doit être composé de 8 caractères au minimum.',
            'new-password.confirmed' => 'Veuillez confirmer votre mot de passe.'
        ]);

        // Changement du mot de passe

        $user = Auth::user();  // On récupère le user connecté
        $user->password = Hash::make($request->get('new-password')); // On remplace son mot de passé
        $user->save(); // On sauvegarde le user

        return redirect()->back()->with("success", "Votre mot de passe a éé changé avec succès!");  // On envoi
    }

    public function orders()   // Afficher des l'historique des commandes liées à l'utilisateur courant (authentifié)
    {
        $user = auth()->user();  // Récupération de l'utilisateur authentifié
        $orders = $user->orders;  // On récupère les commandes associées à ce user.
        return view('home.orders',compact('orders'));
    }
}
