<?php
$var = variables();
$set = $var['setting_home'];
$assets = $var['assets'];
$url = $var['url'];
$logo = carbon_get_theme_option('logo');
$social_networks = carbon_get_theme_option('social_networks');
?>

<!DOCTYPE html>
<html class="no-js page" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body>

<header class="header <?php if (is_front_page()) echo 'transparent'; ?>">
    <div class="header_content">
        <a class="main_logo" href="<?php echo $url; ?>">
            <?php the_image($logo); ?>
        </a>
        <div class="navigation" id="nav_list">
            <?php
            $menu = wp_nav_menu([
                'echo' => false,
                'container' => '',
                'theme_location' => 'header_menu',
                'menu_class' => 'nav_list',
                'menu' => 'Menu 1',
            ]);
                            $menu = str_replace('class="sub-menu"', 'class="sub-menu nested_list" ', $menu);
                            $menu = str_replace('menu-item-has-children', 'menu-item-has-children has_child', $menu);
            echo $menu;
            ?>

        </div>
        <div class="header_right">
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
            <a class="header_links_trigger header_links_trigger__js" href="#nav_list">
                <span></span><span class="transparent"></span><span></span>
            </a>
        </div>
    </div>
</header>
<main class="content <?php if (!is_front_page()) echo 'top_offset'; ?>">