<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <!-- stylesheets enqueued in functions.php -->
  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<header>
  <div class="hero" style="background-image: url('<?php the_field('hero_image'); ?>');">
    <div class="overlay">
      <section class="fixedNav">
        <?php wp_nav_menu( array(
          'container' => false,
          'theme_location' => 'primary'
        )); ?>
      </section>
      <div class="wrapper flexContainer">
        <div class="diamond" style="background-image: url('<?php the_field('diamond_image') ?>');">
          <div class="flexContainer">
            <h1><?php the_field('header_title'); ?></h1>
            <h2 class="webDev"><?php the_field('header_subtitle') ?></h2>
            <nav class="diamondNav">
              <?php wp_nav_menu( array(
                'container' => false,
                'theme_location' => 'primary'
              )); ?>
            </nav>
            </div> <!-- /.flexContainer -->
        </div> <!-- /.diamond -->
      </div> <!-- /.wrapper -->
    </div> <!-- /.overlay -->
  </div> <!-- /.hero -->
</header><!--/.header-->

