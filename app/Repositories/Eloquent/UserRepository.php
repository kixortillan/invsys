<?php

namespace App\Repositories\Eloquent;

use App\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
	protected $eloquent;

	public function __construct(User $user)
	{
		$this->eloquent = $user;
	}

	public function findByEmail($email)
	{
		return $this->eloquent->where('email', $email)->first();
	}

	public function findById($id)
	{
		return $this->eloquent->find($id);
	}

	public function findByVerifyToken($id, $token)
	{
		return $this->eloquent->where('verify_token', $token)
								->where('id', $id)->first();
	}
}