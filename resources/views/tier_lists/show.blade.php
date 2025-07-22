@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-4xl font-black mb-6 text-blue-700 flex items-center gap-3 tracking-tight drop-shadow">
        <svg class="w-10 h-10 text-yellow-400 animate-pulse" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.38-2.454a1 1 0 00-1.175 0l-3.38 2.454c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z"/></svg>
        {{ $tierList->name }}
    </h1>
    <div class="mb-4 flex flex-wrap gap-2 text-sm">
        <span class="inline-flex items-center gap-1 bg-blue-100 text-blue-800 px-2 py-1 rounded-full font-semibold"><svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm0 2h12v10H4V5z"/></svg> {{ $tierList->category->name ?? '-' }}</span>
        <span class="inline-flex items-center gap-1 bg-green-100 text-green-800 px-2 py-1 rounded-full font-semibold"><svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v10H5V5z"/></svg> {{ $tierList->user->name ?? '-' }}</span>
        <span class="inline-flex items-center gap-1 bg-gray-100 text-gray-800 px-2 py-1 rounded-full font-semibold"><svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path d="M6 2a1 1 0 00-1 1v1H5a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 00-1-1H6zm0 2h8v1H6V4z"/></svg> {{ $tierList->created_at->format('d/m/Y') }}</span>
    </div>
    <div class="mb-6 text-lg text-gray-800">{{ $tierList->description }}</div>
    <div class="bg-white/80 rounded-2xl shadow-xl p-8 mb-8 backdrop-blur border border-blue-100">
        <h2 class="text-2xl font-extrabold mb-4 tracking-tight flex items-center gap-2 text-blue-700">
            <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.38-2.454a1 1 0 00-1.175 0l-3.38 2.454c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z"/></svg>
            Classement
        </h2>
        <ol class="list-decimal pl-6 space-y-2">
            @foreach($tierList->entries->sortBy('position') as $entry)
                <li class="flex items-center gap-3 text-lg font-semibold">
                    <span class="font-black text-blue-700">#{{ $entry->position }}</span>
                    <a href="{{ route('people.show', $entry->person) }}" class="text-blue-700 hover:underline font-bold">{{ $entry->person->name }}</a>
                    @if($entry->person->name === 'ALOIS')
                        <span class="ml-2 px-3 py-1 bg-yellow-300 text-yellow-900 rounded-full text-xs font-black animate-pulse shadow ring-2 ring-yellow-400 inline-flex items-center gap-1"><svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.38-2.454a1 1 0 00-1.175 0l-3.38 2.454c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z"/></svg>TOP 1</span>
                    @endif
                </li>
            @endforeach
        </ol>
    </div>
    <h2 class="text-xl font-bold mt-8 mb-2 text-blue-700">Personnes de la catégorie "{{ $tierList->category->name }}"</h2>
    <ul class="list-disc pl-6 space-y-1">
        @foreach($tierList->category->people->unique('id') as $person)
            <li class="flex items-center gap-2">
                <a href="{{ route('people.show', $person) }}" class="text-blue-700 hover:underline font-semibold">{{ $person->name }}</a>
                @php
                    $inRanking = $tierList->entries->contains('person_id', $person->id);
                @endphp
                @if($inRanking)
                    <span class="ml-2 px-2 py-1 bg-green-200 text-green-800 rounded-full text-xs font-bold">Dans le classement</span>
                @else
                    <span class="ml-2 px-2 py-1 bg-gray-200 text-gray-800 rounded-full text-xs">Non classé</span>
                @endif
            </li>
        @endforeach
    </ul>
    <div class="mt-8">
        <a href="{{ route('tier-lists.index') }}" class="text-blue-500 hover:underline font-semibold">&larr; Retour aux classements</a>
    </div>
</div>
@endsection 