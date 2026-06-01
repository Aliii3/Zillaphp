<?php get_header(); ?>

<main>
	<?php
		while ( have_posts() ): the_post();
	?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="article_content col-11 col-md-10">
				<div class="row justify-content-center">
					<div class="col-12 col-md-11">
						<div class="meta_data">
							<div>
								<div class="label insight-label">Blog</div>
								<time><?php the_date('d M Y'); ?></time>
							</div>

							<div>
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
							</div>
						</div>
						<BR>
						<div>
							<?php
							if ( wp_is_mobile() ) {
								echo '<img src="https://www.zillacapital.com/wp-content/uploads/2023/03/820x188.png" align="center" hspace="12" alt="Blog" style="object-fit: fill;" />';
							}
							else{
								echo '<img src="https://www.zillacapital.com/wp-content/uploads/2023/03/820x188.png" align="center" hspace="12" alt="Blog" style="object-fit: cover;" />';
							}	
							?>
						</div>
						<?php
							if ( wp_is_mobile() ) {
								the_title('<h3 style="color: white;font-size: 14px;margin-top: 0px;margin-bottom: 25px;background-color: #112649;line-height: 1.25;border-radius: 10px;padding: 5px;">', '</h3>'); 
							}
							else{
								the_title('<h3 style="color: white;font-size: 25px;margin-top: 0px;margin-bottom: 25px;background-color: #112649;line-height: 2.25;border-radius: 10px;padding-left: 10px;">', '</h3>'); 
							}
						
						?><div style="/* line-height: 1.15; */margin-bottom:10px;">
							<?php
							if ( wp_is_mobile() ) {
								echo '<div class="blog" style="white-space: pre-line;">';
							}
							else{
								echo '<div class="blog" style="white-space: break-spaces;">';
							}	
							?><p><?php
								
								if(has_post_thumbnail()) {
									$image_id = get_post_thumbnail_id();
									$image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE);
									echo '<img src="'.get_the_post_thumbnail_url().'" alt="'.$image_alt.'" / align="right" hspace="12">'; }
								?></p><?php
								if(get_the_content()){
									the_content();
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container">
		<?php
			$orig_post = $post;
			global $post;

			$related = get_posts(
				array(
					'category__in' => wp_get_post_categories($post->ID),
					'numberposts' => 4,
					'post_type' => 'blogs',
					'post__not_in' => array($post->ID)
				)
			);

			if( $related ){
				echo '
					<div class="before_loop">
						<p class="section_title">Stay up to date</p>
						<p class="section_subtitle">More Blogs to Check</p>
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
</style>
<style>
	
	@media only screen and (max-width: 400px) {		
		.audio_player {
			white-space: break-spaces;
			color: #112649;
			font-family: 'Rotunda-Medium';
			font-size: 23px;
			font-weight: 400;
			line-height: 1.39;
			margin-left: -17px;
			margin-right: -17px;
			height: 300px;
			margin-top: -30px;
		}
	}
	
	.audio_player table {
		margin-top: -25px;
	}

	@media only screen and (min-width: 768px) {		
		.audio_player table {
			margin-top: -35px;
		}

		.audio_player {
			white-space: break-spaces;
			color: #112649;
			font-family: 'Rotunda-Medium';
			font-size: 23px;
			font-weight: 400;
			line-height: 1.39;
			margin-left: -17px;
			margin-right: -17px;
			height: 175px;
			margin-top: -30px;
		}	
	}
	
	@media only screen and (min-width: 401px) and (max-width: 767px) {		
		.audio_player {
			white-space: break-spaces;
			color: #112649;
			font-family: 'Rotunda-Medium';
			font-size: 23px;
			font-weight: 400;
			line-height: 1.39;
			margin-left: -17px;
			margin-right: -17px;
			margin-top: -30px;
			height: 260px;
		}	
	}

	@media only screen and (max-width: 400px) {		
		.audio_player {
			white-space: break-spaces;
			color: #112649;
			font-family: 'Rotunda-Medium';
			font-size: 23px;
			font-weight: 400;
			line-height: 1.39;
			margin-left: -17px;
			margin-right: -17px;
			margin-top: -30px;
			height: 300px;
		}	
	}
	
	.audio_player img {
		margin: 0px;
		margin-bottom: -11px !important;
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
	/*	margin-bottom: 0px;*/
	}

	.subscription_form {
	    margin-top: 0px;
	}

</style>

<style>	
	.blog {
		text-align: justify;
		margin: 8pt 0pt 0pt 0pt;
		line-height: 106%;
		font-size: 11pt;
		/* font-family: 'Rotunda Light';*/
		white-space: break-spaces;
	}
	
	.blog p{
		text-align: justify;
		margin: 8pt 0pt 0pt 0pt;
		line-height: 106%;
		font-size: 11pt;
		/* font-family: 'Rotunda Light';*/
		white-space: pre-line;
	}

    .blog span {
		/* margin-left: -10px;*/
    }

    .blog ul {
      padding-inline-start: 15px;
	  margin-top: 15px;
	  white-space: normal;
	}

	.blog ul li {
	  white-space: normal;
	}

	.blog img {
		margin-top: -15px; 
		margin-left: 10px; 
		margin-bottom: 0px;
		width: revert;
	}

</style>

<style>	
	.blogmobile {
		text-align: justify;
		margin: 8pt 0pt 0pt 0pt;
		line-height: 106%;
		font-size: 11pt;
		/* font-family: 'Rotunda Light';*/
		white-space: break-spaces;
	}
	
	.blogmobile p{
		text-align: justify;
		margin: 8pt 0pt 0pt 0pt;
		line-height: 106%;
		font-size: 11pt;
		/* font-family: 'Rotunda Light';*/
		white-space: pre-line;
	}

    .blogmobile span {
		/* margin-left: -10px; */
    }

    .blogmobile ul {
      padding-inline-start: 15px;
	  margin-top: 15px;
      white-space: normal;
	}

	.blogmobile ul li {
	  white-space: normal;
	}

	.blogmobile img {
		margin-top: 0px; 
		margin-left: 0px; 
		margin-bottom: 0px;
		width: revert;
	}

</style>

<?php get_footer(); ?>