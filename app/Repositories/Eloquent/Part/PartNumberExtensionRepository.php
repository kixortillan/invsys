<?php

namespace App\Repositories\Eloquent\Part;

use App\Repositories\Utilities\Paginate;
use App\Models\Part\PartNumberExtension;
use App\Repositories\Contracts\Part\PartNumberExtensionRepositoryInterface;

class PartNumberExtensionRepository implements PartNumberExtensionRepositoryInterface
{
	public function create(array $data)
	{
		if(!empty(array_diff(['code', 'description'], array_keys($data)))){
			throw new Exception('Missing parameters.');
		}
		
		return PartNumberExtension::create($data);
	}

	public function findById($id)
	{
		return PartNumberExtension::findOrFail($id);
	}

	public function all()
	{
		return PartNumberExtension::all();
	}

	public function paginate(Paginate $paginate)
	{
		$query = PartNumberExtension::query();

		if(!empty($paginate->search())){
			foreach($paginate->searchColumns() as $col){
				$query->orWhere($col, "LIKE", $paginate->searchPattern());
			}
		}

		if(!empty($paginate->sort())){
			$query->orderBy($paginate->sort(), $paginate->order());
		}

		return $query->paginate($paginate->perPage());
	}
}