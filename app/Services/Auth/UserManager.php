<?php

namespace App\Services\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Repositories\Utilities\Paginate;
use App\Repositories\Contracts\Auth\UserRepositoryInterface;

class UserManager
{
	protected $repo;

	protected $perPage = 2;

	public function __construct(UserRepositoryInterface $repo)
	{
		$this->repo = $repo;
	}

	public function listUsers(array $settings)
	{
		return $this->repo->paginate(
			(new Paginate())->setSearch($settings['search'])
							->setSearchColumns([
								'name', 'desc'
							])->setPerPage($this->perPage)
							->setSort($settings['sort'])
							->setOrder($settings['order_by'])
		);
	}

	public function user($id)
	{
		return $this->repo->findById($id);
	}

	public function userPermission(User $user)
	{
		$user->access();
	}

	public function permissionByGroupForUser(User $user)
	{
		$groups = $user->groups()->get();

		$permission = collect([]);

		foreach($groups as $group){
			$permission->put($group->name, $group->access()->get());
		}

		return $permission;
	}
}