<?php
/*

Template Name: Get Blog Info

@desc 	Will retrieve blog info values from WordPress when sent in semicolon delimited list in the querystring.
		Example: 	Create a page with the slug 'my-blog-info' and make it a 'Get Blog Info' template. 
					Call the page with the following URL: my-blog-info/?name;description;admin_email
					Will print a JSON object with the name, description, and admin_email as entered into WordPress.
@see http://codex.wordpress.org/Function_Reference/get_bloginfo

*/

$BBID_JSON 	= new BBID_JSON();
$json 		= $BBID_JSON->getBlogInfo( $_SERVER[ 'QUERY_STRING' ] );

$etag 	= md5( serialize( $json ) );
header( 'Etag: "' . $etag . '"' );
header( 'Content-type: application/json' );

echo json_encode( $json );

