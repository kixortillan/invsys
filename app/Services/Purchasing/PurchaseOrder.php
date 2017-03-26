<?php

namespace App\Services\Purchasing;

use SplFileInfo;
use League\Csv\Reader;

class PurchaseOrder
{
	public function __construct()
	{

	}

	public function openCsvFile(SplFileInfo $file)
	{
		return Reader::createFromPath($file);
	}

	// public function validatePurchaseOrder(Reader $csv)
	// {
	// 	$csv->each(function($row){
	// 		$this->
	// 	});
	// }
}