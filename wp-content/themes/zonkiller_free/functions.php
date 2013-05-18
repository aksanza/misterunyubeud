<?php function get_post_image() {global $post, $posts;$first_img = '';ob_start();ob_end_clean();$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);$first_img = $matches [1] [0];if(empty($first_img)){$img_dir = get_bloginfo('template_directory');$first_img = $img_dir . '/images/noimage.png';}return $first_img;}function get_thumbnail($width=100, $height=100, $class='', $alttext='', $titletext='', $fullpath=false, $custom_field=''){global $post, $shortname, $posts;$thumb_array['thumb'] = '';$thumb_array['use_timthumb'] = true;if ($fullpath) $thumb_array['fullpath'] = '';if ( function_exists('has_post_thumbnail') ) {if ( has_post_thumbnail() ) {$thumb_array['use_timthumb'] = false;$args='';if ($class <> '') $args['class'] = $class;if ($alttext <> '') $args['alt'] = $alttext;if ($titletext <> '') $args['title'] = $titletext;$thumb_array['thumb'] = get_the_post_thumbnail( $post->ID, array($width,$height), $args );if ($fullpath) {$thumb_array['fullpath'] = get_the_post_thumbnail( $post->ID );$thumb_array['fullpath'] = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $thumb_array['fullpath'], $matches);$thumb_array['fullpath'] = $matches[1][0];};}};if ($thumb_array['thumb'] == '') {	if ($custom_field == '') $thumb_array['thumb'] = get_post_meta($post->ID, 'Thumbnail', $single = true);else { $thumb_array['thumb'] = get_post_meta($post->ID, $custom_field, $single = true);if ($thumb_array['thumb'] == '') $thumb_array['thumb'] = get_post_meta($post->ID, 'Thumbnail', $single = true);}if (($thumb_array['thumb'] == '') && ((get_option($shortname.'_grab_image')) == 'on')) $thumb_array['thumb'] = first_image();if ($fullpath) $thumb_array['fullpath'] = $thumb_array['thumb'];};return $thumb_array;}function print_thumbnail($thumbnail = '', $use_timthumb = true, $alttext = '', $width = 100, $height = 100, $class = '', $echoout = true, $forstyle = false) {$output = '';if ($forstyle === false) {if ($use_timthumb === false) {$output = $thumbnail;} else { $output = '<img src="'.get_bloginfo('stylesheet_directory').'/thumb.php?src='.get_post_image().'&amp;h='. $height .'&amp;w='. $width .'&amp;zc=3"';if ($class <> '') $output .= " class='$class' ";$output .= " alt='$alttext' width='$width' height='$height' />";};} else {$output = $thumbnail;if ($use_timthumb === false) {	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $output, $matches);	$output = $matches[1][0];} else {$output = get_bloginfo('stylesheet_directory').'/thumb.php?src='.$output.'&amp;h='.$height.'&amp;w='.$width.'&amp;q=80&amp;zc=2';}};if ($echoout) echo $output;else return $output;}?>
<?php if ( function_exists('register_sidebars') )
register_sidebar(array('name'=>'Sidebar Left','before_widget' => '<div class="right-sidebar">',       'after_widget' => '</div>','before_title' => '<h4>','after_title' => '</h4>',));
register_sidebar(array('name'=>'Sidebar Right','before_widget' => '<div class="left-sidebar">','after_widget' => '</div>','before_title' => '<h4>','after_title' => '</h4>',));
register_sidebar(array('name'=>'Sidebar Single','before_widget' => '<div class="s-sidebar">','after_widget' => '</div>','before_title' => '<h4>','after_title' => '</h4>',));
add_action( 'init', 'register_my_menu' );function register_my_menu() {register_nav_menu( 'top-menu', __( 'Top Menu' ) );}?>
<?php add_filter('comments_template', 'legacy_comments');function legacy_comments($file) {if(!function_exists('wp_list_comments')) :$file = TEMPLATEPATH . '/legacy.comments.php';endif;return $file;}function sum($limit) {$sum = explode(' ', get_the_excerpt(), $limit);if (count($sum)>=$limit) {array_pop($sum);$sum = implode(" ",$sum).'...';} else {$sum = implode(" ",$sum);}$sum = preg_replace('`\[[^\]]*\]`','',$sum);return $sum;}function custom_excerpt_length( $length ) {return 30;}add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );function new_excerpt_more($more) {return '..';}add_filter('excerpt_more', 'new_excerpt_more');?>
<?php $themename = "Zonkiller";$shortname = "nt";$categories = get_categories('hide_empty=0&orderby=name');$wp_cats = array();foreach ($categories as $category_list ) {$wp_cats[$category_list->cat_ID] = $category_list->cat_name;}
array_unshift($wp_cats, "Choose a category"); 

