@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-4xl font-black mb-6 text-blue-700 flex items-center gap-3 tracking-tight drop-shadow">
        <svg class="w-10 h-10 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 01.894.553l1.382 2.764 3.05.444a1 1 0 01.554 1.706l-2.206 2.15.521 3.037a1 1 0 01-1.451 1.054L10 12.347l-2.744 1.441a1 1 0 01-1.451-1.054l.521-3.037-2.206-2.15a1 1 0 01.554-1.706l3.05-.444L9.106 2.553A1 1 0 0110 2z"/></svg>
        {{ $person->name }}
    </h1>
    <div class="mb-4 text-lg text-gray-800">{{ $person->description }}</div>
    <div class="mb-4 flex flex-wrap gap-2 items-center">
        <span class="inline-flex items-center gap-1 bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-lg font-black shadow ring-2 ring-yellow-300"><svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.38-2.454a1 1 0 00-1.175 0l-3.38 2.454c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z"/></svg>Score : {{ $person->score() }}</span>
    </div>
    <div class="mb-4 flex flex-wrap gap-2">
        @forelse($person->tags as $tag)
            <span class="inline-flex items-center gap-1 bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-semibold"><svg class="w-3 h-3 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v10H5V5z"/></svg>{{ $tag->name }}</span>
        @empty
            <span class="text-gray-400">Aucun tag</span>
        @endforelse
    </div>
    <div class="mb-4 flex flex-wrap gap-2">
        @forelse($person->categories as $cat)
            <span class="inline-flex items-center gap-1 bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-semibold"><svg class="w-3 h-3 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm0 2h12v10H4V5z"/></svg>{{ $cat->name }}</span>
        @empty
            <span class="text-gray-400">Aucune catégorie</span>
        @endforelse
    </div>
    <div class="mt-8">
        <a href="{{ route('people.index') }}" class="text-blue-500 hover:underline font-semibold">&larr; Retour aux personnes</a>
    </div>
</div>
@endsection 