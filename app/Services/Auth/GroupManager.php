<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;
use App\Repositories\Utilities\Paginate;
use App\Repositories\Contracts\Auth\GroupRepositoryInterface;

class GroupManager
{
	protected $repo;

	protected $perPage = 2;

	public function __construct(GroupRepositoryInterface $repo)
	{
		$this->repo = $repo;
	}

	public function listGroups(array $settings)
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
}