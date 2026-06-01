<?php get_header(); ?>
<!-- ===== HERO ===== -->
<div class="page-hero">
	<div class="hero-overlay">
		<div class="hero-title-wrapper">
			
		</div>
	</div>
</div>

<main id="English">
	<?php
		while ( have_posts() ): the_post();
	?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="article_content col-11 col-lg-10">
				<div class="row justify-content-center">
					<div class="col-lg-11">
						<div class="meta_data">
							<div>
								<div class="label insight-label">Newsletter</div>
								<time><?php the_date('d M Y'); ?></time>
							</div>
	
							<?php
								$pdf_file = get_post_meta(get_the_ID(), '_brouchre_box', true );
								if(!($pdf_file)):?>

	
							<div class="share-services share-buttons light social-share-bar" data-share-hash=""> 
							  <button class="icon-share"></button> 
							  <div class="share-options"> 
							   <a href="#" class="icon-facebook share-item" data-platform="facebook"></a> 
							   <a href="#" class="icon-linkedin2 share-item" data-platform="linkedin"></a> 
							   <a href="#" class="icon-whatsapp share-item" data-platform="whatsapp"></a> 
							   <a href="#" class="icon-mail share-item" data-platform="email"></a> 
							   <a href="#" class="icon-copylink share-item" data-platform="copylink"></a> 
							   <a href="#" class="more share-item" data-platform="more" style="display: none;">+ more</a> 
							   <a href="#" class="icon-close_large"></a> 
							  </div> 
							 </div>
							
							
							<?php
								endif;
							?>							
							
							<div class="d-none d-md-block">
								<?php
									$pdf_file = get_post_meta(get_the_ID(), '_brouchre_box', true );
									if($pdf_file):?>
										<a href="<?php echo $pdf_file ?>" target="_blank"><img src="<?php echo THEME_DIR_URI . '/dist/images/pdf-file-icon.svg' ?>" alt="PDF icon"/>Download PDF</a> <?php
									endif;
								?>
							</div>
						</div>
						<?php
							
							$a_new_1_top = get_post_meta(get_the_ID(), '_a_news_box1_top', true );
							$a_GE_news_box1_top = get_post_meta(get_the_ID(), '_a_GE_news_box1_top', true );
							$kp_local_news1 = get_post_meta(get_the_ID(), '_kp_ln_news_box1_top', true );

							if ($kp_local_news1){
								$kingdompulse=true;
								$morningtalks=false;
								$ge=false;
								$arabicmorningtalks=false;
							}
							else{
								if(get_the_content() || $a_new_1_top){
									$morningtalks=true;
									$ge=false;
									$arabicge=false;
									$kingdompulse=false;
									if($a_new_1_top){
										$arabicmorningtalks=true;
									}
									else{
										$arabicmorningtalks=false;
									}
								}
								else{
									$arabicmorningtalks=false;
									$morningtalks=false;
									$ge=true;
									$kingdompulse=false;
									if ($a_GE_news_box1_top){
										$arabicge=true;
									}
									else{
										$arabicge=false;
									}
								}
							}
						?>
						<?php if (!$ge && !$kingdompulse) the_title('<h3>', '</h3>'); ?>
						<div class="meta_data d-block d-md-none mt-2">
							<?php
								$pdf_file = get_post_meta(get_the_ID(), '_brouchre_box', true );
								if($pdf_file):?>
									<a href="<?php echo $pdf_file ?>" target="_blank"><img src="<?php echo THEME_DIR_URI . '/dist/images/pdf-file-icon.svg' ?>" alt="PDF icon"/>Download PDF</a> <?php
								endif;
							?>
						</div>
						<?php

							if(!$morningtalks  && !$ge && !$kingdompulse && has_post_thumbnail()) {
								$image_id = get_post_thumbnail_id();
								$image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE);

								echo '<img src="'.get_the_post_thumbnail_url().'" alt="'.$image_alt.'" />';
							}
						    else{
							    if($morningtalks) {
									if($arabicmorningtalks){
									?>	<div style="
										text-align: right;
										margin-bottom: 10px;
									">
										<a href="#Arabic" style="
										color: green;
										font-size: 13px;
										font-weight: 800;
									">لقراءة الأخبار باللغة العربية انقر هنا</a>
									</div><?php
										if ( wp_is_mobile() ) {
											echo '<img src="https://www.zillacapital.com/wp-content/uploads/2023/12/banner.png" alt="MENA Morning Talks" style="object-fit: fill;" />';
										}
										else{
											echo '<img src="https://www.zillacapital.com/wp-content/uploads/2023/12/Artboard-12.png" alt="MENA Morning Talks" style="object-fit: cover;" />';
										}
									}
									else{
										if ( wp_is_mobile() ) {
											echo '<img src="https://zillacapital.com/wp-content/uploads/2021/06/Banner-newNavy.png" alt="Morning Talks" style="object-fit: fill;" />';
										}
										else{
											echo '<img src="https://zillacapital.com/wp-content/uploads/2021/06/Banner-newNavy.png" alt="Morning Talks" style="object-fit: cover;" />';
										}
									}
								}
								
							    if($ge) {
									if($arabicge){
									?>	<div style="
										text-align: right;
										margin-bottom: 10px;
									">
										<a href="#Arabic" style="
										color: green;
										font-size: 13px;
										font-weight: 800;
									">لقراءة الأخبار باللغة العربية انقر هنا</a>
									</div><?php
										if ( wp_is_mobile() ) {
											echo '<img src="https://www.zillacapital.com/wp-content/uploads/2022/02/Webbannerafer.png" alt="Global Espresso" style="object-fit: fill; max-height: 130px;" />';
										}
										else{
											echo '<img src="https://www.zillacapital.com/wp-content/uploads/2022/02/Webbannerafer.png" alt="Global Espresso" style="object-fit: cover;" />';
										}
									}
									else{
										if ( wp_is_mobile() ) {
											echo '<img src="https://www.zillacapital.com/wp-content/uploads/2022/02/Webbannerafer.png" alt="Global Espresso" style="object-fit: fill; max-height: 130px;" />';
										}
										else{
											echo '<img src="https://www.zillacapital.com/wp-content/uploads/2022/02/Webbannerafer.png" alt="Global Espresso" style="object-fit: cover;" />';
										}
									}
								}
								
							    if($kingdompulse) {

									?>	<div style="
										text-align: right;
										margin-bottom: 10px;
									">
										<a href="#Arabic" style="
										color: green;
										font-size: 13px;
										font-weight: 800;
									">لقراءة الأخبار باللغة العربية انقر هنا</a>
									</div><?php
									if ( wp_is_mobile() ) {
										echo '<img src="https://www.zillacapital.com/wp-content/uploads/2024/04/English-logo.png" alt="Kingdom Pulse" style="object-fit: fill; max-height: 130px;" />';
									}
									else{
										echo '<img src="https://www.zillacapital.com/wp-content/uploads/2024/04/English-logo.png" alt="Kingdom Pulse" style="object-fit: cover;" />';
									}

								}
							}
						?>
						
<?php

if(get_the_content()):
	$left_col1_top = get_post_meta(get_the_ID(), '_news_box1_top', true );
	if ($morningtalks && has_post_thumbnail() && ($pdf_file || $left_col1_top)){
		$image_id = get_post_thumbnail_id();
		$image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE);
?>

						<div class="row  justify-content-between" style="line-height: 1.15;font-family: revert;font-size: 18px;margin-bottom:<?php if (wp_is_mobile()) {
			echo '60';
		}else{
			echo '10';
		}?>px;">
							<div class="row  justify-content-between">
								<div class="col-md-6">
									<?php echo '<img src="'.get_the_post_thumbnail_url().'" alt="'.$image_alt.'" />'; ?>
								</div>
							
								<div class="col-md-6">
									<div class="section_content_wrapper" style="text-align: justify;"><?php the_content(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

<?php
		if ( wp_is_mobile() ) {
			echo '<BR><BR><br>';
		}
		$right_col1_top = get_post_meta(get_the_ID(), '_news_box6_top', true );
		$right_col1_top = ""; //To Cancel showing on two columns
		if($right_col1_top){
			$noofleft=0;?>
		
				<div class="row justify-content-between">
					<div class="col-md-6 leftlist" style="background-color:rgb(17,38,73);">
						<ol style="text-align: left;text-align: justify;">	

<?php
			for ($n = 1; $n <= 5; $n++) {
				$left_col_top = get_post_meta(get_the_ID(), '_news_box'.$n.'_top', true );
				$left_col_bot = get_post_meta(get_the_ID(), '_news_box'.$n.'_bot', true );?>						
<?php
				if($left_col_top){
					$noofleft++;?>

							<li><span style="color: #4dc8ed;"><strong><?php echo $left_col_top; ?>
							</strong></span><br>
<?php
					if($left_col_bot){?>
							<span style="color: #ffffff; margin-left:0px;"><?php echo $left_col_bot; ?>
							</span><br><br>
<?php
					}?>
							</li>
<?php
				}
			}?>
						</ol>        
					</div>	
					<div class="col-md-6 rightlist" style="background-color:rgb(17,38,73);">
						<ol style="text-align: left;text-align: justify; counter-reset: my-awesome-counter <?php echo $noofleft;?>;">

<?php
			for ($n = 6; $n <= 10; $n++) {
				$right_col_top = get_post_meta(get_the_ID(), '_news_box'.$n.'_top', true );
				$right_col_bot = get_post_meta(get_the_ID(), '_news_box'.$n.'_bot', true );?>						
<?php
				if($right_col_top){?>

							<li<?php if($n ==10 && ($noofleft ==5))echo ' class="lastone"'?>><span style="color: #4dc8ed;"><strong><?php echo $right_col_top; ?>
							</strong></span><br>
<?php
					if($right_col_bot){?>
							<span style="color: #ffffff; margin-left:0px;"><?php echo $right_col_bot; ?>							
							</span><br><br>
<?php
					}?>
							</li>
<?php
				}
			}?>

						</ol>        
					</div>	
				</div>	
		
		<?php
		}
		else{?>
			<!--	<div class="article_content-content" style="text-align: justify;">
					<ol style="text-align: left;text-align: justify;">	-->

		
				<div class="row fullwidthlist" style="background-color:#ffffff;">
					<ol style="text-align: left;text-align: justify;">	


<?php
			$nooftopics=0;
			for ($n = 1; $n <= 15; $n++) {
				$left_col_top = get_post_meta(get_the_ID(), '_news_box'.$n.'_top', true );
				$left_col_bot = get_post_meta(get_the_ID(), '_news_box'.$n.'_bot', true );?>						
<?php
				if($left_col_top){
					$nooftopics++?>

						<li<?php if($nooftopics > 9)echo ' class="lastone"'?>><span style="color: #112649;"><strong><?php echo $left_col_top; ?>
						</strong></span><br><!--<?php echo $nooftopics?>-->
<?php
					if($left_col_bot){?>
						<span style="color: #112649; margin-left:0px;"><?php echo $left_col_bot; ?>
						</span><br><br>
<?php
					}?>
						</li>
<?php
				}
			}?>
					</ol>        
					
				</div>
			</div>	
		</div>			
		
		<?php
		}?>
		
		
<?php 
	} 
    else { ?>
						<div class="article_content-content" style="text-align: justify;"><?php the_content(); ?>
						</div>
					</div>	
		</div>
<?php 
    } 
endif; ?>

