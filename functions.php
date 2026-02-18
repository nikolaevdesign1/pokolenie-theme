<?php
/**
 * pokolenie functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pokolenie
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pokolenie_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on pokolenie, use a find and replace
		* to change 'pokolenie' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'pokolenie', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'pokolenie' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'pokolenie_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}






add_action( 'after_setup_theme', 'pokolenie_setup' );
add_filter('show_admin_bar', '__return_false');
add_action( 'init', 'register_post_types' );

function register_post_types(){

	register_post_type( 'coaches', [
		'taxonomies' => [], // post related taxonomies
		'label'  => null,
		'labels' => [
			'name'              => 'coaches', // name for the post type.
			'singular_name'     => 'coaches', // name for single post of that type.
			'add_new'           => 'Add coaches', // to add a new post.
			'add_new_item'      => 'Adding coaches', // title for a newly created post in the admin panel.
			'edit_item'         => 'Edit coaches', // for editing post type.
			'new_item'          => 'New coaches', // new post's text.
			'view_item'         => 'See coaches', // for viewing this post type.
			'search_items'      => 'Search coaches', // search for these post types.
			'not_found'         => 'Not Found', // if search has not found anything.
			'parent_item_colon' => '', // for parents (for hierarchical post types).
			'menu_name'         => 'Наставники', // menu name.
		],
		'description'         => '',
		'public'              => true,
		//'publicly_queryable'  => null, // depends on public
		//'exclude_from_search' => null, // depends on public
		//'show_ui'             => null, // depends on public
		//'show_in_nav_menus'   => null, // depends on public
		'show_in_menu'        => null, // whether to in admin panel menu
		//'show_in_admin_bar'   => null, // depends on show_in_menu.
		'show_in_rest'        => null, // Add to REST API. WP 4.7.
		'rest_base'           => null, // $post_type. WP 4.7.
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-admin-site-alt2',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // Array of additional rights for this post type.
		//'map_meta_cap'      => null, // Set to true to enable the default handler for meta caps.
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor' ], // [ 'title', 'editor', 'author',
														//   'thumbnail', 'excerpt', 'trackbacks',
														//   'custom-fields', 'comments', 'revisions',
														//   'page-attributes', 'post-formats' ]
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	 register_post_type('cases', array(
        'labels' => array(
            'name' => 'Кейсы',
            'singular_name' => 'Кейс'
        ),
        'public' => true,              // показывать в админке
        'publicly_queryable' => false, // отключает фронтовые страницы
        'exclude_from_search' => true, // исключает из поиска
        'show_ui' => true,             // показывать интерфейс в админке
        'show_in_menu' => true,        // показывать в меню админки
        'has_archive' => false,        // отключаем архив
        'rewrite' => false,            // отключаем ЧПУ
        'supports' => array('title','editor', 'thumbnail') // что поддерживает
    ));
	
	 register_post_type('smi', array(
        'labels' => array(
            'name' => 'Сми',
            'singular_name' => 'Сми'
        ),
        'public' => true,              // показывать в админке
        'publicly_queryable' => false, // отключает фронтовые страницы
        'exclude_from_search' => true, // исключает из поиска
        'show_ui' => true,             // показывать интерфейс в админке
        'show_in_menu' => true,        // показывать в меню админки
        'has_archive' => false,        // отключаем архив
        'rewrite' => false,            // отключаем ЧПУ
        'supports' => array('title','editor', 'thumbnail') // что поддерживает
    ));
	
	 register_post_type('material', array(
        'labels' => array(
            'name' => 'Полезные материалы',
            'singular_name' => 'Полезные материалы'
        ),
        'public' => true,              // показывать в админке
        'publicly_queryable' => false, // отключает фронтовые страницы
        'exclude_from_search' => true, // исключает из поиска
        'show_ui' => true,             // показывать интерфейс в админке
        'show_in_menu' => true,        // показывать в меню админки
        'has_archive' => false,        // отключаем архив
        'rewrite' => false,            // отключаем ЧПУ
        'supports' => array('title','editor', 'thumbnail') // что поддерживает
    ));
	
	 register_post_type('live', array(
        'labels' => array(
            'name' => 'Эфиры',
            'singular_name' => 'Эфиры'
        ),
        'public' => true,              // показывать в админке
        'publicly_queryable' => false, // отключает фронтовые страницы
        'exclude_from_search' => true, // исключает из поиска
        'show_ui' => true,             // показывать интерфейс в админке
        'show_in_menu' => true,        // показывать в меню админки
        'has_archive' => false,        // отключаем архив
        'rewrite' => false,            // отключаем ЧПУ
        'supports' => array('title','editor', 'thumbnail') // что поддерживает
    ));
	register_post_type('application', [
    'labels' => [
        'name'          => 'Заявки',
        'singular_name' => 'Заявка',
    ],
    'public'        => false,
    'show_ui'       => true,
    'show_in_menu'  => true,
    'menu_icon'     => 'dashicons-clipboard',
    'supports'      => ['title'],
    'capability_type' => 'post',
]);

}


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pokolenie_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pokolenie_content_width', 640 );
}
add_action( 'after_setup_theme', 'pokolenie_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pokolenie_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'pokolenie' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'pokolenie' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'pokolenie_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pokolenie_scripts() {
	wp_enqueue_style( 'pokolenie-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'pokolenie-style', 'rtl', 'replace' );

	wp_enqueue_script( 'pokolenie-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pokolenie_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function allow_svg_uploads( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'allow_svg_uploads' );




function my_auth_scripts() {
    wp_enqueue_script(
        'my-main-js',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        null,
        true
    );

    wp_localize_script(
        'my-main-js',
        'my_ajax',
        array(
            'url' => admin_url('admin-ajax.php')
        )
    );
}
add_action('wp_enqueue_scripts', 'my_auth_scripts');


/**
 * Обработчик формы popup_zoom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // прямой доступ запрещён
}










function popup_zoom_form_handler() {
    if (!(isset($_POST['save_data']) && is_user_logged_in())) {
        return;
    }

    $user_id  = get_current_user_id();
    $user_key = 'user_' . $user_id;

    // Получаем текущие значения
    $existing_group    = get_field('user', $user_key) ?: [];
    $existing_guardian = get_field('guardian', $user_key) ?: [];

    // -----------------------
    // ТЕКСТОВЫЕ ПОЛЯ USER
    // -----------------------
    $user_map = [
        'name'     => 'name',
        'phone'    => 'phone',
        'date'     => 'birthday',
        'telegram' => 'telegram',
        'vk'       => 'vk',
        'city'     => 'city',
        'email'    => 'email',
    ];

    foreach ($user_map as $post_key => $acf_key) {
        if (isset($_POST[$post_key])) {
            $existing_group[$acf_key] = sanitize_text_field($_POST[$post_key]);
        }
    }

    // -----------------------
    // ТЕКСТОВЫЕ ПОЛЯ GUARDIAN
    // -----------------------
    $guardian_map = [
        'guardian_name'  => 'name',
        'guardian_phone' => 'phone',
        'guardian_email' => 'email',
    ];
    foreach ($guardian_map as $post_key => $acf_key) {
        if (isset($_POST[$post_key])) {
            $existing_guardian[$acf_key] = sanitize_text_field($_POST[$post_key]);
        }
    }

    // -----------------------
    // ФАЙЛЫ
    // -----------------------
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    // --- Passport ---
    if (!empty($_FILES['passport-file']['name'])) {
        // загружаем новый файл
        $attachment_id = media_handle_upload('passport-file', $user_id);
        if (!is_wp_error($attachment_id)) {
            $existing_group['passport'] = $attachment_id;
        }
    } elseif (!empty($_POST['passport-file-delete']) && $_POST['passport-file-delete'] === '1') {
        // удаляем файл
        $existing_group['passport'] = null;
    } elseif (!empty($_POST['passport_current'])) {
        // оставляем старый файл, если ничего не меняли
        $attachment_id = attachment_url_to_postid(esc_url_raw($_POST['passport_current']));
        if ($attachment_id) {
            $existing_group['passport'] = $attachment_id;
        }
    }

    // --- Child Doc ---
    if (!empty($_FILES['passport-reg-file']['name'])) {
        $attachment_id = media_handle_upload('passport-reg-file', $user_id);
        if (!is_wp_error($attachment_id)) {
            $existing_group['child_doc'] = $attachment_id;
        }
    } elseif (!empty($_POST['passport-reg-file-delete']) && $_POST['passport-reg-file-delete'] === '1') {
        $existing_group['child_doc'] = null;
    } elseif (!empty($_POST['passport-reg-current'])) {
        $attachment_id = attachment_url_to_postid(esc_url_raw($_POST['passport-reg-current']));
        if ($attachment_id) {
            $existing_group['child_doc'] = $attachment_id;
        }
    }

    // -----------------------
    // СОХРАНЕНИЕ ВСЕГО
    // -----------------------
    update_field('user', $existing_group, $user_key);
    update_field('guardian', $existing_guardian, $user_key);

    // -----------------------
    // Обновление email WP-пользователя
    // -----------------------
    if (!empty($_POST['email']) && is_email($_POST['email'])) {
        wp_update_user([
            'ID' => $user_id,
            'user_email' => sanitize_email($_POST['email']),
        ]);
    }

    wp_redirect(home_url('/контактные-данные/?saved=1'));
    exit;
}











add_action('template_redirect', 'popup_zoom_form_handler');


function get_age( $birthday ){
	$diff = date( 'Ymd' ) - date( 'Ymd', strtotime($birthday) );
	return substr( $diff, 0, -4 );
}

function GetUserData($userID = false) {

	if(!$userID) $userID = get_current_user_id();
	if(!$userID) return false;

	return [
		'main' => [
			'name' => get_field('name', 'user_'.$userID),
			'is_old' => get_field('is_old', 'user_'.$userID),
			'status' => get_field('status', 'user_'.$userID),
			'amo_id' => get_field('amo_id', 'user_'.$userID)
		],
		'guardian' => get_field('guardian', 'user_'.$userID),
		'user' => get_field('user', 'user_'.$userID),
		'data' => get_field('data', 'user_'.$userID),
	];

}

/**
 * Build contact custom_fields_values for amo CRM (shared by EditedContact and AddLead).
 *
 * @param array  $userData     From GetUserData().
 * @param string $clearedPhone Phone digits only.
 * @return array
 */
