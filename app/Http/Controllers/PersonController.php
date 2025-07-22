<?php

namespace App\Http\Controllers;

use App\Models\Person;

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::with('votes')->get()->sortByDesc->score();
        return view('people.index', compact('people'));
    }

    public function show(Person $person)
    {
        $person->load(['tags', 'categories', 'votes']);
        return view('people.show', compact('person'));
    }
}