<?php
if ($kingdompulse){
	$image_srs = get_the_post_thumbnail_url();
	$image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE);
	$kp_local_news = get_post_meta(get_the_ID(), '_kp_local_news', true );
	$a_kp_local_news = get_post_meta(get_the_ID(), '_a_kp_local_news', true );
	$kp_top_talks1 = get_post_meta(get_the_ID(), '_kp_news_box1_top_talks', true );
	
	?>
					</div>
				</div>
	<?php
	if ($kp_top_talks1 && !($kp_top_talks1 == 0)){?>
				<div class="row fullwidthlistkp"><div class="row fullwidthlistkphead"><div class="fullwidthlistkpimg">
					<img src="https://www.zillacapital.com/wp-content/uploads/2024/06/Top-talks-green.png">
				</div>
				<div style="
					margin-left: 22px;
				"><h3>TOP TALKS</h3></div></div><ol style="text-align: left;text-align: justify;">
<?php				
			$nooftoptopics=0;
			for ($n = 1; $n <= 10; $n++) {
				$nooftoptopics++;
				$top_talk_index = get_post_meta(get_the_ID(), '_kp_news_box'.$n.'_top_talks', true );
				if ($top_talk_index == 0) {
					continue;
				}
				if ($top_talk_index < 12) {
					$top_talk = get_post_meta(get_the_ID(), '_kp_ln_news_box'.$top_talk_index.'_top', true );				
					$section = 'Local';
					?><li<?php if($nooftoptopics > 9){echo ' class="nozerolastone"';}else {echo ' class="nozero"';}?>><a href='<?php echo '#'.$section;?>' style="color: #112649;font-family: 'Rotunda-Regular';font-size: 18px;font-weight: 400; text-decoration:none; margin-left: -10px;"><?php echo $top_talk.' ('.$section.')<!--'.$nooftoptopics.'-->'; ?></a><br><br></li>
				<?php
				}
				else {
					$top_talk = get_post_meta(get_the_ID(), '_KP_news_box'.($top_talk_index - 11).'_top', true );
					$section = 'Global';
					?><li<?php if($nooftoptopics > 9){echo ' class="nozerolastone"';}else {echo ' class="nozero"';}?>><a href='<?php echo '#'.$section;?>' style="color: #112649;font-family: 'Rotunda-Regular';font-size: 18px;font-weight: 400; text-decoration:none; margin-left: -10px;"><?php echo $top_talk.' ('.$section.')<!--'.$nooftoptopics.'-->'; ?></a><br><br></li>
				<?php
				}
			}
			?>	</ol>
			</div>	
<?php
	}?>
				
				<section class="article_content-content kingdompulse" style="text-align: justify; margin-bottom: 10px;">
					<div class="container">	
						<div>
							<h3 id='Local'>LOCAL NEWS</H3>
						</div>
	<?php
	if ($kp_local_news){?>
						<div class="row justify-content-between">
							<div class="col-md-4" style="padding-left: 0px;">
								<?php echo '<img src="'.$image_srs.'" alt="'.$image_alt.'" />'; ?>
							</div>
							<div class="col-md-8">
								<div class="kingdompulsearln"><div class="kingdompulsearlnhead"></div>
									<span><?php echo $kp_local_news ?></span>
									<div class="kingdompulsearlnbott"></div>
								</div>
							</div>
						</div>
						<br>
	<?php
	}?>
						<div class="row">
							<div class="col-md-6 kingdompulseleftlist">
								<ol>
			<?php
			$noofleft=0;
			for ($n = 1; $n <= 5; $n++) {
				$left_col = get_post_meta(get_the_ID(), '_kp_ln_news_box'.$n.'_top', true );
				$left_col_bot = get_post_meta(get_the_ID(), '_kp_ln_news_box'.$n.'_bot', true );
				if($left_col){
					$noofleft++;?>

							<li><span style="color: #0a5c36; font-weight: bolder;"><?php echo $left_col; ?>
								</span>
<?php
					if($left_col_bot){?>
								<span><?php echo $left_col_bot; ?>
									</span>
<?php
					}?>					
							<br></li>
<?php
				}
			}
			?>							
								</ol>							
							</div>

							<div class="col-md-6 kingdompulserightlist">
								<ol style="counter-reset: my-awesome-counter <?php echo $noofleft;?>;">
			<?php
			$noofright=0;
			for ($n = 6; $n <= 10; $n++) {
				$right_col = get_post_meta(get_the_ID(), '_kp_ln_news_box'.$n.'_top', true );
				$right_col_bot = get_post_meta(get_the_ID(), '_kp_ln_news_box'.$n.'_bot', true );
				if($right_col){
					$noofright++;?>

							<li<?php if($n > 9){echo ' class="lastone"';}?>><span style="color: #0a5c36; font-weight: bolder;"><?php echo $right_col;?>
								</span>
<?php
					if($right_col_bot){?>
							<span><?php echo $right_col_bot; ?>
								</span>
<?php
					}?>
							<br></li>
<?php
				}
			}
			?>							
										</ol>							
									</div>							
								</div>
							<div>
								<h3 id='Global'>ON THE GLOBAL FRONT</H3>
							</div>
			<?php
			for ($n = 1; $n <= 4; $n++) {
				$KP_news_img = get_post_meta(get_the_ID(), '_KP_news'.$n.'_img', true );
				$KP_news_top = get_post_meta(get_the_ID(), '_KP_news_box'.$n.'_top', true );
				$KP_news_bot = get_post_meta(get_the_ID(), '_KP_news_box'.$n.'_bot', true );
				if($KP_news_img){ ?>
							<div>
								<div class="row  justify-content-between">
									<div class="col-md-4" style="padding-left: 0px;">
										<?php echo '<img src="'.$KP_news_img.'" alt="'.$KP_news_top.'" />'; ?>
									</div>
									<div class="col-md-8">
										<div class="kingdompulsegftitle">
											<h2><?php echo $KP_news_top ?><h2>
										</div>
									</div>
									<div class="kingdompulsegfdetails">
										<span><?php echo $KP_news_bot ?></span>
									</div>
								</div>
							</div>
				<?php 
				}
			} ?>
						</div>
					</section>
			</div>
			<div dir="RTL" class="article_content col-11 col-lg-10" id="Arabic" style="margin-top: 0px;font-family: 'AdobeNaskh';">
				<div class="row justify-content-center">
						<div class="col-lg-11">
							<div class="meta_data">
							<div>
								<div class="label insight-label">النشرة اإخبارية</div>
									<date><?php
									  $postdate_d = get_the_date('d');
									  $postdate_d2 = get_the_date('D');
									  $postdate_m = get_the_date('M');
									  $postdate_y = get_the_date('Y');                                
									 echo single_post_arabic_date($postdate_d,$postdate_d2, $postdate_m, $postdate_y);
									?></date>
								</div>
		
								<div class="share-services share-buttons light social-share-bar" style="right:revert; left:0px;" data-share-hash=""> 
								  <button class="icon-share"></button> 
									<div class="share-options"> 
									   <a href="#" class="icon-facebook share-item" data-platform="facebook"></a> 
									   <a href="#" class="icon-linkedin2 share-item" data-platform="linkedin"></a> 
									   <a href="#" class="icon-whatsapp share-item" data-platform="whatsapp"></a> 
									   <a href="#" class="icon-mail share-item" data-platform="email"></a> 
									   <a href="#" class="icon-copylink share-item" data-platform="copylink"></a> 
									   <a href="#" class="more share-item" data-platform="more" style="display: none;">+ more</a> 
									   <a href="#" class="icon-close_large"></a> 
									</div> 
								</div>
							</div>

							<div style="
								text-align: left;
								margin-bottom: 10px;
								width: 100%;
								margin-right: -35px;
								margin-top: -10px;
							"><a href="#" style="
								color: green;
								font-size: 13px;
								font-weight: 800;
								">To read the news in English press here</a>
							</div><?php
								if ( wp_is_mobile() ) {
									echo '<img src="https://www.zillacapital.com/wp-content/uploads/2024/04/English-logo.png" alt="Kingdom Pulse" style="object-fit: fill; max-height: 130px;" />';
								}
								else{
									echo '<img src="https://www.zillacapital.com/wp-content/uploads/2024/04/English-logo.png" alt="Kingdom Pulse" style="object-fit: cover;" />';
								}
							?>
								</div>
							</div>
	<?php
	if ($kp_top_talks1 && !($kp_top_talks1 == 0)){?>
				<div class="row fullwidthlistkpar"><div class="row fullwidthlistkparhead"><div class="fullwidthlistkparimg">
					<img src="https://www.zillacapital.com/wp-content/uploads/2024/06/Top-talks-green.png">
				</div>
				<div style="
					margin-left: 22px;
				"><h3>أهم الأحداث</h3></div></div><ol>
<?php				
			$nooftoptopics=0;
			for ($n = 1; $n <= 10; $n++) {
				$nooftoptopics++;
				$top_talk_index = get_post_meta(get_the_ID(), '_kp_news_box'.$n.'_top_talks', true );
				if ($top_talk_index == 0) {
					continue;
				}
				if ($top_talk_index < 12) {
					$top_talk = get_post_meta(get_the_ID(), '_a_kp_ln_news_box'.$top_talk_index.'_top', true );				
					$section = 'Locala';
					$section_name = 'محلية';
					?><li<?php if($nooftoptopics > 9){echo ' class="nozerolastonearabic"';}else {echo ' class="nozeroarabictop"';}?>><a href='<?php echo '#'.$section;?>' style="color: #112649;font-family: 'AdobeNaskh';font-size: 18px;font-weight: 400; text-decoration:none;"><?php echo $top_talk.' ('.$section_name.')<!--'.$nooftoptopics.'-->'; ?></a><br><br></li>
				<?php
				}
				else {
					$top_talk = get_post_meta(get_the_ID(), '_a_KP_news_box'.($top_talk_index - 11).'_top', true );
					$section = 'Globala';
					$section_name = 'عالمية';
					?><li<?php if($nooftoptopics > 9){echo ' class="nozerolastonearabic"';}else {echo ' class="nozeroarabictop"';}?>><a href='<?php echo '#'.$section;?>' style="color: #112649;font-family: 'AdobeNaskh';font-size: 18px;font-weight: 400; text-decoration:none;"><?php echo $top_talk.' ('.$section_name.')<!--'.$nooftoptopics.'-->'; ?></a><br><br></li>
				<?php
				}
			}
			?>	</ol>
			</div>	
<?php
	}?>
							<section class="article_content-content kingdompulsear" style="text-align: justify;margin-bottom: 130px;">
								<div class="container">	
									<div>															<div>
										<h3 id='Locala'>أخبار محلية</H3>
									</div>
	<?php
	if ($a_kp_local_news){?>
						<div class="row  justify-content-between">
							<div class="col-md-4" style="padding-left: 0px;">
								<?php echo '<img src="'.$image_srs.'" alt="'.$image_alt.'" />'; ?>
							</div>
							<div class="col-md-8">
								<div class="kingdompulsearlnar"><div class="kingdompulsearlnheadar"></div>
									<span><?php echo $a_kp_local_news ?></span>
									<div class="kingdompulsearlnbottar"></div>
								</div>
							</div>
						</div>
						<br>
	<?php
	}?>
						<div class="row">
							<div class="col-md-6 kingdompulseleftlistar">
								<ol>
			<?php
			$noofleft=0;
			for ($n = 1; $n <= 5; $n++) {
				$left_col = get_post_meta(get_the_ID(), '_a_kp_ln_news_box'.$n.'_top', true );
				$left_col_bot = get_post_meta(get_the_ID(), '_a_kp_ln_news_box'.$n.'_bot', true );
				if($left_col){
					$noofleft++;?>

							<li><span style="color: #0a5c36; font-weight: bolder;"><?php echo $left_col; ?>
								</span>
<?php
					if($left_col_bot){?>
								<span><?php echo $left_col_bot; ?>
									</span>
<?php
					}?>					
							<br></li>
<?php
				}
			}
			?>								
								</ol>							
							</div>

							<div class="col-md-6 kingdompulserightlistar">
								<ol style="counter-reset: my-awesome-counter <?php echo $noofleft;?>;">
			<?php
			$noofright=0;
			for ($n = 6; $n <= 10; $n++) {
				$right_col = get_post_meta(get_the_ID(), '_a_kp_ln_news_box'.$n.'_top', true );
				$right_col_bot = get_post_meta(get_the_ID(), '_a_kp_ln_news_box'.$n.'_bot', true );
				if($right_col){
					$noofright++;?>

							<li<?php if($n > 9){echo ' class="lastone"';}?>><span style="color: #0a5c36; font-weight: bolder;"><?php echo $right_col; ?>
								</span>
<?php
					if($right_col_bot){?>
							<span><?php echo $right_col_bot; ?>
								</span>
<?php
					}?>
							<br></li>
<?php
				}
			}
			?>							
									</ol>							
								</div>							
							</div>
									<div>
										<h3 id='Globala'>علي الصعيد العالمي</H3>
									</div>
			<?php
			for ($n = 1; $n <= 4; $n++) {
				$KP_news_img = get_post_meta(get_the_ID(), '_KP_news'.$n.'_img', true );
				$KP_news_top = get_post_meta(get_the_ID(), '_a_KP_news_box'.$n.'_top', true );
				$KP_news_bot = get_post_meta(get_the_ID(), '_a_KP_news_box'.$n.'_bot', true );
				if($KP_news_img){ ?>
							<div>
								<div class="row  justify-content-between">
									<div class="col-md-4" style="padding-left: 0px;">
										<?php echo '<img src="'.$KP_news_img.'" alt="'.$KP_news_top.'" />'; ?>
									</div>
									<div class="col-md-8">
										<div class="kingdompulsegftitlear">
											<h2><?php echo $KP_news_top ?><h2>
										</div>
									</div>
									<div class="kingdompulsegfdetailsar">
										<span><?php echo $KP_news_bot ?></span>
									</div>
								</div>
							</div>
				<?php 
				}
			} ?>
								</div>
							</section>
							
					</div>
				</div>
			</div>							
<?php 
} 
?>

<?php
if($arabicmorningtalks){
	$image_id = get_post_thumbnail_id();
	$image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE);
	?>
					</div>
				</div>
				<div class="row fullwidthlistmena"><div class="row fullwidthlistmenahead"><div class="fullwidthlistmenaimg">
					<img src="https://www.zillacapital.com/wp-content/uploads/2023/12/Top-talks-blue.png">
				</div>
				<div style="
					margin-left: 22px;
				"><h3>TOP TALKS</h3></div></div><ol style="text-align: left;text-align: justify;">
<?php				
			$nooftoptopics=0;
			for ($n = 1; $n <= 10; $n++) {
				$top_talk_index = get_post_meta(get_the_ID(), '_news_box'.$n.'_top_talks', true );
				if ($top_talk_index == 0) {
					continue;
				}

				$top_talk = get_post_meta(get_the_ID(), '_news_box'.$top_talk_index.'_top', true );				
				$section = ($top_talk_index < 6 ? 'Economy' : ($top_talk_index < 11 ? 'M&As' : ($top_talk_index < 16 ? 'Industries' : 'GeoPolitical')));
				$nooftoptopics++;
				?><li<?php if($nooftoptopics > 9){echo ' class="nozerolastone"';}else {echo ' class="nozero"';}?>><a href='<?php echo '#'.$section;?>' style="color: #112649;font-family: 'Rotunda-Regular';font-size: 18px;font-weight: 400; text-decoration:none; margin-left: -10px;"><?php echo $top_talk.' ('.$section.')'; ?></a><br><br></li>
<?php
			}
			?>	</ol>
			</div>
			<div class="row"  style="margin-top: 50px;">
				<div class="col-md-5 collistmena">
					<div class="row collistmenahead">
						<div class="collistmenalogo">
							<img src="https://www.zillacapital.com/wp-content/uploads/2023/12/Economy-blue.png">
						</div>
						<div class="collistmenatitle">
							<h2 id='Economy'>ECONOMY</h2>
						</div>
						<div class="collistmenaimg">
							<img src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php echo $image_alt;?>">
						</div>
					</div>
					<ol>
	<?php
				for ($n = 1; $n <= 5; $n++) {
					$top = get_post_meta(get_the_ID(), '_news_box'.$n.'_top', true );
					$bot = get_post_meta(get_the_ID(), '_news_box'.$n.'_bot', true );
					if($top){?>
						<li class="nozero"><span  style="margin-left:-10px;"><strong><?php echo $top; ?></strong></span>
<?php
					}if($bot){?>
							<span><?php echo $bot; ?>							
							</span><br><br>
<?php
					}
				}?>
					</ol>
					<div class="leftsmallline"></div>
				</div>
				<div class="col-md-5 collistmena">
					<div class="row collistmenahead">
						<div class="collistmenalogo">
							<img src="https://www.zillacapital.com/wp-content/uploads/2023/12/MAs-blue.png">
						</div>
						<div class="collistmenatitle">
							<h2 id='M&As'>M&As</h2>
						</div>
						<div class="collistmenaimg">
							<img src="https://www.zillacapital.com/wp-content/uploads/2023/12/MAs-scaled.jpg">
						</div>
					</div>
					<ol>
	<?php
				for ($n = 6; $n <= 10; $n++) {
					$top = get_post_meta(get_the_ID(), '_news_box'.$n.'_top', true );
					$bot = get_post_meta(get_the_ID(), '_news_box'.$n.'_bot', true );
					if($top){?>
						<li class="nozero"><span  style="margin-left:-10px;"><strong><?php echo $top; ?></strong></span>
<?php
					}if($bot){?>
							<span><?php echo $bot; ?>							
							</span><br><br>
<?php
					}
				}?></ol>
					<div class="leftsmallline"></div>
				</div>
			</div>	
			<div class="row"  style="
				margin-top: 50px;
			">
					<div class="col-md-5 collistmena">
						<div class="row collistmenahead">
						<div class="collistmenalogo">
							<img src="https://www.zillacapital.com/wp-content/uploads/2023/12/Industries-blue.png">
						</div>
						<div class="collistmenatitle">
							<h2 id='Industries'>INDUSTRIES</h2>
						</div>
						<div class="collistmenaimg">
							<img src="https://www.zillacapital.com/wp-content/uploads/2023/12/shutterstock-624964346.png">
						</div>
					</div>
					<ol>
	<?php
				for ($n = 11; $n <= 15; $n++) {
					$top = get_post_meta(get_the_ID(), '_news_box'.$n.'_top', true );
					$bot = get_post_meta(get_the_ID(), '_news_box'.$n.'_bot', true );
					if($top){?>
						<li class="nozero"><span style="margin-left:-10px;"><strong><?php echo $top; ?></strong></span>
<?php
					}if($bot){?>
							<span><?php echo $bot; ?>							
							</span><br><br>
<?php
					}
				}?></ol>
				<div class="leftsmallline"></div>
				</div>
				<div class="col-md-5 collistmena">
					<div class="row collistmenahead">
						<div class="collistmenalogo">
							<img src="https://www.zillacapital.com/wp-content/uploads/2023/12/Political-blue.png">
						</div>
						<div class="collistmenatitle">
							<h2 id='GeoPolitical'>GEOPOLITICAL</h2>
						</div>
						<div class="collistmenaimg">
							<img src="https://www.zillacapital.com/wp-content/uploads/2023/12/Political-scaled.jpg">
						</div>
					</div>
					<ol>
	<?php
				for ($n = 16; $n <= 20; $n++) {
					$top = get_post_meta(get_the_ID(), '_news_box'.$n.'_top', true );
					$bot = get_post_meta(get_the_ID(), '_news_box'.$n.'_bot', true );
					if($top){?>
						<li class="nozero"><span style="margin-left:-10px;"><strong><?php echo $top; ?></strong></span>
<?php
					}if($bot){?>
							<span><?php echo $bot; ?>							
							</span><br><br>
<?php
					}
					}?></ol>
					<div class="leftsmallline"></div>
				</div>
			</div>
		</div>	
		<div dir="RTL" class="article_content col-11 col-lg-10 menaar" id="Arabic">
			<div class="row justify-content-center">
				<div class="col-lg-11">
					<div class="meta_data">
						<div>
							<div class="label insight-label">النشرة الإخبارية</div>
								<date><?php
								  $postdate_d = get_the_date('d');
								  $postdate_d2 = get_the_date('D');
								  $postdate_m = get_the_date('M');
								  $postdate_y = get_the_date('Y');                                
								 echo single_post_arabic_date($postdate_d,$postdate_d2, $postdate_m, $postdate_y);
								?></date>
							</div>
	
							<div class="share-services share-buttons light social-share-bar" style="right:revert; left:0px;" data-share-hash=""> 
							  <button class="icon-share"></button> 
								<div class="share-options"> 
								   <a href="#" class="icon-facebook share-item" data-platform="facebook"></a> 
								   <a href="#" class="icon-linkedin2 share-item" data-platform="linkedin"></a> 
								   <a href="#" class="icon-whatsapp share-item" data-platform="whatsapp"></a> 
								   <a href="#" class="icon-mail share-item" data-platform="email"></a> 
								   <a href="#" class="icon-copylink share-item" data-platform="copylink"></a> 
								   <a href="#" class="more share-item" data-platform="more" style="display: none;">+ more</a> 
								   <a href="#" class="icon-close_large"></a> 
								</div> 
							</div>
						</div>
							<?php
							$arabic_title = get_post_meta(get_the_ID(), '_arabic_title', true );
							echo '<h3>' . $arabic_title . '</h3>';?>
						</div>
						<div class="mena-language-switch"><a href="#" style="
							color: green;
							font-size: 13px;
							font-weight: 800;
							">To read the news in English press here</a>
						</div><img class="mena-arabic-hero" src="https://www.zillacapital.com/wp-content/uploads/2023/12/Artboard-12-arabic.png" alt="MENA Morning Talks" style="object-fit: cover;width: 93%;">
						
					</div>
				</div>

				<div class="row fullwidthlistmenaar"><div class="row fullwidthlistmenaarhead"><div class="fullwidthlistmenaarimg">
					<img src="https://www.zillacapital.com/wp-content/uploads/2023/12/Top-talks-blue.png">
				</div>
				<div style="
					margin-left: 22px;
				"><h3>أهم الأحداث</h3></div></div><ol>
<?php				
			$nooftoptopics=0;
			for ($n = 1; $n <= 10; $n++) {
				$top_talk_index = get_post_meta(get_the_ID(), '_news_box'.$n.'_top_talks', true );
				if ($top_talk_index == 0) {
					continue;
				}
				$top_talk = get_post_meta(get_the_ID(), '_a_news_box'.$top_talk_index.'_top', true );
				$section_a = ($top_talk_index < 6 ? 'Economya' : ($top_talk_index < 11 ? 'M&Asa' : ($top_talk_index < 16 ? 'Industriesa' : 'GeoPoliticala')));
				$section_a_name = ($top_talk_index < 6 ? 'اقتصاد ' : ($top_talk_index < 11 ? 'الدمج والاستحواذ' : ($top_talk_index < 16 ? 'صناعات' : 'جيوسياسي')));
				$nooftoptopics++;
				?><li<?php if($nooftoptopics > 9){echo ' class="nozerolastonearabic"';}else {echo ' class="nozeroarabictop"';}?>><a href='<?php echo '#'.$section_a;?>' style="color: #112649;font-family: 'AdobeNaskh';font-size: 18px;font-weight: 400;text-decoration:none;"><?php echo $top_talk.' ('.$section_a_name.')'; ?></a><br><br></li>
<?php
			}
			?>	</ol>
			</div>
			
			<div class="row"  style="
				margin-top: 50px;
			">

				<div class="col-md-5 collistmenaar">
					<div class="row collistmenaarhead">
						<div class="collistmenaarlogo">
							<img src="https://www.zillacapital.com/wp-content/uploads/2023/12/Economy-blue.png">
						</div>
						<div class="collistmenaartitle">
							<h2 id='Economya'>الاقتصاد</h2>
						</div>
						<div class="collistmenaarimg">
							<img src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php echo $image_alt;?>">
						</div>
					</div>
					<ol>
