<?php get_header(); ?>
<main>
  <div class="container">
    <div class="main-column">
      <?php include('bread.php'); ?>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <section>
            <div class="row">
              <div class="col span-12">
                <p class="single-category"><?php the_category(','); ?></p>
                <h1><?php the_title(); ?></h1>
                <time datetime="<?php echo get_post_time('Y.n.j(D)'); ?>"><?php echo get_post_time('Y.n.j(D)'); ?></time>
              </div>
            </div>
          </section>
          <section>
            <div class="row">
              <div class="col span-2">
                <div class="single-tag-list">
                  <p><?php the_tags('', ''); ?></p>
                </div>
              </div>
              <div class="col span-10">
                <div class="row">
                  <figure>
                    <?php the_post_thumbnail('full'); ?>
                  </figure>
                </div>
                <p><?php the_content('Read more'); ?></p>
              </div>
            </div>
          </section>
      <?php endwhile;
      endif; ?>
      <section>
        <div class="relation-list-title">関連記事</div>
        <div class="relation-list-slider">
          <?php
          $tags = wp_get_post_tags($post->ID);
          $tag_ids = array();
          foreach ($tags as $tag) :
            array_push($tag_ids, $tag->term_id);
          endforeach;
          $args = array(
            'post__not_in' => array($post->ID),
            'posts_per_page' => 20,
            'tag__in' => $tag_ids,
            'orderby' => 'rand',
          );
          $query = new WP_Query($args); ?>
          <?php if ($query->have_posts() && !empty($tag_ids)) : ?>
            <ul class="slider">
              <?php while ($query->have_posts()) : $query->the_post(); ?>
                <li>
                  <a href="<?php echo the_permalink(); ?>">
                    <figure>
                      <?php the_post_thumbnail(); ?>
                    </figure>
                    <div class="archive-item-info">
                      <p><?php echo the_category(); ?></p>
                      <h2 class="ttl">
                        <?php
                        if (mb_strlen($post->post_title, 'UTF-8') > 20) {
                          $title = mb_substr($post->post_title, 0, 20, 'UTF-8');
                          echo $title . '……';
                        } else {
                          echo $post->post_title;
                        }
                        ?>
                      </h2>
                      <time class="date text-left sp-only"><?php the_time('Y.n.j'); ?></time>
                    </div>
                  </a>
                </li>
              <?php endwhile; ?>
            </ul>
          <?php else : ?>
            <p>記事がありません。</p>
          <?php
          endif;
          wp_reset_postdata();
          ?>
        </div>
      </section>
    </div>
    <?php get_sidebar(); ?>
  </div>
</main>
<?php get_footer(); ?>