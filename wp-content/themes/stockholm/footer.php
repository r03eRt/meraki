<?php 

$lang = strtolower(ICL_LANGUAGE_CODE);

?>

<?php


global $qode_options;

//init variables
$page_id 							= $wp_query->get_queried_object_id();
$content_bottom_area 				= "yes";
$content_bottom_area_sidebar 		= "";
$content_bottom_area_in_grid 		= true;
$content_bottom_background_color 	= '';
$uncovering_footer					= false;
$footer_classes_array				= array();
$footer_classes						= '';
$footer_border_columns				= 'yes';
$footer_top_border_color            = '';
$footer_top_border_in_grid          = '';
$footer_bottom_border_color         = '';
$footer_bottom_border_in_grid       = '';

if(isset($qode_options['footer_border_columns']) && $qode_options['footer_border_columns'] !== '') {
	$footer_border_columns = $qode_options['footer_border_columns'];
}

if(!empty($qode_options['footer_top_border_color'])) {
	$footer_top_border_color = 'style="height: 1px;background-color: '.$qode_options['footer_top_border_color'].';"';
}

if(isset($qode_options['footer_top_border_in_grid']) && $qode_options['footer_top_border_in_grid'] == 'yes') {
	$footer_top_border_in_grid = 'in_grid';
}

if(!empty($qode_options['footer_bottom_border_color'])) {
	$footer_bottom_border_color = 'style="height: 1px;background-color: '.$qode_options['footer_bottom_border_color'].';"';
}

if(isset($qode_options['footer_bottom_border_in_grid']) && $qode_options['footer_bottom_border_in_grid'] == 'yes') {
	$footer_bottom_border_in_grid = 'in_grid';
}

//is content bottom area enabled for current page?
if(get_post_meta($page_id, "qode_enable_content_bottom_area", true) != ""){
	$content_bottom_area = get_post_meta($page_id, "qode_enable_content_bottom_area", true);
} elseif(isset($qode_options['enable_content_bottom_area'])) {
	//content bottom area is turned on in theme options
	$content_bottom_area = $qode_options['enable_content_bottom_area'];
}

//is content bottom area enabled?
if($content_bottom_area == 'yes') {
	//is sidebar chosen for content bottom area for current page?
	if(get_post_meta($page_id, 'qode_choose_content_bottom_sidebar', true) != ""){
		$content_bottom_area_sidebar = get_post_meta($page_id, 'qode_choose_content_bottom_sidebar', true);
	} elseif(isset($qode_options['content_bottom_sidebar_custom_display'])) {
		//sidebar is chosen for content bottom area in theme options
		$content_bottom_area_sidebar = $qode_options['content_bottom_sidebar_custom_display'];
	}

	//take content bottom area in grid option for current page if set or from theme options otherwise
	if(get_post_meta($page_id, 'qode_content_bottom_sidebar_in_grid', true) != ""){
		$content_bottom_area_in_grid = get_post_meta($page_id, 'qode_content_bottom_sidebar_in_grid', true);
	} elseif(isset($qode_options['content_bottom_in_grid'])) {
		$content_bottom_area_in_grid = $qode_options['content_bottom_in_grid'];
	}

	//is background color for content bottom area set for current page
	if(get_post_meta($page_id, "qode_content_bottom_background_color", true) != ""){
		$content_bottom_background_color = get_post_meta($page_id, "qode_content_bottom_background_color", true);
	}
}
?>
<?php if($content_bottom_area == "yes") { ?>

	<div class="content_bottom" <?php if($content_bottom_background_color != ''){ echo 'style="background-color:'.$content_bottom_background_color.';"'; } ?>>
        <?php if($content_bottom_area_in_grid == 'yes'){ ?>
            <div class="container">
            <div class="container_inner clearfix">
        <?php } ?>
            <?php dynamic_sidebar($content_bottom_area_sidebar); ?>
        <?php if($content_bottom_area_in_grid == 'yes'){ ?>
            </div>
            </div>
        <?php } ?>
	</div>
<?php } ?>

<?php

