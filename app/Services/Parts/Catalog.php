<?php

namespace App\Services\Parts;

use SplFileInfo;
use League\Csv\Reader;
use App\Repositories\Utilities\Paginate;
use App\Repositories\Contracts\Parts\CatalogRepositoryInterface;

class Catalog
{

	protected $repo;

	protected $perPage = 10;

	public function __construct(CatalogRepositoryInterface $repo)
	{
		$this->repo = $repo;
	}

	public function createNew(array $data)
	{	
		return $this->repo->create($data);
	}

	public function listCatalogs(array $settings)
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

	public function findById(int $id)
	{
		return $this->repo->findById($id);
	}

	public function uploadCsv(SplFileInfo $file)
	{
		//dd($file);
		$csv = Reader::createFromPath($file->getRealPath());
		
	}
}