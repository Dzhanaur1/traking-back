<?php

namespace App\Http\Controllers;

use App\Models\TransportType;
use Illuminate\Http\Request;

class TransportTypeController extends Controller
{
    public function index()
    {
        $transportTypes = TransportType::all();
        return response()->json($transportTypes);
    }
}
