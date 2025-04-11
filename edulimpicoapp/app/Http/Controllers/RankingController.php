<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RankingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rankings = DB::table('ranking')
            ->join('users', 'ranking.user_id', '=', 'users.id')
            ->select('ranking.*', 'users.name as user_name')
            ->orderBy('points', 'desc')
            ->get();
            
        return view('rankings.index', ['rankings' => $rankings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rankings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'points' => 'required|integer|min:0'
        ]);

        DB::table('ranking')->insert([
            'points' => $request->points,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('rankings.index')
            ->with('success', 'Ranking created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ranking = DB::table('ranking')
            ->join('users', 'ranking.user_id', '=', 'users.id')
            ->select('ranking.*', 'users.name as user_name')
            ->where('ranking.id', $id)
            ->first();

        if (!$ranking) {
            abort(404);
        }

        return view('rankings.show', compact('ranking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ranking = DB::table('ranking')->where('id', $id)->first();

        if (!$ranking) {
            abort(404);
        }

        return view('rankings.edit', compact('ranking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'points' => 'required|integer|min:0'
        ]);

        DB::table('ranking')->where('id', $id)->update([
            'points' => $request->points
        ]);

        return redirect()->route('rankings.index')
            ->with('success', 'Ranking updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('ranking')->where('id', $id)->delete();

        return redirect()->route('rankings.index')
            ->with('success', 'Ranking deleted successfully.');
    }
}
