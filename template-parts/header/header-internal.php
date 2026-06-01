<header class="internal_page_header">
	<div class="container">
		<?php
			$title_words_count = str_word_count(get_the_title());
			if($title_words_count == 1):
		?>
			<h2 class="one_word">
				<span><?php the_title(); ?></span>
			</h2>
		<?php
			else:
				$page_title = get_the_title();
				$page_title_arr = explode(" ",$page_title);
				$first_word = array_shift($page_title_arr);
				$last_word = array_pop($page_title_arr);?>
				<h2>
					<span><?php echo $first_word; ?></span>
					<?php echo implode(' ', $page_title_arr); ?>
					<span><?php echo $last_word; ?></span>
				</h2>
				<?php
			endif;
		?>
	</div>
</header>
