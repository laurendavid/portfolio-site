<?php get_header();  ?>

<main class="main">
  <!-- ABOUT SECTION -->
  <section id="about" class="aboutMe">
    <div class="wrapper">
      <h2><?php the_field('about_title'); ?></h2>
      <div class="flexContainer">
        <div class="bioImage" style="background-image: url('<?php the_field('diamond_image') ?>');">
            <img src="<?php the_field('about_image'); ?> ">
        </div> 
        <div class="bio">
          <h2><?php the_field('about_subtitle') ?></h2>
          <p><?php the_field('bio'); ?></p>
          <button><a href="#connect"><?php the_field('connect_button'); ?></a></button>
          <div class="social">
            <?php wp_nav_menu( array(
              'container' => false,
              'theme_location' => 'social'
            )); ?>
          </div>
        </div>
      </div> <!-- ./flexContainer -->
    </div> <!-- ./wrapper -->
  </section>

  <!-- PORTFOLIO SECTION -->
  <section id="portfolio" class="work">
    <div class="wrapper">
       <h2><?php the_field('portfolio_title'); ?></h2>
      <?php
          $portfolioItemsQuery = new WP_Query(
          array(
                  'posts_per_page' => 4,
                  'post_type' => 'portfolio',
                  'order' => 'ASC'
                  )
          ); ?>

          <?php if ( $portfolioItemsQuery->have_posts() ) : ?>

              <?php while ($portfolioItemsQuery->have_posts()) : $portfolioItemsQuery->the_post(); ?>

                  <section id="<?php echo $post->post_name; ?>">
                      <div class="projectImages">
                        <img src="<?php the_field('images'); ?>" alt="">
                      </div>
                      <div class="projectText">
                        <h2><?php the_title(); ?></h2>
                        <h3><?php the_field('subtitle'); ?></h3>
                        <p><?php the_field('short_description'); ?></p>
                        <?php the_sub_field('skill_set'); ?>
                        <button><a href="<?php the_field('view_live') ?> ">View Live</a></button>
                      </div>
                  </section>
              <?php endwhile; ?>

              <?php wp_reset_postdata(); ?>
              
        <?php endif; ?>
    </div> <!-- ./wrapper -->
  </section> <!-- ./portfolio section -->
</main> <!-- /.main -->

<!-- CONTACT SECTION -->
</section id="connect" class="contact">
  <div class="wrapper">
    <div class="content">
      <?php // Start the loop ?>
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>

      <?php endwhile; // end the loop?>
    </div> <!-- /.content -->
  </div> <!-- /.wrapper -->
</section>

<?php get_footer(); ?>
 