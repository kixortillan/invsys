<?php

namespace App\Repositories\Eloquent\Auth;

use App\User;
use App\Repositories\Utilities\Paginate;
use App\Repositories\Contracts\Auth\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
	public function __construct()
	{
		//
	}

	public function findByEmail($email)
	{
		return User::where('email', $email)->first();
	}

	public function findById($id)
	{
		return User::findOrFail($id);
	}

	public function findByVerifyToken($id, $token)
	{
		return User::where('verify_token', $token)
								->where('id', $id)->first();
	}

	public function paginate(Paginate $paginate)
	{
		$query = User::query();

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