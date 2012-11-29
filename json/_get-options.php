<?php
/*

Template Name: Get Options

@desc 	Will retrieve options from WordPress when sent in semicolon delimited list in the querystring.
		Example: 	Create a page with the slug 'my-options' and make it a 'Get Options' template in WP Admin.
					Call the page with the following URL: my-options/?page_on_front;page_for_posts;posts_per_page
					Will print a JSON object with the options as entered into WordPress Settings in the WP Admin.
@see http://codex.wordpress.org/Option_Reference

*/

$BBID_JSON 	= new BBID_JSON();
$json 		= $BBID_JSON->getOptions( $_SERVER[ 'QUERY_STRING' ] );

$etag 	= md5( serialize( $json ) );
header( 'Etag: "' . $etag . '"' );
header( 'Content-type: application/json' );

echo json_encode( $json );

