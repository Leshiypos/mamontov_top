<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_VERSION', '2.8.1' );

if ( ! isset( $content_width ) ) {
	$content_width = 800; // Pixels.
}

if ( ! function_exists( 'hello_elementor_setup' ) ) {
	/**
	 * Set up theme support.
	 *
	 * @return void
	 */
	function hello_elementor_setup() {
		if ( is_admin() ) {
			hello_maybe_update_theme_version_in_db();
		}

		if ( apply_filters( 'hello_elementor_register_menus', true ) ) {
			register_nav_menus( [ 'menu-1' => esc_html__( 'Header', 'hello-elementor' ) ] );
			register_nav_menus( [ 'menu-2' => esc_html__( 'Footer', 'hello-elementor' ) ] );
		}

		if ( apply_filters( 'hello_elementor_post_type_support', true ) ) {
			add_post_type_support( 'page', 'excerpt' );
		}

		if ( apply_filters( 'hello_elementor_add_theme_support', true ) ) {
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'title-tag' );
			add_theme_support(
				'html5',
				[
					'search-form',
					'comment-form',
					'comment-list',
					'gallery',
					'caption',
					'script',
					'style',
				]
			);
			add_theme_support(
				'custom-logo',
				[
					'height'      => 100,
					'width'       => 350,
					'flex-height' => true,
					'flex-width'  => true,
				]
			);

			/*
			 * Editor Style.
			 */
			add_editor_style( 'classic-editor.css' );

			/*
			 * Gutenberg wide images.
			 */
			add_theme_support( 'align-wide' );

			/*
			 * WooCommerce.
			 */
			if ( apply_filters( 'hello_elementor_add_woocommerce_support', true ) ) {
				// WooCommerce in general.
				add_theme_support( 'woocommerce' );
				// Enabling WooCommerce product gallery features (are off by default since WC 3.0.0).
				// zoom.
				add_theme_support( 'wc-product-gallery-zoom' );
				// lightbox.
				add_theme_support( 'wc-product-gallery-lightbox' );
				// swipe.
				add_theme_support( 'wc-product-gallery-slider' );
			}
		}
	}
}
add_action( 'after_setup_theme', 'hello_elementor_setup' );

// wp_dev
add_action( 'after_setup_theme', 'wp_dev_setup_theme');

function wp_dev_setup_theme(){
	if ( function_exists( 'add_image_size' ) ){
		add_image_size( 'avatar', 200, 200, true );	
		add_image_size( 'logo-firm', 5000, 125);
	}

}

function hello_maybe_update_theme_version_in_db() {
	$theme_version_option_name = 'hello_theme_version';
	// The theme version saved in the database.
	$hello_theme_db_version = get_option( $theme_version_option_name );

	// If the 'hello_theme_version' option does not exist in the DB, or the version needs to be updated, do the update.
	if ( ! $hello_theme_db_version || version_compare( $hello_theme_db_version, HELLO_ELEMENTOR_VERSION, '<' ) ) {
		update_option( $theme_version_option_name, HELLO_ELEMENTOR_VERSION );
	}
}

