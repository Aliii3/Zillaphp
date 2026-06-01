<?php get_header(); ?>

<?php while ( have_posts() ): the_post(); ?>

<?php
/* Fetch all meta once */
$aud_file    = get_post_meta( get_the_ID(), '_audio_box',    true );
$a_aud_file  = get_post_meta( get_the_ID(), '_a_audio_box',  true );
$pdf_file    = get_post_meta( get_the_ID(), '_brouchre_box', true );
$FN_news1    = get_post_meta( get_the_ID(), '_FN_box1',      true );
$FN_news2    = get_post_meta( get_the_ID(), '_FN_box2',      true );
$FN_news3    = get_post_meta( get_the_ID(), '_FN_box3',      true );
$a_FN_news1  = get_post_meta( get_the_ID(), '_a_FN_box1',    true );
$a_FN_news2  = get_post_meta( get_the_ID(), '_a_FN_box2',    true );
$a_FN_news3  = get_post_meta( get_the_ID(), '_a_FN_box3',    true );
$image1      = get_post_meta( get_the_ID(), '_FN_news1_img', true );
$image2      = get_post_meta( get_the_ID(), '_FN_news2_img', true );
$image3      = get_post_meta( get_the_ID(), '_FN_news3_img', true );
$arabic_title = get_post_meta( get_the_ID(), '_arabic_title', true );
$md_title    = get_post_meta( get_the_ID(), '_md_title',      true );

$is_flash_note = ! empty( $FN_news1 );
?>

<?php if ( $is_flash_note ): ?>
<!-- ═══════════════════════════════════════════════════
     FLASH NOTE — New Design
════════════════════════════════════════════════════ -->

<?php
/* Use post thumbnail as hero background if it exists */
$hero_bg_url = has_post_thumbnail()
	? get_the_post_thumbnail_url( null, 'full' )
	: 'https://www.zillacapital.com/wp-content/uploads/2025/11/Screenshot-2025-11-08-081425.jpg';
?>

<section class="hero-fn"
         id="top"
         aria-labelledby="fn-title"
         style="--hero-bg: url('<?php echo esc_url( $hero_bg_url ); ?>');">
	<div class="hero-fn-inner">
		<nav class="fn-breadcrumb" aria-label="Breadcrumb">
			<a href="<?php echo esc_url( get_post_type_archive_link( 'reports' ) ); ?>">Research</a>
			<span aria-hidden="true">/</span>
			<span>Flash Note</span>
		</nav>
		<h1 id="fn-title"><?php the_title(); ?></h1>
		<p class="meta"><time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php the_date( 'd M Y' ); ?></time></p>
	</div>
</section>

<?php if ( $pdf_file || $aud_file ): ?>
<div class="fn-action-bar">
	<?php if ( $pdf_file ): ?>
	<a href="<?php echo esc_url( $pdf_file ); ?>" target="_blank" rel="noopener" class="fn-action-btn fn-action-btn--pdf">
		<img src="<?php echo THEME_DIR_URI; ?>/dist/images/pdf-file-icon.svg" alt=""> Download PDF
	</a>
	<?php endif; ?>
	<?php if ( $aud_file ): ?>
	<a href="https://open.spotify.com/show/2i3OkUrJhb6wNodpQ34FDg" target="_blank" rel="noopener" class="fn-action-btn">
		<img src="https://www.zillacapital.com/wp-content/uploads/2022/03/Subscribe-22.png" alt="Subscribe on Spotify" style="height:24px;width:auto;">
	</a>
	<?php endif; ?>
</div>
<?php endif; ?>

<?php if ( $a_FN_news1 ): ?>
<div class="fn-toolbar">
	<div class="fn-lang" role="tablist" aria-label="Article language">
		<button type="button" role="tab" id="tab-en" aria-selected="true"  aria-controls="panel-en">English</button>
		<button type="button" role="tab" id="tab-ar" aria-selected="false" aria-controls="panel-ar">العربية</button>
	</div>
</div>
<?php endif; ?>

