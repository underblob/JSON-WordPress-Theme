JSON WordPress Theme
====================

Menu WP Object Structure
------------------------

___


Following is reference structure for the JSON object returned by a call to the `get-menu` Template.

```javascript
	[
		{
			ID: 				int,
			nav_label: 			string,
			title_attr: 		string,
			slug: 				string,
			url: 				string, 	// Points to BBID_JSON install.
			target: 			string,
			description: 		string,
			css_class_array: 	array indexed,
			css_class_string: 	string,
			link_rel: 			string,
			parent_id: 			string "int",
			children: 			array, 		// Array of objects which follow this same structure.
		}
	]
```
