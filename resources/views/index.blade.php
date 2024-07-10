@extends('App\template')
@section('title','Inscription')
@section('content')
@sendGA4ClientID
<body>
<div class="container-md min-vh-100 d-flex justify-content-center align-items-center grid">
	 <img src="img\drapeau_bleu.png" alt="" class="order-0 rounded-start-3" style="width:5%; height: 586px;" id="blue_color">
<div class="container d-flex border border-1 rounded-4 p-1 bg-white order-1 ">
	<img src="img/eiffel-siteconcours.png" alt="profitez de la vue, la tour eiffel de paris sous un magnifique ciel bleu"
	class="rounded-3 col-5" id="paris_vil">

	<form method="POST" action="{{ route('register') }}" class="col-8  d-flex flex-column gap-5" enctype="multipart/form-data">	
		@csrf
		<input type="hidden" name="_token" value="{{ csrf_token() }}" class="form-control">
		<div class="row mt-5 py-2">
				<label class="fs-5 text-uppercase" >Nom</label>
				<div class="col-10">
					<input class="form-control" type="text" name="Name" id="" value="{{old('Name')}}" required>
				</div>
				@error('Name')
				<div class="alert aler-danger">{{ $message }}</div>
				@enderror
			</div>
		<div class="row mt-5 py-2">
			<div class="me-2">
				<label class="fs-5 text-uppercase">
					Prénom
				</label>
			</div>
			<div class="col-10">
			<input class="form-control" type="text" name="Prenom" id="" value="{{old('Prenom')}}" required>
			</div>
			@error('Prenom')
			<div class="alert aler-danger">{{ $message }}</div>
			@enderror
		</div>

		<div class="row mt-5 py-2 ">
			<div class= "me-3">
				<label class="fs-5 text-uppercase">telephone</label>
			</div>
			<div class="col-10">
				<input class="form-control" type="tel" name="tel" id="" value="{{old('tel')}}" required>
			</div>
			@error('tel')
			<div class="alert aler-danger">{{ $message }}</div>
			@enderror
		   </div>

		   <div class="row mt-5">
				<div class= "me-3">
						<label class="fs-5 text-uppercase">date de naissance</label>
					</div>
					<div class="col-10">
						<input class="form-control" type="date" name="calendar" id="" value="{{old('calendar')}}" required>
					</div>
					@error('calendar')
					<div class="alert aler-danger">{{ $message }}</div>
					@enderror
		   </div>
		   <div class="row mt-5">
				<div class= "me-3">
					<label class="fs-5 text-uppercase">num_commercial</label>
				</div>
				<div class="col-10">
					<select class="form-control" name="num_comm" id="" value="" required>
						<option value="1">1</option>
						<option value="2">2</option>
					</select>
				</div>
		   </div>

		    <div class="d-gyggrid gap-4 d-md-flex justify-content-center">
				<button class="btn btn-primary me-md-2" type="submit">S'inscrire</button>
				<button class="btn btn-danger" type="reset">Annuler</button>
			</div> 

	</form>
	</div>
	  <img src="img\drapeau_rouge.png" alt="" class="order-2 rounded-end-3" id="red_color" style="width:5%; height: 586px;"> 	

</div> 
@endsection
