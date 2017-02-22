<?php

namespace App\Services\Auth;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\Contracts\UserRepositoryInterface;

class Registration
{

	protected $userRepo;

	protected $user;

	public function __construct(UserRepositoryInterface $userRepo)
	{
		$this->userRepo = $userRepo;
	}

	public function verify($id, $token)
	{
		$this->user = $this->userRepo->findByVerifyToken($id, $token);

		if(is_null($this->user)){
			//User not found
			return abort(Response::HTTP_NOT_FOUND);
		}

		if($this->user->isVerified()){
			//User is already verified
			return abort(Response::HTTP_NOT_FOUND);
		}

		/*
		 | Verify user and log in automatically
		 | which allows user to land directly to
		 | dashboard page
		 */
		$this->user->verify();
		Auth::guard()->login($this->user);
		
		return redirect('/dashboard');
	}

}