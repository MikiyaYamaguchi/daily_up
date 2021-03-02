<?php get_header(); ?>

<main>
  <div class="container">
    <div class="main-column">
      <ul class="bread-wrap row">
        <a href="<?php bloginfo('url'); ?>">HOME</a>&nbsp;>&nbsp;
        <?php echo get_the_date('Y年n月'); ?>
      </ul>
      <h1><?php echo get_the_date('Y年n月'); ?>の記事</h1>
      <div class="row">
        <div class="row archive-list">
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <article class="article-item col span-12">
                <a href="<?php echo the_permalink(); ?>">
                  <figure>
                    <?php the_post_thumbnail(); ?>
                    <figcaption><?php echo the_category(); ?></figcaption>
                  </figure>
                  <div>
                    <h2 class="archive-title">
                      <?php
                      if (mb_strlen($post->post_title, 'UTF-8') > 20) {
                        $title = mb_substr($post->post_title, 0, 20, 'UTF-8');
                        echo $title . '……';
                      } else {
                        echo $post->post_title;
                      }
                      ?>
                    </h2>
                    <p><?php echo get_the_excerpt(); ?></p>
                    <time class="date text-right"><?php the_time('Y.n.j'); ?></time>
                  </div>
                </a>
              </article>

            <?php endwhile; ?>
          <?php else : ?>
            <p>記事が見つかりませんでした。</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php get_sidebar(); ?>
    </section>
</main>

<?php get_footer(); ?>