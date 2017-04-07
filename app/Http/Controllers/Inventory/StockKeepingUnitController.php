<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Part\PartNumberExtension;
use App\Services\Inventory\StockKeepingUnit;
use App\Http\Requests\Inventory\StoreStockKeepingUnit;
use App\Transformers\Inventory\StockKeepingUnitTransformer;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class StockKeepingUnitController extends Controller
{

	protected $skuService;

	protected $pneService;

	public function __construct(StockKeepingUnit $skuService, PartNumberExtension $pneService)
	{
		parent::__construct();
		//$this->middleware('auth');
		$this->skuService = $skuService;
		$this->pneService = $pneService;
	}

	public function index(Request $request)
	{
		$paginator = $this->skuService->listStockKeepingUnits([
			'search' => $request->get('search'),
			'sort' => $request->get('sort'),
			'order_by' => $request->get('order_by')
		]);

		$resource = new Collection($paginator->getDictionary(), 
            new StockKeepingUnitTransformer, 'skus');

        return response()->json($this->fractal->createData($resource)->toArray());
	}

	public function showCreateForm(Request $request)
	{
		$pnes = $this->pneService->listAllPnes();

		$currencies = $this->skuService->getSupportedCurrencies();

		return view('inventory.sku.details', compact(
			'pnes', 'currencies'
		));
	}

	public function store(StoreStockKeepingUnit $request)
	{
		$sku = $this->skuService->createNew($request->only([
			'part_number', 'brand', 'pne_code', 'description',
			'is_hazardous', 'has_expiration', 'on_hand', 'available',
			'reserved', 'on_order', 'issued', 'unserved', 'srp', 
			'srp_currency', 'cost', 'cost_currency',
		]));

		$resource = new Item($sku, new StockKeepingUnitTransformer, 'skus');

		return response()->json($this->fractal->createData($resource)->toArray());
	}

	public function upload(Request $request)
	{
		$this->skuService->uploadCsv($request->file('file_catalogs'));

        return;
	}

	public function edit(Request $request, $id)
	{
		$catalog = $this->skuService->findById($id);

		$pnes = $this->pneService->listAllPnes();

		$currencies = $this->skuService->getSupportedCurrencies();

		return view('inventory.sku.details', compact(
			'catalog', 'pnes', 'currencies'
		));
	}

	public function delete()
	{

	}

	public function search(Request $request)
	{
		if(!$request->ajax()){
			abort(404);
		}

		$skus = $this->skuService->searchMatchingSku([
			'search' => $request->get('q')
		]);

		$results = [];

		$skus->getCollection()->each(function($item) use (&$results){
			//$item->sku = $item->getSku();
			$results[] = $item->getSku();
		});

		return response()->json($results);
	}
}