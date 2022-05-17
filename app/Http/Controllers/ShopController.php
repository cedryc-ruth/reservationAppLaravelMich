<?php

namespace App\Http\Controllers;

use App\Models\Representation;
use App\Models\Show;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = new DateTime(now());
        // dd($today->format('Y-m-d H:i:s'));
        // $representations = Representation::where('when','>=', $today->format('Y-m-d H:i:s'))->get();
        // dd($representations);
        // $shows = Show::with('representations')->paginate(3);

        $shows = Show::join('representations','show_id','=','shows.id')
                 ->where('when','>=', $today->format('Y-m-d H:i:s'))->distinct()->orderBy('when','asc')->paginate(3,['shows.*']);
        return view('spectacle', compact('shows'));
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
        //
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
        $representation = Representation::where('show_id',$show->id)->firstOrFail();
        // dd($representation);
        return view('product', compact('show','representation'));
    }

    public function showById($id)
    {
        $show = Show::where('id', $id)->firstOrFail();
        return view('product', compact('show'));
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

    public function contact()
    {
        return view('contact');
    }
}
