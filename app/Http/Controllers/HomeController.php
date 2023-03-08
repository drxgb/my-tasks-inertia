<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        /** @var Collection */
        $todos = Todo::whereBelongsTo($user)
            ->get()
            ->sortBy('created_at')
            ->sortByDesc('important')
            ->values();

        return Inertia::render('Home', compact('todos'));
    }
}
