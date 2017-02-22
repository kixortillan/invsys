<?php

namespace App\Http\Controllers\Parts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Parts\PartNumberExtension;
use App\Http\Requests\Parts\StorePartNumberExtension;

class PartNumberExtensionController extends Controller
{
	protected $service;

	public function __construct(PartNumberExtension $service)
	{
		$this->service = $service;
	}

	public function index(Request $request)
	{
		$pnes = $this->service->listPnes([
			'search' => $request->get('search'),
			'sort' => $request->get('sort'),
			'order_by' => $request->get('order_by')
		]);

		return view('parts.pne.index', compact(
			'pnes'
		));
	}

	public function showCreateForm(Request $request)
	{
		return view('parts.pne.details');
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
		
		return view('parts.pne.details', compact(
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