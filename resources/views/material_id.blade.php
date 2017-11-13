@extends('layouts.app')

@section('content')
@parent
    <div id="matlib-app" class="content"></div>
	
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
var id = '{{ $id }}';
var apiUrl = 'http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/api/materials/id/';
// Defines page where back button sends user 
var siteUrl = 'http://niisku.lamk.fi/~matkirjasto/mat/materiaalikirjasto/public/material';
var uploadsUrl = 'http://niisku.lamk.fi/~matkirjasto/api/uploads/';

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
        return {
			materialInfo: undefined,
			materialName: undefined,
			materialType: undefined,
			materialLocation: undefined,
            materialImage: undefined,
            materialDescription: ''
		}
    },
    generateDefaultImagePath: function(type) {
        var result = uploadsUrl + 'default.png';
        Object.keys(defaultImages).forEach(function(val) {
            if (val == type) {
                result = uploadsUrl + defaultImages[val];
            }
        });
        return result;
    },
    loadMaterialInfo: function() {
        var url = apiUrl + id;
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
            cache: false,
            success: function(data) {
				console.log(data);
                this.setState({materialName: data[0].name });
                this.setState({materialType: data[0].type });
                this.setState({materialLocation: data[0].location });
                this.setState({materialInfo: data[0].values });
                if (data[0].image) {
                    this.setState({materialImage: data[0].image});
                } else {
                    this.setState({materialImage: this.generateDefaultImagePath(data[0].type)});
                }
                if (data[0].description) {
                    this.setState({materialDescription: data[0].description});
                }
            }.bind(this),
            error: function(xhr, status, err) {
                console.error(url, status, err.toString());
            }.bind(this)
        });
    },
    
    componentDidMount: function() {
        this.loadMaterialInfo();
    },
    
	
	
	render: function() {
        
        var materialListNodes = [];
		var matType = this.state.materialType;
		var matLocation = this.state.materialLocation;
		if (this.state.materialInfo) {
			var values = this.state.materialInfo;
			materialListNodes = Object.keys(values).map(function (key) {
				return (
					<MaterialCategory title={key} values={values[key]} key={key} />
				);
			});
		}
        return (
            <div id="content" className="center">
                <div id="perustiedot">
                    <a href={siteUrl}><i className="fa fa-arrow-circle-o-left back-button"></i></a>
                    
                    
						<div id="testDiv">
						<div id="titleDiv">
							
						<p>{this.state.materialDescription}</p>
                        <h2>{this.state.materialName}, {this.state.materialType}</h2>				
						<img src={this.state.materialImage} />
						<h3>{this.state.materialLocation}</h3>
						
						</div>
						
                        {materialListNodes}
						</div>
                    
                </div>
            </div>
        );
    }

});

var MaterialCategory = React.createClass ({

    render: function() {
		var values = this.props.values;
		var infoTitle = this.props.title;
		if (infoTitle.charAt(0) === 'm'){
			var lol = " ";
			infoTitle = infoTitle.slice(0,10) + lol + infoTitle.slice(10);
		}
        var materialCategoryRows = Object.keys(values).map(function (key) {
			return (
				<MaterialRow title={key} value={values[key]} key={key} />
			);
		});
		
		var matTable = "matTable";
        return (
            <div>
                <h2>{infoTitle}</h2>
				
				<table id={matTable}>
                {materialCategoryRows}
				</table>
            </div>
        );
    }

});

var MaterialRow = React.createClass({

    render: function() {
        return( 
				<tr>
                    <th>{this.props.title}</th>
                    <td>{this.props.value}</td>
                </tr>
        );
    }

});

ReactDOM.render(<MaterialBox/> , document.getElementById('matlib-app'));
	</script>
@endsection