$options = array (
 
array( "name" => $themename." Options",
	"type" => "title"),
array( "name" => "Logo and Icon",
	"type" => "section"),
array( "type" => "open"),
  	array("name" => "Icon",
		  "desc" => "Enter your icon URL, including http://",
		  "id" => $shortname."_icon",
		  "std" => '',
		  "type" => "text"),
	array("name" => "Your Logo",
		  "desc" => "Enter your Logo URL, including http://. It will be shown on the header",
		  "id" => $shortname."_logo",
		  "std" => '',
		  "type" => "text"),
array( "type" => "close"),
array( "name" => "Theme Style and Color",
	"type" => "section"),
array( "type" => "open"),
	array("name" => "Homepage Style", 
		  "desc" => "Select your favorite homepage style",
		  "id" => $shortname."_model",
		  "options" => array("store", "blog"),
		  "std" => "store",
		  "type" => "select"),
	array("name" => "Singleepage Style", 
		  "desc" => "Select your favorite homepage style",
		  "id" => $shortname."_sgmodel",
		  "options" => array("store", "blog"),
		  "std" => "store",
		  "type" => "select"),
  array("name" => "Style Sheet", 
		  "desc" => "Select your favorite color of the style sheet",
		  "id" => $shortname."_color",
		  "options" => array("grey","black","red","bluesky","blue","darkblue","green","orange","purple"),
		  "std" => "red",
		  "type" => "select"),
  array("name" => "Background Style", 
		  "desc" => "Select your favorite background style, or select <b>none</b> if you want to use color style, then enter html color code below!",
		  "id" => $shortname."_bgg",
		  "options" => array("none","style1","style2","style3","style4","style5","style6","style7","style8","style9","style10"),
		  "std" => "style1",
		  "type" => "select"),
	array("name" => "Background Color", 
		  "desc" => "Enter html code of your favorite background color (ex: #ffffff for white, #00000 for black)",
		  "id" => $shortname."_bg",
		  "std" => "#ffffff",
		  "type" => "text"),
  array("name" => "Font Style", 
		  "desc" => "Select your favorite font style! You can see the demo text in the manual guide",
		  "id" => $shortname."_ff",
		  "options" => array("Arial"),
		  "std" => "Arial",
		  "type" => "select"),
array( "type" => "close"),
array( "name" => "Amazon Option",
	"type" => "section"),
array( "type" => "open"),
	array("name" => "Amazon", 
		  "desc" => "Select Amazon Local",
		  "id" => $shortname."_lang_act",
		  "options" => array("Amazon.com"),
		  "std" => "Amazon.com",
		  "type" => "select"), 
  	array("name" => "Affiliate ID", 
		  "desc" => "Enter html code of your favorite background color (ex: #ffffff for white, #00000 for black)",
		  "id" => $shortname."_zonkiller_affid",
		  "std" => "",
		  "type" => "text"),
  	array("name" => "Amazon Public Key", 
		  "desc" => "Enter your Amazon Public Key",
		  "id" => $shortname."_zonkiller_api",
		  "std" => "",
		  "type" => "text"),
  	array("name" => "Amazon Private Key", 
		  "desc" => "Enter your amazon Private Key",
		  "id" => $shortname."_zonkiller_key",
		  "std" => "",
		  "type" => "text"),
	array("name" => "90 Days Cookies", 
		  "desc" => "Do you want to use 90 days cookies?",
		  "id" => $shortname."_cooki",
		  "options" => array("no"),
		  "std" => "yes",
		  "type" => "select"), 
array( "type" => "close"),
array( "name" => "Slider & Discount Finder",
	"type" => "section"),
array( "type" => "open"),	
	array("name" => "Show or Hide Slider", 
		  "desc" => "Do you want to show slider on homepage?",
		  "id" => $shortname."_sowid",
		  "options" => array("yes"),
		  "std" => "yes",
		  "type" => "select"),
  array("name" => "Start Slider Automatically", 
		  "desc" => "Do you want the slider start automatically?",
		  "id" => $shortname."_sowaut",
		  "options" => array("yes","no"),
		  "std" => "yes",
		  "type" => "select"),
	array(	"name" => "Category ID on slider area",
		"desc" => "Enter category ID that will be shown on slider area",
	        "id" => $shortname."_catid",
        	"type" => "text"),
	array(	"name" => "Number of posts on slider",
		"desc" => "Enter with number",
		"std" => "5",
        	"id" => $shortname."_catnum",
	        "type" => "text"),
	array("name" => "Show Search Form Area as", 
		  "desc" => "What do you want to show beside featured slider??",
		  "id" => $shortname."_discount",
		  "options" => array("discount finder","ad banner"),
		  "std" => "discount finder",
		  "type" => "select"),
array( "type" => "close"),
array( "name" => "Advertisement",
	"type" => "section"),
array( "type" => "open"),	
array(	"name" => "Ad Code under Navbar",
		"desc" => "Enter Ad code here! It will be shown under navbar",
        "id" => $shortname."_adnav",
        "type" => "textarea"),
array(	"name" => "Ad Code Beside Featured post (if you deactive discount finder)",
	"desc" => "Enter Ad code here! It will be shown beside featured area",
        "id" => $shortname."_addis",
        "type" => "textarea"),
array(	"name" => "Ad Code Beside under title (single post)",
	"desc" => "Enter Ad code here! It will be shown under post title on single post (if you activate blog mode)",
        "id" => $shortname."_adjud",
        "type" => "textarea"),
	array(	"name" => "Ad Code Beside after post content (single post)",
	"desc" => "Enter Ad code here! It will be shown after post content",
        "id" => $shortname."_adpost",
        "type" => "textarea"),
array( "type" => "close"),

array( "name" => "Add Your Own CSS",
	"type" => "section"),
array( "type" => "open"),	
array(	"name" => "CSS Code",
			"desc" => "Enter your own CSS code here!",
     	"id" => $shortname."_css",
      "type" => "textarea"),
array( "type" => "close"),
);

