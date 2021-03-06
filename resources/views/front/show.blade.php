@extends('layouts.master')

@section('title')
{{ $product->title }}
@endsection

@section('content')
    <div class="container d-flex flex-column">
        <div> 
            <a href="{{route('home')}}">Boutique</a>
            @if($product->code === 'solde')
            <span> > </span>
            <a href="{{route('show_solde', $product->id)}}">Solde</a>
            @endif
            <span> > </span>
            <a href="{{route('show_category', $product->category->id)}}">{{$product->category->title}}</a>
        </div>
    </div>

    <div class="d-flex flex-row py-5">

        <div class="d-flex flex-column align-items-center col-sm-3">
            <p>Produits similaires :</p>
            @foreach ($similarProducts as $similarProduct)
                <img src="{{asset('images/' . $similarProduct->url_image)}}" alt="{{$similarProduct->title}}" class="img-thumbnail miniature">
            @endforeach
        </div>

        <div class="col-sm-6 d-flex align-items-center justify-content-center">
            <img src="{{asset('images/' . $product->url_image)}}" alt="{{$product->title}}" class="img-thumbnail img-show">
        </div>

        <div class="d-flex flex-column col-sm-3">
            <p>
                <span class="d-block">{{$product->title}}</span>
                <span class="d-block">{{'ref : ' . $product->reference}}</span>
                <span class="d-block">{{$product->price . ' euros'}}</span>
            </p>
            <div class="form-group">
                <select class="w-100">
                    <option disabled selected>Taille</option>
                    <option value="46">46</option>
                    <option value="48">48</option>
                    <option value="50">50</option>
                    <option value="52">52</option>
                </select>
            </div>
        </div>
    </div>

    <div>
        <p class="font-weight-bold">Description:</p>
        <p>{{$product->description}}</p>
    </div>
@endsection

