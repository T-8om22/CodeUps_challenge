<?php
/**
* Functions
*/

/**
* WordPress標準機能
*
* @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
*/
function my_setup() {
	add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
	add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
	add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		array( /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action( 'after_setup_theme', 'my_setup' );

/**
* CSSとJavaScriptの読み込み
*
* @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
*/
function my_script_init() {
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), '1.0.1', 'all' );
	wp_enqueue_style( 'my', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.1', 'all' );

	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array( 'jquery' ), '1.0.1', true );
	wp_enqueue_script( 'my', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ), '1.0.1', true );
}
add_action('wp_enqueue_scripts', 'my_script_init');

/**
* メニューの登録
*
* @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
*/
// function my_menu_init() {
// 	register_nav_menus(
// 		array(
// 			'global'  => 'ヘッダーメニュー',
// 			'utility' => 'ユーティリティメニュー',
// 			'drawer'  => 'ドロワーメニュー',
// 		)
// 	);
// }
// add_action( 'init', 'my_menu_init' );

/**
* ウィジェットの登録
*
* @codex http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_sidebar
*/
// function my_widget_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => 'サイドバー',
// 			'id'            => 'sidebar',
// 			'before_widget' => '<div id="%1$s" class="p-widget %2$s">',
// 			'after_widget'  => '</div>',
// 			'before_title'  => '<div class="p-widget__title">',
// 			'after_title'   => '</div>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'my_widget_init' );

/**
* アーカイブタイトル書き換え
*
* @param string $title 書き換え前のタイトル.
* @return string $title 書き換え後のタイトル.
*/
function my_archive_title( $title ) {

	if ( is_home() || is_category() ) { /* ホームの場合 */
		$title = 'お知らせ';
	} elseif ( is_post_type_archive('works') || is_tax( 'genre' ) ) { /* カスタム投稿アーカイブの場合 */
		$title = '制作実績';
	} elseif ( is_post_type_archive('blog') || is_tax( 'topics')) { /* カスタム投稿アーカイブの場合 */
		$title = 'ブログ';
	} elseif ( is_category() ) { /* カテゴリーアーカイブの場合 */
		$title = '' . single_cat_title( '', false ) . '';
	} elseif ( is_tag() ) { /* タグアーカイブの場合 */
		$title = '' . single_tag_title( '', false ) . '';
	} elseif ( is_post_type_archive() ) { /* 投稿タイプのアーカイブの場合 */
		$title = '' . post_type_archive_title( '', false ) . '';
	} elseif ( is_tax() ) { /* タームアーカイブの場合 */
		$title = '' . single_term_title( '', false );
	} elseif ( is_search() ) { /* 検索結果アーカイブの場合 */
		$title = '「' . esc_html( get_query_var( 's' ) ) . '」の検索結果';
	} elseif ( is_author() ) { /* 作者アーカイブの場合 */
		$title = '' . get_the_author() . '';
	} elseif ( is_date() ) { /* 日付アーカイブの場合 */
		$title = '';
		if ( get_query_var( 'year' ) ) {
			$title .= get_query_var( 'year' ) . '年';
		}
		if ( get_query_var( 'monthnum' ) ) {
			$title .= get_query_var( 'monthnum' ) . '月';
		}
		if ( get_query_var( 'day' ) ) {
			$title .= get_query_var( 'day' ) . '日';
		}
	}
	return $title;
};
add_filter( 'get_the_archive_title', 'my_archive_title' );

/**
* 抜粋文の文字数の変更
*
* @param int $length 変更前の文字数.
* @return int $length 変更後の文字数.
*/
function my_excerpt_length( $length ) {
	return 80;
}
add_filter( 'excerpt_length', 'my_excerpt_length', 999 );

/**
* 抜粋文の省略記法の変更
*
* @param string $more 変更前の省略記法.
* @return string $more 変更後の省略記法.
*/
function my_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'my_excerpt_more' );

/**
* Breadcrumb NavXT バグ修正
* https://wordpress.org/support/topic/you-do-not-have-permission-to-access-this-page-18/
*/
function add_bcn_manage_options_to_admin() {
	// gets the administrator role
	$role = get_role( 'administrator' );

	// would allow the administrator to manage breadcrumbs. Fix needed due the conflict in Breadcrumb NavXT version 7 with some other plugin.
	$role->add_cap( 'bcn_manage_options' ); 
}
add_action( 'admin_init', 'add_bcn_manage_options_to_admin');

/**
* パンくずタイトルの書き換え
*
* https://mtekk.us/code/breadcrumb-navxt/breadcrumb-navxt-doc/2/#bcn_breadcrumb_title
* @param object $title タイトル.
**/
function my_bcn_breadcrumb_title( $title, $this_type, $this_id ) {
	if ( is_home() || is_singular('post')) {
		$title = 'お知らせ一覧';
	} elseif( is_post_type_archive('blog') || is_singular('blog') ) {
		$title = 'ブログ記事一覧';
	}
	return $title;
};
add_filter( 'bcn_breadcrumb_title', 'my_bcn_breadcrumb_title', 10, 3 );

/**
* パンくず 末尾を非表示
*
* @param bcn_breadcrumb_trail $trail the breadcrumb_trail object after it has been filled
*/
function foo_pop($trail) {
	if ( is_single() ) {
		array_shift($trail->trail);
	}
}
add_action('bcn_after_fill', 'foo_pop');

/**
* メインクエリ 表示件数の変更（archive-works）
*
* @param bcn_breadcrumb_trail $trail the breadcrumb_trail object after it has been filled
*/
function my_pre_get_posts_genre( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		// 管理画面のページではなく、且つメインクエリの場合のみに実行
		if ( $query->is_post_type_archive('works') || $query->is_tax( 'genre') ) {
			// カテゴリーアーカイブページの場合にクエリを変更
			$query->set( 'posts_per_page', 6 );
			// 表示件数を6件に変更
		}
	}
}
add_action( 'pre_get_posts', 'my_pre_get_posts_genre' );

/**
* メインクエリ 表示件数の変更（archive-blog）
*
* @param bcn_breadcrumb_trail $trail the breadcrumb_trail object after it has been filled
*/
function my_pre_get_posts_topics( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		// 管理画面のページではなく、且つメインクエリの場合のみに実行
		if ( $query->is_post_type_archive('blog') || $query->is_tax( 'topics') ) {
			// カテゴリーアーカイブページの場合にクエリを変更
			$query->set( 'posts_per_page', 9 );
			// 表示件数を9件に変更
		}
	}
}
add_action( 'pre_get_posts', 'my_pre_get_posts_topics' );

/**
* 最新記事にラベルを付ける（archive-blog）
*
*/
function new_articles($day,$limit) {
	global $blog_query;
	$days = 30;
	$today = date_i18n('U');
	$entry_day = get_the_time('U');
	$elapsed_time = date('U',($today - $entry_day)) / 86400;
	if ( $days > $elapsed_time ) {
		$limit = 3;
		$num = $blog_query->current_post;
		if ( $limit > $num ) {
			echo '<span class="p-post_label">new</span>';
		}
	}
}