JSON WordPress Theme
=========================

JSON Theme renders JSON for consumption by AJAX, cURL or other web apps.

The impetus for creating this theme was to get out of the WordPress theming "Loop". WordPress is an almost ubiquitous web publishing platform and the WordPress Admin is easy to use and very intuitive. Creating WordPress themes is not so intuitive. The goal of this theme is to provide a simple way to break out of the theming "Loop" and have direct access to WordPress data structures. Since my brain is already jammed full of ten years of PHP methods, it is simpler for me to create PHP sites instead of constantly searching the WP Codex. 

JSON Theme also issues ETags in the header so the response can be cached by your ETag enabled web app until the WordPress content changes.

Unfortunately this theme can't be hosted on WordPress.org since it does not comply with their standards. Ie, themes are expected to render HTML, use the native WordPress methods, widgets, etc. There is an alternate JSON/REST API solution provided as a plugin from WordPress.org that has been developed and implemented for the MOMA site (by someone smarter than me) that is also capable of handling comment submissions:  
[http://wordpress.org/extend/plugins/json-api/](http://wordpress.org/extend/plugins/json-api/)


Usage/Examples
--------------
* `doc/SETUP.md` -- Set up the theme in WordPress.
* `doc/REQUEST-JQUERY.md` -- Request JSON via jQuery AJAX method.
* `doc/REQUEST-PHP.md` -- Request JSON from PHP.


JSON Data Structures
--------------------
For structural information on the JSON objects that are returned by the theme, 
see the following documents:

* `doc/json-structures/LINKS.md` -- The returned object when calling _get-links template.
* `doc/json-structures/MENUS.md` -- The returned object when calling _get-menu template.
* `doc/json-structures/POST-PAGE` -- The returned object when calling any post, page, or category.
* Calling `_get-options` or `_get-blog-info` will return a key/value object of the request.