<div class="article-wrap">
	<div class="container">

		<!-- English panel -->
		<div id="panel-en" role="tabpanel" aria-labelledby="tab-en" tabindex="0">
			<article class="fn-prose">

				<?php if ( $aud_file ): ?>
				<div class="fn-audio">
					<?php echo wp_audio_shortcode( array( 'src' => $aud_file, 'preload' => 'metadata' ) ); ?>
					<div style="text-align:right;margin-top:8px;">
						<a href="https://open.spotify.com/show/70Fsn9ICiRw0Swkvpwo4n4" target="_blank" rel="noopener">
							<img src="https://www.zillacapital.com/wp-content/uploads/2022/02/Subscribe.png" alt="Subscribe on Spotify" style="height:50px;width:auto;">
						</a>
					</div>
				</div>
				<?php endif; ?>

				<?php if ( $FN_news1 ): ?>
				<section class="fn-section" aria-label="Section 1">
					<?php if ( $image1 ): ?>
					<figure class="fn-figure">
						<img src="<?php echo esc_url( $image1 ); ?>" alt="" loading="lazy">
					</figure>
					<?php endif; ?>
					<div class="fn-col"><?php echo $FN_news1; ?></div>
				</section>
				<?php endif; ?>

				<?php if ( $FN_news2 ): ?>
				<section class="fn-section fn-section--reverse" aria-label="Section 2">
					<?php if ( $image2 ): ?>
					<figure class="fn-figure">
						<img src="<?php echo esc_url( $image2 ); ?>" alt="" loading="lazy">
					</figure>
					<?php endif; ?>
					<div class="fn-col"><?php echo $FN_news2; ?></div>
				</section>
				<?php endif; ?>

				<?php if ( $FN_news3 ): ?>
				<section class="fn-section" aria-label="Section 3">
					<?php if ( $image3 ): ?>
					<figure class="fn-figure">
						<img src="<?php echo esc_url( $image3 ); ?>" alt="" loading="lazy">
					</figure>
					<?php endif; ?>
					<div class="fn-col"><?php echo $FN_news3; ?></div>
				</section>
				<?php endif; ?>

			</article>
		</div><!-- #panel-en -->

		<?php if ( $a_FN_news1 ): ?>
		<!-- Arabic panel -->
		<div id="panel-ar" role="tabpanel" aria-labelledby="tab-ar" hidden tabindex="-1">
			<article class="fn-prose" dir="rtl" lang="ar">

				<?php if ( $a_aud_file ): ?>
				<div class="fn-audio">
					<?php echo wp_audio_shortcode( array( 'src' => $a_aud_file, 'preload' => 'metadata' ) ); ?>
					<div style="text-align:left;margin-top:8px;">
						<a href="https://open.spotify.com/show/4wdl9zyTCpApZujq1WKXWv" target="_blank" rel="noopener">
							<img src="https://www.zillacapital.com/wp-content/uploads/2023/12/Sporify-Ar.png" alt="Spotify" style="height:50px;width:auto;">
						</a>
					</div>
				</div>
				<?php endif; ?>

				<?php if ( $arabic_title ): ?>
				<h1 class="fn-ar-title"><?php echo esc_html( $arabic_title ); ?></h1>
				<?php endif; ?>

				<?php if ( $a_FN_news1 ): ?>
				<section class="fn-section" aria-label="القسم 1">
					<?php if ( $image1 ): ?>
					<figure class="fn-figure">
						<img src="<?php echo esc_url( $image1 ); ?>" alt="" loading="lazy">
					</figure>
					<?php endif; ?>
					<div class="fn-col"><?php echo $a_FN_news1; ?></div>
				</section>
				<?php endif; ?>

				<?php if ( $a_FN_news2 ): ?>
				<section class="fn-section fn-section--reverse" aria-label="القسم 2">
					<?php if ( $image2 ): ?>
					<figure class="fn-figure">
						<img src="<?php echo esc_url( $image2 ); ?>" alt="" loading="lazy">
					</figure>
					<?php endif; ?>
					<div class="fn-col"><?php echo $a_FN_news2; ?></div>
				</section>
				<?php endif; ?>

				<?php if ( $a_FN_news3 ): ?>
				<section class="fn-section" aria-label="القسم 3">
					<?php if ( $image3 ): ?>
					<figure class="fn-figure">
						<img src="<?php echo esc_url( $image3 ); ?>" alt="" loading="lazy">
					</figure>
					<?php endif; ?>
					<div class="fn-col"><?php echo $a_FN_news3; ?></div>
				</section>
				<?php endif; ?>

			</article>
		</div><!-- #panel-ar -->
		<?php endif; ?>

	</div><!-- .container -->
</div><!-- .article-wrap -->

<!-- Related publications -->
<?php
$orig_post = $post;
global $post;
$related = get_posts( array(
	'category__in'   => wp_get_post_categories( $post->ID ),
	'numberposts'    => 4,
	'post_type'      => 'reports',
	'post__not_in'   => array( $post->ID ),
) );

