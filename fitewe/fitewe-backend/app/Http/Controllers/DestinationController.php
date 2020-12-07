<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use DB;
use App\Http\Resources\Destination as ResourcesDestination;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // return ResourcesDestination::collection(Destination::with('places.placeImages', 'destinationImages')->get());
        return Destination::with('places.placeImages', 'destinationImages')->get();
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Destination::create($request->all())) {
            return response()->json( ['success' => 'Destination créée avec succès.'], 200);
        } else {
            return response()->json( ['error' => 'Création de la destination avortée']);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show(int $destination)
    {
        return Destination::where('id', 'LIKE', $destination)->with('places.placeImages', 'destinationImages')->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destination $destination)
    {
        if($destination->update($request->all())) {
            return response()->json( ['success' => 'Destination modifiée avec succès.'], 200);
        } else {
            return response()->json( ['error' => 'Modification de la destination avortée']);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        if($destination->delete()) {
            return response()->json([ 'success' => 'Destination supprimée avec succès.'], 200);
        } else {
            return response()->json( ['error' => 'Suppression de la destination avortée']);
        };
    }
}
