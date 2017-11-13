<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
		
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
		

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
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
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
            </div>
        </div>
    </body>
</html>
<script>
$(function() {
	$.ajaxSetup({
	   headers: {
		   'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
	   }
	});
});
</script>
<script>

	console.log(window.location.protocol + "//" + window.location.host + "/" + window.location.pathname);

	// Get all materials
	function GetAllMaterials() {	
		var url = 'http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/api/materials/all';
		$.ajax({
			url: url,
			dataType: 'json',
			type: 'GET',
			cache: false,
			success: function(data) {
				console.log(data);
			}.bind(this),
			error: function(xhr, status, err) {
				console.error(url, status, err.toString());
			}.bind(this)
		});
	}
	
	// Get material based on id
	function GetMaterialId(id) {	
		var url = 'http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/api/materials/id/' + id;
		$.ajax({
			url: url,
			dataType: 'json',
			type: 'GET',
			cache: false,
			success: function(data) {
				console.log(data);
			}.bind(this),
			error: function(xhr, status, err) {
				console.error(url, status, err.toString());
			}.bind(this)
		});
	}
	
	// Get material based on name
	function GetMaterialName(name) {	
		var url = 'http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/api/materials/name/' + name;
		$.ajax({
			url: url,
			dataType: 'json',
			type: 'GET',
			cache: false,
			success: function(data) {
				console.log(data);
			}.bind(this),
			error: function(xhr, status, err) {
				console.error(url, status, err.toString());
			}.bind(this)
		});
	}
	
	
	// Delete material
	function DeleteMaterial(id) {	
		var url = 'http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/api/materials/delete/' + id;
		$.ajax({
			url: url,
			type: 'DELETE',
			cache: false,
			success: function(data) {
				console.log(data);
			}.bind(this),
			error: function(xhr, status, err) {
				console.error(url, status, err.toString());
			}.bind(this)
		});
	}
	
	// Add material
	function AddMaterial(newMaterial) {	
		var url = 'http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/api/materials/add';
		console.log(newMaterial);
		$.ajax({
			url: url,
			type: 'POST',
			data: newMaterial,
			cache: false,
			success: function(data) {
				console.log(data);
			}.bind(this),
			error: function(xhr, status, err) {
				console.error(url, status, err.toString());
			}.bind(this)
		});
	}
	
	// Update material
	function UpdateMaterial(oldMaterial, id) {	
		var url = 'http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/api/materials/update/' + id;
		$.ajax({
			url: url,
			type: 'PUT',
			data: oldMaterial,
			cache: false,
			success: function(data) {
				console.log(data);
			}.bind(this),
			error: function(xhr, status, err) {
				console.error(url, status, err.toString());
			}.bind(this)
		});
	}
	
	$(function() {
		var newmaterial = {type:"puu", name:"vaneri", location:"nevada", image:"uploads/wood.jpg" values:{
		perustiedot:{kovuus: "24", maara: "825", hinta:"1.00", vaarallinen:"todella vaarallinen"},
		mekaanisettiedot:{kimmokerroin: "5,9", venyvyys:"ei", kumisuus: "0"}
		}};
		//AddMaterial(newmaterial);
		//DeleteMaterial("583d319dbc971778835c893b");
		GetAllMaterials();
	});
	
</script>