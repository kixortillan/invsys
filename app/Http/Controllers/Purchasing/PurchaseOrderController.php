<?php

namespace App\Http\Controllers\Purchasing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Purchasing\PurchaseOrder;
use App\Services\Inventory\StockKeepingUnit;

class PurchaseOrderController extends Controller
{

	protected $skuService;

    protected $poService;

    public function __construct(PurchaseOrder $poService, StockKeepingUnit $skuService)
    {
    	$this->middleware('auth');
    	$this->skuService = $skuService;
        $this->poService = $poService;
    }
    
    public function store()
    {
    	
    }

    public function showCreateForm()
    {
    	$currencies = $this->skuService->getSupportedCurrencies()->pluck('code');

    	return view('purchasing.purchase_order.details', compact(
    		'currencies'
		));
    }

    public function uploadPurchaseOrderFile(Request $request)
    {
        $file = $request->file('purchase_order');

        $csv = $this->poService->openCsvFile($file);

        $errors = [];

        $csv->each(function($row) use (&$errors) {
            $sku = $this->skuService->findById($row[0]);

            if($sku == null){
                $errors[] = $row[0];
            }
        });

        if(!empty($errors)){
            return redirect()->back()
                        ->withError('');
        }

        return view('');
    }
}