<?php
				for ($n = 1; $n <= 5; $n++) {
					$top = get_post_meta(get_the_ID(), '_a_news_box'.$n.'_top', true );
					$bot = get_post_meta(get_the_ID(), '_a_news_box'.$n.'_bot', true );
					if($top){?>
						<li class="nozeroarabic"><span><strong><?php echo $top; ?></strong></span>
<?php
					}if($bot){?>
							<span style="margin-right: 10px;"><?php echo $bot; ?>							
							</span><br><br>
<?php
					}
				}?>
					</ol>
					<div class="rightsmallline"></div>
				</div>

				<div class="col-md-5 collistmenaar">
					<div class="row collistmenaarhead">
						<div class="collistmenaarlogo">
							<img src="https://www.zillacapital.com/wp-content/uploads/2023/12/MAs-blue.png">
						</div>
						<div class="collistmenaartitle">
							<h2 id='M&Asa'>اندماجات واستحواذات</h2>
						</div>
						<div class="collistmenaarimg">
							<img src="https://www.zillacapital.com/wp-content/uploads/2023/12/MAs-scaled.jpg">
						</div>
					</div>
					<ol>
	<?php
				for ($n = 6; $n <= 10; $n++) {
					$top = get_post_meta(get_the_ID(), '_a_news_box'.$n.'_top', true );
					$bot = get_post_meta(get_the_ID(), '_a_news_box'.$n.'_bot', true );
					if($top){?>
						<li class="nozeroarabic"><span><strong><?php echo $top; ?></strong></span>
<?php
					}if($bot){?>
							<span style="margin-right: 10px;"><?php echo $bot; ?>							
							</span><br><br>
<?php
					}
				}?>
				
					</ol>
					<div class="rightsmallline"></div>
				</div>
			</div>	
			<div class="row"  style="
				margin-top: 50px;
			">
				<div class="col-md-5 collistmenaar">
					<div class="row collistmenaarhead">
						<div class="collistmenaarlogo"><img src="https://www.zillacapital.com/wp-content/uploads/2023/12/Industries-blue.png"></div>
						<div class="collistmenaartitle"><h2 id='Industriesa'>الصناعات</h2></div>
						<div class="collistmenaarimg">
							<img src="https://www.zillacapital.com/wp-content/uploads/2023/12/shutterstock-624964346.png">
						</div>
					</div>
					<ol>
	<?php
				for ($n = 11; $n <= 15; $n++) {
					$top = get_post_meta(get_the_ID(), '_a_news_box'.$n.'_top', true );
					$bot = get_post_meta(get_the_ID(), '_a_news_box'.$n.'_bot', true );
					if($top){?>
						<li class="nozeroarabic"><span><strong><?php echo $top; ?></strong></span>
<?php
					}if($bot){?>
							<span style="margin-right: 10px;"><?php echo $bot; ?>							
							</span><br><br>
<?php
					}
				}?></ol>
					<div class="rightsmallline"></div>
				</div>

					<div class="col-md-5 collistmenaar"><div class="row collistmenaarhead">
						<div class="collistmenaarlogo"><img src="https://www.zillacapital.com/wp-content/uploads/2023/12/Political-blue.png"></div>
						<div class="collistmenaartitle"><h2 id='GeoPoliticala'>جيوسياسية</h2></div>
						<div class="collistmenaarimg">
							<img src="https://www.zillacapital.com/wp-content/uploads/2023/12/Political-scaled.jpg">
						</div>
					</div>
					<ol>
	<?php
				for ($n = 16; $n <= 20; $n++) {
					$top = get_post_meta(get_the_ID(), '_a_news_box'.$n.'_top', true );
					$bot = get_post_meta(get_the_ID(), '_a_news_box'.$n.'_bot', true );
					if($top){?>
						<li class="nozeroarabic"><span><strong><?php echo $top; ?></strong></span>
<?php
					}if($bot){?>
							<span style="margin-right: 10px;"><?php echo $bot; ?>							
							</span><br><br>
<?php
					}
				}?></ol>
					<div class="rightsmallline"></div>
				</div>
				</div>			
			</div>	
		</div>

<?php		
}
?>
	<?php
		$GE_news_box1_top = get_post_meta(get_the_ID(), '_GE_news_box1_top', true );
		$GE_news_box2_top = get_post_meta(get_the_ID(), '_GE_news_box2_top', true );
		$GE_news_box3_top = get_post_meta(get_the_ID(), '_GE_news_box3_top', true );
		$GE_news_box4_top = get_post_meta(get_the_ID(), '_GE_news_box4_top', true );
		$GE_news_box5_top = get_post_meta(get_the_ID(), '_GE_news_box5_top', true );
		
		$GE_news_box1_bot = get_post_meta(get_the_ID(), '_GE_news_box1_bot', true );
		$GE_news_box2_bot = get_post_meta(get_the_ID(), '_GE_news_box2_bot', true );
		$GE_news_box3_bot = get_post_meta(get_the_ID(), '_GE_news_box3_bot', true );
		$GE_news_box4_bot = get_post_meta(get_the_ID(), '_GE_news_box4_bot', true );
		$GE_news_box5_bot = get_post_meta(get_the_ID(), '_GE_news_box5_bot', true );
		
		$GE_news1_img = get_post_meta(get_the_ID(), '_GE_news1_img', true );
		$GE_news2_img = get_post_meta(get_the_ID(), '_GE_news2_img', true );
		$GE_news3_img = get_post_meta(get_the_ID(), '_GE_news3_img', true );
		$GE_news4_img = get_post_meta(get_the_ID(), '_GE_news4_img', true );
		$GE_news5_img = get_post_meta(get_the_ID(), '_GE_news5_img', true );
	?>
	
	<?php if(!empty($GE_news_box1_top)): ?>
		<section class="article_content-content" style="text-align: justify; margin-top: 10px;margin-bottom: 130px;">
			<div class="container">
				<?php 
				if ( wp_is_mobile() ){
					if($GE_news_box1_top):?>

					<div class="row  justify-content-between">
						<div class="col-md-6" style="padding-left: 0px;">
							<?php echo '<img src="'.$GE_news1_img.'" alt="'.$GE_news_box1_top.'" />'; ?>
						</div>
					
						<div class="col-md-6" style="padding-right: 0px; padding-left: 0px;">
						<?php
						if ( wp_is_mobile() ){
						?>
							<div class="section_content_wrapper" style="text-align: justify;"><h3 style="font-size: 20px; margin-top: 20px;"><?php echo $GE_news_box1_top; ?></h3>
						<?php
						}
						else{
						?>
							<div class="section_content_wrapper" style="text-align: justify; height: 237px; position: relative;"><h3 style="font-size: 20px; position: absolute; top: 50%; transform: translateY(-50%); margin-top: 0px;"><?php echo $GE_news_box1_top; ?></h3>
						<?php
						}
						?>
							
							</div>
						</div>
						
						<div class="article_content-content" style="text-align: justify; white-space: pre-line; line-height: 150%; margin-top: 25px; font-size:16px; font-family: lato,helvetica neue,helvetica,arial,sans-serif; margin-bottom: 10px;"><?php echo $GE_news_box1_bot;?>
						</div>
					</div>
					
					<?php endif; ?>
					
					<?php if($GE_news_box2_top):?>

					<div class="row  justify-content-between">				

						<div class="col-md-6" style="margin-top: 20px; padding-left: 0px;">
							<?php echo '<img src="'.$GE_news2_img.'" alt="'.$GE_news_box2_top.'" />'; ?>
						</div>

						<div class="col-md-6" style="padding-right: 0px; padding-left: 0px;">
							<div class="section_content_wrapper" style="text-align: justify;"><h3 style="font-size: 20px; margin-top: 20px;"><?php echo $GE_news_box2_top; ?></h3>
							</div>
						</div>
						
						<div class="article_content-content" style="text-align: justify; white-space: pre-line; margin-top: 25px; line-height: 150%; font-size:16px; font-family: lato,helvetica neue,helvetica,arial,sans-serif; margin-bottom: 10px;"><?php echo $GE_news_box2_bot;?>
						</div>
					</div>
					
					<?php endif; ?>		

					<?php if($GE_news_box3_top):?>

					<div class="row  justify-content-between">
						<div class="col-md-6" style="padding-left: 0px;" style="margin-top: 40px;">
							<?php echo '<img src="'.$GE_news3_img.'" alt="'.$GE_news_box3_top.'" />'; ?>
						</div>
					
						<div class="col-md-6" style="padding-right: 0px; padding-left: 0px;">
							<div class="section_content_wrapper" style="text-align: justify;"><h3 style="font-size: 20px; margin-top: 20px;"><?php echo $GE_news_box3_top; ?></h3>
							</div>
						</div>
						
						<div class="article_content-content" style="text-align: justify; white-space: pre-line; margin-top: 25px; line-height: 150%; font-size:16px; font-family: lato,helvetica neue,helvetica,arial,sans-serif; margin-bottom: 10px;"><?php echo $GE_news_box3_bot;?>
						</div>
					</div>
					
					<?php endif; ?>

					<?php if($GE_news_box4_top):?>

					<div class="row  justify-content-between">
						<div class="col-md-6" style="margin-top: 20px; padding-left: 0px;">
							<?php echo '<img src="'.$GE_news4_img.'" alt="'.$GE_news_box4_top.'" />'; ?>
						</div>
					
						<div class="col-md-6" style="padding-right: 0px; padding-left: 0px;">
							<div class="section_content_wrapper" style="text-align: justify;"><h3 style="font-size: 20px; margin-top: 20px;"><?php echo $GE_news_box4_top; ?></h3>
							</div>
						</div>
															
						<div class="article_content-content" style="text-align: justify; white-space: pre-line; margin-top: 25px; line-height: 150%; font-size:16px; font-family: lato,helvetica neue,helvetica,arial,sans-serif; margin-bottom: 10px;"><?php echo $GE_news_box4_bot;?>
						</div>
					</div>
					
					<?php endif; ?>
					
					<?php if($GE_news_box5_top):?>

					<div class="row  justify-content-between">
						<div class="col-md-6" style="padding-left: 0px;" style="margin-top: 20px;">
							<?php echo '<img src="'.$GE_news5_img.'" alt="'.$GE_news_box5_top.'" />'; ?>
						</div>
					
						<div class="col-md-6" style="padding-right: 0px; padding-left: 0px;">
							<div class="section_content_wrapper" style="text-align: justify;"><h3 style="font-size: 20px; margin-top: 20px;"><?php echo $GE_news_box5_top; ?></h3>
							</div>
						</div>
						
						<div class="article_content-content" style="text-align: justify; white-space: pre-line; margin-top: 25px; line-height: 150%; font-size:16px; font-family: lato,helvetica neue,helvetica,arial,sans-serif; margin-bottom: 10px;"><?php echo $GE_news_box5_bot;?>
						</div>
					</div>					
				<?php
					endif;
				} 
				else {
					if($GE_news_box1_top):?>

					<div class="row  justify-content-between">
						<div class="col-md-6" style="padding-left: 0px;">
							<?php echo '<img src="'.$GE_news1_img.'"/>'; ?>
						</div>
					
						<div class="col-md-6" style="padding-right: 0px; padding-left: 0px;">
						<?php
						if ( wp_is_mobile() ){
						?>
							<div class="section_content_wrapper" style="text-align: justify;"><h3 style="font-size: 20px; margin-top: 20px;"><?php echo $GE_news_box1_top; ?></h3>
						<?php
						}
						else{
						?>
							<div class="section_content_wrapper" style="text-align: justify; height: 237px; position: relative;"><h3 style="font-size: 20px; position: absolute; top: 50%; transform: translateY(-50%); margin-top: 0px;"><?php echo $GE_news_box1_top; ?></h3>
						<?php
						}
						?>
							
							</div>
						</div>
						
						<div class="article_content-content" style="text-align: justify; white-space: break-spaces; line-height: 150%; margin-top: 25px; font-size:16px; font-family: lato,helvetica neue,helvetica,arial,sans-serif; margin-bottom: 10px;"><?php echo $GE_news_box1_bot;?>
						</div>
					</div>
					
					<?php endif; ?>
					
					<?php if($GE_news_box2_top):?>

					<div class="row  justify-content-between">				
						<div class="col-md-6" style="padding-right: 0px; padding-left: 0px;">
						<?php
						if ( wp_is_mobile() ){
						?>
							<div class="section_content_wrapper" style="text-align: justify;"><h3 style="font-size: 20px; margin-top: 20px;"><?php echo $GE_news_box2_top; ?></h3>
						<?php
						}
						else{
						?>
							<div class="section_content_wrapper" style="text-align: justify; height: 237px; position: relative;"><h3 style="font-size: 20px; position: absolute; top: 50%; transform: translateY(-50%); margin-top: 0px;"><?php echo $GE_news_box2_top; ?></h3>
						<?php
						}
						?>					
							
							</div>
						</div>

						<div class="col-md-6" <?php if ( wp_is_mobile() ){echo 'style="margin-top: 20px;"';}?>>
							<?php echo '<img src="'.$GE_news2_img.'" alt="'.$GE_news_box2_top.'" />'; ?>
						</div>
						
						<div class="article_content-content" style="text-align: justify; white-space: break-spaces; margin-top: 25px; line-height: 150%; font-size:16px; font-family: lato,helvetica neue,helvetica,arial,sans-serif; margin-bottom: 10px;"><?php echo $GE_news_box2_bot;?>
						</div>
					</div>
					
					<?php endif; ?>		

					<?php if($GE_news_box3_top):?>

					<div class="row  justify-content-between">
						<div class="col-md-6" style="padding-left: 0px;" <?php if ( wp_is_mobile() ){echo 'style="margin-top: 40px;"';}?>>
							<?php echo '<img src="'.$GE_news3_img.'" alt="'.$GE_news_box3_top.'" />'; ?>
						</div>
					
						<div class="col-md-6" style="padding-right: 0px; padding-left: 0px;">
						<?php
						if ( wp_is_mobile() ){
						?>
							<div class="section_content_wrapper" style="text-align: justify;"><h3 style="font-size: 20px; margin-top: 20px;"><?php echo $GE_news_box3_top; ?></h3>
						<?php
						}
						else{
						?>
							<div class="section_content_wrapper" style="text-align: justify; height: 237px; position: relative;"><h3 style="font-size: 20px; position: absolute; top: 50%; transform: translateY(-50%); margin-top: 0px;"><?php echo $GE_news_box3_top; ?></h3>
						<?php
						}
						?>											
							</div>
						</div>
						
						<div class="article_content-content" style="text-align: justify; white-space: break-spaces; margin-top: 25px; line-height: 150%; font-size:16px; font-family: lato,helvetica neue,helvetica,arial,sans-serif; margin-bottom: 10px;"><?php echo $GE_news_box3_bot;?>
						</div>
					</div>
					
					<?php endif; ?>

					<?php if($GE_news_box4_top):?>

					<div class="row  justify-content-between">
						<div class="col-md-6" style="padding-right: 0px; padding-left: 0px;">
						<?php
						if ( wp_is_mobile() ){
						?>
							<div class="section_content_wrapper" style="text-align: justify;"><h3 style="font-size: 20px; margin-top: 20px;"><?php echo $GE_news_box4_top; ?></h3>
						<?php
						}
						else{
						?>
							<div class="section_content_wrapper" style="text-align: justify; height: 237px; position: relative;"><h3 style="font-size: 20px; position: absolute; top: 50%; transform: translateY(-50%); margin-top: 0px;"><?php echo $GE_news_box4_top; ?></h3>
						<?php
						}
						?>											
							</div>
						</div>
					
						<div class="col-md-6" <?php if ( wp_is_mobile() ){echo 'style="margin-top: 20px;"';}?>>
							<?php echo '<img src="'.$GE_news4_img.'" alt="'.$GE_news_box4_top.'" />'; ?>
						</div>
										
						<div class="article_content-content" style="text-align: justify; white-space: break-spaces; margin-top: 25px; line-height: 150%; font-size:16px; font-family: lato,helvetica neue,helvetica,arial,sans-serif; margin-bottom: 10px;"><?php echo $GE_news_box4_bot;?>
						</div>
					</div>
					
					<?php endif; ?>
					
					<?php if($GE_news_box5_top):?>

					<div class="row  justify-content-between">
						<div class="col-md-6" style="padding-left: 0px;" <?php if ( wp_is_mobile() ){echo 'style="margin-top: 20px;"';}?>>
							<?php echo '<img src="'.$GE_news5_img.'" alt="'.$GE_news_box5_top.'" />'; ?>
						</div>
					
						<div class="col-md-6" style="padding-right: 0px; padding-left: 0px;">
						<?php
						if ( wp_is_mobile() ){
						?>
							<div class="section_content_wrapper" style="text-align: justify;"><h3 style="font-size: 20px; margin-top: 20px;"><?php echo $GE_news_box5_top; ?></h3>
						<?php
						}
						else{
						?>
							<div class="section_content_wrapper" style="text-align: justify; height: 237px; position: relative;"><h3 style="font-size: 20px; position: absolute; top: 50%; transform: translateY(-50%); margin-top: 0px;"><?php echo $GE_news_box5_top; ?></h3>
						<?php
						}
						?>											
							
							</div>
						</div>
						
						<div class="article_content-content" style="text-align: justify; white-space: break-spaces; margin-top: 25px; line-height: 150%; font-size:16px; font-family: lato,helvetica neue,helvetica,arial,sans-serif; margin-bottom: 10px;"><?php echo $GE_news_box5_bot;?>
						</div>
					</div>
					
				<?php 
					endif;
				}
				?>
								
			</div>
		</section>
		</div>
	</div>
	
