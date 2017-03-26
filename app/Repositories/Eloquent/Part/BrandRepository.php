<?php

namespace App\Repositories\Eloquent\Part;

use App\Models\Part\Brand;
use App\Repositories\Utilities\Paginate;
use App\Repositories\Contracts\Part\BrandRepositoryInterface;

class BrandRepository implements BrandRepositoryInterface
{
	public function create(array $data)
	{
		return Brand::create($data);
	}

	public function findById($id)
	{
		return Brand::findOrFail($id);
	}

	public function paginate(Paginate $paginate)
	{
		$query = Brand::query();

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