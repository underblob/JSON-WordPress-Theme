JSON WordPress Theme
=========================
Request JSON From PHP Using cURL
--------------------------------

___

  
In the example below, `http://your-wp-json` represents the URL to your WordPress site with JSON Theme.

cURL is the best option to retrieve the JSON. It also works with the `file_get_contents` method but cURL is faster and more configurable. When retrieving your JSON, be sure that you are using a full URL with `http://` at the beginning. It needs to be an HTTP request so that the querystring can be parsed and the `.htaccess` can rewrite the permalinks.

```php
function getCurlContent( $json_url, $headers_only = false ) {
	$curl_options 	= array(
		CURLOPT_URL 			=> $json_url,
		CURLOPT_FOLLOWLOCATION 	=> true,
		CURLOPT_HEADER 			=> $headers_only,
		CURLOPT_NOBODY 			=> $headers_only,
		CURLOPT_RETURNTRANSFER 	=> true,
		CURLOPT_BINARYTRANSFER 	=> true,
		CURLOPT_SSL_VERIFYPEER 	=> false
	);
	$curl_session 	= curl_init();
	curl_setopt_array( $curl_session, $curl_options );

	if ( ! $content = curl_exec( $curl_session ) ) {
		echo 'cURL error: ' . curl_error( $curl_session );
	} else {
		return $content;
	}
}

$my_json 	= getCurlContent( 'http://my-wp-json/category/post-slug');
```