function build_amo_contact_custom_fields( $userData, $clearedPhone ) {
	$d = $userData['data'] ?? [];
	$u = $userData['user'] ?? [];
	$g = $userData['guardian'] ?? [];
	$m = $userData['main'] ?? [];
	$is_old_label = ( isset($m['is_old']) && $m['is_old'] === 'yes' ) ? 'Да' : 'Нет';
	$passport_val = $u['passport'] ?? '';
	$passport_val = is_array($passport_val) && ! empty($passport_val['url']) ? $passport_val['url'] : ( is_scalar($passport_val) ? (string) $passport_val : '' );
	$child_doc_val = $u['child_doc'] ?? '';
	$child_doc_val = is_array($child_doc_val) && ! empty($child_doc_val['url']) ? $child_doc_val['url'] : ( is_scalar($child_doc_val) ? (string) $child_doc_val : '' );
	return [
		['field_id' => 173425, 'values' => [['value' => $clearedPhone]]],
		['field_id' => 173427, 'values' => [['value' => trim($u['email'] ?? '')]]],
		['field_id' => 495267, 'values' => [['value' => trim($u['telegram'] ?? '')]]],
		['field_id' => 536525, 'values' => [['value' => trim($u['vk'] ?? '')]]],
		['field_id' => 550455, 'values' => [['value' => trim($u['vk'] ?? '')]]],
		['field_id' => 495259, 'values' => [['value' => trim($u['name'] ?? '')]]],
		['field_id' => 495257, 'values' => [['value' => trim($d['formentor'] ?? '')]]],
		['field_id' => 495263, 'values' => [['value' => trim($u['birthday'] ?? '')]]],
		['field_id' => 528891, 'values' => [['value' => get_age($u['birthday'] ?? '')]]],
		['field_id' => 528903, 'values' => [['value' => trim($u['city'] ?? '')]]],
		['field_id' => 500205, 'values' => [['value' => $is_old_label]]],
		['field_id' => 556051, 'values' => [['value' => trim($g['name'] ?? '')]]],
		['field_id' => 556053, 'values' => [['value' => trim($g['phone'] ?? '')]]],
		['field_id' => 556055, 'values' => [['value' => trim($g['email'] ?? '')]]],
		['field_id' => 550459, 'values' => [['value' => trim($passport_val)]]],
		['field_id' => 550461, 'values' => [['value' => trim($child_doc_val)]]],
		['field_id' => 495265, 'values' => [['value' => trim($d['question_2'] ?? '')]]],
		['field_id' => 531033, 'values' => [['value' => trim($d['question_3'] ?? '')]]],
		['field_id' => 531035, 'values' => [['value' => trim($d['found_name'] ?? '')]]],
		['field_id' => 550457, 'values' => [['value' => trim($d['question_2'] ?? '')]]],
		['field_id' => 550465, 'values' => [['value' => trim($d['question_2'] ?? '')]]],
		['field_id' => 550467, 'values' => [['value' => trim($d['question_3'] ?? '')]]],
		['field_id' => 550469, 'values' => [['value' => trim($d['question_4'] ?? '')]]],
		['field_id' => 550471, 'values' => [['value' => trim($d['question_5'] ?? '')]]],
		['field_id' => 550473, 'values' => [['value' => trim($d['question_6'] ?? '')]]],
		['field_id' => 550475, 'values' => [['value' => trim($d['question_7'] ?? '')]]],
		['field_id' => 550477, 'values' => [['value' => trim($d['question_8'] ?? '')]]],
		['field_id' => 550479, 'values' => [['value' => trim($d['question_9'] ?? '')]]],
		['field_id' => 550481, 'values' => [['value' => trim($d['question_10'] ?? '')]]],
		['field_id' => 550483, 'values' => [['value' => trim($d['question_11'] ?? '')]]],
		['field_id' => 550485, 'values' => [['value' => trim($d['question_12'] ?? '')]]],
		['field_id' => 550487, 'values' => [['value' => trim($d['question_13'] ?? '')]]],
		['field_id' => 550489, 'values' => [['value' => trim($d['question_14'] ?? '')]]],
		['field_id' => 550491, 'values' => [['value' => trim($d['question_15'] ?? '')]]],
	];
}














