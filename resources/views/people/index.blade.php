@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-4xl font-black mb-8 text-blue-700 flex items-center gap-3 tracking-tight drop-shadow">
        <svg class="w-10 h-10 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 01.894.553l1.382 2.764 3.05.444a1 1 0 01.554 1.706l-2.206 2.15.521 3.037a1 1 0 01-1.451 1.054L10 12.347l-2.744 1.441a1 1 0 01-1.451-1.054l.521-3.037-2.206-2.15a1 1 0 01.554-1.706l3.05-.444L9.106 2.553A1 1 0 0110 2z"/></svg>
        Liste des personnes
    </h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($people as $person)
            <div class="rounded-2xl p-6 bg-white/80 shadow-xl hover:scale-105 hover:shadow-2xl transition-all duration-300 flex flex-col gap-2 backdrop-blur border border-green-100">
                <a href="{{ route('people.show', $person) }}" class="text-2xl font-bold text-blue-700 hover:underline mb-1">{{ $person->name }}</a>
                <div class="text-gray-600 text-sm mb-1">{{ $person->description }}</div>
                <div class="flex flex-wrap gap-1 mb-1">
                    @foreach($person->tags as $tag)
                        <span class="inline-flex items-center gap-1 bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-semibold"><svg class="w-3 h-3 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v10H5V5z"/></svg>{{ $tag->name }}</span>
                    @endforeach
                </div>
                <div class="flex flex-wrap gap-1 mb-1">
                    @foreach($person->categories as $cat)
                        <span class="inline-flex items-center gap-1 bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-semibold"><svg class="w-3 h-3 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm0 2h12v10H4V5z"/></svg>{{ $cat->name }}</span>
                    @endforeach
                </div>
                <div class="flex items-center gap-2 mt-2">
                    <form action="{{ route('people.vote', ['person' => $person->id, 'value' => 1]) }}" method="POST">
                        @csrf
                        <button type="submit" class="px-3 py-1 bg-green-500 text-white rounded-full hover:bg-green-600 shadow ring-2 ring-green-300 focus:ring-4 transition-all">👍</button>
                    </form>
                    <form action="{{ route('people.vote', ['person' => $person->id, 'value' => -1]) }}" method="POST">
                        @csrf
                        <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-full hover:bg-red-600 shadow ring-2 ring-red-300 focus:ring-4 transition-all">👎</button>
                    </form>
                    <span class="ml-2 font-bold text-lg">Score : {{ $person->score() }}</span>
                </div>
                <div class="mt-2">
                    <a href="{{ route('people.show', $person) }}" class="text-blue-500 hover:underline text-sm font-semibold">Voir la fiche</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection