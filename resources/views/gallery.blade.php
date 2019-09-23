@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
      
      <p class="lead"><h3>Gallery</h3></p>
      <hr class="my-4">
      <p>
		<div style="width:50%;" id="carouselExampleControls" class="container carousel slide text-center bg-dark" data-ride="carousel">
		  <div class="carousel-inner">
		  	<div class="carousel-item active">
			  <img src="../storage/app/{{$files[0]}}" height="300px;"alt="...">
			</div>
			
			@php array_shift ($files); @endphp
		  @foreach ($files as $f)
			<div class="carousel-item">
			  <img src="../storage/app/{{$f}}" height="300px" alt="...">
			</div>
			@endforeach
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			<span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		  </a>
		</div>
		
		@if (auth()->id() !== NULL)
		<br />
		<form action="gallery/store" method="POST" enctype="multipart/form-data">
		@csrf
			<div class="custom-file">
			  <input type="file" class="custom-file-input" id="customFile" name="picture" onchange="document.getElementById('fileLabel').innerHTML=this.value.slice(12)" required/>
			  <label class="custom-file-label" for="customFile" id="fileLabel"></label>
			</div>
			<br />
			<br />
			<p align="center">
				<button class="btn btn-success"><i class="fas fa-upload"></i> Upload</button>
			</p>
		</form>
	  @endif
	  </p>
      

    </div>

</div>

@endsection
