<?php
if (!defined('ABSPATH')) exit;
get_header();
?>

<main class="news_detail">
    <div class="news_detail_wrapper">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="news_content <?php echo has_post_thumbnail() ? 'has-thumb' : 'no-thumb'; ?>">
                    <div class="news_content_ttlBox">
                        <div class="news_content_inner">
                            <time class="time" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
                            <?php
                            $cats = get_the_category();
                            if ($cats) :
                            ?>
                                <div class="category_inner">
                                    <?php foreach ($cats as $cat) : ?>
                                        <span class="category"><?php echo esc_html($cat->name); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="news_content_thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="news_text">
                        <?php the_content(); ?>
                    </div>
                </article>
                <div class="articlePage-btn">
                    <!-- <div class="prev-btn">
            <?php previous_post_link('%link', '<span class="circle"></span> 前の記事'); ?>
          </div> -->
                    <a class="c-btn--primary news_detail_btn" href="<?php echo esc_url(home_url('/news-list/')); ?>">
                        <span class="text">一覧に戻る</span>
                    </a>
                    <!-- <div class="next-btn">
            <?php next_post_link('%link', '次の記事 <span class="circle"></span>'); ?>
          </div>
        </div> -->
            <?php endwhile;
        endif; ?>
                </div>
</main>
<?php get_template_part('template/contact'); ?>
<?php get_footer(); ?>