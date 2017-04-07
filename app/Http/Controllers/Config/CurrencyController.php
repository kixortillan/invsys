<?php

namespace App\Http\Controllers\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Config\Currency;
use App\Transformers\Config\CurrencyTransformer;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class CurrencyController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

    public function currencies(Request $request)
    {
		$paginator = Currency::paginate();

		$resource = new Collection($paginator->getDictionary(), new CurrencyTransformer, 'currencies');

    	return response()->json($this->fractal->createData($resource)->toArray());
    }
}
