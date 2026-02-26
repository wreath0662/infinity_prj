<?php
/*-------------------------------------------*/
/*  css jsの読み込み
/*-------------------------------------------*/

function add_files()
{
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
    // wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', array(), '1.0.0', 'all');
    // wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), false, true);
    wp_enqueue_script('gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js', array(), false, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'add_files');

/*-------------------------------------------*/
/*  削除関連
/*-------------------------------------------*/
add_filter('body_class', '_remove_body_class', 10, 2);
// linkタグ
remove_action('wp_head', 'index_rel_link');
// デフォルトパーマリンクのURL
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
// ショートリンクURL
remove_action('wp_head', 'wp_shortlink_wp_head');
// wlwmanifest
remove_action('wp_head', 'wlwmanifest_link');
// application/rsd+xml
remove_action('wp_head', 'rsd_link');
// RSSフィードのURL
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
// 「?ver=~」
function vc_remove_wp_ver_css_js($src)
{
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}
add_filter('style_loader_src', 'vc_remove_wp_ver_css_js', 9999);
add_filter('script_loader_src', 'vc_remove_wp_ver_css_js', 9999);
// 絵文字
function disable_emoji()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'disable_emoji');
// bodyの余計なクラスたち
function _remove_body_class($wp_classes, $extra_classes)
{
    $wp_classes = preg_grep("/template|\d/", $wp_classes, PREG_GREP_INVERT);
    return array_merge($wp_classes, (array) $extra_classes);
}

/*-------------------------------------------*/
/*  投稿のアーカイブページ作成
/*-------------------------------------------*/
function post_has_archive($args, $post_type)
{
    if ('post' == $post_type) {
        $args['rewrite'] = true; // リライトを有効にする
        $args['has_archive'] = 'news-list'; // 任意のスラッグ名
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

// ログイン画面のロゴ変更
function login_logo()
{
    $logo_url = esc_url(get_template_directory_uri() . '/dist/images/common/logo_img.svg');
?>
    <style type="text/css">
        .login h1 a {
            background-image: url('<?php echo $logo_url; ?>');
            width: 220px;
            height: 50px;
            background-size: contain;
        }
    </style>
    <?php
}
add_action('login_head', 'login_logo');

// ログイン画面のロゴURL
function custom_login_logo_url()
{
    return get_bloginfo('url');
}
add_filter('login_headerurl', 'custom_login_logo_url');

// ログイン画面のロゴタイトル
function custom_login_logo_url_title()
{
    return 'トップページを表示';
}

// 管理画面左上ロゴ非表示
add_action('wp_before_admin_bar_render', 'hide_before_admin_bar_render');
function hide_before_admin_bar_render()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
}

// テーマのセットアップ
function my_theme_setup()
{
    // テーマサポート機能を有効化
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'my_theme_setup');

/*-------------------------------------------*/
/*  「wp_head();」に出力される余分なタグを削除する
/*—————————————————————*/
// WordPressのバージョンを非表示にする
remove_action('wp_head', 'wp_generator');
// 前の文書と次の文書へのリンクを非表示にする
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
// リモート投稿をする時に使うタグを非表示にする
remove_action('wp_head', 'rsd_link');
// リモート投稿をする時に使うタグを非表示にする
remove_action('wp_head', 'wlwmanifest_link');
// WordPressの投稿IDを使った短いURLを非表示にする
remove_action('wp_head', 'wp_shortlink_wp_head');
//簡単に引用表示に使うを非表示にするタグをを非表示にする
//remove_action('wp_head', 'rest_output_link_wp_head');
//簡単に引用表示に使うを非表示にするタグをを非表示にする
//remove_action('wp_head','wp_oembed_add_discovery_links');
//絵文字用のコードを非表示にする
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
//RSSフィードのURLを非表示にする
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
//oembedを非表示にする
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
//wordpress自動生成sitemap無効化
add_filter('wp_sitemaps_enabled', '__return_false');

//不要なもの削除
add_theme_support('automatic-feed-links');
add_action('wp_enqueue_scripts', 'remove_block_library_style');
function remove_block_library_style()
{
    wp_dequeue_style('wp-block-library');
}

/*-------------------------------------------*/
/*  バージョンアップ通知を管理者のみ表示させるようにします
/*-------------------------------------------*/
function update_nag_admin_only()
{
    if (!current_user_can('administrator')) {
        remove_action('admin_notices', 'update_nag', 3);
    }
}
add_action('admin_init', 'update_nag_admin_only');
/*-------------------------------------------*/
/*  DNSプリフェッチ用コードを削除
/*-------------------------------------------*/
add_filter('wp_resource_hints', 'remove_dns_prefetch', 10, 2);
function remove_dns_prefetch($hints, $relation_type)
{
    if ('dns-prefetch' === $relation_type) {
        return array_diff(wp_dependencies_unique_hosts(), $hints);
    }
    return $hints;
}
/*-------------------------------------------*/
/*  global_stylesを削除
/*-------------------------------------------*/
add_action('wp_enqueue_scripts', 'remove_my_global_styles');
function remove_my_global_styles()
{
    wp_dequeue_style('global-styles');
}

/*-------------------------------------------*/
/* /画像の添付ファイルページを404ページへリダイレクト
/*-------------------------------------------*/
add_action('template_redirect', 'attachment404');
function attachment404()
{
    // attachmentページだった場合
    if (is_attachment()) {
        global $wp_query;
        $wp_query->set_404();
        status_header(404);
    }
}
/*-------------------------------------------*/
/*  管理画面メニュー非表示
/*-------------------------------------------*/
function remove_menus()
{
    //remove_menu_page( 'index.php' ); // ダッシュボード.
    //remove_menu_page( 'edit.php' ); // 投稿.
    // remove_menu_page('upload.php'); // メディア.
    //remove_menu_page( 'edit.php?post_type=page' ); // 固定.
    remove_menu_page('edit-comments.php'); // コメント.
    //remove_menu_page( 'themes.php' ); // 外観.
    //remove_menu_page( 'plugins.php' ); // プラグイン.
    //remove_menu_page( 'users.php' ); // ユーザー.
    //remove_menu_page( 'tools.php' ); // ツール.
    //remove_menu_page( 'options-general.php' ); // 設定.

}
add_action('admin_menu', 'remove_menus', 999);

/*-------------------------------------------*/
/*  メニューの並び替え
/*-------------------------------------------*/
// function my_custom_menu_order($menu_order) {
//   if (!$menu_order) return true;
//   return array(
//       'index.php', //ダッシュボード
//       'separator1', //セパレータ１
//       'edit.php', //投稿
//       'edit.php?post_type=works', //カスタムポスト
//       'separator2', //セパレータ２
//       'edit.php?post_type=page', //固定ページ
//       'edit-comments.php', //コメント
//       'separator-last', //最後のセパレータ
//       'themes.php', //外観
//       'plugins.php', //プラグイン
//       'users.php', //ユーザー
//       'tools.php', //ツール
//       'upload.php', //メディア
//       'options-general.php', //設定
//   );
// }
// add_filter('custom_menu_order', 'my_custom_menu_order');
// add_filter('menu_order', 'my_custom_menu_order');

/*-------------------------------------------*/
/*  管理メニュー上段のコメントと新規を非表示
/*-------------------------------------------*/
function remove_admin_bar_items()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments'); // コメントメニューを削除
    $wp_admin_bar->remove_menu('new-content'); // "新規"メニューを削除
}
add_action('wp_before_admin_bar_render', 'remove_admin_bar_items');

