JSON WordPress Theme
====================

Post/Page WP Object Structures
------------------------------

Following is reference structure for the JSON object returned by a request for a Page or Posts.

```javascript
	[
		{
			ID: 				int,
			post_author: 		string "int",
			post_date: 			string,
			post_date_gmt: 		string,
			post_content: 		string,
			post_title: 		string,
			post_excerpt: 		string,
			post_status: 		string,
			comment_status: 	string,
			ping_status: 		string,
			post_password: 		string,
			post_name: 			string,
			to_ping: 			string,
			pinged: 			string,
			post_modified: 		string,
			post_modified_gmt: 	string,
			post_content_filtered: string,
			post_parent: 		int,
			guid: 				string "url",
			menu_order: 		int,
			post_type: 			string,
			post_mime_type: 	string,
			comment_count: 		string "int",
			ancestors: [
				int
			],
			filter: 			string,
			post_html: 			string,
			custom_fields: {
				"field_name": 	string "value"
			},
			media_attachments: [
				{
					description: 	string,
					title: 			string,
					caption: 		string,
					mime_type: 		string,
					images: {
						"image_size": {
							url: 		string,
							width: 		int,
							height: 	int
						}
					}
				}
			],
			categories: [
				term_id: 				string "int",
				name: 					string,
				slug: 					string,
				term_group: 			string "int",
				term_taxonomy_id: 		string "int",
				taxonomy: 				string,
				description: 			string,
				parent: 				string "int",
				count: 					string "int",
				object_id: 				string "int",
				cat_ID: 				string "int",
				category_count: 		string "int",
				category_description: 	string,
				cat_name: 				string,
				category_nicename: 		string,
				category_parent: 		string "int"
			],
			tags: [
				term_id: 				string "int",
				name: 					string,
				slug: 					string,
				term_group: 			string "int",
				term_taxonomy_id: 		string "int",
				taxonomy: 				string,
				description: 			string,
				parent: 				string "int",
				count: 					string "int"
			]
		}
	]
```