//is uncovering footer option set in theme options?
if(isset($qode_options['uncovering_footer']) && $qode_options['uncovering_footer'] == "yes") {
	//add uncovering footer class to array
	$footer_classes_array[] = 'uncover';
}

if($footer_border_columns == 'yes') {
	$footer_classes_array[] = 'footer_border_columns';
}

//is some class added to footer classes array?
if(is_array($footer_classes_array) && count($footer_classes_array)) {
	//concat all classes and prefix it with class attribute
	$footer_classes = 'class="'. implode(' ', $footer_classes_array).'"';
}

?>
    </div>
</div>
<!-- <footer <?php echo wp_kses($footer_classes, array('class')); ?>>
	<div class="footer_inner clearfix">
		<?php
		$footer_in_grid = true;
		if(isset($qode_options['footer_in_grid'])){
			if ($qode_options['footer_in_grid'] != "yes") {
				$footer_in_grid = false;
			}
		}
		$display_footer_top = true;
		if (isset($qode_options['show_footer_top'])) {
			if ($qode_options['show_footer_top'] == "no") $display_footer_top = false;
		}

		$footer_top_columns = 4;
		if (isset($qode_options['footer_top_columns'])) {
			$footer_top_columns = $qode_options['footer_top_columns'];
		}

		if($display_footer_top) {
			if($footer_top_border_color != ''){ ?>
				<div class="fotter_top_border_holder <?php echo esc_attr($footer_top_border_in_grid); ?>" <?php echo wp_kses($footer_top_border_color, array('style')); ?>></div>
			<?php } ?>
			<div class="footer_top_holder">
				<div class="footer_top<?php if(!$footer_in_grid) {echo " footer_top_full";} ?>">
					<?php if($footer_in_grid){ ?>
					<div class="container">
						<div class="container_inner">
							<?php } ?>
							<?php switch ($footer_top_columns) {
								case 6:
									?>
									<div class="two_columns_50_50 clearfix">
										<div class="qode_column column1">
											<div class="column_inner">
												<?php dynamic_sidebar( 'footer_column_1' ); ?>
											</div>
										</div>
										<div class="qode_column column2">
											<div class="column_inner">
												<div class="two_columns_50_50 clearfix">
													<div class="qode_column column1">
														<div class="column_inner">
															<?php dynamic_sidebar( 'footer_column_2' ); ?>
														</div>
													</div>
													<div class="qode_column column2">
														<div class="column_inner">
															<?php dynamic_sidebar( 'footer_column_3' ); ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php
									break;
								case 5:
									?>
									<div class="two_columns_50_50 clearfix">
										<div class="qode_column column1">
											<div class="column_inner">
												<div class="two_columns_50_50 clearfix">
													<div class="qode_column column1">
														<div class="column_inner">
															<?php dynamic_sidebar( 'footer_column_1' ); ?>
														</div>
													</div>
													<div class="qode_column column2">
														<div class="column_inner">
															<?php dynamic_sidebar( 'footer_column_2' ); ?>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="qode_column column2">
											<div class="column_inner">
												<?php dynamic_sidebar( 'footer_column_3' ); ?>
											</div>
										</div>
									</div>
									<?php
									break;
								case 4:
									?>
									<div class="four_columns clearfix">
										<div class="qode_column column1">
											<div class="column_inner">
												<?php dynamic_sidebar( 'footer_column_1' ); ?>
											</div>
										</div>
										<div class="qode_column column2">
											<div class="column_inner">
												<?php dynamic_sidebar( 'footer_column_2' ); ?>
											</div>
										</div>
										<div class="qode_column column3">
											<div class="column_inner">
												<?php dynamic_sidebar( 'footer_column_3' ); ?>
											</div>
										</div>
										<div class="qode_column column4">
											<div class="column_inner">
												<?php dynamic_sidebar( 'footer_column_4' ); ?>
											</div>
										</div>
									</div>
									<?php
									break;
								case 3:
									?>
									<div class="three_columns clearfix">
										<div class="qode_column column1">
											<div class="column_inner">
												<?php dynamic_sidebar( 'footer_column_1' ); ?>
											</div>
										</div>
										<div class="qode_column column2">
											<div class="column_inner">
												<?php dynamic_sidebar( 'footer_column_2' ); ?>
											</div>
										</div>
										<div class="qode_column column3">
											<div class="column_inner">
												<?php dynamic_sidebar( 'footer_column_3' ); ?>
											</div>
										</div>
									</div>
									<?php
									break;
								case 2:
									?>
									<div class="two_columns_50_50 clearfix">
										<div class="qode_column column1">
											<div class="column_inner">
												<?php dynamic_sidebar( 'footer_column_1' ); ?>
											</div>
										</div>
										<div class="qode_column column2">
											<div class="column_inner">
												<?php dynamic_sidebar( 'footer_column_2' ); ?>
											</div>
										</div>
									</div>
									<?php
									break;
								case 1:
									dynamic_sidebar( 'footer_column_1' );
									break;
							}
							?>
							<?php if($footer_in_grid){ ?>
						</div>
					</div>
				<?php } ?>
				</div>
			</div>
		<?php } ?>
		<?php
		$display_footer_text = false;
		if (isset($qode_options['footer_text'])) {
			if ($qode_options['footer_text'] == "yes") $display_footer_text = true;
		}
		if($display_footer_text): ?>
			<div class="footer_bottom_holder">
				<?php if($footer_bottom_border_color != ''){ ?>
					<div class="fotter_top_border_holder <?php echo esc_attr($footer_bottom_border_in_grid); ?>" <?php echo wp_kses($footer_bottom_border_color, array('style')); ?>></div>
				<?php } ?>
				<div class="footer_bottom">
					<?php dynamic_sidebar( 'footer_text' ); ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</footer> -->
