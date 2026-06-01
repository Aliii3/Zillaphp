<?php


	/*
	** ==========================================
	**  Custom Meta Box : Details - in : Reports FOR Flash Note
	** ==========================================
	*/

	function add_FN_details_box() {
		add_meta_box('details-box', 'Flash Note', 'FN_det_box', 'reports', 'normal');
	}

	function FN_det_box($post) {
		$settings = array(
			'tinymce'       => array(
				'setup' => 'function (ed) {
					tinymce.documentBaseURL = "' . get_admin_url() . '";
				}',
			),
			'quicktags'     => TRUE,
			'editor_class'  => 'frontend-article-editor',
			'textarea_rows' => 3,
			'media_buttons' => FALSE,
		);

		wp_nonce_field('details', '_arabic_title');
		
		wp_nonce_field('details', '_FN_box1');
		wp_nonce_field('details', '_FN_box2');
		wp_nonce_field('details', '_FN_box3');
		
		wp_nonce_field('details', '_a_FN_box1');
		wp_nonce_field('details', '_a_FN_box2');
		wp_nonce_field('details', '_a_FN_box3');
		
		wp_nonce_field('details', '_FN_news1_img');
		wp_nonce_field('details', '_FN_news2_img');
		wp_nonce_field('details', '_FN_news3_img');

		$arabic_title = get_post_meta($post->ID, '_arabic_title', true);
		
		$newsvalue1 = get_post_meta($post->ID, '_FN_box1', true);
		$newsvalue2 = get_post_meta($post->ID, '_FN_box2', true);
		$newsvalue3 = get_post_meta($post->ID, '_FN_box3', true);

		$anewsvalue1 = get_post_meta($post->ID, '_a_FN_box1', true);
		$anewsvalue2 = get_post_meta($post->ID, '_a_FN_box2', true);
		$anewsvalue3 = get_post_meta($post->ID, '_a_FN_box3', true);

		$_FN_news1_img = get_post_meta($post->ID, '_FN_news1_img', true);
		$_FN_news2_img = get_post_meta($post->ID, '_FN_news2_img', true);
		$_FN_news3_img = get_post_meta($post->ID, '_FN_news3_img', true);
				
		?>
		
		<?php
		echo '<label class="det">Flash Note Arabic Title</label>';
		echo "<input type='text' style='width: 100%;' id='arabic_title' name='arabic_title' value='".$arabic_title."'>";

		echo '<label class="det">Flash Note Paragraph 1</label>';
		wp_editor($newsvalue1, 'FN_box_1', $settings);

		echo '<label class="det">Flash Note Arabic Paragraph 1</label>';
		wp_editor($anewsvalue1, 'a_FN_box_1', $settings);

		echo '<label class="det">Flash Note Image 1:</label>';
		?>
				<p>
					<img class="custom_media_image" src="<?php echo $_FN_news1_img;?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block"><br>			
					<input type="text" class="widefat custom_media_url" name="FN_news1_img" id="FN_news1_img" value="<?php echo $_FN_news1_img;?>">
					<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="0" value="Upload Image" style="margin-top:5px;">
				</p>
		<?php

		echo '<label class="det">Flash Note Paragraph 2</label>';
		wp_editor($newsvalue2, 'FN_box_2', $settings);

		echo '<label class="det">Flash Note Arabic Paragraph 2</label>';
		wp_editor($anewsvalue2, 'a_FN_box_2', $settings);

		echo '<label class="det">Flash Note Image 2:</label>';

		?>
				<p>
					<img class="custom_media_image" src="<?php echo $_FN_news2_img;?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block"><br>			
					<input type="text" class="widefat custom_media_url" name="FN_news2_img" id="FN_news2_img" value="<?php echo $_FN_news2_img;?>">
					<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="0" value="Upload Image" style="margin-top:5px;">
				</p>
		<?php

		echo '<label class="det">Flash Note Paragraph 3</label>';
		wp_editor($newsvalue3, 'FN_box_3', $settings);

		echo '<label class="det">Flash Note Arabic Paragraph 3</label>';
		wp_editor($anewsvalue3, 'a_FN_box_3', $settings);
		
		echo '<label class="det">Flash Note Image 3:</label>';
		?>
				<p>
					<img class="custom_media_image" src="<?php echo $_FN_news3_img;?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block"><br>			
					<input type="text" class="widefat custom_media_url" name="FN_news3_img" id="FN_news3_img" value="<?php echo $_FN_news3_img;?>">
					<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="0" value="Upload Image" style="margin-top:5px;">
				</p>
		<?php

		wp_nonce_field('details', '_md_title');
		echo '<hr>';
		echo '<label class="det">Mena Dashboard quarter number and year</label>';
		$md_title = get_post_meta($post->ID, '_md_title', true);
		echo "<input type='text' style='width: 100%;' id='md_title' name='md_title' value='" . $md_title . "'><br>";
		
		for ($i=1; $i <= 12; $i ++){
			wp_nonce_field('details', '_MD_' . $i . '_img');
			echo '<label class="det">Mena Dashboard Image ' . $i . ':</label>';
			$_MD_img = get_post_meta($post->ID, '_MD_' . $i .'_img', true);
		?>
				<p>
					<img class="custom_media_image" src="<?php echo $_MD_img;?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block"><br>			
					<input type="text" class="widefat custom_media_url" name="MD_<?php echo $i;?>_img" id="MD_<?php echo $i;?>_img" value="<?php echo $_MD_img;?>">
					<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="0" value="Upload Image" style="margin-top:5px;">
				</p>
		<?php
		}
		
		echo '<style>
			textarea[id*="details"] {
				width: 100%;
				margin-bottom: 15px;
				height: 60px;
			}
			.det {
				font-weight: bolder;
				font-size: 15px;
				margin: 18px 0 10px;
				display: -webkit-box;
			}
		</style>';
	}

  	function FN_details_box($ID) {

		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}

		if (!current_user_can('edit_post', $ID)) {
			return;
		}

		if (!isset($_POST['FN_box_1']) && !isset($_POST['md_title'])) {
			return;
		}
				
		$arabic_title = $_POST['arabic_title'];

		$newsdata1 = $_POST['FN_box_1'];
		$newsdata2 = $_POST['FN_box_2'];
		$newsdata3 = $_POST['FN_box_3'];
		
		$anewsdata1 = $_POST['a_FN_box_1'];
		$anewsdata2 = $_POST['a_FN_box_2'];
		$anewsdata3 = $_POST['a_FN_box_3'];

		$FN_news1_img = $_POST['FN_news1_img'];
		$FN_news2_img = $_POST['FN_news2_img'];
		$FN_news3_img = $_POST['FN_news3_img'];

		update_post_meta($ID, '_arabic_title', $arabic_title);

		update_post_meta($ID, '_FN_box1', $newsdata1);
		update_post_meta($ID, '_FN_box2', $newsdata2);
		update_post_meta($ID, '_FN_box3', $newsdata3);

		update_post_meta($ID, '_a_FN_box1', $anewsdata1);
		update_post_meta($ID, '_a_FN_box2', $anewsdata2);
		update_post_meta($ID, '_a_FN_box3', $anewsdata3);

		update_post_meta($ID, '_FN_news1_img', $FN_news1_img);
		update_post_meta($ID, '_FN_news2_img', $FN_news2_img);
		update_post_meta($ID, '_FN_news3_img', $FN_news3_img);
		
		$md_title = $_POST['md_title'];
		update_post_meta($ID, '_md_title', $md_title);
		
		for ($i=1; $i <= 12; $i ++){
			$MD_img = $_POST['MD_' . $i. '_img'];
			update_post_meta($ID, '_MD_' . $i. '_img', $MD_img);
		}
	}

	add_action('add_meta_boxes', 'add_FN_details_box');
	add_action('save_post', 'FN_details_box');


	/*
	** ==========================================
	**  Custom Meta Box : Details - in : Insights
	** ==========================================
	*/

	function add_details_box() {
		add_meta_box('details-box', 'Insight Details', 'det_box', 'insights', 'normal');
	}

	function det_box($post) {
		$settings = array(
			'tinymce'       => array(
				'setup' => 'function (ed) {
					tinymce.documentBaseURL = "' . get_admin_url() . '";
				}',
			),
			'quicktags'     => TRUE,
			'editor_class'  => 'frontend-article-editor',
			'textarea_rows' => 3,
			'media_buttons' => FALSE,
		);
		
		/* New Updates For Parsing Starts Here */

		wp_nonce_field('details', '_newsletter_nonce');

		$newsletter_text = get_post_meta($post->ID, '_newsletter_text', true);
		
		echo '<label class="det">Paste Newsletter Text Here</label>';
		echo '<textarea id="newsletter_text" name="newsletter_text" rows="8" style="width:100%;">' . esc_textarea($newsletter_text) . '</textarea>';

		if ( isset($_POST['newsletter_text']) )
		{
			if (!empty($newsletter_text)) {
				echo '<hr>';
				echo '<h3>Parsed Content</h3>';

				// Show parsed content if already processed
				for ($i = 1; $i <= 10; $i++) {
					$talk = get_post_meta($post->ID, '_news_box' . $i . '_top_talks', true);
					echo '<p>Top Talk ' . $i . ': ' . esc_html($talk) . '</p>';
				}
			}

			// Retrieve the stored Arabic title
			// $arabic_title = get_post_meta($post->ID, '_arabic_title', true);
			// echo '<label class="det">Morning Talks Arabic Title</label>';
			// echo "<input type='text' style='width: 100%;' id='arabic_title' name='arabic_title' value='" . esc_attr($arabic_title) . "'>";

			// Loop through 20 news boxes
			for ($new_no = 1; $new_no <= 20; $new_no++) {
				// Retrieve stored values
				$newsvalue_top = get_post_meta($post->ID, '_news_box' . $new_no . '_top', true);
				$newsvalue_bot = get_post_meta($post->ID, '_news_box' . $new_no . '_bot', true);
				$a_newsvalue_top = get_post_meta($post->ID, '_a_news_box' . $new_no . '_top', true);
				$a_newsvalue_bot = get_post_meta($post->ID, '_a_news_box' . $new_no . '_bot', true);

				// Labeling logic
				$category = $new_no < 6 ? 'Economy ' : ($new_no < 11 ? 'M&As ' : ($new_no < 16 ? 'Industries ' : 'GeoPolitical '));
				$sub_category = (($new_no - 1) % 5) + 1;
				$label_prefix = ($new_no <= 15) ? 'Morning Talks News ' . $new_no . ' (' . $category . $sub_category . ')' : '';

				// Display fields
				echo '<label class="det">' . $label_prefix . ' Top</label>';
				wp_editor($newsvalue_top, 'news_box_' . $new_no . '_top', ['textarea_name' => 'news_box_' . $new_no . '_top']);

				echo '<label class="det">' . $label_prefix . ' Bottom</label>';
				wp_editor($newsvalue_bot, 'news_box_' . $new_no . '_bot', ['textarea_name' => 'news_box_' . $new_no . '_bot']);

				echo '<label class="det">Arabic Top</label>';
				wp_editor($a_newsvalue_top, 'a_news_box_' . $new_no . '_top', ['textarea_name' => 'a_news_box_' . $new_no . '_top']);

				echo '<label class="det">Arabic Bottom</label>';
				wp_editor($a_newsvalue_bot, 'a_news_box_' . $new_no . '_bot', ['textarea_name' => 'a_news_box_' . $new_no . '_bot']);
			}
			// Loop through 10 top talks
			for ($top_talks_no = 1; $top_talks_no <= 10; $top_talks_no++) {
				$newsvalue_top_talks = get_post_meta($post->ID, '_news_box' . $top_talks_no . '_top_talks', true);

				echo '<label class="det">Top Talks ' . $top_talks_no . '</label>';
				echo '<select name="news_box_' . $top_talks_no . '_top_talks" id="news_box_' . $top_talks_no . '_top_talks">';
				echo '  <option value="0">Select Topic</option>';

				for ($option_no = 1; $option_no <= 20; $option_no++) {
					$category = $option_no < 6 ? 'Economy ' : ($option_no < 11 ? 'M&As ' : ($option_no < 16 ? 'Industries ' : 'GeoPolitical '));
					$sub_category = (($option_no - 1) % 5) + 1;
					$selected = isset($newsvalue_top_talks) && $newsvalue_top_talks == $option_no ? 'selected="true"' : '';

					echo '  <option value="' . $option_no . '" ' . $selected . '>' . $category . $sub_category . '</option>';
				}

				echo '</select>';
			}
		}
	
	/* New Updates For Parsing Ends Here */
		wp_nonce_field('details', '_details_box');
		wp_nonce_field('details', '_details_boxx');
		wp_nonce_field('details', '_details_boxxx');
		wp_nonce_field('details', '_details_boxxxx');
		wp_nonce_field('details', '_details_boxxxxx');
		
		wp_nonce_field('details', '_kp_local_news');
		wp_nonce_field('details', '_a_kp_local_news');

		wp_nonce_field('details', '_arabic_title');
		for ($new_no=1; $new_no <= 20; $new_no ++){
			wp_nonce_field('details', '_news_box' . $new_no . '_top');
			wp_nonce_field('details', '_news_box' . $new_no . '_bot');

			wp_nonce_field('details', '_a_news_box' . $new_no . '_top');
			wp_nonce_field('details', '_a_news_box' . $new_no . '_bot');
		}
		
		for ($new_no=1; $new_no <= 11; $new_no ++){
			wp_nonce_field('details', '_kp_ln_news_box' . $new_no . '_top');
			wp_nonce_field('details', '_a_kp_ln_news_box' . $new_no . '_top');
			wp_nonce_field('details', '_kp_ln_news_box' . $new_no . '_bot');
			wp_nonce_field('details', '_a_kp_ln_news_box' . $new_no . '_bot');
		}

		for ($top_talks_no=1; $top_talks_no <= 10; $top_talks_no ++){
			wp_nonce_field('details', '_kp_news_box' . $top_talks_no . '_top_talks');
			wp_nonce_field('details', '_kp_news_box' . $top_talks_no . '_top_talks');
			wp_nonce_field('details', '_a_kp_news_box' . $top_talks_no . '_top_talks');
			wp_nonce_field('details', '_a_kp_news_box' . $top_talks_no . '_top_talks');
		}
		
		for ($top_talks_no=1; $top_talks_no <= 10; $top_talks_no ++){
			wp_nonce_field('details', '_news_box' . $top_talks_no . '_top_talks');
			wp_nonce_field('details', '_news_box' . $top_talks_no . '_top_talks');
			wp_nonce_field('details', '_a_news_box' . $top_talks_no . '_top_talks');
			wp_nonce_field('details', '_a_news_box' . $top_talks_no . '_top_talks');
		}
		
		wp_nonce_field('details', '_audio_Player_Msg');
		wp_nonce_field('details', '_a_audio_Player_Msg');
		
		wp_nonce_field('details', '_GE_audio_Player_Msg');
		wp_nonce_field('details', '_a_GE_audio_Player_Msg');

		wp_nonce_field('details', '_KP_audio_Player_Msg');
		wp_nonce_field('details', '_a_KP_audio_Player_Msg');

		for ($new_no= 1; $new_no <= 5; $new_no ++){
			wp_nonce_field('details', '_GE_news_box' . $new_no . '_top');
			wp_nonce_field('details', '_GE_news_box' . $new_no . '_bot');
			wp_nonce_field('details', '_GE_news' . $new_no . '_img');
			
			wp_nonce_field('details', '_a_GE_news_box' . $new_no . '_top');
			wp_nonce_field('details', '_a_GE_news_box' . $new_no . '_bot');
		}

		for ($new_no= 1; $new_no <= 4; $new_no ++){
			wp_nonce_field('details', '_KP_news_box' . $new_no . '_top');
			wp_nonce_field('details', '_KP_news_box' . $new_no . '_bot');
			wp_nonce_field('details', '_KP_news' . $new_no . '_img');
			
			wp_nonce_field('details', '_a_KP_news_box' . $new_no . '_top');
			wp_nonce_field('details', '_a_KP_news_box' . $new_no . '_bot');
		}
		$value = get_post_meta($post->ID, '_details_box', true);
		$valuee = get_post_meta($post->ID, '_details_boxx', true);
		$valueee = get_post_meta($post->ID, '_details_boxxx', true);
		$valueeee = get_post_meta($post->ID, '_details_boxxxx', true);
		$valueeeee = get_post_meta($post->ID, '_details_boxxxxx', true);

		$kp_local_news = get_post_meta($post->ID, '_kp_local_news', true);
		$a_kp_local_news = get_post_meta($post->ID, '_a_kp_local_news', true);
		
		$_audio_Player_Msg_value = get_post_meta($post->ID, '_audio_Player_Msg', true);
		$_a_audio_Player_Msg_value = get_post_meta($post->ID, '_a_audio_Player_Msg', true);
		
		$_GE_audio_Player_Msg_value = get_post_meta($post->ID, '_GE_audio_Player_Msg', true);
		$_a_GE_audio_Player_Msg_value = get_post_meta($post->ID, '_a_GE_audio_Player_Msg', true);

		$_KP_audio_Player_Msg_value = get_post_meta($post->ID, '_KP_audio_Player_Msg', true);
		$_a_KP_audio_Player_Msg_value = get_post_meta($post->ID, '_a_KP_audio_Player_Msg', true);
		
		if(!$_audio_Player_Msg_value)
			$_audio_Player_Msg_value = "Knowing the latest news has never been easier!<br>Do not miss our 2 minutes top Morning Talks…";

		if(!$_a_audio_Player_Msg_value)
			$_a_audio_Player_Msg_value = "معرفة آخر الأخبار لم تكن بهذه السهولة من قبل!<br>لا تفوت أفضل محادثاتنا الصباحية التي تبلغ مدتها دقيقتين…";

		if(!$_GE_audio_Player_Msg_value)
			$_GE_audio_Player_Msg_value = "Zilla Capital Global Espresso is a global newsletter containing a weekly briefing from the editors of The Economist, Bloomberg, New York Times and Financial Times after adding our analysis and signature.";

		if(!$_a_GE_audio_Player_Msg_value)
			$_a_GE_audio_Player_Msg_value = "Zilla Capital Global Espresso هي نشرة إخبارية عالمية تحتوي على ملخص أسبوعي من محرري The Economist, Bloomberg, New York Times and Financial Times يعد اضافة تحليلنا وتوقيعنا.";

		if(!$_KP_audio_Player_Msg_value)
			$_KP_audio_Player_Msg_value = "Knowing the latest news has never been easier!";

		if(!$_a_KP_audio_Player_Msg_value)
			$_a_KP_audio_Player_Msg_value = "معرفة آخر الأخبار لم تكن بهذه السهولة من قبل!";
		?>
		
		<?php
		echo '<a href="#Morning_Talks">Go to Morning Talks Section</a><br>';
		echo '<a href="#Global_Espresso">Go to Global Espresso Section</a><br>';

		/*
		echo '<div style="display: none;">';
			echo '<label class="kpdet">Test</label>';
			wp_editor($test_box, 'test_of_new_box');
		echo '</div>';
		*/
		
		$kp_ln_newsvalue_top = get_post_meta($post->ID, '_kp_ln_news_box1_top', true);
		if ($kp_ln_newsvalue_top){

			echo '<label class="kpdet">Kingdom Pulse - Local News Main</label>';
			wp_editor($kp_local_news, 'kp_local_news');

			echo '<label class="kpdet">Kingdom Pulse - Local News Main (Arabic)</label>';
			wp_editor($a_kp_local_news, 'a_kp_local_news');
		
			for ($new_no=1; $new_no <= 11; $new_no ++){
				$kp_ln_newsvalue_top = get_post_meta($post->ID, '_kp_ln_news_box' . $new_no . '_top', true);
				$kp_ln_newsvalue_bot = get_post_meta($post->ID, '_kp_ln_news_box' . $new_no . '_bot', true);

				$a_kp_ln_newsvalue_top = get_post_meta($post->ID, '_a_kp_ln_news_box' . $new_no . '_top', true);
				$a_kp_ln_newsvalue_bot = get_post_meta($post->ID, '_a_kp_ln_news_box' . $new_no . '_bot', true);

				echo '<label class="kpdet">' . 'Kingdom Pulse - Local News ' . $new_no . ' Title (' . ($new_no<=5 ? 'Left' : 'Right') . ')' . '</label>';
				wp_editor($kp_ln_newsvalue_top, 'kp_ln_news_box_' . $new_no . '_top', $settings);

				echo '<label class="kpdet">' . 'Kingdom Pulse - Local News ' . $new_no . ' Details (' . ($new_no<=5 ? 'Left' : 'Right') . ')' . '</label>';
				wp_editor($kp_ln_newsvalue_bot, 'kp_ln_news_box_' . $new_no . '_bot', $settings);

				echo '<label class="kpdet">Arabic Title</label>';
				wp_editor($a_kp_ln_newsvalue_top, 'a_kp_ln_news_box_' . $new_no . '_top', $settings);

				echo '<label class="kpdet">Arabic Details</label>';
				wp_editor($a_kp_ln_newsvalue_bot, 'a_kp_ln_news_box_' . $new_no . '_bot', $settings);
			}
		
			for ($KP_new_no=1; $KP_new_no <= 4; $KP_new_no ++){
				$KP_newsvalue_top = get_post_meta($post->ID, '_KP_news_box' . $KP_new_no . '_top', true);
				$KP_newsvalue_bot = get_post_meta($post->ID, '_KP_news_box' . $KP_new_no . '_bot', true);
				$a_KP_newsvalue_top = get_post_meta($post->ID, '_a_KP_news_box' . $KP_new_no . '_top', true);
				$a_KP_newsvalue_bot = get_post_meta($post->ID, '_a_KP_news_box' . $KP_new_no . '_bot', true);

				$_KP_news_img = get_post_meta($post->ID, '_KP_news' . $KP_new_no . '_img', true);
				
				echo '<label class="kpdet">Kingdom Pulse - Global Front ' . $KP_new_no . ' Image:</label>';
			?>
				<p>
					<img class="custom_media_image" src="<?php echo $_KP_news_img;?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block"><br>			
					<input type="text" class="widefat custom_media_url" name="KP_news<?php echo $KP_new_no ?>_img" id="KP_news<?php echo $KP_new_no ?>_img" value="<?php echo $_KP_news_img;?>">
					<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="0" value="Upload Image" style="margin-top:5px;">
				</p>
			<?php		
				echo '<label class="kpdet">Kingdom Pulse - Global Front ' . $KP_new_no . ' Title</label>';
				wp_editor($KP_newsvalue_top, 'KP_news_box_' . $KP_new_no . '_top', $settings);

				echo '<label class="kpdet">Kingdom Pulse - Global Front ' . $KP_new_no . ' Content</label>';
				wp_editor($KP_newsvalue_bot, 'KP_news_box_' . $KP_new_no . '_bot', $settings);

				echo '<label class="kpdet">Arabic Title</label>';
				wp_editor($a_KP_newsvalue_top, 'a_KP_news_box_' . $KP_new_no . '_top', $settings);

				echo '<label class="kpdet">Arabic Content</label>';
				wp_editor($a_KP_newsvalue_bot, 'a_KP_news_box_' . $KP_new_no . '_bot', $settings);

			}

			echo '<label class="kpdet">Kingdom Pulse Audio Player Message</label>';
			wp_editor($_KP_audio_Player_Msg_value, 'KP_audio_Player_Msg', $settings);

			echo '<label class="kpdet">Kingdom Pulse Audio Player Arabic Message</label>';
			wp_editor($_a_KP_audio_Player_Msg_value, 'a_KP_audio_Player_Msg', $settings);

			for ($top_talks_no=1; $top_talks_no <= 10; $top_talks_no ++){
				$newsvalue_top_talks = get_post_meta($post->ID, '_kp_news_box' . $top_talks_no . '_top_talks', true);
				echo '<!-- ' . $newsvalue_top_talks . '-->';
				echo '<label class="det">Top Talks ' . $top_talks_no . '</label>';
				echo '<select name="kp_news_box_' . $top_talks_no . '_top_talks" id="kp_news_box_' . $top_talks_no . '_top_talks">';
				echo '  <option value="0">Select Topic</option>';
				for ($option_no=1; $option_no<=15; $option_no++){
					echo '  <option value="'.$option_no.'" ' . (isset($newsvalue_top_talks) && $newsvalue_top_talks == $option_no ? 'selected="true"' : '') . '>' . ($option_no < 12 ? 'Local News ' . $option_no : 'On The Global Front ' . ($option_no - 11))  . '</option>';
				}
				echo '</select>';
			}
		}
		$newsvalue_top = get_post_meta($post->ID, '_news_box1_top', true);
		if ($newsvalue_top){
			echo '<hr id="Morning_Talks">';
			for ($new_no=1; $new_no <= 20; $new_no ++){
				$newsvalue_top = get_post_meta($post->ID, '_news_box' . $new_no . '_top', true);
				$newsvalue_bot = get_post_meta($post->ID, '_news_box' . $new_no . '_bot', true);

				$a_newsvalue_top = get_post_meta($post->ID, '_a_news_box' . $new_no . '_top', true);
				$a_newsvalue_bot = get_post_meta($post->ID, '_a_news_box' . $new_no . '_bot', true);

				echo '<label class="det">' . ($new_no <= 15 ? 'Morning Talks News ' . $new_no . ' (' :  '') . ($new_no < 6 ? 'Economy ' : ($new_no < 11 ? 'M&As ' : ($new_no < 16 ? 'Industries ' : 'GeoPolitical '))) . ((($new_no-1)%5)+1) . ($new_no <= 15 ? ')' :  '') . ' Top</label>';
				wp_editor($newsvalue_top, 'news_box_' . $new_no . '_top', $settings);

				echo '<label class="det">' . ($new_no <= 15 ? 'Morning Talks News ' . $new_no . ' (' :  '') . ($new_no < 6 ? 'Economy ' : ($new_no < 11 ? 'M&As ' : ($new_no < 16 ? 'Industries ' : 'GeoPolitical '))) . ((($new_no-1)%5)+1) . ($new_no <= 15 ? ')' :  '') . ' Bottom</label>';
				wp_editor($newsvalue_bot, 'news_box_' . $new_no . '_bot', $settings);

				echo '<label class="det">Arabic Top</label>';
				wp_editor($a_newsvalue_top, 'a_news_box_' . $new_no . '_top', $settings);

				echo '<label class="det">Arabic Bottom</label>';
				wp_editor($a_newsvalue_bot, 'a_news_box_' . $new_no . '_bot', $settings);

			}
			
			echo '<label class="det">Morning Talks Audio Player Message</label>';
			wp_editor($_audio_Player_Msg_value, 'audio_Player_Msg', $settings);

			echo '<label class="det">Morning Talks Audio Player Arabic Message</label>';
			wp_editor($_a_audio_Player_Msg_value, 'a_audio_Player_Msg', $settings);
			
			$arabic_title = get_post_meta($post->ID, '_arabic_title', true);
			echo '<label class="det">Morning Talks Arabic Title</label>';
			echo "<input type='text' style='width: 100%;' id='arabic_title' name='arabic_title' value='".$arabic_title."'>";
			
			for ($top_talks_no=1; $top_talks_no <= 10; $top_talks_no ++){
				$newsvalue_top_talks = get_post_meta($post->ID, '_news_box' . $top_talks_no . '_top_talks', true);
				echo '<!-- ' . $newsvalue_top_talks . '-->';
				echo '<label class="det">Top Talks ' . $top_talks_no . '</label>';
				echo '<select name="news_box_' . $top_talks_no . '_top_talks" id="news_box_' . $top_talks_no . '_top_talks">';
				echo '  <option value="0">Select Topic</option>';
				for ($option_no=1; $option_no<=20; $option_no++){
					echo '  <option value="'.$option_no.'" ' . (isset($newsvalue_top_talks) && $newsvalue_top_talks == $option_no ? 'selected="true"' : '') . '>' . ($option_no < 6 ? 'Economy ' : ($option_no < 11 ? 'M&As ' : ($option_no < 16 ? 'Industries ' : 'GeoPolitical '))) . ((($option_no-1)%5)+1) . '</option>';
				}
				echo '</select>';
			}
		}
		
		echo '<hr id="Global_Espresso">';

		for ($GE_new_no=1; $GE_new_no <= 5; $GE_new_no ++){
			$GE_newsvalue_top = get_post_meta($post->ID, '_GE_news_box' . $GE_new_no . '_top', true);
			$GE_newsvalue_bot = get_post_meta($post->ID, '_GE_news_box' . $GE_new_no . '_bot', true);
			$a_GE_newsvalue_top = get_post_meta($post->ID, '_a_GE_news_box' . $GE_new_no . '_top', true);
			$a_GE_newsvalue_bot = get_post_meta($post->ID, '_a_GE_news_box' . $GE_new_no . '_bot', true);

			$_GE_news_img = get_post_meta($post->ID, '_GE_news' . $GE_new_no . '_img', true);
			
			echo '<label class="det">Global Espresso News ' . $GE_new_no . ' Image:</label>';
		?>
			<p>
				<img class="custom_media_image" src="<?php echo $_GE_news_img;?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block"><br>			
				<input type="text" class="widefat custom_media_url" name="GE_news<?php echo $GE_new_no ?>_img" id="GE_news<?php echo $GE_new_no ?>_img" value="<?php echo $_GE_news_img;?>">
				<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="0" value="Upload Image" style="margin-top:5px;">
			</p>
		<?php		
			echo '<label class="det">Global Espresso News ' . $GE_new_no . ' Title</label>';
			wp_editor($GE_newsvalue_top, 'GE_news_box_' . $GE_new_no . '_top', $settings);

			echo '<label class="det">Global Espresso News ' . $GE_new_no . ' Content</label>';
			wp_editor($GE_newsvalue_bot, 'GE_news_box_' . $GE_new_no . '_bot', $settings);

			echo '<label class="det">Arabic Title</label>';
			wp_editor($a_GE_newsvalue_top, 'a_GE_news_box_' . $GE_new_no . '_top', $settings);

			echo '<label class="det">Arabic Content</label>';
			wp_editor($a_GE_newsvalue_bot, 'a_GE_news_box_' . $GE_new_no . '_bot', $settings);

		}

		echo '<label class="det">Global Espresso Audio Player Message</label>';
		wp_editor($_GE_audio_Player_Msg_value, 'GE_audio_Player_Msg', $settings);

		echo '<label class="det">Global Espresso Audio Player Arabic Message</label>';
		wp_editor($_a_GE_audio_Player_Msg_value, 'a_GE_audio_Player_Msg', $settings);

		echo '<label class="det">Economic Outlook </label>';
		wp_editor($value, 'details_box_e');
		echo '<label class="det">Political Events </label>';
		wp_editor($valuee, 'details_box_ee');
		echo '<label class="det">Stock Market </label>';
		wp_editor($valueee, 'details_box_eee');
		echo '<label class="det">Companies Transactions </label>';
		wp_editor($valueeee, 'details_box_eeee');
		echo '<label class="det">Sports and Culture </label>';
		wp_editor($valueeeee, 'details_box_eeeee');
		echo '<style>
			textarea[id*="details"] {
				width: 100%;
				margin-bottom: 15px;
				height: 60px;
			}
			.det {
				font-weight: bolder;
				font-size: 15px;
				margin: 18px 0 10px;
				display: -webkit-box;
			}
			.kpdet {
				font-weight: bolder;
				font-size: 15px;
				margin: 18px 0 10px;
				display: -webkit-box;
				color: DarkGreen;
			}			
		</style>';
	}
	
  	function detailssss_box($ID) {
/*
		if (!isset($_POST['_details_box'])) {
			return;
		}

		if (!wp_verify_nonce($_POST['_details_box'], 'details')) {
			return;
		}
*/
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}

		if (!current_user_can('edit_post', $ID)) {
			return;
		}

	/*	if (!isset($_POST['details_box_e'])) {
			return;
		} 
	*/
		if (!isset($_POST['KP_news_box_1_top']) && !isset($_POST['news_box_1_top']) && !isset($_POST['GE_news_box_1_top']) && !isset($_POST['details_box_e'])) {
			return;
		}
		
		for ($GE_new_no=1; $GE_new_no <= 5; $GE_new_no ++){
			$GE_newsdatatop = $_POST['GE_news_box_' . $GE_new_no . '_top'];
			$GE_newsdatabot = $_POST['GE_news_box_' . $GE_new_no . '_bot'];
			$a_GE_newsdatatop = $_POST['a_GE_news_box_' . $GE_new_no . '_top'];
			$a_GE_newsdatabot = $_POST['a_GE_news_box_' . $GE_new_no . '_bot'];

			$GE_news_img = $_POST['GE_news' . $GE_new_no . '_img'];

			update_post_meta($ID, '_GE_news_box' . $GE_new_no . '_top', $GE_newsdatatop);
			update_post_meta($ID, '_GE_news_box' . $GE_new_no . '_bot', $GE_newsdatabot);
			update_post_meta($ID, '_a_GE_news_box' . $GE_new_no . '_top', $a_GE_newsdatatop);
			update_post_meta($ID, '_a_GE_news_box' . $GE_new_no . '_bot', $a_GE_newsdatabot);

			update_post_meta($ID, '_GE_news' . $GE_new_no . '_img', $GE_news_img);
		}		

		for ($KP_new_no=1; $KP_new_no <= 4; $KP_new_no ++){
			$KP_newsdatatop = $_POST['KP_news_box_' . $KP_new_no . '_top'];
			$KP_newsdatabot = $_POST['KP_news_box_' . $KP_new_no . '_bot'];
			$a_KP_newsdatatop = $_POST['a_KP_news_box_' . $KP_new_no . '_top'];
			$a_KP_newsdatabot = $_POST['a_KP_news_box_' . $KP_new_no . '_bot'];

			$KP_news_img = $_POST['KP_news' . $KP_new_no . '_img'];

			update_post_meta($ID, '_KP_news_box' . $KP_new_no . '_top', $KP_newsdatatop);
			update_post_meta($ID, '_KP_news_box' . $KP_new_no . '_bot', $KP_newsdatabot);
			update_post_meta($ID, '_a_KP_news_box' . $KP_new_no . '_top', $a_KP_newsdatatop);
			update_post_meta($ID, '_a_KP_news_box' . $KP_new_no . '_bot', $a_KP_newsdatabot);

			update_post_meta($ID, '_KP_news' . $KP_new_no . '_img', $KP_news_img);
		}
		if ( !isset($_POST['newsletter_text']) ) {
			for ($new_no=1; $new_no <= 20; $new_no ++){
				$newsdatatop = $_POST['news_box_' . $new_no . '_top'];
				$newsdatabot = $_POST['news_box_' . $new_no . '_bot'];

				$a_newsdatatop = $_POST['a_news_box_' . $new_no . '_top'];
				$a_newsdatabot = $_POST['a_news_box_' . $new_no . '_bot'];

				update_post_meta($ID, '_news_box' . $new_no . '_top', $newsdatatop);
				update_post_meta($ID, '_news_box' . $new_no . '_bot', $newsdatabot);

				update_post_meta($ID, '_a_news_box' . $new_no . '_top', $a_newsdatatop);
				update_post_meta($ID, '_a_news_box' . $new_no . '_bot', $a_newsdatabot);
			}

			for ($top_talks_no=1; $top_talks_no <= 10; $top_talks_no ++){
				$newsdatatoptalks = $_POST['news_box_' . $top_talks_no . '_top_talks'];
				update_post_meta($ID, '_news_box' . $top_talks_no . '_top_talks', $newsdatatoptalks);
			}
		}
		for ($new_no=1; $new_no <= 11; $new_no ++){
			$kp_ln_newsdatatop = $_POST['kp_ln_news_box_' . $new_no . '_top'];
			$a_kp_ln_newsdatatop = $_POST['a_kp_ln_news_box_' . $new_no . '_top'];

			$kp_ln_newsdatabot = $_POST['kp_ln_news_box_' . $new_no . '_bot'];
			$a_kp_ln_newsdatabot = $_POST['a_kp_ln_news_box_' . $new_no . '_bot'];

			update_post_meta($ID, '_kp_ln_news_box' . $new_no . '_top', $kp_ln_newsdatatop);
			update_post_meta($ID, '_a_kp_ln_news_box' . $new_no . '_top', $a_kp_ln_newsdatatop);

			update_post_meta($ID, '_kp_ln_news_box' . $new_no . '_bot', $kp_ln_newsdatabot);
			update_post_meta($ID, '_a_kp_ln_news_box' . $new_no . '_bot', $a_kp_ln_newsdatabot);
		}

		for ($top_talks_no=1; $top_talks_no <= 10; $top_talks_no ++){
			$newsdatatoptalks = $_POST['kp_news_box_' . $top_talks_no . '_top_talks'];
			update_post_meta($ID, '_kp_news_box' . $top_talks_no . '_top_talks', $newsdatatoptalks);
		}
		$audio_Player_Msg = $_POST['audio_Player_Msg'];
		update_post_meta($ID, '_audio_Player_Msg', $audio_Player_Msg);

		$a_audio_Player_Msg = $_POST['a_audio_Player_Msg'];
		update_post_meta($ID, '_a_audio_Player_Msg', $a_audio_Player_Msg);

		$arabic_title = $_POST['arabic_title'];
		update_post_meta($ID, '_arabic_title', $arabic_title);

		$GE_audio_Player_Msg = $_POST['GE_audio_Player_Msg'];
		update_post_meta($ID, '_GE_audio_Player_Msg', $GE_audio_Player_Msg);

		$a_GE_audio_Player_Msg = $_POST['a_GE_audio_Player_Msg'];
		update_post_meta($ID, '_a_GE_audio_Player_Msg', $a_GE_audio_Player_Msg);
		$GE_audio_Player_Msg = $_POST['GE_audio_Player_Msg'];
		update_post_meta($ID, '_GE_audio_Player_Msg', $GE_audio_Player_Msg);

		$a_GE_audio_Player_Msg = $_POST['a_GE_audio_Player_Msg'];
		update_post_meta($ID, '_a_GE_audio_Player_Msg', $a_GE_audio_Player_Msg);

		$KP_audio_Player_Msg = $_POST['KP_audio_Player_Msg'];
		update_post_meta($ID, '_KP_audio_Player_Msg', $KP_audio_Player_Msg);

		$a_KP_audio_Player_Msg = $_POST['a_KP_audio_Player_Msg'];
		update_post_meta($ID, '_a_KP_audio_Player_Msg', $a_KP_audio_Player_Msg);

	/*	$test_of_new_box = $_POST['test_of_new_box'];
		
		if ($test_of_new_box){
			$separator = "\r\n";
			$line = strtok($test_of_new_box, $separator);
			
			$line_counter = 0;
			while ($line !== false) {
				$line_counter++;
				if ($line_counter==3)
					$kp_local_news = $line;
				if ($line_counter==4)
					$a_kp_local_news = $line;
				
				$line = strtok( $separator );
			}
			#$a_kp_local_news = $test_of_new_box;
		}
		else{
			$kp_local_news = $_POST['kp_local_news'];
			$a_kp_local_news = $_POST['a_kp_local_news'];
		}			
	*/
	
		$kp_local_news = $_POST['kp_local_news'];
		$a_kp_local_news = $_POST['a_kp_local_news'];
		
		update_post_meta($ID, '_kp_local_news', $kp_local_news);
		update_post_meta($ID, '_a_kp_local_news', $a_kp_local_news);

		$data = $_POST['details_box_e'];
		$dataa = $_POST['details_box_ee'];
		$dataaa = $_POST['details_box_eee'];
		$dataaaa = $_POST['details_box_eeee'];
		$dataaaaa = $_POST['details_box_eeeee'];
				
		update_post_meta($ID, '_details_box', $data);
		update_post_meta($ID, '_details_boxx', $dataa);
		update_post_meta($ID, '_details_boxxx', $dataaa);
		update_post_meta($ID, '_details_boxxxx', $dataaaa);
		update_post_meta($ID, '_details_boxxxxx', $dataaaaa);
	}

	add_action('add_meta_boxes', 'add_details_box');
	add_action('save_post', 'detailssss_box');

	/* New Updates For Parsing Starts Here */
	
	/**
	 * Splits a paragraph into the first sentence (title) and the rest (details).
	 * Uses a regex that splits on a period not immediately followed by a digit.
	 *
	 * @param string $paragraph
	 * @return array [title, details]
	 */
	function extractTitleAndDetails($paragraph) {
		// First, try to match a pattern where the sentence ends with a period,
		// a space, a reference in parentheses (e.g. ". (Arab News)"),
		// then optional spaces and a newline.
		if (preg_match('/^(.*?\.[ ]+\([^)]*\))[ \t]*(?:\r?\n)(.*)$/s', $paragraph, $matches)) {
			$title = trim($matches[1]);     // e.g. "Non-oil exports rose 17% Y-o-Y in 4Q24. (Arab News)"
			$details = trim($matches[2]);   // Everything after the newline, with extra spaces removed.
			return [$title, $details];
		} 
		// Fall back to the generic pattern.
		elseif (preg_match('/^(.*?)(\.(?!\d))(\s+|$)(.*)$/s', $paragraph, $matches)) {
			$title = trim($matches[1] . $matches[2]); 
			$details = trim($matches[4]);
			return [$title, $details];
		} 
		else {
			return [trim($paragraph), ''];
		}
	}

	/**
	 * Splits an Arabic paragraph into title and details.
	 * The rule is: the title is the first sentence that ends with a period followed by a space and a reference in parentheses,
	 * immediately followed by a newline or the end-of-string.
	 *
	 * @param string $paragraph
	 * @return array [title, details]
	 */
	function extractArabicTitleAndDetails($paragraph) {
		if (preg_match('/^(.*?)(\.(?!\d))(\s+|$)(.*)$/s', $paragraph, $matches)) {
			$title = trim($matches[1] . $matches[2]);  // include the period
			$details = trim($matches[4]);
			return [$title, $details];
		} else {
			return [trim($paragraph), ''];
		}	
	}

	/**
	 * Updated detailed sections parsing.
	 * Each numbered item is assumed to contain both the English and Arabic texts.
	 * The English block is taken from the beginning up to the first newline that follows a reference (". (Arab News)")
	 * and the Arabic block is the rest.
	 *
	 * @param string $text  The full newsletter text.
	 * @param array  $output  The existing output array to which detailed sections will be added.
	 * @return array  Updated output including detailed sections.
	 */
	function parse_detailed_sections($text, $output) {
		$categories = ['Economy', 'M&As', 'Industries', 'Geopolitical'];
		foreach ($categories as $cat) {
			if (preg_match('/' . preg_quote($cat, '/') . '\n(.*?)(?=\n(?:' . implode('|', $categories) . ')\n|$)/s', $text, $matches)) {
				$sectionText = trim($matches[1]);
				// Use numbered items; each item represents one full topic.
				preg_match_all('/(^\d+\..*(?:\n(?!\d+\.).*)*)/m', $sectionText, $itemMatches);
				$itemsArray = $itemMatches[0];
				$sectionItems = [];
				//error_log("Found " . count($itemsArray) . " items for section " . $cat);
				foreach ($itemsArray as $item) {
					$item = trim($item);
					// Remove the leading numbering (e.g. "1. ")
					$item = preg_replace('/^\d+\.\s*/', '', $item);
					
					// Attempt to split the item into English and Arabic parts.
					// First, try to split at a newline that follows the reference, allowing for trailing spaces.
					
					$englishBlock = $item;
					$arabicBlock = '';
					if (preg_match('/^(.*?\.\s+\([^)]+\))[ \t]*(?:\r?\n)+(.*)$/s', $item, $parts)) {
						$englishBlock = trim($parts[1]);
						$arabicBlock  = trim($parts[2]);
						//error_log("Split using newline after reference: English: " . $englishBlock);
					} 
					// Otherwise, try to split at the first occurrence of an Arabic character.
					elseif (preg_match('/^(.*?)([\x{0600}-\x{06FF}].*)$/u', $item, $parts)) {
						$englishBlock = trim($parts[1]);
						$arabicBlock  = trim($parts[2]);
						//error_log("Split using first Arabic character: English: " . $englishBlock);
					}
					
					// Now, extract the title and details from each part.
					list($titleEng, $detailsEng) = extractTitleAndDetails($englishBlock);
					list($titleAra, $detailsAra) = extractArabicTitleAndDetails($arabicBlock);

					// In case the Arabic block didn't match the pattern,
					// you might decide that if titleAra is empty, try to extract the next sentence manually.
					if (empty($titleAra) && !empty($arabicBlock)) {
						// For example, split by the first period.
						if (preg_match('/^(.*?\.)\s*(.*)$/s', $arabicBlock, $tmp)) {
							$titleAra = trim($tmp[1]);
							$detailsAra = trim($tmp[2]);
						} else {
							$titleAra = trim($arabicBlock);
							$detailsAra = '';
						}
					}
					
					$sectionItems[] = [
						'title_english'   => $titleEng,
						'details_english' => $detailsEng,
						'title_arabic'    => $titleAra,
						'details_arabic'  => $detailsAra,
					];
					// error_log("Parsed section item: " . print_r(end($sectionItems), true));
				}
				$output[$cat] = $sectionItems;
			}
		}
		return $output;
	}

	/**
	 * Main parser for the newsletter.
	 * It returns an array with keys: title, introduction, talks, and detailed sections.
	 *
	 * Assumes the newsletter text has the following parts:
	 * - A line beginning with "Catchy subject:" for the subject.
	 * - A block beginning with "Podcast:" that contains two paragraphs (English and Arabic).
	 * - A "Top Talks" section with bullet lines (•) for headlines.
	 * - Detailed sections for each category (Economy, M&As, Industries, Geopolitical)
	 *   where each item is one numbered item containing both English and Arabic.
	 *
	 * @param string $text
	 * @return array
	 */
	function parse_newsletter($text, $type) {

		if ($type === "kingdom_pulse") {
/*					// Kingdom Pulse Parsing
					
			$output = [
				'top_talks' => [],
				'local' => [],
				'global' => [],
			];

			// Normalize line breaks
			$text = preg_replace("/\r\n|\r/", "\n", trim($text));	

			error_log("text Value: " . print_r($text, true));			
								
			preg_match("/^KINGDOM PULSE\s*(.*?)\n\n/s", $text, $matches);
			
			error_log("matches Value: " . print_r($matches, true));
			
			$body = isset($matches[1]) ? trim(str_replace("\n\n", "\n", $matches[1])) : $text;
			
			error_log("body Value: " . print_r($body, true));
			
			$sections = explode("\n\n", $body);
			
			error_log("sections Value: " . print_r($sections, true));
			
			$currentSection = "";
			
			foreach ($sections as $section) {
				if (strpos($section, "Top Talks") === 0) {
					$currentSection = "top_talks";
				} elseif (strpos($section, "LOCAL NEWS") === 0) {
					$currentSection = "local";
				} elseif (strpos($section, "ON THE GLOBAL FRONT") === 0) {
					$currentSection = "global";
				} else {
					if ($currentSection === "top_talks") {
						$output['top_talks'][] = ['index' => trim($section)];
					} elseif ($currentSection === "local" || $currentSection === "global") {
						preg_match("/^(.*?)\.(.*?)\((.*?)\)$/s", trim($section), $matches);
						if ($matches) {
							$output[$currentSection][] = [
								'title_english' => trim($matches[1]),
								'details_english' => trim($matches[2]),
								'reference' => trim($matches[3])
							];
						}
					}
				}
			}*/
			$output = [
				'top_talks' => [],
				'local' => [],
				'global' => [],
			];

			$text = str_replace("\r\n", "\n", $text);
			
			$sections = explode("\n", $text);
			
			//print_r($sections);
			// file_put_contents('sectionsarray.txt', print_r($sections, true));
			
			$currentSection = "";
			//$currentSection = "top_talks";
			
			foreach ($sections as $section) {
				if (strpos($section, "نبض المملكة") !== false) {
					$currentSection = "top_talks";
				} elseif (strpos($section, "LOCAL NEWS") !== false) {
					$currentSection = "local";
				} elseif (strpos($section, "ON THE GLOBAL FRONT") !== false) {
					$currentSection = "global";
				} else {
					if ($currentSection === "top_talks") {
					   if (strpos($section, "•") === 0) {
							$topic_line = trim(ltrim($section, "•"));
							// Regex: capture the topic title (up to a full stop), then whitespace,
							// then the category in parentheses, then whitespace, then the index in parentheses.
							if (preg_match('/^(.*?\.)\s*\((Local|Global)\)\s*\((\d+)\)/i', $topic_line, $matches)) {
								$title = trim($matches[1]); // includes the period
								$category = trim($matches[2]);
								$index = trim($matches[3]);
								$output['top_talks'][] = [
									'title' => $title,
									'category' => $category,
									'index' => $index
								];
							}
						}
					} elseif ($currentSection === "local") {
						// preg_match("/^(.*?)\.(.*?)\((.*?)\)$/s", trim($section), $matches);
						if (preg_match('/[\x{0600}-\x{06FF}]/u', $section)) {
							// The section contains Arabic characters – parse as Arabic.
							if (preg_match('/^(.*?)(\.(?!\d|\s*\())\s+(.+)$/su', $section, $matches)) {
								$output[$currentSection][] = [
									'title_arabic'   => trim($matches[1] . $matches[2]),
									'details_arabic' => trim($matches[3])
								];
							} else {
								$output[$currentSection][] = [
									'title_arabic'   => trim($section),
									'details_arabic' => ''
								];
							}
						} else {
							$section = preg_replace('/^\s*\d+\.\s*/', '', $section);
							if (!empty(trim($section))) {
								// No Arabic characters found – parse as English.
								if (preg_match('/^(.*?)(?<!\d)\.\s+(.*)$/s', $section, $matches)) {
									$output[$currentSection][] = [
										'title_english'   => trim($matches[1]) . '.',  // Include the period in the title
										'details_english' => trim($matches[2])
									];
								} else {
									$output[$currentSection][] = [
										'title_english'   => trim($section),
										'details_english' => ''
									];
								}
							}
						}

					} elseif ($currentSection === "global") {
					}
				}
			}

			if (preg_match('/ON THE GLOBAL FRONT\s*(.*)$/is', $text, $matches)) {
				$globalBlock = trim($matches[1]);
			} else {
				$globalBlock = '';
			}	
			
			// Assume $globalBlock contains the entire "ON THE GLOBAL FRONT" section
			$globalBlock = preg_replace('/^ON THE GLOBAL FRONT\s*/i', '', $globalBlock);

			// Split the global block by blank lines (i.e. double newlines) to get full topics.
			// $global_sections = preg_split('/\n\s*\n/', $globalBlock);
			// Split the $globalBlock string into sections wherever a newline character (\n) is followed by a number and a period (e.g., 1., 2., 3., etc.)
			$global_sections = preg_split('/\n(?=\d\.)/', $globalBlock);
			
			foreach ($global_sections as $section) {
				$section = trim($section);
				if (empty($section)) {
					continue;
				}
				// Remove any topic numbering (e.g., "1. " or "12. ") from the beginning.
				$section = preg_replace('/^\s*\d+\.\s*/', '', $section);
				
				// Use regex to split the English part into title and details.
				// The regex matches from the beginning until the first period that is not preceded by a digit.
				if (preg_match('/^(.*?)(?<!\d)\.\s+(.*)$/s', $section, $matches)) {
					$title_english = trim($matches[1]) . '.';
					$remaining_text = trim($matches[2]);  // This should include the rest of the English details.
				} else {
					$title_english = trim($section);
					$remaining_text = '';
				}
				
				// Now, split the remaining text into the English details and the Arabic block.
				// We look for the first occurrence of an Arabic character.
				if (preg_match('/^(.*?)([\p{Arabic}].*)$/us', $remaining_text, $matches)) {
					$details_english = trim($matches[1]);  // English details (can span multiple lines)
					$arabic_full = trim($matches[2]);      // Arabic text block (starts at the first Arabic character)
				} else {
					$details_english = $remaining_text;
					$arabic_full = '';
				}
				
				// Split the Arabic block into title and details using our helper function.
				list($title_arabic, $details_arabic) = extractTitleAndDetails($arabic_full);
				
				// Save the parsed global topic.
				$output['global'][] = [
					'title_english'   => $title_english,
					'details_english' => $details_english,
					'title_arabic'    => $title_arabic,
					'details_arabic'  => $details_arabic
				];
			}			
		} elseif ($type === "morning_talks") {

			$output = [
				'title'         => '',
				'introduction'  => [],
				'talks'         => []
				// Detailed sections will be added later.
			];
			
			// Normalize line endings.
			$text = str_replace("\r\n", "\n", $text);
			
			// Split text into blocks separated by two or more newlines.
			$blocks = preg_split('/\n{2,}/', $text);
			
			// --- 1. Extract the Catchy Subject ---
			foreach ($blocks as $block) {
				if (stripos($block, 'Catchy subject:') !== false) {
					$output['title'] = trim(str_ireplace('Catchy subject:', '', $block));
					break;
				}
			}
			
			// --- 2. Extract Podcast Introduction ---
			foreach ($blocks as $block) {
				if (stripos($block, 'Podcast:') !== false) {
					$introText = trim(str_ireplace('Podcast:', '', $block));
					$introParagraphs = preg_split('/\n+/', $introText);
					foreach ($introParagraphs as $para) {
						if (trim($para) !== '') {
							list($firstSentence, $ignored) = extractTitleAndDetails($para);
							$output['introduction'][] = $firstSentence;
						}
					}
					break;
				}
			}
			
			// --- 3. Extract Top Talks ---
			$topTalksBlock = '';
			foreach ($blocks as $block) {
				if (stripos($block, 'Top Talks') !== false) {
					$topTalksBlock = $block;
					break;
				}
			}
			if ($topTalksBlock !== '') {
				$lines = preg_split('/\n/', $topTalksBlock);
				foreach ($lines as $line) {
					$line = trim($line);
					if (strpos($line, '•') === 0) {
						if (!preg_match('/[\x{0600}-\x{06FF}]/u', $line)) {
							$lineContent = trim(ltrim($line, '•'));
							if (preg_match('/^(.*?)(\.(?!\d))\s*\(([^)]+)\)\s*\((\d+)\)/', $lineContent, $matches)) {
								$talkTitle    = trim($matches[1] . $matches[2]);
								$talkCategory = trim($matches[3]);
								$talkId       = (int)$matches[4];
								$output['talks'][] = [
									'title'    => $talkTitle,
									'category' => $talkCategory,
									'id'       => $talkId,
								];
							}
						}
					}
				}
			}
			
			// --- 4. Parse Detailed Sections ---
			$output = parse_detailed_sections($text, $output);
		} elseif ($type === "global_espresso") {

			$output = [
				'topics' => [],
			];

			$text = str_replace("\r\n", "\n", $text);
			
			// Split the $text string into sections wherever a newline character (\n) is followed by a number and a period (e.g., 1., 2., 3., etc.)
			$topics = preg_split('/\n(?=\d\.)/', $text);
			
			//print_r($topics);
			//file_put_contents('sectionsarray.txt', print_r($topics, true));
			foreach ($topics as $topic) {
				if (preg_match('/\d\./', $topic)) {
					// Step 1: Remove the number followed by period (e.g., "1." or "2.")
					$topic = preg_replace('/^\s*\d+\.\s*/', '', $topic);
					//echo 'Topic :</br>' . $topic . '</br>';
					
					// Step 2: Split the section by lines
					$lines = explode("\n", trim($topic)); // Split the topic into lines

					$title_english = $details_english = $title_arabic = $details_arabic = "";
					$is_english = true; // Assuming the first line is in English

					$english_found = false;
					$arabic_found = false;
					$is_in_english = true;

					// Step 3: Process the lines
					foreach ($lines as $line) {
						// Check if the line contains Arabic characters (you can adjust this to check for Arabic script)
						if (preg_match('/[\x{0600}-\x{06FF}]/u', $line)) {
							// If the line is in Arabic
							if (!$arabic_found) {
								$title_arabic = $line . "\n"; // First line in Arabic
								$arabic_found = true;
							} else {
								$details_arabic .= $line . "\n"; // Append rest of the Arabic details
							}
							$is_in_english = false; // Switch to Arabic section
						} else {
							// If the line is in English
							if ($is_in_english) {
								if (!$english_found) {
									$title_english = $line . "\n"; // First line in English
									$english_found = true;
								} else {
									$details_english .= $line . "\n"; // Append rest of the English details
								}
							}
						}
					}

					// Now you have the four variables: title_english, details_english, title_arabic, details_arabic
					// You can process them accordingly
					// Save the parsed topic.
					$output['topics'][] = [
						'title_english'   => $title_english,
						'details_english' => $details_english,
						'title_arabic'    => $title_arabic,
						'details_arabic'  => $details_arabic
					];
				}
			}
		}
		
		error_log("Final parsed output: " . print_r($output, true));
		return $output;
	}

	/**
	 * Called on post save to process and store the pasted newsletter.
	 */
 	function parse_and_save_newsletter($post_id) {
		
		// Check nonce and autosave conditions.
		if ( ! isset($_POST['_newsletter_nonce']) || ! wp_verify_nonce($_POST['_newsletter_nonce'], 'details') ) {
			return;
		}
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
			return;
		}
		
		if ( isset($_POST['newsletter_text']) ) {
			// Get and sanitize the raw newsletter text.
			$newsletter_text = wp_unslash($_POST['newsletter_text']);
			$newsletter_text = sanitize_textarea_field($newsletter_text);
			update_post_meta($post_id, '_newsletter_text', $newsletter_text);

			// Detect newsletter type
			if ( strpos($newsletter_text, "KINGDOM PULSE") !== false || strpos($newsletter_text, "Kingdom Pulse") !== false) {
				$newsletter_type = "kingdom_pulse";
			} elseif ( strpos($newsletter_text, "Morning Talks") !== false ) {
				$newsletter_type = "morning_talks";
			} elseif ( strpos($newsletter_text, "Global Espresso") !== false ) {
				$newsletter_type = "global_espresso";
			} else {
				// If the type is unknown, don't parse
				error_log("Type is unknown");
				return;
			}
			
			// Parse the newsletter with our generic parser.
			$parsedData = parse_newsletter($newsletter_text, $newsletter_type);
			
			if ($newsletter_type === "morning_talks") {			
				/*// 1. Update the Arabic title field.
				// (Here we assume you want to use the second paragraph of the Podcast introduction as the Arabic title.)
				if ( ! empty($parsedData['introduction']) && is_array($parsedData['introduction']) ) {
					$arabic_intro = isset($parsedData['introduction'][1]) ? $parsedData['introduction'][1] : '';
					update_post_meta($post_id, '_arabic_title', sanitize_text_field($arabic_intro));
				}	*/		
				
				// 2. Update detailed Morning Talks news boxes.
				// We use a fixed layout: 5 boxes per category in the following order:
				// Economy (boxes 1–5), M&As (6–10), Industries (11–15), GeoPolitical (16–20)
				$category_order = ['Economy', 'M&As', 'Industries', 'Geopolitical'];
				$global_index = 1;
				foreach ($category_order as $cat) {
					// Loop exactly 5 times for each category.
					for ($i = 0; $i < 5; $i++) {
						if (isset($parsedData[$cat]) && is_array($parsedData[$cat]) && isset($parsedData[$cat][$i])) {
							$item = $parsedData[$cat][$i];
							update_post_meta($post_id, '_news_box' . $global_index . '_top', sanitize_text_field($item['title_english']));
							update_post_meta($post_id, '_news_box' . $global_index . '_bot', sanitize_text_field($item['details_english']));
							update_post_meta($post_id, '_a_news_box' . $global_index . '_top', sanitize_text_field($item['title_arabic']));
							update_post_meta($post_id, '_a_news_box' . $global_index . '_bot', sanitize_text_field($item['details_arabic']));
						} else {
							// Clear any boxes if no topic is available for this slot.
							update_post_meta($post_id, '_news_box' . $global_index . '_top', '');
							update_post_meta($post_id, '_news_box' . $global_index . '_bot', '');
							update_post_meta($post_id, '_a_news_box' . $global_index . '_top', '');
							update_post_meta($post_id, '_a_news_box' . $global_index . '_bot', '');
						}
						$global_index++;
					}
				}
							
				// 3. Update Top Talks fields (dropdowns for 10 items).
				// Mapping: Economy: option = id, M&A: id+5, Industrial: id+10, Geopolitical: id+15.
				$talk_mapping = function($category, $id) {
					$cat = strtolower(trim($category));
					if ( $cat === 'economy' || $cat === 'اقتصاد' ) {
						return $id;
					} elseif ( strpos($cat, 'm&a') !== false || strpos($cat, 'اندماج') !== false ) {
						return $id + 5;
					} elseif ( $cat === 'industrial' || $cat === 'صناعي' ) {
						return $id + 10;
					} elseif ( $cat === 'geopolitical' || $cat === 'جيوسياسية' ) {
						return $id + 15;
					}
					return 0;
				};
				if ( isset($parsedData['talks']) && is_array($parsedData['talks']) ) {
					for ( $i = 1; $i <= 10; $i++ ) {
						if ( isset($parsedData['talks'][$i-1]) ) {
							$talk = $parsedData['talks'][$i-1];
							$mappedValue = $talk_mapping( $talk['category'], $talk['id'] );
							update_post_meta( $post_id, '_news_box' . $i . '_top_talks', sanitize_text_field($mappedValue) );
							update_post_meta( $post_id, '_a_news_box' . $i . '_top_talks', sanitize_text_field($mappedValue) );
						} else {
							update_post_meta( $post_id, '_news_box' . $i . '_top_talks', '' );
							update_post_meta( $post_id, '_a_news_box' . $i . '_top_talks', '' );
						}
					}
				}
			} elseif ($newsletter_type === "kingdom_pulse") {
				//error_log("Step 10");
				// Parse Kingdom Pulse
				for ($KP_new_no=1; $KP_new_no <= 4; $KP_new_no++) {
					update_post_meta($post_id, '_KP_news_box' . $KP_new_no . '_top', sanitize_text_field($parsedData['global'][$KP_new_no-1]['title_english'] ?? ''));
					update_post_meta($post_id, '_KP_news_box' . $KP_new_no . '_bot', sanitize_text_field($parsedData['global'][$KP_new_no-1]['details_english'] ?? ''));
					update_post_meta($post_id, '_a_KP_news_box' . $KP_new_no . '_top', sanitize_text_field($parsedData['global'][$KP_new_no-1]['title_arabic'] ?? ''));
					update_post_meta($post_id, '_a_KP_news_box' . $KP_new_no . '_bot', sanitize_text_field($parsedData['global'][$KP_new_no-1]['details_arabic'] ?? ''));
				}
				//error_log("Step 11");
				$l_new_no=0;
				//error_log("Step 17");
				$left_col_count=round((count($parsedData['local']))/4);
				//error_log("Step 18 " . $left_col_count);
				$right_col_count=(count($parsedData['local']))/2 - $left_col_count;
				//error_log("Step 16 " . $right_col_count);
				// Local News Section
				for ($new_no=1; $new_no < 6; $new_no++) {
					if ($new_no <= $left_col_count){
						$l_new_no++;
						update_post_meta($post_id, '_kp_ln_news_box' . $new_no . '_top', sanitize_text_field($parsedData['local'][$l_new_no-1]['title_english'] ?? ''));
						update_post_meta($post_id, '_kp_ln_news_box' . $new_no . '_bot', sanitize_text_field($parsedData['local'][$l_new_no-1]['details_english'] ?? ''));
						$l_new_no++;
						update_post_meta($post_id, '_a_kp_ln_news_box' . $new_no . '_top', sanitize_text_field($parsedData['local'][$l_new_no-1]['title_arabic'] ?? ''));
						update_post_meta($post_id, '_a_kp_ln_news_box' . $new_no . '_bot', sanitize_text_field($parsedData['local'][$l_new_no-1]['details_arabic'] ?? ''));
					} else {
						update_post_meta($post_id, '_kp_ln_news_box' . $new_no . '_top', '');
						update_post_meta($post_id, '_kp_ln_news_box' . $new_no . '_bot', '');
						update_post_meta($post_id, '_a_kp_ln_news_box' . $new_no . '_top', '');
						update_post_meta($post_id, '_a_kp_ln_news_box' . $new_no . '_bot', '');
					}
				}
				//error_log("Step 12");
				for ($new_no=6; $new_no <= 11; $new_no++) {
					if (($new_no-5) <= $right_col_count){
						$l_new_no++;
						update_post_meta($post_id, '_kp_ln_news_box' . $new_no . '_top', sanitize_text_field($parsedData['local'][$l_new_no-1]['title_english'] ?? ''));
						update_post_meta($post_id, '_kp_ln_news_box' . $new_no . '_bot', sanitize_text_field($parsedData['local'][$l_new_no-1]['details_english'] ?? ''));
						$l_new_no++;
						update_post_meta($post_id, '_a_kp_ln_news_box' . $new_no . '_top', sanitize_text_field($parsedData['local'][$l_new_no-1]['title_arabic'] ?? ''));
						update_post_meta($post_id, '_a_kp_ln_news_box' . $new_no . '_bot', sanitize_text_field($parsedData['local'][$l_new_no-1]['details_arabic'] ?? ''));
					}else{
						update_post_meta($post_id, '_kp_ln_news_box' . $new_no . '_top', '');
						update_post_meta($post_id, '_kp_ln_news_box' . $new_no . '_bot', '');
						update_post_meta($post_id, '_a_kp_ln_news_box' . $new_no . '_top', '');
						update_post_meta($post_id, '_a_kp_ln_news_box' . $new_no . '_bot', '');
					}
				}
				//error_log("Step 13");
				// 3. Update Top Talks fields (dropdowns for 10 items).
				$talk_mapping = function($category, $id) {
					$cat = strtolower(trim($category));
					if ( $cat === 'local' ) {
						return $id;
					} elseif ( $cat === 'global') {
						return $id + 11;
					}
					return 0;
				};
				//error_log("Step 14");
				// Top Talks Section
				for ($top_talks_no=1; $top_talks_no <= 10; $top_talks_no++) {
					if ( isset($parsedData['top_talks'][$top_talks_no-1]) ) {
						$talk = $parsedData['top_talks'][$top_talks_no-1];
						//error_log("talk " . $top_talks_no . " : " . $talk . "</br>");
						$mappedValue = $talk_mapping( $talk['category'], $talk['index'] );	
						//error_log("mappedValue " . $top_talks_no . " : " . $mappedValue . "</br>");						
						$talks_value = isset($parsedData['top_talks'][$top_talks_no-1]) ? $parsedData['top_talks'][$top_talks_no-1]['index'] : '';
						//error_log("talks_value " . $top_talks_no . " : " . $talks_value . "</br>");						
						//update_post_meta($post_id, '_kp_news_box' . $top_talks_no . '_top_talks', sanitize_text_field($talks_value));
						update_post_meta($post_id, '_kp_news_box' . $top_talks_no . '_top_talks', $mappedValue);
					} else {
						$newsdatatoptalks = $_POST['kp_news_box_' . $top_talks_no . '_top_talks'];
						update_post_meta($post_id, '_kp_news_box' . $top_talks_no . '_top_talks', $newsdatatoptalks);
					}
				}
				//error_log("Step 15");
			} elseif ($newsletter_type === "global_espresso") {
				// Parse Global Espresso
				for ($GE_new_no=1; $GE_new_no <= 5; $GE_new_no ++){
					update_post_meta($post_id, '_GE_news_box' . $GE_new_no . '_top', sanitize_text_field($parsedData['topics'][$GE_new_no-1]['title_english'] ?? ''));
					update_post_meta($post_id, '_GE_news_box' . $GE_new_no . '_bot', sanitize_text_field($parsedData['topics'][$GE_new_no-1]['details_english'] ?? ''));
					update_post_meta($post_id, '_a_GE_news_box' . $GE_new_no . '_top', sanitize_text_field($parsedData['topics'][$GE_new_no-1]['title_arabic'] ?? ''));
					update_post_meta($post_id, '_a_GE_news_box' . $GE_new_no . '_bot', sanitize_text_field($parsedData['topics'][$GE_new_no-1]['details_arabic'] ?? ''));
				}
			}
		}
	}
	
	add_action('save_post', 'parse_and_save_newsletter');

	/* New Updates For Parsing Ends Here */


	/*
	** ==========================================
	**  Custom Meta Box : PDF - in : insights
	** ==========================================
	*/

  	function add_brouchre_box_to_insights() {
		add_meta_box('brouchre-box', 'PDF Link', 'bro_box', 'insights', 'side');
	}

	add_action('add_meta_boxes', 'add_brouchre_box_to_insights');

	/*
	** ==========================================
	**  Custom Meta Box : MP3 - in : insights
	** ==========================================
	*/

  	function add_audio_box_to_insights() {
		add_meta_box('audio-box', 'MP3 Link', 'aud_box', 'insights', 'side');
		add_meta_box('a_audio-box', 'Arabic MP3 Link', 'a_aud_box', 'insights', 'side');
	}

	add_action('add_meta_boxes', 'add_audio_box_to_insights');

	/*
	** ==========================================
	**  Custom Meta Box : PDF - in : Reports
	** ==========================================
	*/

  	function add_brouchre_box() {
		add_meta_box('brouchre-box', 'PDF Link', 'bro_box', 'reports', 'side');
	}

	function bro_box($post) {
		wp_nonce_field('brouchre', '_brouchre_box');
		$value = get_post_meta($post->ID, '_brouchre_box', true);
		echo "<input type='text' style='width: 100%;' id='brouchre_box_e' name='brouchre_box_e' value='".$value."'>";
	}

	function brouchreeee_box($ID) {

		if (!isset($_POST['_brouchre_box'])) {
			return;
		}

		if (!wp_verify_nonce($_POST['_brouchre_box'], 'brouchre')) {
			return;
		}

		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}

		if (!current_user_can('edit_post', $ID)) {
			return;
		}

		if (!isset($_POST['brouchre_box_e'])) {
			return;
		}

		$data = sanitize_text_field($_POST['brouchre_box_e']);

		update_post_meta($ID, '_brouchre_box', $data);
	}

	add_action('add_meta_boxes', 'add_brouchre_box');
	add_action('save_post', 'brouchreeee_box');

	/*
	** ==========================================
	**  Custom Meta Box : MP3 - in : Reports
	** ==========================================
	*/

  	function add_audio_box() {
		add_meta_box('audio-box', 'MP3 Link', 'aud_box', 'reports', 'side');
		add_meta_box('a_audio-box', 'Arabic MP3 Link', 'a_aud_box', 'reports', 'side');
	}

	function aud_box($post) {
		wp_nonce_field('audio', '_audio_box');
		$value = get_post_meta($post->ID, '_audio_box', true);
		echo "<input type='text' style='width: 100%;' id='audio_box_e' name='audio_box_e' value='".$value."'>";
	}

	function a_aud_box($post) {
		wp_nonce_field('audio', '_a_audio_box');
		$value = get_post_meta($post->ID, '_a_audio_box', true);
		echo "<input type='text' style='width: 100%;' id='a_audio_box_e' name='a_audio_box_e' value='".$value."'>";
	}
	
	function audioeee_box($ID) {

		if (!isset($_POST['_audio_box'])) {
			return;
		}

		if (!wp_verify_nonce($_POST['_audio_box'], 'audio')) {
			return;
		}

		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}

		if (!current_user_can('edit_post', $ID)) {
			return;
		}

		if (!isset($_POST['audio_box_e'])) {
			return;
		}

		$data = sanitize_text_field($_POST['audio_box_e']);

		update_post_meta($ID, '_audio_box', $data);

		if (!isset($_POST['_a_audio_box'])) {
			return;
		}

		if (!wp_verify_nonce($_POST['_a_audio_box'], 'audio')) {
			return;
		}

		if (!isset($_POST['a_audio_box_e'])) {
			return;
		}

		$data = sanitize_text_field($_POST['a_audio_box_e']);

		update_post_meta($ID, '_a_audio_box', $data);

	}

	add_action('add_meta_boxes', 'add_audio_box');
	add_action('save_post', 'audioeee_box');
	
?>
