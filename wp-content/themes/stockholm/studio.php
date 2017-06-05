<?php 
//get language
$lang = strtolower(ICL_LANGUAGE_CODE);

?>

<style>
	.main-container {
		background-color: whitesmoke;
		width: 1024px;
		font-family: 'Futura Light';
		color: #252525;
	}

	.studio-div {
		min-height: 340px;
		padding-top: 7.5px;
		padding-bottom: 7.5px;
		background-clip: content-box;
	}

	.studio-div figure {
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
	
	.studio-div figure .bg{
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

	.studio-div figure:hover .bg{
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

	.studio-div p {
        font-size: 12px;
    	line-height: 14px;
    	margin-bottom: 10px;
	}

	.studio-div h2 {
        text-align: center;
	    margin-bottom: 20px;
	    margin-top: 15px;
	    font-family: 'Futura Light';
	    letter-spacing: 0px;
	    font-size: 18px;
	    position: relative;
	}

	.studio-div h2 span{
		position: relative;
	}

	.studio-div h2 span:after {
   	    content: '';
	    background-color: #252525;
	    position: absolute;
	    bottom: -0.5vh;
	    left: calc(50% - 60%);
	    width: 120%;
	    height: 1px;
	}

	.studio-div.block-4 {
		padding: 7.5px 60px;
		text-align: justify;
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

		.studio-div.block-4 {
		    padding: 7.5px 7.5px;
		    text-align: justify;
		}
		
		.studio-div.block-4, .studio-div.block-3 {
			min-height: initial;
			padding-bottom: 20px;
		}

	}

</style>


<div class="main-container container">
	<div class="row">
		<div class="studio-div block-3 col-xs-6 col-md-4 visible-xs">
			<h2><span><?php echo get_field( 'titulo_1_' . $lang )?></span></h2>
			<?php echo get_field( 'texto_1_' . $lang )?>
		</div>
		<div class="studio-div block-1 col-xs-6 col-md-5">
			<figure>
				<div class="bg" style="background-image: url(<?php echo get_field( 'img_1_' . $lang )?>)"></div>
			</figure>
		</div>
		<div class="studio-div block-2 col-xs-6 col-md-3">
			<figure>
				<div class="bg" style="background-image: url(<?php echo get_field( 'img_2_' . $lang )?>)"></div>
			</figure>
		</div>
		<div class="studio-div block-3 col-xs-6 col-md-4 hidden-xs">
			<h2><span><?php echo get_field( 'titulo_1_' . $lang )?></span></h2>
			<?php echo get_field( 'texto_1_' . $lang )?>
		</div>
		<div class="studio-div block-4 col-xs-6 col-md-5">
			<h2><span><?php echo get_field( 'titulo_2_' . $lang )?></span></h2>
			<?php echo get_field( 'texto_2_' . $lang )?>
		</div>
		<div class="studio-div block-5 col-xs-6 col-md-3">
			<figure>
				<div class="bg" style="background-image: url(<?php echo get_field( 'img_3_' . $lang )?>)"></div>
			</figure>
		</div>
		<div class="studio-div block-6 col-xs-6 col-md-4">
			<figure>
				<div class="bg" style="background-image: url(<?php echo get_field( 'img_4_' . $lang )?>)"></div>
			</figure>
		</div>
	</div>
</div>



