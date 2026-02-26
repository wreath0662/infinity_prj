<?php
if (!defined('ABSPATH')) exit;
?>
<footer class="l-footer">

    <div class="l-footer_inner">
        <div class="l-footer_top">
            <div class="l-footer_logo">
                <a href="<?= home_url('/'); ?>">
                    <img src="<?= get_image_path('cm', 'logo.svg'); ?>" alt="infinity">
                </a>
            </div>
            <nav class="l-footer_nav">
                <ul class="l-footer_list">
                    <li><a href="<?= esc_url(home_url('/news-list')); ?>">お知らせ</a></li>
                    <li><a href="<?= esc_url(home_url('/#teachers')); ?>">講師紹介</a></li>
                    <li><a href="<?= esc_url(home_url('/#plan')); ?>">プラン</a></li>
                    <li><a href="<?= esc_url(home_url('/sponsor')); ?>">協賛企業</a></li>
                    <li> <a href="https://docs.google.com/forms/d/e/1FAIpQLSdg1NscloBA9ecoQT08ePuNNvTNNCQQZ7ReFc1fdsUfi4X4tw/viewform" target="_blank"
                            rel="noopener noreferrer">お問い合わせ</a></li>
                    <li class="is-instagram">
                        <a href="https://www.instagram.com/dentalstudygroupinfinity" target="_blank"
                            rel="noopener noreferrer">
                            <img src="<?= get_image_path('cm', 'instagram.png'); ?>" alt="インスタグラムのアイコン">
                        </a>
                    </li>
                </ul>
                <a href="<?= esc_url(home_url('/privacy-policy')); ?>" class=" l-footer_privacy">
                    プライバシーポリシー
                </a>
            </nav>

        </div>
        <div class="l-footer_bottom">
            <p class="l-footer_copy">
                ©2026 infinity All rights reserved.
            </p>
        </div>

    </div>

</footer>
<?php wp_footer(); ?>
</body>

</html>