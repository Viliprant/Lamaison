@extends('layouts.master')

@section('title')
Accueil
@endsection

@section('content')
{{-- pagination de Laravel --}}

<div class="d-flex justify-content-around align-items-center">
    <div></div>
    <div >{{ $products->links() }}</div>
    <div><p>{{ 'homme : ' . $products->total() . ' résultats' }}</p></div>
    
    
</div>

@forelse($products as $product)
    
    <p>{{$product->title}}</p>

@empty
@endforelse

@endsection
