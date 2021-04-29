<?php get_header(); ?>
<main>
  <section>
    <div class="container">
      <div class="list-wrap">
        <div class="row archive-list">
          <?php
          $count = 1;
          $args = array(
            'posts_per_page' => 9
          );
          $posts = get_posts($args);
          if (!empty($posts)) :
            foreach ($posts as $post) :
              setup_postdata($post);
              $title = get_the_title(); ?>
              <article class="article-item">
                <a href="<?php echo the_permalink(); ?>">
                  <figure>
                    <?php if (has_post_thumbnail()) : ?>
                      <?php the_post_thumbnail('full', array('alt' => $title)); ?>
                    <?php else : ?>
                      <img src="/daily_up/wp-content/uploads/default_thumbnail.jpg" alt="<?php echo $title; ?>">
                    <?php endif; ?>
                    <figcaption><?php echo the_category(); ?></figcaption>
                  </figure>
                  <div class="archive-item-info">
                    <h2 class="arcive-title">
                      <?php
                      if (mb_strlen($post->post_title, 'UTF-8') > 20) {
                        $title = mb_substr($post->post_title, 0, 20, 'UTF-8');
                        echo $title . '……';
                      } else {
                        echo $post->post_title;
                      }
                      ?>
                    </h2>
                    <time class="archive-item-date text-left"><?php echo get_post_time('Y.n.j(D)'); ?></time>
                    <div class="archive-item-tags"><?php the_tags('', ''); ?></div>
                  </div>
                </a>
              </article>
              <?php if ($count === 3) : ?>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="list-wrap">
      <div class="row archive-list tile">
        <div class="google-adsence-area">Googleアドセンスの広告が入ります。</div>
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="list-wrap">
        <div class="row archive-list tile">
        <?php endif; ?>
      <?php
              $count++;
            endforeach;
          else :
      ?>
      <p>記事がありません。</p>
    <?php
          endif;
          wp_reset_postdata();
    ?>
    <?php
    if ($count < 3) :
    ?>
      <div class="google-adsence-area">Googleアドセンスの広告が入ります。</div>
    <?php
    endif;
    ?>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>