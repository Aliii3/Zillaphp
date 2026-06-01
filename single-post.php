<?php
 get_header();
?>

<!-- ===== HERO ===== -->
<div class="custom-header">
    <div class="custom-header-overlay">
        
    </div>
</div>

<main class="news-main">

<?php while ( have_posts() ): the_post(); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="article_content col-10">
            <div class="row justify-content-center">
                <div class="col-lg-11">

                    <div class="meta_data">
                        <div>
                            <div class="label news-label">News</div>
                            <time><?php the_date('d M Y'); ?></time>
                        </div>
                    </div>

                    <?php the_title('<h3 style="color:#112649;">', '</h3>'); ?>

                    <?php
                    if ( has_post_thumbnail() ) {
                        $image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
                        echo '<img src="'.get_the_post_thumbnail_url().'" alt="'.esc_attr($image_alt).'" style="object-fit:revert;">';
                    }
                    ?>

                    <div class="article_content-content" style="text-align:justify;color:#112649;">
                        <?php the_content(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== SUBSCRIPTION ===== -->
<section class="subscription_form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h3 class="section_subtitle">Get The Latest From Zilla Capital</h3>
            </div>
        </div>
        <?php echo do_shortcode('[mc4wp_form id="6076"]'); ?>
    </div>
</section>

<!-- ===== RELATED POSTS ===== -->
<div class="container">
<?php
$orig_post = $post;
$tags = wp_get_post_tags($post->ID);
$categories = get_the_category($post->ID);

if ($tags || $categories) {

    $tag_ids = [];
    $category_ids = [];

    foreach ($tags as $tag) $tag_ids[] = $tag->term_id;
    foreach ($categories as $cat) $category_ids[] = $cat->term_id;

    $args = array(
        'tag__in' => $tag_ids,
        'category__in' => $category_ids,
        'post__not_in' => array($post->ID),
        'posts_per_page' => 4,
        'ignore_sticky_posts' => 1
    );

    $related_posts = new WP_Query($args);

    if ($related_posts->have_posts()) {

        echo '
        <div class="before_loop">
            <p class="section_title">Stay up to date</p>
            <p class="section_subtitle">More Reports to Check</p>
        </div>
        <div class="row">';

        while ($related_posts->have_posts()) {
            $related_posts->the_post();

            echo '
            <div class="col-12 col-lg-6">
                <article class="news_article">';

                if (has_post_thumbnail()) {
                    $image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
                    echo '<img src="'.get_the_post_thumbnail_url().'" alt="'.esc_attr($image_alt).'">';
                }

                echo '
                    <div class="content_wrapper">
                        <time>'.get_the_date('d M Y').'</time>
                        <h3>'.get_the_title().'</h3>
                        <a href="'.get_the_permalink().'" class="btn btn-secondary btn-icon-arrow_right-colored">
                            Read More
                        </a>
                    </div>
                </article>
            </div>';
        }

        echo '</div>';
    }

    wp_reset_postdata();
}
?>
</div>

<?php endwhile; ?>
</main>

<?php get_footer(); ?>


<!-- ===== STYLE ===== -->
<style>
/* ===== HERO ===== */
/* ===== HERO FIXED ALL DEVICES ===== */
.custom-header{
    background-image: url('https://www.zillacapital.com/wp-content/uploads/2025/11/contact.png');
    background-position: center center;
    background-repeat: no-repeat;
    background-size: contain; /* أهم سطر */
    background-color: #000;   /* لون خلفية لو الصورة صغرت */
    width: 100%;
    min-height: 300px;
}

/* Overlay */
.custom-header-overlay{
    background: rgba(0,0,0,.35);
    min-height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* ===== RESPONSIVE HEIGHTS ===== */
@media (max-width: 1200px){
    .custom-header,
    .custom-header-overlay{
        min-height: 260px;
background-image: url('https://www.zillacapital.com/wp-content/uploads/2025/11/contact.png');
    }
}

@media (max-width: 992px){
    .custom-header,
    .custom-header-overlay{
        min-height: 240px;
    }
background-image: url('https://www.zillacapital.com/wp-content/uploads/2025/11/contact.png');
}

@media (max-width: 768px){
    .custom-header,
    .custom-header-overlay{
        min-height: 220px;
    }
background-image: url('https://www.zillacapital.com/wp-content/uploads/2025/11/contact.png');
}

@media (max-width: 576px){
    .custom-header,
    .custom-header-overlay{
        min-height: 200px;
    }
background-image: url('https://www.zillacapital.com/wp-content/uploads/2025/11/contact.png');
}

.title-front{
    font-size:42px;
    font-weight:700;
    color:#fff;
}
.internal_page_header { display: none !important; }

html, body {
  width: 100%;
  max-width: 100%;
  overflow-x: hidden;
  margin: 0;
  padding: 0;
}

/* ===== ARTICLE CONTENT ===== */
.article_content-content {
    text-align: justify;
    color: #112649;
    font-family: 'Rotunda-Regular';
    font-weight: normal;
    font-size: 16px;
    line-height: 1.5;
    overflow-wrap: break-word;
    white-space: pre-wrap;
}
.article_content-content img {
    display: block;
    max-width: 100%;
}
html, body {
  width: 100%;
  max-width: 100%;
  overflow-x: hidden;
  margin: 0;
  padding: 0;
}

</style>

<!-- ===== SCRIPT لتحويل كل نقطة لسطر جديد مع استثناء الأسماء ===== -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const content = document.querySelectorAll('.article_content-content');

    // استثناءات شائعة للاختصارات
    const exceptions = ['Mr.', 'Mrs.', 'Ms.', 'Dr.', 'Prof.'];

    content.forEach(el => {
        el.innerHTML = el.innerHTML.replace(/\.(\s|$)/g, function(match, space, offset, string){
            // الحصول على الكلمة قبل النقطة
            let prevWord = string.substring(0, offset).split(/\s/).pop() + '.';
            
            // إذا كانت النقطة جزء من اختصار أو متبوعة مباشرة بحرف كبير بدون مسافة، لا نضيف سطر جديد
            let nextChar = string[offset + 1] || '';
            if (exceptions.includes(prevWord) || (nextChar && nextChar.match(/[A-Z]/) && space === '')) {
                return '.';
            } else {
                return '.<br>';
            }
        });
    });
});
</script>
