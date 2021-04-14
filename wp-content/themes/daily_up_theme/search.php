<?php get_header(); ?>
<?php
$searchTag = $GET_['tag'];
$searchTagObj = get_term_by('slug', $searchTag, 'post_tag');
$searchTagStr = $searchTagObj->name;
$found_cnt = $wp_query->post_count;
?>
<main>
  <?php global $wp_query;
  $total_results = $wp_query->found_posts;
  $search_query = get_search_query();
  ?>
  <div class="container">
    <div class="main-column">
      <?php include('bread.php'); ?>
      <h1><?php if ($search_query !== "") : ?>"<?php echo $search_query; ?>"<?php endif; ?>検索結果</h1>
      <section>
        <div class="row">
          <div class="archive-list">
            <?php
            if ($total_results > 0) :
              if (have_posts()) :
                while (have_posts()) : the_post();
            ?>
                  <article class="article-item">
                    <a href="<?php echo the_permalink(); ?>">
                      <figure>
                        <?php the_post_thumbnail(); ?>
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
              <?php endwhile;
              endif;
            else : ?>
              <p class="text-center"><?php echo $search_query; ?>に一致する情報は見つかりませんでした。</p>
            <?php endif; ?>
          </div>
          <?php if (function_exists("the_pagination")) the_pagination(); ?>
        </div>
      </section>
    </div>
    <?php get_sidebar(); ?>
  </div>
</main>
<?php get_footer(); ?>