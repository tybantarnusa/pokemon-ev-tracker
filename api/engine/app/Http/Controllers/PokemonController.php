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
        $pokemon->save();

        return response()->json(Pokemon::first());
    }

    public function updatePokemon($owner, $id, Request $request) {
        $pokemon = Pokemon::find($id);
        if ($request->input('image'))
            $pokemon->image = $request->input('image');
        if ($request->input('name'))
            $pokemon->name = $request->input('name');
        if ($request->input('nature'))
            $pokemon->nature = $request->input('nature');
        if ($request->input('hp'))
            $pokemon->hp = $request->input('hp');
        if ($request->input('atk'))
            $pokemon->atk = $request->input('atk');
        if ($request->input('spa'))
            $pokemon->spa = $request->input('spa');
        if ($request->input('def'))
            $pokemon->def = $request->input('def');
        if ($request->input('spd'))
            $pokemon->spd = $request->input('spd');
        if ($request->input('spe'))
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
