<?php

//メディアライブラリ画像パス変換
function delete_host_from_attachment_url($url)
{
  $regex = '/^http(s)?:\/\/[^\/\s]+(.*)$/';
  if (preg_match($regex, $url, $m)) {
    $url = $m[2];
  }
  return $url;
}
add_filter('wp_get_attachment_url', 'delete_host_from_attachment_url');

//archiveページを有効化
function post_has_archive($args, $post_type)
{

  if ('post' == $post_type) {
    $args['rewrite'] = true;
    $args['has_archive'] = null;
  }
  return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

//アイキャッチ画像有効化
function my_after_setup_theme()
{
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size(640, 384, true);
}
add_action('after_setup_theme', 'my_after_setup_theme');

// 人気記事出力
function get_custom_popular_ranking()
{
  if (!is_single()) return;
  if (empty($post_id)) {
    global $post;
    $post_id = $post->ID;
  }
  session_start();
  if (!isset($_SESSION['custom_popular_id_' . $post_id])) {
    $_SESSION['custom_popular_id_' . $post_id] = 1;
    $custom_key = 'custom_popular_ranking';
    $cnt = get_post_meta($post_id, $custom_key, true);
    if ($cnt == '') {
      $cnt = 1;
      add_post_meta($post_id, $custom_key, $cnt);
    } else {
      $cnt++;
      update_post_meta($post_id, $custom_key, $cnt);
    }
  }
  session_write_close();
}
add_action('wp_head', 'get_custom_popular_ranking');

//カスタムヘッダー
$custom_header_defaults = array(
  'default-image',
  'width',
  'height',
  'header-text'
);

add_theme_support('custom-header', $custom_header_defaults);

if (!function_exists('lab_setup')) :

  function lab_setup()
  {

    register_nav_menus(array(
      'global' => 'グローバルナビ',
      'header' => 'ヘッダーナビ',
      'footer' => 'フッターナビ',
    ));
  }
endif;
add_action('after_setup_theme', 'lab_setup');

function change_posts_per_page($query)
{
  /* 管理画面,メインクエリに干渉しないために必須 */
  if (is_admin() || !$query->is_main_query()) {
    return;
  }

  /* 日付アーカイブページの表示件数を5件にする */
  if ($query->is_date()) {
    $query->set('posts_per_page', '10');
    return;
  }
}
add_action('pre_get_posts', 'change_posts_per_page');

//投稿コメントカスタマイズ
function costom_comment($comment, $args, $depth)
{
  $GLOBALS['comment'] = $comment; ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <div id="comment-<?php comment_ID(); ?>">
      <div class="comment-listCon">
        <span class="comment-name">
          <?php printf(__('<span class="fn">%s</span> <span class="says"><br /></span>'), get_comment_author_link()) ?>
        </span>
        <span class="comment-date-edit">
          <?php comment_date('Y/m/d(D)'); ?> <?php comment_time(); ?> <?php edit_comment_link(__('Edit'), '  ', '') ?>
        </span>
        <?php if ($comment->comment_approved == '0') : ?>
          <em><?php _e('Your comment is awaiting moderation.') ?></em><br />
        <?php endif; ?>
        <?php comment_text() ?>
      </div>
    </div>
  <?php
}

function move_comment_field($fields)
{
  $comment_field = $fields['comment'];
  unset($fields['comment']);
  $fields['comment'] = $comment_field;

  return $fields;
}
add_filter('comment_form_fields', 'move_comment_field');

//一覧本文抜粋部分
function twpp_change_excerpt_more($more)
{
  $html = '...';
  return $html;
}

add_filter('excerpt_more', 'twpp_change_excerpt_more');

$ua = $_SERVER['HTTP_USER_AGENT'];
if ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false) || (strpos($ua, 'iPhone') !== false) || (strpos($ua, 'Windows Phone') !== false)) {
  function twpp_change_excerpt_length($length)
  {
    return 20;
  }
} else {
  function twpp_change_excerpt_length($length)
  {
    return 50;
  }
}
add_filter('excerpt_length', 'twpp_change_excerpt_length', 999);

