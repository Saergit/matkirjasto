<!-- Sivuston perus ulkoasu -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Materiaalikirjasto</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type= "text/css" href="{{ URL::to('assets/css/matkirBeta.css?parameter=2') }}" >

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react-dom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.js"></script>
	
</head>
<body id="matlib-layout">
    <header>
		<img src="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/assets/images/testbanner.jpg" id="headbanner">
    </header>
    <div id=crapper>
    <nav>
		<!-- etusivu/uutiset -->
		<a href="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/"><span>Etusivu</span></a>
		
		<!-- haku -->
		<a href="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/materialsearch"><span>Haku</span></a>
		
		<!-- kategoriat -->
		<a href="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/material"><span>Materiaalit</span></a>
		
		<!-- lisätietoa -->
		<a href="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/info"><span>Info</span></a>
		
		<!-- näyttää kaikki materiaalit 
		<a href="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/materials/all">Kaikki</a>
		-->
		<!-- näyttää komposiitit
        <a href="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/materials/komposiitti">Komposiitit</a>
		-->
		<!-- näyttää komposiitit
        <a href="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/materials/kuitu">Kuidut</a>
		-->
		<!-- näyttää komposiitit
        <a href="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/materials/muovi">Muovit</a>
		-->
		<!-- näyttää komposiitit
        <a href="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/materials/puu">Puut</a>
		-->
		<!-- näyttää komposiitit
        <a href="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/materials/tekstiili">Tekstiilit</a>
		-->
		
    </nav>
    <div id="content">
    	@yield('content')
    </div>
    </div>
    <footer>
    	<p id="RematerialP">
			Rematerial Library ♻ Lahti
    	</p>
	
		<div>
			<a href="http://www.lamk.fi" target="_blank">
				<img src="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/assets/images/lamk_tunnus.jpg" alt="Lamk Logo"/>
			</a>
		</div>
		<div id="muoviImg">
			<a href="http://www.muovipoli.fi/" target="_blank">
				<img src="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/assets/images/Muovipoli-logo-CMYK.jpg" alt="Muovipoli Logo"/>
			</a>
		</div>
	</footer>
</body>
</html>