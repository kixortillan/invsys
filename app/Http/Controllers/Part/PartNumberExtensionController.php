<?php

namespace App\Http\Controllers\Part;

use App\Transformers\Part\PartNumberExtensionTransformer;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Part\PartNumberExtension;
use App\Http\Requests\Part\StorePartNumberExtension;

class PartNumberExtensionController extends Controller
{
	protected $service;

	public function __construct(PartNumberExtension $service)
	{
		parent::__construct();
		//$this->middleware('auth');
		$this->service = $service;
	}

	public function index(Request $request)
	{
		$paginator = $this->service->listPnes([
			'search' => $request->get('search'),
			'sort' => $request->get('sort'),
			'order_by' => $request->get('order_by')
		]);

		$resource = new Collection($paginator->getDictionary(), 
			new PartNumberExtensionTransformer, 'part_number_extensions');

		return response()->json($this->fractal->createData($resource)->toArray());
	}

	public function showCreateForm(Request $request)
	{
		return view('part.pne.details');
	}

	public function store(StorePartNumberExtension $request)
	{
		$pne = $this->service->createNew([
			'code' => $request->get('pne_code'),
			'description' => $request->get('description')
		]);

		$resource = new Item($pne, new PartNumberExtensionTransformer, 'part_number_extensions');

		return response()->json($this->fractal->createData($resource)->toArray());
	}

	public function edit(Request $request, $code)
	{
		$pne = $this->service->findByCode($code);
		
		return view('part.pne.details', compact(
			'pne'
		));
	}

	public function delete(Request $request, $code)
	{
		$pne = $this->service->findByCode($code);
		$pne->delete();
		
		return redirect('/parts/pnes');	
	}

}