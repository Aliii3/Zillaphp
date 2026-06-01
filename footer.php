<style>
/* ===== Social Media Footer ===== */
.footer-bottom-area .social-media {
  list-style: none;
  display: flex;
  align-items: center;
  gap: 14px;
  padding: 0;
  margin: 0;
}

.footer-bottom-area .social-media li {
  display: inline-flex;
}

.footer-bottom-area .social-media a {
  width: 40px;
  height: 40px;
  background: rgba(255,255,255,0.15);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
}

.footer-bottom-area .social-media a img {
  width: 18px;
  height: 18px;
  object-fit: contain;
  filter: brightness(0) invert(1);
  transition: all 0.3s ease;
}

/* Hover Effect */
.footer-bottom-area .social-media a:hover {
  background: #4dc8ed;
  transform: translateY(-3px);
}

.footer-bottom-area .social-media a:hover img {
  filter: brightness(0) invert(1);
}

/* Mobile */
@media (max-width: 767px) {
  .footer-bottom-area .social-media {
    justify-content: center;
    margin-bottom: 15px;
  }
}

/* ===== Footer Background ===== */
/* ===== Footer Background ===== */
footer {
  position: relative;
  background-image: url("https://www.zillacapital.com/wp-content/uploads/2025/11/contact.png");
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  padding-top: 80px;
  padding-bottom: 60px;
  overflow: hidden;
}

/* Overlay */
footer::before {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(16, 38, 73, 0.6);
  z-index: 0;
}

/* فقط المحتوى الرئيسي */
footer > .container {
  position: relative;
  z-index: 1;
}

/* Footer bottom */
.footer-bottom-area {
  background: #102649;
  padding: 20px 0;
}

</style>

<footer>
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 col-lg-3">

				<a href="<?php echo site_url(); ?>" class="brand" title="<?php echo get_bloginfo('name'); ?>">
					<img src="https://www.zillacapital.com/wp-content/uploads/2026/01/cropped-zilla-capital-logo@2x.png"
					     alt="<?php echo get_bloginfo('name'); ?>"
					     style="max-height: 48px; width: auto; filter: brightness(0) invert(1);">
				</a>

				<ul class="contact-info">
					<li>
						<a href="tel:<?php echo get_option('phone_number'); ?>">
							<?php echo get_option('phone_number'); ?>
						</a>
					</li>
					<li>
						<a href="mailto:<?php echo get_option('email'); ?>">
							<?php echo get_option('email'); ?>
						</a>
					</li>
					<li>
						<a href="<?php echo get_option('location_link'); ?>" class="address" target="_blank" rel="noopener">
							<?php echo get_option('location_text'); ?>
						</a>
					</li>
					<li>
						<a href="#" class="address">
							Abu Dhabi Office: 3509, 35, Al Maqam tower, ADGM Square, Al Maryah Island, Abu Dhabi, UAE
						</a>
					</li>
				</ul>

			</div>

			<div class="col-12 col-md-6 col-lg-3">
				<h2><?php echo wp_get_nav_menu_name('footer_menu_1'); ?></h2>
				<?php
					wp_nav_menu(array(
						'theme_location' => 'footer_menu_1',
						'menu_class' => 'menu',
						'container' => false,
					));
				?>
			</div>

			<div class="col-12 col-md-6 col-lg-3">
				<h2><?php echo wp_get_nav_menu_name('footer_menu_2'); ?></h2>
				<?php
					wp_nav_menu(array(
						'theme_location' => 'footer_menu_2',
						'menu_class' => 'menu',
						'container' => false,
					));
				?>
			</div>

			<div class="col-12 col-md-6 col-lg-3">
				<h2><?php echo wp_get_nav_menu_name('footer_menu_3'); ?></h2>
				<?php
					wp_nav_menu(array(
						'theme_location' => 'footer_menu_3',
						'menu_class' => 'menu',
						'container' => false,
					));
				?>
			</div>

			<?php
				wp_nav_menu(array(
					'theme_location' => 'footer_menu_bottom_area',
					'container_class' => 'col-12 col-md-6 footer_bottom_menu d-block d-md-none',
				));
			?>
		</div>
	</div>
</footer>

<div class="footer-bottom-area">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12 col-md-6">
				<ul class="social-media">
  <li>
    <a href="https://www.linkedin.com/company/3577054/admin/"
       title="LinkedIn" target="_blank" rel="noopener">
      <img src="<?php echo THEME_DIR_URI . '/dist/images/linkedin.png'; ?>" alt="LinkedIn">
    </a>
  </li>

  <li>
    <a href="https://www.youtube.com/@zillacapital1027"
       title="YouTube" target="_blank" rel="noopener">
      <img src="<?php echo THEME_DIR_URI . '/dist/images/youtube.png'; ?>" alt="YouTube">
    </a>
  </li>

  <li>
    <a href="https://www.facebook.com/ZillaCapital/"
       title="Facebook" target="_blank" rel="noopener">
      <img src="<?php echo THEME_DIR_URI . '/dist/images/facebook.png'; ?>" alt="Facebook">
    </a>
  </li>

  <li>
  <a href="https://www.instagram.com/zilla.capital"
     title="Instagram" target="_blank" rel="noopener">
     
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="white">
      <path d="M7.75 2h8.5C19.5 2 22 4.5 22 7.75v8.5C22 19.5 19.5 22 16.25 22h-8.5C4.5 22 2 19.5 2 16.25v-8.5C2 4.5 4.5 2 7.75 2zm4.25 5.5a4.75 4.75 0 100 9.5 4.75 4.75 0 000-9.5zm0 7.75a3 3 0 110-6 3 3 0 010 6zm4.5-8.75a1 1 0 100-2 1 1 0 000 2z"/>
    </svg>

  </a>
</li>


  <li>
    <a href="https://x.com/zillacapital?s=11"
       title="Twitter / X" target="_blank" rel="noopener">
      <img src="<?php echo THEME_DIR_URI . '/dist/images/twitter.png'; ?>" alt="Twitter">
    </a>
  </li>
</ul>

			</div>

			<?php
				wp_nav_menu(array(
					'theme_location' => 'footer_menu_bottom_area',
					'container_class' => 'col-12 col-md-6 footer_bottom_menu d-none d-md-block',
				));
			?>
		</div>
	</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