<?php

		if($arabicge){
		?>

		</div>	
		<div dir="RTL" class="article_content col-11 col-lg-10" id="Arabic" style="margin-top: 0px;font-family: 'AdobeNaskh';">		

				<div class="row justify-content-center">
					<div class="col-lg-11">
						<div class="meta_data">
						<div>
							<div class="label insight-label">النشرة اإخبارية</div>
								<date><?php
								  $postdate_d = get_the_date('d');
								  $postdate_d2 = get_the_date('D');
								  $postdate_m = get_the_date('M');
								  $postdate_y = get_the_date('Y');                                
								 echo single_post_arabic_date($postdate_d,$postdate_d2, $postdate_m, $postdate_y);
								?></date>
							</div>
	
							<div class="share-services share-buttons light social-share-bar" style="right:revert; left:0px;" data-share-hash=""> 
							  <button class="icon-share"></button> 
								<div class="share-options"> 
								   <a href="#" class="icon-facebook share-item" data-platform="facebook"></a> 
								   <a href="#" class="icon-linkedin2 share-item" data-platform="linkedin"></a> 
								   <a href="#" class="icon-whatsapp share-item" data-platform="whatsapp"></a> 
								   <a href="#" class="icon-mail share-item" data-platform="email"></a> 
								   <a href="#" class="icon-copylink share-item" data-platform="copylink"></a> 
								   <a href="#" class="more share-item" data-platform="more" style="display: none;">+ more</a> 
								   <a href="#" class="icon-close_large"></a> 
								</div> 
							</div>
						</div>

						<div style="
							text-align: left;
							margin-bottom: 10px;
							width: 100%;
							margin-right: -35px;
							margin-top: -10px;
						"><a href="#" style="
							color: green;
							font-size: 13px;
							font-weight: 800;
							">To read the news in English press here</a>
						</div><?php
							if ( wp_is_mobile() ) {
								echo '<img src="https://www.zillacapital.com/wp-content/uploads/2023/12/Webbanneraferarabic.png" alt="Global Espresso" style="object-fit: fill; max-height: 130px;" />';
							}
							else{
								echo '<img src="https://www.zillacapital.com/wp-content/uploads/2023/12/Webbanneraferarabic.png" alt="Global Espresso" style="object-fit: cover;" />';
							}
						?>
						<section class="article_content-content" style="text-align: justify; margin-top: 10px;margin-bottom: 130px;">
							<div class="container">
					<?php 
				for($n=1;$n<=5;$n++){

					$GE_news_box_top = get_post_meta(get_the_ID(), '_a_GE_news_box'.$n.'_top', true );
					$GE_news_box_bot = get_post_meta(get_the_ID(), '_a_GE_news_box'.$n.'_bot', true );
					$GE_news_img = get_post_meta(get_the_ID(), '_GE_news'.$n.'_img', true );
					if ($GE_news_box_top){
						if($n%2 == 0){?>
							<div class="row  justify-content-between">
								<div class="col-md-6" style="padding-left: 0px; padding-left: 0px;">
								<?php
								if ( wp_is_mobile() ){
								?>
									<div class="section_content_wrapper" style="text-align: justify;"><h3 style="font-family: 'AdobeNaskh';font-size: 20px; margin-top: 20px;"><?php echo $GE_news_box_top; ?></h3>
								<?php
								}
								else{
								?>
									<div class="section_content_wrapper" style="text-align: justify; height: 237px; position: relative;"><h3 style="font-family: 'AdobeNaskh';font-size: 20px; position: absolute; top: 50%; transform: translateY(-50%); margin-top: 0px;"><?php echo $GE_news_box_top; ?></h3>
								<?php
								}
								?>											
									</div>
								</div>
							
								<div class="col-md-6" style="padding-left: 0px;" <?php if ( wp_is_mobile() ){echo 'style="margin-top: 20px;"';}?>>
									<?php echo '<img src="'.$GE_news_img.'" alt="'.$GE_news_box_top.'" />'; ?>
								</div>

								<div class="article_content-content" style="text-align: justify; white-space: break-spaces; margin-top: 25px; line-height: 150%; font-size:16px;font-family: 'AdobeNaskh'; margin-bottom: 10px;"><?php echo $GE_news_box_bot;?>
								</div>
							</div>
							<?php 
							} else {?>
							<div class="row  justify-content-between">
								<div class="col-md-6" style="padding-right: 0px;" <?php if ( wp_is_mobile() ){echo 'style="margin-top: 20px;"';}?>>
									<?php echo '<img src="'.$GE_news_img.'" alt="'.$GE_news_box_top.'" />'; ?>
								</div>
							
								<div class="col-md-6" style="padding-left: 0px;">
								<?php
								if ( wp_is_mobile() ){
								?>
									<div class="section_content_wrapper" style="text-align: justify;"><h3 style="font-family: 'AdobeNaskh'; font-size: 20px; margin-top: 20px;"><?php echo $GE_news_box_top; ?></h3>
								<?php
								}
								else{
								?>
									<div class="section_content_wrapper" style="text-align: justify; height: 237px; position: relative;"><h3 style="font-family: 'AdobeNaskh';font-size: 20px; position: absolute; top: 50%; transform: translateY(-50%); margin-top: 0px;"><?php echo $GE_news_box_top; ?></h3>
								<?php
								}
								?>											
									
									</div>
								</div>
								
								<div class="article_content-content" style="text-align: justify; white-space: break-spaces; margin-top: 25px; line-height: 150%; font-size:16px; font-family: 'AdobeNaskh'; margin-bottom: 10px;"><?php echo $GE_news_box_bot;?>
								</div>
							</div>
						
					<?php 
						}
					}
				}
				?>
					
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
		<?php 
		}
	endif; ?>		
	
	<?php
		/**
		 * get custom meta box details
		 * this meta box decleared in inc/cpt_meta_boxes
		 * this meta boxes copied from old website
		 * need to be refactored with new names and consider not to lose data
		 */
		$economic = get_post_meta($post->ID, '_details_box', true);
		$political = get_post_meta($post->ID, '_details_boxx', true);
		$stock = get_post_meta($post->ID, '_details_boxxx', true);
		$companies = get_post_meta($post->ID, '_details_boxxxx', true);
		$sports = get_post_meta($post->ID, '_details_boxxxxx', true);
	?>

	<?php if(!empty($economic)||!empty($political)||!empty($stock)||!empty($companies)||!empty($sports)): ?>
		<section class="insight_tabs">
			<div class="container">
				<ul class="tabs_wrapper">
					<?php if($economic):?>
						<li class="economic_tab">
							<a href="#economic_outlook">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
										<g transform="translate(-285.867 -1054.867)">
											<circle cx="20" cy="20" r="20" fill="#4390cb" transform="translate(285.867 1054.867)"/>
											<g>
												<path fill="none" d="M0 0H28V28H0z" transform="translate(291.868 1060.867)"/>
												<path fill="#fff" fill-rule="evenodd" d="M18.617 11.456H0V0h18.617zM1.432 10.024h15.753V1.432H1.432zm21.481 5.728H4.3v-2.883h1.428v1.451h15.753V5.728H20.04V4.3h2.873zm-13.6-7.16a2.864 2.864 0 1 1 2.864-2.864 2.864 2.864 0 0 1-2.869 2.864zm0-4.3a1.432 1.432 0 1 0 1.427 1.436A1.432 1.432 0 0 0 9.308 4.3zM4.3 4.3H2.864V2.864H4.3zm0 4.3H2.864V7.16H4.3zm11.453-4.3h-1.432V2.864h1.432zm0 4.3h-1.432V7.16h1.432z" transform="translate(291.868 1060.867) rotate(-45 20.682 7.625)"/>
											</g>
										</g>
									</svg>
								</span>
								Economic Outlook
							</a>
						</li>
					<?php endif; ?>
					<?php if($political):?>
						<li class="political_tab">
							<a href="#poltical_events">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
										<defs>
											<style>
												.cls-2{fill:#fff;stroke:#fff;stroke-width:.5px}
											</style>
										</defs>
										<g id="Group_20123" transform="translate(-285.867 -1054.867)">
											<circle id="Ellipse_518" cx="20" cy="20" r="20" fill="#fbaf22" transform="translate(285.867 1054.867)"/>
											<g id="mike" transform="translate(299.665 1061.802)">
												<path id="Path_19377" d="M.9 210.566a.4.4 0 0 0-.4.4 6.344 6.344 0 0 0 5.938 6.323v3.887H2.659a.4.4 0 0 0 0 .8h8.355a.4.4 0 0 0 0-.8h-3.78v-3.887a6.344 6.344 0 0 0 5.938-6.322.4.4 0 0 0-.8 0 5.54 5.54 0 1 1-11.079 0 .4.4 0 0 0-.4-.4zm0 0" class="cls-2" transform="translate(-.5 -196.994)"/>
												<path id="Path_19378" d="M23.974 6a3.8 3.8 0 0 0-3.791 3.791v7.191h-.929a.4.4 0 0 0 0 .8h.929v2.191a3.791 3.791 0 1 0 7.582 0v-2.198h.929a.4.4 0 1 0 0-.8h-.929V9.787A3.8 3.8 0 0 0 23.974 6zm2.995 13.97a2.995 2.995 0 1 1-5.99 0v-2.195h5.99zm0-2.988h-5.99V9.787a2.995 2.995 0 1 1 5.99 0zm0 0" class="cls-2" transform="translate(-17.638 -5.996)"/>
												<path id="Path_19379" d="M67.637 68.781a.653.653 0 1 0 .653.653.652.652 0 0 0-.653-.653zm0 .8a.144.144 0 1 1 .144-.144.144.144 0 0 1-.144.14zm0 0" class="cls-2" transform="translate(-62.574 -64.616)"/>
												<path id="Path_19380" d="M105.993 68.781a.653.653 0 1 0 .653.653.653.653 0 0 0-.653-.653zm0 .8a.144.144 0 1 1 .144-.144.144.144 0 0 1-.144.14zm0 0" class="cls-2" transform="translate(-98.385 -64.616)"/>
												<path id="Path_19381" d="M67.637 119.926a.653.653 0 1 0 .653.652.652.652 0 0 0-.653-.652zm0 .8a.144.144 0 1 1 .144-.144.144.144 0 0 1-.144.14zm0 0" class="cls-2" transform="translate(-62.574 -112.367)"/>
												<path id="Path_19382" d="M105.993 119.926a.653.653 0 1 0 .653.652.653.653 0 0 0-.653-.652zm0 .8a.144.144 0 1 1 .144-.144.144.144 0 0 1-.144.14zm0 0" class="cls-2" transform="translate(-98.385 -112.367)"/>
											</g>
										</g>
									</svg>
								</span>
								Political Events
							</a>
						</li>
					<?php endif; ?>
					<?php if($stock):?>
						<li class="stock_tab">
							<a href="#stock_market">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
										<defs>
											<style>
												.cls-3{fill:#fff;fill-rule:evenodd}
											</style>
										</defs>
										<g id="Group_20124" transform="translate(-285.867 -1054.734)">
											<circle id="Ellipse_518" cx="20" cy="20" r="20" fill="#ed4d4d" transform="translate(285.867 1054.734)"/>
											<g id="Group_20114" transform="translate(292.512 1062.841)">
												<path id="Rectangle_3774" fill="none" d="M0 0H26V27H0z" transform="translate(.355 -.105)"/>
												<g id="Group_11440" transform="translate(3.565 2.599)">
													<path id="Path_13026" d="M67.778 30.177v1.341H48.261V12H49.6v3.43h1.341v1.34H49.6v1.341h1.341v1.341H49.6v1.341h1.341v1.341H49.6v1.341h1.341v1.341H49.6v1.341h1.341V27.5H49.6v2.681h3.352v-1.345h1.341v1.341h1.341v-1.341h1.341v1.341h1.341v-1.341h1.341v1.341H61v-1.341h1.341v1.341h1.341v-1.341h1.341v1.341h2.759z" class="cls-3" transform="translate(-48.261 -12)"/>
													<path id="Path_13027" d="M70.081 16v6.033H68.74v-3.747L63.424 23.6l-3.284-2.62-3.606 4.806-1.073-.8L59.9 19.07l3.43 2.73 4.458-4.464h-3.74V16z" class="cls-3" transform="translate(-50.635 -12.57)"/>
												</g>
											</g>
										</g>
									</svg>
								</span>
								Stock Market
							</a>
						</li>
					<?php endif; ?>
					<?php if($companies):?>
						<li class="companies_tab">
							<a href="#companies_transactions">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
										<defs>
											<style>
												.cls-2{fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5px}
											</style>
										</defs>
										<g id="Group_20125" transform="translate(-285.867 -1054.867)">
											<circle id="Ellipse_518" cx="20" cy="20" r="20" fill="#4c43cb" transform="translate(285.867 1054.867)"/>
											<g id="Group_20115" transform="translate(296.587 1067.586)">
												<path id="Path_19383" d="M-13034.918 19549l8.275 4.461h-18.559" class="cls-2" transform="translate(13045.201 -19549)"/>
												<path id="Path_19384" d="M-13036.926 19553.463l-8.273-4.461h18.561" class="cls-2" transform="translate(13045.199 -19538.9)"/>
											</g>
										</g>
									</svg>
								</span>
								Companies Transactions
							</a>
						</li>
					<?php endif; ?>
					<?php if($sports):?>
						<li class="sports_tab">
							<a href="#sports_culture">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
										<g transform="translate(-285.867 -1054.667)">
											<circle cx="20" cy="20" r="20" fill="#43cbb8" transform="translate(285.867 1054.667)"/>
											<path fill="#fff" d="M11.233 0a11.233 11.233 0 1 0 11.232 11.233A11.233 11.233 0 0 0 11.233 0zm.4 3.238l3.9-1.561a10.507 10.507 0 0 1 1.283.692l.01.006a10.544 10.544 0 0 1 1.156.848l.031.027q.246.21.478.433l.06.057q.244.238.472.491l.037.044c.134.15.262.3.387.462l.089.112c.135.175.266.353.39.537L19.154 8.7l-3.83 1.277-3.69-2.956zM2.922 4.852l.089-.112q.185-.234.382-.458l.042-.048q.227-.253.47-.491c.019-.018.037-.037.057-.054q.231-.222.474-.431l.037-.031a10.585 10.585 0 0 1 1.145-.842l.015-.009a10.518 10.518 0 0 1 1.275-.691l3.923 1.553V7.02L7.142 9.971 3.312 8.7l-.778-3.312c.125-.184.254-.361.389-.536zm-.451 12.126q-.165-.252-.316-.513l-.024-.042q-.15-.26-.283-.529v-.006a10.432 10.432 0 0 1-.493-1.161c-.067-.187-.127-.379-.183-.572l-.02-.071q-.077-.272-.14-.55C1 13.514 1 13.5 1 13.479a10.421 10.421 0 0 1-.2-1.269l2.284-2.742 3.8 1.268 1.1 4.415-1.806 2.413zm11.255 4.436c-.187.046-.379.086-.571.122l-.081.015c-.164.029-.329.054-.495.075l-.132.017c-.154.018-.309.031-.465.043l-.146.011c-.2.012-.4.019-.6.019q-.278 0-.552-.015c-.022 0-.043 0-.065-.005q-.244-.014-.487-.037h-.019a10.669 10.669 0 0 1-1.056-.168L6.839 18.02l1.785-2.381h5.217l1.815 2.4zm7.746-7.935l-.012.053q-.063.278-.14.55l-.02.071c-.056.193-.117.384-.184.572a10.4 10.4 0 0 1-.493 1.161v.006q-.134.269-.283.529l-.024.042q-.15.262-.315.512l-3.701.585-1.826-2.411 1.1-4.414 3.8-1.268 2.286 2.743a10.4 10.4 0 0 1-.2 1.269zm0 0" transform="translate(294.535 1063.535)"/>
										</g>
									</svg>
								</span>
								Sports and Culture
							</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</section>
	<?php endif; ?>

	<?php if(!empty($economic)||!empty($political)||!empty($stock)||!empty($companies)||!empty($sports)): ?>
		<div class="container">
			<div class="row justify-content-center">
				<div class="meta_box col-11 col-lg-10">
					<?php if(!empty($economic)): ?>
						<div class="row justify-content-center" id="economic_outlook">
							<div class="col-11 meta_box_content">
								<h4>
									<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
										<g transform="translate(-285.867 -1054.867)">
											<circle cx="20" cy="20" r="20" fill="#4390cb" transform="translate(285.867 1054.867)"/>
											<g>
												<path fill="none" d="M0 0H28V28H0z" transform="translate(291.868 1060.867)"/>
												<path fill="#fff" fill-rule="evenodd" d="M18.617 11.456H0V0h18.617zM1.432 10.024h15.753V1.432H1.432zm21.481 5.728H4.3v-2.883h1.428v1.451h15.753V5.728H20.04V4.3h2.873zm-13.6-7.16a2.864 2.864 0 1 1 2.864-2.864 2.864 2.864 0 0 1-2.869 2.864zm0-4.3a1.432 1.432 0 1 0 1.427 1.436A1.432 1.432 0 0 0 9.308 4.3zM4.3 4.3H2.864V2.864H4.3zm0 4.3H2.864V7.16H4.3zm11.453-4.3h-1.432V2.864h1.432zm0 4.3h-1.432V7.16h1.432z" transform="translate(291.868 1060.867) rotate(-45 20.682 7.625)"/>
											</g>
										</g>
									</svg>
									Economic Outlook
								</h4>
								<div class="article_content-content">
									<?php echo $economic; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<?php if(!empty($political)): ?>
						<div class="row justify-content-center">
							<div class="col-11 meta_box_content" id="poltical_events">
								<h4>
									<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
										<defs>
											<style>
												.cls-2{fill:#fff;stroke:#fff;stroke-width:.5px}
											</style>
										</defs>
										<g id="Group_20123" transform="translate(-285.867 -1054.867)">
											<circle id="Ellipse_518" cx="20" cy="20" r="20" fill="#fbaf22" transform="translate(285.867 1054.867)"/>
											<g id="mike" transform="translate(299.665 1061.802)">
												<path id="Path_19377" d="M.9 210.566a.4.4 0 0 0-.4.4 6.344 6.344 0 0 0 5.938 6.323v3.887H2.659a.4.4 0 0 0 0 .8h8.355a.4.4 0 0 0 0-.8h-3.78v-3.887a6.344 6.344 0 0 0 5.938-6.322.4.4 0 0 0-.8 0 5.54 5.54 0 1 1-11.079 0 .4.4 0 0 0-.4-.4zm0 0" class="cls-2" transform="translate(-.5 -196.994)"/>
												<path id="Path_19378" d="M23.974 6a3.8 3.8 0 0 0-3.791 3.791v7.191h-.929a.4.4 0 0 0 0 .8h.929v2.191a3.791 3.791 0 1 0 7.582 0v-2.198h.929a.4.4 0 1 0 0-.8h-.929V9.787A3.8 3.8 0 0 0 23.974 6zm2.995 13.97a2.995 2.995 0 1 1-5.99 0v-2.195h5.99zm0-2.988h-5.99V9.787a2.995 2.995 0 1 1 5.99 0zm0 0" class="cls-2" transform="translate(-17.638 -5.996)"/>
												<path id="Path_19379" d="M67.637 68.781a.653.653 0 1 0 .653.653.652.652 0 0 0-.653-.653zm0 .8a.144.144 0 1 1 .144-.144.144.144 0 0 1-.144.14zm0 0" class="cls-2" transform="translate(-62.574 -64.616)"/>
												<path id="Path_19380" d="M105.993 68.781a.653.653 0 1 0 .653.653.653.653 0 0 0-.653-.653zm0 .8a.144.144 0 1 1 .144-.144.144.144 0 0 1-.144.14zm0 0" class="cls-2" transform="translate(-98.385 -64.616)"/>
												<path id="Path_19381" d="M67.637 119.926a.653.653 0 1 0 .653.652.652.652 0 0 0-.653-.652zm0 .8a.144.144 0 1 1 .144-.144.144.144 0 0 1-.144.14zm0 0" class="cls-2" transform="translate(-62.574 -112.367)"/>
												<path id="Path_19382" d="M105.993 119.926a.653.653 0 1 0 .653.652.653.653 0 0 0-.653-.652zm0 .8a.144.144 0 1 1 .144-.144.144.144 0 0 1-.144.14zm0 0" class="cls-2" transform="translate(-98.385 -112.367)"/>
											</g>
										</g>
									</svg>
									Political Events
								</h4>
								<div class="article_content-content">
									<?php echo $political; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<?php if(!empty($stock)): ?>
						<div class="row justify-content-center">
							<div class="col-11 meta_box_content" id="stock_market">
								<h4>
									<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
										<defs>
											<style>
												.cls-3{fill:#fff;fill-rule:evenodd}
											</style>
										</defs>
										<g id="Group_20124" transform="translate(-285.867 -1054.734)">
											<circle id="Ellipse_518" cx="20" cy="20" r="20" fill="#ed4d4d" transform="translate(285.867 1054.734)"/>
											<g id="Group_20114" transform="translate(292.512 1062.841)">
												<path id="Rectangle_3774" fill="none" d="M0 0H26V27H0z" transform="translate(.355 -.105)"/>
												<g id="Group_11440" transform="translate(3.565 2.599)">
													<path id="Path_13026" d="M67.778 30.177v1.341H48.261V12H49.6v3.43h1.341v1.34H49.6v1.341h1.341v1.341H49.6v1.341h1.341v1.341H49.6v1.341h1.341v1.341H49.6v1.341h1.341V27.5H49.6v2.681h3.352v-1.345h1.341v1.341h1.341v-1.341h1.341v1.341h1.341v-1.341h1.341v1.341H61v-1.341h1.341v1.341h1.341v-1.341h1.341v1.341h2.759z" class="cls-3" transform="translate(-48.261 -12)"/>
													<path id="Path_13027" d="M70.081 16v6.033H68.74v-3.747L63.424 23.6l-3.284-2.62-3.606 4.806-1.073-.8L59.9 19.07l3.43 2.73 4.458-4.464h-3.74V16z" class="cls-3" transform="translate(-50.635 -12.57)"/>
												</g>
											</g>
										</g>
									</svg>
									Stock Market
								</h4>
								<div class="article_content-content">
									<?php echo $stock; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<?php if(!empty($companies)): ?>
						<div class="row justify-content-center">
							<div class="col-11 meta_box_content" id="companies_transactions">
								<h4>
									<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
										<defs>
											<style>
												.cls-2{fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5px}
											</style>
										</defs>
										<g id="Group_20125" transform="translate(-285.867 -1054.867)">
											<circle id="Ellipse_518" cx="20" cy="20" r="20" fill="#4c43cb" transform="translate(285.867 1054.867)"/>
											<g id="Group_20115" transform="translate(296.587 1067.586)">
												<path id="Path_19383" d="M-13034.918 19549l8.275 4.461h-18.559" class="cls-2" transform="translate(13045.201 -19549)"/>
												<path id="Path_19384" d="M-13036.926 19553.463l-8.273-4.461h18.561" class="cls-2" transform="translate(13045.199 -19538.9)"/>
											</g>
										</g>
									</svg>
									Companies Transactions
								</h4>
								<div class="article_content-content">
									<?php echo $companies; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<?php if(!empty($sports)): ?>
						<div class="row justify-content-center">
							<div class="col-11 meta_box_content" id="sports_culture">
								<h4>
									<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
										<g transform="translate(-285.867 -1054.667)">
											<circle cx="20" cy="20" r="20" fill="#43cbb8" transform="translate(285.867 1054.667)"/>
											<path fill="#fff" d="M11.233 0a11.233 11.233 0 1 0 11.232 11.233A11.233 11.233 0 0 0 11.233 0zm.4 3.238l3.9-1.561a10.507 10.507 0 0 1 1.283.692l.01.006a10.544 10.544 0 0 1 1.156.848l.031.027q.246.21.478.433l.06.057q.244.238.472.491l.037.044c.134.15.262.3.387.462l.089.112c.135.175.266.353.39.537L19.154 8.7l-3.83 1.277-3.69-2.956zM2.922 4.852l.089-.112q.185-.234.382-.458l.042-.048q.227-.253.47-.491c.019-.018.037-.037.057-.054q.231-.222.474-.431l.037-.031a10.585 10.585 0 0 1 1.145-.842l.015-.009a10.518 10.518 0 0 1 1.275-.691l3.923 1.553V7.02L7.142 9.971 3.312 8.7l-.778-3.312c.125-.184.254-.361.389-.536zm-.451 12.126q-.165-.252-.316-.513l-.024-.042q-.15-.26-.283-.529v-.006a10.432 10.432 0 0 1-.493-1.161c-.067-.187-.127-.379-.183-.572l-.02-.071q-.077-.272-.14-.55C1 13.514 1 13.5 1 13.479a10.421 10.421 0 0 1-.2-1.269l2.284-2.742 3.8 1.268 1.1 4.415-1.806 2.413zm11.255 4.436c-.187.046-.379.086-.571.122l-.081.015c-.164.029-.329.054-.495.075l-.132.017c-.154.018-.309.031-.465.043l-.146.011c-.2.012-.4.019-.6.019q-.278 0-.552-.015c-.022 0-.043 0-.065-.005q-.244-.014-.487-.037h-.019a10.669 10.669 0 0 1-1.056-.168L6.839 18.02l1.785-2.381h5.217l1.815 2.4zm7.746-7.935l-.012.053q-.063.278-.14.55l-.02.071c-.056.193-.117.384-.184.572a10.4 10.4 0 0 1-.493 1.161v.006q-.134.269-.283.529l-.024.042q-.15.262-.315.512l-3.701.585-1.826-2.411 1.1-4.414 3.8-1.268 2.286 2.743a10.4 10.4 0 0 1-.2 1.269zm0 0" transform="translate(294.535 1063.535)"/>
										</g>
									</svg>
									Sports and Culture
								</h4>
								<div class="article_content-content">
									<?php echo $sports; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	</div>
	<?php endif; ?>

	

	<div class="container">
		<?php
			$orig_post = $post;
			global $post;

			$related = get_posts(
				array(
					'category__in' => wp_get_post_categories($post->ID),
					'numberposts' => 4,
					'post_type' => 'insights',
					'post__not_in' => array($post->ID)
				)
			);

			if( $related ){
				echo '
					<div class="before_loop">
						<p class="section_title">Stay up to date</p>
						<p class="section_subtitle">More Newsletter to Check</p>
					</div>
					<div class="row">';
						foreach( $related as $post ): setup_postdata($post);
							echo '<div class="col-12 col-lg-6">
								<article class="news_article">';
									if(has_post_thumbnail()) {
										$image_id = get_post_thumbnail_id();
										$image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE);

										echo '<img src="'.get_the_post_thumbnail_url().'" alt="'.$image_alt.'" />';
									} echo '
									<div class="content_wrapper">
										<time>'.get_the_date('d M Y') .'</time>
										<h3>'.get_the_title() .'</h3>
										<a href="'.get_the_permalink().'" class="btn btn-secondary btn-icon-arrow_right-colored">Read More</a>
									</div>
								</article>
							</div>';
						endforeach; echo '
					</div>
				';
			}
			wp_reset_postdata();

			$post = $orig_post;
		?>
	</div>

	<?php
		endwhile;
	?>
</main>

<!-- Add Scripts to Share Starts Here -->
<script>
	
(function ($, window, document, undefined) {
// Share toggle
    $(document).on('click', '.icon-share, .icon-close_large, .icon-copylink .share-item', function (e) {
        e.preventDefault();
        $('.share-services').toggleClass('expanded');
    });
}(jQuery, window, document, undefined));

</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
'use strict';

var GS = window['GS'] || {};

if(!GS.Share) {

    var getUri = function(valueEncoded) {
        var href = window.location.href;
        if (valueEncoded) {
            return encodeURIComponent(href);
        }
        return href;
    };

    var getTitle = function() {
        return document.title;
    };

    var encodeUri = function(str) {
        return encodeURIComponent(str);
    };

// todo: revise if all methods can be used in IE
    var  queryCreator = function(map, encode) {
        if (encode === undefined) {
            encode = true;
        }

        var separator = "&";
        var equal = "=";
        var uri = "";

        for (var item in map) {
            if (map.hasOwnProperty(item) && (item)) {
                if (uri.length > 0) {
                    uri += separator
                }
                var value;

                if (encode) {
                    value = encodeURIComponent( map[item]);
                } else {
                    value = map[item];
                }
                uri += "".concat(item).concat(equal).concat(value);
            }
        }
        return uri;
    };

    /* Twitter */
    var Twitter = function() {
        this.name = "Twitter";
        this.baseUrl = "https://twitter.com/share?";
    };

    Twitter.prototype.getUrl = function() {
        var keys = {};
        keys["url"] = getUri(false);
        keys["text"] = getTitle();

        return this.baseUrl + queryCreator(keys, true);
    };

    /* Facebook */
    var Facebook = function() {
        this.name = "Facebook";
        this.baseUrl = "https://www.facebook.com/sharer/sharer.php?";
    };

    Facebook.prototype.getUrl = function() {
        var keys = {};
        keys["u"] = getUri(false);
        return this.baseUrl + queryCreator(keys);
    };

    /* LinkedIn */
    var LinkedIn = function() {
        this.name = "LinkedIn";
        this.baseUrl = "https://www.linkedin.com/shareArticle?";
    };
	
    LinkedIn.prototype.getUrl = function() {
        var keys = {};

        keys["mini"] = "true";
        keys["url"] = getUri(false);
        keys["title"] =  encodeUri(getTitle());

        return this.baseUrl + queryCreator(keys);
    };

    /* whatsapp */
    var WhatsApp = function() {
        this.name = "WhatsApp";
        this.baseUrl = "https://wa.me/?";
    };
	
   WhatsApp.prototype.getUrl = function() {
        var keys = {};
        keys["text"] = getUri(false);
        return this.baseUrl + queryCreator(keys);
    };
	
	   /* copylink */
    var CopyLink = function() {
        this.name = "CopyLink";
    };
	
   CopyLink.prototype.getUrl = function() {
       // var keys = {};
       // keys["text"] = getUri(false);
        //return queryCreator(keys,false);
        return getUri(false);
    };
	
    var Email = function() {
        this.name = "Email";
        this.baseUrl = "mailto:?";
        this.openUsingCurrentWindow = true;
    };

    Email.prototype.getUrl = function() {
        var keys = {};
        keys["subject"] = getTitle();
        keys["body"] = getUri();

        return this.baseUrl + queryCreator(keys);
    };

    var ShareBar = function() {
        this.socialMediaPlatforms = new Map();
        this.init();
    };

    ShareBar.prototype.init = function() {
        this.createPlatforms();

        var shareBarClass = "social-share-bar";

        var shareBars = document.getElementsByClassName(shareBarClass);

        if (shareBars.length > 0) {
            for (var i = 0; i < shareBars.length; i++) {
                var shareBar = shareBars[i];
                this.overrideShareBar(shareBar);
            }
        }
    };

    ShareBar.prototype.createPlatforms = function() {
        var fb = new Facebook();
        var twitter = new Twitter();
        var linkedIn = new LinkedIn();
        var email = new Email();
		var whatsapp = new WhatsApp();
		var copylink = new CopyLink();

        this.socialMediaPlatforms.set(fb.name.toLowerCase(), fb);
        this.socialMediaPlatforms.set(twitter.name.toLowerCase(), twitter);
        this.socialMediaPlatforms.set(linkedIn.name.toLowerCase(), linkedIn);
        this.socialMediaPlatforms.set(email.name.toLowerCase(), email);
		this.socialMediaPlatforms.set(whatsapp.name.toLowerCase(), whatsapp);
		this.socialMediaPlatforms.set(copylink.name.toLowerCase(), copylink);
    };

    ShareBar.prototype.getPlatformFromElement = function(element) {
        var platform = element.getAttribute("data-platform");
        return platform || null;
    };

    ShareBar.prototype.onClickSocialMediaPlatform = function(platformName, event) {
        event.stopPropagation();
        event.preventDefault();

        if (!platformName) {
            platformName = this.getPlatformFromElement(event.target);
        }

        var socialPlatform = this.socialMediaPlatforms.get(platformName);

        var params = "scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,\
        width=600,height=400,left=100,top=100";

		if (platformName != 'copylink'){
			if (socialPlatform) {

				if (socialPlatform.openUsingCurrentWindow) {
					location.href = socialPlatform.getUrl();
				} else {
					window.open(socialPlatform.getUrl(), socialPlatform.name, params);
				}
			}
		}
			else{
				copyTextToClipboard(socialPlatform.getUrl());
                Swal.fire('The newsletter link has been copied', '', 'success');
		}
    };

    ShareBar.prototype.overrideShareBar = function(shareBar) {
        var that = this;
        var items = shareBar.getElementsByTagName("a");

        if (items) {
            for (var i = 0; i < items.length; i++) {
                var item = items[i];

                var platformName = this.getPlatformFromElement(item);

                //the close button is a child element, which does not contain data-platform
                //attribute
                if (platformName === null) {
                    continue;
                }

                var socialMediaPlatform = this.socialMediaPlatforms.get(platformName);
                if (socialMediaPlatform) {
                    (function(platformName) {
                        item.addEventListener("click", function(event){
                            that.onClickSocialMediaPlatform(platformName, event);
                        });
                    })(platformName);

                } else {
                    item.style.display = "none";
                }
            }
        }
    };

    /* Does nothing, this is only here to prevent errors */
    ShareBar.prototype.updateShareTitle = function() {
        return null;
    };

    GS.Share = new ShareBar();
    // GS.Page.register("*", GS.Share.init.bind(GS.Share));
}
	function copyTextToClipboard(text) {
        if (!navigator.clipboard) {
            fallbackCopyTextToClipboard(text);
            return;
        }
        navigator.clipboard.writeText(text).then(function() {
            console.log('Async: Copying to clipboard was successful!');
        }, function(err) {
            console.error('Async: Could not copy text: ', err);
        });
    }
</script>

<link rel="stylesheet" href="/wp-content/themes/zilla-multiples/dist/css/share.css" type="text/css" media="screen">
<link rel="stylesheet" href="/wp-content/themes/zilla-multiples/dist/css/fonts.css" type="text/css" media="screen">

<!-- Add Scripts to Share Ends Here -->

<style>	

.subscribe-mid{
	width:100%;
	display:flex;
	justify-content:center;
	margin:80px 0;
}

.subscribe-box{
	width:70%;
	max-width:950px;
	background:#fdffff;
	padding:50px 60px;
	border-radius:20px;
	text-align:center;
	box-shadow:0 0 25px rgba(0,0,0,0.15);
	font-family:"Rotunda",sans-serif;
}

.subscribe-box h2{
	color:#4dc8ed;
	font-size:38px;
	font-weight:900;
	margin-bottom:10px;
}

.subscribe-box p{
	color:#102649;
	font-size:22px;
	margin-bottom:20px;
}

.popup-inputs{
	display:flex;
	gap:15px;
	justify-content:center;
	margin-bottom:18px;
}

.popup-inputs input{
	width:45%;
	padding:14px 17px;
	border:1px solid #ccc;
	border-radius:8px;
	font-size:18px;
}

.subscribe-box button{
	background:#102649;
	color:#fff;
	padding:14px 32px;
	border:none;
	border-radius:8px;
	cursor:pointer;
	font-size:16px;
}

.subscribe-box button:hover{
	opacity:0.9;
}

.page-hero{
	position:relative;
	width:100%;
	height:370px;
	background:url('https://www.zillacapital.com/wp-content/uploads/2025/11/contact.png') center/cover no-repeat;
        margin-top:-360px;
}
.hero-overlay{
	position:absolute;
	inset:0;
	display:flex;
	align-items:center;
	justify-content:center;
}
.hero-title-wrapper{
	position:relative;
	text-align:center;
	font-family:'Rotunda',sans-serif;
}
.hero-title-back{
	position:absolute;
	top:50%;
	left:50%;
	transform:translate(-50%,-50%);
	font-size:96px;
	font-weight:900;
	color:rgba(255,255,255,.15);
}
.hero-title-front{
	font-size:42px;
	font-weight:700;
	color:#fff;
}

/* Popups */
#popup-overlay{
	position:fixed;
	inset:0;
	background:rgba(0,0,0,.65);
	backdrop-filter:blur(3px);
	display:none;
	z-index:99999;
}
#popup-box{
	position:fixed;
	top:50%;
	left:50%;
	transform:translate(-50%,-50%);
	width:70%;
	max-width:950px;
	background:#fdffff;
	padding:60px 80px;
	border-radius:20px;
	text-align:center;
	display:none;
	z-index:100000;
	box-shadow:0 0 25px rgba(0,0,0,.15);
}
#popup-fixed-container{
	width:100%;
	display:flex;
	justify-content:center;
	margin:40px 0;
}
#popup-fixed{
	width:70%;
	max-width:950px;
	background:#fdffff;
	padding:50px 60px;
	border-radius:20px;
	text-align:center;
	box-shadow:0 0 25px rgba(0,0,0,.15);
}
    .rightlist span {
    margin-left: -10px;
    }
    
    .rightlist ol {
	  list-style: none;
      background-color:rgb(17,38,73);
      padding-top: 25px;
     
	}

	.rightlist ol li {
	  counter-increment: my-awesome-counter;
      padding: 50px;
      padding-top: 0px;
      padding-bottom: 0px;
	}

    .rightlist ol li::before {
	  content: "0" counter(my-awesome-counter);
	  color: white;
      background-color:#4dc8ed;
      margin-left:-40px;
      margin-right:25px;
      border:5px;
      padding:5px;
	}

    .rightlist ol li.lastone::before {
	  content: counter(my-awesome-counter);
	  color: white;
      background-color:#4dc8ed;
      margin-left:-40px;
      margin-right:25px;
      border:5px;
      padding:5px;
	}
