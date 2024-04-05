<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Services\Product;
use App\Models\Services\Superiority;
use Illuminate\Http\Request;

class Services extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $superiority = Superiority::all();
        $product = Product::all();
        // dd($product, $superiority);
        $content=[
            "page-title"=>"Services",
            "page-keywords"=>"",
            "page-description"=>"",
            "header"=>$this->header(),
            "footer"=>$this->footer(),
            "gallery"=>[
                "title"=> "Design-led and user-centric strategies can impact people's life.",
                "img-1"=> asset('content-page/services/img-1.jpg'),
                "img-2"=> asset('content-page/services/img-2.jpg'),
            ],
            "icon-blocks"=>[
                "text-cap"=> "What we do",
                "h2-title"=> "Since 2023, we have helped 25 companies launch over 1k incredible products"
            ],
            "clients"=>[
                "title"=> "As seen on...",
                "img-client"=> []
            ],
            "product"=>$product,
            "superiority"=>$superiority,
        ];
        return view("services", compact('content'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
