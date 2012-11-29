<?php
/*

Template Name: Get Menu

@desc 	Prints out JSON of the menu location sent in querystring after a page is set up in WP Admin.
		Menu slugs are set in functions.php
		Example: /my-menus/?menu1
@see http://ub4.underblob.com/wordpress-menu-posts/
@see http://codex.wordpress.org/Function_Reference/register_nav_menus

*/

$BBID_JSON 	= new BBID_JSON();
$BBID_JSON->setCurrentMenu( $_SERVER[ 'QUERY_STRING' ] );
$json 		= $BBID_JSON->getMenu();

$etag 	= md5( serialize( $json ) );
header( 'Etag: "' . $etag . '"' );
header( 'Content-type: application/json' );

echo json_encode( $json );

