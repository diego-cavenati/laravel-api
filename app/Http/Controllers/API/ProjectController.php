<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'results' => Project::with(['type', 'tecnologies'])->orderByDesc('id')->paginate(5)
        ]);
    }

    public function show($slug)
    {
        $project = Project::with('type', 'tecnologies')->where('slug', $slug)->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'project' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'page not found'
            ]);
        }
    }
}
