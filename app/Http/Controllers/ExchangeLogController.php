<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExchangeLog;
use Illuminate\Support\Facades\Auth;

class ExchangeLogController extends Controller
{
    public function store()
    {
        ExchangeLog::create([
            'user_id' => Auth::id(),
            'consulted_at' => now(),
        ]);

        return response()->json(['message' => 'Consulta registrada']);
    }
}
