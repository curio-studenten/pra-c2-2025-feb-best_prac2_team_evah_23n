<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class ManualController extends Controller
{
    public function show($brand_id, $brand_slug, $manual_id )
    {
        $brand = Brand::findOrFail($brand_id);
        $manual = Manual::findOrFail($manual_id);

        return view('pages/manual_view', [
            "manual" => $manual,
            "brand" => $brand,
        ]);
    }

    public function topManuals()
    {
        $topManuals = Manual::orderBy('views', 'desc')->take(10)->get();

        return view('top-manuals', compact('topManuals'));
    }

    public function showBrandManuals($brandId, $brandNameUrlEncoded)
    {
        $brand = Brand::findOrFail($brandId);
        $manuals = Manual::where('brand_id', $brandId)->get();

        $topManuals = Manual::where('brand_id', $brandId)
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();

        return view('pages/manual_list', compact('brand', 'manuals', 'topManuals'));
    }
}
