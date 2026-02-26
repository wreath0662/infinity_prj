<?php
if (!defined('ABSPATH')) exit;
get_header();
?>

<main class="news_archive">

    <section class="news fade-in">
        <div class="news_inner">
            <div class="news_head">
                <div class="c-heading">
                    <div class="c-heading_section news_title fade-in">
                        <span class="jpTitle">お知らせ</span>
                        <h2 class="title">NEWS</h2>
                    </div>
                </div>


                <div class="news_head_right">
                    <a href="<?php echo esc_url(home_url('/news-list/')); ?>"
                        class="<?php echo (is_home() || is_post_type_archive('post') || is_page('news-list')) ? 'current' : ''; ?>">
                        すべて
                    </a>

                    <?php
                    $categories = get_categories([
                        'orderby'    => 'name',
                        'order'      => 'ASC',
                        'hide_empty' => false,
                    ]);

                    foreach ($categories as $category) :
                        $current = is_category($category->term_id) ? 'current' : '';
                    ?>
                        <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"
                            class="<?php echo esc_attr($current); ?>">
                            <?php echo esc_html($category->name); ?>
                        </a>
                    <?php endforeach; ?>
                </div>

            </div>

            <ul class="news_list">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <li class="news_item">
                            <a href="<?php the_permalink(); ?>" class="news_item_inner">

                                <div class="news_item_info">
                                    <span class="news_item_date"><?php echo esc_html(get_the_date('Y.m.d')); ?></span>

                                    <?php
                                    $cats = get_the_category();
                                    if (!empty($cats)) :
                                    ?>
                                        <span class="news_item_cat"><?php echo esc_html($cats[0]->name); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="news_item_right">
                                    <span class="news_item_text"><?php the_title(); ?></span>
                                    <span class="arrow">
                                        <img src="<?php echo esc_url(get_image_path('cm', 'btn_arrow_black.svg')); ?>" alt="">
                                    </span>
                                </div>
                            </a>
                        </li>
                    <?php endwhile;
                else : ?>
                    <p>現在お知らせはありません。</p>
                <?php endif; ?>
            </ul>

            <!-- ページネーション -->
            <div class="news_archive_pagination">
                <?php
                the_posts_pagination([
                    'mid_size'  => 5,
                    'prev_text' => '前へ',
                    'next_text' => '次へ',
                ]);
                ?>
            </div>

        </div>
    </section>

</main>

<?php get_template_part('template/contact'); ?>
<?php get_footer(); ?>