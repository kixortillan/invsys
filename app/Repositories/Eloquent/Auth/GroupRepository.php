<?php

namespace App\Repositories\Eloquent\Auth;

use App\Models\AuthExt\Group;
use App\Repositories\Utilities\Paginate;
use App\Repositories\Contracts\Auth\GroupRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class GroupRepository implements GroupRepositoryInterface
{

	public function __construct()
	{
		//
	}

	/**
	 * Returns an Eloquent model App\Models\Auth\Group with provided id
	 * 
	 * @param  int $id
	 * @return \App\Models\Auth\Group
	 */
	public function findById($id)
	{
		return Group::findOrFail($id);
	}

	public function paginate(Paginate $paginate)
	{
		$query = Group::query();

		if(!empty($paginate->search())){
			foreach($paginate->searchColumns() as $col){
				$query->where($col, $paginate->search());
			}
		}

		if(!empty($paginate->sort())){
			$query->orderBy($paginate->sort(), $paginate->order());
		}

		return $query->paginate($paginate->perPage());
	}
}