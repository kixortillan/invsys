<?php

namespace App\Http\Controllers\UserManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Auth\UserManager;

class UserController extends Controller
{
	protected $service;

	public function __construct(UserManager $service)
	{
		$this->service = $service;
	}

	public function index(Request $request)
	{
		$users = $this->service->listUsers([
			'search' => $request->get('search'),
			'sort' => $request->get('sort'),
			'order_by' => $request->get('order_by')
		]);

		return view('auth.management.user.index', compact(
			'users'
		));
	}

	public function edit(Request $request, $id)
	{
		//\DB::enableQueryLog();
		$user = $this->service->user($id);

		$userPermission = $user->access()->get();

		//$groupPermission = $user->with('groups.access')->first();
		$groupPermission = $this->service->permissionByGroupForUser($user);

		//$groupPermission = $userGroups->with('access')->withPivot('permission')->get();

		//dd($groupPermission);
		//dd(\DB::getQueryLog());

		return view('auth.management.user.edit', compact(
			'user', 'userPermission', 'groupPermission'
		));
	}

	public function store()
	{

	}

	public function delete()
	{

	}

	public function showAddToGroupForm(Request $request)
	{
		return view('auth.management.user.addgroup');
	}

	public function addToGroup(Request $request)
	{
		return view('auth.management.user.addgroup');
	}

	public function removeFromGroup()
	{

	}

}