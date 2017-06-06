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
		padding-top: 0px!important;
	}

	@media(max-width: 768px) {
		.main-container {
			width: 100%;
		    min-height: calc(100vh - 130px);
		    padding: 0px;
		}
	}


</style>


<div class="main-container container">
	<div class="row">
		<div class="privacy-div col-md-12">
			<h2><?php echo get_field( 'titulo_' . $lang )?></h2>
			<?php echo get_field( 'contenido_' . $lang )?>
		</div>
	</div>
</div>



