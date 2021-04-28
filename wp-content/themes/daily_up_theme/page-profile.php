<?php get_header(); ?>
<main>
  <div class="container">
    <div class="main-column">
      <?php include('bread.php'); ?>
      <?php
      if (have_posts()) : while (have_posts()) : the_post(); ?>
          <h1><?php the_title(); ?></h1>
          <?php
          $name = get_field('name');
          $img = get_field('picture');
          $about = get_field('about');
          ?>
          <section>
            <div class="container">
              <div class="row profile-image">
                <div class="col span-5">
                  <figure>
                    <img src="<?php echo $img['url']; ?>" alt="<?php echo $name; ?>">
                  </figure>
                </div>
                <div class="col span-7">
                  <p class="profile-name"><?php echo $name; ?></p>
                  <p>
                    <?php echo $about; ?>
                  </p>
                </div>
              </div>
            </div>
          </section>
      <?php endwhile;
      endif; ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
</main>
<?php get_footer(); ?>