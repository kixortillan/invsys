<?php

namespace App\Repositories\Contracts;

use App\Repositories\Utilities\Paginate;

interface RepositoryInterface
{
	public function paginate(Paginate $paginate);

	public function create(array $data);
}