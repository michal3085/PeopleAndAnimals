<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function newPeople()
    {
        return view('new_people');
    }
}
