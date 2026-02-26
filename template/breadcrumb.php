<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="c-breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
    <div class="c-breadcrumb__content">
        <?php if (function_exists('bcn_display')) {
            bcn_display();
        } ?>
    </div>
</div>