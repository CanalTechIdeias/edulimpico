<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = DB::table('subscribe')
            ->join('users', 'subscribe.user_id', '=', 'users.id')
            ->join('rooms', 'subscribe.room_id', '=', 'rooms.id')
            ->select('subscribe.*', 'users.name as user_name', 'rooms.name as room_name')
            ->get();
            
        return view('subscriptions.index', ['subscriptions' => $subscriptions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = DB::table('users')->get();
        $rooms = DB::table('rooms')->get();
        return view('subscriptions.create', ['users' => $users, 'rooms' => $rooms]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'points' => 'required|integer|min:0'
        ]);

        // Verificar se já existe uma inscrição para este usuário nesta sala
        $existingSubscription = DB::table('subscribe')
            ->where('user_id', $request->user_id)
            ->where('room_id', $request->room_id)
            ->first();

        if ($existingSubscription) {
            return redirect()->back()
                ->with('error', 'User is already subscribed to this room.');
        }

        DB::table('subscribe')->insert([
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
            'points' => $request->points,
        ]);

        return redirect()->route('subscriptions.index')
            ->with('success', 'Subscription created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subscription = DB::table('subscribe')
            ->join('users', 'subscribe.user_id', '=', 'users.id')
            ->join('rooms', 'subscribe.room_id', '=', 'rooms.id')
            ->select('subscribe.*', 'users.name as user_name', 'rooms.name as room_name')
            ->where('subscribe.id', $id)
            ->first();

        if (!$subscription) {
            abort(404);
        }

        return view('subscriptions.show', compact('subscription'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subscription = DB::table('subscribe')->where('id', $id)->first();
        $users = DB::table('users')->get();
        $rooms = DB::table('rooms')->get();

        if (!$subscription) {
            abort(404);
        }

        return view('subscriptions.edit', compact('subscription', 'users', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'points' => 'required|integer|min:0'
        ]);

        // Verificar se já existe uma inscrição para este usuário nesta sala (excluindo a atual)
        $existingSubscription = DB::table('subscribe')
            ->where('user_id', $request->user_id)
            ->where('room_id', $request->room_id)
            ->where('id', '!=', $id)
            ->first();

        if ($existingSubscription) {
            return redirect()->back()
                ->with('error', 'User is already subscribed to this room.');
        }

        DB::table('subscribe')->where('id', $id)->update([
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
            'points' => $request->points,
        ]);

        return redirect()->route('subscriptions.index')
            ->with('success', 'Subscription updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('subscribe')->where('id', $id)->delete();

        return redirect()->route('subscriptions.index')
            ->with('success', 'Subscription deleted successfully.');
    }
}
