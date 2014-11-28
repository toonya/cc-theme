<?php

//Add Mini Features Post Type

function tj_create_post_type_feature()
{
	$labels = array(
		'name' => __( '功能特点','junkie'),
		'singular_name' => __( 'features','junkie' ),
		'add_new' => __('添加','junkie'),
		'add_new_item' => __('添加新的功能特点','junkie'),
		'edit_item' => __('编辑功能特点','junkie'),
		'new_item' => __('新的功能特点','junkie'),
		'view_item' => __('查看功能特点','junkie'),
		'search_items' => __('搜索功能特点','junkie'),
		'not_found' =>  __('没有发现功能特点','junkie'),
		'not_found_in_trash' => __('没有在回收站发现功能特点','junkie'),
		'parent_item_colon' => ''
	  );

	  $args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','','custom-fields','excerpt','thumbnail')
	  );

	  register_post_type(__( 'feature', 'junkie' ),$args);
}

//Add Testimonial Post Type

function tj_create_post_type_testimonial()
{
	$labels = array(
		'name' => __( '团队','junkie'),
		'singular_name' => __( 'Testimonial','junkie' ),
		'add_new' => __('添加','junkie'),
		'add_new_item' => __('添加新的团队','junkie'),
		'edit_item' => __('编辑团队','junkie'),
		'new_item' => __('新的团队','junkie'),
		'view_item' => __('产看团队','junkie'),
		'search_items' => __('搜索团队','junkie'),
		'not_found' =>  __('没有发现团队','junkie'),
		'not_found_in_trash' => __('没有在回收站发现团队','junkie'),
		'parent_item_colon' => ''
	  );

	  $args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','','custom-fields','excerpt','thumbnail')
	  );

	  register_post_type(__( 'testimonial', 'junkie' ),$args);
}


//Add Portfolio Post Type

function tj_create_post_type_portfolio()
{
	$labels = array(
		'name' => __( '产品模块','junkie'),
		'singular_name' => __( 'Portfolio','junkie' ),
		'add_new' => __('添加','junkie'),
		'add_new_item' => __('添加新的产品','junkie'),
		'edit_item' => __('编辑产品','junkie'),
		'new_item' => __('新的产品','junkie'),
		'view_item' => __('查看产品','junkie'),
		'search_items' => __('搜索产品','junkie'),
		'not_found' =>  __('没有发现产品','junkie'),
		'not_found_in_trash' => __('没有在回收站发现产品','junkie'),
		'parent_item_colon' => ''
	  );
	  
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail','custom-fields','excerpt','comments')
	  ); 
	  
	  register_post_type(__( 'portfolio', 'junkie' ),$args);
}

function tj_build_taxonomies(){
    
	$args = array(
		"hierarchical" => true, 
		"label" => __( "产品目录", 'junkie' ), 
		"singular_label" => __( "Portfolio Type", 'junkie' ), 
		"rewrite" => array('slug' => 'portfolio-type', 'hierarchical' => true), 
		"public" => true
	);
    
	register_taxonomy(__( "portfolio-type", 'junkie' ), array(__( "portfolio", 'junkie' )), $args); 
}


function tj_portfolio_edit_columns($columns){  

        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => __( 'Portfolio Item Title', 'junkie' ),
            "type" => __( 'Type', 'junkie' ),
            'date' => __( 'Date' )
        );  
  
        return $columns;  
}

function tj_portfolio_custom_columns($column){  
        global $post;  
        switch ($column)  
        {    
            case __( 'type', 'junkie' ):  
                echo get_the_term_list($post->ID, __( 'portfolio-type', 'junkie' ), '', ', ','');  
                break;
        }  
}

add_action( 'init', 'tj_create_post_type_portfolio' );
add_action( 'init', 'tj_create_post_type_feature' );
add_action( 'init', 'tj_create_post_type_testimonial' );


add_action( 'init', 'tj_build_taxonomies', 0 );

add_filter("manage_edit-portfolio_columns", "tj_portfolio_edit_columns");

add_action("manage_posts_custom_column",  "tj_portfolio_custom_columns");

?>