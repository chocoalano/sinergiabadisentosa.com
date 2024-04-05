<?php

namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUs extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $content=[
            "page-title"=>"PT. Sinergi Abadi Sentosa",
            "page-keywords"=>"",
            "page-description"=>"",
            "header"=>$this->header(),
            "footer"=>$this->footer(),
            "gallery"=>[
                "title"=> "About Us",
                "desc"=> "Looking for a stunning packaging solution for your products? PT. Sinergi Abadi Sentosa is the answer! We are a trusted partner in creating packaging that attracts attention and increases the value of your products.",
                "row-image"=> [asset("content-page/about/about-company-1.jpg"),asset("content-page/about/about-company-2.jpg"),asset("content-page/about/about-company-3.jpg")],
            ],
            "features"=>[
                [
                    'value'=> '47%',
                    'title'=> 'Happy Clients',
                ],
                [
                    'value'=> '47%',
                    'title'=> 'Customer trust',
                ]
            ]
        ];
        return view("about", compact('content'));
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
