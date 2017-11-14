@extends('layouts.app')
@section('content')
@parent
	<!-- kuinka saada tämä sivu näkyviin ilman uutta sivua? -->
    <div id="matlib-app" class="content">

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
	<script type="text/babel">
		var type = '{{ $type }}';
		var siteUrl = 'http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/';
		var apiUrl = 'http://niisku.lamk.fi/~matkirjasto/api/';

		// vaihtoehdot vakiokuville
		var defaultImages = {
			'muovi':'plastic.jpg',
			'puu':'wood.jpg',
			'tekstiili':'textile.jpg',
			'kuitu':'fiber.jpg',
			'komposiitti':'composite.jpg'
		};
		
		var MaterialBox = React.createClass({
		
			getInitialState: function() {
				return {materials: []};
			},
			
			// kutsuu routea
			loadMaterials: function() {
				var url = siteUrl;
				if (type == 'all') {
					url = url + 'api/materials/all';
					console.log("if");
				} else {
					url = url + 'api/materials/type/' + type;
					console.log("else");
				}
				$.ajax({
					url: url,
					dataType: 'json',
					type: 'GET',
					cache: false,
					success: function(data) {
						console.log("success");
						this.setState({materials: data});
						console.log(data);
					}.bind(this),
					error: function(xhr, status, err) {
						console.log(err);
						console.error(url, status, err.toString());
					}.bind(this)
				});
			},
			
			componentDidMount: function() {
				this.loadMaterials();
			},
			
			// tulostus
			render: function() {
				return (
					<div id="content" className="center">
						<MaterialList
							materials = {this.state.materials}
						/>
					</div>
				);
			}		
		});
		
		var MaterialList = React.createClass ({	
			generateDefaultImagePath: function(type) {
				var result = 'uploads/default.png';
				Object.keys(defaultImages).forEach(function(val) {
        			if (val == type) {
						result = 'uploads/' + defaultImages[val];
					}
				});
				return result;
			},
			render: function() {
				var materialNodes = [];
				var materialImage = 'uploads/default.png';
				for (var i = 0; i < this.props.materials.length; i++) {
					if (this.props.materials[i].image) {
						materialImage = this.props.materials[i].image;
					} else {
						materialImage = this.generateDefaultImagePath(this.props.materials[i].type);
					}
					materialNodes.push(
						<MaterialRow
							key={this.props.materials[i]._id}
							id={this.props.materials[i]._id}
							name={this.props.materials[i].name}
							type={this.props.materials[i].type}
							location={this.props.materials[i].location}
							image= {materialImage}
						/>
					)
				}
				return (
					<div id="sections">
						{materialNodes}
					</div>
				);
			}
		});
		
		var MaterialRow = React.createClass ({	
		
			render: function() {
				var imageUrl = apiUrl + this.props.image;
				var linkUrl = siteUrl + "material/id/" + this.props.id;
				var matName = this.props.name;
				matName = matName.charAt(0).toUpperCase() + matName.slice(1);
				var textPara = "textPara";
				return (
					<a href={linkUrl}>
						<section>
						<div id="sectionWrapper">
						<div id="sectionImg">
							<img src={imageUrl}/>
						</div>
						<div id="sectionCont">
							<h2 class="matnimi">{matName}</h2>
							<p id={textPara}> Yritys: {this.props.company} <br></br> 
								Tyyppi: {this.props.type} <br></br>
								Sijainti: {this.props.location} </p>
						</div>
						</div>
						</section>
					</a>
				);
			}
		});
		
		ReactDOM.render(<MaterialBox/> , document.getElementById('matlib-app'));
	</script>
@endsection