html, body {
  width: 100%;
  max-width: 100%;
  overflow-x: hidden;
  margin: 0;
  padding: 0;
}

</style>

<style>	
    .leftlist span {
    margin-left: -10px;
    }

    .leftlist ol {

	  list-style: none;
	  counter-reset: my-awesome-counter;
      background-color:rgb(17,38,73);
      padding-top: 25px;
	}

	.leftlist ol li {
	  counter-increment: my-awesome-counter;
      padding: 50px;
      padding-top: 0px;
      padding-bottom: 0px;
	}

	.leftlist ol li::before {
	  content: "0" counter(my-awesome-counter);
	  color: white;
      background-color:#4dc8ed;
      margin-left:-40px;
      margin-right:25px;
      border:5px;
      padding:5px;
	  
	}
</style>

<style>
    .fullwidthlist span {
		margin-left: -10px;
    }

    .fullwidthlist {
		margin-top: 0px;
		margin-bottom: 0px;
		padding-bottom: 0px;
    }
	
    .fullwidthlist ol {

	  list-style: none;
	  counter-reset: my-awesome-counter;
      background-color:#ffffff;
      padding-top: 0px;
	}

	.fullwidthlist ol li {
	  counter-increment: my-awesome-counter;
      padding: 0px;
      padding-left: 40px;
	}

	@media only screen and (min-width: 768px) {		
		.fullwidthlist {
			margin-top: 0px;
		}

		.fullwidthlist ol li {
		  padding-left: 77px;
		}	
	}
	.fullwidthlist ol li::before {
	  content: "0" counter(my-awesome-counter);
	  color: white;
      background-color:#112649;
      margin-left:-40px;
      margin-right:25px;
      border:5px;
      padding:5px;
	}

	.fullwidthlist ol li.lastone::before {
	  content: counter(my-awesome-counter);
	  color: white;
      background-color:#112649;
      margin-left:-40px;
      margin-right:25px;
      border:5px;
      padding:5px;
	}
	
    .fullwidthlist ol li.nozero::before {
	  content: counter(my-awesome-counter);
	  color: #50cdef;
      background-color:#112649;
      margin-left:-40px;
      margin-right:25px;
      border:5px;
      padding:5px;
	  padding-left: 10px;
	  padding-right: 9px;
	}	

    .fullwidthlist ol li.nozeroarabic::before {
	  
	  content: counter(my-awesome-counter, arabic-indic);
	  color: #50cdef;
      background-color:#112649;
      margin-left:10px;
      margin-right:-35px;
      border:5px;
      padding:5px;
	  padding-left: 10px;
	  padding-right: 9px;
	}	

    .fullwidthlist ol li.nozeroarabictop::before {
	  
	  content: counter(my-awesome-counter, arabic-indic);
	  color: #50cdef;
      background-color:#112649;
      margin-left:-40px;
      margin-right:-35px;
      border:5px;
      padding:5px;
	  padding-left: 10px;
	  padding-right: 9px;
	}	
	
	.fullwidthlist ol li.nozerolastone::before {
	  content: counter(my-awesome-counter);
	  color: #50cdef;
      background-color:#112649;
      margin-left:-40px;
      margin-right:25px;
      border:5px;
      padding:5px;
	}
	
	.fullwidthlist ol li.nozerolastonearabic::before {
	  content: counter(my-awesome-counter, arabic-indic);
	  color: #50cdef;
      background-color:#112649;
      margin-left:-40px;
      margin-right:-35px;
      border:5px;
      padding:5px;
	}	
