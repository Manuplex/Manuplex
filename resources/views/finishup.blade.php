@extends('App.template')
@section('title','Remerciements')
@section('content')
<body>
    <div class="container  min-vh-100 d-flex justify-content-center align-items-center grid">
        <h1>
           Merci de votre inscription !!!
        </h1>
    <div class="container">
       <div class="col-auto"> 
       <a class="form-control bg-primary ts-white"  href="{{ $user->code_link }}">{{ $user->code_link }}</a>
       </div>
        <button class="form-control" id="copy_board"><i class="fa-solid fa-copy" style="color: #74C0FC;"></i></button>
    </div>
    </div>
    <button class="btn btn-primary" href="{{route('myrapport')}}">Voir les résultats</button>
    <script src="public/scriptprize.js"></script>
    @endsection
