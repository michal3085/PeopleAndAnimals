<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function addAnimal(Request $request, $id)
    {
        if (Animal::where('name', $request->name)->where('owner_id', $id)->count() > 0) {
            return redirect()->back()->with(['error' => 'animal_exist']);
        } else {

            $animal = new Animal();
            $animal->owner_id = $id;
            $animal->name = $request->name;
            $animal->genre = $request->genre;
            $animal->save();

            return redirect()->back()->with(['success' => 1]);
        }
    }

    public function editAnimal(Request $request, $id)
    {
        $animal = Animal::where('id', $id)->first();
        $animal->name = $request->name;
        $animal->genre = $request->genre;
        $animal->save();

        return redirect()->back();
    }

    public function deleteAnimal($id)
    {
        Animal::where('id', $id)->delete();
        return redirect()->back();
    }
}
