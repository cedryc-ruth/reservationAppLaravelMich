<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Order;
use App\Models\OrderRepresentation;
use Illuminate\Http\Request;
use App\Models\RepresentationUser;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');  // On applique le middleware à toutes les routes faisant appel aux methodes de CheckoutController
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cart::count() <= 0) {
            return redirect()->route('spectacles');
        }

        return view('checkout.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $authed_user = auth()->user();
        $amount = Cart::total() * 100;
        $payment = $request->payment_method;

        if (!$payment) {
            return redirect()->route('checkout.index')->with('danger', 'Informations incorrectes. Impossible d\'effectuer le paiement!');
        } else {
            try {
                $authed_user->charge(
                    $amount,
                    $request->payment_method,
                    [
                        'currency' => 'eur',
                        'off_session' => true,
                        'description'=> 'Paiement de client',
                        'receipt_email' => $request->email,
                        'metadata' =>[
                            'owner' => $request->firstname.' '.$request->lastname,
                        ]
                    ]
                );

                // Si le paiement est un succès, on enregistre la nouvelle commande dans la table 'orders' lié au client

                $order = Order::create([
                    'user_id' => $authed_user->id,
                    'paiement_firstname' => $request->firstname,
                    'paiement_lastname' => $request->lastname,
                    'paiement_phone'=>$request->phone,
                    'paiement_email'=>$request->email,
                    'paiement_address'=>$request->address,
                    'paiement_city'=>$request->city,
                    'paiement_postalcode'=>$request->postalcode,
                    'discount'=> session()->get('coupon')['name'] ?? null,
                    'paiement_tax' => Cart::tax(),
                    'paiement_total'=> session()->has('coupon') ? round(Cart::total() - session()->get('coupon')['discount'], 2) : Cart::total() ,

                ]);

                // On enregistre les lignes de commande du panier dans la table Order_representation

                foreach (Cart::content() as $representation) {
                    // dd($representation);
                    OrderRepresentation::create([
                        'order_id' => $order->id,
                        'representation_id' => $representation->id,
                        'places' => $representation->qty
                    ]);
                }

                // On rediriger le client vers la vue checkout.success après le paiement

                return redirect()->route('checkout.success')->with('success', 'Le paiement a été accepté ');
            } catch (Exception $e) {
                throw $e;
            }
        }
    }

    public function success()
    {
        // Si aucune session 'success' donc un processus de commande n'existe pas, on rédirige vers la page index des spectacles

        if (!session()->has('success')) {
            return redirect()->route('show.index');
        }

        // On enregistre les lignes de commande du panier du client dans la table representation_user avant de detruire le panier

        foreach (Cart::content() as $representation) {
            RepresentationUser::create([
                'representation_id' => $representation->id,
                'user_id' => auth()->user()->id,
                'places' => $representation->qty
            ]);
        }

        
        $order = Order::latest()->first();  // La dernière commande du client authentifié

        Cart::destroy(); // Après avoir payer, on procéder à la destruction du panier.


        return view('checkout.success', compact('order'));
    }
}