function getCustomUserFields() {

	$result = [];

	$fields = acf_get_fields(993);

	foreach($fields as $k => $field) {
		if($field['type'] != 'group') continue;
		$result[$field['name']] = $field;
	}

	return $result;

}

/**
 * Ошибка: Telegram-ник не найден или не совпадает (контакт не найден, нет лидов в воронке, только закрытые лиды).
 * TODO: реализовать отображение ошибки в UI.
 */
function show_brief_error_tg_nickname_incorrect() {
    // TODO: реализовать отображение ошибки «Telegram-ник не найден / не совпадает»
}

/**
 * Ошибка: повторная отправка анкеты невозможна (есть активный лид, но не в статусе 833).
 * TODO: реализовать отображение ошибки в UI.
 */
function show_brief_error_refill_disabled() {
    // TODO: реализовать отображение ошибки «Повторная отправка анкеты невозможна»
}

/**
 * Переход в Telegram-бот. Только редирект, без логики AmoCRM.
 * TODO: вызвать при нажатии на кнопку «Перейти в телеграм бот» (например, добавить template_redirect с проверкой $_POST['go_tg_bot']).
 */
function handle_redirect_to_tg_bot() {
    wp_redirect( 'https://t.me/Pokolenez_bot' );
    exit;
}

/**
 * Обработчик «Сохранить» анкету.
 *
 * Флоу:
 * 1. Ищем контакт в AmoCRM по Telegram-нику (user.telegram, с @).
 * 2. Фильтруем лиды контакта по pipeline_id == 9395722.
 * 3. Выбор лида: если есть лид со status_id == 833 — берём его; иначе при наличии активных (не 142/143) — ошибка «повторная отправка невозможна»; иначе ошибка «Telegram-ник неверный».
 * 4. Сохраняем бриф в ACF, создаём CPT application, обновляем контакт и лид в AmoCRM, редирект на /статус/.
 *
 * TODO: вызвать при нажатии на кнопку «Сохранить» (например, template_redirect при isset($_POST['save_brief'])).
 */
