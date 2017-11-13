@extends('layouts.app')
@section('content')
@parent
    <!-- SIS�LT֖ -->
    <div style="text-align: center; margin: 0 10px 0 10px">
    <div style="display: inline-block; text-align: left">
	
	<p>Rematerial library (name pending) on Lahden ammattikorkeakoulun insinöörialan
	opiskelijoiden ja Muovipolin yhteistyöprojekti.</p>
	<p>Kirjasto esittelee eri yrityksien tarjoamaa ylijäämämateriaalia kierrätystoimintaan
	ja toimii näin välikappaleena materiaalien tarjoajien ja käyttäjien välillä.</p>
	
	<p>
		Valmistuu toimivaksi versioksi kesän aikana, jotta voidaan julkaista yhdessä
		fyysisen Materiaalikirjaston pilotin kanssa syksyllä 2017
	</p>
	
	Yhteystiedot:<br>
	Lorem ipsum<br>
	e-mail: testi.testi@mail.net<br>
	puh: 123 123 1234<br>
	</div>
	
    </div>
    <!-- /SIS�LT֖ -->
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