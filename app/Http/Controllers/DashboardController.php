<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function apiData(Request $request)
    {
        $query = Indicator::query();

        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('dimension', 'like', "%{$searchTerm}%")
                  ->orWhere('diagnosis', 'like', "%{$searchTerm}%");
            });
        }

        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        return response()->json([
            'indicators' => $query->get()
        ]);
    }
}
