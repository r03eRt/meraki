<?php 

$lang = strtolower(ICL_LANGUAGE_CODE);

?>

<style>
	.main-container {
		width: 1024px;
		font-family: 'Futura Light';
		color: #252525;
		min-height: calc(100vh - 130px);
		
	}

	.prensa-div {
		min-height: 256px;
		padding-top: 7.5px;
		padding-bottom: 7.5px;
		background-clip: content-box;
		text-decoration: none;
		color: #252525;
	}

	.prensa-div figure {
		position: absolute;
	    top: 7.5px;
	    left: 7.5px;
	    display: block;
	    margin: 0;
	    width: calc(100% - 15px);
	    height: calc(100% - 15px);
	    overflow: hidden;
	    -webkit-perspective: 600px;
        perspective: 600px;
	}
	
	.prensa-div figure .bg{
		position: absolute;
	    top: 0;
	    left: 0;
	    display: block;
	    margin: 0;
	    width: 100%;
	    height: 100%;
		background-size: cover;
	    background-position: center;
	    background-repeat: no-repeat;
	    -webkit-transform: translate3d(0, 0, 0) scale(1);
	    transform: translate3d(0, 0, 0) scale(1);
	    -webkit-transition: 0.7s transform ease-in-out;
	    transition: 0.7s transform ease-in-out;
	}

	.prensa-div figure:hover .bg{
		position: absolute;
	    top: 0;
	    left: 0;
	    display: block;
	    margin: 0;
	    width: 100%;
	    height: 100%;
		background-size: cover;
	    background-position: center;
	    background-repeat: no-repeat;
	    -webkit-transform: translate3d(0, 0, 0) scale(1.05) ;
	    transform: translate3d(0, 0, 0) scale(1.05);
	}

	.prensa-div figure .overlay{
		position: absolute;
		padding: 15px;
	    top: 0;
	    left: 0;
	    display: block;
	    margin: 0;
	    width: 100%;
	    height: 100%;
	    opacity: 0.001;
		background-color: rgba(197, 206, 183, 0.6);
		/*-webkit-transform: translate3d(0, 100%, 0);
	    transform: translate3d(0, 100%, 0);
	    -webkit-transition: 0.5s transform ease-in-out, opacity 0.6s linear;
	    transition: 0.5s transform ease-in-out, opacity 0.6s linear;*/
	    -webkit-transition: 0.5s opacity ease-in-out;
	    transition: 0.5s opacity ease-in-out;
	}

	.prensa-div figure:hover .overlay{		
		/*-webkit-transform: translate3d(0, 0%, 0);
	    transform: translate3d(0, 0%, 0);*/
	    opacity: 1;	    
	}

	.prensa-div p {
        font-size: 12px;
    	line-height: 14px;
    	margin-bottom: 10px;
	}

	.prensa-div h2.titulo-prensa {
        text-align: left;
	    margin-bottom: 10px;
	    margin-top: 15px;
	    font-family: 'Futura Heavy';
	    letter-spacing: 0px;
	    font-size: 18px;
	    position: relative;
	}

	span.subtitulo-prensa {
	    display: block;
    	width: 100%;
    	font-style: italic;
	    line-height: 4px;
	}

	span.subtitulo-2-prensa {
	    display: block;
	    width: 100%;
	    margin-top: 20px;
	    font-style: italic;
	    line-height: 4px;
	}

	span.readmore {
		display:block;
		width: 100%;
	    position: absolute;
    	bottom: 15px;
    	font-style: italic;
	}

	span.readmore i {
		display:block;
		width: 100%;
		font-style: normal;
		font-size: 12px;
	}

	@media(max-width: 1000px) {
		.main-container {
			width: 100%;
		    min-height: calc(100vh - 130px);
		}
	}

	@media(max-width: 768px) {
		.main-container {
			width: 100%;
		    min-height: calc(100vh - 130px);
		}
	}

	@media(max-width: 480px) {
		.col-xs-6 {
			width: 100%;		    
		}
		.main-container {
			min-height: initial;
		}

		.prensa-div figure .overlay{		
		    opacity: 1;	    
		}

		body div.pp_default a.pp_next {
		    right: 0;
		    transform: translate3d(0%,0,0);
		    opacity: 1;
		}

		body div.pp_default a.pp_previous {
		    left: 0;
		    transform: translate3d(0%,0,0);
		    opacity: 1;
		}

		.pp_content {
		    position: absolute;
		    top: 50%;
		    -webkit-transform: translate3d(0,-50%,0);
		    transform: translate3d(0,-50%,0);
		}

		.pp_hoverContainer {
		    position: absolute;
		    top: 50%;
		    -webkit-transform: translate3d(0,-50%,0);
		    transform: translate3d(0,-50%,0);
		}

		.pp_fade {
			position: relative;
		}
	}
</style>

<div class="main-container container">
	<div class="row">
		<?php 

			for($i = 0; $i < count(get_field( 'repeater_prensa')); $i++){ 
		?>
		<a class="prensa-div block-1 col-xs-6 col-sm-4 col-md-3" href="<?php echo get_field( 'repeater_prensa')[$i]['repeater_img'][0]['img']; ?>" rel="prettyPhoto[<?php echo get_field( 'repeater_prensa')[$i]['titulo_' . $lang]; ?>]">
			<figure>
				<div class="bg" style="background-image: url(<?php echo get_field( 'repeater_prensa')[$i]['repeater_img'][0]['img'] ?>)"></div>
				<div class="overlay">
					<h2 class="titulo-prensa"><span><?php echo get_field( 'repeater_prensa')[$i]['titulo_' . $lang ];?></span></h2>
					<span class="subtitulo-prensa"><?php echo get_field( 'repeater_prensa')[$i]['subtitulo_' . $lang ];?></span>
				</div>
			</figure>
		</a>

		<?php 

		for($j = 0; $j < count(get_field( 'repeater_prensa')[$i]['repeater_img']); $j++){ 
			if($j !== 0)
			{

		?>
			<a class="hidden" href="<?php echo get_field('repeater_prensa')[$i]['repeater_img'][$j]['img'] ?>" rel="prettyPhoto[<?php echo get_field( 'repeater_prensa')[$i]['titulo_' . $lang]; ?>]">
				
			</a>
		<?php
			} 
		
		} 

		?>

		<?php

		}
		
		?>
	</div>
</div>