<footer>
	<div class="fotter_top_border_holder " style="height: 1px;background-color: #d7d7d7;"></div>
	<div class="container">
		<div class="row row-footer">
			<div class="col-sm-3 col-md-3 logo text-center">
				<img src="http://www.merakistudiomadrid.com/wp-content/uploads/2017/03/MERAKI.png" alt="logo" />
			</div>
			<div class="col-sm-6 col-md-6 direccion">

			<?php 
				$link = get_field('footer_link_' . $lang, 'options');
				$direction = get_field('footer_direction_' . 'es', 'options');
			?>
				<p>
				<a href="mailto:<?php echo $link; ?>"><?php echo $link; ?><br class="visible-xs"/>
					
				</a> <?php //echo $direction; ?>
				| Calle Campoamor 10, 28004 Madrid | +34 914 21 40 96</p>
			</div>
			<div class="col-sm-3 col-md-3 social">

				<?php 
					$instagram = get_field('instagram', 'options');
					$facebook = get_field('facebook', 'options');
					$twitter = get_field('twitter', 'options');

					echo do_shortcode('[social_icons type="normal_social" icon_pack="font_elegant" fa_icon="fa-adn" fe_icon="social_facebook_circle" size="large" target="_blank" link="' . $facebook .'" icon_color="#393939" icon_hover_color="#e6ae48"][social_icons type="normal_social" icon_pack="font_elegant" fa_icon="fa-adn" fe_icon="social_instagram_circle" size="large" target="_self" link="' . $instagram .'" icon_color="#393939" icon_hover_color="#e6ae48"]') 
				?>
			</div>
		</div>
	</div>

</footer>

</div>
</div>
<?php wp_footer(); ?>

