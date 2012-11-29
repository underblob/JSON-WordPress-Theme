<?php
/*

Template Name: Get Links

@desc 	Will retrieve links from WordPress. Can optionally send arguments in querystring. 
@see 	http://codex.wordpress.org/Function_Reference/get_bookmarks

*/

$BBID_JSON 	= new BBID_JSON();
$json 		= $BBID_JSON->getLinks( $_GET );

$etag 	= md5( serialize( $json ) );
header( 'Etag: "' . $etag . '"' );
header( 'Content-type: application/json' );

echo json_encode( $json );

