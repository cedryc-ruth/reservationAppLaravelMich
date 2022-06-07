<?php

namespace App\Http\Controllers\API;

use App\Helpers\APIHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveShowRequest;
use App\Models\ShowApi;
use Illuminate\Http\Request;

class ShowApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin')->except('index', 'show','search');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows = ShowApi::all();
        $response = APIHelpers::createAPIResponce(false, 200, 'Liste des spectacles', $shows);
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveShowRequest $request)
    {
        $show = new ShowApi();
        $show->title = $request->title;
        $show->slug = $request->slug;
        $show->summary = $request->summary;
        $show->poster_url = $request->poster_url;
        $show->images = $request->images;
        $show->bookable = $request->bookable;
        $show->price = $request->price;
        $show->description = $request->description;
        $show->location_id = $request->location_id;

        $show_save = $show->save();

        if ($show_save) {
            $response =  APIHelpers::createAPIResponce(false, 200, 'Show added successfully', null);
            return response()->json($response, 200);
        } else {
            $response =  APIHelpers::createAPIResponce(true, 400, 'Show creation failed', null);
            return response()->json($response, 400);
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
        $show = ShowApi::findOrfail($id);
        $response =  APIHelpers::createAPIResponce(false, 200, '', $show);
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveShowRequest $request, $id)
    {
        $show = ShowApi::findOrfail($id);

        $show->title = $request->title;
        $show->slug = $request->slug;
        $show->summary = $request->summary;
        $show->poster_url = $request->poster_url;
        $show->images = $request->images;
        $show->bookable = $request->bookable;
        $show->price = $request->price;
        $show->description = $request->description;
        $show->location_id = $request->location_id;

        $show_update = $show->save();

        if ($show_update) {
            $response =  APIHelpers::createAPIResponce(false, 200, 'Product updated successfully', null);
            return response()->json($response, 200);
        } else {
            $response =  APIHelpers::createAPIResponce(true, 400, 'Product update failed', null);
            return response()->json($response, 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $show = ShowApi::findOrfail($id);
        $show_delete = $show->delete();

        if ($show_delete) {
            $response =  APIHelpers::createAPIResponce(false, 200, 'Product deleted successfully', null);
            return response()->json($response, 200);
        } else {
            $response =  APIHelpers::createAPIResponce(true, 400, 'Product delete failed', null);
            return response()->json($response, 400);
        }
    }

    /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        $shows = ShowApi::where('title', 'like', '%'.$title.'%')->get();
    

        if ($shows->isNotEmpty()) {
            $response =  APIHelpers::createAPIResponce(false, 200, 'Product found successfully', $shows);
            return response()->json($response, 200);
        } else {
            $response =  APIHelpers::createAPIResponce(true, 400, 'Product not found', null);
            return response()->json($response, 400);
        }
    }
}