if ( $related ):
?>
<div class="fn-more-wrap">
	<div class="container">
		<div class="fn-section-heading">
			<span class="label">Stay up to date</span>
			<h2>More publications to check</h2>
		</div>
		<ul class="pub-list">
			<?php foreach ( $related as $post ): setup_postdata( $post ); ?>
			<li class="pub-item">
				<span class="pub-item-date"><?php echo get_the_date( 'd M Y' ); ?></span>
				<a class="pub-item-title" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
<?php
wp_reset_postdata();
$post = $orig_post;
endif;
?>

<!-- Subscribe section -->
<div class="fn-subscribe-section">
	<div class="container">
		<div class="subscribe-box">
			<h2>Subscribe to publications</h2>
			<p>Subscribe to download our daily economics and business roundup <span>delivered straight to your inbox</span>.</p>
			<form class="sub-form" action="#" method="get">
				<label class="visually-hidden" for="subName">Your name</label>
				<input id="subName" name="name" type="text" placeholder="Your name" autocomplete="name" required>
				<label class="visually-hidden" for="subEmail">Your email</label>
				<input id="subEmail" name="email" type="email" placeholder="Your email address" autocomplete="email" required>
				<button type="submit">Subscribe</button>
			</form>
		</div>
	</div>
</div>

<?php if ( $a_FN_news1 ): ?>
<script>
(function () {
	var tabs    = Array.from(document.querySelectorAll('.fn-lang [role="tab"]'));
	var panelEn = document.getElementById('panel-en');
	var panelAr = document.getElementById('panel-ar');
	if (!tabs.length || !panelEn || !panelAr) return;

	function activate(lang) {
		var isEn = (lang === 'en');
		panelEn.hidden = !isEn;
		panelAr.hidden =  isEn;
		panelEn.setAttribute('tabindex',  isEn ? '0' : '-1');
		panelAr.setAttribute('tabindex',  isEn ? '-1' : '0');
		document.documentElement.lang = isEn ? 'en' : 'ar';
		tabs.forEach(function (t) {
			var sel = (t.id === 'tab-en') === isEn;
			t.setAttribute('aria-selected', sel ? 'true' : 'false');
		});
	}

	tabs.forEach(function (tab) {
		tab.addEventListener('click', function () {
			activate(tab.id === 'tab-en' ? 'en' : 'ar');
		});
		tab.addEventListener('keydown', function (e) {
			if (e.key !== 'ArrowRight' && e.key !== 'ArrowLeft') return;
			e.preventDefault();
			var next = (tab.id === 'tab-en') ? 'ar' : 'en';
			activate(next);
			document.getElementById('tab-' + next).focus();
		});
	});

	var form = document.querySelector('.sub-form');
	if (form) {
		form.addEventListener('submit', function (e) {
			e.preventDefault();
			var n  = (document.getElementById('subName')  || {}).value || '';
			var em = (document.getElementById('subEmail') || {}).value || '';
			var subject = encodeURIComponent('Publications subscription');
			var body    = encodeURIComponent('Name: ' + n + '\nEmail: ' + em);
			window.location.href = 'mailto:info@zillacapital.com?subject=' + subject + '&body=' + body;
		});
	}
})();
</script>
<?php endif; ?>

<?php else: ?>
<!-- ═══════════════════════════════════════════════════
     NON-FLASH-NOTE REPORT (publication / MENA dashboard)
     Keeps the original clean layout
════════════════════════════════════════════════════ -->

<!-- Hero -->
<div class="page-hero">
	<div class="hero-overlay">
		<div class="hero-title-wrapper"></div>
	</div>
</div>

