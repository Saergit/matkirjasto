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
		<header>
			<h1> Materiaalikirjasto, Lahti </h1>
			<h2> Materiaalin muuttaminen</h2>
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
		
		<!-- Homman tallennus -->
		<!-- TODO: Että nappi oikeesti toimii -->
		<button type="button" onclick="alert('Tallennettu onnistuneesti')">
			Tallenna
		</button>
		
		</form>
	</body>
</html>
<script>
	function Mupdate(data)	{
			var url = 'niisku.lamk.fi:4320/update/';
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