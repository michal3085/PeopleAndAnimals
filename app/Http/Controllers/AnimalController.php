<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function addAnimal(Request $request, $id)
    {
        if ($request->name == NULL){
            return redirect()->route('show.people', ['error' => 2, 'id' => $id]);
        }
        if (Animal::animalExist($id, $request->name)) {
            return redirect()->route('show.people', ['error' => 1, 'id' => $id]);
        } else {

            $animal = new Animal();
            $animal->owner_id = $id;
            $animal->name = $request->name;
            $animal->genre = $request->genre;
            $animal->save();

            return redirect()->route('show.people', ['success' => 1, 'id' => $id]);
        }
    }

    public function editAnimal(Request $request, $id)
    {
        $animal = Animal::where('id', $id)->first();

        if ($request->name == NULL){
            return redirect()->route('show.people', ['error' => 2, 'id' => $animal->owner_id]);
        }
        if (Animal::animalExist($animal->owner_id, $request->name) && $request->genre == NULL) {
            return redirect()->route('show.people', ['error' => 1, 'id' => $animal->owner_id]);
        } else {
            $animal->name = $request->name;
            $animal->genre = $request->genre;
            $animal->save();

            return redirect()->route('show.people', ['success' => 2, 'id' => $animal->owner_id]);
        }
    }

    public function deleteAnimal($id)
    {
        Animal::where('id', $id)->delete();
        return redirect()->back();
    }
}