if ( ! function_exists( 'hello_elementor_scripts_styles' ) ) {
	/**
	 * Theme Scripts & Styles.
	 *
	 * @return void
	 */
	function hello_elementor_scripts_styles() {
		$min_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		if ( apply_filters( 'hello_elementor_enqueue_style', true ) ) {
			wp_enqueue_style(
				'hello-elementor',
				get_template_directory_uri() . '/style' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}

		if ( apply_filters( 'hello_elementor_enqueue_theme_style', true ) ) {
			wp_enqueue_style(
				'hello-elementor-theme-style',
				get_template_directory_uri() . '/theme' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}
	}
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_scripts_styles' );

if ( ! function_exists( 'hello_elementor_register_elementor_locations' ) ) {
	/**
	 * Register Elementor Locations.
	 *
	 * @param ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $elementor_theme_manager theme manager.
	 *
	 * @return void
	 */
	function hello_elementor_register_elementor_locations( $elementor_theme_manager ) {
		if ( apply_filters( 'hello_elementor_register_elementor_locations', true ) ) {
			$elementor_theme_manager->register_all_core_location();
		}
	}
}
add_action( 'elementor/theme/register_locations', 'hello_elementor_register_elementor_locations' );

if ( ! function_exists( 'hello_elementor_content_width' ) ) {
	/**
	 * Set default content width.
	 *
	 * @return void
	 */
	function hello_elementor_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'hello_elementor_content_width', 800 );
	}
}
add_action( 'after_setup_theme', 'hello_elementor_content_width', 0 );

if ( is_admin() ) {
	require get_template_directory() . '/includes/admin-functions.php';
}

/**
 * If Elementor is installed and active, we can load the Elementor-specific Settings & Features
*/

// Allow active/inactive via the Experiments
require get_template_directory() . '/includes/elementor-functions.php';

/**
 * Include customizer registration functions
*/
function hello_register_customizer_functions() {
	if ( is_customize_preview() ) {
		require get_template_directory() . '/includes/customizer-functions.php';
	}
}
add_action( 'init', 'hello_register_customizer_functions' );

if ( ! function_exists( 'hello_elementor_check_hide_title' ) ) {
	/**
	 * Check hide title.
	 *
	 * @param bool $val default value.
	 *
	 * @return bool
	 */
	function hello_elementor_check_hide_title( $val ) {
		if ( defined( 'ELEMENTOR_VERSION' ) ) {
			$current_doc = Elementor\Plugin::instance()->documents->get( get_the_ID() );
			if ( $current_doc && 'yes' === $current_doc->get_settings( 'hide_title' ) ) {
				$val = false;
			}
		}
		return $val;
	}
}
add_filter( 'hello_elementor_page_title', 'hello_elementor_check_hide_title' );

if ( ! function_exists( 'hello_elementor_add_description_meta_tag' ) ) {
	/**
	 * Add description meta tag with excerpt text.
	 *
	 * @return void
	 */
	function hello_elementor_add_description_meta_tag() {
		$post = get_queried_object();

		if ( is_singular() && ! empty( $post->post_excerpt ) ) {
			echo '<meta name="description" content="' . esc_attr( wp_strip_all_tags( $post->post_excerpt ) ) . '">' . "\n";
		}
	}
}
add_action( 'wp_head', 'hello_elementor_add_description_meta_tag' );

/**
 * BC:
 * In v2.7.0 the theme removed the `hello_elementor_body_open()` from `header.php` replacing it with `wp_body_open()`.
 * The following code prevents fatal errors in child themes that still use this function.
 */
if ( ! function_exists( 'hello_elementor_body_open' ) ) {
	function hello_elementor_body_open() {
		wp_body_open();
	}
}





function my_custom_block_register_block() {
    // Регистрируем скрипт редактора блока.
    wp_register_script(
        'my-custom-block-editor',
        get_template_directory_uri() . '/my-custom-block.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor' )
    );

    // Регистрируем блок с серверным рендерингом.
    register_block_type( 'hello-elementor/my-custom-block', array(
        'editor_script' => 'my-custom-block-editor',
        'render_callback' => 'my_custom_block_render_callback',
        'attributes' => array(
            'content' => array(
                'type' => 'string',
                'default' => 'Hello World!',
            ),
        ),
    ) );

	// Регистрация PostType Отзывы
	   //Команда
	   register_post_type( 'reviews', array(
		'labels'             => array(
			'name'                  => 'Отзывы',
			'singular_name'         => 'Отзыв',
			'add_new'               => 'Добавить отзыв',
			'edit_item'               => 'Редактировать отзыв',

		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'team' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 7,
		'menu_icon'          => 'dashicons-format-status',
		'supports'           => array( 'title', 'editor'),
		'taxonomies'          => ['position'],
	) );
 
   //Register Taxonomy
	register_taxonomy(
		'position',
		'reviews',
		array(
			'label' => 'Позиция',
			'rewrite' => array( 'slug' => 'position' ),
			'hierarchical' => true,
		)
	);
}

add_action( 'init', 'my_custom_block_register_block' );

function my_custom_block_render_callback( $attributes ) {
    return sprintf( '<p>%s</p>', esc_html( $attributes['content'] ) );
}






add_action( 'wpcf7_mail_sent', 'your_wpcf7_mail_sent_function' );
function your_wpcf7_mail_sent_function( $contact_form ) {
   // Подключаемся к серверу CRM
   define('CRM_HOST', 'ego-agency.bitrix24.ru'); // Ваш домен CRM системы
   define('CRM_PORT', '443'); // Порт сервера CRM. Установлен по умолчанию
   define('CRM_PATH', '/crm/configs/import/lead.php'); // Путь к компоненту lead.rest
   // Авторизуемся в CRM под необходимым пользователем:
   // 1. Указываем логин пользователя Вашей CRM по управлению лидами
   define('CRM_LOGIN', 'v.grudtsina@mamontov.top');
   // 2. Указываем пароль пользователя Вашей CRM по управлению лидами
   define('CRM_PASSWORD', 'ObmN%+DC1d');
   // Перехватываем данные из Contact Form 7
   $title = $contact_form->title;
   $posted_data = $contact_form->posted_data;

   // Вместо "Форма кейсов" необходимо указать название вашей контактной формы
   if ('Форма кейсов' == $title ) {
       $submission = WPCF7_Submission::get_instance();
       $posted_data = $submission->get_posted_data();
       // Далее перехватываем введенные данные в полях Contact Form 7:
       // 1. Перехватываем поле [your-name]
       $firstName = $posted_data['text-name'];
       // 2. Перехватываем поле [your-message]
       $message = $posted_data['text-223']; 
       // 3. Перехватываем поле [your-message]
       $phone = $posted_data['tel-number']; 
       // 4. Перехватываем поле [your-message]
       $utm = $posted_data['utm_campaign']; 
       $clientId = $posted_data['metka_clientId']; 
       $clientGaId = $posted_data['ga_clientId']; 

	   $url_page = $posted_data['url_page']; //Отправляет URL страницы, с которой отправлена форма 
	   $title_page = $posted_data['title_page']; //Отправляет Заголовок страницы, с которой отправлена форма 

	   $utm_source = $posted_data['utm_source'];
	   $utm_medium = $posted_data['utm_medium'];
	   $utm_compaign = $posted_data['utm_compaign'];
	   $utm_content = $posted_data['utm_content'];
	   $utm_term = $posted_data['utm_term'];

	//    $utm_source = 'test';
	//    $utm_medium = 'test';
	//    $utm_compaign = 'test';
	//    $utm_content = 'test';
	//    $utm_term = 'test';

	   $comments = '
		'.$message.';
		адрес страницы отправления: '.$url_page.';
		название страницы: '.$title_page.';
		utm_source: '.$utm_source.';
		utm_medium: '.$utm_medium.';
		utm_compaign: '.$utm_compaign.';
		utm_content: '.$utm_content.';
		utm_term: '.$utm_term.';

		_ga
		'.$clientGaId.'

		metrika_client_id
		'.$clientId.'
	   ';
       // Формируем параметры для создания лида в переменной $postData = array
       $postData = array(
          // Устанавливаем название для заголовка лида
          'TITLE' => 'Лид с сайта mamontov.top',
		  'CURRENCY_ID' => "RUB",
		  'UTM_SOURCE' => $utm_source,
		  'UTM_MEDIUM' => $utm_medium,
		  'UTM_CAMPAIGN' => $utm_compaign,
		  'UTM_CONTENT' => $utm_content,
		  'UTM_TERM' => $utm_term,
          'UF_CRM_1690289722' => $firstName,
          'UF_CRM_1720192398885' => $utm,
          'UF_CRM_1720711539228' => $clientGaId,
		  'UTM' => $utm,
		  'UF_CRM_1690190628' => $clientId,
          'SOURCE_ID' => 'WEB',
          'PHONE_WORK' => $phone,
          'COMMENTS' => $comments,
       );
       // Передаем данные из Contact Form 7 в Bitrix24
       if (defined('CRM_AUTH')) {
          $postData['AUTH'] = CRM_AUTH;
       } else {
          $postData['LOGIN'] = CRM_LOGIN;
          $postData['PASSWORD'] = CRM_PASSWORD;
       }
       $fp = fsockopen("ssl://".CRM_HOST, CRM_PORT, $errno, $errstr, 30);
       if ($fp) {
          $strPostData = '';
          foreach ($postData as $key => $value)
             $strPostData .= ($strPostData == '' ? '' : '&').$key.'='.urlencode($value);
          $str = "POST ".CRM_PATH." HTTP/1.0\r\n";
          $str .= "Host: ".CRM_HOST."\r\n";
          $str .= "Content-Type: application/x-www-form-urlencoded\r\n";
          $str .= "Content-Length: ".strlen($strPostData)."\r\n";
          $str .= "Connection: close\r\n\r\n";
          $str .= $strPostData;
          fwrite($fp, $str);
          $result = '';
          while (!feof($fp))
          {
             $result .= fgets($fp, 128);
          }
          fclose($fp);
          $response = explode("\r\n\r\n", $result);
          $output = '<pre>'.print_r($response[1], 1).'</pre>';


       } else {
          echo 'Connection Failed! '.$errstr.' ('.$errno.')';
       }
    }
	// Вместо "Форма много заявок, мало продаж" необходимо указать название вашей контактной формы
	if ('Форма много заявок, мало продаж' == $title ) {
		$submission = WPCF7_Submission::get_instance();
		$posted_data = $submission->get_posted_data();
		// Далее перехватываем введенные данные в полях Contact Form 7:
		// 3. Перехватываем поле [your-message]
		$phone = $posted_data['tel-299']; 
		// 4. Перехватываем поле [your-message]
		$utm = $posted_data['utm_campaign']; 
		$clientId = $posted_data['metka_clientId']; 
		$clientGaId = $posted_data['ga_clientId']; 

		$url_page = $posted_data['url_page']; //Отправляет URL страницы, с которой отправлена форма 
		$title_page = $posted_data['title_page']; //Отправляет Заголовок страницы, с которой отправлена форма 

		
		$utm_source = $posted_data['utm_source'];
		$utm_medium = $posted_data['utm_medium'];
		$utm_compaign = $posted_data['utm_compaign'];
		$utm_content = $posted_data['utm_content'];
		$utm_term = $posted_data['utm_term'];

		// $utm_source = 'test';
		// $utm_medium = 'test';
		// $utm_compaign = 'test';
		// $utm_content = 'test';
		// $utm_term = 'test';


		$comments = '
		адрес страницы отправления: '.$url_page.';
		название страницы: '.$title_page.';
		utm_source: '.$utm_source.';
		utm_medium: '.$utm_medium.';
		utm_compaign: '.$utm_compaign.';
		utm_content: '.$utm_content.';
		utm_term: '.$utm_term.';

		_ga
		'.$clientGaId.'

		metrika_client_id
		'.$clientId.'

	   ';
		// Формируем параметры для создания лида в переменной $postData = array
		$postData = array(
		   // Устанавливаем название для заголовка лида
		   'TITLE' => 'Лид с сайта mamontov.top',
		   'CURRENCY_ID' => "RUB",
		   'UTM_SOURCE' => $utm_source,
		   'UTM_MEDIUM' => $utm_medium,
		   'UTM_CAMPAIGN' => $utm_compaign,
		   'UTM_CONTENT' => $utm_content,
		   'UTM_TERM' => $utm_term,
		   'UF_CRM_1720192398885' => $utm,
		   'UF_CRM_1720711539228' => $clientGaId,
		   'UTM' => $utm,
		   'UF_CRM_1690190628' => $clientId,
		   'SOURCE_ID' => 'WEB',
		   'PHONE_WORK' => $phone,
		   'COMMENTS' => $comments,
		);
		// Передаем данные из Contact Form 7 в Bitrix24
		if (defined('CRM_AUTH')) {
		   $postData['AUTH'] = CRM_AUTH;
		} else {
		   $postData['LOGIN'] = CRM_LOGIN;
		   $postData['PASSWORD'] = CRM_PASSWORD;
		}
		$fp = fsockopen("ssl://".CRM_HOST, CRM_PORT, $errno, $errstr, 30);
		if ($fp) {
		   $strPostData = '';
		   foreach ($postData as $key => $value)
			  $strPostData .= ($strPostData == '' ? '' : '&').$key.'='.urlencode($value);
		   $str = "POST ".CRM_PATH." HTTP/1.0\r\n";
		   $str .= "Host: ".CRM_HOST."\r\n";
		   $str .= "Content-Type: application/x-www-form-urlencoded\r\n";
		   $str .= "Content-Length: ".strlen($strPostData)."\r\n";
		   $str .= "Connection: close\r\n\r\n";
		   $str .= $strPostData;
		   fwrite($fp, $str);
		   $result = '';
		   while (!feof($fp))
		   {
			  $result .= fgets($fp, 128);
		   }
		   fclose($fp);
		   $response = explode("\r\n\r\n", $result);
		   $output = '<pre>'.print_r($response[1], 1).'</pre>';
 
 
		} else {
		   echo 'Connection Failed! '.$errstr.' ('.$errno.')';
		}
	 }
 
	 // Вместо "Бесплатный аудит" необходимо указать название вашей контактной формы
 if ('Бесплатный аудит' == $title ) {
	$submission = WPCF7_Submission::get_instance();
	$posted_data = $submission->get_posted_data();
	// Далее перехватываем введенные данные в полях Contact Form 7:
	// 3. Перехватываем поле [your-message]
	$phone = $posted_data['tel-numberaudit']; 
	// 4. Перехватываем поле [your-message]
	$utm = $posted_data['utm_campaign']; 
	$clientId = $posted_data['metka_clientId']; 
	$clientGaId = $posted_data['ga_clientId'];

	$url_page = $posted_data['url_page']; //Отправляет URL страницы, с которой отправлена форма 
	$title_page = $posted_data['title_page']; //Отправляет Заголовок страницы, с которой отправлена форма  

	
	$utm_source = $posted_data['utm_source'];
	$utm_medium = $posted_data['utm_medium'];
	$utm_compaign = $posted_data['utm_compaign'];
	$utm_content = $posted_data['utm_content'];
	$utm_term = $posted_data['utm_term'];

	// $utm_source = 'test';
	// $utm_medium = 'test';
	// $utm_compaign = 'test';
	// $utm_content = 'test';
	// $utm_term = 'test';


	$comments = '
	адрес страницы отправления: '.$url_page.';
	название страницы: '.$title_page.';
	utm_source: '.$utm_source.';
	utm_medium: '.$utm_medium.';
	utm_compaign: '.$utm_compaign.';
	utm_content: '.$utm_content.';
	utm_term: '.$utm_term.';

	_ga
	'.$clientGaId.'

	metrika_client_id
	'.$clientId.'

   ';
	// Формируем параметры для создания лида в переменной $postData = array
	$postData = array(
	   // Устанавливаем название для заголовка лида
	   'TITLE' => 'Лид с сайта mamontov.top',
	   'CURRENCY_ID' => "RUB",
	   'UTM_SOURCE' => $utm_source,
	   'UTM_MEDIUM' => $utm_medium,
	   'UTM_CAMPAIGN' => $utm_compaign,
	   'UTM_CONTENT' => $utm_content,
	   'UTM_TERM' => $utm_term,
	   'UF_CRM_1720192398885' => $utm,
	   'UF_CRM_1720711539228' => $clientGaId,
	   'UTM' => $utm,
	   'UF_CRM_1690190628' => $clientId,
	   'SOURCE_ID' => 'WEB',
	   'PHONE_WORK' => $phone,
	   'COMMENTS' => $comments,
	);
	// Передаем данные из Contact Form 7 в Bitrix24
	if (defined('CRM_AUTH')) {
	   $postData['AUTH'] = CRM_AUTH;
	} else {
	   $postData['LOGIN'] = CRM_LOGIN;
	   $postData['PASSWORD'] = CRM_PASSWORD;
	}
	$fp = fsockopen("ssl://".CRM_HOST, CRM_PORT, $errno, $errstr, 30);
	if ($fp) {
	   $strPostData = '';
	   foreach ($postData as $key => $value)
		  $strPostData .= ($strPostData == '' ? '' : '&').$key.'='.urlencode($value);
	   $str = "POST ".CRM_PATH." HTTP/1.0\r\n";
	   $str .= "Host: ".CRM_HOST."\r\n";
	   $str .= "Content-Type: application/x-www-form-urlencoded\r\n";
	   $str .= "Content-Length: ".strlen($strPostData)."\r\n";
	   $str .= "Connection: close\r\n\r\n";
	   $str .= $strPostData;
	   fwrite($fp, $str);
	   $result = '';
	   while (!feof($fp))
	   {
		  $result .= fgets($fp, 128);
	   }
	   fclose($fp);
	   $response = explode("\r\n\r\n", $result);
	   $output = '<pre>'.print_r($response[1], 1).'</pre>';


	} else {
	   echo 'Connection Failed! '.$errstr.' ('.$errno.')';
	}
 }

}


class Header_Walker_Nav_Menu extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = NULL ) {
		$output .= '<div class="dropdownWrap"><ul class="submenu dropdown sub-menu">';
	}

	function start_el( &$output, $item, $depth = 0, $args = NULL, $id = 0 ) {
		//global $wp_query;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		if ($args->walker->has_children) {
			$classes[] = 'has-dropdown';
		}

		// функция join превращает массив в строку
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		// атрибуты элемента, title="", rel="", target="" и href=""
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		// ссылка и околоссылочный текст
		$item_output = $args->before;
		if ($args->walker->has_children) {
			$item_output .= '<span class="opener"><a class="opener__link" data-title="'. $item->title .'" '. $attributes .'>';
		} else {
			$item_output .= '<span class="opener"><a class="opener__link" data-title="'. $item->title .'" '. $attributes .'>';
		}

		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

		if ($args->walker->has_children) {
			$item_output .= '</a><svg width="8" height="14" viewBox="0 0 8 14" fill="none"
			xmlns="http://www.w3.org/2000/svg">
			<path d="M7 13L1 7L7 1" stroke="#000000" stroke-width="1" stroke-linecap="round"
				stroke-linejoin="round" />
		</svg></span>';
		} else {
			$item_output .= '</a></span>';
		}

		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}