</style>

<style>
	
    .fullwidthlistmena span {
		margin-left: -10px;
    }

	.fullwidthlistmenahead {
		width: 95%;
		position: relative;
		top: -40px;
		left: 30px;
		background-color: white;
		height: 50px;
	}
	
	.fullwidthlistmenaimg {
		padding-left: 15px;
		margin-top: -55px;
	}
		
	.fullwidthlistmenaimg img {
		width: 70px;
		object-fit: scale-down;
	}
		
	.fullwidthlistmenahead h3 {
		color: #171a1d !important;
	}
		
    .fullwidthlistmena {
		margin-bottom: 0px;
		padding-bottom: 0px;		
		background-color:#ffffff;
		border-color: #112649;
		border-width: 2px;
		border-style: solid;
		padding-top: 0px;
		padding-right: 30px;
		margin-top: 35px;
		margin-left: 25px;
		margin-right: 25px;
    }
	
    .fullwidthlistmena ol {

	  list-style: none;
	  counter-reset: my-awesome-counter;
      background-color:#ffffff;
      padding-top: 0px;
	}

	.fullwidthlistmena ol li {
	  counter-increment: my-awesome-counter;
      padding: 0px;
      padding-left: 77px;
	}

	.fullwidthlistmena ol li::before {
	  content: "0" counter(my-awesome-counter);
	  color: white;
      background-color:#112649;
      margin-left:-40px;
      margin-right:25px;
      border:5px;
      padding:5px;
	}

	.fullwidthlistmena ol li.lastone::before {
	  content: counter(my-awesome-counter);
	  color: white;
      background-color:#112649;
      margin-left:-40px;
      margin-right:25px;
      border:5px;
      padding:5px;
	}
	
    .fullwidthlistmena ol li.nozero::before {
	  content: counter(my-awesome-counter);
	  color: #50cdef;
      background-color:#112649;
      margin-left:-40px;
      margin-right:25px;
      border:5px;
      padding:5px;
	  padding-left: 10px;
	  padding-right: 9px;
	}	

	.fullwidthlistmena ol li.nozerolastone::before {
	  content: counter(my-awesome-counter);
	  color: #50cdef;
      background-color:#112649;
      margin-left:-40px;
      margin-right:25px;
      border:5px;
      padding:5px;
	}

	@media only screen and (max-width: 768px) {		

		.fullwidthlistmena span {
			margin-left: -10px;
		}

		.fullwidthlistmenahead {
			width: 95%;
			position: relative;
			top: -20px;
			left: 30px;
			background-color: white;
			height: 50px;
		}
		
		.fullwidthlistmenaimg {
			padding-left: 15px;
			margin-top: -25px;
		}
			
		.fullwidthlistmenaimg img {
			width: 40px;
			object-fit: scale-down;
		}
			
		.fullwidthlistmenahead h3 {
			color: #171a1d !important;
		}
			
		.fullwidthlistmena {
			margin-bottom: 0px;
			padding-bottom: 0px;		
			background-color:#ffffff;
			border-color: #112649;
			border-width: 2px;
			border-style: solid;
			padding-top: 0px;
			padding-right: 30px;
			margin-top: 230px;
			margin-left: -5px;
			margin-right: -5px;
		}
		
		.fullwidthlistmena ol {

		  list-style: none;
		  counter-reset: my-awesome-counter;
		  background-color:#ffffff;
		  padding-top: 0px;
		}

		.fullwidthlistmena ol li {
		  counter-increment: my-awesome-counter;
		  padding: 0px;
		  padding-left: 50px;
		}

		.fullwidthlistmena ol li::before {
		  content: "0" counter(my-awesome-counter);
		  color: white;
		  background-color:#112649;
		  margin-left:-40px;
		  margin-right:25px;
		  border:5px;
		  padding:5px;
		}

		.fullwidthlistmena ol li.lastone::before {
		  content: counter(my-awesome-counter);
		  color: white;
		  background-color:#112649;
		  margin-left:-40px;
		  margin-right:25px;
		  border:5px;
		  padding:5px;
		}
		
		.fullwidthlistmena ol li.nozero::before {
		  content: counter(my-awesome-counter);
		  color: #50cdef;
		  background-color:#112649;
		  margin-left:-40px;
		  margin-right:25px;
		  border:5px;
		  padding:5px;
		  padding-left: 10px;
		  padding-right: 9px;
		}	

		.fullwidthlistmena ol li.nozerolastone::before {
		  content: counter(my-awesome-counter);
		  color: #50cdef;
		  background-color:#112649;
		  margin-left:-40px;
		  margin-right:25px;
		  border:5px;
		  padding:5px;
		}
		
	}	
</style>

<style>
    .fullwidthlistmenaar span {
		margin-left: -10px;
    }

	.fullwidthlistmenaarhead {
		width: 95%;
		position: relative;
		top: -40px;
		right: 30px;
		background-color: white;
		height: 50px;
	}
	
	.fullwidthlistmenaarimg {
		padding-left: 15px;
		margin-top: -55px;
	}
		
	.fullwidthlistmenaarimg img {
		width: 70px;
		object-fit: scale-down;
	}
		
	.fullwidthlistmenaarhead h3 {
		color: #171a1d !important;
	}
		
    .fullwidthlistmenaar {
		background-color:#ffffff;
		border-color: #112649;
		border-width: 2px;
		border-style: solid;
		padding-top: 0px;
		padding-right: 30px;
		margin-top: 35px;
		margin-left: 25px;
		margin-right: 25px;
	
		margin-bottom: 0px;
		padding-bottom: 0px;
    }
	
    .fullwidthlistmenaar ol {

	  list-style: none;
	  counter-reset: my-awesome-counter;
      background-color:#ffffff;
      padding-top: 0px;
	  margin-right: 55px;
	  text-align: justify;
	}

	.fullwidthlistmenaar ol li {
	  counter-increment: my-awesome-counter;
      padding: 0px;
      padding-left: 77px;
	}

	.fullwidthlistmenaar ol li::before {
	  content: "0" counter(my-awesome-counter);
	  color: white;
      background-color:#112649;
      margin-left:-40px;
      margin-right:25px;
      border:5px;
      padding:5px;
	}

    .fullwidthlistmenaar ol li.nozeroarabic::before {
	  
	  content: counter(my-awesome-counter, arabic-indic);
	  color: #50cdef;
      background-color:#112649;
      margin-left:10px;
      margin-right:-35px;
      border:5px;
      padding:5px;
	  padding-left: 10px;
	  padding-right: 9px;
	}	

    .fullwidthlistmenaar ol li.nozeroarabictop::before {
	  
	  content: counter(my-awesome-counter, arabic-indic);
	  color: #50cdef;
      background-color:#112649;
      margin-left:-40px;
      margin-right:-35px;
      border:5px;
      padding:5px;
	  padding-left: 10px;
	  padding-right: 9px;
	}
	
	.fullwidthlistmenaar ol li.nozerolastonearabic::before {
	  content: counter(my-awesome-counter, arabic-indic);
	  color: #50cdef;
      background-color:#112649;
      margin-left:-40px;
      margin-right:-35px;
      border:5px;
      padding:5px;
	  padding-left: 8px;
	  padding-right: 8px;
	}	

	@media only screen and (max-width: 768px) {		
	
		.fullwidthlistmenaar span {
			margin-left: -10px;
		}

		.fullwidthlistmenaarhead {
			width: 95%;
			position: relative;
			top: -10px;
			right: 30px;
			background-color: white;
			height: 50px;
		}
		
		.fullwidthlistmenaarimg {
			padding-left: 15px;
			margin-top: -25px;
		}
			
		.fullwidthlistmenaarimg img {
			width: 40px;
			object-fit: scale-down;
		}
			
		.fullwidthlistmenaarhead h3 {
			color: #171a1d !important;
		}
			
		.fullwidthlistmenaar {
			background-color:#ffffff;
			border-color: #112649;
			border-width: 2px;
			border-style: solid;
			padding-top: 0px;
			padding-right: 5px;
			margin-top: 110px;
			margin-left: -5px;
			margin-right: -5px;
		
			margin-bottom: 0px;
			padding-bottom: 0px;
		}
		
		.fullwidthlistmenaar ol {

		  list-style: none;
		  counter-reset: my-awesome-counter;
		  background-color:#ffffff;
		  padding-top: 0px;
		  margin-right: 35px;
		  text-align: justify;
		}

		.fullwidthlistmenaar ol li {
		  counter-increment: my-awesome-counter;
		  padding: 0px;
		  padding-left: 40px;
		}

		.fullwidthlistmenaar ol li::before {
		  content: "0" counter(my-awesome-counter);
		  color: white;
		  background-color:#112649;
		  margin-left:-40px;
		  margin-right:25px;
		  border:5px;
		  padding:5px;
		}

		.fullwidthlistmenaar ol li.nozeroarabic::before {
		  
		  content: counter(my-awesome-counter, arabic-indic);
		  color: #50cdef;
		  background-color:#112649;
		  margin-left:10px;
		  margin-right:-35px;
		  border:5px;
		  padding:5px;
		  padding-left: 10px;
		  padding-right: 9px;
		}	

		.fullwidthlistmenaar ol li.nozeroarabictop::before {
		  
		  content: counter(my-awesome-counter, arabic-indic);
		  color: #50cdef;
		  background-color:#112649;
		  margin-left:-40px;
		  margin-right:-35px;
		  border:5px;
		  padding:5px;
		  padding-left: 10px;
		  padding-right: 9px;
		}
		
		.fullwidthlistmenaar ol li.nozerolastonearabic::before {
		  content: counter(my-awesome-counter, arabic-indic);
		  color: #50cdef;
		  background-color:#112649;
		  margin-left:-40px;
		  margin-right:-35px;
		  border:5px;
		  padding:5px;
		  padding-left: 8px;
		  padding-right: 8px;
		}	
	}	
</style>

<style>
	.menaar {
		margin-top: 0px;
		font-family: 'AdobeNaskh';
	}

	.menaar h3{
		font-family: 'AdobeNaskh';
	}

	.menaar {
		max-width: 1120px;
		margin-left: auto;
		margin-right: auto;
		padding-left: 15px;
		padding-right: 15px;
	}

	.mena-language-switch {
		width: 100%;
		margin: 0 0 14px;
		text-align: left;
	}

	.mena-arabic-hero {
		display: block;
		width: 100% !important;
		max-width: 780px;
		margin: 0 auto 35px;
		object-fit: contain !important;
	}

	.fullwidthlistmenaar {
		box-sizing: border-box;
		width: calc(100% - 32px);
		max-width: 1120px;
		margin: 35px auto 0 !important;
		padding: 0 44px 18px 30px;
		direction: rtl;
	}

	.fullwidthlistmenaarhead {
		display: flex;
		align-items: center;
		width: 100%;
		right: auto;
		top: -40px;
		margin-bottom: -24px;
	}

	.fullwidthlistmenaarhead > div {
		margin-left: 0 !important;
	}

	.fullwidthlistmenaar ol {
		width: auto;
		margin: 0 !important;
		padding: 0 48px 0 0;
		line-height: 1.45;
		text-align: right;
	}

	.fullwidthlistmenaar ol li {
		padding: 0 0 0 16px !important;
		margin-bottom: 12px;
	}

	.fullwidthlistmenaar ol li a {
		display: inline;
		margin-right: 0 !important;
		line-height: 1.45;
	}

	.fullwidthlistmenaar ol li.nozeroarabictop::before,
	.fullwidthlistmenaar ol li.nozerolastonearabic::before {
		display: inline-block;
		min-width: 28px;
		margin: 0 -42px 0 16px !important;
		text-align: center;
		box-sizing: border-box;
		vertical-align: top;
	}

	.fullwidthlistmenaar + .row,
	.fullwidthlistmenaar + .row + .row {
		max-width: 1120px;
		margin-left: auto !important;
		margin-right: auto !important;
	}

	.collistmenaar {
		box-sizing: border-box;
		flex: 0 0 calc(50% - 40px);
		max-width: calc(50% - 40px);
		margin: 35px 20px 0 !important;
		padding-right: 24px;
	}

	.collistmenaar ol {
		width: auto !important;
		padding-right: 38px;
		padding-left: 12px;
	}

	.collistmenaarhead {
		right: 24px;
		width: calc(100% - 48px);
		align-items: center;
	}

	.collistmenaartitle {
		margin-left: 28px;
		width: auto;
		flex: 1 1 auto;
	}

	@media only screen and (max-width: 768px) {
		.menaar {
			padding-left: 0;
			padding-right: 0;
		}

		.mena-language-switch {
			text-align: center;
		}

		.mena-arabic-hero {
			max-width: 100%;
			margin-bottom: 24px;
		}

		.fullwidthlistmenaar {
			width: 100%;
			margin-top: 35px !important;
			padding: 0 18px 18px;
		}

		.fullwidthlistmenaarhead {
			right: 0;
			top: -18px;
			margin-bottom: -6px;
		}

		.fullwidthlistmenaar ol {
			padding-right: 42px;
		}

		.fullwidthlistmenaar ol li {
			padding-left: 0 !important;
		}

		.collistmenaar {
			flex: 0 0 100%;
			max-width: 100%;
			margin: 70px 0 25px !important;
			padding-right: 15px;
			padding-left: 15px;
		}

		.collistmenaarhead {
			right: 15px;
			width: calc(100% - 30px);
		}

		.collistmenaar ol {
			width: auto !important;
			padding-right: 38px;
			padding-left: 0;
		}
	}

