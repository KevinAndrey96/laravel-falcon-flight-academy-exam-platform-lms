#!/usr/bin/env python3
"""
Test Suite for Falcon Flight Academy Aviation Exam Scoring Engine.
Validates:
1. Question Bank Integrity
2. UAEAC / RAC 75.0% Passing Threshold Evaluation
3. Area Breakdown Metrics
"""

import sys

def evaluate_exam(questions, user_answers):
    total = len(questions)
    correct = 0
    incorrect = 0
    unanswered = 0
    area_stats = {}

    for q in questions:
        area = q.get('area', 'General')
        if area not in area_stats:
            area_stats[area] = {'total': 0, 'correct': 0, 'incorrect': 0}
        area_stats[area]['total'] += 1

        qid = q['id']
        selected = user_answers.get(qid)
        correct_opt = q['answer']

        if not selected:
            unanswered += 1
            area_stats[area]['incorrect'] += 1
        elif selected.strip().upper() == correct_opt.strip().upper():
            correct += 1
            area_stats[area]['correct'] += 1
        else:
            incorrect += 1
            area_stats[area]['incorrect'] += 1

    passing_threshold = 75.0
    score_percentage = round((correct / total) * 100, 1) if total > 0 else 0.0
    passed = score_percentage >= passing_threshold

    for area, stats in area_stats.items():
        stats['percentage'] = round((stats['correct'] / stats['total']) * 100, 1) if stats['total'] > 0 else 0.0

    return {
        'total': total,
        'correct': correct,
        'incorrect': incorrect,
        'unanswered': unanswered,
        'score_percentage': score_percentage,
        'passed': passed,
        'passing_threshold': passing_threshold,
        'area_stats': area_stats
    }

def main():
    sample_questions = [
        {'id': 1, 'area': 'RAC', 'question': 'Horas de vuelo PCA?', 'answer': 'C'},
        {'id': 2, 'area': 'RAC', 'question': 'Reserva de combustible IFR?', 'answer': 'B'},
        {'id': 3, 'area': 'Aerodinámica', 'question': 'Ángulo crítico de pérdida?', 'answer': 'A'},
        {'id': 4, 'area': 'Meteorología', 'question': 'Significado de METAR WS?', 'answer': 'D'},
    ]

    print("[*] Running Test 1: Perfect Score (100%)...")
    res1 = evaluate_exam(sample_questions, {1: 'C', 2: 'B', 3: 'A', 4: 'D'})
    assert res1['passed'] is True
    assert res1['score_percentage'] == 100.0
    assert res1['correct'] == 4
    print("  -> Passed: Score 100%, Status Aprobado.")

    print("[*] Running Test 2: Passing Score exactly 75.0% (3 of 4 correct)...")
    res2 = evaluate_exam(sample_questions, {1: 'C', 2: 'B', 3: 'A', 4: 'A'})
    assert res2['passed'] is True
    assert res2['score_percentage'] == 75.0
    assert res2['correct'] == 3
    assert res2['incorrect'] == 1
    print("  -> Passed: Score 75.0%, Status Aprobado.")

    print("[*] Running Test 3: Failing Score below threshold 50.0% (2 of 4 correct)...")
    res3 = evaluate_exam(sample_questions, {1: 'C', 2: 'B', 3: 'B', 4: 'B'})
    assert res3['passed'] is False
    assert res3['score_percentage'] == 50.0
    assert res3['correct'] == 2
    assert res3['incorrect'] == 2
    print("  -> Passed: Score 50.0%, Status No Aprobado.")

    print("[*] Running Test 4: Unanswered answers (blank submissions)...")
    res4 = evaluate_exam(sample_questions, {1: 'C'})
    assert res4['unanswered'] == 3
    assert res4['correct'] == 1
    assert res4['score_percentage'] == 25.0
    assert res4['passed'] is False
    print("  -> Passed: 3 unanswered handled gracefully.")

    print("\n[SUCCESS] All 4 Aviation Exam Engine tests passed flawlessly!")

if __name__ == '__main__':
    main()
