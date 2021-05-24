<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubjectCollection;
use App\Http\Resources\SubjectResource;
use App\Http\Resources\SubjectTestResource;
use App\Models\Subject;
use App\Models\SubjectTest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SubjectTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return new SubjectTestResource($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'answer.*' => Rule::requiredIf(function () use ($request) {
                return $request->question_id === 4;
            }),
            'subject_id' => ['required']
        ]);

        // This allows duplication, could have checked for test submission before saving
        foreach ($request->answers as $answer) {
            SubjectTest::create([
                'question_id' => $answer['question_id'],
                'answer' => $answer['answer'],
                'subject_id' => $request->subject_id
            ]);
        }
    }
}
