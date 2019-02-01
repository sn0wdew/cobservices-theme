<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package COB_Services
 */

?>
<!doctype html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<meta name="author" content="Michael Snider">
	<?php $cob_current_directory = get_template_directory_uri();?>
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $cob_current_directory; ?>/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $cob_current_directory; ?>/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $cob_current_directory; ?>/favicons/favicon-16x16.png">
	<link rel="manifest" href="<?php echo $cob_current_directory; ?>/favicons/site.webmanifest">
	<link rel="mask-icon" href="<?php echo $cob_current_directory; ?>/favicons/safari-pinned-tab.svg" color="#00694e">
	<link rel="shortcut icon" href="<?php echo $cob_current_directory; ?>/favicons/favicon.ico">
	<meta name="apple-mobile-web-app-title" content="CoB Services">
	<meta name="application-name" content="Business Services">
	<meta name="msapplication-TileColor" content="#ff0000">
	<meta name="msapplication-TileImage" content="<?php echo $cob_current_directory; ?>/favicons/mstile-144x144.png">
	<meta name="msapplication-config" content="<?php echo $cob_current_directory; ?>/favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<?php if(is_front_page()): ?>
	<style>@font-face{font-family:"Roboto";font-weight:400;src:url(../wp-content/themes/cob-services/fonts/Roboto.eot) format("eot"),url(../wp-content/themes/cob-services/fonts/Roboto.woff) format('woff')}@font-face{font-family:"Open Sans";font-weight:400;src:url(../wp-content/themes/cob-services/fonts/OpenSans.eot) format("eot"),url(../wp-content/themes/cob-services/fonts/OpenSans.woff) format('woff')}:root{--blue:#007bff;--indigo:#6610f2;--purple:#6f42c1;--pink:#e83e8c;--red:#dc3545;--orange:#fd7e14;--yellow:#ffc107;--green:#28a745;--teal:#20c997;--cyan:#17a2b8;--white:#fff;--gray:#868e96;--gray-dark:#343a40;--primary:#007bff;--secondary:#868e96;--success:#28a745;--info:#17a2b8;--warning:#ffc107;--danger:#dc3545;--light:#f8f9fa;--dark:#343a40;--breakpoint-xs:0;--breakpoint-sm:576px;--breakpoint-md:768px;--breakpoint-lg:992px;--breakpoint-xl:1200px;--font-family-monospace:SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;--font-family-sans-serif:'Roboto'}@-ms-viewport{width:device-width}.container{width:100%;padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}@media (min-width:576px){.container{max-width:540px}}@media (min-width:768px){.container{max-width:720px}}@media (min-width:992px){.container{max-width:960px}}@media (min-width:1200px){.container{max-width:1200px}}.row{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px}.col-sm-12,.col-md-8{position:relative;width:100%;min-height:1px;padding-right:15px;padding-left:15px}@media (min-width:576px){.col-sm-12{-webkit-box-flex:0;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}}@media (min-width:768px){.col-md-8{-webkit-box-flex:0;-ms-flex:0 0 66.666667%;flex:0 0 66.666667%;max-width:66.666667%}}.form-control{display:block;width:100%;padding:.375rem .75rem;font-size:1.3rem;line-height:1.5;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da}.form-control::-ms-expand{background-color:transparent;border:0}.form-control::-webkit-input-placeholder{color:#868e96;opacity:1}.form-control::-moz-placeholder{color:#868e96;opacity:1}.form-control:-ms-input-placeholder{color:#868e96;opacity:1}.form-control::-ms-input-placeholder{color:#868e96;opacity:1}.form-inline{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-flow:row wrap;flex-flow:row wrap;-webkit-box-align:center;-ms-flex-align:center;align-items:center}@media (min-width:576px){.form-inline label{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;margin-bottom:0}.form-inline .form-control{display:inline-block;width:auto;vertical-align:middle}}.btn{display:inline-block;font-weight:400;text-align:center;white-space:nowrap;vertical-align:middle;border:1px solid transparent;padding:.375rem 1.5rem;font-size:24px;font-size:2.4rem;line-height:1.5;border-radius:0rem;font-family:"Open Sans"}.btn-dark{color:#fff;background-color:#343a40;border-color:#343a40}.card{position:relative;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#fff;background-clip:border-box;border:1px solid rgba(0,0,0,.125);border-radius:.25rem}.card-body{-webkit-box-flex:1;-ms-flex:1 1 auto;flex:1 1 auto;padding:1.25rem}.card-deck{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column}.card-deck .card{margin-bottom:15px}@media (min-width:576px){.card-deck{-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-flow:row wrap;flex-flow:row wrap;margin-right:-15px;margin-left:-15px}.card-deck .card{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-flex:1;-ms-flex:1 0 0%;flex:1 0 0%;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;margin-right:15px;margin-bottom:0;margin-left:15px}}.clearfix::after{display:block;clear:both;content:""}.d-none{display:none!important}@media (min-width:576px){.d-sm-block{display:block!important}}@media (min-width:768px){.d-md-none{display:none!important}.d-md-block{display:block!important}}.justify-content-center{-webkit-box-pack:center!important;-ms-flex-pack:center!important;justify-content:center!important}.w-100{width:100%!important}.mb-4{margin-bottom:1.5rem!important}.text-center{text-align:center!important}.text-muted{color:#868e96!important}html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}h1{font-size:2em;margin:.67em 0}a{background-color:transparent}img{border-style:none}input{font-family:inherit;font-size:100%;line-height:1.15;margin:0}input{overflow:visible}[type="submit"]{-webkit-appearance:button}[type="submit"]::-moz-focus-inner{border-style:none;padding:0}[type="submit"]:-moz-focusring{outline:1px dotted ButtonText}[type="search"]{-webkit-appearance:textfield;outline-offset:-2px}[type="search"]::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}body,input{color:#000;font-family:"Roboto",sans-serif;font-size:.8125px;font-size:1.3rem;line-height:1.5}h1,h2,h3,.h1,.h2{margin-bottom:.5rem;font-family:inherit;font-weight:500;line-height:1.2;color:inherit}h1,.h1{font-size:48px;font-size:4.8rem}h2,.h2{font-size:24px;font-size:2.4rem;font-family:'Open Sans',sans-serif;margin-top:0}h3{font-size:1.7rem;margin-top:0}p{margin-top:0;margin-bottom:1rem;line-height:1.7rem}i{font-style:italic}*,*::before,*::after{-webkit-box-sizing:border-box;box-sizing:border-box}html{font-family:"Roboto",serif;line-height:1.15;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;-ms-overflow-style:scrollbar;font-size:62.5%}body{margin:0;font-family:'Roboto',sans-serif;font-size:1.3rem;font-weight:400;line-height:1.5;color:#212529;text-align:left;background:#fff}header,nav{display:block}p{margin-top:0;margin-bottom:1rem;line-height:1.7rem}ul{margin-top:0;margin-bottom:1rem}img{vertical-align:middle;border-style:none}a,input:not([type="range"]),label{-ms-touch-action:manipulation;touch-action:manipulation}label{display:inline-block;margin-bottom:.5rem}input{margin:0;font-family:inherit;font-size:inherit;line-height:inherit}input{overflow:visible}[type="submit"]{-webkit-appearance:button}[type="submit"]::-moz-focus-inner{padding:0;border-style:none}[type="search"]{outline-offset:-2px;-webkit-appearance:none}[type="search"]::-webkit-search-cancel-button,[type="search"]::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{font:inherit;-webkit-appearance:button}a{color:#05B4C6;text-decoration:none;background-color:transparent;-webkit-text-decoration-skip:objects}.ft-service a{position:relative}.ft-service a::after{content:"";height:2px;width:0;background-color:#00694E;position:absolute;left:0;bottom:-2px}.top-nav{background-color:white;overflow:auto;color:#606060!important}.top-nav a{color:#606060!important}nav ul{list-style:none;padding:0;margin:0;display:inline-block}nav ul li{display:inline-block;position:relative}.left-nav{float:left;line-height:50px}.right-nav{float:right;display:inline-block;line-height:50px}.main-nav{min-height:6.3rem;overflow:visible;background-color:#00694E;color:white;position:relative;z-index:3}.main-nav a{color:white!important;text-decoration:none}.main-nav #menu a::after{content:"";height:2px;width:0;background-color:white;position:absolute;left:0;top:41px}#menu .current-menu-item::after{content:"";height:2px;width:100%;background-color:white;position:absolute;left:0;top:41px}.main-nav nav{float:right;height:63px;line-height:63px;line-height:6.3rem}.main-nav img{height:63px;height:6.3rem;width:auto}#menu li+li{margin-left:42px}@media screen and (max-width:992px){#menu{display:none}}@media screen and (max-width:576px){.main-nav img{margin-top:7px;height:48px;height:4.8rem}}#main-search-form{float:right;height:30px;overflow:hidden;margin:10px 0}.screen-reader-text{border:0;clip:rect(1px,1px,1px,1px);-webkit-clip-path:inset(50%);clip-path:inset(50%);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute!important;width:1px;word-wrap:normal!important}.home-quick-tips{overflow-y:auto;background-position:center;background-size:cover}.home-quick-tips .container{margin-bottom:22px;margin-bottom:2.2rem}.home-quick-tips .card{margin-bottom:15px;border-radius:0;border:none;-webkit-box-shadow:0 3px 6px 1px rgba(0,0,0,.16);box-shadow:0 3px 6px 1px rgba(0,0,0,.16)}.ft-service img{height:50px;width:auto;display:block;margin:0 auto}.ft-service ul{list-style:none;margin:.3em 0 0 0;padding:0}.ft-service ul li{position:relative;display:block}.ft-service a{color:#024230}.service-links{border-top:solid 1px #C5C5C5;padding:14px 0;text-align:left}.service-links a{color:#024230!important}.service-links ul{margin-left:2.8rem}.service-links li{margin-bottom:1rem}@media (max-width:576px){.search-field{width:125px}}.service-info{clear:both;height:0;opacity:0;display:none;color:black!important}.single-contact{padding:14px 0;max-width:300px}.single-contact+.single-contact{border-top:solid 1px #C5C5C5}.contact-left{float:left;width:33%;padding:0 5px}.contact-left img{max-height:56px;border-radius:50%;width:auto;display:block;margin:0 auto 5px}.contact-left p{line-height:14px;color:#024230}.contact-right{float:left;width:67%;text-align:left;color:#585858}.contact-right h3{line-height:13px;line-height:1.3rem;margin:0 0 .2em 0;color:black}.custom-logo-link{display:inline-block}</style>
  <?php endif; ?>
	<?php wp_head(); ?>
</head>

<?php

	$args = array(
		'post_type' => 'cob_updates',
		'post_per_page' => '1',
		'tax_query' => array(
			array(
				'taxonomy' => 'Display Locations',
				'field' => 'slug',
				'terms'    => 'Entire Website'
			)
		)
	);

$query = new WP_Query( $args ); // custom wp_query

if ( $query->have_posts() ) :?>

<div class="alert alert-warning alert-dismissible fade show" role="main-alert">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php
	          $query->the_post();
	          echo strip_tags(get_the_content());
	      ?>
			</div><!-- .col-12 -->
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div><!-- .row -->
	</div> <!-- .container -->
</div> <!-- [main-alert] -->

<?php
	endif; // End if statement for Entire Website Update type
	wp_reset_query(); // Reset wpquery
	?>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cob-services' ); ?></a>

	<!-- Start Custom Header -->
  <header>
		<div class="container top-nav hidden-print">
	    <nav class="left-nav">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'top-left',
					'items_wrap' => '<ul>%3$s</ul>',
					'container' => false,
					'walker' => new Walker_Nav_Icons()
				) );
				?>
	    </nav>
	    <nav class="right-nav">
				<div id="main-search-form"><?php get_search_form(); ?></div>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'top-right',
					'items_wrap' => '<ul>%3$s</ul>',
					'container' => false,
					'walker' => new Walker_Nav_Icons()
				) );
				?>
	    </nav>
	  </div>

		<!-- Regular main-nav -->
		<div class="main-nav">
	    <div class="container">
					<h1 class="screen-reader-text"><?php bloginfo( 'name' ); ?></h1>
					<h2 class="screen-reader-text"><?php bloginfo( 'description' ); ?></h2>

				<?php
				the_custom_logo();
				?>
	      <nav class="hidden-print">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'main-navigation',
						'menu_id'        => 'menu',
					) );
					?>
	      </nav>
	    </div>
	  </div>
	</header>

  <!-- End Custom Header -->
