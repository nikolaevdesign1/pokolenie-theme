<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pokolenie
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
 <header>
        <div class="mobile-header">
            <div class="mobile-flex">
                <div class="header_logo">
                    <a href="/">
                        <img src = "<?php the_field('логотип', 'option')?>">
                        <p>Всероссийский благотворительный проект по наставничеству для подростков 15-19 лет</p>
                    </a>
                </div>
               <div class="login_button start-registration">
						
						<?php if ( is_user_logged_in() ) : ?>
    <a href="<?php echo wp_logout_url( home_url() ); ?>" class="btn-account">Выйти</a>
<?php else : ?>
    <button class="btn-login start_register" id="openLogin">Стать участником / Войти</button>
<?php endif; ?>
						
                    </div>
            </div>
        </div>
        <div class="mobile-menu">
            <div class="mobile-menu-content">
                <div class="mobile-menu-list">
                    <ul>
						<?php if( have_rows('меню', 'option') ): ?>
    						<?php while( have_rows('меню', 'option') ): the_row(); ?>
        						<li><a href="<?php the_sub_field('меню')?>"><?php the_sub_field('название_страницы')?></a></li>
    						<?php endwhile; ?>
						<?php endif; ?>
						<?php if( have_rows('пункт_другое', 'option') ): ?>
    						<?php while( have_rows('пункт_другое', 'option') ): the_row(); ?>
        						<li><a href="<?php the_sub_field('ссылка_на_страницу')?>"><?php the_sub_field('название_страницы')?></a></li>
    						<?php endwhile; ?>
						<?php endif; ?>
                    </ul>
                </div>
                <div class="mobile-menu-socials">
                    <a href="<?php the_field('телеграм', 'option')?>" target = "_blank"><img src="<?php echo get_template_directory_uri() . '/assets/images/telegram-icon.svg' ?> " alt=""></a>
                </div>
                <div class="mobile-menu-button">
                       <div class="login_button start-registration">
						
						<?php if ( is_user_logged_in() ) : ?>
    <a href="http://pokolenie.info/профиль/" class="btn-account">Личный кабинет</a>
<?php else : ?>
    <button class="btn-login start_register" id="openLogin">Стать участником / Войти</button>
<?php endif; ?>
						
                    </div>
                </div>
            </div>
        </div>
        <div class = "desktop_header">
            <div class = "header_flex">
                <div class="header_logo">
                    <a href="/">
                     	<img src = "<?php the_field('логотип', 'option')?>">
                        <p>Всероссийский благотворительный проект по наставничеству для подростков 15-19 лет</p>
                    </a>
                </div>
             <?php
// helper-функции
function get_current_path_only() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443 ? 'https' : 'http';
    $current = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $path = parse_url($current, PHP_URL_PATH);
    return rtrim($path, '/');
}

function path_from_link($link) {
    if (empty($link)) return '';
    // если абсолютный URL — берём path
    if (strpos($link, 'http') === 0) {
        $p = parse_url($link, PHP_URL_PATH);
    } else {
        // относительная ссылка — уже путь
        $p = $link;
        if ($p && $p[0] !== '/') $p = '/' . $p;
    }
    return rtrim($p, '/');
}

$current_path = get_current_path_only();
?>

<div class="header_menu">
    <ul>
        <?php
        $menu_rows = get_field('меню', 'option');
        if ($menu_rows) :
            foreach ($menu_rows as $row) :
                $link = $row['меню'];
                $title = $row['название_страницы'];
                $link_path = path_from_link($link);
                $active_class = ($link_path === $current_path) ? 'active' : '';
                ?>
                <li><a href="<?php echo esc_url($link); ?>" class="<?php echo $active_class; ?>"><?php echo esc_html($title); ?></a></li>
            <?php
            endforeach;
        endif;
        ?>

        <?php
        // sub-menu: заранее получаем все элементы, чтобы проверить, есть ли активный дочерний
        $submenu_items = get_field('пункт_другое', 'option');
        $submenu_parent_active = false;
        if ($submenu_items) {
            foreach ($submenu_items as $si) {
                if (path_from_link($si['ссылка_на_страницу']) === $current_path) {
                    $submenu_parent_active = true;
                    break;
                }
            }
        }
        ?>
        <li class="sub-menu <?php echo $submenu_parent_active ? 'active' : ''; ?>">
            <a href="#">Другое</a>
            <svg width="11" height="8" viewBox="0 0 11 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.5 0.5L5.5 6.5L10.5 0.5" stroke="#797979"/>
            </svg>

            <ul>
                <?php
                if ($submenu_items) :
                    foreach ($submenu_items as $si) :
                        $sublink = $si['ссылка_на_страницу'];
                        $subtitle = $si['название_страницы'];
                        $sub_active = (path_from_link($sublink) === $current_path) ? 'active' : '';
                        ?>
                        <li><a href="<?php echo esc_url($sublink); ?>" class="<?php echo $sub_active; ?>"><?php echo esc_html($subtitle); ?></a></li>
                    <?php
                    endforeach;
                endif;
                ?>
            </ul>
        </li>
    </ul>
</div>
                <div class="header_buttons">
                    <div class="header_tg">
                        <a href="<?php the_field('телеграм', 'option')?>" target = "_blank">
                            <svg width="23" height="19" viewBox="0 0 23 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22.9854 1.6487C22.667 4.98678 21.2881 13.0871 20.5867 16.8259C20.2897 18.4084 19.7049 18.9386 19.1392 18.9906C17.91 19.1035 16.9762 18.18 15.7851 17.4015C13.9215 16.1835 12.8686 15.4257 11.0596 14.2374C8.96856 12.8636 10.3243 12.1091 11.5153 10.8754C11.8272 10.5522 17.245 5.63906 17.35 5.19376C17.3633 5.13769 17.3757 4.92988 17.2516 4.82021C17.1275 4.71053 16.9447 4.74847 16.8132 4.77815C16.6263 4.82021 13.6486 6.78199 7.88168 10.6635C7.03634 11.2424 6.27122 11.5236 5.58469 11.5096C4.82868 11.4931 3.37455 11.0832 2.29347 10.7328C0.96755 10.3031 -0.0862372 10.0755 0.00557628 9.34575C0.0527237 8.9656 0.577963 8.5772 1.58047 8.17973C7.75348 5.49805 11.8694 3.73088 13.929 2.87657C19.8099 0.438235 21.0317 0.0142955 21.8281 0.000276873C22.8259 -0.0172876 23.0666 0.803709 22.9854 1.6487Z" fill="white"/>
                            </svg>                            
                        </a>
                    </div>
                    <div class="login_button start-registration">
						
						<?php if ( is_user_logged_in() ) : ?>
    <a href="<?php echo wp_logout_url( home_url() ); ?>" class="btn-account">Выйти</a>
<?php else : ?>
    <button class="btn-login start_register" id="openLogin">Стать участником / Войти</button>
<?php endif; ?>
						
                    </div>
                </div>
            </div>
        </div>
    </header>
