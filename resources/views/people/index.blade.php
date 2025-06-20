@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des personnes</h1>
    <ul>
        @foreach($people as $person)
            <li>
                <strong>{{ $person->name }}</strong>
                <p>{{ $person->description }}</p>
            </li>
        @endforeach
    </ul>
</div>
@endsection
