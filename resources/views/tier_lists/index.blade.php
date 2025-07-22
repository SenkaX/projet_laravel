@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-4xl font-black mb-8 text-blue-700 flex items-center gap-3 tracking-tight drop-shadow">
        <svg class="w-10 h-10 text-yellow-400 animate-pulse" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.38-2.454a1 1 0 00-1.175 0l-3.38 2.454c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z"/></svg>
        Classements (Tier Lists)
    </h1>
    <form method="GET" class="mb-8 flex flex-wrap gap-4 items-end bg-white/80 p-4 rounded-2xl shadow-lg backdrop-blur">
        <div>
            <label for="category" class="block text-sm font-medium text-gray-700">Catégorie</label>
            <select name="category" id="category" class="border rounded px-2 py-1">
                <option value="">Toutes</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @if(request('category') == $cat->id) selected @endif>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="sort" class="block text-sm font-medium text-gray-700">Trier par</label>
            <select name="sort" id="sort" class="border rounded px-2 py-1">
                <option value="recent" @if(request('sort')=='recent') selected @endif>Plus récentes</option>
                <option value="ancien" @if(request('sort')=='ancien') selected @endif>Plus anciennes</option>
                <option value="populaire" @if(request('sort')=='populaire') selected @endif>Populaires</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-8 py-2 rounded-full shadow-lg hover:bg-blue-700 ring-2 ring-blue-300 focus:ring-4 transition-all font-bold text-lg">Filtrer</button>
    </form>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        @forelse($tierLists as $tierList)
            <div class="rounded-2xl p-8 bg-white/80 shadow-xl hover:scale-105 hover:shadow-2xl transition-all duration-300 flex flex-col gap-2 backdrop-blur border border-blue-100">
                <h2 class="text-2xl font-extrabold mb-1 tracking-tight flex items-center gap-2">
                    <svg class="w-6 h-6 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 01.894.553l1.382 2.764 3.05.444a1 1 0 01.554 1.706l-2.206 2.15.521 3.037a1 1 0 01-1.451 1.054L10 12.347l-2.744 1.441a1 1 0 01-1.451-1.054l.521-3.037-2.206-2.15a1 1 0 01.554-1.706l3.05-.444L9.106 2.553A1 1 0 0110 2z"/></svg>
                    <a href="{{ route('tier-lists.show', $tierList) }}" class="text-blue-700 hover:underline">{{ $tierList->name }}</a>
                </h2>
                <div class="flex flex-wrap gap-2 text-sm mb-1">
                    <span class="inline-flex items-center gap-1 bg-blue-100 text-blue-800 px-2 py-1 rounded-full font-semibold"><svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm0 2h12v10H4V5z"/></svg> {{ $tierList->category->name ?? '-' }}</span>
                    <span class="inline-flex items-center gap-1 bg-green-100 text-green-800 px-2 py-1 rounded-full font-semibold"><svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v10H5V5z"/></svg> {{ $tierList->user->name ?? '-' }}</span>
                    <span class="inline-flex items-center gap-1 bg-gray-100 text-gray-800 px-2 py-1 rounded-full font-semibold"><svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path d="M6 2a1 1 0 00-1 1v1H5a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 00-1-1H6zm0 2h8v1H6V4z"/></svg> {{ $tierList->created_at->format('d/m/Y') }}</span>
                </div>
                <div class="mt-2 text-gray-800">{{ $tierList->description }}</div>
                <div class="mt-2">
                    <a href="{{ route('tier-lists.show', $tierList) }}" class="text-blue-500 hover:underline font-semibold">Voir le classement &rarr;</a>
                </div>
            </div>
        @empty
            <div class="col-span-2 text-center text-gray-500">Aucune tier list trouvée.</div>
        @endforelse
    </div>
    <div class="mt-10">
        {{ $tierLists->withQueryString()->links() }}
    </div>
</div>
@endsection 