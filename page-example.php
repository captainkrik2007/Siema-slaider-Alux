<?php
/**
* Template for displaying Home page
*
* @package cknaked
*/
?>
<?php get_header(); ?>

  <section id="hero" data-type="background" data-speed="4">
      <div class="hero-text">
        <h2 class="hero-text__title">NAME</h2>
        <h3 class="hero-text__subtitle">Description</h3>
      </div>
  </section>

  <section id="bio">
      <div class="bio-text">
        <?php
          $args = array(
            'post_type' => 'page',
            'title' => 'biography'
        );

        // La Query
        $kc_the_query = new WP_Query( $args );

        // Il Loop
        while ( $kc_the_query->have_posts() ) :
        	$kc_the_query->the_post(); ?>

          <?php the_content(); ?>

        <?php endwhile;

        // Ripristina Query & Post Data originali
        wp_reset_query();
        wp_reset_postdata(); ?>

      </div>
  </section>

  <section id="showreel">
    <h2 class="title text-center">Showreel</h2>
      <div class="showreel__container">
      <?php
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => -1,
      );

  		// La Query
  		$kc_query_showreel = new WP_Query( $args );
  		// Il Loop
  		while ( $kc_query_showreel->have_posts() ) :
  			$kc_query_showreel->the_post(); ?>

  			<div class="showreel__icon-box">

          <!-- If user uploaded a YouTube video -->
          <?php if( !empty (get_field('youtube_link') ) ) : ?>
            <a class="popup-youtube" title="<?php the_field('video_title'); ?></br><?php the_field('director'); ?>" href="https://www.youtube.com/watch?v=<?php the_field('youtube_link'); { ?>">

          <!-- If user uploaded a Vimeo video -->
          <?php } elseif( !empty (get_field('vimeo_link') ) ) : ?>
            <a class="popup-vimeo" title="<?php the_field('video_title'); ?></br><?php the_field('director'); ?>" href="https://player.vimeo.com/video/<?php the_field('vimeo_link'); { ?>">

          <!-- If user uploaded a file video from Media -->
          <?php } elseif( !empty ( get_field('videofile_link') ) ) : ?>
            <a class="popup-video mfp-iframe" title="<?php the_field('video_title'); ?></br><?php the_field('director'); ?>" href="<?php get_stylesheet_directory_uri(); ?>./wp-content/uploads/<?php the_field('videofile_link');  { ?>">

          <?php } endif; ?>

          <!-- If user uploaded a screenshoot from Media -->
          <?php
            $videoicon  = get_field('video_icon');
            if( !empty($videoicon) ) : ?>
              <img src="<?php echo $videoicon['url']; ?>" alt="<?php echo $videoicon['alt']; ?>" />
          <?php endif; ?>

          <div class="showreel__video-info">
						<h3><?php the_title(); ?></h3>
						<p><?php the_field('director'); ?></p>
					</div>
        </a>
			</div>

  		<?php endwhile;

  		// Ripristina Query & Post Data originali
  		wp_reset_query();
  		wp_reset_postdata(); ?>

    </div>
  </section>

/**********************************************
 -              SLIDER with SIEMA             -
 **********************************************
  <section id="projects">
    <h2 class="title text-center">Projects</h2>

    <div class="container-siema">
      <div class="siema">

      <?php

      $kc_counter = 0;

      $args = array(
        'post_type' => 'projects',
        'posts_per_page' => -1,
      );

  		// La Query
  		$kc_query_projects = new WP_Query( $args );

  		// Il Loop
  		while ( $kc_query_projects->have_posts() ) :
  			$kc_query_projects->the_post(); ?>

        <?php $kc_counter++ ?>

        <div class="siema__slide" style="background: url(<?php the_field('project_image'); ?>);background-size: cover;">
          <div class="siema__caption">
            <h3>Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
          </div>
        </div>
      </div> // siema
      <div class="container-siema__prev"><div class="alux-arrow">prev</div></div>
      <div class="container-siema__next"><div class="alux-arrow">next</div></div>

      <?php endwhile;

  		// Ripristina Query & Post Data originali
  		wp_reset_query();
  		wp_reset_postdata(); ?>

    </div> //container_siema

  </section> // end slider siema

  <section id="credits">
    <h2 class="title text-center">Credits</h2>
    <h3 class="sub-title text-center">Directors:</h3>
    <div class="credits__container">

      <?php
        $args = array(
          'post_type' => 'page',
          'name' => 'credits',
      );

  		// La Query
  		$kc_query_showreel = new WP_Query( $args );

  		// Il Loop
  		while ( $kc_query_showreel->have_posts() ) :
  			$kc_query_showreel->the_post(); ?>

        <?php the_content(); ?>

      <?php endwhile;

  		// Ripristina Query & Post Data originali
  		wp_reset_query();
  		wp_reset_postdata(); ?>

    </div>
  </section>

  <section id="contact">
      <h2 class="title text-center">Contact</h2>
      <div class="contact__container">

        <?php
          $args = array(
            'post_type' => 'page',
            'name' => 'contact',
        );

        // La Query
        $kc_query_showreel = new WP_Query( $args );

        // Il Loop
        while ( $kc_query_showreel->have_posts() ) :
          $kc_query_showreel->the_post(); ?>

          <?php the_content(); ?>

        <?php endwhile;

        // Ripristina Query & Post Data originali
        wp_reset_query();
        wp_reset_postdata(); ?>

      </div>
  </section>

<?php get_footer(); ?>
