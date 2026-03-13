<?php
if (!defined('ABSPATH')) exit;
get_header();
/*
Template Name: フロントページ
*/
?>

<main class="home">
    <!-- メインビジュアル -->
    <section class="mv">
        <div class="mv_copy">
            <p class="mv_copy_main">DENTISTRY<br>FOR FUTURE</p>
            <p class="mv_copy_sub">学び続ける。そして、世界へ</p>
        </div>
    </section>
    <a class="banner-link" href="https://docs.google.com/forms/d/e/1FAIpQLSdg1NscloBA9ecoQT08ePuNNvTNNCQQZ7ReFc1fdsUfi4X4tw/viewform" target="_blank" rel="noopener noreferrer">
        <figure class="banner fade-in">
            <picture>
                <source
                    media="(max-width: 576px)"
                    srcset="<?= get_image_path('hm', 'banner_sp.jpg'); ?>">
                <img
                    src="<?= get_image_path('hm', 'banner.jpg'); ?>"
                    alt="バナー">
            </picture>
        </figure>
    </a>
    <!-- お知らせ -->
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
                        'exclude'    => get_cat_ID('未分類'),
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
                <?php
                $query = new WP_Query(array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                ));
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>
                        <li class="news_item">
                            <a href="<?php the_permalink(); ?>" class="news_item_inner">

                                <div class="news_item_info">
                                    <span class="news_item_date"><?php echo get_the_date('Y.m.d'); ?></span>
                                    <?php
                                    $terms = get_the_terms(get_the_ID(), 'category');
                                    if (!empty($terms) && !is_wp_error($terms)) :
                                    ?>
                                        <span class="news_item_cat"><?php echo esc_html($terms[0]->name); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="news_item_right">
                                    <span class="news_item_text"><?php the_title(); ?></span>
                                    <span class="arrow"> <img src="<?= get_image_path('cm', 'btn_arrow_black.svg'); ?>" alt=""></span>

                                </div>
                            </a>
                        </li>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>

            </ul>
            <a href="<?= home_url('/news-list'); ?>" class="c-btn--primary news_btn">
                <span class="text">一覧をみる</span>
            </a>
        </div>
    </section>

    <!-- infinityの理念 -->

    <section class="philosophy fade-in">
        <div class="wrapper philosophy_inner">
            <div class="philosophy_left">
                <div class="c-heading">
                    <div class="c-heading_section philosophy_title fade-in">
                        <span class="jpTitle">スタディグループinfinityの理念</span>
                        <h2 class="title">世界基準の歯科治療と経営を<br>日本で学ぶ。</h2>
                    </div>
                </div>
                <div class="philosophy_text">
                    <p>スタディグループinfinityは歯科業界の健全な発展と日頃従事する歯科医院の皆様にとってより良い医院経営の指標となるべく歯科医学向上の為の研鎖と、会員相互の親睦を目的としたスタディグループです。
                    </p>
                    <p>主に「知識」と「臨床力」と「経営力」を学び、
                        患者さまに常に選ばれる歯科医院を目指します。
                    </p>
                </div>
            </div>
            <img class="philosophy_image" src="<?= get_image_path('hm', 'philosophy.png'); ?>" alt="理念の図">
        </div>
    </section>

    <!-- 講師紹介 -->
    <section class="teachers ">
        <div class="wrapper teachers_inner" id="teachers">
            <div class="c-heading">
                <div class="c-heading_section teachers_title ">
                    <span class="jpTitle">代表的な講師のご紹介</span>
                    <h2 class="title fade-in">TEACHERS</h2>
                </div>
            </div>
            <ul class="teachers_list">
                <li class="teachers_item fade-in">
                    <div class="teachers_item_image">
                        <img src="<?= get_image_path('hm', 'teacher_01.jpg'); ?>" alt="細谷 梓">
                    </div>

                    <div class="teachers_item_body">
                        <p class="teachers_item_role">医療法人博愛会 理事長</p>
                        <p class="teachers_item_name">細谷 梓</p>
                        <p class="teachers_item_text">
                            日本歯科大学 卒業<br>
                            （4～6学年成績優秀者 6学年学術優秀賞）<br>
                            東京医科大学歯科口腔外科学講座 入局<br>
                            東京医科大学八王子医療センター麻酔科放射線科 研修<br>
                            スマイル歯科太田 勤務<br>
                            スマイルデンタルオフィス 開業
                        </p>
                    </div>
                </li>

                <li class="teachers_item is-reverse fade-in">
                    <div class="teachers_item_image">
                        <picture>
                            <source
                                media="(max-width: 820px)"
                                srcset="<?= get_image_path('hm', 'teacher_02_sp.jpg'); ?>">
                            <img
                                src="<?= get_image_path('hm', 'teacher_02.jpg'); ?>"
                                alt="土屋 新太郎">
                        </picture>
                    </div>

                    <div class="teachers_item_body">
                        <p class="teachers_item_role">医療法人エスティーアドバンス 理事長</p>
                        <p class="teachers_item_name">土屋 新太郎</p>
                        <p class="teachers_item_text">
                            神奈川歯科大学 卒業<br>
                            社会医療法人ジャパンメディカルアライアンス<br>
                            海老名総合病院 歯科・歯科口腔外科研修 修了<br>
                            広域医療法人神奈川県、千葉県の歯科医院 副院長 勤務<br>
                            大和駅前ファミリー歯科 開院<br>
                            医療法人エスティーアドバンス設立後 理事長就任<br>
                            株式会社エスラボ 開業<br>
                            大和駅前ファミリー歯科 シリウス医院 開院
                        </p>
                    </div>
                </li>
                <li class="teachers_item fade-in">
                    <div class="teachers_item_image">
                        <img src="<?= get_image_path('hm', 'teacher_03.jpg'); ?>" alt="丸尾 勝一郎">
                    </div>

                    <div class="teachers_item_body">
                        <p class="teachers_item_role">医療法人社団プライムエレメント 理事長</p>
                        <p class="teachers_item_name">丸尾 勝一郎</p>
                        <p class="teachers_item_text">
                            東京医科歯科大学 卒業<br>
                            岩手医科大学歯学部補綴・インプラント学講座 助教<br>
                            同附属病院 インプラント外来医局長<br>
                            米国ハーバード大学歯学部インプラント科<br>
                            ITIスカラー・研究員<br>
                            神奈川歯科大学大学院 口腔機能修復学講座<br>
                            咀嚼機能制御補綴学分野 助教<br>
                            同附属病院 総合診断科 科長<br>
                            インプラント私塾 一ノ塾塾頭就任<br>
                            三軒茶屋マルオ歯科 開院<br>
                            ITI（International Team of Implantolgy）Fellow就任<br>（就任時最年少）<br>
                            医療法人社団プライムエレメント 設立 理事長<br>
                            恵比寿マルオ歯科 審美・インプラントスタジオ 開院
                        </p>
                    </div>
                </li>

                <li class="teachers_item is-reverse fade-in">
                    <div class="teachers_item_image">
                        <picture>
                            <source
                                media="(max-width: 820px)"
                                srcset="<?= get_image_path('hm', 'teacher_04_sp.jpg'); ?>">
                            <img
                                src="<?= get_image_path('hm', 'teacher_04.jpg'); ?>"
                                alt="大久保 加奈">
                        </picture>
                    </div>

                    <div class="teachers_item_body">
                        <p class="teachers_item_role">Sherpa. 株式会社 代表歯科衛生士</p>
                        <p class="teachers_item_name">大久保 加奈</p>
                        <p class="teachers_item_text">
                            自費専門歯科勤務歴16年
                            （自費ペリオ2年・矯正専門歯科6年・湘南美容グループ8年）<br>
                            勤務時代実績：クリニック立ち上げ1院、立て直し1院 月／2500万達成実績あり（3ヶ月サポート）<br>

                            スタッフ教育・人事評価制度の考案から運用、SNSマーケティング運用・スタッフマネジメントを経験。<br>
                            2024年 全国定期訪問研修先は15院。<br>
                            日本一のドクターサポートを自ら目指し、確実な経営成果とスタッフ一人ひとりに寄り添った教育で、歯科難民を救う根本治療提案をモットーに、各医療現場に日本一の右腕を輩出。

                        </p>
                    </div>
                </li>
                <li class="teachers_item fade-in">
                    <div class="teachers_item_image">
                        <img
                            src="<?= get_image_path('hm', 'teacher_05.jpg'); ?>"
                            alt="塚本 千草">
                    </div>

                    <div class="teachers_item_body">
                        <p class="teachers_item_role">一般社団法人DHマネジメント協会 代表理事</p>
                        <p class="teachers_item_name">塚本 千草</p>
                        <p class="teachers_item_text">
                            歯科衛生士資格取得後、歯科医院にて勤務。<br>
                            予防歯科で理解を深めながら新人教育・マザーズデイ・キッズクラブ等の導入を手掛ける。<br>
                            介護支援専門員（ケアマネージャー）の資格を取得。<br>
                            寝たきりにならないための予防歯科や口腔ケアを積極的に取り入れたケアプランを作成。その後、企業歯科衛生士として活躍し、2014年一般社団法人DHマネジメント協会の設立。<br>
                            予防歯科を中心とした医院の仕組みづくりや新人教育・メンバーが働きやすい医院づくりを中心に活動している。

                        </p>
                    </div>
                </li>

                <li class="teachers_item is-reverse fade-in">
                    <div class="teachers_item_image">
                        <picture>
                            <source
                                media="(max-width: 820px)"
                                srcset="<?= get_image_path('hm', 'teacher_06_sp.jpg'); ?>">
                            <img
                                src="<?= get_image_path('hm', 'teacher_06.jpg'); ?>"
                                alt="鈴木 歩">
                        </picture>
                    </div>

                    <div class="teachers_item_body">
                        <p class="teachers_item_role">BRISTO DENTAL CLINIC 副院長</p>
                        <p class="teachers_item_name">鈴木 歩</p>
                        <p class="teachers_item_text">
                            高崎歯科衛生専門学校 卒業<br>
                            メンタル心理カウンセラー 取得<br>
                            日本予防歯科学会 所属<br>
                            日本歯周病学会 所属<br>
                            JDICAインプラントコーディネーター<br>
                            臨床歯科麻酔認定歯科医衛生士
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <!-- プランのご紹介 -->
    <section class="plans" id="plan">
        <div class="wrapper">
            <div class="plans_title">
                <span class="jpTitle">プランのご紹介</span>
                <h2 class="title fade-in">COURSE PLAN</h2>
            </div>

            <ul class="plans_list">
                <li class="plans_item fade-in">
                    <div class="plans_item_head">
                        <p class="plans_item_num">01.</p>
                        <h3 class="plans_item_title">歯科医師 レギュラーコース</h3>
                    </div>
                    <div class="plans_item_image">
                        <img src="<?= get_image_path('hm', 'plan01.jpg'); ?>" alt="歯科医師 レギュラーコース">
                    </div>

                    <p class="plans_item_text">
                        レギュラーコースは、インプラント、矯正歯科、経営学など多岐にわたる専門知識とスキルを習得し、実践できるように設計された包括的なプログラムです。受講することで、技術・知識に磨きをかけて頂き、即日、臨床に応用して頂ける、有益性の高いコースです。
                    </p>

                    <dl class="plans_item_price">
                        <div>
                            <dt>プレセミナー</dt>
                            <dd>
                                <span class="num">3</span><span class="comma">,</span><span class="num">000</span>円
                            </dd>

                        </div>
                        <div>
                            <dt>本セミナー</dt>
                            <dd>
                                <span class="num">100</span><span class="comma">,</span><span class="num">000</span>
                                〜
                                <span class="num">300</span><span class="comma">,</span><span class="num">000</span>円
                            </dd>

                        </div>
                    </dl>

                    <p class="plans_item_condition">
                        参加条件：医院開業15年以下・年商5億円以下の方
                    </p>

                    <a href="<?= esc_url(home_url('dentist-course/2026-dt-course/')); ?>" class="c-btn--primary plans_item_btn">
                        <span class="text">詳しくみる</span>
                    </a>
                </li>
                <li class="plans_item fade-in">
                    <div class="plans_item_head">
                        <p class="plans_item_num">02.</p>
                        <h3 class="plans_item_title">コデンタル 研修育成コース</h3>
                    </div>
                    <div class="plans_item_image">
                        <img src="<?= get_image_path('hm', 'plan02.jpg'); ?>" alt="コデンタル 研修育成コース">
                    </div>

                    <p class="plans_item_text">
                        歯科助手、歯科衛生士としてのスキルと知識を向上させるための特別なプログラムです。最新の知識と技術を習得し、患者さまに対してより質の高いケアを提供することが可能になります。また、専門性を高めることで、歯科医療チームの重要な一員としての役割を果たすことができます。
                    </p>

                    <dl class="plans_item_price">
                        <div>
                            <dt>プレセミナー</dt>
                            <dd>
                                <span class="num">1</span><span class="comma">,</span><span class="num">000</span>円
                            </dd>
                        </div>
                        <div>
                            <dt>本セミナー</dt>
                            <dd> <span class="num">60</span><span class="comma">,</span><span class="num">000</span>円</dd>
                        </div>
                    </dl>

                    <p class="plans_item_condition">
                        参加条件：臨床の現場で活躍する歯科衛生士の方<span>（※フリーランスとして起業されている方・講師業を行っている方は対象外）</span>
                    </p>

                    <a href=<?= esc_url(home_url('codental-course/2026-dh-course/')); ?> class="c-btn--primary plans_item_btn">
                        <span class="text">詳しくみる</span>
                    </a>
                </li>
            </ul>

        </div>
    </section>


    <!-- スケジュール -->
    <section class="schedule fade-in">
        <div class="wrapper schedule_inner">
            <h2>2026年間スケジュール</h2>

            <img
                class="tab-escape sp-escape"
                src="<?= get_image_path('hm', 'schedule.png'); ?>"
                alt="年間スケジュール">

            <div class="tab-only schedule_inner_sp">
                <img
                    src="<?= get_image_path('hm', 'schedule_sp.png'); ?>"
                    alt="年間スケジュール 1">
                <img
                    src="<?= get_image_path('hm', 'schedule_sp02.png'); ?>"
                    alt="年間スケジュール 2">
            </div>


        </div>
    </section>


    <!-- スポンサー -->
    <section class="sponsor fade-in" id="sponsor">
        <div class="wrapper sponsor_inner">
            <div class="c-heading">
                <div class="c-heading_section teachers_title "> <span class="jpTitle">協賛企業様</span>
                    <h2 class="title fade-in">SPONSOR</h2>
                </div>
            </div>
            <ul class="sponsor_list">
                <li class="sponsor_item">
                    <img src="<?= get_image_path('hm', 'sponsor01.jpg'); ?>" alt="企業ロゴ">
                </li>
                <li class="sponsor_item">
                    <img src="<?= get_image_path('hm', 'sponsor02.jpg'); ?>" alt="企業ロゴ">
                </li>
                <li class="sponsor_item">
                    <img src="<?= get_image_path('hm', 'sponsor03.jpg'); ?>" alt="企業ロゴ">
                </li>
                <li class="sponsor_item">
                    <img src="<?= get_image_path('hm', 'sponsor04.jpg'); ?>" alt="企業ロゴ">
                </li>
                <li class="sponsor_item">
                    <img src="<?= get_image_path('hm', 'sponsor05.jpg'); ?>" alt="企業ロゴ">
                </li>
                <li class="sponsor_item">
                    <img src="<?= get_image_path('hm', 'sponsor06.jpg'); ?>" alt="企業ロゴ">
                </li>
                <li class="sponsor_item">
                    <img src="<?= get_image_path('hm', 'sponsor07.jpg'); ?>" alt="企業ロゴ">
                </li>
                <li class="sponsor_item">
                    <img src="<?= get_image_path('hm', 'sponsor08.jpg'); ?>" alt="企業ロゴ">
                </li>
            </ul>

            <a href="<?php echo esc_url(home_url('/sponsor/')); ?>" class="c-btn--primary sponsor_btn">
                <span class="text">一覧をみる</span>
            </a>

        </div>
    </section>

    <?php get_template_part('template/contact'); ?>

</main>
<?php get_footer();
