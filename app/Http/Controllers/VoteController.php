<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function vote(Request $request, Person $person, $value)
    {
        // Un utilisateur ne peut voter qu'une fois par personne
        Vote::updateOrCreate(
            ['user_id' => Auth::id(), 'person_id' => $person->id],
            ['value' => $value]
        );

        return back();
    }
}