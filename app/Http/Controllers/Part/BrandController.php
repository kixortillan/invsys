<?php

namespace App\Http\Controllers\Part;

use Illuminate\Http\Request;
use App\Services\Part\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\Part\StoreBrand;
use App\Http\Requests\Part\UpdateBrand;

class BrandController extends Controller
{
    protected $brandService;

    public function __construct(Brand $brandService)
    {
        $this->middleware('auth');
        $this->brandService = $brandService;
    }

    public function index(Request $request)
    {
        $brands = $this->brandService->listBrands($request->only([
            'search', 'sort', 'order_by',
        ]));

        return view('part.brand.index', compact(
            'brands'
        ));
    }

    public function showCreateForm(Request $request)
    {
        return view('part.brand.details');
    }

    public function store(StoreBrand $request)
    {
        $this->brandService->createNew($request->only([
            'name', 'description'
        ]));

        return redirect()->route('list-brands')->with('message', 'A new brand has been added successfully.');
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
