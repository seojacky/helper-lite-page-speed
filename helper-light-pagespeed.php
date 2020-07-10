<?php
/*
 * Plugin name: PageSpeed Helper by Big_Jacky
 * Description: Плагин создан по мотивам докладов Demi Murych и добавляет некоторые хаки для прохождения теста PageSpeed от Google | <a href="http://https://t.me/big_jacky" target="blank_">Автор</a> | <a href="http://https://github.com/seojacky/pagespeed-helper-by-big-jacky" target="blank_">О плагине</a>
 * Version: 1.2
 * Author: @big_jacky 
 * Author URI: https://t.me/big_jacky
 * Plugin URI: https://github.com/seojacky/pagespeed-helper-by-big-jacky
 * GitHub Plugin URI: https://github.com/seojacky/pagespeed-helper-by-big-jacky
*/
/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

add_filter( 'widget_custom_html_content', 'add_async_and_lazy', 10 );
add_filter( 'widget_text', 'add_async_and_lazy', 10 );
add_filter('the_content','add_async_and_lazy');
function add_async_and_lazy($content) {
    $content = str_replace('<img','<img decoding="async" loading="lazy"', $content);
    return $content;
}

function add_async_and_lazy_to_attachment_image( $attributes ) {
  $attributes['decoding'] = 'async';
	if(!isset($attributes['loading']) || $attributes['loading'] != 'lazy') {
		$attributes['loading'] = 'lazy';
	} 
  return $attributes;
}
add_filter( 'wp_get_attachment_image_attributes', 'add_async_and_lazy_to_attachment_image', 90 );
?>