function remove_footer_admin()
{
    return '';
}
add_filter('admin_footer_text', 'remove_footer_admin'); // フッターテキストを非表示にする

function remove_footer_version()
{
    return '';
}
add_filter('update_footer', 'remove_footer_version', 9999); // バージョン情報を非表示にする


/*-------------------------------------------*/
/* サムネイルという項目をカラムに追加
/*-------------------------------------------*/
// カスタム投稿タイプを取得する関数（共通化）
function get_custom_post_types()
{
    return get_post_types(array('_builtin' => false), 'names');
}

// サムネイルカラム追加
function customize_manage_posts_columns($columns)
{
    $columns['thumbnail'] = __('Thumbnail');
    return $columns;
}

// カスタム投稿タイプにサムネイルカラムを追加
function add_thumbnail_column_to_custom_post_types()
{
    foreach (get_custom_post_types() as $post_type) {
        add_filter("manage_{$post_type}_posts_columns", 'customize_manage_posts_columns');
    }
}
add_action('admin_init', 'add_thumbnail_column_to_custom_post_types');

// サムネイル画像表示
function customize_manage_posts_custom_column($column_name, $post_id)
{
    if ('thumbnail' === $column_name) {
        $thum = get_the_post_thumbnail($post_id, 'small', array('style' => 'width:100px;height:auto;'));
        echo $thum ?: __('');
    }
}

// カスタム投稿タイプにサムネイル画像表示のアクションを追加
function add_thumbnail_custom_column_to_custom_post_types()
{
    foreach (get_custom_post_types() as $post_type) {
        add_action("manage_{$post_type}_posts_custom_column", 'customize_manage_posts_custom_column', 10, 2);
    }
}
add_action('admin_init', 'add_thumbnail_custom_column_to_custom_post_types');

/*-------------------------------------------*/
/* アイキャッチ画像を有効にすると切り抜き
/*-------------------------------------------*/

// テーマサポートにポストサムネイルを追加
add_theme_support('post-thumbnails');

// カスタム画像サイズを追加
add_image_size('interview_image', 900, 576, true);
add_image_size('interview__recruitTop_image', 584, 361, ['center', 'top']);
add_image_size('interview_qa_image', 900, 391, true);

// 画像サイズを制御するためのフィルターを追加
add_filter('intermediate_image_sizes_advanced', 'filter_image_sizes_for_post_types', 10, 2);



