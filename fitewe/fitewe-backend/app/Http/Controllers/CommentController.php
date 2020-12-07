<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Resources\Comment as ResourcesComment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $index = Comment::with('places', 'users')->get();
        return ResourcesComment::collection($index = Comment::with('places', 'users')->get());

    }

    public function getCommentsByPlace(int $placeId)
    {

        return ResourcesComment::collection($index = Comment::where('comments.place_id', 'LIKE', $placeId)->with('places', 'users')->get());

    }

    public function getCommentsByUser(int $userId)
    {

        return ResourcesComment::collection($index = Comment::where('comments.user_id', 'LIKE', $userId)->with('places', 'users')->get());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // AJOUTER AUTHENTIFICATION
        if(Comment::create($request->all())) {
            return response()->json( ['success' => 'Commentaire ajouté avec succès.'], 200);
        } else {
            return response()->json( ['error' => 'Création du commentaire avortée']);
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
        // return Comment::where('id', 'LIKE', $id)->with('places', 'users')->get();
        return ResourcesComment::collection(Comment::where('id', 'LIKE', $id)->with('places', 'users')->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        // AJOUTER AUTHENTIFICATION
        if($comment->update($request->all())) {
            return response()->json( ['success' => 'Commentaire modifié avec succès.'], 200);
        } else {
            return response()->json( ['error' => 'Modification du commentaire avortée']);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        // AJOUTER AUTHENTIFICATION
        if($comment->delete()) {
            return response()->json([ 'success' => 'Commentaire supprimé avec succès.'], 200);
        } else {
            return response()->json( ['error' => 'Suppression du commentaire avortée']);
        };
    }
}
