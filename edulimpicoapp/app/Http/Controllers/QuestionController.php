<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = DB::table('questions')->get();
        return view('questions.index', ['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = DB::table('rooms')->get();
        return view('questions.create', ['rooms' => $rooms]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'answer' => 'required|in:a,b,c,d',
            'points' => 'required|integer|min:1'
        ]);

        DB::table('questions')->insert([
            'room_id' => $request->room_id,
            'question' => $request->question,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'answer' => $request->answer,
            'points' => $request->points,
        ]);

        return redirect()->route('questions.index')
            ->with('success', 'Question created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $question = DB::table('questions')->where('id', $id)->first();

        if (!$question) {
            abort(404);
        }

        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = DB::table('questions')->where('id', $id)->first();
        $rooms = DB::table('rooms')->get();

        if (!$question) {
            abort(404);
        }

        return view('questions.edit', compact('question', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'answer' => 'required|in:a,b,c,d',
            'points' => 'required|integer|min:1'
        ]);

        DB::table('questions')->where('id', $id)->update([
            'room_id' => $request->room_id,
            'question' => $request->question,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'answer' => $request->answer,
            'points' => $request->points,
        ]);

        return redirect()->route('questions.index')
            ->with('success', 'Question updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('questions')->where('id', $id)->delete();

        return redirect()->route('questions.index')
            ->with('success', 'Question deleted successfully.');
    }
}
