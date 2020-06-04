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
                    <td><a class="nav-link" href="{{route('admin.edit', $product->id)}}">Mettre à jour</a></td>
                    <td class="align-middle">
                        <form class="delete" method="POST" action="{{route('admin.destroy', $product->id)}}">
                            @method('DELETE')
                            {{--
                        token de sécurité qui permet de sécuriser les formulaires 
                        si ce token n'est pas présent Laravel ne traitera pas le formulaire permet d'éviter les attaques csrf ou 
                        attaque par formulaire 
                        --}}
                            @csrf
                            <input type="submit" class="text-danger remove-button-style" value="Supprimer"/>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        <div >{{ $products->links() }}</div>    
    </div>

@endsection

