<?php

namespace App\Repositories\Contracts\Part;

use App\Repositories\Utilities\Paginate;

interface PartNumberExtensionRepositoryInterface
{
	public function create(array $data);

	public function findById($id);

	public function all();

	public function paginate(Paginate $paginate);
}