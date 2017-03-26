<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BinController extends Controller
{
    
    public function searchLocation(Request $request)
    {
    	return response()->json(['12345']);
    }
}