function mytheme_add_admin() {
 
global $themename, $shortname, $options;
 
if ( $_GET['page'] == basename(__FILE__) ) {
 
	if ( 'save' == $_REQUEST['action'] ) {
 
		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
 
foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
 
	header("Location: admin.php?page=functions.php&saved=true");
die;
 
} 
else if( 'reset' == $_REQUEST['action'] ) {
 
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
 
	header("Location: admin.php?page=functions.php&reset=true");
die;
 
}
}
 
add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'mytheme_admin');
}

function mytheme_add_init() {

$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/functions/functions.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/functions/rm_script.js", false, "1.0");

}
function mytheme_admin() {
 
global $themename, $shortname, $options;
$i=0;
 
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
 
?>
<div class="wrap rm_wrap">
<h2><?php echo $themename; ?> Settings</h2>
 
<div class="rm_opts">
<form method="post">
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
 
case "open":
?>
 
<?php break;
 
case "close":
?>
 
</div>
</div>
<br />

 
<?php break;
 
case "title":
?>
<p>To easily use the <?php echo $themename;?> theme, you can use the menu below.</p>

 
<?php break;
 
case 'text':
?>

<div class="rm_input rm_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
<?php
break;
 
case 'textarea':
?>

<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
  
<?php
break;
 
case 'select':
?>

<div class="rm_input rm_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;
 
case "checkbox":
?>

<div class="rm_input rm_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break; 
case "section":

$i++;

?>

<div class="rm_section">
<div class="rm_title"><h3><img src="<?php bloginfo('template_directory')?>/functions/images/trans.png" class="inactive" alt="""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
</span><div class="clearfix"></div></div>
<div class="rm_options">

 
<?php break;
 
}
}
?>
 
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
</div> 
 

<?php
}
?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>
<?php
class zonkiller_tags_widget extends WP_Widget {
    function zonkiller_tags_widget() {
        $widget_ops = array (
            'classname' => 'zonkiller_tags',
            'description' => __('Show custom tags', 'zonkiller')
        );

        $this->WP_Widget('zonfusion_tags', 'zonkiller : Tags Widget', $widget_ops);
    }

    function widget($args, $instance) {
        extract($args, EXTR_SKIP);
        $title = $instance['title'];
        $number = $instance['number'];

        $tags = array (
            'orderby' => 'count',
            'order' => 'DESC',
            'number' => $number
        );

        $term_list = get_terms('post_tag', $tags);

        //print_r($term_list);


        // Output
        echo $before_widget;

        if (!empty($title)) {
            echo $before_title . __($title, 'zonkiller') . $after_title;
        }
        ;

        foreach ($term_list as $term) {
            echo '<span class="tagged">';

          echo '<a title="' . $term->name . '" href="' . get_term_link($term->slug, $term->taxonomy) . '">';

            echo $term->name;

            echo '</a></span>';
        }

      echo '<br style="clear:both">'.$after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = esc_attr($new_instance['title']);
        $instance['number'] = esc_attr($new_instance['number']);
        return $instance;
    }

    function form($instance) {
        $defaults = array (
            'title' => __('Products Tags', 'zonkiller'),
            'number' => 20
        );

        $instance = wp_parse_args((array)$instance, $defaults);
        $title = esc_attr($instance['title']);
        $number = esc_attr($instance['number']);
?>
        <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'zonkiller'); ?>:
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
            name="<?php echo $this->get_field_name('title'); ?>" type="text"
            value="<?php echo esc_attr($title); ?>" /></label>
                </p>
        <p>
        <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('number', 'zonkiller'); ?>:
    <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>"
        name="<?php echo $this->get_field_name('number'); ?>" type="text"
        value="<?php echo esc_attr($number); ?>" /></label>
                </p>
<?php
    }
}
register_widget('zonkiller_tags_Widget');
function round_num($num, $to_nearest) {
   /*Round fractions down (http://php.net/manual/en/function.floor.php)*/
   return floor($num/$to_nearest)*$to_nearest;
}
 
/* Function that performs a Boxed Style Numbered Pagination (also called Page Navigation).
   Function is largely based on Version 2.4 of the WP-PageNavi plugin */
function pagenavi($before = '', $after = '') {
    global $wpdb, $wp_query;
    $pagenavi_options = array();
    $pagenavi_options['pages_text'] = ('Page %CURRENT_PAGE% of %TOTAL_PAGES%:');
    $pagenavi_options['current_text'] = '%PAGE_NUMBER%';
    $pagenavi_options['page_text'] = '%PAGE_NUMBER%';
    $pagenavi_options['first_text'] = ('First Page');
    $pagenavi_options['last_text'] = ('Last Page');
    $pagenavi_options['next_text'] = 'Next &raquo;';
    $pagenavi_options['prev_text'] = '&laquo; Previous';
    $pagenavi_options['dotright_text'] = '...';
    $pagenavi_options['dotleft_text'] = '...';
    $pagenavi_options['num_pages'] = 5; //continuous block of page numbers
    $pagenavi_options['always_show'] = 0;
    $pagenavi_options['num_larger_page_numbers'] = 0;
    $pagenavi_options['larger_page_numbers_multiple'] = 5;
 
    //If NOT a single Post is being displayed
    /*http://codex.wordpress.org/Function_Reference/is_single)*/
    if (!is_single()) {
        $request = $wp_query->request;
        //intval ? Get the integer value of a variable
        /*http://php.net/manual/en/function.intval.php*/
        $posts_per_page = intval(get_query_var('posts_per_page'));
        //Retrieve variable in the WP_Query class.
        /*http://codex.wordpress.org/Function_Reference/get_query_var*/
        $paged = intval(get_query_var('paged'));
        $numposts = $wp_query->found_posts;
        $max_page = $wp_query->max_num_pages;
 
        //empty ? Determine whether a variable is empty
        /*http://php.net/manual/en/function.empty.php*/
        if(empty($paged) || $paged == 0) {
            $paged = 1;
        }
 
        $pages_to_show = intval($pagenavi_options['num_pages']);
        $larger_page_to_show = intval($pagenavi_options['num_larger_page_numbers']);
        $larger_page_multiple = intval($pagenavi_options['larger_page_numbers_multiple']);
        $pages_to_show_minus_1 = $pages_to_show - 1;
        $half_page_start = floor($pages_to_show_minus_1/2);
        //ceil ? Round fractions up (http://us2.php.net/manual/en/function.ceil.php)
        $half_page_end = ceil($pages_to_show_minus_1/2);
        $start_page = $paged - $half_page_start;
 
        if($start_page <= 0) {
            $start_page = 1;
        }
 
        $end_page = $paged + $half_page_end;
        if(($end_page - $start_page) != $pages_to_show_minus_1) {
            $end_page = $start_page + $pages_to_show_minus_1;
        }
        if($end_page > $max_page) {
            $start_page = $max_page - $pages_to_show_minus_1;
            $end_page = $max_page;
        }
        if($start_page <= 0) {
            $start_page = 1;
        }
 
        $larger_per_page = $larger_page_to_show*$larger_page_multiple;
        //round_num() custom function - Rounds To The Nearest Value.
        $larger_start_page_start = (round_num($start_page, 10) + $larger_page_multiple) - $larger_per_page;
        $larger_start_page_end = round_num($start_page, 10) + $larger_page_multiple;
        $larger_end_page_start = round_num($end_page, 10) + $larger_page_multiple;
        $larger_end_page_end = round_num($end_page, 10) + ($larger_per_page);
 
        if($larger_start_page_end - $larger_page_multiple == $start_page) {
            $larger_start_page_start = $larger_start_page_start - $larger_page_multiple;
            $larger_start_page_end = $larger_start_page_end - $larger_page_multiple;
        }
        if($larger_start_page_start <= 0) {
            $larger_start_page_start = $larger_page_multiple;
        }
        if($larger_start_page_end > $max_page) {
            $larger_start_page_end = $max_page;
        }
        if($larger_end_page_end > $max_page) {
            $larger_end_page_end = $max_page;
        }
        if($max_page > 1 || intval($pagenavi_options['always_show']) == 1) {
            /*http://php.net/manual/en/function.str-replace.php */
            /*number_format_i18n(): Converts integer number to format based on locale (wp-includes/functions.php*/
            $pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
            $pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
            echo $before.'<div class="pagenavi">'."\n";
 
            if(!empty($pages_text)) {
                echo '<span class="pages">'.$pages_text.'</span>';
            }
            //Displays a link to the previous post which exists in chronological order from the current post.
            /*http://codex.wordpress.org/Function_Reference/previous_post_link*/
            previous_posts_link($pagenavi_options['prev_text']);
 
            if ($start_page >= 2 && $pages_to_show < $max_page) {
                $first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);
                //esc_url(): Encodes < > & " ' (less than, greater than, ampersand, double quote, single quote).
                /*http://codex.wordpress.org/Data_Validation*/
                //get_pagenum_link():(wp-includes/link-template.php)-Retrieve get links for page numbers.
                echo '<a href="'.esc_url(get_pagenum_link()).'" class="first" title="'.$first_page_text.'">1</a>';
                if(!empty($pagenavi_options['dotleft_text'])) {
                    echo '<span class="expand">'.$pagenavi_options['dotleft_text'].'</span>';
                }
            }
 
            if($larger_page_to_show > 0 && $larger_start_page_start > 0 && $larger_start_page_end <= $max_page) {
                for($i = $larger_start_page_start; $i < $larger_start_page_end; $i+=$larger_page_multiple) {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a>';
                }
            }
 
            for($i = $start_page; $i  <= $end_page; $i++) {
                if($i == $paged) {
                    $current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
                    echo '<span class="current">'.$current_page_text.'</span>';
                } else {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a>';
                }
            }
 
            if ($end_page < $max_page) {
                if(!empty($pagenavi_options['dotright_text'])) {
                    echo '<span class="expand">'.$pagenavi_options['dotright_text'].'</span>';
                }
                $last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
                echo '<a href="'.esc_url(get_pagenum_link($max_page)).'" class="last" title="'.$last_page_text.'">'.$max_page.'</a>';
            }
            next_posts_link($pagenavi_options['next_text'], $max_page);
 
            if($larger_page_to_show > 0 && $larger_end_page_start < $max_page) {
                for($i = $larger_end_page_start; $i <= $larger_end_page_end; $i+=$larger_page_multiple) {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a>';
                }
            }
            echo '</div>'.$after."\n";
        }
    }
}
if ( ! function_exists( 'breadcrumbs' ) ) :
function breadcrumbs() {

$delimiter = '&rsaquo;';
$home = 'Home';

echo '<div xmlns:v="http://rdf.data-vocabulary.org/#" class="breadcrumb">';

global $post;
echo ' <span typeof="v:Breadcrumb">
<a rel="v:url" property="v:title" href="'.home_url( '/' ).'">'.$home.'</a>
</span> ';

$cats = get_the_category();
if ($cats) {
foreach($cats as $cat) {
echo $delimiter . "<span typeof=\"v:Breadcrumb\">
<a rel=\"v:url\" property=\"v:title\" href=\"".get_category_link($cat->term_id)."\" >$cat->name</a>
</span>";
}
}

echo $delimiter . the_title(' <span typeof=\"v:Breadcrumb\">', '</span>', false);

echo '</div>';

}
endif;
?>
<?php
function rpc($text){
  $text = str_replace("[wpramareviews asin=","Amazon ASIN:", $text);
	return $text;
}
add_filter('the_content', 'rpc');

add_action('admin_menu', 'submenu_zonkiller');

function submenu_zonkiller() {
	add_submenu_page( 'tools.php', 'Register zonkiller ::', 'Register zonkiller ::', 'manage_options', 'reg_wonderzon', 'submenu_zonkiller_callback' ); 
}

function submenu_zonkiller_callback() {
	echo '<center><div class="o-form"><div class="o-form-header"><h2 id="o-form-title">Register Zonkiller</h2><p id="o-form-description">Please enter your name and email below to register your copy. Don\'t worry! We\'ll not share it to public! We will notify you if there are any updates..</p></div><form action="http://www.profitsender.com/pro/subscribe.php" method="post" accept-charset="UTF-8"><div class="o-form-row" style=""><label for="FormValue_CustomField1042">Your Name</label><input type="text" name="FormValue_Fields[CustomField1042]" value="" id="FormValue_CustomField1042"></div><div class="o-form-row" style=""><label for="FormValue_EmailAddress">Your Email</label><input type="text" name="FormValue_Fields[EmailAddress]" value="" id="FormValue_EmailAddress"></div><input type="submit" name="FormButton_Subscribe" value="Register" id="FormButton_Subscribe"><input type="hidden" name="FormValue_ListID" value="992"><input type="hidden" name="FormValue_Command" value="Subscriber.Add" id="FormValue_Command"></form><style type="text/css" media="screen">
.o-form{background-color:#EBF1F7;border:1px solid #0077cc;width:400px;margin-top:20px;}
.o-form form{margin:0px;padding:0px;}
.o-form .o-form-header{background-color:#0077cc;padding:9px;}
.o-form h2{color:#fff;font-family:Arial,sans-serif;font-size:18px;line-height:27px;margin:0px;padding:0px;}
.o-form p{color:#fff;font-family:Arial,sans-serif;font-size:12px;line-height:18px;margin:0px;padding:0px;}
.o-form .o-form-row{margin-top:9px;padding:0 9px;}
.o-form .o-form-row label{color:#0077cc;font-family:Arial,sans-serif;font-size:12px;display:block;font-weight:bold;}
.o-form input[type="text"]{border:1px solid #0077cc;color:#0077cc;padding:5px 7px;}
.o-form input[type="submit"]{margin:20px 9px 18px 9px;padding:5px;}</style></div><br/><small>If you get an error in registration, you can skip it..</small></center>';
}