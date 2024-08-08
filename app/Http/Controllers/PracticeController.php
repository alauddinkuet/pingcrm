<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Inertia\Inertia;
use Inertia\Response;

class PracticeController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Practice/Index', ['organization' => Organization::find(2)]);
    }

    public function partialLoad()
    {
        return response()->json(['success' => 1, 'html' => 'This is first test html from ajax call']);
    }

    public function partialLoad1()
    {
        return response()->json(['success' => 1, 'html' => 'This is second test html from ajax call']);
    }
}
