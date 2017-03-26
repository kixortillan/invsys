<?php

namespace App\Repositories\Eloquent\Inventory;

use App\Models\Inventory\StockKeepingUnit;
use App\Repositories\Utilities\Paginate;
use App\Repositories\Contracts\Inventory\StockKeepingUnitRepositoryInterface;

class StockKeepingUnitRepository implements StockKeepingUnitRepositoryInterface
{
	public function create(array $data)
	{
		return StockKeepingUnit::create($data);
	}

	public function paginate(Paginate $paginate)
	{
		$query = StockKeepingUnit::query();

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

	public function findById(int $id)
	{
		return StockKeepingUnit::findOrFail($id);
	}
}