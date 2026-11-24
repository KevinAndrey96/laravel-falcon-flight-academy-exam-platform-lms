<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Questions;
use DB;

class CuestionariosController extends Controller
{
    /**
     * Display a listing of available aeronautical questionnaires.
     */
    public function index()
    {
        $cuestionarios = Questions::select(
            'title',
            DB::raw('COUNT(id) as total_questions'),
            DB::raw('COUNT(DISTINCT area) as total_areas')
        )
        ->groupBy('title')
        ->orderBy('title', 'asc')
        ->get();

        return view('cuestionarios.index', compact('cuestionarios'));
    }

    /**
     * Display the specified questionnaire for pilot examination.
     */
    public function show($title)
    {
        $questions = Questions::where('title', $title)
            ->orderBy('id', 'asc')
            ->get();

        if ($questions->isEmpty()) {
            return redirect()->route('cuestionarios.index')
                ->with('error', 'El cuestionario solicitado no existe o no tiene preguntas registradas.');
        }

        $areas = $questions->pluck('area')->unique()->values();

        return view('cuestionarios.cuestionario', compact('title', 'questions', 'areas'));
    }

    /**
     * Evaluate submitted answers against official answer keys and calculate aeronautical score.
     */
    public function evaluar(Request $request, $title)
    {
        $questions = Questions::where('title', $title)
            ->orderBy('id', 'asc')
            ->get();

        if ($questions->isEmpty()) {
            return redirect()->route('cuestionarios.index')
                ->with('error', 'El cuestionario no fue encontrado para evaluación.');
        }

        $userAnswers = $request->input('answers', []);
        $totalQuestions = $questions->count();
        $correctCount = 0;
        $incorrectCount = 0;
        $unansweredCount = 0;

        $detailedResults = [];
        $areaStats = [];

        foreach ($questions as $q) {
            $area = $q->area ?: 'General';
            if (!isset($areaStats[$area])) {
                $areaStats[$area] = [
                    'total' => 0,
                    'correct' => 0,
                    'incorrect' => 0,
                ];
            }
            $areaStats[$area]['total']++;

            $selectedOption = isset($userAnswers[$q->id]) ? strtoupper(trim($userAnswers[$q->id])) : null;
            $correctOption = strtoupper(trim($q->answer));

            $isCorrect = false;
            if (empty($selectedOption)) {
                $unansweredCount++;
                $areaStats[$area]['incorrect']++;
            } elseif ($selectedOption === $correctOption) {
                $isCorrect = true;
                $correctCount++;
                $areaStats[$area]['correct']++;
            } else {
                $incorrectCount++;
                $areaStats[$area]['incorrect']++;
            }

            $selectedText = null;
            $correctText = null;
            $map = $q->options_map;
            if ($selectedOption && isset($map[$selectedOption])) {
                $selectedText = $map[$selectedOption];
            }
            if ($correctOption && isset($map[$correctOption])) {
                $correctText = $map[$correctOption];
            }

            $detailedResults[] = [
                'question_id' => $q->id,
                'area' => $q->area,
                'question' => $q->question,
                'selected_option' => $selectedOption,
                'selected_text' => $selectedText,
                'correct_option' => $correctOption,
                'correct_text' => $correctText,
                'is_correct' => $isCorrect,
            ];
        }

        // UAEAC / RAC Standard Passing Score is 75%
        $passingThreshold = 75.0;
        $scorePercentage = $totalQuestions > 0 ? round(($correctCount / $totalQuestions) * 100, 1) : 0;
        $passed = $scorePercentage >= $passingThreshold;

        // Calculate area breakdown percentages
        foreach ($areaStats as $area => &$stats) {
            $stats['percentage'] = $stats['total'] > 0
                ? round(($stats['correct'] / $stats['total']) * 100, 1)
                : 0;
        }
        unset($stats);

        return view('cuestionarios.resultados', compact(
            'title',
            'totalQuestions',
            'correctCount',
            'incorrectCount',
            'unansweredCount',
            'scorePercentage',
            'passingThreshold',
            'passed',
            'detailedResults',
            'areaStats'
        ));
    }
}
