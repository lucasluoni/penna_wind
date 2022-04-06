<?php while ( have_posts() ) : the_post(); //Open the loop ?>

  <div class="container-fluid intro-home mx-auto text-center d-flex w-100 h-100 px-0">  
    <section class="hero-image d-flex w-100 mx-auto flex-column">
      <div class="hero-text">
        <h1><?php echo get_bloginfo('name'); ?></h1>
        <p id="description"><?php echo get_bloginfo('description'); ?></p>
        <a class="btn btn-solido" href="#intro_andre">saiba mais</a>
      </div>    
    </section>
  </div>

  <section id="intro_andre" class="container py-5 content">

    <h2 class="w-75 text-center mx-auto mb-5">I’m an avid adventurer <br /> and a professional kitesurfer</h2>

    <div class="row">

      <div class="col-12 col-xs-6 cols-sm-12 col-md6 col-lg-6 col-xl-6 d-flex flex-column justify-content-evenly">
        <h3 class="mb-2 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
          <?php echo get_bloginfo('name'); ?>
        </h3>
        <span><?php the_content(); ?></span>
        <a 
          class="btn btn-solido d-none d-xs-none d-sm-none d-md-none d-lg-inline-flex d-xl-inline-flex d-xxl-inline-flex w-50" 
          href="<?php echo home_url(); ?>/about">
          saiba mais
        </a>
        <a 
          class="btn btn-solido d-block d-xs-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none my-4 mx-auto" 
          href="<?php echo home_url(); ?>/about">
          saiba mais
        </a>
      </div>

      <div class="col-12 col-xs-6 cols-sm-12 col-md6 col-lg-6 col-xl-6">
      <img 
        src="<?php echo get_template_directory_uri(); ?>/images/foto-andre-penna-sobre.jpg" 
        class="img-fluid mx-auto" 
        alt="André Penna" 
      />
      </div>
      
    </div>
    
    <div class="row mt-5">
      <div class="col-xxl-12 mx-auto">
      <img
        id="logo-surfing-sem-fim" 
        src="<?php echo get_template_directory_uri(); ?>/images/logo-ssf-2022.svg" 
        class="img-fluid mx-auto" 
        alt="Logo Surfing Sem Fim" 
      />
      </div>
    </div>

  </section>
  
  <section><div id="parallax-lencois-home"></div></section>

  <section id="intro_rotas" class="container py-5 content">

    <div class="row">

      <div class="col-12 col-xs-6 cols-sm-12 col-md6 col-lg-6 col-xl-6 d-flex flex-column justify-content-evenly">

        <span><?php the_content(); ?>
        <a 
          class="btn btn-solido d-none d-xs-none d-sm-none d-md-none d-lg-inline-flex d-xl-inline-flex d-xxl-inline-flex w-50" 
          href="<?php echo home_url(); ?>/about">
          saiba mais
        </a>
        <a 
          class="btn btn-solido d-block d-xs-block d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none my-4 mx-auto" 
          href="<?php echo home_url(); ?>/about">
          saiba mais
        </a>
        </span>
      </div>

      <div class="col-12 col-xs-6 cols-sm-12 col-md6 col-lg-6 col-xl-6 d-flex flex-row justify-content-center">
      <img 
        src="<?php echo get_template_directory_uri(); ?>/images/home-intro-routes-map.png" 
        class="img-fluid mx-auto" 
        alt="André Penna"
        style="max-width: 70% !important;"
      />
      </div>
      
    </div>
    
  </section>  

  <section class="pb-5 d-none d-sm-none d-md-block d-lg-block d-xl-block d-xxl-block">
    <div class="row d-flex flex-row justify-content-center">
        <video class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8 col-xxl-6" controls muted>
          <source src="/videos/brincando-de-isca.mp4" type="video/mp4">
          <source src="movie.ogg" type="video/ogg">
          Your browser does not support the video tag.
        </video>
      </div>
    </div>
  </section>

  <section><div id="f-one-banner-home"></div></section>

  <section id="contato" class="container py-5 content">
    <div class="row">
      <h2 class="blue">Contato</h2>
      <p>Ficou interessado? <span>Quer fazer uma travessia de kitesurf?</span></p>
      <p>Não hesite em me escrever por <a href="mailto:andre.conimex@gmail.com" target="_blank" rel='noopener noreferrer'>email</a></p>
    </div>
  </section>

  <section class="entry-utility">
		<?php //comments_template(); ?>
	</section><!-- .entry-utility -->
	
<?php endwhile; ?>