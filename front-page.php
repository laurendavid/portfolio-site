<?php get_header();  ?>

<main class="main">
  <div class="wrapper">
    <!-- About Section -->
    <section id="about" class="aboutMe">
      <h2><?php the_field('about_title'); ?></h2>
      <div class="flexContainer">
        <div class="bioImage">
            <img src="<?php the_field('about_image'); ?> ">
        </div> 
        <div class="bio">
          <h2><?php the_field('about_subtitle') ?></h2>
          <p><?php the_field('bio'); ?></p>
        </div>
      </div> <!-- ./flexContainer -->
       
      
    </section>
    <section id="portfolio" class="work">
      <?php
          $portfolioItemsQuery = new WP_Query(
          array(
                  'posts_per_page' => 3,
                  'post_type' => 'portfolio',
                  'order' => 'ASC'
                  )
          ); ?>

          <?php if ( $portfolioItemsQuery->have_posts() ) : ?>

              <?php while ($portfolioItemsQuery->have_posts()) : $portfolioItemsQuery->the_post(); ?>

                  <section id="<?php echo $post->post_name; ?>">
                      <div class="postText">
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                        <p><?php the_sub_field('short_description'); ?></p>
                        <a href="">View Live</a>
                      </div>
                      <div class="images">
                          <?php while( has_sub_field('images') ): ?>
                              <div class="image">
                                  <p><?php the_sub_field('caption'); ?></p>
                                  <?php $image = get_sub_field('image'); ?>
                                  <img src="<?php echo $image['sizes']['square'] ?>">
                              </div>
                          <?php endwhile; ?>
                      </div>
                  </section>
              <?php endwhile; ?>

              <?php wp_reset_postdata(); ?>
              
        <?php endif; ?>
      </section>

    <div class="content">
      <?php // Start the loop ?>
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>

      <?php endwhile; // end the loop?>
    </div> <!-- /,content -->

  </div> <!-- /.container -->
</main> <!-- /.main -->

<?php get_footer(); ?>