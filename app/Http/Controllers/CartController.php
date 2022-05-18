<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;
use App\Models\Representation;
use Database\Seeders\ShowSeeder;
use Illuminate\Support\Facades\Session;
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
        

        // $duplicata = Cart::search(function ($cartItem, $rowId) use ($request) {
        //     $representation = Representation::findOrFail($request->representation_id);
        //     return $cartItem->id == $request->show_id && $representation->id == $request->representation_id;
        // });
      

        // if ($duplicata->isNotEmpty()) {
        //     return redirect()->route('cart.index')->with('danger', 'Le spectacle a déjà été ajouté à votre panier');
        // }

        // dd($request);

        $show = Show::findOrFail($request->show_id);

       
        Cart::add($show->id, $show->title, $request->qty, $show->price)->associate('App\Models\Show');

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


    public function reset()
    {
        Cart::destroy();
    }

}
