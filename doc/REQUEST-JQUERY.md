JSON WordPress Theme
====================
Request JSON Via AJAX Using jQuery
----------------------------------
  
  
Assumptions
-----------
These examples assume you have two different domains/subdomains:  
one for JSON data, one for your website.  


Examples Keys
-------------
`{{YOUR_WP_JSON_INSTALL}}` -- This represents the file path where you installed WordPress on your server.  
`http://your-wp-json` -- This represents the URL to your WordPress site with JSON Theme.  
  
`http://your-website` -- This represents the website where your HTML, Javascript, PHP, CSS, etc. reside.  


jQuery Example
---------------
To retrieve a page/post/category, replace `post-page-or-category-slug` in the following example with the actual page slug, post slug, or category slug that you want to retrieve:
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