<?php if(get_field('coming_soon', 'options')){ ?>
<style>
@font-face {
  font-family: "merakistudiomadrid";
  font-style: normal;
  font-weight: normal;
  src: url("http://www.merakistudiomadrid.com/css/fonts/futura_lt_book_1-.eot") format("eot"), url("http://www.merakistudiomadrid.com/css/fonts/futura_lt_book_1.woff2") format("ttf"), url("http://www.merakistudiomadrid.com/css/fonts/futura_lt_book_1.woff") format("woff"); }

#overlay-coming-soon {
    background: transparent url(http://www.merakistudiomadrid.com/img/fondo.jpg) 0 0 no-repeat;
    background-size: cover;
    margin: 0;
    padding: 0;
    min-width: 100vw;
    min-height: 100vh;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 99999;
    overflow: hidden;
}

html {
	margin: 0!important;
}

footer {
	display: none;
}

#overlay-coming-soon .page section.brand {
  width: 320px;
  padding-left: 40px;
  padding-right: 40px;
  max-width: 100%;
  margin-left: 63%;
  text-align: center;
  border: 0px solid rgba(255, 255, 255, 0.47);
  background-color: rgba(255, 255, 255, 0.88);
  min-height: 100vh; }
  #overlay-coming-soon .page section.brand h1 {
    padding-top: 160px;
    margin-top: 0; }
  #overlay-coming-soon .page section.brand .logo {
    width: 169px;
    margin-bottom: 40px; }
  #overlay-coming-soon .page section.brand span.red {
    color: #9A2921;
    font-family: merakistudiomadrid,sans-serif;
    font-size: 25px;
    font-weight: bold; }
  #overlay-coming-soon .page section.brand p {
    color: #414141;
    font-family: merakistudiomadrid,sans-serif; }
  #overlay-coming-soon .page section.brand a {
    display: block;
    font-size: 13px;
    color: #414141;
    text-decoration: none;
    line-height: 31px; }
    #overlay-coming-soon .page section.brand a:hover {
      text-decoration: underline; }
  #overlay-coming-soon .page section.brand .social {
    padding-bottom: 40px; }
    #overlay-coming-soon .page section.brand .social .mail {
      font-size: 10px; }
    #overlay-coming-soon .page section.brand .social .iconos a {
      display: inline-block;
      transition: opacity 0.5s ease; }
      #overlay-coming-soon .page section.brand .social .iconos a .socialIcon {
        width: 39px; }
      #overlay-coming-soon .page section.brand .social .iconos a:hover {
        opacity: 0.5; }

@media screen and (max-width: 768px) {
  #overlay-coming-soon .page section.brand {
    margin-left: 0;
    margin: 0 auto;
    padding-left: 10px;
    padding-right: 10px; }
    #overlay-coming-soon .page section.brand h1 {
      padding-top: 10px;
      margin-bottom: 10px; }
    #overlay-coming-soon .page section.brand .logo {
      margin-bottom: 0px; }
    #overlay-coming-soon .page section.brand span.red {
      font-size: 21px; }
    #overlay-coming-soon .page section.brand .social {
      padding-bottom: 10px; } }

	
</style>
<div id="overlay-coming-soon">
	<div class="page">
		<section class="brand">
			<h1 class="title2">
				<a href="www.merakistudiomadrid.com">
					<img class="logo" src="http://www.merakistudiomadrid.com/img/meraki-studio-madrid-logo.png" alt="MERAKI Studio Madrid">
				</a>
			</h1>

			<span class="red">
				COMING SOON
			</span>

			<p>
				Estamos de obras en nuestra web.
				Para más información no dudes en
				escribirnos a:
				<a href="mailto:​hola@merakistudiomadrid.com" class="mail">​hola@merakistudiomadrid.com</a>
				 
				o llamar al:
				<a href="tel:660080141" class="tel">(34) 660 080 141</a>
			</p>


			<div class="social">
				<!-- <a target="_blank" href="mailto:​hola@merakistudiomadrid.com" class="mail">​hola@merakistudiomadrid.com</a> -->
				<div class="iconos">
					<a href="https://www.instagram.com/merakistudiomadrid/" target="_blank" class="instagramLink">
						<img src="http://www.merakistudiomadrid.com/img/instagram.png" alt="Instagram Meraki" class="instagram socialIcon">
					</a>
					<a href="https://www.facebook.com/merakistudiomadrid/?ref=aymt_homepage_panel" target="_blank" class="facebookLink">
						<img src="http://www.merakistudiomadrid.com/img/facebook.png" alt="Facebook Meraki" class="facebook socialIcon">
					</a>
				</div>
			</div>

		</section>
	</div>
</div>
<?php } ?>

</body>
</html>