function handle_save_brief() {
    if ( ! is_user_logged_in() ) {
        return;
    }

    $user_id = get_current_user_id();
    $user_group = get_field( 'user', 'user_' . $user_id );
    $telegram   = isset( $user_group['telegram'] ) ? trim( (string) $user_group['telegram'] ) : '';
    if ( $telegram === '' ) {
        show_brief_error_tg_nickname_incorrect();
        return;
    }

    require_once $_SERVER['DOCUMENT_ROOT'] . '/amo/AmoClassEA.php';
    $Amo = new AmoClassEA();
    $contact = $Amo->FindContactByTelegram( $telegram );
    if ( ! $contact ) {
        show_brief_error_tg_nickname_incorrect();
        return;
    }

    $all_leads = isset( $contact->_embedded->leads ) ? $contact->_embedded->leads : [];
    $pipeline_id_wanted = 9395722;
    $leads_in_pipeline = array_filter( $all_leads, function ( $lead ) use ( $pipeline_id_wanted ) {
        return isset( $lead->pipeline_id ) && (int) $lead->pipeline_id === $pipeline_id_wanted;
    } );
    $leads_in_pipeline = array_values( $leads_in_pipeline );

    $status_833 = 833;
    $status_142 = 142;
    $status_143 = 143;
    $lead_to_use = null;
    $has_active_not_833 = false;

    foreach ( $leads_in_pipeline as $lead ) {
        $sid = isset( $lead->status_id ) ? (int) $lead->status_id : 0;
        if ( $sid === $status_833 ) {
            $lead_to_use = $lead;
            break;
        }
        if ( $sid !== $status_142 && $sid !== $status_143 ) {
            $has_active_not_833 = true;
        }
    }

    if ( $lead_to_use === null ) {
        if ( count( $leads_in_pipeline ) === 0 ) {
            show_brief_error_tg_nickname_incorrect();
            return;
        }
        if ( $has_active_not_833 ) {
            show_brief_error_refill_disabled();
            return;
        }
        show_brief_error_tg_nickname_incorrect();
        return;
    }

    $notesModifiedFields = '';
    $date_group = get_field( 'data', 'user_' . $user_id );
    if ( ! is_array( $date_group ) ) {
        $date_group = [];
    }
    $allFields = GetCustomUserFields();

    if ( isset( $_POST['formentor'] ) ) {
        $new_val = sanitize_text_field( $_POST['formentor'] );
        if ( isset( $date_group['formentor'] ) && $date_group['formentor'] !== $new_val ) {
            $notesModifiedFields .= "Изменено поле (К какому наставнику) \nСтарое значение: " . $date_group['formentor'] . " \nНовое значение: " . $new_val . "\n\n____________________________\n\n";
        }
        $date_group['formentor'] = $new_val;
    }
    for ( $i = 2; $i <= 15; $i++ ) {
        $field_name = 'question_' . $i;
        if ( isset( $_POST[ $field_name ] ) ) {
            $new_val = sanitize_text_field( $_POST[ $field_name ] );
            if ( isset( $date_group[ $field_name ] ) && $date_group[ $field_name ] !== $new_val ) {
                $itemLabel = '';
                if ( ! empty( $allFields['data']['sub_fields'] ) ) {
                    foreach ( $allFields['data']['sub_fields'] as $fieldItem ) {
                        if ( $fieldItem['name'] === $field_name ) {
                            $itemLabel = $fieldItem['label'];
                            break;
                        }
                    }
                }
                $notesModifiedFields .= "Изменено поле (" . $itemLabel . ") \nСтарое значение: " . ( $date_group[ $field_name ] ?? '' ) . " \nНовое значение: " . $new_val . "\n\n____________________________\n\n";
            }
            $date_group[ $field_name ] = $new_val;
        }
    }
    $date_group['системное_поле'] = '123';
    update_field( 'data', $date_group, 'user_' . $user_id );
    update_field( 'status', 'step1', 'user_' . $user_id );

    $has_previous_applications = get_posts( [
        'post_type'      => 'application',
        'author'         => $user_id,
        'posts_per_page' => 1,
        'fields'         => 'ids',
        'post_status'    => 'any',
    ] );
    $is_first_application = empty( $has_previous_applications );
    $application_type    = $is_first_application ? 'new' : 'update';
    $user_name           = $user_group['name'] ?? '';
    $mentor_name         = $date_group['formentor'] ?? '';

    $application_id = wp_insert_post( [
        'post_type'   => 'application',
        'post_status' => 'publish',
        'post_title'  => ( $is_first_application ? 'Новая заявка' : 'Обновление заявки' ) . ' — ' . $user_name . ' — ' . current_time( 'd.m.Y H:i' ),
    ] );

    if ( ! is_wp_error( $application_id ) && $application_id ) {
        update_post_meta( $application_id, 'app_user', $user_name );
        update_post_meta( $application_id, 'application_type', $application_type );
        update_post_meta( $application_id, 'created_at', current_time( 'mysql' ) );
        update_post_meta( $application_id, 'phone', $user_group['phone'] ?? '' );
        update_post_meta( $application_id, 'email', $user_group['email'] ?? '' );
        update_post_meta( $application_id, 'coach', $mentor_name );
        for ( $i = 3; $i <= 15; $i++ ) {
            $key = 'question_' . $i;
            if ( ! empty( $date_group[ $key ] ) ) {
                update_post_meta( $application_id, $key, sanitize_textarea_field( $date_group[ $key ] ) );
            }
        }
        wp_mail(
            get_option( 'admin_email' ),
            $is_first_application ? 'Новая заявка' : 'Обновление заявки',
            $is_first_application ? 'Поступила новая заявка от ' . $user_name : 'Пользователь отправил обновление заявки: ' . $user_name
        );
    }

    $userData     = GetUserData();
    $clearedPhone = preg_replace( '/[^0-9]/', '', $userData['user']['phone'] ?? '' );
    $customFields = build_amo_contact_custom_fields( $userData, $clearedPhone );

    $Amo->EditedContact( [
        'amo_id'                => $lead_to_use->id,
        'phone'                 => $clearedPhone,
        'first_name'            => trim( $userData['user']['name'] ?? '' ),
        'custom_fields_values'  => $customFields,
        'note'                  => $notesModifiedFields ?: null,
    ] );

    $Amo->EditedLead( [ [
        'id'             => (int) $lead_to_use->id,
        'status_id'      => 75253982,
        'pipeline_id'    => 9395722,
        'tags_to_add'    => [ [ 'name' => 'Анкета отправлена' ] ],
    ] ] );

    wp_redirect( home_url( '/статус/' ) );
    exit;
}


