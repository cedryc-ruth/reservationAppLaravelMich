<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Representation;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $representation  = Representation::findOrFail($request->representation_id);

        Cart::add($representation->id, $representation->show->title, $request->qty, $representation->show->price)
        ->associate('App\Models\Representation');

        return redirect()->route('cart.index')->with('success', 'La représentation du spectacle a été bien ajoutée à votre panier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return redirect()->back()->with('success','La représentation du spectacle a été enlevée de votre panier');
    }

}
