<?php
if (!defined('ABSPATH')) exit;
?>

<?php get_header(); ?>

<main class="p-notFound">
    <section class="error">
        <div class="error_content">
            <p class="error_content_text">お探しのページは見つかりませんでした。</p>
            <a href="<?= esc_url(home_url()); ?>" class="c-btn--primary blue fade-appear">
                <span class="text">TOPに戻る</span>
            </a>
        </div>
    </section>
    <?php get_template_part('template/breadcrumb'); ?>
    <?php get_template_part('template/contact'); ?>
</main>
<?php get_footer(); ?>