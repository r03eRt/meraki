<?php 

$lang = strtolower(ICL_LANGUAGE_CODE);

?>
<!-- <?php echo 'SHOP ONLINE pagina<br>' ?>
<?php echo get_field( 'test_' . $lang ); ?> -->

<style>
	.main-container {		
	    min-height: calc(100vh - 258px);
	    width: calc(100% - 60px);
	    background-color: #ffffff;
	    margin-top: 186px!important;
	    margin-bottom: 40px!important;	    
	}

	.main-container figure{
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
		padding: 15px;
		background-color: rgba(97, 97, 97, 0.38);
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
	}

	@media(max-width: 1000px) {
		.main-container {
		    margin-top: 30px!important;		    
		}
	}

	@media(max-width: 768px) {
		.main-container {
			width: 100%;
		}
	}

	@media(max-width: 480px) {
		.col-xs-6 {
			width: 100%;		    
		}

		.main-container {		
		    min-height: calc(100vh - 120px);
		    
		}
		.texto {
			width: 90%;
		}
	}


</style>

<div class="container main-container">
	<figure style="background-image: url(<?php echo get_field('img_bg'); ?>)"></figure>
	<div class="texto">
		<h1><span><?php echo get_field('titular_' . $lang); ?></span></h1>
		<?php echo get_field('texto_' . $lang); ?>
	</div>
	
</div>