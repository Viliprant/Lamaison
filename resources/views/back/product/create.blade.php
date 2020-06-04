@extends('layouts.master')

@section('title')
Administration
@endsection

@section('content')

    <form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col p-3">
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Titre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title">
                        {{-- DISPLAY ERROR --}}
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="5" name="description"></textarea>
                    {{-- DISPLAY ERROR --}}
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Prix</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="price" name="price">
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
                            <option value="1">Homme</option>
                            <option value="2">Femme</option>
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
                            <option value="46">46</option>
                            <option value="48">48</option>
                            <option value="50">50</option>
                            <option value="52">52</option>
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
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col p-3">

                <div class="form-group">
                    <label class="d-block">Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="published" value="published" checked>
                        <label class="form-check-label" for="published">Publié</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="draft" value="draft">
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
                      <option value="new">Nouveau</option>
                      <option value="solde">Solde</option>
                    </select>
                    {{-- DISPLAY ERROR --}}
                    @error('code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                <div class="form-group">
                    <label for="reference">Référence</label>
                    <input type="text" class="form-control" id="reference" name="reference">
                    {{-- DISPLAY ERROR --}}
                    @error('reference')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>
        </div>

        <input type="submit" value="Ajouter" class="btn btn-lg btn-primary w-25">
    </form>
@endsection
