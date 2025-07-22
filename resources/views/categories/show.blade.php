@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-4xl font-black mb-6 text-blue-700 flex items-center gap-3 tracking-tight drop-shadow">
        <svg class="w-10 h-10 text-purple-400" fill="currentColor" viewBox="0 0 20 20"><path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm0 2h12v10H4V5z"/></svg>
        {{ $category->name }}
    </h1>
    <div class="mb-4 text-lg text-gray-800">{{ $category->description }}</div>
    @if($category->children->count())
        <div class="mb-6">
            <h2 class="text-lg font-semibold text-blue-700">Sous-catégories :</h2>
            <ul class="list-disc pl-6 mt-1">
                @foreach($category->children as $child)
                    <li>
                        <a href="{{ route('categories.show', $child) }}" class="text-green-700 hover:underline font-semibold">{{ $child->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mb-6">
        <h2 class="text-lg font-semibold text-blue-700">Personnes associées (par score) :</h2>
        <ul class="list-disc pl-6">
            @php
                $peopleSorted = $category->people->sortByDesc(fn($p) => $p->score());
            @endphp
            @forelse($peopleSorted as $person)
                <li class="flex items-center gap-2">
                    <a href="{{ route('people.show', $person) }}" class="text-blue-700 hover:underline font-semibold">{{ $person->name }}</a>
                    <span class="ml-2 text-xs text-gray-500">Score : {{ $person->score() }}</span>
                    @php
                        $entry = null;
                        foreach($person->tierListEntries as $e) {
                            if($e->tierList->category_id == $category->id) { $entry = $e; break; }
                        }
                    @endphp
                    @if($entry)
                        <span class="ml-2 px-2 py-1 bg-green-200 text-green-800 rounded-full text-xs font-bold">Classé : #{{ $entry->position }}</span>
                    @else
                        <span class="ml-2 px-2 py-1 bg-gray-200 text-gray-800 rounded-full text-xs">Non classé</span>
                    @endif
                </li>
            @empty
                <li class="text-gray-400">Aucune personne dans cette catégorie.</li>
            @endforelse
        </ul>
    </div>
    <div class="mt-8">
        <a href="{{ route('categories.index') }}" class="text-blue-500 hover:underline font-semibold">&larr; Retour aux catégories</a>
    </div>
</div>
@endsection 