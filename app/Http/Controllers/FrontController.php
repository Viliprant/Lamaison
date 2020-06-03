<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Category;

class FrontController extends Controller
{
    private $paginate = 6;

    public function __construct(){
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('title', 'id');
            $view->with('categories', $categories);
        });
    }


    public function index(){
        $products = Product::with('category')->paginate($this->paginate);
        return view('front.index', ['products' => $products]);
    }

    public function showCategory(int $id){
        $products = Product::with('category')->where('category_id', $id)->paginate($this->paginate);
        return view('front.index', ['products' => $products]);
    }

    public function showSolde(){
        $products = Product::with('category')->where('code', 'solde')->paginate($this->paginate);
        return view('front.index', ['products' => $products]);
    }

    public function showProduct(int $id){
        $product = Product::with('category')->find($id);
        return view('front.show', ['product' => $product]);
    }
    
}
