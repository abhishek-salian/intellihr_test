<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectTestRequest;
use App\Http\Resources\SubjectCollection;
use App\Http\Resources\SubjectResource;
use App\Http\Resources\SubjectTestResource;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

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
    public function store(StoreSubjectTestRequest $request)
    {
        // to store subject test answers
    }
}
