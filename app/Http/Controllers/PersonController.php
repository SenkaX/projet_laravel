<?php

namespace App\Http\Controllers;

use App\Models\Person;

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::all();
        return view('people.index', compact('people'));
    }
}