<?php

//Add Mini Features Post Type

function tj_create_post_type_feature()
{
	$labels = array(
		'name' => __( '我们的服务','junkie'),
		'singular_name' => __( 'features','junkie' ),
		'add_new' => __('添加','junkie'),
		'add_new_item' => __('添加新的我们的服务','junkie'),
		'edit_item' => __('编辑我们的服务','junkie'),
		'new_item' => __('新的我们的服务','junkie'),
		'view_item' => __('查看我们的服务','junkie'),
		'search_items' => __('搜索我们的服务','junkie'),
		'not_found' =>  __('没有发现我们的服务','junkie'),
		'not_found_in_trash' => __('没有在回收站发现我们的服务','junkie'),
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
		'supports' => array('title','editor','thumbnail')
	  );

	  register_post_type(__( 'feature', 'junkie' ),$args);
}

//Add Mini Features Post Type

function tj_create_post_type_value()
{
	$labels = array(
		'name' => __( '价值','junkie'),
		'singular_name' => __( 'values','junkie' ),
		'add_new' => __('添加','junkie'),
		'add_new_item' => __('添加新的价值','junkie'),
		'edit_item' => __('编辑价值','junkie'),
		'new_item' => __('新的价值','junkie'),
		'view_item' => __('查看价值','junkie'),
		'search_items' => __('搜索价值','junkie'),
		'not_found' =>  __('没有发现价值','junkie'),
		'not_found_in_trash' => __('没有在回收站发现价值','junkie'),
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
		'supports' => array('title','editor','thumbnail')
	  );

	  register_post_type(__( 'value', 'junkie' ),$args);
}

//Add Testimonial Post Type

function tj_create_post_type_testimonial()
{
	$labels = array(
		'name' => __( '客户反馈','junkie'),
		'singular_name' => __( 'Testimonial','junkie' ),
		'add_new' => __('添加','junkie'),
		'add_new_item' => __('添加新的客户反馈','junkie'),
		'edit_item' => __('编辑客户反馈','junkie'),
		'new_item' => __('新的客户反馈','junkie'),
		'view_item' => __('产看客户反馈','junkie'),
		'search_items' => __('搜索客户反馈','junkie'),
		'not_found' =>  __('没有发现客户反馈','junkie'),
		'not_found_in_trash' => __('没有在回收站发现客户反馈','junkie'),
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
		'supports' => array('title','editor','thumbnail')
	  );

	  register_post_type(__( 'testimonial', 'junkie' ),$args);
}


//Add Portfolio Post Type

function tj_create_post_type_portfolio()
{
	$labels = array(
		'name' => __( '分享模块','junkie'),
		'singular_name' => __( 'Portfolio','junkie' ),
		'add_new' => __('添加','junkie'),
		'add_new_item' => __('添加新的分享','junkie'),
		'edit_item' => __('编辑分享','junkie'),
		'new_item' => __('新的分享','junkie'),
		'view_item' => __('查看分享','junkie'),
		'search_items' => __('搜索分享','junkie'),
		'not_found' =>  __('没有发现分享','junkie'),
		'not_found_in_trash' => __('没有在回收站发现分享','junkie'),
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
		'supports' => array('title','editor','thumbnail','comments')
	  ); 
	  
	  register_post_type(__( 'portfolio', 'junkie' ),$args);
}

function tj_build_taxonomies(){
    
	$args = array(
		"hierarchical" => true, 
		"label" => __( "分享目录", 'junkie' ), 
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
add_action( 'init', 'tj_create_post_type_value' );


add_action( 'init', 'tj_build_taxonomies', 0 );

add_filter("manage_edit-portfolio_columns", "tj_portfolio_edit_columns");

add_action("manage_posts_custom_column",  "tj_portfolio_custom_columns");

?>