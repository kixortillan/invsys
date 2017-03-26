<?php

namespace App\Http\Controllers\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurrencyController extends Controller
{
    public function searchLocation(Request $request)
    {
    	return response()->json(['USD', 'PHP']);
    }
}
