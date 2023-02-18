<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index()
    {
        $peoples = People::all();
        return view('home')->with(['peoples' => $peoples]);
    }

    public function showPeople($id)
    {
        $animals = Animal::where('owner_id', $id)->get();
        $user = People::where('id', $id)->first();

        return view('people_profile')->with([
            'animals' => $animals,
            'user' => $user
        ]);
    }

    /*
     * Returns new people add view.
     */
    public function newPeople()
    {
        return view('new_people');
    }

    /*
     * Save data from new.people view to database.
     */
    public function addNewPeople(Request $request)
    {
        $people = new People();
        $people->name = $request->name;
        $people->surname = $request->surname;
        $people->save();

        return redirect()->back()->with(['message' => 'succes']);
    }
}