</style>

<style>
    .collistmena span {
		/*margin-left: -10px;*/
    }
	
	.collistmenahead {
		width: 110%;
		position: absolute;
		top: -10px;
		left: 30px;
		background-color: white;
		height: 90px;
	}

	.collistmenaarhead {
		width: 110%;
		position: absolute;
		top: -10px;
		right: 30px;
		background-color: white;
		height: 90px;
	}

						
	.collistmenalogo {
		width: 55px;
		padding-left: 15px;
		margin-top: -100px;
	}
							
	.collistmenaarlogo {
		width: 55px;
		padding-left: 15px;
		margin-top: -100px;
	}

	.collistmenalogo img {
		width: 70px;
		object-fit: scale-down;
	}
		
	.collistmenaimg {
		width: 150px;
		padding-left: 15px;
		margin-top: -40px;
	}
		
	.collistmenaimg img {
		width: 130px;
		object-fit: cover;
		height: 100px;
	}

	.collistmenatitle {
		margin-left: 22px;
		width: 180px;
	}

	.collistmenahead h2 {
		color: #171a1d !important;
		font-family: 'Rotunda-Medium';
	}

	.collistmenaarlogo img {
		width: 70px;
		object-fit: scale-down;
	}
		
	.collistmenaarimg {
		width: 150px;
		padding-left: 15px;
		margin-top: -40px;
	}

	.collistmenaarimg img {
		width: 130px;
		object-fit: cover;
		height: 100px;
	}

	.collistmenaartitle {
		margin-left: 55px;
		width: 150px;
	}

	.collistmenaarhead h2 {
		color: #171a1d !important;
		font-family: 'AdobeNaskh';
	}
	
    .collistmena {
		margin-bottom: 0px;
		padding-bottom: 0px;
		background-color:#ffffff;
		border-color: #112649;
		border-width: 2px;
		border-style: solid;
		border-right: none;
		padding-top: 0px;
		padding-right: 30px;
		margin-top: 35px;
		margin-left: 25px;
		margin-right: 25px;
		margin-left: 40px;
    }

    .collistmenaar {
		background-color:#ffffff;
		border-color: #112649;
		border-width: 2px;
		border-style: solid;
		padding-top: 0px;
		padding-right: 15px;
		margin-top: 35px;
		margin-left: 25px;
		margin-right: 40px;
		margin-bottom: 0px;
		padding-bottom: 0px;
		border-left: none;
    }
	
    .collistmena ol {
		text-align: justify;
		margin-top: 80px;
		width: 400px;
		margin-bottom: 20px;
		list-style: none;
		counter-reset: my-awesome-counter;
		background-color:#ffffff;
		padding-top: 0px;
	}

    .collistmenaar ol {
		text-align: justify;
		margin-top: 80px;
		width: 400px;
		margin-bottom: 20px;
		list-style: none;
		counter-reset: my-awesome-counter;
		background-color:#ffffff;
		padding-top: 0px;
	}
	
	.collistmena ol li {
	  counter-increment: my-awesome-counter;
      padding: 0px;
      padding-left: 35px;
	}
 
	.collistmenaar ol li {
	  padding-right: 35px; 
	  padding-left: 10px;
	  counter-increment: my-awesome-counter;
	}

	.collistmena ol li span {
	   font-family: 'Rotunda-Regular';
	   font-size: 12px;
	   color: #112649;
	}

	.collistmenaar ol li span {
	   font-family: 'AdobeNaskh';
	   font-size: 14px;
	   color: #112649;
	}
	
	.collistmena ol li::before {
	  content: "0" counter(my-awesome-counter);
	  color: white;
      background-color:#112649;
      margin-left:-40px;
      margin-right:25px;
      border:5px;
      padding:5px;
	}
	
    .collistmena ol li.nozero::before {
	  content: counter(my-awesome-counter);
	  color: #50cdef;
      background-color:#112649;
      margin-left:-40px;
      margin-right:25px;
      border:5px;
      padding:5px;
	  padding-left: 10px;
	  padding-right: 9px;
	  position: relative;
	  top: 8px
	}	

    .collistmenaar ol li.nozeroarabic::before {	  
	  content: counter(my-awesome-counter, arabic-indic);
	  color: #50cdef;
      background-color:#112649;
      margin-left:10px;
      margin-right:-35px;
      border:5px;
      padding:5px;
	  padding-left: 10px;
	  padding-right: 9px;
	  font-family: 'AdobeNaskh';
	  position: relative;
	  top: 8px
	}	
	
	.leftsmallline {
		position: absolute;
		left: 100%;
		top: 98%;
		bottom: -2px;
		width: 2px;
		border-color: #112649;
		border-width: 1px;
		border-style: solid;
	}

	.rightsmallline {
		position: absolute;
		right: 100%;
		top: 98%;
		bottom: -2px;
		width: 2px;
		border-color: #112649;
		border-width: 1px;
		border-style: solid;
	}
	
	@media only screen and (max-width: 768px) {		
		.collistmena span {
			/*margin-left: -10px;*/
		}
		
		.collistmenahead {
			width: 90%;
			position: absolute;
			top: -90px;
			left: 40px;
			background-color: white;
			height: 120px;
			text-align: center;
		}

		.collistmenaarhead {
			width: 90%;
			position: absolute;
			top: -90px;
			right: 40px;
			background-color: white;
			height: 120px;
			text-align: center;
		}

							
		.collistmenalogo {
			width: 55px;
			padding-left: 15px;
			margin-top: -60px;
			margin-left: 30px;
		}
								
		.collistmenaarlogo {
			width: 55px;
			padding-left: 15px;
			margin-top: -60px;
			margin-left: 30px;
		}

		.collistmenalogo img {
			width: 70px;
			object-fit: scale-down;
			padding-top: 50px;						
		}
			
		.collistmenaimg {
			width: 300px;
			padding-left: 15px;
			margin-top: 25px;
			text-align: center;
		}
			
		.collistmenaimg img {
			width: 250px;
			object-fit: cover;
			height: 150px;
		}

		.collistmenatitle {
			margin-left: 22px;
			width: 150px;
			margin-top: 5px;
		}

		.collistmenahead h2 {
			color: #171a1d !important;
			font-family: 'Rotunda-Medium';
		}

		.collistmenaarlogo img {
			width: 70px;
			object-fit: scale-down;
			padding-top: 50px;			
		}
			
		.collistmenaarimg {
			width: 300px;
			padding-left: 15px;
			margin-top: 25px;
			text-align: center;
		}

		.collistmenaarimg img {
			width: 250px;
			object-fit: cover;
			height: 150px;
		}

		.collistmenaartitle {
			margin-left: 22px;
			width: 150px;
			margin-top: 5px;
		}

		.collistmenaarhead h2 {
			color: #171a1d !important;
			font-family: 'AdobeNaskh';
		}
		
		.collistmena {
			margin-bottom: 25px;
			padding-bottom: 0px;
			background-color:#ffffff;
			border-color: #112649;
			border-width: 0px;
			border-style: none;
			padding-top: 0px;
			padding-right: 30px;
			margin-top: 35px;
			margin-left: 5px;
			margin-right: 5px;
			margin-left: -10px;
		}

		.collistmenaar {
			background-color:#ffffff;
			border-color: #112649;
			border-width: 2px;
			border-style: none;
			padding-top: 0px;
			padding-right: 15px;
			margin-top: 35px;
			margin-left: 5px;
			margin-right: 5px;
			margin-bottom: 25px;
			padding-bottom: 0px;
		}
		
		.collistmena ol {
			text-align: justify;
			margin-top: 180px;
			width: 115%;
			margin-bottom: 20px;
			list-style: none;
			counter-reset: my-awesome-counter;
			background-color:#ffffff;
			padding-top: 0px;
		}

		.collistmenaar ol {
			text-align: justify;
			margin-top: 180px;
			width: 110%;
			margin-bottom: 20px;
			list-style: none;
			counter-reset: my-awesome-counter;
			background-color:#ffffff;
			padding-top: 0px;
		}
		
		.collistmena ol li {
		  counter-increment: my-awesome-counter;
		  padding: 0px;
		  padding-left: 35px;
		}
	 
		.collistmenaar ol li {
		  padding-right: 35px; 
		  padding-left: 10px;
		  counter-increment: my-awesome-counter;
		}

		.collistmena ol li span {
		   font-family: 'Rotunda-Regular';
		   font-size: 12px;
		   color: #112649;
		}

		.collistmenaar ol li span {
		   font-family: 'AdobeNaskh';
		   font-size: 12px;
		   color: #112649;		   
		}
		
		.collistmena ol li::before {
		  content: "0" counter(my-awesome-counter);
		  color: white;
		  background-color:#112649;
		  margin-left:-40px;
		  margin-right:25px;
		  border:5px;
		  padding:5px;
		}
		
		.collistmena ol li.nozero::before {
		  content: counter(my-awesome-counter);
		  color: #50cdef;
		  background-color:#112649;
		  margin-left:-40px;
		  margin-right:25px;
		  border:5px;
		  padding:5px;
		  padding-left: 10px;
		  padding-right: 9px;
		}	

		.collistmenaar ol li.nozeroarabic::before {	  
		  content: counter(my-awesome-counter, arabic-indic);
		  color: #50cdef;
		  background-color:#112649;
		  margin-left:10px;
		  margin-right:-35px;
		  border:5px;
		  padding:5px;
		  padding-left: 10px;
		  padding-right: 9px;
		  font-family: 'AdobeNaskh';
		}
	}
</style>

<style>
	.collistmenaar {
		box-sizing: border-box;
		flex: 0 0 calc(50% - 40px);
		max-width: calc(50% - 40px);
		margin: 35px 20px 0 !important;
		padding-right: 24px;
	}

	.collistmenaar ol {
		width: auto !important;
		padding-right: 38px;
		padding-left: 12px;
	}

	.collistmenaarhead {
		right: 24px;
		width: calc(100% - 48px);
		align-items: center;
	}

	.collistmenaartitle {
		margin-left: 28px;
		width: auto;
		flex: 1 1 auto;
	}

	.fullwidthlistmenaar ol li.nozeroarabictop,
	.fullwidthlistmenaar ol li.nozerolastonearabic,
	.collistmenaar ol li.nozeroarabic {
		position: relative;
		padding-right: 54px !important;
		padding-left: 0 !important;
	}

	.fullwidthlistmenaar ol li.nozeroarabictop::before,
	.fullwidthlistmenaar ol li.nozerolastonearabic::before,
	.collistmenaar ol li.nozeroarabic::before {
		position: absolute;
		top: 2px;
		right: 0;
		left: auto;
		display: block;
		min-width: 30px;
		margin: 0 !important;
		padding: 5px 8px;
		text-align: center;
		line-height: 1;
		box-sizing: border-box;
	}

	.collistmenaar ol li.nozeroarabic span {
		display: block;
		margin-right: 0 !important;
	}

	.collistmenaar ol li.nozeroarabic span + span {
		margin-top: 4px;
	}

	@media only screen and (max-width: 768px) {
		.collistmenaar {
			flex: 0 0 100%;
			max-width: 100%;
			margin: 70px 0 25px !important;
			padding-right: 15px;
			padding-left: 15px;
		}

		.collistmenaarhead {
			right: 15px;
			width: calc(100% - 30px);
		}

		.collistmenaar ol {
			width: auto !important;
			padding-right: 38px;
			padding-left: 0;
		}

		.fullwidthlistmenaar ol li.nozeroarabictop,
		.fullwidthlistmenaar ol li.nozerolastonearabic,
		.collistmenaar ol li.nozeroarabic {
			padding-right: 48px !important;
		}
	}
</style>

<style>
	.article_content h3 {
		color: #000080;
		font-size: 32px;
		line-height: 1.25;
	}

	.article_content-content h6 {
		color: #112649;
		font-weight: revert;
		line-height: 1.15;
		font-size: 13.5px;
		color: #112649;
	}

	.article_content-content {
		color: #112649;
		font-weight: revert;
		line-height: 1.15;
		font-size: 13.5px;
		color: #112649;
	}

	.article_content img {
		margin-bottom: 0px;
	}

	.subscription_form {
	    margin-top: 0px;
	}

</style>

<style>

	.kingdompulse {
		margin-top: 10px;
	}
	
	.kingdompulsear {
		margin-top: 10px;
	}	
	
	.kingdompulse h3 {
		color: DarkGreen !important;
		font-weight: bolder !important;
	}
	
	.kingdompulsear h3 {
		color: DarkGreen !important;
		/*font-family: 'AdobeNaskh';		*/
		font-weight: bolder !important;
	}
	
	.kingdompulsearln {
		margin-bottom: 35px;
		padding-bottom: 0;
		background-color: #fff;
		border-color: #112649;
		border-width: 2px;
		border-style: solid;
		padding-top: 0;
		padding-right: 10px;
		padding-left: 10px;
		margin-top: 35px;
		margin-left: 25px;
		margin-right: 25px;
	}
	
	.kingdompulsegftitle{
		margin-bottom: 35px;
		padding-bottom: 0;
		background-color: #fff;
		border-width: 0px;
		padding-top: 0;
		padding-right: 10px;
		padding-left: 10px;
		margin-top: 35px;
		margin-left: 0px;
		margin-right: 25px;		
	}

	.kingdompulsegftitle h2{
		color: darkgreen;
	}
	
	.kingdompulsegfdetails{
		margin-bottom: 35px;
		padding-bottom: 0;
		background-color: #fff;
		border-width: 0px;
		padding-top: 0;
		padding-right: 10px;
		padding-left: 10px;
		margin-top: 35px;
		margin-left: 0px;
		margin-right: 25px;		
	}
	
	.kingdompulsearlnhead {	
		width: 95%;
		position: relative;
		top: -5px;
		left: 15px;
		background-color: white;
		height: 10px;
	}
	
	.kingdompulsearlnbott {	
		width: 95%;
		position: relative;
		top: 5px;
		left: 15px;
		background-color: white;
		height: 10px;
	}
	
	.kingdompulseleftlist {
		border-color: DarkGreen;
		border-width: 3px;
		border-style: solid;
		border-style: solid;
		max-width: 47%;
		margin-right: 3%;
	}
	
	.kingdompulseleftlist span {
		/*margin-left: -10px;*/
    }

    .kingdompulseleftlist ol {

	  list-style: none;
	  counter-reset: my-awesome-counter;
      background-color:white;
      padding-top: 25px;
	}

	.kingdompulseleftlist ol li {
	  counter-increment: my-awesome-counter;
      padding: 50px;
      padding-top: 0px;
      padding-bottom: 10px;
	  padding-left: 25px;
	  padding-right: 25px;
	}

	.kingdompulseleftlist ol li::before {
	  content: counter(my-awesome-counter);
	  color: white;
      background-color:darkgreen;
      margin-left:-40px;
      margin-right:25px;
      border:5px;
      padding:5px;
	  
	}

	.kingdompulserightlist {
		border-color: DarkGreen;
		border-width: 3px;
		border-style: solid;
		border-style: solid;
		max-width: 47%;
	}
	
	.kingdompulserightlist span {
		/*margin-left: -10px;*/
    }

    .kingdompulserightlist ol {

	  list-style: none;
	  counter-reset: my-awesome-counter;
      background-color:white;
      padding-top: 25px;
	}

	.kingdompulserightlist ol li {
	  counter-increment: my-awesome-counter;
      padding: 50px;
      padding-top: 0px;
      padding-bottom: 10px;
	  padding-left: 25px;
	  padding-right: 25px;
	}

	.kingdompulserightlist ol li::before {
	  content: counter(my-awesome-counter);
	  color: white;
      background-color:darkgreen;
      margin-left:-40px;
      margin-right:25px;
      border:5px;
      padding:5px;
	}

	.kingdompulserightlist ol li.lastone {
	  counter-increment: my-awesome-counter;
      padding: 50px;
      padding-top: 0px;
      padding-bottom: 10px;
	  padding-left: 25px;
	  padding-right: 25px;
	}
	
	.kingdompulserightlist ol li.lastone::before {
	  content: counter(my-awesome-counter);
	  color: white;
      background-color:darkgreen;
      margin-left:-40px;
      margin-right:25px;
      border:5px;
      padding:5px;	
	  padding-left: 0px;
	  padding-right: 1px;	  
	}	


	.kingdompulsearlnar {
		margin-bottom: 35px;
		padding-bottom: 0;
		background-color: #fff;
		border-color: #112649;
		border-width: 2px;
		border-style: solid;
		padding-top: 0;
		padding-right: 10px;
		padding-left: 10px;
		margin-top: 35px;
		margin-left: 25px;
		margin-right: 25px;
	}
	
	.kingdompulsegftitlear{
		margin-bottom: 35px;
		padding-bottom: 0;
		background-color: #fff;
		border-width: 0px;
		padding-top: 0;
		padding-right: 10px;
		padding-left: 10px;
		margin-top: 35px;
		margin-left: 0px;
		margin-right: 25px;		
	}

	.kingdompulsegftitlear h2{
		color: darkgreen;
	}
	
	.kingdompulsegfdetailsar{
		margin-bottom: 35px;
		padding-bottom: 0;
		background-color: #fff;
		border-width: 0px;
		padding-top: 0;
		padding-right: 10px;
		padding-left: 10px;
		margin-top: 35px;
		margin-left: 0px;
		margin-right: 25px;		
	}
	
	.kingdompulsearlnheadar {	
		width: 95%;
		position: relative;
		top: -5px;
		right: 15px;
		background-color: white;
		height: 10px;
	}
	
	.kingdompulsearlnbottar {	
		width: 95%;
		position: relative;
		top: 5px;
		right: 15px;
		background-color: white;
		height: 10px;
	}
	
	.kingdompulseleftlistar {
		border-color: DarkGreen;
		border-width: 3px;
		border-style: solid;
		border-style: solid;
		max-width: 47%;
		margin-left: 3%;
	}
	
	.kingdompulseleftlistar span {
		/*margin-left: -10px;*/
    }

    .kingdompulseleftlistar ol {

	  list-style: none;
	  counter-reset: my-awesome-counter;
      background-color:white;
      padding-top: 25px;
	}

	.kingdompulseleftlistar ol li {
	  counter-increment: my-awesome-counter;
      padding: 50px;
      padding-top: 0px;
      padding-bottom: 10px;
	  padding-left: 25px;
	  padding-right: 25px;
	}

	.kingdompulseleftlistar ol li::before {
	  content: counter(my-awesome-counter);
	  color: white;
      background-color:darkgreen;
      margin-left:25px;
      margin-right:-40px;
      border:5px;
      padding:5px;
	  
	}

	.kingdompulserightlistar {
		border-color: DarkGreen;
		border-width: 3px;
		border-style: solid;
		border-style: solid;
		max-width: 47%;
	}
	
	.kingdompulserightlistar span {
		/*margin-left: -10px;*/
    }

    .kingdompulserightlistar ol {

	  list-style: none;
	  counter-reset: my-awesome-counter;
      background-color:white;
      padding-top: 25px;
	}

	.kingdompulserightlistar ol li {
	  counter-increment: my-awesome-counter;
      padding: 50px;
      padding-top: 0px;
      padding-bottom: 10px;
	  padding-left: 25px;
	  padding-right: 25px;
	}

	.kingdompulserightlistar ol li::before {
	  content: counter(my-awesome-counter);
	  color: white;
      background-color:darkgreen;
      margin-left:25px;
      margin-right:-40px;
      border:5px;
      padding:5px;
	}

	.kingdompulserightlistar ol li.lastone {
	  counter-increment: my-awesome-counter;
      padding: 50px;
      padding-top: 0px;
      padding-bottom: 10px;
	  padding-left: 25px;
	  padding-right: 25px;
	}
	
	.kingdompulserightlistar ol li.lastone::before {
	  content: counter(my-awesome-counter);
	  color: white;
      background-color:darkgreen;
      margin-left:25px;
      margin-right:-40px;
      border:5px;
      padding:5px;	
	  padding-left: 0px;
	  padding-right: 1px;	  
	}

	@media only screen and (max-width: 480px) {		
	
		.kingdompulseleftlist {
			max-width: 100%;
			margin-right: 0%;
		}
		
		.kingdompulserightlist {
			max-width: 100%;
		}
	
		.kingdompulseleftlistar {
			max-width: 100%;
			margin-right: 0%;
		}
		
		.kingdompulserightlistar {
			max-width: 100%;
		}	
	
		.kingdompulse {
			margin-top: 130px;
		}
		
		.kingdompulsear {
			margin-top: 130px;
		}	
	}	
