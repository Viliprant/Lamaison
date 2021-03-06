<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use Storage;

class ProductController extends Controller
{

    private $paginate = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->paginate($this->paginate);
        return view('back.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation des champs
        $validator = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|integer',
            'size' => 'required|in:46,48,50,52',
            'status' => 'required|in:published,draft',
            'reference' => 'required|size:13',
            'code' => 'required|in:new,solde',
            'url_image' => 'required|image|max:3000',
        ]);

        // Insertions des données qui sont "fillables" (url_image n'est pas fillable pour la gérer après)
        $product = Product::create($request->all());

        // Gestion de l'image
        if ($request->file('url_image')) {

            // enregistre dans le store l'image et en même temps on récupère le
            // nom de l'image créé par Laravel, nom sécurisé
            // 1. Pas d'écrasement d'image avec le même nom.
            // 2. Pas d'injection de script dans le nom de l'image.
            $newUrl = $request->file('url_image')->store('');
            $product->url_image = $newUrl;
            $product->save();
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
            //return redirect()->back()->with(Input::all());
         }

        // Message renvoyé
        return redirect()->route('admin.index')->with('message', [
            'type' => 'alert-success',
            'content' => 'Le produit a bien été crée.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $product = Product::with('category')->find($id);
        return view('back.product.create', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        // Validation des champs
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|integer',
            'size' => 'required|in:46,48,50,52',
            'status' => 'required|in:published,draft',
            'reference' => 'required|size:13',
            'code' => 'required|in:new,solde',
            'url_image' => 'image|max:3000', // On n'oblige pas le changement d'image
        ]);

        $product = Product::with('category')->find($id);

        $product->update($request->all());

        // Gestion de l'image
        if ($request->file('url_image')) {

            // On supprime physiquement l'image
            Storage::disk('local')->delete($product->url_image);

            $newUrl = $request->file('url_image')->store('');
            $product->url_image = $newUrl;
            $product->save();
        }


        // Message renvoyé
        return redirect()->route('admin.index')->with('message', [
            'type' => 'alert-success',
            'content' => 'Le produit a bien été modifié.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $product = Product::with('category')->find($id);

        // On supprime physiquement l'image
        Storage::disk('local')->delete($product->url_image);

        $product->delete();

        return redirect()->route('admin.index')->with('message', [
            'type' => 'alert-success',
            'content' => 'Le produit a bien été supprimé.'
        ]);

    }
}
