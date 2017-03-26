<?php

namespace App\Services\Part;

use App\Repositories\Utilities\Paginate;
use App\Repositories\Contracts\Part\BrandRepositoryInterface;

class Brand
{
	protected $repo;

	protected $perPage = 10;

	public function __construct(BrandRepositoryInterface $repo)
	{
		$this->repo = $repo;
	}

	public function createNew(array $data)
	{
		$this->repo->create($data);
	}

	public function findByName(string $name)
	{
		return $this->repo->findById($name);
	}

	public function listBrands(array $settings)
	{
		return $this->repo->paginate(
			(new Paginate())->setSearch($settings['search'])
							->setSearchColumns([
								'name', 'description'
							])->setPerPage($this->perPage)
							->setSort($settings['sort'])
							->setOrder($settings['order_by'])
		);
	}
}