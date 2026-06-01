<div class="team_member_card col-md-6 col-lg-4">
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
