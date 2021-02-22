<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link https://ja.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define( 'DB_NAME', 'daily_up' );

/** MySQL データベースのユーザー名 */
define( 'DB_USER', 'root' );

/** MySQL データベースのパスワード */
define( 'DB_PASSWORD', 'root' );

/** MySQL のホスト名 */
define( 'DB_HOST', 'localhost' );

/** データベースのテーブルを作成する際のデータベースの文字セット */
define( 'DB_CHARSET', 'utf8mb4' );

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define( 'DB_COLLATE', '' );

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '#Y//u_h/0as0BNy3,FEH%+O<Zha.Ddi#8aFKDODm9DA[9~F<Ii.`zN<5 {wH V]l' );
define( 'SECURE_AUTH_KEY',  'Z?eR 5/jGX,,*1A%CYk THxG1O90xTq!bD(RNdFR$Ei23M(i2,0bd9+~!3n3wHw2' );
define( 'LOGGED_IN_KEY',    '$v+xMr^X1yyx,!e>(c{P+/a:U+A{< ]E$[k=SBy+vj,zqq`J8+HkSkZ!,l6)Et%4' );
define( 'NONCE_KEY',        'C38E,/;+/,s#N:yP3M$JnU_TWM0p Ek%*gS`o<;M9-10#p9ZQH%-i;>]r^&W. at' );
define( 'AUTH_SALT',        ':T]dGq=*WF9*iFym Jsmc1V,{UB.g/rE~5H|dOIxiM$HmU-QnN 7DQ`HxHg]FRd!' );
define( 'SECURE_AUTH_SALT', 'PgB}U2=F20#]rpP`4!aNrGe-%o>?n[:aQ5mc?#_qp-|:>XEGJx{s5GkI1{*#9|9k' );
define( 'LOGGED_IN_SALT',   '(kM(o)ArGHqazd$Kd)*CI 7:QwN:/qZ#tlL=4EWGrV2N0E] XBo+zm?ZL~:nCkH}' );
define( 'NONCE_SALT',       '-`QAJo;)1yL)nN>52T0>r]wfJ7t)lBN@[GJQA~c]=*P+YQ78zOI`/&h%~wQZ7& 8' );

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数についてはドキュメンテーションをご覧ください。
 *
 * @link https://ja.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* 編集が必要なのはここまでです ! WordPress でのパブリッシングをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