function the_pagination()
{
  global $wp_query;
  $bignum = 999999999;
  if ($wp_query->max_num_pages <= 1)
    return;
  echo '<nav class="pagination">';
  echo paginate_links(array(
    'base'         => str_replace($bignum, '%#%', esc_url(get_pagenum_link($bignum))),
    'format'       => '',
    'current'      => max(1, get_query_var('paged')),
    'total'        => $wp_query->max_num_pages,
    'prev_text' => '<',
    'next_text' => '>',
    'type'         => 'list',
    'end_size'     => 3,
    'mid_size'     => 3
  ));
  echo '</nav>';
}

//目次自動出力
function my_add_content($content)
{
  if (is_single()) {
    // 属性を持たないh2・h3要素を正規表現で表すパターン
    $pattern = '/<h[2-3]>(.*?)<\/h[2-3]>/i';
    // 本文の中から、すべてのh2・h3・h4要素を検索
    preg_match_all($pattern, $content, $matches, PREG_SET_ORDER);

    // ページ内のh2・h3・h4要素が3つ以上の場合に目次を出力
    if (count($matches) >= 1) {
      // 目次の出力に使用する変数
      $toc = '<h2 class="toc-title active">目次</h2><ol class="toc">';
      // 目次の階層の判断に使用する変数
      $hierarchy = NULL;
      // ループ回数を数える変数
      $i = 0;

      // 本文内のh2・h3要素を上から順番にループで処理
      foreach ($matches as $element) {
        // ループ回数を1加算
        $i++;
        // h2・h3・h4に指定するIDの属性値を作成
        $id = 'chapter-' . $i;
        // h2・h3・h4タグにIDを追加
        $chapter = preg_replace('/<(.+?)>(.+?)<\/(.+?)>/',  '<$1 id ="' . $id . '">$2</$3>', $element[0]);
        // ページ内のh2・h3・h4要素を、IDが追加されているh2・h3・h4要素に置換
        $content = preg_replace($pattern, $chapter, $content, 1);

        // 現在のループで扱う要素を判断する条件分岐
        if (strpos($element[0], '<h2') === 0) {
          $level = 0;
        } else {
          $level = 1;
        }

        //現在の状態を判断する条件分岐
        if ($hierarchy === $level) { // h2またはh3がそれぞれ連続する場合
          $toc .= '</li>';
        } elseif ($hierarchy < $level) { // h2の次がh3となる場合
          $toc .= '<ol class="toc">';
          $hierarchy = 1;
        } elseif ($hierarchy > $level) { // h3の次がh2となる場合
          $toc .= '</li></ol></li>';
          $hierarchy = 0;
        } elseif ($i == 1) { // ループ1回目の場合
          $hierarchy = 0;
        }

        // 目次の項目で使用する要素を指定
        $title = $element[1];
        // 目次の項目を作成。※次のループで<li>の直下に<ol>タグを出力する場合ががあるので、ここでは<li>タグを閉じていません。
        $toc .= '<li><a href="#' . $id . '">' . $title . '</a>';
      }

      // 目次の最後の項目をどの要素から作成したかによりタグの閉じ方を変更
      if ($level == 0) {
        $toc .= '</li></ol>';
      } elseif ($level == 1) {
        $toc .= '</li></ol></li></ol>';
      }

      // 本文に目次を追加
      $content = $toc . $content;
    }
  }
  return $content;
}
add_filter('the_content', 'my_add_content');

// WP5.4でファビコンがデフォルトでついてしまうのを回避
add_action('do_faviconico', 'wp_favicon_remover');
function wp_favicon_remover()
{
  exit;
}

//php warning非表示
error_reporting(0);

//記事検索を投稿ページに絞る
function SearchFilter($query)
{
  if ($query->is_search) {
    $query->set('post_type', 'post');
  }
  return $query;
}
add_filter('pre_get_posts', 'SearchFilter');