/*-------------------------------------------*/
/*カスタムナビゲーション
/*-------------------------------------------*/
// function register_my_menus()
// {
//     register_nav_menus(array(
//         'header-menu' => 'ヘッダーメニュー',
//     ));
// }
// add_action('after_setup_theme', 'register_my_menus');

// //TOPページ
// add_shortcode('hurl', 'shortcode_hurl');
// function shortcode_hurl()
// {
//     return home_url('/');
// }
// remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


/*-------------------------------------------*/
/*//youtube自動囲い
/*-------------------------------------------*/
function iframe_in_div($the_content)
{
    if (is_singular()) {
        $the_content = preg_replace('/<iframe/i', '<div class="youtube"><iframe', $the_content);
        $the_content = preg_replace('/<\/iframe>/i', '</iframe></div>', $the_content);
    }
    return $the_content;
}
add_filter('the_content', 'iframe_in_div');

/*-------------------------------------------*/
// bodyにスラッグ名のclass付与
/*-------------------------------------------*/
// フィルターフック
add_filter('body_class', 'add_page_id_class_name');

function add_page_id_class_name($classes)
{
    if (is_singular()) {
        // 単一の投稿ページの場合
        global $post;
        $classes[] = 'page-' . $post->post_name;
    } elseif (is_post_type_archive()) {
        // カスタム投稿タイプのアーカイブページの場合
        $post_type = get_queried_object();
        $classes[] = 'post-type-archive-' . $post_type->name;
    }
    return $classes;
}

// /*-------------------------------------------*/
// // ACF エディタカスタマイズ
// /*-------------------------------------------*/
// function my_acf_wysiwyg_toolbars($toolbars)
// {
//     $toolbars['Original'] = array();
//     $toolbars['Original'][1] = array('bold', 'forecolor');
//     return $toolbars;
// }
// add_filter('acf/fields/wysiwyg/toolbars', 'my_acf_wysiwyg_toolbars');


/*-------------------------------------------*/
/* HOMEのURLをショートコードで表示
/*-------------------------------------------*/
add_shortcode('homeurl', 'shortcode_homeurl');
function shortcode_homeurl($atts, $content = '')
{
    return esc_url(home_url()) . $content;
}
/*-------------------------------------------*/
/* テンプレートURLをショートコードで表示
/*-------------------------------------------*/
add_shortcode('theme', 'shortcode_theme');
function shortcode_theme($atts, $content = '')
{
    return get_theme_file_uri() . $content;
}
/*-------------------------------------------*/
/* ダッシュボード削除
/*-------------------------------------------*/
function remove_dashboard_widget()
{
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal'); // サイトヘルスステータス
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); // 概要
    remove_meta_box('dashboard_activity', 'dashboard', 'normal'); // アクティビティ
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); // クイックドラフト
    remove_meta_box('dashboard_primary', 'dashboard', 'side'); // WordPress イベントとニュース
    remove_action('welcome_panel', 'wp_welcome_panel'); // ウェルカムパネル
}
add_action('wp_dashboard_setup', 'remove_dashboard_widget');


/*-------------------------------------------*/
/* 画像のパスを変数に格納
/*-------------------------------------------*/
function get_image_path($type, $filename)
{
    $base_path = 'images/';
    $paths = [
        'cm' => $base_path . 'common/',
        'hm' => $base_path . 'home/',
        'sp' => $base_path . 'sponsor/',
    ];

    return isset($paths[$type]) ? esc_url(get_theme_file_uri($paths[$type] . $filename)) : '';
}

/*-------------------------------------------*/
/*  許可タグホワイトリストに、iframeを追加する
/*-------------------------------------------*/
add_filter('wp_kses_allowed_html', function ($tags) {
    // iframeとiframeで使える属性を指定する
    $tags['iframe'] = [
        'class' => [],
        'src' => [],
        'width' => [],
        'height' => [],
        'frameborder' => [],
        'scrolling' => [],
        'marginheight' => [],
        'marginwidth' => [],
    ];

    // 管理者または編集者であるかを確認
    if (current_user_can('administrator') || current_user_can('editor')) {
        // scriptとscriptで使える属性を指定する
        $tags['script'] = [
            'src' => [],
            'type' => [],
            'async' => [],
            'defer' => [],
            'id' => [],
            'class' => [],
        ];
    }

    return $tags;
});


/*-------------------------------------------*/
/*  お問い合わせページ
/*-------------------------------------------*/
$contact = 'contact';
$complete = 'complete';

// お問い合わせフォームの送信後にサンクスページへ飛ばす
add_action('wp_footer', 'redirect_thanks_page');
function redirect_thanks_page()
{
    global $contact;
    global $complete;

    if (is_page($contact)) {
    ?>
        <script>
            document.addEventListener('wpcf7mailsent', function(event) {
                location.href = '<?php echo esc_js(home_url("/$complete")); ?>';
            }, false);
        </script>
<?php
    }
}