function my_enqueue_scripts() {
    wp_enqueue_script('my-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true);

    wp_localize_script('my-custom-js', 'myData', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'is_user_logged_in' => is_user_logged_in(),
        'profile_url' => home_url('/профиль/')
    ));
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');



// Подключение AJAX-переменных
add_action('wp_enqueue_scripts', function() {
    wp_localize_script('filter-coaches', 'my_ajax', [
        'url' => admin_url('admin-ajax.php')
    ]);
});

// AJAX обработчик
add_action('wp_ajax_filter_coaches', 'filter_coaches');
add_action('wp_ajax_nopriv_filter_coaches', 'filter_coaches');

function filter_coaches() {
    $filters = $_POST['filters'] ?? [];
    $paged   = !empty($filters['paged']) ? intval($filters['paged']) : 1;

    $args = [
        'post_type'      => 'coaches',
        'posts_per_page' => 6,
			    'post_status'    => 'publish', // ← важно
        'paged'          => $paged,
        'meta_query'     => ['relation' => 'AND'],
		
    						'meta_key' => 'is_open',        // ключ ACF поля
    						'orderby' => 'meta_value', // сортировка по числовому значению
    						'order'   => 'DESC',           // сначала отмеченные (1), потом неотмеченные (0)
    ];

    // Фильтр: набор
    if (!empty($filters['is_open'])) {
        $args['meta_query'][] = [
            'key'     => 'is_open',
            'value'   => $filters['is_open'],
            'compare' => '='
        ];
    }

    // Фильтр: регион
    if (!empty($filters['region'])) {
        $args['meta_query'][] = [
            'key'     => 'region',
            'value'   => $filters['region'],
            'compare' => '='
        ];
    }

    // Фильтр: возраст участников
    if (!empty($filters['age_peoples'])) {
        $args['meta_query'][] = [
            'key'     => 'age_peoples',
            'value'   => $filters['age_peoples'],
            'compare' => 'LIKE'
        ];
    }

    // Фильтр: формат
    if (!empty($filters['format'])) {
        $args['meta_query'][] = [
            'key'     => 'format',
  				
			'post_status'    => 'publish', // ← важно
            'value'   => $filters['format'],
            'compare' => '='
        ];
    }

    $loop = new WP_Query($args);
?>
<div class = "coaches_list_flex">
<?php
    if ($loop->have_posts()) {
        while ($loop->have_posts()) {
            $loop->the_post(); ?>

            <a href="<?php echo get_permalink(); ?>" class="coaches_item">
                <div class="coach-image">
                    <img src="<?php the_field('image'); ?>" alt="">
                    <div class="coach_tag">
                        <p>Набор <?php the_field('is_open'); ?></p>
                        <?php if (get_field('format') == 'Online') echo '<p>Online-группа</p>'; ?>
                        <?php if (get_field('format') == 'Offline') echo '<p>Offline-группа</p>'; ?>
                    </div>
                </div>

                <div class="coach_item_container">
                    <div class="coach_content">
						<div class = "title"><?php the_title(); ?></div>

                        <div class="coach_flex">
                            <div class="coach_flex_item">
                                <p>Возраст</p>
                                <p><?php the_field('age'); ?></p>
                            </div>
                            <div class="coach_flex_item">
                                <p>В бизнесе:</p>
                                <p><?php the_field('in_bus'); ?></p>
                            </div>
                            <div class="coach_flex_item">
                                <p>Регион:</p>
                                <p><?php the_field('region'); ?></p>
                            </div>
                            <div class="coach_flex_item">
                                <p>Возраст участников:</p>
                                <p><?php the_field('age_peoples'); ?></p>
                            </div>
                        </div>

                        <div class="coach_decription">
							<div class = "title_h2">Бизнес проекты:</div>
                            <?php if (have_rows('projects')): while (have_rows('projects')): the_row(); ?>
                                <p><?php the_sub_field('text'); ?></p>
                            <?php endwhile; endif; ?>
                        </div>

                        <div class="coach_button">
                            <p>Узнать больше</p>
                        </div>
                    </div>
                </div>
            </a>

        <?php }

        // Новая пагинация
        if ($loop->max_num_pages > 1) {
            echo '<div class="pagination">';
            echo paginate_links([
                'total'      => $loop->max_num_pages,
                'current'    => $paged,
                'format'     => '?paged=%#%',
                'type'       => 'list',
                'prev_text'  => '',
			    'post_status'    => 'publish', // ← важно
                'next_text'  => ''
            ]);
            echo '</div>';
        }

    } else {
        echo "<p>Нет наставников по фильтру</p>";
    } 
	
	
	?>
</div>
	<?php
    wp_reset_postdata();
    wp_die();
}

















// === Функция для создания пустой группы ACF 'user' и 'guardian' ===
function create_default_acf_for_new_user($user_id, $is_old = 'yes', $user_data = [], $guardian_data = []) {
    if( function_exists('update_field') ) {
        // Дефолтные поля для user
        $default_user = [
            'name'      => '',
            'birthday'  => '',
            'age'       => '',
            'phone'     => '',
            'telegram'  => '',
            'vk'        => '',
            'city'      => '',
            'passport'  => null,
            'child_doc' => null,
            'email'     => get_userdata($user_id)->user_email
        ];
        // Объединяем с пришедшими данными из формы
        $default_user = array_merge($default_user, $user_data);

        // Дефолтные поля для guardian
        $default_guardian = [
            'name'  => '',
            'phone' => '',
            'email' => ''
        ];
        $default_guardian = array_merge($default_guardian, $guardian_data);

        // Сохраняем в ACF
        update_field('user', $default_user, 'user_' . $user_id);
        update_field('guardian', $default_guardian, 'user_' . $user_id);
        update_field('is_old', $is_old, 'user_' . $user_id);
    }
}





// === Регистрация обычного пользователя ===
add_action('wp_ajax_nopriv_custom_register', 'custom_register_user');
function custom_register_user() {
    $email    = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($email) || empty($password)) {
        wp_send_json_error(['message' => 'Email и пароль обязательны']);
    }
    if (!is_email($email)) {
        wp_send_json_error(['message' => 'Некорректный email']);
    }
    if (email_exists($email)) {
        wp_send_json_error(['message' => 'Такой email уже зарегистрирован']);
    }

    $username = sanitize_user($email, true);
    $user_id = wp_create_user($username, $password, $email);
    if (is_wp_error($user_id)) {
        wp_send_json_error(['message' => 'Ошибка создания пользователя: ' . $user_id->get_error_message()]);
    }

    // --- Автовход ---
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);

    // --- Собираем данные user и guardian из POST ---
    $user_data = [
        'name'     => sanitize_text_field($_POST['name'] ?? ''),
        'birthday' => sanitize_text_field($_POST['date'] ?? ''),
        'phone'    => sanitize_text_field($_POST['phone'] ?? ''),
        'telegram' => sanitize_text_field($_POST['telegram'] ?? ''),
        'vk'       => sanitize_text_field($_POST['vk'] ?? ''),
        'city'     => sanitize_text_field($_POST['city'] ?? ''),
        'email'    => $email
    ];

    $guardian_data = [
        'name'  => sanitize_text_field($_POST['guardian_name'] ?? ''),
        'phone' => sanitize_text_field($_POST['guardian_phone'] ?? ''),
        'email' => sanitize_text_field($_POST['guardian_email'] ?? '')
    ];

    // --- Создание пустой ACF группы с данными ---
    create_default_acf_for_new_user($user_id, 'yes', $user_data, $guardian_data);

    wp_send_json_success([
        'message'  => 'Регистрация успешна',
        'redirect' => home_url('/профиль/')
    ]);
}






