<?php

namespace App\Repositories\Contracts\Parts;

use App\Repositories\Utilities\Paginate;

interface CatalogRepositoryInterface
{
	public function create(array $data);

	public function paginate(Paginate $paginate);
}