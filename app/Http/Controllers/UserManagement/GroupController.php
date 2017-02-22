<?php

namespace App\Http\Controllers\UserManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Auth\GroupManager;

class GroupController extends Controller
{
	protected $service;

	public function __construct(GroupManager $service)
	{
		$this->service = $service;
	}

	public function index(Request $request)
	{
		$groups = $this->service->listGroups([
			'search' => $request->get('search'),
			'sort' => $request->get('sort'),
			'order_by' => $request->get('order_by')
		]);

		return view('auth.management.group.index', compact(
			'groups'
		));
	}

	public function edti()
	{

	}

	public function store()
	{

	}

	public function delete()
	{
		
	}
}