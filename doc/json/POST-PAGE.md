JSON WordPress Theme
====================

Post/Page WP Object Structures
------------------------------

___


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
			post_uri: 			string,
			comments_count: {
				total_comments: 0,
				moderated: 0,
				approved: 0,
				spam: 0,
				trash: 0,
				post-trashed: 0
			},
			post_categories: [
				{
					term_id: 			int,
					name: 				string,
					slug: 				string,
					term_group: 		int,
					term_taxonomy_id: 	int,
					taxonomy: 			string,
					description: 		string,
					parent: 			int,
					count: 				int,
					object_id: 			int,
					filter: 			string,
					cat_ID: 			int,
					category_count: 	int,
					category_description: string,
					cat_name: 			string,
					category_nicename: 	string,
					category_parent: 	int
				}
			],
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
			]
		}
	]
```
