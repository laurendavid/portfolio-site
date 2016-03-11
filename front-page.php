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
          <div class="socialParent">
            <button><a href="#connect"><?php the_field('connect_button'); ?></a></button>
            <div class="social">
              <?php wp_nav_menu( array(
                'container' => false,
                'theme_location' => 'social'
              )); ?>
            </div>
          </div> <!-- ./flexParent -->
        </div> <!-- ./bio -->
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
                <section id="<?php echo $post->post_name; ?>" class="flexContainer">
                    <div class="projectImage" style="background-image: url('<?php echo the_field('diamond_pic') ?>');">
                      <img src="<?php the_field('images'); ?>" alt="">
                    </div>
                    <div class="projectText">
                      <h2><?php the_title(); ?></h2>
                      <h3><?php the_field('subtitle'); ?></h3>
                      <p><?php the_field('short_description'); ?></p>
                      <?php the_sub_field('skill_set'); ?>
                      <div class="flexParent">
                        <?php while (has_sub_field('view_live')): ?>
                          <button><a href="<?php the_sub_field('live_link'); ?>"><?php the_sub_field('live_text') ?></a></button>  
                        <?php endwhile; ?>
                      </div>
                    </div>
                </section>
            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>
              
        <?php endif; ?>
    </div> <!-- ./wrapper -->
  </section> <!-- ./portfolio section -->
</main> <!-- /.main -->

<!-- CONTACT SECTION -->
<section id="connect" class="contact" style="background-image: url('<?php the_field('hero_image'); ?>');">
  <div class="wrapper flexContainer">
    <div class="location">
      <h3>Email</h3>
      <a href="mailto:lauren@laurendavid.ca" class="email">lauren@laurendavid.ca</a>
      <div class="inside">
        <p>I live, work and play in Toronto, Canada. Please use the contact form if you have any questions or requests concerning my services. I will respond to your message within 24 hours.</p>
      </div>
    </div>
    
  <!--Contact Form-->
    <form action="http://www.focuspocus.io/magic/lauren@laurendavid.ca" method="POST" autocomplete="off" name="myForm">
      <h3>Let's Talk</h3>
      <input type="text" name="name" placeholder="name">
      <input type="email" name="email" placeholder="email">
      <textarea name="message" placeholder="message"></textarea>
      <input type="submit" value="send">
    </form> 
  </div> <!-- /.wrapper -->
</section>

<?php get_footer(); ?>
 