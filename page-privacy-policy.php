<?php
/*
Template Name: 個人情報保護方針
*/
if (!defined('ABSPATH')) exit;
get_header();
?>

<main class="p-privacy">
    <div class="p-privacy_inner">

        <!-- ページタイトル -->
        <div class="c-heading">
            <div class="c-heading_section p-privacy_title fade-in">
                <span class="jpTitle">個人情報保護方針</span>
                <h2 class="title">PRIVACY POLICY</h2>
            </div>
        </div>
        <p class="p-privacy_head">スタディグループinfinityは、ご予約やご相談、資料請求などで、利用者の方に個人情報の提供をお願いすることがあります。<br>当院は、ご提供いただいた個人情報に関して、以下のプラバシーポリシー（個人情報保護方針）を定め確実な履行に努めます。</p>
        <section class="p-privacy_contents">
            <h2 class="p-privacy_bgTitle">個人情報の利用目的</h2>

            <p class="p-privacy_contents_text">
                利用者の方からお預かりした個人情報は、資料の送付、お問い合わせに対する回答などで、ご連絡させていただく際に使用いたします。
            </p>
        </section>

        <section class="p-privacy_contents">
            <h2 class="p-privacy_bgTitle">個人情報の利用と提供について</h2>

            <p class="p-privacy_contents_text">
                収集した個人情報の利用につきましては、本来の利用目的の範囲を超えて使用いたしません。<br class="pc-only">以下のいずれかに該当する場合を除き、利用者の方の許可なく個人情報を第三者に開示・提供することはいたしません。
            <ul class="p-privacy_contents_list">
                <li>利用者の方の了解を得た場合</li>
                <li>公益性があると判断できる内容を、個人を識別・特定できない状態に加工して利用する場合</li>
                <li>裁判所や警察などの公的機関から、法律に基づく正式な照会要請を受けた場合</li>
                <li>ご利用者にサービスを提供する目的で、当院からの委託を受けて業務を行う会社が情報を必要とする場合。<span>（ただしこれらの会社も、個人情報を上記の目的の限度を超えて利用することはできません。）</span></li>
            </ul>
            </p>
        </section>

        <section class="p-privacy_contents">
            <h2 class="p-privacy_bgTitle">個人情報の管理について</h2>
            <p class="p-privacy_contents_text">
                利用者の個人情報について、正確かつ最新の状態に保ち、個人情報への不正アクセス・紛失・破損・改ざん・漏洩などを防止に努めます。
            <p class="p-privacy_contents_text sub_title">個人情報の確認･修正等について</p>
            <p class="p-privacy_contents_text">当院は、利用者の個人情報について利用者ご本人から照会・修正・削除などを求められた場合には、ご本人であることを確認の上、遅滞なく内容を確認し、適切に対応いたします。
            </p>
        </section>


        <!-- お問い合わせ -->
        <section class="p-privacy_contents">
            <h2 class="p-privacy_bgTitle">お問い合わせ窓口</h2>

            <p class="p-privacy_contents_text">
                個人情報の取扱に関するお問い合せは下記までご連絡ください。

            </p>
            <div class="p-privacy_contents_contact">
                <p> スタディグループinfinity</p>
                <p>メール：infinity.2024.dental@gmail.com</p>
            </div>
        </section>


    </div>
</main>

<?php get_template_part('template/contact'); ?>
<?php get_footer(); ?>