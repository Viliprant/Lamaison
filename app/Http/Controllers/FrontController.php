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
        $products = Product::paginate($this->paginate);
        return view('front.index', ['products' => $products]);
    }

    public function showCategory(int $id){
        $category = Category::find($id);
        $products = $category->products()->paginate($this->paginate);
        return view('front.index', ['products' => $products]);
    }

    public function showSolde(){
        $products = Product::where('code', 'solde')->paginate($this->paginate);
        return view('front.index', ['products' => $products]);
    }
    
}
