function cm_recent_posts_shortcode($atts, $content = NULL)
{
    $atts = shortcode_atts(
        [
            'orderby' => 'date',
            'posts_per_page' => '2'
        ], $atts, 'recent-posts' );

    $query = new WP_Query( $atts );

    $output = '<div class="recent-posts">';

    while($query->have_posts()) : $query->the_post();
	
$output .= '<div class="blogpostDate"><time class="updated blogPostTime" datetime="' . get_the_date('c') . '"><a class="blogPostA" href="' . get_the_permalink() . '"> <span class="month">' . get_the_date('M') . '</span> <br>' . get_the_date('d') . '</a></time></div>';
				$output .= '<div class="blogPostMain"><p class="blogPostP "><a class="blogPostA blogpostTitle"  href="' . get_permalink() . '">' . get_the_title() . '</a> </p>';
		$output .= '<p class="blogPostP "><a class="blogPostA "  href="' . get_permalink() . '"> <span>  Posted by &nbsp;</span>'  . get_the_author() . '</a> </p> </div>';
        
    endwhile;

    wp_reset_query();
    return $output . '</div>';
}
add_shortcode('recent-posts', 'cm_recent_posts_shortcode');
