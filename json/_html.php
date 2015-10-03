<?php
/*

Template Name: HTML Page

@desc 	Will print out a blank page for HTML that can be used in an iframe. This is helpful for forms, widgets,
		shortcodes that collect user comments and user subscriptions. The page that this template is assigned
		to can optionally have a Custom Field of html_css_url added to it to customize the render with external CSS.

*/

the_post();

$custom_fields 	= get_post_custom( $post->ID );
$html_css_url 	= isset( $custom_fields[ 'html_css_url' ][ 0 ] )
	? $custom_fields[ 'html_css_url' ][ 0 ]
	: ''
;

?><!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="robots" content="noindex,nofollow" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<? if ( $html_css_url ) : ?>

		<link rel="stylesheet" type="text/css" href="<?=$html_css_url ?>" />

	<? endif ?>

	<?php wp_head(); ?>

</head>

<body
	id="<?=$post->post_name ?>"
	<?php body_class(); ?>
>

	<div class="title">
		<? the_title() ?>
	</div>

	<div class="content">
		<? the_content() ?>
	</div>

</body>
