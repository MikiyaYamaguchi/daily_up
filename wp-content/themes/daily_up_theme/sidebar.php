<div class="side-column">
  <div class="side-content-wrap">
    <?php if (is_single()) : ?>
      <div class="row">
        <p class="side-title">関連記事</p>
        <?php
        $tags = wp_get_post_tags($post->ID);
        $tag_ids = array();
        foreach ($tags as $tag) :
          array_push($tag_ids, $tag->term_id);
        endforeach;
        $args = array(
          'post__not_in' => array($post->ID),
          'posts_per_page' => 3,
          'tag__in' => $tag_ids,
          'orderby' => 'rand',
        );
        $query = new WP_Query($args); ?>
        <?php if ($query->have_posts() && !empty($tag_ids)) : ?>
          <div class="row archive-list">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
              <article class="article-item">
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
              </article>
            <?php endwhile; ?>
          </div>
        <?php else : ?>
          <p>記事がありません。</p>
        <?php
        endif;
        wp_reset_postdata();
        ?>
      </div>
      <div class="row">
        <?php get_search_form(); ?>
        <div class="side-select-wrap">
          <?php get_categories_dropdown("Category"); ?>
        </div>
        <div class="side-select-wrap">
          <?php get_tags_dropdown("Tag"); ?>
        </div>
      </div>
    <?php else : ?>
      <div class="row">
        <p class="side-title">Category</p>
        <div class="row">
          <ul>
            <?php
            wp_list_categories(array(
              'title_li' => '',
              'show_count' => 1,
              'number' => '4'
            ));
            ?>
          </ul>
          <p class="more"><a href="/daily_up/category_list">もっと見る</a></p>
        </div>
      </div>
      <div class="row">
        <p class="side-title">Tag</p>
        <div class="row">
          <ul>
            <?php
            $args = array(
              'orderby' => 'count',
              'order' => 'DESC',
              'number' => '20'
            );
            $posttags = get_tags($args);
            ?>
          </ul>
          <ul class="side-tag-list">
            <?php
            if (!empty($posttags)) :
              foreach ($posttags as $tag) : ?>
                <li>
                  <a href='<?php echo get_tag_link($tag->term_id); ?>'>#<?php echo $tag->name ?></a>
                </li>
              <?php
              endforeach;
            else :
              ?>
              <p>タグなし</p>
            <?php endif; ?>
          </ul>
          <p class="more"><a href="/daily_up/tag_list/">もっと見る</a></p>
        </div>
      </div>
      <div class="row">
        <?php get_search_form(); ?>
      </div>
    <?php endif; ?>
  </div>
</div>
</div>