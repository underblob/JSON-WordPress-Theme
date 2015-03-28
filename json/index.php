<?php

$BBID_JSON 	= new BBID_JSON();
$BBID_JSON->updateQueryPosts();

$json 		= array();

if (! is_404() ) {

	while ( have_posts() ) {
		the_post();
		$post 		= $BBID_JSON->getPostExtras( $post );
		$json[] 	= $post;
	}
}

$etag 	= md5( serialize( $json ) );
header( 'Etag: "' . $etag . '"' );
header( 'Content-type: application/json' );
echo json_encode( $json );

