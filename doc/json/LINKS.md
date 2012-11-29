JSON WordPress Theme
====================

Links WP Object Structure
-------------------------

Following is reference structure for the JSON object returned by a call to the `get-links` Template.

```javascript
	[
		{
			link_id: 			string "int",
			link_url: 			string,
			link_name: 			string,
			link_image: 		string,
			link_target: 		string,
			link_description: 	string,
			link_visible: 		string,
			link_owner: 		string "int",
			link_rating: 		string "int",
			link_updated: 		string,
			link_rel: 			string,
			link_notes: 		string,
			link_rss: 			string
		}
	]
```
