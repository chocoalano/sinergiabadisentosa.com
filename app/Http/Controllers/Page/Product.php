<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Product extends Controller
{
    public function index(Request $request)
    {
        $category = \App\Models\Services\Product::select('category')->distinct()->get();
        if($request->input('search')){
            $search = $request->input('search');
            $product = \App\Models\Services\Product::where(function($q)use($search){
                $q
                ->where('slug','like','%'.$search.'%')
                ->orWhere('category','like','%'.$search.'%')
                ->orWhere('title','like','%'.$search.'%')
                ->orWhere('description','like','%'.$search.'%');
            })->latest()->paginate(10);
        }else{
            $product = \App\Models\Services\Product::latest()->paginate(10);
        }
        $content=[
            "page-title"=>"Our Product",
            "page-keywords"=>"Produk Manufaktur Kontrak, Jasa Manufaktur Kontrak, Pabrikasi Kontrak, Penyewaan Manufaktur, Solusi Manufaktur Kontrak, Layanan Produksi Kontrak, Pengembangan Produk Kontrak, Spesialisasi Manufaktur Kontrak, Pilihan Produk Kontrak, Katalog Produk Kontrak, Portofolio Manufaktur Kontrak, Inovasi Manufaktur Kontrak, Produk Khusus Kontrak, Desain Produk Kontrak, Manufaktur Kontrak Terpadu, Efisiensi Produksi Kontrak, Produk Berkualitas Kontrak, Pemenuhan Pesanan Kontrak, Layanan Custom Manufaktur, Keunggulan Kompetitif Manufaktur Kontrak",
            "page-description"=>"Selamat datang di halaman produk perusahaan kami, spesialis dalam layanan manufaktur kontrak yang inovatif dan terpercaya. Di sini, kami menawarkan beragam produk berkualitas tinggi yang dirancang dan diproduksi dengan presisi untuk memenuhi kebutuhan bisnis Anda. Dari komponen teknis hingga produk jadi, kami menawarkan solusi manufaktur kontrak yang sesuai dengan standar tertinggi industri. Kami menawarkan berbagai produk yang dapat disesuaikan sesuai dengan kebutuhan spesifik Anda. Dengan dukungan dari tim ahli kami, kami mampu menghadirkan produk-produk yang berkualitas tinggi dan tepat waktu, membantu Anda mencapai tujuan bisnis Anda dengan efisiensi dan keunggulan kompetitif. Telusuri berbagai produk kami yang mencakup berbagai industri, mulai dari elektronik, otomotif, hingga peralatan medis. Dengan fokus pada inovasi, keandalan, dan kualitas, kami siap menjadi mitra manufaktur kontrak yang andal untuk memenuhi kebutuhan produksi Anda. Temukan produk-produk unggulan kami dan hubungi kami hari ini untuk konsultasi lebih lanjut dan mulailah kerja sama yang sukses dalam mewujudkan produk berkualitas untuk pasar global. Pastikan untuk menyesuaikan deskripsi ini dengan produk dan layanan yang ditawarkan oleh perusahaan manufaktur kontrak Anda. Hal ini akan membantu menarik perhatian pengunjung dan potensial pelanggan yang mencari solusi manufaktur kontrak.",
            "header"=>$this->header(),
            "footer"=>$this->footer(),
            "jumbotron"=>[
                "title"=> "Product Projects",
                "description"=> "Latest updates and Hand-picked resources."
            ],
            "product"=>$product, 
            "category"=>$category
        ];
        return view("product", compact("content"));
    }
    public function show(string $slug)
    {
        $product = \App\Models\Services\Product::where("slug", $slug)->first();
        $productRelated = \App\Models\Services\Product::where("category", $product->category)->latest()->paginate(10);
        $content=[
            "header"=>$this->header(),
            "footer"=>$this->footer(),
        ];
        return view("product_detail", compact("content", "product", "productRelated"));
    }
}