// === Регистрация ребенка ===
add_action('wp_ajax_nopriv_custom_register_child', 'custom_register_child_user');
function custom_register_child_user() {
    $email    = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($email) || empty($password)) {
        wp_send_json_error(['message' => 'Email и пароль обязательны']);
    }
    if (!is_email($email)) {
        wp_send_json_error(['message' => 'Некорректный email']);
    }
    if (email_exists($email)) {
        wp_send_json_error(['message' => 'Такой email уже зарегистрирован']);
    }

    $username = sanitize_user($email, true);
    $user_id = wp_create_user($username, $password, $email);
    if (is_wp_error($user_id)) {
        wp_send_json_error(['message' => 'Ошибка создания пользователя: ' . $user_id->get_error_message()]);
    }

    // --- Автовход ---
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);

    // --- Собираем данные user и guardian из POST ---
    $user_data = [
        'name'     => sanitize_text_field($_POST['name'] ?? ''),
        'birthday' => sanitize_text_field($_POST['date'] ?? ''),
        'phone'    => sanitize_text_field($_POST['phone'] ?? ''),
        'telegram' => sanitize_text_field($_POST['telegram'] ?? ''),
        'vk'       => sanitize_text_field($_POST['vk'] ?? ''),
        'city'     => sanitize_text_field($_POST['city'] ?? ''),
        'email'    => $email
    ];

    $guardian_data = [
        'name'  => sanitize_text_field($_POST['guardian_name'] ?? ''),
        'phone' => sanitize_text_field($_POST['guardian_phone'] ?? ''),
        'email' => sanitize_text_field($_POST['guardian_email'] ?? '')
    ];

    // --- Создание пустой ACF группы с is_old = 'no' ---
    create_default_acf_for_new_user($user_id, 'no', $user_data, $guardian_data);

    wp_send_json_success([
        'message'  => 'Регистрация успешна',
        'redirect' => home_url('/профиль/')
    ]);
}





