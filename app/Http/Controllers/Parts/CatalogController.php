<?php

namespace App\Http\Controllers\Parts;

use Illuminate\Http\Request;
use App\Services\Parts\Catalog;
use App\Http\Controllers\Controller;
use App\Http\Requests\Parts\StoreCatalog;
use App\Services\Parts\PartNumberExtension;

class CatalogController extends Controller
{

	protected $catalogService;

	protected $pneService;

	public function __construct(Catalog $catalogService, PartNumberExtension $pneService)
	{
		$this->catalogService = $catalogService;
		$this->pneService = $pneService;
	}

	public function index(Request $request)
	{
		$catalogs = $this->catalogService->listCatalogs([
			'search' => $request->get('search'),
			'sort' => $request->get('sort'),
			'order_by' => $request->get('order_by')
		]);

		return view('parts.catalog.index', compact(
			'catalogs'
		));	
	}

	public function showCreateForm(Request $request)
	{
		$pnes = $this->pneService->listAllPnes();

		return view('parts.catalog.details', compact(
			'pnes'
		));
	}

	public function store(StoreCatalog $request)
	{
		$this->catalogService->createNew($request->only([
			'part_number', 'brand', 'pne_code', 'description',
			'is_hazardous', 'has_expiration'
		]));

		return redirect()->back()->with(['message' => 'You have successfully created a new catalog.']);
	}

	public function uploadCatalog()
	{

	}

	public function edit()
	{

	}

	public function delete()
	{

	}
}