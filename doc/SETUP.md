JSON WordPress Theme
=========================
Set Up The Theme In WordPress
-----------------------------
  
  
Assumptions
-----------
These examples assume you have two different domains/subdomains: one for JSON data, one for your website.  


Examples Keys
-------------
`{{YOUR_WP_JSON_INSTALL}}` -- This represents the file path where you installed WordPress on your server.  
`http://your-wp-json` -- This represents the URL to your WordPress site with JSON Theme.  


Installation/Configuration
--------------------------
1. Download the zip, unzip, and upload the `json` folder to your WordPress installation:  
`{{YOUR_WP_JSON_INSTALL}}/wp-content/themes/`
2. You should end up with a folder path like this:
`{{YOUR_WP_JSON_INSTALL}}/wp-content/themes/json`
3. Go to the WordPress admin on your site and login: `http://your-wp-json/wp-admin`  
4. Enable permalinks: `Settings -> Permalinks -> Post Name`  
Don't forget to `Save Changes`.  
5. Enable the theme in WP Admin: `Appearance -> Themes -> JSON -> Activate`  
6. Create Pages for the Templates. This example will be for `_get-blog-info.php` (Get Blog Info)
	* `Pages -> Add New`
	* Set the page title as `Get Blog Info`
	* In the `Page Attributes` in the right sidebar, set the template as `Get Blog Info`
	* Ensure that the permalink reads `http://your-wp-json/get-blog-info`
	* Click the `Publish` button in the right sidebar.
	* Repeat these steps for 
		* `_get-links.php` (Get Links) -- permalink: `http://your-wp-json/get-links`  
		* `_get-menu.php` (Get Menu) -- permalink: `http://your-wp-json/get-menu`  
		* `_get-options.php` (Get Options) -- permalink: `http://your-wp-json/get-options`  
7. If you go to your site in your browser (`http://your-wp-json`), you should see a bunch of goobery JSON data. To render JSON in your browser more legibly, try one of these extensions:  
	* Firefox: `Tools -> Add-ons -> Search: JSONView`  
	* Chrome: `https://chrome.google.com/webstore/category/extensions?hl=en-US` Search for `JSONView`  

