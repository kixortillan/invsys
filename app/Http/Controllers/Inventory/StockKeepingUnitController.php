<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Part\PartNumberExtension;
use App\Services\Inventory\StockKeepingUnit;
use App\Http\Requests\Inventory\StoreStockKeepingUnit;

class StockKeepingUnitController extends Controller
{

	protected $skuService;

	protected $pneService;

	public function __construct(StockKeepingUnit $skuService, PartNumberExtension $pneService)
	{
		$this->middleware('auth');
		$this->skuService = $skuService;
		$this->pneService = $pneService;
	}

	public function index(Request $request)
	{
		$catalogs = $this->skuService->listStockKeepingUnits([
			'search' => $request->get('search'),
			'sort' => $request->get('sort'),
			'order_by' => $request->get('order_by')
		]);

		return view('inventory.sku.index', compact(
			'catalogs'
		));	
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
		$this->skuService->createNew($request->only([
			'part_number', 'brand', 'pne_code', 'description',
			'is_hazardous', 'has_expiration', 'srp', 'srp_currency',
			 'cost', 'cost_currency',
		]));

		return redirect()->back()->with(['message' => 'You have successfully created a new catalog.']);
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