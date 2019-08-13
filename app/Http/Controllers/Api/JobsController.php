<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs;

class JobsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'job' => 'required',
            'date' => 'required|after_or_equal:'.date("Y-m-d")
        ]);

        $job = Jobs::create([
            'job' => $request->job,
            'date' => $request->date,
        ]);

        return response()->json([
            'data' => $job,
            'code' => 201
        ]);
    }
}
