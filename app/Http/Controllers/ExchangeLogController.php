<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExchangeLog;
use Illuminate\Support\Facades\Auth;

class ExchangeLogController extends Controller
{
    public function store(Request $request)
    {
        logger('User ID: ' . Auth::id());
        logger('Client Time: ' . $request->input('client_time'));

        ExchangeLog::create([
            'user_id' => Auth::id(),
            'consulted_at' => $request->input('client_time'), // <-- hora del cliente
        ]);

        logger('Consulta registrada en la base de datos');
        logger('Total registros: ' . \App\Models\ExchangeLog::count());
        return response()->json(['message' => 'Consulta registrada']);
    }
}
