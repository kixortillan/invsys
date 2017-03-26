<?php

namespace App\Http\Controllers\Part;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Part\PartNumberExtension;
use App\Http\Requests\Part\StorePartNumberExtension;

class PartNumberExtensionController extends Controller
{
	protected $service;

	public function __construct(PartNumberExtension $service)
	{
		$this->middleware('auth');
		$this->service = $service;
	}

	public function index(Request $request)
	{
		$pnes = $this->service->listPnes([
			'search' => $request->get('search'),
			'sort' => $request->get('sort'),
			'order_by' => $request->get('order_by')
		]);

		return view('part.pne.index', compact(
			'pnes'
		));
	}

	public function showCreateForm(Request $request)
	{
		return view('part.pne.details');
	}

	public function store(StorePartNumberExtension $request)
	{
		$this->service->createNew($request->only([
			'code', 'description'
		]));

		return redirect('/parts/pnes');
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