<main>
	<div class="container">
		<div class="row justify-content-center">
			<div class="article_content col-11 col-md-10">
				<div class="row justify-content-center">
					<div class="col-12 col-md-11">

						<div class="meta_data">
							<div>
								<?php if ( ! $md_title ): ?>
								<div class="label report-label">Publication</div>
								<time><?php the_date( 'd M Y' ); ?></time>
								<?php endif; ?>
							</div>
							<div class="d-none d-md-block">
								<?php if ( $pdf_file ): ?>
								<a href="<?php echo esc_url( $pdf_file ); ?>" target="_blank" rel="noopener">
									<img src="<?php echo THEME_DIR_URI; ?>/dist/images/pdf-file-icon.svg" alt="PDF icon"> Download PDF
								</a>
								<?php endif; ?>
							</div>
						</div>

						<?php
						if ( $md_title ) {
							echo '<br><br><span style="color:#112649;font-size:54px;font-weight:700;">MENA DASHBOARD </span><span style="color:#50cdef;font-size:42px;font-weight:700;">' . esc_html( $md_title ) . '</span>';
						} else {
							the_title( '<h3>', '</h3>' );
						}
						?>

						<div class="meta_data d-block d-md-none mt-2">
							<?php if ( $pdf_file ): ?>
							<a href="<?php echo esc_url( $pdf_file ); ?>" target="_blank" rel="noopener">
								<img src="<?php echo THEME_DIR_URI; ?>/dist/images/pdf-file-icon.svg" alt="PDF icon"> Download PDF
							</a>
							<?php endif; ?>
						</div>

						<?php if ( ! $md_title && has_post_thumbnail() ): ?>
						<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
						<?php endif; ?>

						<?php if ( $aud_file ): ?>
						<div style="margin-top:10px;">
							<?php echo wp_audio_shortcode( array( 'src' => $aud_file, 'preload' => 'metadata' ) ); ?>
						</div>
						<?php endif; ?>

						<?php
						if ( $md_title ) {
							echo '<div style="text-align:justify;"><h3 style="margin-bottom:10px;margin-top:40px;color:#112649;">INTRODUCTION:</h3><span style="color:#50cdef;font-size:22px;font-weight:600;">MENA Dashboard </span><span style="color:#112649;font-size:22px;font-weight:600;white-space:pre-line;">is a comprehensive tool that is designed to provide an in-depth overview of all key macroeconomic indicators across the MENA region.</span></div><br><br>';
							for ( $i = 1; $i <= 12; $i++ ) {
								$MD_img = get_post_meta( get_the_ID(), '_MD_' . $i . '_img', true );
								if ( $MD_img ) {
									echo '<div><img src="' . esc_url( $MD_img ) . '" alt="" style="margin-bottom:5px;object-fit:scale-down;max-height:none;"></div>';
								}
							}
						} else {
							echo '<div class="article_content-content"><br><br>';
							the_content();
							echo '</div>';
						}
						?>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Related publications -->
	<div class="container">
		<?php
		$orig_post = $post;
		global $post;
		$related = get_posts( array(
			'category__in' => wp_get_post_categories( $post->ID ),
			'numberposts'  => 4,
			'post_type'    => 'reports',
			'post__not_in' => array( $post->ID ),
		) );

		if ( $related ) {
			echo '<div class="before_loop">
				<p class="section_title">Stay up to date</p>
				<p class="section_subtitle">More Publications to Check</p>
			</div>
			<div class="row">';
			foreach ( $related as $post ) :
				setup_postdata( $post );
				echo '<div class="col-12 col-lg-6">
					<article class="news_article">';
				if ( has_post_thumbnail() ) {
					$image_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
					echo '<img src="' . get_the_post_thumbnail_url() . '" alt="' . esc_attr( $image_alt ) . '">';
				}
				echo '<div class="content_wrapper">
						<time>' . get_the_date( 'd M Y' ) . '</time>
						<h3>' . get_the_title() . '</h3>
						<a href="' . get_the_permalink() . '" class="btn btn-secondary btn-icon-arrow_right-colored">Read More</a>
					</div>
				</article>
			</div>';
			endforeach;
			echo '</div>';
		}
		wp_reset_postdata();
		$post = $orig_post;
		?>
	</div>
</main>

<style>
/* ── Non-Flash-Note Report Styles ──────────────────────── */
body.single-reports .page-hero { margin-top: -350px; }
.page-hero {
	position: relative;
	width: 100%;
	height: 370px;
	background: url('https://www.zillacapital.com/wp-content/uploads/2025/11/contact.png') center / cover no-repeat;
}
.hero-overlay {
	position: absolute;
	inset: 0;
	display: flex;
	align-items: center;
	justify-content: center;
}
.article_content-content {
	text-align: justify;
	white-space: pre-line;
	color: #12264a;
}
.article_content-content ol {
	white-space: normal;
	padding-left: 20px;
}
html, body {
	width: 100%;
	max-width: 100%;
	overflow-x: hidden;
}
</style>

<?php endif; /* end Flash Note / non-Flash-Note branch */ ?>

<?php endwhile; ?>

<?php get_footer(); ?>
