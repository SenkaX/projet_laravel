<?php

namespace App\Http\Controllers;

use App\Models\TierList;
use Illuminate\Http\Request;

class TierListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = \App\Models\TierList::with(['user', 'category', 'entries.person']);
        // Filtres : catégorie, popularité, date, etc.
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'populaire':
                    $query->withCount('entries')->orderByDesc('entries_count');
                    break;
                case 'recent':
                    $query->orderByDesc('created_at');
                    break;
                case 'ancien':
                    $query->orderBy('created_at');
                    break;
                default:
                    break;
            }
        } else {
            $query->orderByDesc('created_at');
        }
        $tierLists = $query->paginate(10);
        $categories = \App\Models\Category::all();
        return view('tier_lists.index', compact('tierLists', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TierList $tierList)
    {
        $tierList->load(['user', 'category', 'entries.person']);
        return view('tier_lists.show', compact('tierList'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TierList $tierList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TierList $tierList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TierList $tierList)
    {
        //
    }
}
