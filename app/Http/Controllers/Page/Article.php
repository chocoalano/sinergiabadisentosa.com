<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;
use App\Models\Blog\PostTag;
use Illuminate\Http\Request;

class Article extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $newarticles = Post::with('category', 'tags')->whereNotNull('cover')->latest('id')->first();
        $tags = PostTag::orderBy("created_at","desc")->get();
        if($request->input('search')){
            $search = $request->input('search');
            $articles = Post::with('category', 'tags')->where(function($q) use ($search){
                $q
                ->where('keywords', 'like', "%".$search."%")
                ->orWhere('title', 'like', "%".$search."%")
                ->orWhere('slug', 'like', "%".$search."%")
                ->orWhere('description', 'like', "%".$search."%")
                ->orWhere('content', 'like', "%".$search."%");
            })->orWhereHas('category', function($q) use ($search) {
                $q->where('name', 'like', "%".$search."%");
            })->orWhereHas('tags', function($q) use ($search) {
                $q->where('name', 'like', "%".$search."%");
            })->orderBy("created_at","desc")->paginate(10);
        }else{
            $articles = Post::with('category', 'tags')->orderBy("created_at","desc")->paginate(10);
        }
        $content=[
            "page-title"=>"Article",
            "page-keywords"=>"Manufaktur Kontrak, Jasa Manufaktur Kontrak, Layanan Manufaktur Kontrak, Industri Manufaktur Kontrak, Solusi Manufaktur Kontrak, Pabrikasi Kontrak, Mitra Manufaktur Kontrak, Produsen Kontrak, Layanan Penyewaan Manufaktur, Keuntungan Manufaktur Kontrak, Kualitas Manufaktur Kontrak, Efisiensi Manufaktur Kontrak, Inovasi Manufaktur Kontrak, Pengembangan Produk Kontrak, Kemitraan Manufaktur Kontrak, Biaya Manufaktur Kontrak, Manufaktur Kontrak Terbaik, Pengalaman Manufaktur Kontrak, Pemenuhan Pesanan Kontrak, Manufaktur Kontrak Khusus",
            "page-description"=>"Selamat datang di indeks artikel perusahaan Manufacturing on Contract kami, tempat di mana Anda dapat menemukan beragam informasi mendalam tentang industri manufaktur kontrak. Dari proses produksi hingga pengelolaan rantai pasokan, kami menyajikan berbagai topik yang relevan untuk membantu Anda memahami lebih dalam tentang dunia manufaktur kontrak. Temukan panduan praktis, analisis industri, studi kasus, dan berita terbaru yang akan memperkaya pemahaman Anda tentang layanan dan solusi yang ditawarkan oleh perusahaan kami. Mari jelajahi dan temukan wawasan yang berharga untuk mendukung keberhasilan dan pertumbuhan bisnis Anda dalam industri manufaktur kontrak(MAKLON).",
            "header"=>$this->header(),
            "footer"=>$this->footer(),
            "jumbotron"=>[
                "title"=> "Newsroom Articles",
                "description"=> "Latest updates and Hand-picked resources."
            ],
            "newarticles"=> $newarticles,
            "articles"=> $articles,
            "tags"=> $tags,
        ];
        return view("article", compact('content'));
    }
    public function show(string $id)
    {
        $articleDetail = Post::where('slug', $id)->first();
        $articleRelated = Post::with('category','tags')
        ->where('id', '!=', $articleDetail->id)
        ->whereHas('category', function($q) use ($articleDetail) {
            $q->where('id', $articleDetail->category_id);
        })
        ->orderBy('created_at','desc')
        ->paginate(10);
        $content=[
            "header"=>$this->header(),
            "footer"=>$this->footer(),
            "article"=>$articleDetail,
            "articleRelated"=>$articleRelated,
        ];
        return view("article_detail", compact('content'));
    }
}
