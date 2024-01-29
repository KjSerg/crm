<?php
$var = variables();
$set = $var['setting_home'];
$assets = $var['assets'];
$url = $var['url'];
$policy_page_id = (int)get_option('wp_page_for_privacy_policy');
$logo = carbon_get_theme_option('logo');
$social_networks = carbon_get_theme_option('social_networks');
$affiliate_program = carbon_get_theme_option('affiliate_program');
$phone = carbon_get_theme_option('phone');
$links = carbon_get_theme_option('footer_links');
$modals = carbon_get_theme_option('modals');
?>

<script>
    var admin_ajax = '<?php echo $var['admin_ajax']; ?>';
</script>

</main>
<footer class="footer">
    <div class="footer_top_line">
        <div class="screen_content footer_cols">
            <div class="footer_col left_col">
                <a class="main_logo" href="<?php echo $url; ?>">
                    <?php the_image($logo); ?>
                </a>
                <?php if ($social_networks): ?>
                    <ul class="soc_list">
                        <?php foreach ($social_networks as $network): ?>
                            <li>
                                <a class="soc_link" href="<?php echo $network['url']; ?>">
                                    <?php the_image($network['icon']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="footer_col middle_col">
                <?php
                $menu = wp_nav_menu( [
                    'echo'            => false,
                    'container'       => '',
                    'theme_location'  => 'footer_menu',
                    'menu'            => 'Menu 2',
                    'menu_class'            => 'footer_list',
                ] );
                echo $menu;
                ?>
            </div>
            <div class="footer_col right_col">
                <?php if ($phone): ?>
                    <div class="footer_col_title">Контакты</div>
                    <a class="ico_link" href="<?php the_phone_link($phone); ?>">
                        <?php _s(_i('phone')); ?>
                        <span><?php echo $phone; ?></span>
                    </a>
                <?php endif; ?>
                <?php if ($links): foreach ($links as $link):
                    if ($link['_type'] == 'modal'):
                        ?>
                        <a class="more_btn fancybox" href="#<?php echo $link['modal']; ?>">
                            <span><?php echo $link['button_text']; ?></span>
                            <div class="more_btn_ico">
                                <?php _s(_i('phone')); ?>
                            </div>
                        </a>
                    <?php else: ?>
                        <a class="more_btn" href="<?php echo $link['link']; ?>">
                            <span><?php echo $link['link']; ?></span>
                            <div class="more_btn_ico">
                                <?php _s(_i('phone')); ?>
                            </div>
                        </a>
                    <?php endif; ?>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </div>
    <div class="footer_bottom_line">
        <div class="screen_content">
            <div class="copyright">
                <?php echo carbon_get_theme_option('copyright'); ?>
            </div>
            <?php if ($affiliate_program && get_post($affiliate_program)): ?>
                <a href="<?php echo get_the_permalink($affiliate_program); ?>">
                    <?php echo get_the_title($affiliate_program); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</footer>
<div class="is_hidden thanks_message" id="myThanks">
    <div class="thanks_title"><?php echo carbon_get_theme_option('thanks_title'); ?></div>
    <div class="thanks_subtitle"><?php echo carbon_get_theme_option('thanks_subtitle'); ?></div>
</div>
<?php if ($modals): foreach ($modals as $key => $modal): ?>

    <div class="callback_modal is_hidden" id="<?php echo $modal['id'] . '-' . $key; ?>">
        <div class="main_title_wrapper centered">
            <div class="main_title small">
                <?php echo $modal['title']; ?>
            </div>
            <?php _t($modal['subtitle']); ?>
        </div>
        <?php echo do_shortcode($modal['form']); ?>
    </div>

<?php endforeach; endif; ?>

<?php wp_footer(); ?>

</body>

</html>