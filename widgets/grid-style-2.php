<?php

class GridStyle2 extends WP_Widget
{

    public function __construct()
    {
        $widget_options = array(
            'classname' => 'GridStyle2',
            'description' => 'Grid retreive insights, report and news',
        );
        parent::__construct(
            'GridStyle2',
            'WK - Grid Style 2',
            $widget_options
        );

		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_head', array(&$this, 'add_styles_and_scripts') );
		}
  	}

	function add_styles_and_scripts(){
		wp_enqueue_style( 'grid_style_2', THEME_DIR_URI .'/dist/css/grid-style-2.css', array(), '1', 'all' );
	}

    public function widget($args, $instance)
    {
		wp_enqueue_style( 'grid_style_2', THEME_DIR_URI .'/dist/css/grid-style-2.css', array(), '1', 'all' );
        $insights_args = array(
            'post_type' => 'insights',
            'posts_per_page' => 2,
						'ignore_sticky_posts' => true
        );

        $insights_query = new WP_Query($insights_args);

        $news_args = array(
            'post_type' => 'post',
            'posts_per_page' => 1,
						'ignore_sticky_posts' => true
        );

        $news_query = new WP_Query($news_args);

        $reports_args = array(
            'post_type' => 'reports',
            'posts_per_page' => 1,
						'ignore_sticky_posts' => true
        );

        $reports_query = new WP_Query($reports_args);

        echo '
			<section class="grid-style-2">
				<div class="content-wrapper">
					<h2 class="section_title">' . $instance['section_title'] . '</h2>
					<p class="section_subtitle">' . $instance['section_subtitle'] . '</p>
				</div>

				<header style="background-image: url(' . get_the_post_thumbnail_url($insights_query->posts[0]->ID) . ')">

					<div class="wrapper">
						<span class="label insight-label">
							Newsletter
						</span>

						<time>' . get_the_date('d M Y', $insights_query->posts[0]->ID) . '</time>

						<a href="' . get_permalink($insights_query->posts[0]->ID) . '">
							<h3>' . $insights_query->posts[0]->post_title . '</h3>
						</a>
					</div>
				</header>


				<div class="container">
					<div class="row">';

        if ($reports_query):

            while ($reports_query->have_posts()): $reports_query->the_post();

                echo '
															<div class="item col-md-6 col-lg-4">
																<span class="label report-label"> Publication </span>

																<div class="content-wrapper report">
																	<time>' . get_the_date('d M Y') . '</time>

																	<a href="' . get_permalink() . '">
																		<h3>' . get_the_title() . '</h3>
																	</a>
																</div>
															</div>
														';
            endwhile;
            wp_reset_query();
        endif;

        if ($news_query):

            while ($news_query->have_posts()): $news_query->the_post();

                echo '
															<div class="item col-md-6 col-lg-4">
																<span class="label news-label"> News </span>
																<div class="content-wrapper news">
																	<time>' . get_the_date('d M Y') . '</time>

																	<a href="' . get_permalink() . '">
																		<h3>' . get_the_title() . '</h3>
																	</a>
																</div>
															</div>
														';
            endwhile;
            wp_reset_query();
        endif;

        echo '

						<div class="item col-md-6 col-lg-4">
							<span class="label insight-label"> Newsletter </span>
							<div class="content-wrapper insight">
								<time>' . get_the_date('d M Y', $insights_query->posts[1]->ID) . '</time>

								<a href="' . get_permalink($insights_query->posts[1]->ID) . '">
									<h3>' . $insights_query->posts[1]->post_title . '</h3>
								</a>
							</div>
						</div>

					</div>
				</div>

			</section>
		';
    }

    public function form($instance)
    {
        $section_title = !empty($instance['section_title']) ? $instance['section_title'] : '';
        $section_subtitle = !empty($instance['section_subtitle']) ? $instance['section_subtitle'] : '';?>

		<p>
			<label for="<?php echo $this->get_field_id('section_title'); ?>">Section title:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('section_title'); ?>" name="<?php echo $this->get_field_name('section_title'); ?>" value="<?php echo esc_attr($section_title); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('section_subtitle'); ?>">Section subtitle:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('section_subtitle'); ?>" name="<?php echo $this->get_field_name('section_subtitle'); ?>" value="<?php echo esc_attr($section_subtitle); ?>" />
		</p> <?php
}

    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['section_title'] = strip_tags($new_instance['section_title']);
        $instance['section_subtitle'] = strip_tags($new_instance['section_subtitle']);

        return $instance;
    }
}
?>