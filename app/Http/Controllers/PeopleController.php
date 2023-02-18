<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function newPeople()
    {
        return view('new_people');
    }

    public function addNewPeople(Request $request)
    {
        $people = new People();
        $people->name = $request->name;
        $people->surname = $request->surname;
        $people->save();

        return redirect()->back()->with(['message' => 'succes']);
    }
}
