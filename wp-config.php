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
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/Applications/MAMP/htdocs/DailyUp/wp-content/plugins/wp-super-cache/' );
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
define( 'AUTH_KEY',         '!=?)]v.t0K;5E=#{T5%l4L(}Ry(Yu^FI@W0H_?gcjl]dv+mO+?B5s]P3oLDcCNxa' );
define( 'SECURE_AUTH_KEY',  'A]+%?wH$k0BC1;8d5F-<qJ M+E,KE~MY/5m79sE0kaAQC:a>RtK6MXCM>fnG2b^J' );
define( 'LOGGED_IN_KEY',    'B+[EQ[y2GS^=z(Zp}E{v$;J x-Xmj#D33Ir6*Y}qzOc|Q(N2e@7day=d;;+-mYfT' );
define( 'NONCE_KEY',        '1>8?d^J>q2d1I+vZu`yZy3B!XSx4r5D*%Q~?[1omQuN4-Y*?a!vsH;T@9(f9xX2O' );
define( 'AUTH_SALT',        'rhtaK22L[t<xO!#iS=y+P.s5pfGJuceh{Ock,;3lxL-3,J SS$|M=rOn4.sWH3Ke' );
define( 'SECURE_AUTH_SALT', 'Lw!k=X&~N]`w4m;NoS Mrnh18ePRPn9]<Rr/Io{)~XyIeGIrGS<U>V5&3.|t3u<0' );
define( 'LOGGED_IN_SALT',   'J(EV@;]^%aZNXnm-:SezNTZa+&q!:;(7?eBSO&J761;9j<SWG}KLylyJau!_#8eM' );
define( 'NONCE_SALT',       't0Lp4getYjM1PhUnam#mo LYkkDa-|BP6ide{0g70/&#W~x{ppfL]q^4JF?or2>.' );

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