// свой класс построения меню:
class Footer_Walker_Nav_Menu extends Walker_Nav_Menu {

	// add classes to ul sub-menus
	function start_lvl( &$output, $depth = 0, $args = NULL ) {
		// depth dependent classes
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'sub-menu',
			( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
			( $display_depth >=2 ? 'sub-sub-menu' : '' ),
			'menu-depth-' . $display_depth
		);
		$class_names = implode( ' ', $classes );

		// build html
		$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
	}

	// add main/sub classes to li's and links
	function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
		global $wp_query;

		// Restores the more descriptive, specific name for use within this method.
		$item = $data_object;

		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

		// depth dependent classes
		$depth_classes = array(
			( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
			( $depth >=2 ? 'sub-sub-menu-item' : '' ),
			( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
			'menu-item-depth-' . $depth
		);
		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

		// passed classes
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

		// build html
		$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '"><span class="opener">';

		// link attributes
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

		$item_output = sprintf( '%1$s<a class="opener__link" data-title="%3$s%4$s%5$s" %2$s>%3$s%4$s%5$s</a></span>%6$s',
			$args->before,
			$attributes,
			$args->link_before,
			apply_filters( 'the_title', $item->title, $item->ID ),
			$args->link_after,
			$args->after
		);

		// build html
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

}


