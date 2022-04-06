<!DOCTYPE html>
<html lang="pt-br">
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><!--<![endif]-->
<head>
	<!-- Meta tags Obrigatórias -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<meta http-equiv="content-language" content="pt-br" />
	<meta name="copyright" content="(c)2022 Copyright de André Penna. Todos os direitos reservados." />
	<meta name="author" content="André Penna">
	<!-- If this is a single post view, show the post title; if this is a multi-post view, show the blog name and description -->
	<meta name="description" content="<?php if ( is_single() ) {
	        single_post_title('', true); 
	    } else {
	        bloginfo('name'); echo " - "; bloginfo('description');
	    }
	    ?>"/>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
</head>

	<body <?php body_class( '' ); ?> >

	<!--[if IE]>
	<p class="browserupgrade">Se você está usando um browser <strong>desatualizado</strong>. Por favor, <a href="http://browsehappy.com/">atualize seu browser</a> para melhorar sua experiência.</p>
	<![endif]-->

		<!--Loader - CSS Spinner-->
		<!-- <div class="spinner-wrapper">
			<div class="spinner"></div>
		</div> -->

    <!-- header -->
    <header class="py-0 bg-white">
				<nav class="navbar navbar-expand-lg navbar-light py-4">
					<div class="container d-flex flex-row justify-content-between">
						<a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<?php
							wp_nav_menu( array(
									'theme_location' => 'primary', // Defined when registering the menu
									'menu_id'        => 'main-menu',
									'container'      => false,
									'depth'          => 2,
									// 'menu_class'     => 'navbar-nav',
									'menu_class'     => 'navbar-nav me-auto mb-2 mb-lg-0 mx-auto text-center',
									'walker'         => new Bootstrap_NavWalker(), // This controls the display of the Bootstrap Navbar
									'fallback_cb'    => 'Bootstrap_NavWalker::fallback', // For menu fallback
							) );
							?>
              <button type="button" id="botao-modal" class="btn btn-solido fundoBranco float-end d-none d-sm-none d-md-none d-lg-block" data-bs-toggle="modal" data-bs-target="#modal_livro">sign-in</button>
						</div>
					</div>
				</nav>
    </header>