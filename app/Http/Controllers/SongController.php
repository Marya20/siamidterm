<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Exception;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function show(Song $song) {
        return response()->json($song,200);
    }

    public function search(Request $request) {
        $request->validate(['key'=>'string|required']);

        $songs = Song::where('name','like',"%$request->key%")
            ->orWhere('writer','like',"%$request->key%")->get();

        return response()->json($songs, 200);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'string|required',
            'writer' => 'string|required',
            'release_date' => 'date|required',
            'singer' => 'string|required',
            'genre' => 'string|required',
         
            
            
        ]);

        try {
            $song = Song::create($request->all());
            return response()->json($song, 202);
        }catch(Exception $ex) {
            return response()->json([
                'message' => $ex->getMessage()
            ],500);
        }

    }

    public function update(Request $request, Song $song) {
        try {
            $song->update($request->all());
            return response()->json($song, 202);
        }catch(Exception $ex) {
            return response()->json(['message'=>$ex->getMessage()], 500);
        }
    }

    public function destroy(Song $song) {
        $song->delete();
        return response()->json(['message'=>'songs deleted.'],202);
    }

    public function index() {
        $songs = Song::orderBy('name')->get();
        return response()->json($songs, 200);
    }
}