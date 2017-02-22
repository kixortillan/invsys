<?php

namespace App\Repositories\Eloquent\Parts;

use App\Models\Parts\Catalog;
use App\Repositories\Utilities\Paginate;
use App\Repositories\Contracts\Parts\CatalogRepositoryInterface;

class CatalogRepository implements CatalogRepositoryInterface
{
	public function create(array $data)
	{
		return Catalog::create($data);
	}

	public function paginate(Paginate $paginate)
	{
		$query = Catalog::query();

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