<?php 

$lang = strtolower(ICL_LANGUAGE_CODE);

?>

<style>
	.main-container {
		width: 1024px;
		font-family: 'Futura Light';
		color: #252525;
		min-height: calc(100vh - 300px);
	}

	.proyectos-div {
		min-height: 380px;
		padding-top: 7.5px;
		padding-bottom: 7.5px;
		background-clip: content-box;
		text-decoration: none;
		color: #252525;
	}

	.proyectos-div figure {
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
	
	.proyectos-div figure .bg{
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

	.proyectos-div figure:hover .bg{
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

	.proyectos-div figure .overlay{
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

	.proyectos-div figure:hover .overlay{		
		/*-webkit-transform: translate3d(0, 0%, 0);
	    transform: translate3d(0, 0%, 0);*/
	    opacity: 1;	    
	}

	.proyectos-div p {
        font-size: 12px;
    	line-height: 14px;
    	margin-bottom: 10px;
	}

	.proyectos-div h2.titulo-proyecto {
        text-align: left;
	    margin-bottom: 10px;
	    margin-top: 15px;
	    font-family: 'Futura Heavy';
	    letter-spacing: 0px;
	    font-size: 18px;
	    position: relative;
	}

	span.subtitulo-proyecto {
	    display: block;
    	width: 100%;
    	font-style: italic;
	    line-height: 4px;
	}

	span.subtitulo-2-proyecto {
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
</style>


<div class="main-container container">
	<div class="row">
		<?php 

		for($i = 0; $i < count(get_field( 'lista_proyectos_' . $lang )); $i++){ 
			$post_id = get_field( 'lista_proyectos_' . $lang)[$i]->ID;
		?>
		<a href="<?php echo get_post_permalink($post_id); ?>" class="proyectos-div block-1 col-md-3">
			<figure>
				<div class="bg" style="background-image: url(<?php echo get_field( 'img_destacada', $post_id );?>)"></div>
				<div class="overlay">
					<h2 class="titulo-proyecto"><span><?php echo get_field( 'titulo_' . $lang, $post_id );?></span></h2>
					<span class="subtitulo-proyecto"><?php echo get_field( 'subtitulo_' . $lang, $post_id );?></span>
					<span class="subtitulo-2-proyecto"><?php echo get_field( 'subtitulo_2_' . $lang, $post_id );?></span>
					<span class="readmore">
						<i class="fa fa-plus" aria-hidden="true"></i>
						<span><?php echo get_field( 'leer_mas_' . $lang, $post_id );?></span>
					</span>
					
				</div>
			</figure>
			<?php echo get_field( 'titulo_' . $lang, $post_id ); ?>
		</a>
		<?php

		}
		
		?>
	</div>
</div>
