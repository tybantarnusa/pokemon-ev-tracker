<?php

namespace App\Http\Controllers;

use App\Pokemon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PokemonController extends Controller
{

    public function index($owner) {
        $pokemon = Pokemon::where('owner', $owner)->get();
        return response()->json($pokemon);
    }

    public function getPokemon($owner, $id) {
        $pokemon = Pokemon::find($id);
        return response()->json($pokemon);
    }

    public function createPokemon(Request $request) {
        $pokemon = new Pokemon;
        $pokemon->owner = $request->input('owner');
        $pokemon->image = $request->input('image');
        $pokemon->name = $request->input('name');
        $pokemon->nature = $request->input('nature');
        $pokemon->hp = $request->input('hp');
        $pokemon->atk = $request->input('atk');
        $pokemon->spa = $request->input('spa');
        $pokemon->def = $request->input('def');
        $pokemon->spd = $request->input('spd');
        $pokemon->spe = $request->input('spe');
        $pokemon->save();

        return response()->json($pokemon);
    }

    public function updatePokemon($owner, $id) {
        $pokemon = Pokemon::find($id);
        $pokemon->owner = $request->input('owner');
        $pokemon->image = $request->input('image');
        $pokemon->name = $request->input('name');
        $pokemon->nature = $request->input('nature');
        $pokemon->hp = $request->input('hp');
        $pokemon->atk = $request->input('atk');
        $pokemon->spa = $request->input('spa');
        $pokemon->def = $request->input('def');
        $pokemon->spd = $request->input('spd');
        $pokemon->spe = $request->input('spe');
        $pokemon->save();

        return response()->json($pokemon);
    }

    public function deletePokemon($owner, $id) {
        $pokemon = Pokemon::find($id);
        $pokemon->delete();

        return response()->json('Deleted');
    }

}
