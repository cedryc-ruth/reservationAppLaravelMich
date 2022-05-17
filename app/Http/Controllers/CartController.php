<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;
use Database\Seeders\ShowSeeder;
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
        $shows =  Show::all();
        return view('cart', compact('shows'));
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
        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id == $request->show_id;
        });
      

        if ($duplicata->isNotEmpty()) {
            return redirect()->route('cart.index')->with('danger', 'Le spectacle a déjà été ajouté à votre panier');
        }

        $show = Show::findOrFail($request->show_id);
        Cart::add($show->id, $show->title, 1, $show->price)->associate('App\Models\Show');

        return redirect()->route('cart.index')->with('success', 'Le spectacles a été bien ajouté à votre panier');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        Cart::remove($id);
        return redirect()->back()->with('success','Le spectacle a été enlevé de votre panier');
    }

    public function save($id)
    {
        // Récupérer l'élément à sauvegarder du panier

        $item = Cart::get($id);

        // On supprime l'élément à sauvegarder du panier

        Cart::remove($id);

        // Ajouter l'item à une nouvelle instance 'save' de cart

        Cart::instance('save')->add($item->id, $item->name,1,$item->price)->associate('App\Models\Show');

        return redirect()->route("cart.index")->with('success','Produit sauvegardé pour plus tard');

    }

    public function reset()
    {
        Cart::destroy();
    }

}