// === АВТОРИЗАЦИЯ ===
add_action('wp_ajax_nopriv_custom_login', 'custom_login_user');
function custom_login_user() {
    $email    = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($email) || empty($password)) {
        wp_send_json_error(['message' => 'Email и пароль обязательны']);
    }

    $user = get_user_by('email', $email);
    if (!$user) {
       wp_send_json_error(['message' => 'Пользователь с таким email не найден']);
		
    }

    $creds = [
        'user_login'    => $user->user_login,
        'user_password' => $password,
        'remember'      => true,
    ];

    $signon = wp_signon($creds, false);

    if (is_wp_error($signon)) {
        wp_send_json_error(['message' => 'Ошибка входа: ' . $signon->get_error_message()]);
    }

    wp_send_json_success([
        'message'  => 'Вы успешно вошли',
        'redirect' => home_url('/профиль/')
    ]);
}



add_filter('wp_mail_from', function() {
    return 'services@pokolenie.info'; // укажи реальный ящик на своём домене
});
add_filter('wp_mail_from_name', function() {
    return 'Поколение АНО'; // имя, которое будет отображаться в письме
});

// нужно добавить обработчик и для авторизованных пользователей:
add_action('wp_ajax_forgot_password', 'custom_forgot_password_generate');
add_action('wp_ajax_nopriv_forgot_password', 'custom_forgot_password_generate');

