@extends('layouts.master')

@section('title')
Accueil
@endsection

@section('content')
{{-- pagination de Laravel --}}

<div class="d-flex justify-content-around align-items-center">
    <div></div>
    <div >{{ $products->links() }}</div>
    <div><p>{{ 'Articles : ' . $products->total() . ' résultats' }}</p></div>    
</div>

<div class="row align-items-baseline"> <!-- Class perso pour grid-->

@forelse($products as $product)
    
    <div class="col-lg-3 col-md-4">
        <div class="list-item-card">
            <img src="{{asset('images/' . $product->url_image )}}" alt="{{$product->title}}" class="img-thumbnail resize">
            <div class="list-item-details">
                <p><a href="{{route('show_product', $product->id)}}">{{$product->title}}</a></p>
                <p>{{'Prix : ' . $product->price . ' €'}}</p>
            </div>
        </div>
    </div>

@empty
@endforelse

</div>

@endsection

