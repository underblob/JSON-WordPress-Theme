<?php

class BBID_JSON {

	private $_currentMenu;

	public function __construct() {

		$this->_currentMenu 	= array();
	}

	/**
	 * @desc Pare down the Menu Post to only what we need for the view.
	 * @param object $menu_post - The Menu Post to be filtered.
	 * @return object
	 */
	public function filterMenuPost( $menu_post ) {

		$menu_filtered 		= ( object ) array(
			'ID' 				=> $menu_post->ID,
			'nav_label' 		=> $menu_post->title,
			'title_attr' 		=> $menu_post->attr_title,
			'slug' 				=> $this->slugify( $menu_post->title ),
			'url' 				=> $menu_post->url,
			'target' 			=> $menu_post->target,
			'description' 		=> $menu_post->description,
			'css_class_array' 	=> $menu_post->classes,
			'css_class_string' 	=> implode( ' ', $menu_post->classes ),
			'link_rel' 			=> $menu_post->xfn,
			'parent_id' 		=> $menu_post->menu_item_parent,
			'children' 			=> array()
		);

		return $menu_filtered;
	}

	/**
	 * @desc Returns blog info requested.
	 * @param string $info_request - Semicolon delimited string of blog values.
	 * @return array - Associative array.
	 * @see http://codex.wordpress.org/Function_Reference/get_bloginfo
	 */
	public function getBlogInfo( $info_request ) {
		$blog_info 	= array();

		if ( strlen( $info_request ) ) {
			$requests 	= explode( ';', $info_request );
			foreach ( $requests as $request ) {
				$blog_info[ $request ] 	= get_bloginfo( $request );
			}
		}

		return $blog_info;
	}

	/**
	 * @desc Adds name/value pairs from the Post's Custom Fields.
	 * @param object $post - The Post from the loop.
	 * @return object
	 */
	public function getCustomFields( $post ) {
		$custom_fields_raw = get_post_custom( $post->ID );
		$custom_fields_filtered = array();

		if ( ! $custom_fields_raw ) 	return $post;

		foreach ( $custom_fields_raw as $key => $custom_field ) {
			if ( substr( $key, 0, 1 ) === '_' ) 	continue;
			if ( count( $custom_field ) === 1 ) 	$custom_field = $custom_field[ 0 ];
			$custom_fields_filtered[ $key ] 		= $custom_field;
		}

		$post->custom_fields 	= array();
		$post->custom_fields 	= $custom_fields_filtered;
		return $post;
	}

	/**
	 * @desc Adds HTML formatting to the Post's content.
	 * @param object $post -- The Post from the loop.
	 * @return object
	 */
	public function getHtml( $post ) {
		$content 			= $post->post_content;
		$content 			= apply_filters('the_content', $content);
		$content 			= str_replace(']]>', ']]&gt;', $content);

		$post->post_html 	= $content;
		return $post;
	}

	/**
	 * @desc Gets the links/bookmarks.
	 * @param array $get_options -- The $_GET request object.
	 * @return array
	 */
	public function getLinks( $get_options ) {
		$link_options 	= array();
		if ( isset( $get_options ) ) {
			array_merge( $link_options, $get_options );
		}
		$links 		= get_bookmarks( $link_options );
		return $links;
	}

	/**
	 * @desc Adds the Post's media attachments from the gallery. Includes all sizes available, Title, Alternate Text, etc.
	 * @param object $post - The Post from the loop.
	 * @return object
	 */
	public function getMediaAttachments( $post ) {
		$params 	= array(
			'orderby' 		=> 'menu_order',
			'order' 		=> 'ASC',
			'nopaging' 		=> true,
			'post_type' 	=> 'attachment',
			'post_parent' 	=> $post->ID
		);
		$attachments_raw 		= get_posts( $params );
		$attachments_filtered 	= array();

		foreach ( $attachments_raw as $key => $attachment ) {
			$media 		= ( object ) array(
				'description' 	=> $attachment->post_content,
				'title' 		=> $attachment->post_title,
				'caption' 		=> $attachment->post_excerpt,
				'mime_type' 	=> $attachment->post_mime_type
			);

			if ( wp_attachment_is_image( $attachment->ID ) ) {
				$media->images 		= new stdClass();
				$sizes 				= get_intermediate_image_sizes();
				$sizes[] 			= 'full';
				foreach ( $sizes as $size ) {
					$img 			= wp_get_attachment_image_src( $attachment->ID, $size );
					$media->images->{ $size } 			= new stdClass();
					$media->images->{ $size }->url 		= $img[ 0 ];
					$media->images->{ $size }->width 	= $img[ 1 ];
					$media->images->{ $size }->height 	= $img[ 2 ];
				}
			} else {
				$media->url 		= wp_get_attachment_url( $attachment->ID );
			}

			$attachments_filtered[] = $media;
		}

		if ( count( $attachments_filtered ) === 1 )  	$attachments_filtered = $attachments_filtered[ 0 ];

		$post->media_attachments 	= new stdClass();
		$post->media_attachments 	= $attachments_filtered;
		return $post;
	}

