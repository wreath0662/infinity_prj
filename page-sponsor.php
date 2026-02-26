<?php
/*
Template Name: スポンサー
*/
if (!defined('ABSPATH')) exit;
?>
<?php get_header(); ?>
<main class="p-sponsor">
    <section class="fade-in">
        <div class="p-sponsor_inner">
            <div>
                <div class="c-heading_section p-sponsor_title fade-in">
                    <span class="jpTitle">協賛企業様</span>
                    <h2 class="title">SPONSOR</h2>
                </div>
                <div class="p-sponsor_inner_group">
                    <h3>PLATINUM PARTNER</h3>
                    <div class="p-sponsor_inner_logo">
                        <img src="<?= get_image_path('sp', 'sponsor01.jpg'); ?>" alt="企業ロゴ">
                        <img src="<?= get_image_path('sp', 'sponsor02.jpg'); ?>" alt="企業ロゴ">
                        <img src="<?= get_image_path('sp', 'sponsor03.jpg'); ?>" alt="企業ロゴ">
                        <img src="<?= get_image_path('sp', 'sponsor04.jpg'); ?>" alt="企業ロゴ">
                    </div>
                </div>

                <div class="p-sponsor_inner_group">
                    <h3>GOLD PARTNER</h3>
                    <div class="p-sponsor_inner_logo">
                        <img src="<?= get_image_path('sp', 'sponsor05.jpg'); ?>" alt="企業ロゴ">
                        <img src="<?= get_image_path('sp', 'sponsor06.jpg'); ?>" alt="企業ロゴ">
                        <img src="<?= get_image_path('sp', 'sponsor07.jpg'); ?>" alt="企業ロゴ">
                        <img src="<?= get_image_path('sp', 'sponsor08.jpg'); ?>" alt="企業ロゴ">
                    </div>
                </div>

                <div class="p-sponsor_inner_group">
                    <h3>SILVER PARTNER</h3>
                    <div class="p-sponsor_inner_logo">
                        <img src="<?= get_image_path('sp', 'sponsor09.jpg'); ?>" alt="企業ロゴ">
                        <img src="<?= get_image_path('sp', 'sponsor10.jpg'); ?>" alt="企業ロゴ">
                        <img src="<?= get_image_path('sp', 'sponsor11.jpg'); ?>" alt="企業ロゴ">
                        <img src="<?= get_image_path('sp', 'sponsor12.jpg'); ?>" alt="企業ロゴ">
                        <img src="<?= get_image_path('sp', 'sponsor13.jpg'); ?>" alt="企業ロゴ">
                        <img src="<?= get_image_path('sp', 'sponsor14.jpg'); ?>" alt="企業ロゴ">
                        <img src="<?= get_image_path('sp', 'sponsor15.jpg'); ?>" alt="企業ロゴ">
                        <img src="<?= get_image_path('sp', 'sponsor16.jpg'); ?>" alt="企業ロゴ">
                        <img src="<?= get_image_path('sp', 'sponsor17.jpg'); ?>" alt="企業ロゴ">
                        <img src="<?= get_image_path('sp', 'sponsor18.jpg'); ?>" alt="企業ロゴ">
                    </div>
                </div>

                <div class="p-sponsor_inner_group">
                    <h3>BRONZE PARTNER</h3>
                    <div class="p-sponsor_inner_logo">
                        <img src="<?= get_image_path('sp', 'sponsor19.jpg'); ?>" alt="企業ロゴ">
                        <img src="<?= get_image_path('sp', 'sponsor20.jpg'); ?>" alt="企業ロゴ">
                    </div>
                </div>
            </div>
    </section>

    <?php get_template_part('template/contact'); ?>
</main>
<?php get_footer(); ?>