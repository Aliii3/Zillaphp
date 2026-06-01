<?php
	/**
	 * Template Name: News Articles
	 */
	get_header();
?>
<input type="checkbox" id="toggle">
<div class="wrapper">
    <label for="toggle">
        
    <i class="cancel-icon fas fa-times"></i>
    </label>

	<div class="row justify-content-center">
		<div class="col-lg-10">
			<h3 class="section_subtitle">Get the latest News from Zilla Capital</h3>
		</div>
	</div>
   	<?php echo do_shortcode('[mc4wp_form id="6076"]') ?>
   
</div>

<main class="news_page">
	<?php

		$featured_article_args = array(
			'post_type' => 'post',
			'posts_per_page' => 1,
			'post__in' => get_option( 'sticky_posts' ),
			'ignore_sticky_posts' => 1
		);

		$featured = new WP_Query($featured_article_args);

		if ($featured->have_posts()):
			while($featured->have_posts()): $featured->the_post();
				$image_id = get_post_thumbnail_id();
				$image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE);
				echo '
					<section class="featured_article">
						<img src="'.get_the_post_thumbnail_url().'" alt="'.$image_alt.'" />
						<div class="content_wrapper">
							<time>'.get_the_date('d M Y').'</time>
							<a href="'.get_the_permalink().'">
								<h3>'. wp_trim_words(get_the_title(), 12).'</h3>
							</a>
						</div>
					</section>
				';
			endwhile;
			wp_reset_query();
		endif;
	?>

	<div class="container">
		<div class="before_loop">
			<p class="section_title">Stay up to date</p>
			<p class="section_subtitle">The Latest</p>
		</div>

		<?php

			$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

			$article_args = array(
				'post_type' => 'post',
				'posts_per_page' => 6,
				'ignore_sticky_posts' => 1,
				'post__not_in' => get_option( 'sticky_posts' ),
				'paged' => $paged
			);

			$articles = new WP_Query($article_args);

			if ($articles->have_posts()):
				echo '<div class="row">';
					while($articles->have_posts()): $articles->the_post();
						$image_id = get_post_thumbnail_id();
						$image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE);
						echo '
							<div class="col-12 col-lg-6">
								<article class="news_article">
									<img src="'.get_the_post_thumbnail_url().'" alt="'.$image_alt.'" />
									<div class="content_wrapper">
										<time>'.get_the_date('d M Y').'</time>
										<h3>'.get_the_title().'</h3>
										<a href="'.get_the_permalink().'" class="btn btn-secondary btn-icon-arrow_right-colored">
											Read More
										</a>
									</div>
								</article>
							</div>
						';
					endwhile;

					wp_reset_query();


				echo '</div>';

				$pagination_args = array(
					'current' => max( 1, get_query_var('paged') ),
					'total' =>  $articles->max_num_pages,
					'prev_next'       => true,
					'next_text' => '<i class="fa fa-angle-right"></i>',
					'prev_text' => '<i class="fa fa-angle-left"></i>',
					'type'      => 'array',
					'end_size'  => 1,
					'mid_size'  => 3
				);

				$pages = paginate_links( $pagination_args );

				if ( is_array( $pages ) ) {
					$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
					?>
					<nav aria-label="Page navigation" class="custom_pagination">
						<div class="container">
							<ul class="pagination">
								<?php
									foreach ( $pages as $page ) {
										echo "<li class='list-item'>$page</li>";
									}
								?>
							</ul>
						</div>
					</nav>

					<?php
				}
			endif;
		?>

	</div>


	<section class="news_subscription_form">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<h3 class="section_subtitle">Get The Latest From Zilla Capital</h3>
				</div>
			</div>
			<?php echo do_shortcode('[mc4wp_form id="6076"]') ?>
		</div>
	</section>

</main>

<style>

.wrapper{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background: #fff;
  border-radius: 5px;
  box-shadow: 0px 10px 15px rgba(0,0,0,0.1);

  z-index: 5;
  background: #fff;
  padding: 30px;
  text-align: center;
  max-width: 1200px;
  width: 100%;
  display: flex;
  align-items: center;
  flex-direction: column;
  top: 50%;
  opacity: 1;
  pointer-events: auto;
  transition: all 0.3s ease;
  position: fixed;
}
#toggle{
  display: none;
}
#toggle:checked ~ .wrapper{
  opacity: 0;
  pointer-events: none;
  top: 40%;
}
.wrapper .cancel-icon{
  position: absolute;
  right: 20px;
  top: 20px;
  color: rgb(142,197,252);
  cursor: pointer;
}
.cancel-icon:hover{
  color: rgb(224,195,252);
}

.cancel-icon:before{
  content: "X";
}

.wrapper .icon{
  height: 110px;
  width: 110px;
  background: linear-gradient(136deg, rgb(224,195,252) 0%, rgb(142,197,252) 100%);
  line-height: 110px;
  border-radius: 50%;
  color: #fff;
  font-size: 55px;
}
.wrapper .content{
  margin: 20px 0;
}
.content header{
  font-size: 30px;
  font-weight: 600;
}
.content p{
  color: #333;
  font-size: 16px;
  font-weight: 400;
  margin-left: -3px;
}
.wrapper form{
  width: 98%;
}

.wrapper {
  margin-top: 5px;
}

.wrapper form .btn{
	top: 55%;
}

.fa-remove:before,.fa-close:before,.fa-times:before{
	content:"X";
	font-size: 35px;
    font-style: normal;
}

.section_subtitle{
	 text-transform: none;
}
	
</style>

<?php
	get_footer();
?>