	/**
	 * @desc Returns menu set up in WordPress based on menu location slug.
	 * 		 setCurrentMenu MUST be called before calling this method.
	 *		 This menus are generated recursively so all children will be included.
	 * @param string $menu_item_parent - The parent's ID to create the array.
	 * @return array
	 */
	public function getMenu( $menu_item_parent='0' ) {
		if ( ! count( $this->_currentMenu ) ) return array();
		$menu 	= array();

		foreach ( $this->_currentMenu as $key => $menu_post ) {
			if ( ( string ) $menu_post->menu_item_parent !== ( string ) $menu_item_parent ) {
				continue;
			}
			$menu_item 	= $this->filterMenuPost( $menu_post );
			$menu_item->children 	= array();
			$menu_item->children 	= $this->getMenu( $menu_post->ID );
			$menu[] 	= $menu_item;
		}

		return $menu;
	}

	/**
	 * @desc Returns option setting requested.
	 * @param string $option_request - Semicolon delimited string of WordPress options.
	 * @return array - Associative array: option => value
	 * @see http://codex.wordpress.org/Option_Reference
	 */
	public function getOptions( $option_request ) {
		$options 	= array();

		if ( strlen( $option_request ) ) {
			$requests 	= explode( ';', $option_request );
			foreach ( $requests as $request ) {
				$options[ $request ] 	= get_option( $request );
			}
		}

		return $options;
	}

	/**
	 * @desc Adds extra info to the post and returns it.
	 * @param object $post - The Post from the loop.
	 * @return object
	 */
	public function getPostExtras( $post ) {

		$post->post_uri = '/' . get_page_uri( $post->ID );
		$post 	= $this->getHtml( $post );
		$post 	= $this->getCustomFields( $post );
		$post 	= $this->getMediaAttachments( $post );

		return $post;
	}

	/**
	 * @desc Set the currentMenu property for the class. To be used by getMenu().
	 * @param string $menu_location - The menu's location slug.
	 * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
	 * @see http://ub4.underblob.com/wordpress-menu-posts/
	 */
	public function setCurrentMenu( $menu_location ) {
		// ---	Get the menu locations. Returns keys: menu location slugs, values: IDs.
		$menu_locations 	= get_nav_menu_locations();

		if ( array_key_exists( $menu_location, $menu_locations ) ) {
			$menu_id 		= $menu_locations[ $menu_location ];

			// ---	Get the currently assigned containing menu and associated posts.
			$this->_currentMenu 	= wp_get_nav_menu_items( $menu_id );
		}
	}

	/**
	 * @desc Converts text to "slugified".
	 * @param string $text - The text to slugify.
	 * @return string
	 */
	public function slugify( $text ) {
	    // replace non letter or digits by -
	    $text 	= preg_replace( '~[^\\pL\d]+~u', '-', $text );
	    $text 	= trim( $text, '-' );
	    $text 	= strtolower( $text );

	    // remove unwanted characters
	    $text 	= preg_replace( '~[^-\w]+~', '', $text );

		return ( empty( $text ) ) ? 'n-a' : $text;
	}

	/**
	 * @desc Check to see if any parameters were sent and update the query.
	 * @see http://codex.wordpress.org/Class_Reference/WP_Query#Parameters
	 */
	public function updateQueryPosts() {

		if ( empty( $_GET ) ) 	return;

		query_posts( $_GET );
	}

}

if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
			'menu-1' => 'Menu 1',
			'menu-2' => 'Menu 2',
			'menu-3' => 'Menu 3'
		)
	);
}

if ( function_exists( 'add_editor_style' ) ) {
	add_editor_style();
}
