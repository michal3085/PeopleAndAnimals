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
        if ($request->surname == NULL) {
            return redirect()->route('new.people', ['error' => 2]);
        }
        if (People::peopleExist($request->surname, $request->name)) {
            return redirect()->route('new.people', ['error' => 1]);
        } else {
            $people = new People();
            $people->name = $request->name;
            $people->surname = $request->surname;
            $people->save();

            return redirect()->route('new.people', ['message' => $people->name . ' ' . $people->surname]);
        }
    }

    /*
     * Returns People Edit View
     */
    public function editPeopleView($id)
    {
        $people = People::where('id', $id)->first();
        return view('edit_people')->with(['people' => $people]);
    }

    public function editPeople(Request $request, $id)
    {
        $people = People::where('id', $id)->first();
        $people->name = $request->name;
        $people->surname = $request->surname;
        $people->save();

        return redirect()->back();
    }

    public function deletePeople($id)
    {
        Animal::where('owner_id', $id)->delete();
        People::where('id', $id)->delete();

        return redirect('/');
    }

    public function peopleData($id)
    {
        $data = People::where('id', $id)->first();
        return response()->json($data);
    }
}
