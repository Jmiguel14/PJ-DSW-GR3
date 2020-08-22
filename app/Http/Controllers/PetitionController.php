<?php

namespace App\Http\Controllers;

use App\Petition;
use Illuminate\Http\Request;

class PetitionController extends Controller
{
    public function index(){
        return Petition::all();
    }

    public function show(Petition $petition){
        return $petition;
    }

    public function store(Request $request){
        $petition = Petition::create($request->all());
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
