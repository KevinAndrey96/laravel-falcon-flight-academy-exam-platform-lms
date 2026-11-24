<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;
use Session;
use Redirect;

class QuestionsController extends Controller
{
    /**
     * Display a listing of questions in the question bank.
     */
    public function index()
    {
        $questions = Questions::orderBy('title', 'asc')
            ->orderBy('id', 'asc')
            ->get();
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new question.
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created question in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|string|max:191',
            'area'     => 'required|string|max:191',
            'question' => 'required|string',
            'answer'   => 'required|string|in:A,B,C,D,E',
            'optionA'  => 'required|string',
        ]);

        Questions::create([
            'title'   => $request->get('title'),
            'area'    => $request->get('area'),
            'question'=> $request->get('question'),
            'answer'  => $request->get('answer'),
            'optionA' => $request->get('optionA'),
            'optionB' => $request->get('optionB'),
            'optionC' => $request->get('optionC'),
            'optionD' => $request->get('optionD'),
            'optionE' => $request->get('optionE'),
        ]);

        return redirect('/questions')->with('success', 'Pregunta aeronáutica creada con éxito en el banco.');
    }

    /**
     * Display the specified question.
     */
    public function show($id)
    {
        $question = Questions::findOrFail($id);
        return view('questions.edit', ['questions' => $question]);
    }

    /**
     * Show the form for editing the specified question.
     */
    public function edit($id)
    {
        $questions = Questions::findOrFail($id);
        return view('questions.edit', compact('questions'));
    }

    /**
     * Update the specified question in the database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'    => 'required|string|max:191',
            'area'     => 'required|string|max:191',
            'question' => 'required|string',
            'answer'   => 'required|string|in:A,B,C,D,E',
            'optionA'  => 'required|string',
        ]);

        $question = Questions::findOrFail($id);
        $question->update([
            'title'   => $request->get('title'),
            'area'    => $request->get('area'),
            'question'=> $request->get('question'),
            'answer'  => $request->get('answer'),
            'optionA' => $request->get('optionA'),
            'optionB' => $request->get('optionB'),
            'optionC' => $request->get('optionC'),
            'optionD' => $request->get('optionD'),
            'optionE' => $request->get('optionE'),
        ]);

        return redirect('/questions')->with('success', 'Pregunta aeronáutica actualizada con éxito.');
    }

    /**
     * Remove the specified question from the database.
     */
    public function destroy($id)
    {
        $question = Questions::findOrFail($id);
        $question->delete();

        return redirect('/questions')->with('success', 'Pregunta eliminada del banco satisfactoriamente.');
    }
}
