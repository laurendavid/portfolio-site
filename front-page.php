<?php get_header();  ?>

<main class="main">
  <!-- ABOUT SECTION -->
  <section id="about" class="aboutMe">
    <div class="wrapper">
      <h2><?php the_field('about_title'); ?></h2>
      <div class="flexContainer">
        <div class="bioImage" style="background-image: url('<?php the_field('diamond_image') ?>');">
            <img src="<?php the_field('about_image'); ?> "> <!-- photo courtesy of Pam Lau -->
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
                      <ul class="skills">
                        <?php while (has_sub_field('skills')): ?>
                          <li><?php the_sub_field('skill_set') ?></li>
                        <?php endwhile; ?>
                      </ul>
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
  <div class="overlay">
    <div class="wrapper flexContainer">
      <section class="location">
        <h2>Email</h2>
        <h3><a href="mailto:lauren@laurendavid.ca">lauren@laurendavid.ca</a></h3>
        <div class="inside">
          <p><?php the_field('contact_text'); ?></p>
        </div>
      </section>
      
    <!--Contact Form-->
      <section class="myForm">
        <h2>Get In Touch</h2>
        <form action="http://www.focuspocus.io/magic/lauren@laurendavid.ca" method="POST" autocomplete="off" name="myForm">
          <input type="text" name="name" placeholder="name">
          <input type="email" name="email" placeholder="email">
          <textarea name="message" placeholder="message"></textarea>
          <input type="submit" value="send" class="send">
        </form>
      </section> 
    </div> <!-- /.wrapper -->
  </div> <!-- /.overlay -->
</section>

<?php get_footer(); ?>
 