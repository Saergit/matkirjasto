<!DOCTYPE html>
<html>
    <head>
        <title>Lisäys</title>
		
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
		
		<script>
		$(function() {
			$.ajaxSetup({
			   headers: {
				   'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
			   }
			});
		});
		</script>
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: block;
                font-weight: 100;
                font-family: 'Lato';
				font-weight: bold;
				
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
			
			header {
				padding: 4em;
				text-align: center;
				background-color: #e5e4de;
			}
			
			input {
				color: #cccccc;
			}
			
			textarea {
				color: #cccccc;
			}
			
			ul {
				list-style-type: none;
				margin: 0;
				padding: 0;
				overflow: hidden;
				background-color: #d2d0c6;
				text-align: center;
			}

			li {
				float: left;
			}

			li a {
				display: block;
				color: white;
				text-align: center;
				padding: 14px 16px;
				text-decoration: none;
			}

			li a:hover:not(.active) {
				background-color: #f4f3f1;
			}

			.active {
				background-color: #bcb9a9;
			}
        </style>
    </head>
    <body>
        <!-- Otsikot -->
		<!-- Logot? -->
		<!-- Kesken enää tallennus, materiaalikohtaisten tietojen oikeen sisällön koodaaminen ja silleen ettei sivu pyyhi sitä pois, css -->
		<header>
			<h1> Materiaalikirjasto, Lahti </h1>
			<h2> Materiaalin lisäys</h2>
		</header>
		<nav class="nav">
			<ul>
				<li><a class="active" href="#add">Lisäys</a></li>
				<li><a href="#change">Muuta</a></li>
				<li><a href="#delete">Poista</a></li>
				<li><a href="#search">Hae</a></li> <!-- Tästä etusivu adminkäyttäjälle -->
			</ul><br>
		</nav>
		<form>
			<!-- Materiaalintiedot -->
			<fieldset>
				<legend> Materiaalin perustiedot: </legend>
				Materiaali:
				<input type="text" name="Nimi" value="Materiaalin nimi"><br>
				
				Määrä/Vuosi:
				<input type="text" name= "Materiaalin tyyppi" value="Materiaalin tyyppi"><br>
				
				Hinta:
				<input type="text" name= "Materiaalin tyyppi" value="Materiaalin tyyppi" ><br>
				
				Sijainti kirjastossa:
				<input type="text" name="Sijainti" value="Sijainti"><br>
				
				Materiaalin kuvaus: <br>
				<textarea name="message" rows="10" cols="30">
Tähän sanallisesti materiaalin kuvausta.
				</textarea>
			</fieldset><br>
			
			<!-- Materiaalin tietoja -->
			<fieldset>
				<legend> Materiaalikohtaiset tiedot </legend>
				
				<input type="radio" name="materiaali" value="muo" onclick="return Testi()">Muovit
				<input type="radio" name="materiaali" value="tek" onclick="return Teksti()">Tekstiilit
				<input type="radio" name="materiaali" value="puu" onclick="return Puu()">Puut
				<input type="radio" name="materiaali" value="kui" onclick="return Kuitu()">Kuitumateriaalit
				<input type="radio" name="materiaali" value="kom" onclick="return Kompo()">Komposiitit
				<input type="radio" name="materiaali" value="met" onclick="return Metalli()">Metallit
				<input type="radio" name="materiaali" value="ker" onclick="return Kera()">Keraamit<br>
				
				<div id="demo"></div>
				
			</fieldset><br>
			
			<!-- Kuvan lisäys -->
			<fieldset>
				<legend> Kuva: </legend>
				Lisää kuva:<br>
				<input type="file" name="kuva" accept="image/*">
			</fieldset><br>
			
			<!-- YRITYS -->
			<fieldset> 
					<legend> Yritys: </legend>
					<br><input type="checkbox" name="public" value="public" id="public"> Julkaise yrityksen tiedot verkkosivuilla<br><br>
					Nimi:
					<input type="text" name="Nimi" value="Yrityksen nimi"><br>
					Osoite:
					<input type= "text" name="Osoite" value="Yrityksen osoite"><br>
					Materiaalin sijainti:
					<input type= "text" name="Osoite" value="Materiaalin sijainti"><br>
					<br>
					<!-- YHTEYSHENKILÖ -->
					<!-- TODO: Asettelua ja vähän fiksummaks -->
					<fieldset>
						<legend> Yhteyshenkilö: </legend>
						Nimi:
						<input type="text" name="Nimi" value="Henkilön nimi">
						Puhelinnumero:
						<input type="text" name="Puhelin" value="Puhelinnumero">
						Sähköposti:
						<input type="text" name="Sähköposti" value="Sähköpostiosoite">
					</fieldset>
				</fieldset><br>
			
			<!-- Homman tallennus -->
			<!-- TODO: Että nappi oikeesti toimii -->
			<button type="button" onclick="alert('Tallennettu onnistuneesti')">
				Tallenna
			</button>
			<footer></footer>
		</form>
    </body>
</html>
<script>
	function Testi() {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("demo").innerHTML = this.responseText;
			}
		};
		xhttp.open("GET", "muovi.php", true);
		xhttp.send();
	}
	function Muovi() { 	
		document.getElementById("demo").innerHTML = "Muovi";
	}
	
	function Teksti() {
		document.getElementById("demo").innerHTML = "Tekstiili";
	}
	
	function Puu() {
		document.getElementById("demo").innerHTML = "Puu";
	}
	
	function Kuitu() {
		document.getElementById("demo").innerHTML = "Kuitumateriaali";
	}
	
	function Kompo() {
		document.getElementById("demo").innerHTML = "Komposiitti";
	}
	
	function Metalli() {
		document.getElementById("demo").innerHTML = "Metalli";
	}
	
	function Kera() {
		document.getElementById("demo").innerHTML = "Keraamit";
	} 
	
	function Madd(data)	{
			var url = 'niisku.lamk.fi:4320/add/';
			$.ajax({
				url: url,
				dataType: 'json',
				data: data,
				type: 'POST',
				success: function(data) {
					console.log(data);
				}.bind(this),
				error: function(xhr, status, err) {
					console.error(url, status, err.toString());
				}.bind(this)
			});
		}
			
		
</script>
