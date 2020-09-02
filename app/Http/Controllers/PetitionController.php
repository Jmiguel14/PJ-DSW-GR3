<?php

namespace App\Http\Controllers;

use App\Http\Resources\Petition as PetitionResource;
use App\Http\Resources\PetitionCollection;
use App\Petition;
use Illuminate\Http\Request;

class PetitionController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.'
    ];

    public function index(){
        return new PetitionCollection(Petition::paginate(10));
    }

    public function show(Petition $petition){
        return response()->json(new PetitionResource($petition), 200);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'status' => 'required',
        ], self::$messages);
        $petition = Petition::create($validatedData);
        return response()->json($petition, 201);
    }

    public function update(Request $request, Petition $petition){
        $petition->update($request->all());
        return response()->json($petition, 200);
    }

    public function delete(Request $request, Petition $petition){
        $petition->delete();
        return response()->json(null, 204);
    }
}
