<div class="side-column">
  <div class="side-content-wrap">
    <div class="row">
      <p class="side-title">Category</p>
      <div class="row">
        <ul>
          <?php
          wp_list_categories(array(
            'title_li' => '',  //デフォルトで出力されるタイトルを非表示
            'show_count' => 1 //各カテゴリーに投稿数を表示する
          ));
          ?>
        </ul>
        <p class="more-text"><a href="/archive">もっと見る</a></p>
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
                <a href='<?php echo get_tag_link($tag->term_id); ?>'><?php echo $tag->name ?></a>
              </li>
            <?php
            endforeach;
          else :
            ?>
            <p>タグなし</p>
          <?php endif; ?>
        </ul>
        <p class="more-text"><a href="/">もっと見る</a></p>
      </div>
    </div>
    <div class="row">
      <div class="row">
        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
</div>
</div>