<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Show;
use Illuminate\Http\Request;
use App\Models\Representation;


class RepresentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $representations = Representation::all();

        // dd($representations);
        return view('representation.index', compact('representations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shows = Show::all();
        $rooms = Room::all();
        return view('representation.create', compact('shows','rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'when' => 'required',
            'show_id' => 'required',
            'room_id' => 'required',
        ]);

        $representation = new Representation();


        $representation->show_id = $request->show_id;
        $representation->room_id = $request->room_id;
        $representation->when = $request->when;

        if($representation->save()){
            return redirect()->route('representation.index')->with('success', 'La representation bien ajoutée!'); 
        }
        else{
            return redirect()->back()->with('danger', 'Impossible d\'ajouter la représentation');
        }
    
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
        //
    }
}
