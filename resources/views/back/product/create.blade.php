@extends('layouts.master')

@section('title')
Administration
@endsection

@section('content')

    {{-- On change l'action en fonction de la présence d'un produit (Création/Modification) --}}
    @if(isset($product))
        <form action="{{route('admin.update', $product->id)}}" method="post" enctype="multipart/form-data">
            @method('PUT')
    @else
        <form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
    @endif

        @csrf
        <div class="form-row">
            <div class="col p-3">
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Titre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" value="{{isset($product) ? $product->title : old('title') }}">
                        {{-- DISPLAY ERROR --}}
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="5" name="description">{{isset($product) ? $product->description :  old('description') }}</textarea>
                    {{-- DISPLAY ERROR --}}
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Prix</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="price" name="price" value="{{isset($product) ? $product->price : old('price') }}">
                        {{-- DISPLAY ERROR --}}
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">Catégorie</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="category_id" name="category_id">
                            <option value="1" {{isset($product) && $product->category->id === 1 || old('category_id') == 1 ? 'selected' : '' }}>Homme</option>
                            <option value="2" {{isset($product) && $product->category->id === 2 || old('category_id') == 2 ? 'selected' : '' }}>Femme</option>
                        </select>
                        {{-- DISPLAY ERROR --}}
                        @error('category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="size" class="col-sm-2 col-form-label">Taille</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="size" name="size">
                            <option value="46" {{isset($product) && $product->size === '46' || old('size') === '46' ? 'selected' : '' }}>46</option>
                            <option value="48" {{isset($product) && $product->size === '48' || old('size') === '48' ? 'selected' : '' }}>48</option>
                            <option value="50" {{isset($product) && $product->size === '50' || old('size') === '50' ? 'selected' : '' }}>50</option>
                            <option value="52" {{isset($product) && $product->size === '52' || old('size') === '52' ? 'selected' : '' }}>52</option>
                        </select>
                        {{-- DISPLAY ERROR --}}
                        @error('size')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="url_image" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="url_image" name="url_image">
                        {{-- DISPLAY ERROR --}}
                        @error('url_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col p-3">

                <div class="form-group">
                    <label class="d-block">Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="published" value="published" {{isset($product) && $product->status === 'published' || old('status') === 'published' ? 'checked' : '' }}>
                        <label class="form-check-label" for="published">Publié</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="draft" value="draft" {{isset($product) && $product->status === 'draft' || old('status') === 'draft' ? 'checked' : '' }}>
                        <label class="form-check-label" for="draft">Brouillon</label>
                    </div>
                    {{-- DISPLAY ERROR --}}
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="code">Code produit</label>
                    <select class="form-control" id="code" name="code">
                      <option value="new" {{isset($product) && $product->code === 'new' || old('code') === 'new' ? 'selected' : '' }}>Nouveau</option>
                      <option value="solde" {{isset($product) && $product->code === 'solde' || old('code') === 'solde' ? 'selected' : '' }}>Solde</option>
                    </select>
                    {{-- DISPLAY ERROR --}}
                    @error('code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                <div class="form-group">
                    <label for="reference">Référence</label>
                    <input type="text" class="form-control" id="reference" name="reference" value="{{isset($product) ? $product->reference : old('reference') }}">
                    {{-- DISPLAY ERROR --}}
                    @error('reference')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>
        </div>

        <input type="submit" value="{{!isset($product) ? 'Ajouter' : 'Modifier' }}" class="btn btn-lg btn-primary w-25">
    </form>
@endsection
