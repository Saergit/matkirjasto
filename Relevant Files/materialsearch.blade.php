@extends('layouts.app')
@section('content')
@parent
    
	<div id="matlib-app" class="content">
	<!-- Sisältö¶ -->	
	<div id="searchDiv">
	<form id="matSearch">
    Materiaalin nimi:<br>
    <input class="searchInputs" type="text" name="nimi"><br>
    
	<!-- Tarkennettu haku -->
   
    <button type="button" class="searchButtons" data-toggle="collapse" data-target="#demo">Tarkennettu haku</button>
	<div id="demo" class="collapse">
    <h3>Tarkennettu haku</h3>
	
    <p>Valitse kategoria:</p> <select id="catSelect" name="Kategoria" onchange="getCategory()">
        <option value="all">Kaikki</option>
        <option value="composite">Komposiitit</option>
        <option value="fiber">Kuidut</option>
        <option value="plastic">Polymeerit</option>
        <option value="wood">Luonnonmateriaalit</option>
        <option value="metal">Metallit</option>
        <option value="ceramics">Keramiikka</option>
    </select>
	<br><br>
	
	
	
	<script type="text/javascript">
		<!-- Funktio tarkistaa kategorian ja palauttaa sen valuen-->
		function getCategory(){
			var elem = document.getElementById('catSelect');
			document.getElementById('catOptions').innerHTML = "";	
			var str = elem.value;
			
			switch (str){
				case "all":
					break;
				case "composite": 
					document.getElementById('catOptions').innerHTML = 
					'<div class="catParameters"><span class="attribute">Sulaindeksi</span><input class="searchInputs" type="number" name=""><span>g/10min</span></div>';
					break;
				case "fiber":
					document.getElementById('catOptions').innerHTML = 
					'<div class="catParameters"><span class="attribute">Lämpökapasiteetti</span><input class="searchInputs" type="number" name=""><span>J/g-°C</span></div>';
					break;
				case "plastic":
					document.getElementById('catOptions').innerHTML = 
					'<div class="catParameters"><span class="attribute">Imeytyvyys</span><input class="searchInputs" type="number" name=""><span>%</span></div>';
					break;
				case "wood":
					document.getElementById('catOptions').innerHTML = 
					'<div class="catParameters"><span class="attribute">Kovuus</span><input class="searchInputs" type="number" name=""><span>N</span></div>' +
					'<div class="catParameters"><span class="attribute">Solupituus</span><input class="searchInputs" type="number" name=""><span>mm</span></div>';
					break;
				case "metal":
					document.getElementById('catOptions').innerHTML = 
					'<div class="catParameters"><span class="attribute">Sulamispiste</span><input class="searchInputs" type="number" name=""><span>°C</span></div>';
					break;
				case "ceramics":
					document.getElementById('catOptions').innerHTML = 
					'<div class="catParameters"><span class="attribute">Sulamispiste</span><input class="searchInputs" type="number" name=""><span>°C</span></div>';
					break;
			}
			
			
		}
		
	</script>

	<!-- Tarkennetun haun hakuvaihtoehdot -->

    <div class="catParameters"><span class="attribute">Tiheys</span><input class="searchInputs" type="number" name=""><span>g/cc</span></div>
    <div class="catParameters"><span class="attribute">Vetolujuus</span><input class="searchInputs" type="number" name=""><span>MPa</span></div>
	<div id="catOptions">
	</div>
	
	
  </div>
  
    
    
    <br>
    <input type="submit" class="searchButtons" value="Search">
</form>
</div>	
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
@endsection