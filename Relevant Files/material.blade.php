@extends('layouts.app')
@section('content')
@parent
    <div id="matlib-app" class="content">
    <!-- SISÄLTÖNÄKYMÄ MATERIAALEILLE HAUN MUKAAN -->
	<!-- Nav bar katoaa materiaalin valitsemisen jälkeen -->
	
    <nav id="matNav">
		<a href="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/materials/all"><span>Kaikki</span></a></br>
		
		<button id="catButton" type="button" data-toggle="collapse" data-target="#demo">Kategoriat <img src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-arrow-down-b-128.png"></button>
		<div id="demo" class="collapse">
		
        <a class="collapseCategories" href="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/materials/komposiitti"><div id="imgComposite"><img src="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/assets/images/temp/Icons/composites.png"></div><span>Komposiitit</span></a>
				
        <a class="collapseCategories" href="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/materials/kuitu"><div id="imgFiber"><img src="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/assets/images/temp/Icons/glass.png"></div><span>Kuidut</span></a>
		
        <a class="collapseCategories" href="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/materials/muovi"><div id="imgPlastic"><img src="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/assets/images/temp/Icons/polymers.png"></div><span>Muovit</span></a>
		
        <a class="collapseCategories" href="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/materials/puu"><div id="imgWood"><img src="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/assets/images/temp/Icons/natural_materials.png"></div><span>Puut</span></a>
		
        <a class="collapseCategories" href="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/materials/tekstiili"><div id="imgTextile"><img src="http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/assets/images/temp/Icons/textiles.png"></div><span>Tekstiilit</span></a>
		</div>
		
	</nav>	

    <!-- /SISÄLTÖ -->
    </div>

    <script type="text/javascript">
    $(function() {
        $.ajaxSetup({
           headers: {
               'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
           }
        });
    });
    </script>
	<script>
	var siteUrl = 'http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/';
	</script>
@endsection