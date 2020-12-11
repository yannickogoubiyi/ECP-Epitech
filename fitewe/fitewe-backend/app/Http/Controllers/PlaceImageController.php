<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlaceImage;

class PlaceImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PlaceImage::all();
    }
    public function getImageByPlace(int $place)
    {
        return PlaceImage::where('place_id', 'LIKE', $place)->get();
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
    public function show(int $id)
    {
        $imageById = PlaceImage::where('id', 'LIKE', $id)->get();

        return $imageById;
    }
    public function showFirst() 
    {
        return PlaceImage::distinct('place_id')->get();
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
