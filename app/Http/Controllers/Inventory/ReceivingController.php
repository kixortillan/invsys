<?php

namespace App\Http\Controllers\Inventory;

use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Models\Inventory\ReceivingReport;
use App\Models\Inventory\ReceivingReportSku;
use App\Transformers\Inventory\ReceivingReportTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReceivingController extends Controller
{
	private $fractal;

    public function __construct()
    {
    	$this->fractal = new Manager();
    }

    // public function showCreateForm(Request $request)
    // {
    // 	return view('inventory.receiving.details');
    // }
    
    public function index(Request $request)
    {
		$query = ReceivingReport::query();

		if(!empty($request->get('search'))){
			foreach(['transaction_id', 'invoice_num', 'official_receipt_num'] as $col){
				$query->orWhere($col, "LIKE", $request->get('search'));
			}
		}

		$query->skip(($request->get('page') - 1) * 10);
		$query->orderBy('id', 'desc');

		$paginator = $query->paginate(10);

		//dd($paginator);

		$resource = new Collection($paginator->getDictionary(), new ReceivingReportTransformer, 'receiving_report');

		$resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

		return response()->json($this->fractal->createData($resource)->toArray());
    }

    public function store(Request $request)
    {
    	$itemList = collect(array_filter($request->get('item_list'), function($item){
    		if(empty($item[0])){
    			return false;
    		}

    		return true;
    	}));

    	$totalCost = 0;

    	$itemList->each(function($item) use (&$totalCost){
    		$totalCost += $item[2] * $item[1];
    	});

    	$report = ReceivingReport::create([
    		'transaction_id' => 'RR' . '-' . date('Ymd') . '-' . strtotime('now'),
    		'invoice_num' => $request->get('invoice_num'),
    		'official_receipt_num' => $request->get('or_num'),
    		'total_cost' => $totalCost
		]);		

		$itemList->each(function($item) use ($report) {
			$sku = explode('-', $item[0]);

			ReceivingReportSku::create([
				'receiving_report_id' => $report->id,
				'part_number' => $sku[0],
				'pne_code' => $sku[1],
				'quantity' => $item[1],
				'cost' => $item[2],
				'average_cost' => '0'
			]);
		});
    	
    	$resource = new Item($report, new ReceivingReportTransformer, 'receiving_report');

    	return response()->json($this->fractal->createData($resource)->toArray());
    }
}
