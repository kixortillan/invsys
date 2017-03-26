<?php

namespace App\Repositories\Contracts\Inventory;

use App\Repositories\Utilities\Paginate;

interface StockKeepingUnitRepositoryInterface
{
	public function create(array $data);

	public function paginate(Paginate $paginate);

	public function findById(int $id);
}