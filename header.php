<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K4ZHXFCR');</script>
<!-- End Google Tag Manager -->
	<meta charset="<?php bloginfo("charset"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta name="description" content="<?php if ( is_single() ) {
        single_post_title('', true);
    } else {
        bloginfo('name'); echo " - "; bloginfo('description');
    }
    ?>" />

	<!-- Preload Fonts -->
	<link rel="preload" as="font" href="<?php echo get_template_directory_uri() . '/fonts/Mermaid1001.ttf' ?>" type="font/ttf" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,300;0,400;0,600;0,700;0,900;1,400&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K4ZHXFCR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<nav id="site-header">
	<div class="container">
		<div class="row align-items-center justify-content-between">
			<div class="col-6 col-md-2">

				<a href="<?php echo site_url(); ?>" class="brand" title="<?php echo get_bloginfo('name'); ?>">
					<img src="https://www.zillacapital.com/wp-content/uploads/2026/01/cropped-zilla-capital-logo@2x.png"
					     alt="<?php echo get_bloginfo('name'); ?>"
					     style="max-height: 48px; width: auto;">
				</a>
			</div>

			<div class="burger-button">
				<span></span>
				<span></span>
				<span></span>
			</div>

			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary_menu',
						'menu_class' => '',
						'menu_id' => '',
						'container_class' => 'navigation col-12 col-md-10',
					)
				)
			?>

		</div>
	</div>
</nav>

<aside class="side_navigation">
	<div class="overlay"></div>

	<div class="navigation col-9 col-md-10">
		<div class="burger-button open">
			<img src="<?php echo THEME_DIR_URI . '/dist/images/menu-close-icon.svg' ?>" alt="close icon" />
		</div>
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary_menu',
					'menu_class' => '',
					'menu_id' => '',
					'container' => false
				)
			)
		?>
	</div>
</aside>

<?php
if(!is_home() && !is_archive() && !is_front_page() && !is_singular('blogs') && !is_singular('team') &&  !is_singular('post') && !is_singular('associate')&& !is_singular('insights')&& !is_singular('reports') && !is_category('insights')  && !is_404()):
	get_template_part('template-parts/header/header','internal');
endif;

$_is_flash_note = is_singular('reports') && !empty(get_post_meta(get_the_ID(), '_FN_box1', true));
if(!$_is_flash_note && (is_singular('team') || is_archive() || is_singular('post') || is_singular('associate') || is_singular('blogs') || is_singular('insights') || is_singular('reports'))):
	get_template_part('template-parts/header/header','single-team');
endif;

if(is_404()):
	get_template_part('template-parts/header/header','404');
endif;
?>