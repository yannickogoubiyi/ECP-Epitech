<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuggestedPlace;
use App\Http\Resources\SuggestedPlace as ResourcesSuggestedPlace;

class SuggestedPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ResourcesSuggestedPlace::collection(SuggestedPlace::with('users', 'suggestedPlaceImages')->get());
    }

    public function getSuggestedPlacesByUser($user)
    {

        return ResourcesSuggestedPlace::collection(SuggestedPlace::where('suggested_places.user_id', 'LIKE', $user)->with('users', 'suggestedPlaceImages')->get());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //AJOUTER AUTHENTIFICATION
        if(SuggestedPlace::create($request->all())) {
            return response()->json( ['success' => 'Suggestion de lieu créée avec succès.'], 200);
        } else {
            return response()->json( ['error' => 'Création de la suggestion avortée']);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return SuggestedPlace::where('id', 'LIKE', $id)->with('users', 'suggestedPlaceImages')->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuggestedPlace $suggPlace)
    {
        if($suggPlace->update($request->all())) {
            return response()->json( ['success' => 'Destination modifiée avec succès.'], 200);
        } else {
            return response()->json( ['error' => 'Modification de la suggestion avortée']);
        };
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\SuggestedPlace  $destination
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuggestedPlace $suggPlace)
    {
        // AJOUTER AUTEHNTIFICATION
        if($suggPlace->delete()) {
            return response()->json([ 'success' => 'Suggestion de lieu supprimée avec succès.'], 200);
        } else {
            return response()->json( ['error' => 'Suppression de la suggestion avortée']);
        };
    }
}
