<?php get_header(); ?>
<main>
  <div class="container">
    <div class="main-column">
      <ul class="bread-wrap">
        <a href="<?php bloginfo('url'); ?>">HOME</a>&nbsp;>&nbsp;
        <?php single_post_title(); ?>
      </ul>
      <h1>New Post<span>新着情報</span></h1>
      <section>
        <div class="row archive-list">
          <?php
          $args = array(
            'posts_per_page' => 10,
            'paged' => $paged,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post_type' => 'post',
            'post_status' => 'publish'
          );
          $the_query = new WP_Query($args);
          $ads_infeed = '4';
          $ads_infeed_count = '1';
          if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
          ?>
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
            <?php
            endwhile; // ループの終了
          else :
            ?>
            <p>記事がありません。</p>
          <?php
          endif;
          wp_reset_postdata(); // 直前のクエリを復元する
          ?>
        </div>
      </section>
    </div>
    <?php get_sidebar(); ?>
  </div>
</main>
<?php get_footer(); ?>