<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = DB::table('rooms')->get();
        return view('rooms.index', ['rooms' => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'topic' => 'required'
        ]);

        DB::table('rooms')->insert([
            'name' => $request->name,
            'topic' => $request->topic,
            'adm_id' => Auth::id(),
            'adm_name' => Auth::user()->name
        ]);

        return redirect()->route('rooms.index')
            ->with('success', 'Room created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $room = DB::table('rooms')->where('id', $id)->first();

        if (!$room) {
            abort(404); 
        }

        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = DB::table('rooms')->where('id', $id)->first();

        if (!$room) {
            abort(404); 
        }

        return view('rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'topic' => 'required'
        ]);

        DB::table('rooms')->where('id', $id)->update([
            'name' => $request->name,
            'topic' => $request->topic
        ]);

        return redirect()->route('rooms.index')
            ->with('success', 'Room updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('rooms')->where('id', $id)->delete();

        return redirect()->route('rooms.index')
            ->with('success', 'Room deleted successfully.');
    }
}
