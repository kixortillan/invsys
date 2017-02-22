<?php

namespace App\Services\Parts;

use Exception;
use App\Repositories\Utilities\Paginate;
use App\Repositories\Contracts\Parts\PartNumberExtensionRepositoryInterface;

class PartNumberExtension
{
	protected $repo;	
	protected $perPage = 10;

	public function __construct(PartNumberExtensionRepositoryInterface $repo)
	{
		$this->repo = $repo;
	}

	public function createNew(array $data)
	{
		$this->repo->create($data);
	}

	public function listPnes(array $settings)
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

	public function listAllPnes()
	{
		return $this->repo->all();
	}

	public function findByCode($code)
	{
		return $this->repo->findById($code);
	}
}