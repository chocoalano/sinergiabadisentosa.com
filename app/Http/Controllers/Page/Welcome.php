<?php

namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;
use App\Models\Services\Product;

class Welcome extends Controller
{
    public function index()
    {
        $products = Product::all();
        $content=[
            "page-title"=>"home",
            "page-keywords"=>"Kemasan kreatif, Desain kemasan, Produsen kemasan, Solusi kemasan, Kemasan mewah, Kemasan produk, Kemasan khusus, Desain custom, Inovasi kemasan, Kemasan ramah lingkungan, Kemasan karton, Kemasan plastik, Kemasan makanan, Kemasan minuman, Kemasan farmasi, Kemasan retail, Kemasan e-commerce, Pengemasan dan distribusi, Layanan kemasan terpadu, Desain branding kemasan",
            "page-description"=>"Selamat datang di PT. Sinergi Abadi Sentosa, solusi kemasan terpercaya untuk produk Anda. Kami menyediakan desain kemasan kreatif dan inovatif untuk memenuhi kebutuhan bisnis Anda. Dari kemasan mewah hingga kemasan ramah lingkungan, kami menyediakan beragam solusi untuk berbagai industri. Temukan solusi kemasan khusus yang sesuai dengan merek Anda hari ini.",
            "header"=>$this->header(),
            "footer"=>$this->footer(),
            "hero-content"=>[
                "title"=> "All in one services into a",
                "desc"=>"Wrap Your Dreams in Our Packaging Excellence!"
            ],
            "card-grid"=>[
                "title"=> "How make your product.",
                "list-inline"=> ["Asynchronous collaboration", "Updates and announcements", "Training and team building"],
                "row"=> [
                    [
                        'cover' => 'content-page/home/fiber_small.jpg',
                        'title' => 'Fiber powder drink',
                        'desc' => 'Fiber powder drinks fall into the category of dietary supplements designed to increase fiber intake easily and efficiently.',
                    ],
                    [
                        'cover' => 'content-page/home/collagen_small.jpg',
                        'title' => 'Collagen powder drink',
                        'desc' => 'Collagen powder drinks belong to the category of dietary supplements designed to promote skin, joint, and overall health by providing collagen, a protein found in the body. ',
                    ],
                    [
                        'cover' => 'content-page/home/gandum_small.jpg',
                        'title' => 'Meal replacement powder drink',
                        'desc' => 'Meal replacement powder drinks belong to the category of dietary supplements designed to provide a convenient and nutritionally balanced alternative to traditional meals. ',
                    ],
                    [
                        'cover' => 'content-page/home/protein_small.jpg',
                        'title' => 'Sports Food',
                        'desc' => 'The sports food category encompasses a wide range of products designed to fuel athletes and active individuals before, during, and after physical activity.',
                    ],
                    [
                        'cover' => 'content-page/home/milk_small.jpg',
                        'title' => "Pregnant & breastfeeding mother's milk",
                        'desc' => 'Welcome to our exclusive product category, "Pregnant & Breastfeeding Mothers Milk", which is specially produced by our experienced manufacturers. We understand how important the health of mothers and babies is during pregnancy and breastfeeding.',
                    ],
                ]
            ],
            "features"=>[
                "heading"=> [
                    "title"=>"Our Process",
                    "desc"=> "We have developed a simple process system for you to have your own quality product and start taking a fabulous journey with us. Here’s what we can do for you.",
                ],
                "list-checked"=> ["Satisfaction", "Security", "Continuity"],
                "row"=>[
                    "col-1"=>[
                        "img-browser-devices"=> asset("content-page/home/business_small.jpg"),
                    ],
                    "col-2"=>[
                        "heading"=>[
                            "title"=> "Collaborative development product",
                            "desc"=> "Ease in the process of reaching an agreement",
                        ],
                        "list-checked"=>["We have reliable hands to handle your product requests.", "Customer satisfaction is our priority.", "Always prioritize maintaining product quality"]
                    ],
                ]
            ],
            "work-flow"=>asset('content-page/home/working-flow-01.svg'),
            'stats'=>[
                [
                    'title'=> '47%',
                    'desc'=> 'Happy Clients',
                    'iclass'=> 'bi-arrow-up-short text-info',
                ],
                [
                    'title'=> '23%',
                    'desc'=> 'Customer trust',
                    'iclass'=> 'bi-arrow-up-short text-success',
                ]
            ],
            "card-content"=>[
                "title"=> "Discover more",
                'product'=>$products,
                'card'=>[
                    'text-line'=>'Want to read more?',
                    'text-btn'=>'Go here',
                    'btn-link'=>'#'
                ]
            ]
        ];
        return view("welcome", compact('content'));
    }
}
