<?php while ( have_posts() ) : the_post(); //Open the loop ?>

  <section>
    <div id="parallax-topo-rotas"></div>
  </section>

  <section id="nossas_rotas" class="container pt-5 content">

    <div class="row mb-4">
      <h2 class="w-75 text-center mx-auto mb-5"><?php wp_title(''); ?></h2>
      <span class="flex flex-row d-flex flex-row justify-content-center"><?php the_content(); ?></span>
    </div>

    <div class="row flex flex-row">

    	<?php 
					$args = array(
							'post_type' => 'rotas',
							'post_status' => 'publish',
							'posts_per_page' => '6',
							'order' => 'DESC',
							'paged' => 1,
					);
					$my_post
				?>

				<?php
					$my_posts = new WP_Query( $args );
					if ( $my_posts->have_posts() ) : 
					while ( $my_posts->have_posts() ) : $my_posts->the_post()               
				?>
							
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5 mx-auto">
					<div id=post-<?php the_ID(); ?> <?php post_class('card'); ?>>
						<?php echo the_post_thumbnail( 'thumbnail', ['class' => 'img-fluid thumbRota'] ); ?>
						<div class="card-header d-flex flex-row justify-content-center">
							<h3 class="mb-0"><?php the_title(); ?></h3>
						</div>
						<div class="card-body p-4 bg-white">
							<span class="d-flex flex-column">
								<?php the_excerpt(); ?>
								<a 
								class="btn btn-solido w-50 mx-auto" 
								href="<?php echo home_url(); ?>/about">
								saiba mais
							</a>
						</span>	
						</div>
					</div>            
				</div>

				<?php endwhile; ?>            
				<?php endif; wp_reset_query(); ?>    

    </div>

		<div id="mais_rotas" class="row flex flex-row"></div>

		<div id="loading" class="mx-auto" style="width:60px;display:block;"></div>

		</section>

		<?php
		// don't display the button if there are not enough posts
		if (  $my_posts->max_num_pages > 1 )
			echo '<button 
							id="load_more" 
							type="button" 
							class="btn btn-solido w-50 mx-auto d-flex mb-4"
							style="width: 145px !important;">
							mais rotas
						</button>'; // you can use <a> as well
		?>

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