<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;

class PrivacyPolicy extends Controller
{
    public function index()
    {
        $pp = \App\Models\Services\PrivacyPolicy::where('publish', 1)->orderBy('created_at','desc')->first();
        $content=[
            "page-title"=>"Privacy & policy",
            "page-keywords"=>"",
            "page-description"=>"",
            "header"=>$this->header(),
            "footer"=>$this->footer(),
        ];
        return view("privacyPolicy", compact("content", "pp"));
    }
}