function custom_forgot_password_generate() {
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';

    if (empty($email)) {
        wp_send_json_error(['message' => 'Введите email']);
    }

    $user = get_user_by('email', $email);

    if (!$user) {
        wp_send_json_error(['message' => 'Пользователь с таким email не найден']);
    }

    // Генерируем новый пароль
    $new_password = wp_generate_password(12, false);

    // Устанавливаем его пользователю
    wp_set_password($new_password, $user->ID);

    // Отправляем email с новым паролем
    $subject = 'Ваш новый пароль';
    $message = '<p>Здравствуйте!</p><p>Ваш новый пароль для входа: <strong>' . esc_html($new_password) . '</strong></p>';
    $headers = [
        'Content-Type: text/html; charset=UTF-8',
        'From: Поколение АНО <services@pokolenie.info>'
    ];

    // === ОТПРАВКА ===
    $result = wp_mail($email, $subject, $message, $headers);

    if (!$result) {
        // Логируем ошибку в debug.log
        error_log('Ошибка при отправке письма: ' . print_r(error_get_last(), true));
        wp_send_json_error(['message' => 'Ошибка при отправке письма']);
    }

    wp_send_json_success();
}

wp_enqueue_script(
    'quiz-js',
    get_template_directory_uri() . '/assets/js/quiz.js', // путь к твоему файлу
    ['jquery'],
    null,
    true
);

wp_localize_script('quiz-js', 'quiz_ajax', [
    'ajax_url' => admin_url('admin-ajax.php'),
]);

add_action('wp_ajax_send_quiz_form', 'send_quiz_form');
add_action('wp_ajax_nopriv_send_quiz_form', 'send_quiz_form');

function send_quiz_form() {
    // Безопасность
    if (empty($_POST)) {
        wp_send_json_error(['message' => 'Нет данных']);
    }

    // Получаем все данные из формы
    $fields = [
        'ФИО' => sanitize_text_field($_POST['quiz_name'] ?? ''),
        'Возраст' => sanitize_text_field($_POST['quiz_age'] ?? ''),
        'Город' => sanitize_text_field($_POST['quiz_city'] ?? ''),
        'Сколько лет в бизнесе' => sanitize_textarea_field($_POST['quiz_year'] ?? ''),
        'Бизнесы / проекты' => sanitize_textarea_field($_POST['quiz_business'] ?? ''),
        'Доход' => sanitize_text_field($_POST['income_range'] ?? ''),
        'Мотивы участия' => sanitize_textarea_field($_POST['quiz_que1'] ?? ''),
        'Темы выступлений' => sanitize_textarea_field($_POST['quiz_que2'] ?? ''),
        'Время для проекта' => sanitize_text_field($_POST['quiz_que3'] ?? ''),
        'Знакомые наставники' => sanitize_text_field($_POST['quiz_que4'] ?? ''),
        'Откуда узнал' => sanitize_text_field($_POST['quiz_que5'] ?? ''),
        'Telegram' => sanitize_text_field($_POST['quiz_que6'] ?? ''),
        'Телефон' => sanitize_text_field($_POST['quiz_que7'] ?? ''),
    ];

    // Формируем текст письма
    $message = "<h2>Новая анкета наставника</h2><br>";
    foreach ($fields as $key => $value) {
        $message .= "<b>{$key}:</b> " . nl2br($value) . "<br>";
    }

    // Отправляем письмо
    $to = 'soldatova0220@gmail.com';
    $subject = 'Новая анкета наставника с сайта';
    $headers = [
        'Content-Type: text/html; charset=UTF-8',
        'From: Сайт Поколение <no-reply@' . $_SERVER['HTTP_HOST'] . '>'
    ];

    $mail_sent = wp_mail($to, $subject, $message, $headers);

    if ($mail_sent) {
        wp_send_json_success(['message' => 'Форма успешно отправлена!']);
    } else {
        wp_send_json_error(['message' => 'Ошибка при отправке письма']);
    }

    wp_die();
}