</style>

<style>
	.fullwidthlistkpar ol li.nozeroarabictop,
	.fullwidthlistkpar ol li.nozerolastonearabic,
	.kingdompulseleftlistar ol li,
	.kingdompulserightlistar ol li {
		position: relative;
		padding-right: 54px !important;
		padding-left: 10px !important;
	}

	.fullwidthlistkpar ol li.nozeroarabictop::before,
	.fullwidthlistkpar ol li.nozerolastonearabic::before,
	.kingdompulseleftlistar ol li::before,
	.kingdompulserightlistar ol li::before,
	.kingdompulserightlistar ol li.lastone::before {
		position: absolute;
		top: 2px;
		right: 0;
		left: auto;
		display: block;
		min-width: 30px;
		margin: 0 !important;
		padding: 5px 8px;
		text-align: center;
		line-height: 1;
		box-sizing: border-box;
		font-family: 'AdobeNaskh';
	}

	.fullwidthlistkpar ol li a {
		display: inline;
		margin-right: 0 !important;
		line-height: 1.45;
	}

	.kingdompulseleftlistar ol,
	.kingdompulserightlistar ol {
		padding-right: 18px;
		padding-left: 18px;
	}

	.kingdompulseleftlistar ol li span,
	.kingdompulserightlistar ol li span {
		display: block;
		margin-right: 0 !important;
	}

	.kingdompulseleftlistar ol li span + span,
	.kingdompulserightlistar ol li span + span {
		margin-top: 4px;
	}

	@media only screen and (max-width: 480px) {
		.fullwidthlistkpar ol li.nozeroarabictop,
		.fullwidthlistkpar ol li.nozerolastonearabic,
		.kingdompulseleftlistar ol li,
		.kingdompulserightlistar ol li {
			padding-right: 48px !important;
		}

		.kingdompulseleftlistar ol,
		.kingdompulserightlistar ol {
			padding-right: 12px;
			padding-left: 12px;
		}
	}
</style>

<style>
	
    .fullwidthlistkp span {
		margin-left: -10px;
    }

	.fullwidthlistkphead {
		width: 95%;
		position: relative;
		top: -40px;
		left: 30px;
		background-color: white;
		height: 50px;
	}
	
	.fullwidthlistkpimg {
		padding-left: 15px;
		margin-top: -55px;
	}
		
	.fullwidthlistkpimg img {
		width: 70px;
		object-fit: scale-down;
	}
		
	.fullwidthlistkphead h3 {
		color: #006400 !important;
	}
		
    .fullwidthlistkp {
		margin-bottom: 0px;
		padding-bottom: 0px;		
		background-color:#ffffff;
		border-color: #006400;
		border-width: 2px;
		border-style: solid;
		padding-top: 0px;
		padding-right: 30px;
		margin-top: 35px;
		margin-left: 0px;
		margin-right: 25px;
    }
	
    .fullwidthlistkp ol {

	  list-style: none;
	  counter-reset: my-awesome-counter;
      background-color:#ffffff;
      padding-top: 0px;
	}

	.fullwidthlistkp ol li {
	  counter-increment: my-awesome-counter;
      padding: 0px;
      padding-left: 77px;
	}

	.fullwidthlistkp ol li::before {
	  content: "0" counter(my-awesome-counter);
	  color: white;
      background-color:#006400;
      margin-left:-40px;
      margin-right:25px;
      border:5px;
      padding:5px;
	}

	.fullwidthlistkp ol li.lastone::before {
	  content: counter(my-awesome-counter);
	  color: white;
      background-color:#006400;
      margin-left:-40px;
      margin-right:25px;
      border:5px;
      padding:5px;
	}
	
    .fullwidthlistkp ol li.nozero::before {
	  content: counter(my-awesome-counter);
	  color: #fff;
      background-color:#006400;
      margin-left:-40px;
      margin-right:25px;
      border:5px;
      padding:5px;
	  padding-left: 10px;
	  padding-right: 9px;
	}	

	.fullwidthlistkp ol li.nozerolastone::before {
	  content: counter(my-awesome-counter);
	  color: #fff;
      background-color:#006400;
      margin-left:-40px;
      margin-right:25px;
      border:5px;
      padding:5px;
	}

	@media only screen and (max-width: 768px) {		

		.fullwidthlistkp span {
			margin-left: -10px;
		}

		.fullwidthlistkphead {
			width: 95%;
			position: relative;
			top: -20px;
			left: 30px;
			background-color: white;
			height: 50px;
		}
		
		.fullwidthlistkpimg {
			padding-left: 15px;
			margin-top: -25px;
		}
			
		.fullwidthlistkpimg img {
			width: 40px;
			object-fit: scale-down;
		}
			
		.fullwidthlistkphead h3 {
			color: #006400 !important;
		}
			
		.fullwidthlistkp {
			margin-bottom: 0px;
			padding-bottom: 0px;		
			background-color:#ffffff;
			border-color: #006400;
			border-width: 2px;
			border-style: solid;
			padding-top: 0px;
			padding-right: 30px;
			margin-top: 230px;
			margin-left: -5px;
			margin-right: -5px;
		}
		
		.fullwidthlistkp ol {

		  list-style: none;
		  counter-reset: my-awesome-counter;
		  background-color:#ffffff;
		  padding-top: 0px;
		}

		.fullwidthlistkp ol li {
		  counter-increment: my-awesome-counter;
		  padding: 0px;
		  padding-left: 50px;
		}

		.fullwidthlistkp ol li::before {
		  content: "0" counter(my-awesome-counter);
		  color: white;
		  background-color:#006400;
		  margin-left:-40px;
		  margin-right:25px;
		  border:5px;
		  padding:5px;
		}

		.fullwidthlistkp ol li.lastone::before {
		  content: counter(my-awesome-counter);
		  color: white;
		  background-color:#006400;
		  margin-left:-40px;
		  margin-right:25px;
		  border:5px;
		  padding:5px;
		}
		
		.fullwidthlistkp ol li.nozero::before {
		  content: counter(my-awesome-counter);
		  color: #fff;
		  background-color:#006400;
		  margin-left:-40px;
		  margin-right:25px;
		  border:5px;
		  padding:5px;
		  padding-left: 10px;
		  padding-right: 9px;
		}	

		.fullwidthlistkp ol li.nozerolastone::before {
		  content: counter(my-awesome-counter);
		  color: #fff;
		  background-color:#006400;
		  margin-left:-40px;
		  margin-right:25px;
		  border:5px;
		  padding:5px;
		}
		
	}

</style>

<style>
    .fullwidthlistkpar span {
		margin-left: -10px;
    }

	.fullwidthlistkparhead {
		width: 95%;
		position: relative;
		top: -40px;
		right: 30px;
		background-color: white;
		height: 50px;
	}
	
	.fullwidthlistkparimg {
		padding-left: 15px;
		margin-top: -55px;
	}
		
	.fullwidthlistkparimg img {
		width: 70px;
		object-fit: scale-down;
	}
		
	.fullwidthlistkparhead h3 {
		color: #171a1d !important;
	}
		
    .fullwidthlistkpar {
		background-color:#ffffff;
		border-color: #006400;
		border-width: 2px;
		border-style: solid;
		padding-top: 0px;
		padding-right: 30px;
		margin-top: 35px;
		margin-left: 25px;
		margin-right: 0px;
	
		margin-bottom: 0px;
		padding-bottom: 0px;
    }
	
    .fullwidthlistkpar ol {

	  list-style: none;
	  counter-reset: my-awesome-counter;
      background-color:#ffffff;
      padding-top: 0px;
	  margin-right: 55px;
	  text-align: justify;
	}

	.fullwidthlistkpar ol li {
	  counter-increment: my-awesome-counter;
      padding: 0px;
      padding-left: 77px;
	}

	.fullwidthlistkpar ol li::before {
	  content: "0" counter(my-awesome-counter);
	  color: white;
      background-color:#006400;
      margin-left:-40px;
      margin-right:25px;
      border:5px;
      padding:5px;
	}

    .fullwidthlistkpar ol li.nozeroarabic::before {
	  
	  content: counter(my-awesome-counter, arabic-indic);
	  color: #fff;
      background-color:#006400;
      margin-left:10px;
      margin-right:-35px;
      border:5px;
      padding:5px;
	  padding-left: 10px;
	  padding-right: 9px;
	}	

    .fullwidthlistkpar ol li.nozeroarabictop::before {
	  
	  content: counter(my-awesome-counter, arabic-indic);
	  color: #fff;
      background-color:#006400;
      margin-left:-40px;
      margin-right:-35px;
      border:5px;
      padding:5px;
	  padding-left: 10px;
	  padding-right: 9px;
	}
	
	.fullwidthlistkpar ol li.nozerolastonearabic::before {
	  content: counter(my-awesome-counter, arabic-indic);
	  color: #fff;
      background-color:#006400;
      margin-left:-40px;
      margin-right:-35px;
      border:5px;
      padding:5px;
	  padding-left: 8px;
	  padding-right: 8px;
	}	

	@media only screen and (max-width: 768px) {		
	
		.fullwidthlistkpar span {
			margin-left: -10px;
		}

		.fullwidthlistkparhead {
			width: 95%;
			position: relative;
			top: -10px;
			right: 30px;
			background-color: white;
			height: 50px;
		}
		
		.fullwidthlistkparimg {
			padding-left: 15px;
			margin-top: -25px;
		}
			
		.fullwidthlistkparimg img {
			width: 40px;
			object-fit: scale-down;
		}
			
		.fullwidthlistkparhead h3 {
			color: #171a1d !important;
		}
			
		.fullwidthlistkpar {
			background-color:#ffffff;
			border-color: #006400;
			border-width: 2px;
			border-style: solid;
			padding-top: 0px;
			padding-right: 5px;
			margin-top: 110px;
			margin-left: -5px;
			margin-right: -5px;
		
			margin-bottom: 0px;
			padding-bottom: 0px;
		}
		
		.fullwidthlistkpar ol {

		  list-style: none;
		  counter-reset: my-awesome-counter;
		  background-color:#ffffff;
		  padding-top: 0px;
		  margin-right: 35px;
		  text-align: justify;
		}

		.fullwidthlistkpar ol li {
		  counter-increment: my-awesome-counter;
		  padding: 0px;
		  padding-left: 40px;
		}

		.fullwidthlistkpar ol li::before {
		  content: "0" counter(my-awesome-counter);
		  color: white;
		  background-color:#006400;
		  margin-left:-40px;
		  margin-right:25px;
		  border:5px;
		  padding:5px;
		}

		.fullwidthlistkpar ol li.nozeroarabic::before {
		  
		  content: counter(my-awesome-counter, arabic-indic);
		  color: #fff;
		  background-color:#006400;
		  margin-left:10px;
		  margin-right:-35px;
		  border:5px;
		  padding:5px;
		  padding-left: 10px;
		  padding-right: 9px;
		}	

		.fullwidthlistkpar ol li.nozeroarabictop::before {
		  
		  content: counter(my-awesome-counter, arabic-indic);
		  color: #fff;
		  background-color:#006400;
		  margin-left:-40px;
		  margin-right:-35px;
		  border:5px;
		  padding:5px;
		  padding-left: 10px;
		  padding-right: 9px;
		}
		
		.fullwidthlistkpar ol li.nozerolastonearabic::before {
		  content: counter(my-awesome-counter, arabic-indic);
		  color: #fff;
		  background-color:#006400;
		  margin-left:-40px;
		  margin-right:-35px;
		  border:5px;
		  padding:5px;
		  padding-left: 8px;
		  padding-right: 8px;
		}	
	}	
</style>

<style>
	.fullwidthlistkpar ol li.nozeroarabictop,
	.fullwidthlistkpar ol li.nozerolastonearabic {
		position: relative;
		padding-right: 54px !important;
		padding-left: 0 !important;
	}

	.fullwidthlistkpar ol li.nozeroarabictop::before,
	.fullwidthlistkpar ol li.nozerolastonearabic::before {
		position: absolute;
		top: 2px;
		right: 0;
		left: auto;
		display: block;
		min-width: 30px;
		margin: 0 !important;
		padding: 5px 8px;
		text-align: center;
		line-height: 1;
		box-sizing: border-box;
		font-family: 'AdobeNaskh';
	}

	.fullwidthlistkpar ol li a {
		display: inline;
		margin-right: 0 !important;
		line-height: 1.45;
	}

	@media only screen and (max-width: 768px) {
		.fullwidthlistkpar ol li.nozeroarabictop,
		.fullwidthlistkpar ol li.nozerolastonearabic {
			padding-right: 48px !important;
		}
	}
</style>
<script>
document.addEventListener("DOMContentLoaded", function(){
	const overlay = document.getElementById("popup-overlay");
	const popup = document.getElementById("popup-box");

	if(overlay && popup){
		overlay.style.display = "block";
		popup.style.display = "block";
	}

	function closePopup(){
		overlay.style.display = "none";
		popup.style.display = "none";
	}

	document.getElementById("close-x")?.addEventListener("click", closePopup);
	document.getElementById("close-popup")?.addEventListener("click", closePopup);
	overlay?.addEventListener("click", closePopup);

	document.getElementById("subscribe-fixed")?.addEventListener("click", function(){
		document.getElementById("popup-fixed-container").style.display="none";
	});
});
</script>
<!-- ===== SUBSCRIBE (STATIC MID PAGE) ===== -->
<section class="subscribe-mid">
	<div class="subscribe-box">
		<h2>SUBSCRIBE TO NEWSLETTER</h2>
		<p>Subscribe to download our daily economics and business roundup</p>

		<div class="popup-inputs">
			<input type="text" placeholder="Your Name">
			<input type="email" placeholder="Your Email Address">
		</div>

		<button>SUBSCRIBE</button>
	</div>
</section>
<?php get_footer(); ?>
