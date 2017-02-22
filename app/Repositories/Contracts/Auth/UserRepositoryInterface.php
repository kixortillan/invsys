<?php

namespace App\Repositories\Contracts\Auth;

use App\Repositories\Utilities\Paginate;

interface UserRepositoryInterface
{
	public function findByEmail($email);

	public function findById($id);

	public function findByVerifyToken($id, $token);

	public function paginate(Paginate $paginate);
}