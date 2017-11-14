 <!--Tähän luodaan etusivun sisältö
 - tabit eri osioihin sivulla
 - news, haku, kategoriat, lisätiedot
-->
 @extends('layouts.app')
 @section('content')
 @parent
	 <!--SISÄLTÖ-->
		<div style="text-align: center;">
		<!--<div style="display: inline-block; text-align: left"> -->
		<p>Etusivu uutisille ja muulle tapahtumalle</p>
		
		Materiaalikirjaston työn alla oleviin sivuihin pääsee tutustumaan Lahden kaupunginkirjastossa pidettävään ICT Project Expoon 27.4.2017 klo 8 - 12.
		
		</div>  
		
		
	 <!-- / SISÄLTÖ-->
	 <script type = "text/javascript">
	$(function () {
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
