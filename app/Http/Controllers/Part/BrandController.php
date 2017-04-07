<?php

namespace App\Http\Controllers\Part;

use Illuminate\Http\Request;
use App\Services\Part\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\Part\StoreBrand;
use App\Http\Requests\Part\UpdateBrand;
use App\Transformers\Part\BrandTransformer;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class BrandController extends Controller
{
    protected $brandService;

    public function __construct(Brand $brandService)
    {
        parent::__construct();
        //$this->middleware('auth');
        $this->brandService = $brandService;
    }

    public function index(Request $request)
    {
        $paginator = $this->brandService->listBrands($request->only([
            'search', 'sort', 'order_by', 'page', 'per_page'
        ]));

        $resource = new Collection($paginator->getDictionary(), 
            new BrandTransformer, 'brands');

        return response()->json($this->fractal->createData($resource)->toArray());
    }

    public function showCreateForm(Request $request)
    {
        return view('part.brand.details');
    }

    public function store(StoreBrand $request)
    {
        $brand = $this->brandService->createNew($request->only([
            'name', 'description'
        ]));

        $resource = new Item($brand, new BrandTransformer, 'brands');

        return response()->json($this->fractal->createData($resource)->toArray());
    }

    public function edit(Request $request, $name)
    {
        $brand = $this->brandService->findByName($name);

        return view('part.brand.details', compact(
            'brand'
        ));
    }

    public function update(UpdateBrand $request)
    {
        $brand = $this->brandService->findByName($request->get('name'));
        $brand->update($request->only(['description']));
        $brand->save();

        return redirect()->route('list-brands')->with('message', 'Brand has been updated.');
    }
}
