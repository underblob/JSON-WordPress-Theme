JSON WordPress Theme
====================
Request JSON Via AJAX Using jQuery
----------------------------------

___


In the example below, `http://your-wp-json` represents the URL to your WordPress site with JSON Theme.

To retrieve a page/post/category, replace `post-page-or-category-slug` in the following example with an actual page slug, post slug, or category slug from your WordPress site with JSON Theme that you want to retrieve:
```javascript
var jsonUrl = 'http://your-wp-json/post-page-or-category-slug';
$.ajax( {
	'url' : jsonUrl,
	'success' : function( data ) {
		myFunctionThatDoesSomethingWithTheData( data );
	}
);

function myFunctionThatDoesSomethingWithTheData( data ) {
	// Here's where the JSON object comes back as the "data" variable.
	// Go to town on it.
}
```
@see http://api.jquery.com/jQuery.ajax/
