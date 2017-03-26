<?php

namespace App\Services\Inventory;

use SplFileInfo;
use League\Csv\Reader;
use App\Repositories\Utilities\Paginate;
use App\Repositories\Contracts\Inventory\StockKeepingUnitRepositoryInterface;
use App\Repositories\Contracts\Utilities\CurrencyRepositoryInterface;

class StockKeepingUnit
{

	protected $skuRepo;

	protected $currencyRepo;

	protected $perPage = 10;

	public function __construct(StockKeepingUnitRepositoryInterface $skuRepo, 
		CurrencyRepositoryInterface $currencyRepo)
	{
		$this->skuRepo = $skuRepo;
		$this->currencyRepo = $currencyRepo;
	}

	public function createNew(array $data)
	{	
		return $this->skuRepo->create($data);
	}

	public function listStockKeepingUnits(array $settings)
	{
		return $this->skuRepo->paginate(
			(new Paginate())->setSearch($settings['search'])
							->setSearchColumns([
								'part_number', 'pne_code', 'brand'
							])->setPerPage($this->perPage)
							->setSort($settings['sort'])
							->setOrder($settings['order_by'])
		);
	}

	public function findById(int $id)
	{
		return $this->skuRepo->findById($id);
	}

	public function uploadCsv(SplFileInfo $file)
	{
		//dd($file);
		$csv = Reader::createFromPath($file->getRealPath());

		$csv->each(function($row){
			
		});
		
	}

	public function getSupportedCurrencies()
	{
		return $this->currencyRepo->all();
	}

	public function searchMatchingSku(array $settings)
	{
		return $this->skuRepo->paginate(
			(new Paginate())->setSearch($settings['search'])
							->setSearchColumns([
								'part_number', 'pne_code'
							])->setPerPage($this->perPage)
		);
	}
}