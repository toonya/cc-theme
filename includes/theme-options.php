<?php

$admincpMainTabs = array('general','navigation','layout','ad','seo','integration','doc');
	
/*
praments:

@type:

### table control ###	
contenttab-wrapstart
subnavtab-start
subnav-tab
subnavtab-end
subcontent-start
session-heading

### replay element ###
slider
--id
--type
--std
--desc
	
checkbox
checkbox
	--new option "lable" follow checkbox--
	
radios
number

cat_select
colorpicker
different_checkboxes
select
textcolorpopup
text
textlimit
textarea
upload

### spacial custom replay element ###
checkboxes
doc
*/ 


$cats_array = get_categories(array('hide_empty'=>0,'orderby'=>'term_group'));
$pages_array = get_pages('hide_empty=0');
$pages_number = count($pages_array);

$site_pages = array();
$site_cats = array();

foreach ($pages_array as $pagg) {
	$site_pages[$pagg->ID] = htmlspecialchars($pagg->post_title);
	$pages_ids[] = $pagg->ID;
}

foreach ($cats_array as $categs) {
	$site_cats[$categs->cat_ID] = $categs->cat_name;
	$cats_ids[] = $categs->cat_ID;
}

$options = array (

	array( "name" => "nav-general",
		   "type" => "contenttab-wrapstart",),

		array( "name" => "general-1",
			   "type" => "subcontent-start",),

			array( "name" => "general-settings",
				   "type" => "session-heading",
				   "desc" => "常规设置"),			   

			array( "name" => "主题颜色",
				   "id" => $shortname."_theme_stylesheet",
				   "type" => "radios",
				   "std" => "Style1",
				   "options" => array("style1","style2","custom"),
				   "desc" => "你可以自定义你的主题颜色样式，修改下列文件即可 '/company/css/color-custom.css'."
			),	 			   

			array( "name" => "Logo",
				   "id" => $shortname."_logo",
				   "type" => "upload",
				   "std" => get_template_directory_uri() . '/images/logo.png',
				   "desc" => ""
			),
			
			array( "name" => "页脚 Logo",
				   "id" => $shortname."_footer_logo",
				   "type" => "upload",
				   "std" => get_template_directory_uri() . '/images/footer-logo.png',
				   "desc" => ""
			),			

			array( "name" => "网站标题",
                   "id" => $shortname."_text_logo_enable",
                   "type" => "checkbox",
                   "std" => "false",
				   "label" => "显示基于文本的Logo（网站标题和描述）",
                   "desc" => ""),			

			array( "name" => "网站图标",
				   "id" => $shortname."_favicon",
				   "type" => "upload",
				   "std" => get_template_directory_uri() . '/images/favicon.png',
				   "desc" => ""
			),

			array( "name" => "联系邮箱",
				   "id" => $shortname."_email",
				   "type" => "text",
				   "std" => 'info@yourdomain.com',
				   "desc" => "",
				   ),				
						
			array( "name" => "自定义CSS",
				   "id" => $shortname."_custom_css",
				   "type" => "textarea",
				   "std" => "body { }",
				   "desc" => "加入一些自定义的CSS给你的主题,如果你想自定义主题样式,你可以编辑 '/company/css/custom.css'.",),

			array( "name" => "页脚版权信息",
				   "id" => $shortname."_footer_credit",
				   "type" => "textarea",
				   "std" => "<a href=\"http://www.theme-junkie.com\">WordPress Theme</a> designed by <a href=\"http://www.theme-junkie.com\">Theme Junkie</a>",
				   "desc" => "",),

			array( "name" => "social-icons",
				   "type" => "session-heading",
				   "desc" => "分享图标"),
				   				   
			array( "name" => "自定义RSS链接",
				   "id" => $shortname."_rss_link",
				   "type" => "text",
				   "std" => 'http://feeds.feedburner.com/ThemeJunkie',
				   "desc" => "",
				   ),
				   
			array( "name" => "电子邮件订阅链接",
				   "id" => $shortname."_subscription_link",
				   "type" => "text",
				   "std" => 'http://eepurl.com/xC4jr',
				   "desc" => "",
				   ),
				   
			array( "name" => "Twitter链接",
				   "id" => $shortname."_twitter_link",
				   "type" => "text",
				   "std" => 'http://twitter.com/theme_junkie',
				   "desc" => "",
				   ),
				   
			array( "name" => "Facebook链接",
				   "id" => $shortname."_facebook_link",
				   "type" => "text",
				   "std" => "http://www.facebook.com/your-page-url",
				   "desc" => "",
				   ),

			array( "name" => "Google+链接",
				   "id" => $shortname."_google_plus_link",
				   "type" => "text",
				   "std" => 'https://plus.google.com/+RoyGuan',
				   "desc" => "",
				   ),   				   			   				   			   				   				   				   				   

			array( "type" => "clearfix",),

		array( "name" => "general-1",
			   "type" => "subcontent-end",),		   

		array( "type" => "subnavtab-end",),					   

	array(  "name" => "nav-general",
			"type" => "contenttab-wrapend",),

//-------------------------------------------------------------------------------------//

	array( "name" => "nav-navigation",
		   "type" => "contenttab-wrapstart",),

		   array( "name" => "navigation-1",
			   	  "type" => "subcontent-start",),

			array( "name" => "pages-nav",
				   "type" => "session-heading",
				   "desc" => "页面"),			   

			array( "name" => "去掉页面菜单",
				   "id" => $shortname."_menupages",
				   "type" => "checkboxes",
				   "std" => "",
				   "desc" => "",
				   "usefor" => "pages",
				   "options" => $pages_ids),
			array( "name" => "下拉菜单",
		            "id" => $shortname."_enable_dropdowns_pages",
		            "type" => "checkbox",
		            "std" => "on",
		            "label" => "显示下拉菜单",
					"desc" => ""),
			array( "name" => "下拉菜单层级数",
		            "id" => $shortname."_tiers_shown_pages",
		            "type" => "number",
		            "std" => "4",
					"desc" => ""),
			array( "name" => "分类页面链接",
                   "id" => $shortname."_sort_pages",
                   "type" => "select",
                   "std" => "post_title",
				   "desc" => "",
                   "options" => array("post_title", "menu_order","post_date","post_modified","ID","post_author","post_name")),

			array( "name" => "页面链接顺序",
                   "id" => $shortname."_order_page",
                   "type" => "select",
                   "std" => "asc",
				   "desc" => "",
                   "options" => array("正序", "倒序")),
			array( "type" => "clearfix",),

			array( "name" => "categories-nav",
				   "type" => "session-heading",
				   "desc" => "分类"),				   

			array( "name" => "首页链接",
            "id" => $shortname."_home_link",
            "type" => "checkbox",
            "std" => "on",
            "label" => "在分类别菜单上显示首页链接",
			"desc" => ""),

			array( "name" => "不添加到分类菜单的分类",
				   "id" => $shortname."_menucats",
				   "type" => "checkboxes",
				   "std" => "",
				   "desc" => "",
				   "usefor" => "categories",
				   "options" => $cats_ids),

			array( "name" => "下拉菜单",
            "id" => $shortname."_enable_dropdowns_categories",
            "type" => "checkbox",
            "std" => "on",
            "label" => "显示下拉分类菜单",
			"desc" => ""),

			array( "name" => "空白分类",
            "id" => $shortname."_categories_empty",
            "type" => "checkbox",
            "std" => "on",
            "label" => "隐藏空白分类",
			"desc" => ""),

			array( "type" => "clearfix",),

			array( "name" => "下拉菜单层级数",
            "id" => $shortname."_tiers_shown_categories",
            "type" => "number",
            "std" => "4",
			"desc" => ""),

			array( "type" => "clearfix",),

		    array( "name" => "排序分类链接",
                   "id" => $shortname."_sort_cat",
                   "type" => "select",
                   "std" => "name",
				   "desc" => "",
                   "options" => array("姓名", "ID", "slug", "count", "term_group")),

			array( "name" => "分类链接顺序",
                   "id" => $shortname."_order_cat",
                   "type" => "select",
                   "std" => "asc",
				   "desc" => "",
                   "options" => array("正序", "倒序")),

		array( "name" => "navigation-1",
			   "type" => "subcontent-end",),

	array( "name" => "nav-navigation",
		   "type" => "contenttab-wrapend",),

//-------------------------------------------------------------------------------------//

	array( "name" => "nav-layout",
		   "type" => "contenttab-wrapstart",),

		array( "name" => "layout-1",
			   "type" => "subcontent-start",),

			array( "name" => "homepage",
				   "type" => "session-heading",
				   "desc" => "主页"),

			array( "name" => "布局",
            	   "id" => $shortname."_layout",
            	   "type" => "radios",
                   "std" => "Responsive",
                   'options' => array("响应式设计","固定宽度"),                   
			       "desc" => ""),				   				   

			array( "name" => "幻灯片",
				   "id" => $shortname."_home_slider_enable",
				   "type" => "checkbox",
			       "std" => "on",
			       "label" => "主页显示幻灯片",                   
			       "desc" => ""),

			array( "name" => "功能特点模块",
				   "id" => $shortname."_home_features_enable",
				   "type" => "checkbox",
			       "std" => "on",
			       "label" => "主页上显示功能特点模块",                   
			       "desc" => ""),

			array( "name" => "功能特点数量",
			       "id" => $shortname."_home_features_num",
			       "type" => "select",
			       "std" => "4",
				   "desc" => "在主页显示功能特点的数量",
			       "options" => array("4", "8", "12")),			       

			array( "name" => "产品模块",
				   "id" => $shortname."_home_portfolio_enable",
				   "type" => "checkbox",
			       "std" => "on",
			       "label" => "主页显示产品模块",                   
			       "desc" => ""),
			       
			array( "name" => "产品标题",
				   "id" => $shortname."_home_portfolio_heading",
				   "type" => "text",
			       "std" => "Recent Work",
			       "label" => "Heading text of the portfolio section",                   
			       "desc" => ""),

			array( "name" => "产品模块说明",
				   "id" => $shortname."_home_portfolio_desc",
				   "type" => "textarea",
			       "std" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam molestie molestie nisl, eu scelerisque turpis. <div class=\"more-button\"><a href=\"".home_url()."/work/\">View Work</a></div>",
			       "label" => "Description of the portfolio section",                   
			       "desc" => ""),

			array( "name" => "产品显示数量",
			       "id" => $shortname."_home_portfolio_num",
			       "type" => "select",
			       "std" => "3",
				   "desc" => "首页显示产品的数量",
			       "options" => array("3", "6", "9")),				       		       
			       
			array( "name" => "文章模块",
				   "id" => $shortname."_home_posts_enable",
				   "type" => "checkbox",
			       "std" => "on",
			       "label" => "首页显示文章模块",                   
			       "desc" => ""),			       

			array( "name" => "文章模块标题",
				   "id" => $shortname."_home_posts_heading",
				   "type" => "text",
			       "std" => "Recent Posts",
			       "label" => "Heading text of the posts section",                   
			       "desc" => ""),

			array( "name" => "文章说明",
				   "id" => $shortname."_home_posts_desc",
				   "type" => "textarea",
			       "std" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam molestie molestie nisl, eu scelerisque turpis. <div class=\"more-button\"><a href=\"".home_url()."/blog/\">Read Blog</a></div>",
			       "label" => "Description of the posts section",                   
			       "desc" => ""),

			array( "name" => "文章数量",
			       "id" => $shortname."_home_posts_num",
			       "type" => "select",
			       "std" => "3",
				   "desc" => "首页显示文章的数量",
			       "options" => array("3", "6", "9")),				       			        
			       		          			           	       			       	       
			array( "name" => "团队模块",
				   "id" => $shortname."_home_testimonials_enable",
				   "type" => "checkbox",
			       "std" => "on",
			       "label" => "主页显示团队模块",                   
			       "desc" => ""),

			array( "name" => "团队模块标题",
				   "id" => $shortname."_home_testimonials_heading",
				   "type" => "text",
			       "std" => "Trusted by <strong>12,309</strong> happy customers",
			       "label" => "Heading text of the testimonials section",                   
			       "desc" => ""),			       
       
			array( "type" => "clearfix",),

			array( "name" => "single-posts-pages",
				   "type" => "session-heading",
				   "desc" => "单篇文章/页面"),
				   
			array( "name" => "发表评论",
            	   "id" => $shortname."_show_post_comments",
            	   "type" => "checkbox",
                   "std" => "on",
                   "label" => "显示帖子上的评论",                   
			       "desc" => ""),

			array( "name" => "文章导航",
            	   "id" => $shortname."_post_nav_enable",
            	   "type" => "checkbox",
                   "std" => "on",
                   "label" => "显示 &larr; &rarr; 帖子导航链接",                   
			       "desc" => ""),			       

			array( "name" => "文章评论",
            	   "id" => $shortname."_show_page_comments",
            	   "type" => "checkbox",
                   "std" => "false",
                   "label" => "显示文章评论",                   
			       "desc" => ""),			       

			       
			array( "type" => "clearfix",),			

		array( "name" => "layout-2",
			   "type" => "subcontent-end",),

	array( "name" => "nav-layout",
		   "type" => "contenttab-wrapend",),

//-------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------//

	array( "name" => "nav-advertisements",
		   "type" => "contenttab-wrapstart",),		   

		array( "name" => "advertisements-1",
			   "type" => "subcontent-start",),

			array( "name" => "un-widgetized-ad",
				   "type" => "session-heading",
				   "desc" => "底部广告"),			   

			array( "name" => "显示页脚广告",
				   "id" => $shortname."_footer_ad_enable",
				   "type" => "checkbox",
				   "std" => "false",
				   'label' => "是",
				   "desc" => "主题内容后的广告模块",),

			array( "name" => "输入页脚广告代码",
				   "id" => $shortname."_footer_ad_code",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "大小: 728 x 90",), 				   				   				   					   

		array( "name" => "advertisements-1",
			   "type" => "subcontent-end",),
			   
	array( "name" => "nav-advertisements",
		   "type" => "contenttab-wrapend",),			   

//-------------------------------------------------------------------------------------//
	array( "name" => "nav-seo",
		   "type" => "contenttab-wrapstart",),

		array( "name" => "seo-1",
			   "type" => "subcontent-start",),

			array( "name" => "homepage-seo",
				   "type" => "session-heading",
				   "desc" => "首页 SEO"),			   

			array( "name" => "启用自定义标题",
				   "id" => $shortname."_seo_home_title",
				   "type" => "checkbox",
				   "std" => "false",
				   "label" => "Yes",
				   "desc" => "默认情况下,主题使用你的博客名称和你的博客的描述,因为当你创建你的博客,就已经创建你的主页标题和描述.但是,如果你想创建一个自定义标题，启用此选项，并填写自定义标题栏. ",),

			array( "name" => "启用主题描述",
				   "id" => $shortname."_seo_home_description",
				   "type" => "checkbox",
				   "std" => "false",
				   "label" => "Yes",
				   "desc" => "默认情况下,主题使用您的博客的描述,因为当你创建你的博客,填了主题描述.如果你想使用一个不同的描述，启用该选项并填写自定义说明. ",),

			array( "name" => "启用主题关键字",
				   "id" => $shortname."_seo_home_keywords",
				   "type" => "checkbox",
				   "std" => "false",
				   "label" => "Yes",
				   "desc" => "默认情况下,主题不添加关键字到你的头.大多数搜索引擎不使用关键字决定您的网站排名,但有些情况下尝试去定义它们,以防万一.如果你想添加主题关键字,启用该选项并填写自定义关键字. ",),

			array( "name" => "启用规范的URL",
				   "id" => $shortname."_seo_home_canonical",
				   "type" => "checkbox",
				   "std" => "false",
				   "label" => "Yes",				   
				   "desc" => "规范化有助于防止被搜索引擎重复的内容索引，并作为结果,这可能有助于避免重复内容处罚和PR降低.某些网页可能有不同的URL都通向同一个地方.例如domain.com,domain.com/ index.html的，和www.domain.com是导致您的主页所有不同的URL.从搜索引擎的角度来看,这些重复的URL,这也发生往往是由于定制的永久链接,可以单独采集,而不是作为一个单一的目标.定义一个规范的网址告诉搜索引擎你会哪个URL想正式使用.主题基于其规范的URL关闭您的永久链接可在设置选项卡中定义的设置.",),

			array( "type" => "clearfix",),

			array( "name" => "首页自定义标题（如果已启用）",
				   "id" => $shortname."_seo_home_titletext",
				   "type" => "text",
				   "std" => "",
				   "desc" => "如果你已经启用了自定义标题,您可以在这里添加您的自定义标题.无论您在此处键入将被放置在< title >< /title >标记之间",),

			array( "name" => "首页主题描述（如果已启用）",
				   "id" => $shortname."_seo_home_descriptiontext",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "如果您已启用主题描述您可以在这里添加自定义的描述.",),

			array( "name" => "首页主题关键字（如果已启用）",
				   "id" => $shortname."_seo_home_keywordstext",
				   "type" => "text",
				   "std" => "",
				   "desc" => "如果您已启用主题关键字,您可以在这里添加自定义关键字.关键词应该由,分开。例如：WordPress,主题,模板,优雅",),

			array( "name" => "如果自定义标题失效,选择自动生成方法",
				   "id" => $shortname."_seo_home_type",
				   "type" => "select",
				   "std" => "BlogName | Blog description",
				   "options" => array("博客名称|博客描述", "博客介绍|博客名称", "仅博客名称"),
				   "desc" => "如果你不使用自定义文章标题,你仍然可以生成您的标题.在这里,您可以选择您希望的顺序想显示你的文章标题和博客名称，或者您也可以从标题中完全删除博客的名字.",),

			array( "name" => "定义一个字符分隔博客名称和文章标题",
				   "id" => $shortname."_seo_home_separate",
				   "type" => "text",
				   "std" => " | ",
				   "desc" => "在这里,您可以更改字符自动生成文章的标题时,分隔您的博客标题和文章标题.|或 -",),

			array( "name" => "single-post-page-seo",
				   "type" => "session-heading",
				   "desc" => "单个帖子页面的搜索引擎优化"),	

			array( "name" => "启用自定义标题",
				   "id" => $shortname."_seo_single_title",
				   "type" => "checkbox",
				   "std" => "false",
				   "label" => "Yes",				   
				   "desc" => "默认情况下，主题会使用您的文章的标题和你的博客名称文章标题。如果你想使你比实际的文章标题你的元标题不同，您可以定义一个自定义标题使用自定义字每个帖子,必须自定义标题,启用此选项，则必须选择适合您的自定义标题.",),

			array( "name" => "启用自定义描述",
				   "id" => $shortname."_seo_single_description",
				   "type" => "checkbox",
				   "std" => "false",
				   "label" => "Yes",				   
				   "desc" => "如果你想一个meta描述添加到您的文章你可以这样做使用自定义字段,启用此选项的描述将在帖子页显示.您可以使用基于下面自定义字段添加您的meta描述.",),

			array( "type" => "clearfix",),

			array( "name" => "启用自定义关键字",
				   "id" => $shortname."_seo_single_keywords",
				   	"type" => "checkbox",
				   "std" => "false",
				   "label" => "Yes",				   
				   "desc" => "如果您想meta关键字添加到您的文章你可以这样做使用自定义字段,启用此选项关键字，以便在后页显示.您可以使用基于下面自定义字段添加您的meta关键字.",),

			array( "name" => "启用规范的URL",
				   "id" => $shortname."_seo_single_canonical",
				   "type" => "checkbox",
				   "std" => "false",
				   "label" => "Yes",				   
				   "desc" => "规范化有助于防止被搜索引擎重复的内容索引，并作为结果,这可能有助于避免重复内容处罚和PR降低.某些网页可能有不同的URL都通向同一个地方.例如domain.com,domain.com/ index.html的，和www.domain.com是导致您的主页所有不同的URL.从搜索引擎的角度来看,这些重复的URL,这也发生往往是由于定制的永久链接,可以单独采集,而不是作为一个单一的目标.定义一个规范的网址告诉搜索引擎你会哪个URL想正式使用.主题基于其规范的URL关闭您的永久链接可在设置选项卡中定义的设置.",),

			array( "type" => "clearfix",),

			array( "name" => "自定义用于标题的字段",
				   "id" => $shortname."_seo_single_field_title",
				   "type" => "text",
				   "std" => "seo_title",
				   "desc" => "当您使用自定义字段定义您的标题,你应该在自定义字段名称中使用.您的自定义字段应该是你想使用的自定义标题.",),

			array( "name" => "自定义描述字段",
				   "id" => $shortname."_seo_single_field_description",
				   "type" => "text",
				   "std" => "seo_description",
				   "desc" => "当您使用自定义字段meta描述，你应该在自定义字段名称中使用.您的自定义字段应该是你想使用的自定义说明.",),

			array( "name" => "自定义关键字字段",
				   "id" => $shortname."_seo_single_field_keywords",
				   "type" => "text",
				   "std" => "seo_keywords",
				   "desc" => "当您使用自定义字段meta关键字，你应该在自定义字段名称中使用.您的自定义字段应该是你想使用的自定义关键字.",),

			array( "name" => "如果自定义标题失效,选择自动生成方法",
				   "id" => $shortname."_seo_single_type",
				   "type" => "select",
				   "std" => "Post title | BlogName",
				   "options" => array("文章标题|博客名称", "博客名称|文章标题", "近文章标题"),
				   "desc" => "如果你不使用自定义文章标题，你仍然可以生成文章标题.在这里，您可以选择您希望的顺序想显示你的文章标题和博客名称，或者您也可以从标题中完全删除博客的名字.",),

			array( "name" => "定义一个字符分隔博客名称和文章标题",
				   "id" => $shortname."_seo_single_separate",
				   "type" => "text",
				   "std" => " | ",
				   "desc" => "在这里,您可以更改字符自动生成文章的标题时,分隔您的博客标题和文章标题.|或 -",),

			array( "name" => "index-page-seo",
				   "type" => "session-heading",
				   "desc" => "目录的搜索引擎优化"),

			array( "name" => " 启用规范的URL",
				   "id" => $shortname."_seo_index_canonical",
				   "type" => "checkbox",
				   "std" => "false",
				   "label" => "Yes",				   
				   "desc" => "规范化有助于防止被搜索引擎重复的内容索引，并作为结果,这可能有助于避免重复内容处罚和PR降低.某些网页可能有不同的URL都通向同一个地方.例如domain.com,domain.com/ index.html的，和www.domain.com是导致您的主页所有不同的URL.从搜索引擎的角度来看,这些重复的URL,这也发生往往是由于定制的永久链接,可以单独采集,而不是作为一个单一的目标.定义一个规范的网址告诉搜索引擎你会哪个URL想正式使用.主题基于其规范的URL关闭您的永久链接可在设置选项卡中定义的设置.",),

			array( "name" => "启用mate描述",
				   "id" => $shortname."_seo_index_description",
				   	"type" => "checkbox",
				   "std" => "false",
				   "label" => "Yes",				   
				   "desc" => "如果你想分类/存档页面上显示mate描述,选中此复选框.该描述是基于关闭您选择在创建/编辑类别是可以创建类别描述.",),

			array( "type" => "clearfix",),

			array( "name" => "选择标题自动生成方法",
				   "id" => $shortname."_seo_index_type",
				   "type" => "select",
				   "std" => "Category name | BlogName",
				   "options" => array("分类名称|博客名称", "博客名称|分类名称", "仅分类名称"),
				   "desc" => "在这里,你可以选择生成您的标题索引页.您可以更改您的博客名称和索引名称,或者您也可以从标题中完全删除博客名称.",),

			array( "name" => "定义一个字符分隔博客名称和文章标题",
				   "id" => $shortname."_seo_index_separate",
				   "type" => "text",
				   "std" => " | ",
				   "desc" => "在这里,您可以更改字符自动生成文章的标题时,分隔您的博客标题和文章标题.|或 -",),

			array( "type" => "clearfix",),

		array( "name" => "seo-1",
				   "type" => "subcontent-end",),

	array(  "name" => "nav-seo",
			"type" => "contenttab-wrapend",),

//-------------------------------------------------------------------------------------//

	array( "name" => "nav-integration",
		   "type" => "contenttab-wrapstart",),

		array( "name" => "integration-1",
			   "type" => "subcontent-start",),
			   
			array( "name" => "code-integration",
				   "type" => "session-heading",
				   "desc" => "代码集成 "),			   

			array( "name" => "启用头部代码",
                   "id" => $shortname."_integrate_header_enable",
                   "type" => "checkbox",
                   "std" => "false",
                   "label" => "Yes",
                   "desc" => ""),
                   
			array( "name" => "启用主体代码",
                   "id" => $shortname."_integrate_body_enable",
                   "type" => "checkbox",
                   "std" => "false",
                   "label" => "Yes",                   
                   "desc" => ""), 

			array( "name" => "启用单独顶部代码",
                   "id" => $shortname."_integrate_singletop_enable",
                   "type" => "checkbox",
                   "std" => "false",
                   "label" => "Yes",                   
                   "desc" => ""), 

			array( "name" => "启用单独底部代码",
                   "id" => $shortname."_integrate_singlebottom_enable",
                   "type" => "checkbox",
                   "std" => "false",
                   "label" => "Yes",                   
                   "desc" => ""),                                                     

			array( "name" => "在<HEAD>添加代码到您的博客",
				   "id" => $shortname."_integration_head",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "",),         

			array( "name" => "在<BODY>添加代码到您的博客（适合谷歌分析）",
				   "id" => $shortname."_integration_body",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "",),

			array( "name" => "在您的文章顶部添加代码",
				   "id" => $shortname."_integration_single_top",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "",),

			array( "name" => "将代码添加到您的文章底部",
				   "id" => $shortname."_integration_single_bottom",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "",),

		array( "name" => "integration-1",
			   "type" => "subcontent-end",),

	array( "name" => "nav-integration",
		   "type" => "contenttab-wrapend",),

//-------------------------------------------------------------------------------------//

	array( "name" => "nav-doc",
		   "type" => "contenttab-wrapstart",),

		array( "type" => "subnavtab-start",),

			array( "name" => "doc-1",
				   "type" => "subnav-tab",
				   "desc" => "Installation"),

			array( "name" => "doc-2",
				   "type" => "subnav-tab",
				   "desc" => "Troubleshooting"),

		array( "type" => "subnavtab-end",),

		array( "name" => "doc-1",
			   "type" => "subcontent-start",),

			array( "name" => "installation",
				   "type" => "doc",),

		array( "name" => "doc-1",
			   "type" => "subcontent-end",),

		array( "name" => "doc-2",
			   "type" => "subcontent-start",),

			array( "name" => "troubleshooting",
				   "type" => "doc",),

		array( "name" => "doc-2",
			   "type" => "subcontent-end",),

	array( "name" => "nav-doc",
		   "type" => "contenttab-wrapend",),

//-------------------------------------------------------------------------------------//

); 


function custom_colors_css(){
	global $shortname; ?>
	
	<style type="text/css">
		body { color: #<?php echo(get_option($shortname.'_color_mainfont')); ?>; }
		#content-area a { color: #<?php echo(get_option($shortname.'_color_mainlink')); ?>; }
		ul.nav li a { color: #<?php echo(get_option($shortname.'_color_pagelink')); ?>; }
		ul.nav > li.current_page_item > a, ul#top-menu > li:hover > a, ul.nav > li.current-cat > a { color: #<?php echo(get_option($shortname.'_color_pagelink_active')); ?>; }
		h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a { color: #<?php echo(get_option($shortname.'_color_headings')); ?>; }
		
		#sidebar a { color:#<?php echo(get_option($shortname.'_color_sidebar_links')); ?>; }		
		div#footer { color:#<?php echo(get_option($shortname.'_footer_text')); ?> }
		#footer a, ul#bottom-menu li a { color:#<?php echo(get_option($shortname.'_color_footerlinks')); ?> }
	</style>

<?php };

?>