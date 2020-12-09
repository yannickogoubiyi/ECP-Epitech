<?php

namespace App\Http\Controllers;

    use App\Models\Place;
    use App\Models\PlaceImage;
    use Illuminate\Support\Facades\DB;
    use App\Models\Destination;
    use Illuminate\Http\Request;
    use Session;
    use App\Http\Resources\Place as ResourcesPlace;

    class PlaceController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function getPlaces()
        {  
            return Place::with('placeImages', 'comments')->get();
        }

        public function getPlacesByTypes(int $type)
        {
            return Place::where('type_id', 'LIKE', $type)->with('placeImages', 'comments')->get();
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
        public function store(Request $request){
            // validate the data
            $this->validate($request, array(
                'dest_id'  => 'required',
                'place_name' => 'required',
                'place_address' => 'required',
                'place_location' => 'nullable',
                'type_id'  => 'required',

                'added_by'  => 'required',
                'likes_count'  => 'required',
                'dislikes_count'  => 'required',
                'place_id'  => 'required',


                'place_description' => 'required|max:255',
                'pics' => 'required'
            
        ));
    // store in the database
    $place = new Place;
    $pic = new PlaceImage;

    $place->place_name = $request->place_name;
    $place->place_address = $request->place_address;
    $place->dest_id = $request->dest_id;
    $place->place_location = $request->place_location;
    $place->type_id = $request->type_id;
    $place->place_description = $request->place_description;

    $place->added_by = $request->added_by;
    $place->likes_count = $request->likes_count;
    $place->dislikes_count = $request->dislikes_count;

    $pic->pics = $request->pics;
    $pic->place_id = $request->place_id;

    $place->save();
    $pic->save();
    Session::flash('success', 'The place was successfully added!');
    // return redirect()->route('place.show', $place->id);
     return new ResourcesPlace($place, $pic);
    // return response()->json(['success' => $place, $pic], 200);
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\Models\Place  $place
         * @return \Illuminate\Http\Response
         */
        public function show(int $place)
        {
            return Place::where('id', 'LIKE', $place)->with('placeImages', 'comments')->get();
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\Place  $place
         * @return \Illuminate\Http\Response
         */
        public function edit(Place $place)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\Place  $place
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request,Place $id)
        {

                $id->update($request->all());
                return response()->json(['success' => 'Place updated with success']);
            

        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Place  $place
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            Place::findOrFail($id)->delete();
        return response()->json(['success' => 'Place deleted with success']);
        }
    }
