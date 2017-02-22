<?php

namespace App\Repositories\Contracts\Auth;

use App\Repositories\Utilities\Paginate;

interface GroupRepositoryInterface
{
	public function findById($id);

	public function paginate(Paginate $paginate);
}