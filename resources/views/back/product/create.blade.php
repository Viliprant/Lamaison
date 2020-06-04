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
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="5" name="description"></textarea>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Prix</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label">Catégorie</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="category" name="category">
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>
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
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>
            </div>

            <div class="col p-3">

                <div class="form-group">
                    <label class="d-block">Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="published" value="published" checked>
                        <label class="form-check-label" for="published">
                        Publié
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="draft" value="draft">
                        <label class="form-check-label" for="draft">
                        Brouillon
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="code">Code produit</label>
                    <select class="form-control" id="code" name="code">
                      <option value="new">Nouveau</option>
                      <option value="solde">Solde</option>
                    </select>
                  </div>

                <div class="form-group">
                    <label for="reference">Référence</label>
                    <input type="text" class="form-control" id="reference" name="reference">
                </div>

            </div>
        </div>

        <input type="submit" value="Ajouter" class="btn btn-lg btn-primary w-25">
    </form>
@endsection
