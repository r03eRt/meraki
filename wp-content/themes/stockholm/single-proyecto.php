<?php $lang = strtolower(ICL_LANGUAGE_CODE); ?>

<?php get_header(); ?>


<style>

	.main-container {
		width: 1200px;
		font-family: 'Futura Light';
		color: #252525;
	}

	.proyecto-header {
		min-height: 260px;
		padding-top: 7.5px;
		padding-bottom: 7.5px;
		background-clip: content-box;		
		color: #252525;
		background-color: whitesmoke;		
	}

	.proyecto-header .bg{
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
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        border: 1px solid #f5f5f5;
	}

	.proyecto-header h2{
		position: absolute;
		top: 50%;
		left: 50%;
		text-align: center;
		font-family: 'Futura Heavy';
		-webkit-transform: translate3d(-50%,-50%,0);
		transform: translate3d(-50%,-50%,0);
	}

	.proyecto-header h2 .titulo{
		display: block;
		width: 100%;
		letter-spacing: 0px;
	}

	.proyecto-header h2 .subtitulo{
		display: block;
		width: 100%;
		font-family: 'Futura Light';
		font-style: italic;
		font-size: 13px;
		text-transform: lowercase;
		letter-spacing: 0;
		font-weight: normal;
		color: #252525;
	}

	.proyecto-header h2 .subtitulo:first-letter {
 	   text-transform: uppercase;
	}

	.proyecto-div {
		min-height: 280px;
		padding-top: 7.5px;
		padding-bottom: 7.5px;
		background-clip: content-box;
		text-decoration: none;
		color: #252525;
	}

	.proyecto-div figure {
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
	
	.proyecto-div figure .bg{
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

	.proyecto-div figure:hover .bg{
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

	.proyecto-div figure .overlay{
		position: absolute;
		padding: 15px;
	    top: 0;
	    left: 0;
	    display: block;
	    margin: 0;
	    width: 100%;
	    height: 100%;
	    opacity: 0.001;
		background-color: rgba(255, 255, 255, 0.5);
		/*-webkit-transform: translate3d(0, 100%, 0);
	    transform: translate3d(0, 100%, 0);
	    -webkit-transition: 0.5s transform ease-in-out, opacity 0.6s linear;
	    transition: 0.5s transform ease-in-out, opacity 0.6s linear;*/
	    -webkit-transition: 0.5s opacity ease-in-out;
	    transition: 0.5s opacity ease-in-out;
	}

	.proyecto-div figure:hover .overlay{		
		/*-webkit-transform: translate3d(0, 0%, 0);
	    transform: translate3d(0, 0%, 0);*/
	    opacity: 1;	    
	}

	.proyecto-div p {
        font-size: 12px;
    	line-height: 14px;
    	margin-bottom: 10px;
	}

	.proyecto-div h2 {
		display: block;
		width: 100%;
        font-size: 12px;
    	line-height: 14px;
    	margin-bottom: 10px;
    	text-transform: lowercase;
    	text-align: center;
	}

	.proyecto-div h2 {
		display: block;
		width: 100%;
        font-size: 14px;
    	line-height: 14px;
    	margin-bottom: 10px;
    	letter-spacing: 0px;
    	margin-top: 15px;
	}

	.proyecto-div h2:first-letter {
		 text-transform: uppercase;
	}

	.proyecto-div h2.titulo-proyecto {
        text-align: left;
	    margin-bottom: 10px;
	    margin-top: 15px;
	    font-family: 'Futura Heavy';
	    letter-spacing: 0px;
	    font-size: 18px;
	    position: relative;
	}

	body div.pp_default a.pp_next {
	    right: 0;
	    transform: translate3d(100%,0,0);
	}

	body div.pp_default a.pp_previous {
	    left: 0;
	    transform: translate3d(-100%,0,0);
	}

	body div.pp_default a.pp_next:after, body div.pp_default a.pp_previous:after {
	    color: #252525;
	}

	body div.pp_default a.pp_next:hover:after, body div.pp_default a.pp_previous:after {
	    color: #888888;
	}

	body div.pp_default a.pp_next:after, body div.pp_default a.pp_previous:after {
	    position: absolute;
	    top: 0;
	    left: 27%;
	    display: block;
	    color: #252525;
	    font-family: 'FontAwesome',serif;
	    font-size: 54px;
	    -webkit-transition: color .3s ease-in-out;
	    -moz-transition: color .3s ease-in-out;
	    -ms-transition: color .3s ease-in-out;
	    -o-transition: color .3s ease-in-out;
	    transition: color .3s ease-in-out;
	}

	div.pp_overlay {
	    background-color: #ffffff;
	    display: none;
	    left: 0;
	    position: absolute;
	    top: 0;
	    width: 100%;
	    z-index: 9500;
	}

	body div.pp_default a.pp_next, body div.pp_default a.pp_previous {
	    background-color: transparent!important;
	    border: none;
	}

	body div.pp_default a.pp_next:hover, body div.pp_default a.pp_previous:hover {
	    background-color: transparent!important;
	    border: none;
	}

</style>

<div class="main-container container">
	<div class="row">
		<div class="proyecto-header header-block col-md-12">
			<figure class="bg" style="background-image: url(<?php echo get_field( 'img_cabecera');?>)"></figure>
			<h2>
				<span class="titulo"><?php echo get_field( 'titulo_' . $lang); ?></span>
				<span class="subtitulo"><?php echo get_field( 'subtitulo_' . $lang); ?></span>
			</h2>			
		</div>
	</div>
	<div class="row">
		<a href="<?php echo get_field( 'img_1')?>" rel="prettyPhoto[<?php echo get_field( 'titulo_' . $lang); ?>]" class="proyecto-div block-1 col-md-4">
			<figure>
				<div class="bg" style="background-image: url(<?php echo get_field( 'img_1')?>)"></div>
				<div class="overlay"></div>
			</figure>
		</a>
		<a href="<?php echo get_field( 'img_2')?>" rel="prettyPhoto[<?php echo get_field( 'titulo_' . $lang); ?>]" class="proyecto-div block-1 col-md-4">
			<figure>
				<div class="bg" style="background-image: url(<?php echo get_field( 'img_2')?>)"></div>
				<div class="overlay"></div>
			</figure>
		</a>
		<div class="proyecto-div block-1 col-md-4">
			<h2><span><?php echo get_field( 'titular_' . $lang )?></span></h2>
			<?php echo get_field( 'texto_' . $lang )?>
		</div>
		<?php for($i = 0; $i < count(get_field('repeater_img')); $i++){ ?>
			<a href="<?php echo get_field('repeater_img')[$i]['img'] ?>" rel="prettyPhoto[<?php echo get_field( 'titulo_' . $lang); ?>]" class="proyecto-div block-1 col-md-4">
				<figure>
					<div class="bg" style="background-image: url(<?php echo get_field('repeater_img')[$i]['img'] ?>)"></div>
					<div class="overlay"></div>
				</figure>
			</a>
		<?php } ?>
	</div>
</div>

<?php get_footer(); ?>

