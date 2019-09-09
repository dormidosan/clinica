<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
@for ($i = 0; $i < 100; $i++)
	{{-- expr --}}
	
	@php
		 echo $i ;
	@endphp
	IMAGEN 1
	<img src="{{ asset('img/14082e02fb5c8db474d20ab11c00a36d.jpg') }}" alt="" class="img-responsive" style="width: 50px; "></img>
	<br>
	
	IMAGEN 2
	<img src="{{ URL::to('extraer/' . 'aja')  }}" alt="" class="img-responsive" style="width: 50px; ">
	<br>
	<br>
	<hr>
@endfor


</body>
</html>