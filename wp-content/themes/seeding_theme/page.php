<?php get_header(); ?>
<main>
  <div class="container">
    <div class="main_column">
      <ul class="bread_wrap">
        <a href="<?php bloginfo('url'); ?>">HOME</a>&nbsp;>&nbsp;
        <?php single_post_title(); ?>
      </ul>
      <h1><?php the_title(); ?></h1>
      <div class="bg_gray">
        <div class="bg_white">
          <?php
        if(have_posts()): while(have_posts()): the_post();?>
        <?php the_content(); ?>
        <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
    <?php get_sidebar(); ?>
  </div>
</main>
<?php get_footer(); ?>
