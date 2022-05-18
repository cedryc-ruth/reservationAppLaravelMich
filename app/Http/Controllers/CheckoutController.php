<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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
        // dd($request);
        $authed_user = auth()->user();
        $amount = Cart::total();
        $amount *= 100;
        $payment = $request->payment_method;

        if (!$payment) 
        {
            return redirect()->route('checkout.index')->with('danger', 'Informations incorrectes. Impossible d\'effecter le paiement!');
        }
        else 
        {
            try 
            {
                $charge = $authed_user->charge(
                    $amount,
                    $request->payment_method,
                    [
                        'currency' => 'eur',
                        'description'=> 'Paiement de client',
                        'receipt_email' => $authed_user->email,
                        'metadata' =>[
                            'owner' => $authed_user->name,
                        ]
                    ]
                );
                
                return redirect()->route('checkout.success')->with('success', 'Le paiement a été accepté ');
            } 
            catch (Exception $e) 
            {
                throw $e;
            }
        }
    }

    public function success()
    {
        if (!session()->has('success')) 
        {
            return redirect()->route('spectacles');
        }

        Cart::destroy();
        return view('checkout.success');
    }
}
