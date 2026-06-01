<?php

class Team extends WP_Widget {

  	public function __construct() {
    	$widget_options = array(
			'classname' => 'Team',
    		'description' => 'Get Team loop'
    	);
    	parent::__construct(
      		'Team',
      		'WK - Team',
      		$widget_options
    	);
		
		wp_enqueue_script( 'tab_script', THEME_DIR_URI .'/dist/js/tabscript.js' );
		
		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_head', array(&$this, 'add_styles_and_scripts') );
		}
  	}

	function add_styles_and_scripts(){
		wp_enqueue_style( 'team_loop', THEME_DIR_URI .'/dist/css/team_card.css', array(), '1', 'all' );
		wp_enqueue_style( 'tab_style', THEME_DIR_URI .'/dist/css/tabstyle.css', array(), '1', 'all' );
	}

	public function widget($args, $instance) {
		wp_enqueue_style( 'team_loop', THEME_DIR_URI .'/dist/css/team_card.css', array(), '1', 'all' );
		wp_enqueue_style( 'tab_style', THEME_DIR_URI .'/dist/css/tabstyle.css', array(), '1', 'all' );

		$team_args = array(
			'post_type' => 'team',
			'post_status' => 'publish',
			'posts_per_page' => -1
		);

		$team_loop = new WP_Query( $team_args );
		$count = $team_loop->found_posts;
		echo '
				<main class="">
					<div class="container team_wrapper">';
						echo '<!-- ' . $count . '-->';
						if ( $team_loop) :
							echo '
							<div class="internal-page">
								<ul class="nav nav-tabs row">

									<li style="cursor:pointer;" id="10" class="people-tab active shadowTabsItem"><a>Advisory Board</a></li>
									<li style="cursor:pointer;" id="11" class="people-tab"><a>Executive Committee</a></li>

								</ul>
								<div style="" class="10 tab-pane" id="team-10">
									<h2 class="title-1">Non-Executive Advisory Board Members</h2>
									<div class="row">';
										$team_args = array(
											'post_type' => 'team',
											'post_status' => 'publish',
											'posts_per_page' => -1,
											'meta_key'   => 'order',
    										'orderby'    => 'meta_value_num',
    										'order'      => 'ASC',
											'meta_query' => array(
												array(
													'key'     => 'membertype',
													'value'   => 'nxbm',
													'compare' => '=',
												),
											),
										);

										$team_loop = new WP_Query( $team_args );
		
										$count = $team_loop->found_posts;
										$no_per_row = 4;
										$last_line_count = $count % $no_per_row;
										$no_displayed = 0;
										while ( $team_loop->have_posts() ) : $team_loop->the_post();
											
											$leftmargin="0%";
											if (!wp_is_mobile()){

												if ($count - $no_displayed == $last_line_count){
													switch ($last_line_count) {
														case 3:
															$leftmargin="12.5%";
															break;
														case 2:
															$leftmargin="25%";
															break;
														case 1:
															$leftmargin="37.5%";
															break;
													}

												}
												$no_displayed ++;
											}
											?>

											<div class="nxbm_team_member_card col-md-6 col-lg-3" style="margin-left:<?php echo $leftmargin; ?>">
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
													<?php
														if(has_post_thumbnail()):
															the_post_thumbnail();
														endif;
													?>
													<div class="content_wrapper">
														<?php the_title('<h3>', '</h3>') ?>
														<h4><?php echo get_field('position') ?></h4>
														<!-- <? echo get_field('membertype')  ?> -->
													</div>
												</a>
											</div>
		
										<?php
										endwhile;
										wp_reset_postdata(); echo'
									</div>
									<h2 class="title-1">Executive Advisory Board Members</h2>
									<div class="row">';
										$team_args = array(
											'post_type' => 'team',
											'post_status' => 'publish',
											'posts_per_page' => -1,
											'meta_key'   => 'order',
    										'orderby'    => 'meta_value_num',
    										'order'      => 'ASC',
											'meta_query' => array(
												array(
													'key'     => 'membertype',
													'value'   => 'xbm',
													'compare' => '=',
												),
											),
										);

										$team_loop = new WP_Query( $team_args );

										$count = $team_loop->found_posts;
										$no_per_row = 3;
										$last_line_count = $count % $no_per_row;
										$no_displayed = 0;
										while ( $team_loop->have_posts() ) : $team_loop->the_post();
											$leftmargin="0%";
											if (!wp_is_mobile()){
												if ($count - $no_displayed == $last_line_count){
													switch ($last_line_count) {
														case 2:
															$leftmargin="16.66666666%";
															break;
														case 1:
															$leftmargin="33.33333333%";
															break;
													}

												}
												$no_displayed ++;												
											}
											?>

											<div class="xbm_team_member_card col-md-6 col-lg-4" style="margin-left:<?php echo $leftmargin; ?>">
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
													<?php
														if(has_post_thumbnail()):
															the_post_thumbnail();
														endif;
													?>
													<div class="content_wrapper">
														<?php the_title('<h3>', '</h3>') ?>
														<h4><?php echo get_field('position') ?></h4>
														<!-- <? echo get_field('membertype')  ?> -->
													</div>
												</a>
											</div>
		
										<?php
										endwhile;
										wp_reset_postdata(); echo'
									</div>
								</div>
								<div style="display: none;" class="11 tab-pane" id="team-11">
									<div class="row">';
										$team_args = array(
											'post_type' => 'team',
											'post_status' => 'publish',
											'posts_per_page' => -1,
											'meta_key'   => 'order',
    										'orderby'    => 'meta_value_num',
    										'order'      => 'ASC',
											'meta_query' => array(
												array(
													'key'     => 'membertype',
													'value'   => 'xc',
													'compare' => '=',
												),
											),
										);

										$team_loop = new WP_Query( $team_args );
										$count = $team_loop->found_posts;

										while ( $team_loop->have_posts() ) : $team_loop->the_post();
											get_template_part( 'loops/loop', 'team' );
										endwhile;
										wp_reset_postdata(); echo'
									</div>
								</div>
							</div>';
						endif;
						echo'
					</div>
				</main>
		';
	}

  	public function form($instance) {

	}

	public function update($new_instance, $old_instance) {

  	}
}
?>