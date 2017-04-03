<?php 

$lang = strtolower(ICL_LANGUAGE_CODE);

?>
<!-- <?php echo 'SHOP ONLINE pagina<br>' ?>
<?php echo get_field( 'test_' . $lang ); ?> -->

<style>
	.main-container {		
	    /**height: calc(100vh - 258px);**/
	    background-color: #ffffff;
	    margin-bottom: 40px!important;	    
	}

	.mapa-container {
		width: 100%;
		height: 40vh;
		background-color: beige;
		max-width: inherit !important;
		position: relative;
	}

	.mapa-container .texto-contacto {
		position: absolute;
		top: 50%;
		left: 6%;
	    font-family: 'Futura Light';
	    font-size: 10px;
	    line-height: 12px;
	    padding: 0px;
	    border-radius: 50%;
	    width: 170px;
	    height: 170px;
	    color: #252525;
	    font-style: italic;
	    text-align: center;
	    background-color: #ffffff;
	    -webkit-transform: translate3d(0, -50%, 0);
	   	transform: translate3d(0, -50%, 0);
	   	opacity: 0.001;
	}

	.mapa-container .texto-contacto p {
	    position: absolute;
	    top: 50%;
	    left: 50%;
	    display: block;
	    transform: translate3d(-50%,-50%,0);
	    width: 100%;
	}

	.mapa-container #mapa {
		width: 100%;
		height: 100%;
	}

	.contenido {
		width: 100%;
		height: 50%;
		background-color: whitesmoke;
	}

	/*.main-container figure{
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		margin: 0;
		display: block;
		background-size: cover;
		background-position: center;
		background-repeat: no-repeat;
	}


	.main-container .texto {
		position: absolute;
		top: 50%;
		left: 50%;
		display: block;
		-webkit-transform: translate3d(-50%, -50%, 0);
		transform: translate3d(-50%, -50%, 0);
		text-align: center;
		color: #ffffff;
	}
	.main-container .texto h1{
		color: #ffffff;
		font-family: 'Futura Heavy';
		font-style: italic;
		font-size: 32px;
		letter-spacing: 0px;
	}

	.main-container .texto p {
	    font-size: 18px;
	    font-weight: 500;
	    font-family: 'Futura Light';
	    letter-spacing: 0px;
	}*/


</style>

<div class="container main-container">
<!-- <?php var_dump(get_field( 'mapa' )) ?> -->

	<div class="mapa-container">
		<div id="mapa"></div>
		<div class="texto-contacto">
			<?php echo get_field( 'texto_' . $lang ); ?>
		</div>
	</div>

	<div class="contenido contenido-contacto">
		<?php 
			if($lang === 'es')
			{
				echo do_shortcode('[contact-form-7 id="21911" title="Contacto ES"]');
			}
			else
			{
				echo do_shortcode('[contact-form-7 id="21915" title="Contacto EN"]');
			}	

		?>
		
		<div class="col-md-12 desc-contacto">
			<?php echo get_field( 'texto_2_' . $lang ); ?>
		</div>

	</div>
	
</div>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzDY7dbQjnr1lcX_Cp5bYS7Z5zMlY9gIg&callback=initMapinitMap();"
  type="text/javascript"></script>
    <script>

    /**
function detectBrowser() {
  var useragent = navigator.userAgent;
  var mapdiv = document.getElementById("map");

  if (useragent.indexOf('iPhone') != -1 || useragent.indexOf('Android') != -1 ) {
    mapdiv.style.width = '100%';
    mapdiv.style.height = '100%';
  } else {
    mapdiv.style.width = '600px';
    mapdiv.style.height = '800px';
  }
}
    **/



jQuery(document).ready(function(){

	function initMap()
    {
        //map selector
        var mapDiv = document.querySelector('#mapa');
        var address = <?php echo '"'.get_field( 'mapa' )['address'].'"'; ?>;

        //new geocoder instance
        var geocoder = new google.maps.Geocoder();
        var bounds = new google.maps.LatLngBounds();

        //map style options
		var options = {
            styles: [
                        {
                            "featureType": "landscape",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "stylers": [
                                {
                                    "hue": "#00aaff"
                                },
                                {
                                    "saturation": -100
                                },
                                {
                                    "gamma": 2.15
                                },
                                {
                                    "lightness": 12
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "visibility": "on"
                                },
                                {
                                    "lightness": 24
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "lightness": 57
                                }
                            ]
                        }
                    ]
		        };

	        //style on google map
	        mapDiv.style.width = '100%';
	        mapDiv.style.height = '100%';

	        //new google maps intance
	        map = new google.maps.Map(mapDiv, {
	            zoom: 17,
	            scrollwheel: false
	        });

	        google.maps.event.addListenerOnce(map, 'idle', function(){
			// do something only the first time the map is loaded
				initAnimation()
			});

	        map.setOptions(options);

	        geocodeAddress(geocoder, map, address);

	    }

	    function geocodeAddress(geocoder, map, address)
	    {
	        geocoder.geocode({'address': address}, function(results, status) 
	        {
	            console.log(results[0].geometry.location.lat());

	            if (status === google.maps.GeocoderStatus.OK) {
	                map.setCenter({
	                    lat: results[0].geometry.location.lat(),
	                    lng: results[0].geometry.location.lng()
	                });

	                var iconBase = 'http://localhost/wp-content/uploads/2017/03/MERAKI.png';
	                var marker = new google.maps.Marker({
	                    map: map,
	                    position: results[0].geometry.location,
	                    icon: iconBase
	                });

	                map.panBy(-window.innerWidth/6, 0);
	            }
	            else
	              alert('Geocode was not successful for the following reason: ' + status);
	          });
	    }
	    


	    function initAnimation()
	    {
	    	var textoContacto = document.querySelector('.texto-contacto');
	    	TweenMax.fromTo(textoContacto, 3, {opacity: 0.001}, {opacity: 1});
	    	console.log(textoContacto)
	    }

	    //
	    var map = null;
	   
		initMap();
	});

    
</script>
