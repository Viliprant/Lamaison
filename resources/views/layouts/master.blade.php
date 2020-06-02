<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- <link href="{{asset('css/app.css')}}" rel="stylesheet"> --}}
</head>
<body>
<div class="">
    <div class="row">
        <div class="col-md-12">
           @include('partials.menu')
        </div>
    </div>
    <div class="container py-4">
    <div class="col-md-12">
        @yield('content')
    </div>
    </div>
</div>
@section('scripts')
{{-- <script src="{{asset('js/app.js')}}"></script> --}}
@show

</body>
</html>