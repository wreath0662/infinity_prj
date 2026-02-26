<?php
if (!defined('ABSPATH')) exit;
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="format-detection" content="telephone=no">
    <?php if (is_page("contact")) : ?>
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Cache-Control" content="no-cache">
        <meta http-equiv="Expires" content="0">
    <?php endif; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400..700&family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body id="<?php
            if (is_singular()) {
                global $post;
                echo esc_attr($post->post_name);
            } elseif (is_post_type_archive()) {
                $post_type = get_queried_object();
                echo esc_attr($post_type->name);
            }
            ?>"
    <?php body_class(); ?>>
    <header class="l-header">
        <a href="<?= esc_url(home_url()); ?>">
            <img class="l-header_logo" src="<?= get_image_path('cm', 'logo.svg'); ?>" alt="">
        </a>

        <div class="l-header_nav pc-only">
            <ul class="l-header_list">
                <li class="l-header_menu">
                    <a href="<?= esc_url(home_url()); ?>">
                        <p>ホーム</p>
                    </a>
                </li>
                <li class="l-header_menu">
                    <a href="<?= esc_url(home_url('/news-list')); ?>">
                        <p>お知らせ</p>
                    </a>
                </li>
                <li class="l-header_menu">
                    <a href="<?= esc_url(home_url('/#teachers')); ?>">
                        <p>講師紹介</p>
                    </a>
                </li>
                <li class="l-header_menu">
                    <a href="<?= esc_url(home_url('/#plan')); ?>">
                        <p>プラン</p>
                    </a>
                </li>
                </li>
                <li class="l-header_menu">
                    <a href="<?= esc_url(home_url('/sponsor')); ?>">
                        <p>協業企業</p>
                    </a>
                </li>
                <li class="l-header_menu">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSdg1NscloBA9ecoQT08ePuNNvTNNCQQZ7ReFc1fdsUfi4X4tw/viewform" target="_blank"
                        rel="noopener noreferrer">
                        <p>お問い合わせ</p>
                    </a>
                </li>
                <li class="l-header_menu is-instagram">
                    <a href="https://www.instagram.com/dentalstudygroupinfinity" target="_blank"
                        rel="noopener noreferrer">
                        <img src="<?= get_image_path('cm', 'instagram.png'); ?>" alt="インスタグラムのアイコン">
                    </a>
                </li>
            </ul>
        </div>

        <!-- ハンバーガーメニュー -->
        <div class="hamburger pc-escape">
            <button class="hamburger_btn">
                <span></span><span></span>
                <p>MENU</p>
            </button>

            <div class="hamburger_menu">
                <div class="hamburger_menu_inner">
                    <ul class="hamburger_menu_list">
                        <li>
                            <a href="<?= esc_url(home_url()); ?>">
                                <span>ホーム</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= esc_url(home_url('/news-list')); ?>">
                                <span>お知らせ</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= esc_url(home_url('/#teachers')); ?>">
                                <span>講師紹介</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= esc_url(home_url('/#plan')); ?>">
                                <span>プラン</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= esc_url(home_url('/sponsor')); ?>">
                                <span>協業企業</span>
                            </a>
                        </li>
                        <li class="hamburger_menu_contact">
                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSdg1NscloBA9ecoQT08ePuNNvTNNCQQZ7ReFc1fdsUfi4X4tw/viewform" target="_blank"
                                rel="noopener noreferrer">
                                <span>お問い合わせ</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/dentalstudygroupinfinity" target="_blank"
                                rel="noopener noreferrer">
                                <img src="<?= get_image_path('cm', 'instagram_white.png'); ?>" alt="インスタグラムのアイコン">
                                <span>公式インスタグラム</span>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>

        </div>


    </header>