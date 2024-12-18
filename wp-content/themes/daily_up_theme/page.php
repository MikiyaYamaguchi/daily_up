<?php get_header(); ?>
<main>
  <div class="container">
    <div class="main-column">
      <?php include('bread.php'); ?>
      <h1><?php the_title(); ?></h1>
      <section>
        <div class="row">
          <div class="col span-12">
            <?php
            if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile;
            endif; ?>
          </div>
        </div>
      </section>
    </div>
    <?php get_sidebar(); ?>
  </div>
</main>
<?php get_footer(); ?>