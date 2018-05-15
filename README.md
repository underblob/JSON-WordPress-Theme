Deprectation Notice
===================

Since the release of [4.7](https://wordpress.org/news/2016/12/vaughan/), WordPress core now includes a [JSON REST API](https://developer.wordpress.org/rest-api/). With this new feature available, I recommend using the built-in API in favor of this **JSON WordPress Theme**.

To start using posts JSON from the new API, send a `GET` request to `/wp-json/wp/v2/posts` on your WordPress site.

For full documentation, see [https://developer.wordpress.org/rest-api/](https://developer.wordpress.org/rest-api/)

JSON WordPress Theme
====================

JSON Theme renders JSON for consumption by AJAX, cURL or other web apps.

The impetus for creating this theme was to get out of the WordPress theming "Loop". WordPress is an almost ubiquitous web publishing platform and the WordPress Admin is easy to use and very intuitive. Creating WordPress themes is not so intuitive. The goal of this theme is to provide a simple way to break out of the theming "Loop" and have direct access to WordPress data structures. Since my brain is already jammed full of ten years of PHP methods, it is simpler for me to create PHP sites instead of constantly searching the WP Codex.

JSON Theme also issues ETags in the header so the response can be cached by your ETag enabled web app until the WordPress content changes.

Unfortunately this theme can't be hosted on WordPress.org since it does not comply with their standards. Ie, themes are expected to render HTML, use the native WordPress methods, widgets, etc. There is an alternate JSON/REST API solution provided as a plugin from WordPress.org that has been developed and implemented for the MOMA site (by someone smarter than me) that is also capable of handling comment submissions:
[http://wordpress.org/extend/plugins/json-api/](http://wordpress.org/extend/plugins/json-api/)


Usage/Examples
--------------

* [`doc/SETUP.md`](doc/SETUP.md) -- Set up the theme in WordPress.
* [`doc/REQUEST-JQUERY.md`](doc/REQUEST-JQUERY.md) -- Request JSON via jQuery AJAX method.
* [`doc/REQUEST-PHP.md`](doc/REQUEST-PHP.md) -- Request JSON from PHP.


JSON Data Structures
--------------------
For structural information on the JSON objects that are returned by the theme,
see the following documents:

* [`doc/json/LINKS.md`](doc/json/LINKS.md) -- The returned object when calling _get-links template.
* [`doc/json/MENUS.md`](doc/json/MENUS.md) -- The returned object when calling _get-menu template.
* [`doc/json/POST-PAGE.md`](doc/json/POST-PAGE.md) -- The returned object when calling any post, page, or category.
* Calling `_get-options` or `_get-blog-info` will return a key/value object of the request.

