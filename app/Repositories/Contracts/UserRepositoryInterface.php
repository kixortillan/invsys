<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
	public function findByEmail($email);

	public function findById($id);

	public function findByVerifyToken($id, $token);
}