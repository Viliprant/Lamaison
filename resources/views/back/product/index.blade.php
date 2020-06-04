@extends('layouts.master')

@section('title')
Administration
@endsection

@section('content')

    @include('back.partials.flash')

    <div class="d-flex justify-content-center">
        <div >{{ $products->links() }}</div>    
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Prix (€)</th>
                <th scope="col">Status</th>
                <th scope="col">Mettre à jour</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td class="align-middle">{{$product->title}}</td>
                    <td class="align-middle">{{$product->category->title}}</td>
                    <td class="align-middle">{{$product->price}}</td>
                    <td class="align-middle">{{$product->status}}</td>
                    <td><a class="nav-link" href="{{route('admin.edit', $product)}}">Mettre à jour</a></td>
                    <td><a class="nav-link" href="{{route('admin.destroy', $product)}}">Supprimer</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        <div >{{ $products->links() }}</div>    
    </div>

@endsection

