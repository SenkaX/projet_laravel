@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-4xl font-black mb-8 text-blue-700 flex items-center gap-3 tracking-tight drop-shadow">
        <svg class="w-10 h-10 text-purple-400" fill="currentColor" viewBox="0 0 20 20"><path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm0 2h12v10H4V5z"/></svg>
        Catégories
    </h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($categories as $cat)
            <div class="rounded-2xl p-6 bg-white/80 shadow-xl hover:scale-105 hover:shadow-2xl transition-all duration-300 backdrop-blur border border-purple-100">
                <a href="{{ route('categories.show', $cat) }}" class="text-2xl font-bold text-blue-700 hover:underline flex items-center gap-2 mb-2">
                    <svg class="w-6 h-6 text-purple-400" fill="currentColor" viewBox="0 0 20 20"><path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm0 2h12v10H4V5z"/></svg>
                    {{ $cat->name }}
                </a>
                @if($cat->children->count())
                    <div class="mt-2">
                        <span class="text-sm text-gray-500 font-semibold">Sous-catégories :</span>
                        <ul class="list-disc pl-6 mt-1">
                            @foreach($cat->children as $child)
                                <li>
                                    <a href="{{ route('categories.show', $child) }}" class="text-green-700 hover:underline font-semibold">{{ $child->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
    <div class="mt-8">
        <a href="/" class="text-blue-500 hover:underline font-semibold">&larr; Retour à l'accueil</a>
    </div>
</div>
@endsection 