<?php get_header(); ?>
<main>
  <div class="container">
    <div class="main-column">
      <ul class="bread-wrap">
        <a href="<?php bloginfo('url'); ?>">HOME</a>&nbsp;>&nbsp;
        <?php $cat = get_the_category(); echo get_category_parents($cat[0], true, '&nbsp;'); ?>
      </ul>
      <section>
        <div class="archive-list">
          <?php if ( have_posts() ): ?>
          <?php while ( have_posts() ) : the_post(); ?>
            <article class="article-item col span-12">
              <a href="<?php echo the_permalink(); ?>">
                <time class="date text-right"><?php the_time('Y.n.j'); ?></time>
                <figure>
                  <?php the_post_thumbnail(); ?>
                  <figcaption><?php echo the_category(); ?></figcaption>
                </figure>
                <div>
                  <h2 class="archive-title">
                    <?php
                    if(mb_strlen($post->post_title, 'UTF-8')>20){
                      $title= mb_substr($post->post_title, 0, 20, 'UTF-8');
                      echo $title.'……';
                    }else{
                      echo $post->post_title;
                    }
                    ?>
                  </h2>
                  <p><?php echo get_the_excerpt(); ?></p>
                </div>
              </a>
            </article>
          <?php endwhile; ?>
          <?php else: ?>
              <!--投稿が見つからない-->
              <p>記事がありません。</p>
              <!--//投稿が見つからない-->
          <?php endif; ?>
        </div>
      </section>
    </div>
    <?php get_sidebar(); ?>
  </div>
</main>
<?php get_footer(); ?>
