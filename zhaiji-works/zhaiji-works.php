<?php
/*
Plugin Name: Zhaiji Works
Plugin URI: http://www.zhaiji.com/
Description: Zhaiji Works diy
Version: 1.0
Author: Jaward
Author URI: http://www.jaward.cn/
License: GPLv2
*/

add_action( 'init', 'create_zhaiji_works' );

function create_zhaiji_works() {
    register_post_type( 'zhaiji_works',
        array(
            'labels' => array(
                'name' => 'Zhaiji Works',
                'singular_name' => 'Zhaiji Works',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Works',
                'edit' => 'Edit',
                'edit_item' => 'Edit Works',
                'new_item' => 'New Works',
                'view' => 'View',
                'view_item' => 'View Works',
                'search_items' => 'Search Works',
                'not_found' => 'No Works found',
                'not_found_in_trash' => 'No Works found in Trash',
                'parent' => 'Parent Works'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies' => array( '' ),
            'menu_icon' => plugins_url( 'images/image.png', __FILE__ ),
            'has_archive' => true
        )
    );
}

add_action( 'admin_init', 'my_admin' );

function my_admin() {
    add_meta_box( 
		'zhaiji_works_meta_box',
        'Zhaiji Works Details',
        'display_zhaiji_works_meta_box',
        'zhaiji_works', 
		'normal', 
		'high'
    );
}

function display_zhaiji_works_meta_box( $works ) {
	// Retrieve current name of the Director and Movie Rating based on review ID
	$works_category = esc_html( get_post_meta( $works->ID, 'works_category', true ) );
	$works_resource = esc_html( get_post_meta( $works->ID, 'works_resource', true ) );
	$works_link = esc_html( get_post_meta( $works->ID, 'works_link', true ) );
	?>
	<table>
		<tr>
			<td style="width: 150px">类别</td>
			<td>
				<select style="width: 100px" name="zhaiji_works_catetory">
					<option value="photo" <?php echo selected( 'photo', $works_category ); ?>>图片</option>
					<option value="video" <?php echo selected( 'video', $works_category ); ?>>视频</option>
				</select>
			</td>
		</tr>
		<tr>
			<td style="width: 100%">视频地址</td>
			<td><input type="text" size="80" name="zhaiji_works_resource" value="<?php echo $works_resource; ?>" /></td>
		</tr>
		<tr>
			<td style="width: 100%">跳转地址</td>
			<td><input type="text" size="80" name="zhaiji_works_link" value="<?php echo $works_link; ?>" /></td>
		</tr>
	</table>
<?php 
}

add_action( 'save_post', 'add_zhaiji_works_fields', 10, 2 );

function add_zhaiji_works_fields( $zhaiji_works_id, $zhaiji_works ) {
    // Check post type for works
    if ( $zhaiji_works->post_type == 'zhaiji_works' ) {
        // Store data in post meta table if present in post data
        if ( isset( $_POST['zhaiji_works_catetory'] ) && $_POST['zhaiji_works_catetory'] != '' ) {
            update_post_meta( $zhaiji_works_id, 'works_category', $_POST['zhaiji_works_catetory'] );
        }
        if ( isset( $_POST['zhaiji_works_resource'] ) && $_POST['zhaiji_works_resource'] != '' ) {
            update_post_meta( $zhaiji_works_id, 'works_resource', $_POST['zhaiji_works_resource'] );
        }
		if ( isset( $_POST['zhaiji_works_link'] ) && $_POST['zhaiji_works_link'] != '' ) {
            update_post_meta( $zhaiji_works_id, 'works_link', $_POST['zhaiji_works_link'] );
        }
    }
}

add_filter( 'template_include', 'include_template_function', 1 );

function include_template_function( $template_path ) {
    if ( get_post_type() == 'zhaiji_works' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-zhaiji_works.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/single-zhaiji_works.php';
            }
        }
    }
    return $template_path;
}

add_action( 'init', 'create_my_taxonomies', 0 );

function create_my_taxonomies() {
    register_taxonomy(
        'zhaiji_works_media_genre',
        'zhaiji_works',
        array(
            'labels' => array(
                'name' => 'Media Genre',
                'add_new_item' => 'Add New Media Genre',
                'new_item_name' => "New Media Type Genre"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
}

add_filter( 'manage_edit-zhaiji_works_columns', 'my_columns' );

function my_columns( $columns ) {
    $columns['zhaiji_works_category'] = '类别';
    $columns['zhaiji_works_tag'] = '标签';
    //unset( $columns['comments'] );
    return $columns;
}

add_action( 'manage_posts_custom_column', 'populate_columns' );

function populate_columns( $column ) {
    if ( 'zhaiji_works_category' == $column ) {
        $works_category = get_post_meta( get_the_ID(), 'works_category', true );
        echo $works_category == 'photo' ? '图片' : '视频';
    } elseif ( 'zhaiji_works_tag' == $column ) {
		$terms = get_the_terms($post->ID, 'zhaiji_works_media_genre', ' ');
        if ($terms) {
            foreach ($terms as $term) {
    			echo ' ' . $term->name;
    		}
        }
	}
}

add_filter( 'manage_edit-zhaiji_works_sortable_columns', 'sort_me' );

function sort_me( $columns ) {
    $columns['zhaiji_works_category'] = 'zhaiji_works_category';
 
    return $columns;
}
 
add_filter( 'request', 'column_orderby' );
 
function column_orderby ( $vars ) {
    if ( !is_admin() )
        return $vars;
    if ( isset( $vars['orderby'] ) && 'zhaiji_works_category' == $vars['orderby'] ) {
        $vars = array_merge( $vars, array( 'meta_key' => 'works_category', 'orderby' => 'works_category' ) );
    }
    return $vars;
}

add_action( 'restrict_manage_posts', 'my_filter_list' );

function my_filter_list() {
    $screen = get_current_screen();
    global $wp_query;
    if ( $screen->post_type == 'zhaiji_works' ) {
        wp_dropdown_categories( array(
            'show_option_all' => '所有标签',
            'taxonomy' => 'zhaiji_works_media_genre',
            'name' => 'zhaiji_works_media_genre',
            'orderby' => 'name',
            'selected' => ( isset( $wp_query->query['zhaiji_works_media_genre'] ) ? $wp_query->query['zhaiji_works_media_genre'] : '' ),
            'hierarchical' => false,
            'depth' => 4,
            'show_count' => false,
            'hide_empty' => true,
        ) );
    }
}

add_filter( 'parse_query','perform_filtering' );

function perform_filtering( $query ) {
    $qv = &$query->query_vars;
    if ( ( $qv['zhaiji_works_media_genre'] ) && is_numeric( $qv['zhaiji_works_media_genre'] ) ) {
        $term = get_term_by( 'id', $qv['zhaiji_works_media_genre'], 'zhaiji_works_media_genre' );
        $qv['zhaiji_works_media_genre'] = $term->slug;
    }
}

?>