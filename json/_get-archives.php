<?php
/*

Template Name: Get Archives

@desc 	Will print wp_get_archives as JSON. Will take parameters passed in querystring.
		Example: 	Create a page with the slug 'get-archives' and make it a 'Get Archives' template.
					Call the page with the following URL: get-archives/?type=monthly

@see https://developer.wordpress.org/reference/functions/wp_get_archives/

*/

$BBID_JSON 	= new BBID_JSON();
$json 		= $BBID_JSON->getArchives();

$etag 	= md5( serialize( $json ) );
header( 'Etag: "' . $etag . '"' );
header( 'Content-type: application/json' );

echo json_encode( $json );

