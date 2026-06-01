<?php
/* Template Name: Publications */
get_header();
?>

<!-- ===== HERO ===== -->
<div class="page-hero">
    <div class="hero-overlay">
        <div class="hero-title-wrapper">
            <span class="hero-title-back">PUBLICATIONS</span>
            <span class="hero-title-front">PUBLICATIONS</span>
        </div>
    </div>
</div>

<main class="reports_page publications-main">
    <div class="container">

        <?php
        $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;

        $reports_args = array(
            'post_type' => 'reports',
            'posts_per_page' => 6,
            'paged' => $paged,
        );

        $reports = new WP_Query($reports_args);

        $reports_categories = get_categories(array(
            'taxonomy' => 'reports_cat',
            'exclude' => array(1),
        ));
        ?>

        <?php if ($reports_categories): ?>
            <div class="row align-items-end categories_container">
                <div class="col col-lg-8">
                    <ul class="categories_tabs_filter">
                        <li class="cat-list_item active" data-slug="">
                            <a href="javascript:void(0)">All Reports</a>
                        </li>
                        <?php foreach($reports_categories as $cat):
                            if (strpos($cat->slug, 'hide') !== false) continue; ?>
                            <li class="cat-list_item" data-slug="<?php echo esc_attr($cat->slug); ?>">
                                <a href="javascript:void(0)"><?php echo esc_html($cat->name); ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="col col-md-3 col-lg-2">
                    <div class="input_wrapper">
                        <label>Year</label>
                        <select id="year_filter">
                            <option value="">All</option>
                            <?php echo wp_get_archives(array(
                                'type' => 'yearly',
                                'post_type' => 'reports',
                                'format' => 'custom',
                                'echo' => false,
                            )); ?>
                        </select>
                    </div>
                </div>

                <div class="col col-md-3 col-lg-2">
                    <div class="input_wrapper">
                        <label>Month</label>
                        <select id="month_filter">
                            <option value="">All</option>
                            <?php for ($m=1;$m<=12;$m++): ?>
                                <option value="<?php echo $m; ?>"><?php echo date('F', mktime(0,0,0,$m,1)); ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($reports->have_posts()): ?>
            <div class="reports_data">
                <?php
                while ($reports->have_posts()): $reports->the_post();
                    get_template_part('template-parts/content', 'report');
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        <?php endif; ?>

    </div>
</main>

<!-- ===== Popup عند التحميل ===== -->
<div id="popup-overlay"></div>
<div id="popup-box">
    <div id="close-x">&times;</div>
    <h2>SUBSCRIBE TO PUBLICATIONS</h2>
    <p>Subscribe to download our daily economics and business roundup</p>
    <div class="popup-inputs">
        <input type="text" placeholder="Your Name">
        <input type="email" placeholder="Your Email Address">
    </div>
    <button id="close-popup">SUBSCRIBE</button>
</div>

<!-- ===== Popup ثابت فوق الفوتر ===== -->
<div id="popup-fixed-container">
    <div id="popup-fixed">
        <h2>SUBSCRIBE TO PUBLICATIONS</h2>
        <p>Subscribe to download our daily economics and business roundup</p>
        <div class="popup-inputs">
            <input type="text" placeholder="Your Name">
            <input type="email" placeholder="Your Email Address">
        </div>
        <button id="subscribe-fixed">SUBSCRIBE</button>
    </div>
</div>

<!-- ===== STYLE ===== -->
<style>
/* HERO */
.page-hero {
    position: relative;
    width: 100%;
    height: 300px;
    background: url('https://www.zillacapital.com/wp-content/uploads/2026/01/ripped-financial-report-floating-air-illustration.png') center/cover no-repeat;
}
.hero-overlay {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}
.hero-title-wrapper { position: relative; text-align:center; font-family:'Rotunda',sans-serif;}
.hero-title-back { position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); font-size:96px; font-weight:900; color: rgba(255,255,255,.15);}
.hero-title-front { font-size:42px; font-weight:700; color:#fff;}
/* خلفية معتمة */
#popup-overlay {
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0,0,0,0.65);
  backdrop-filter: blur(3px);
  display: none;
  z-index: 999;
}

/* صندوق البوب أب */
#popup-box {
  position: fixed;
  top: 50%; left: 50%;
  transform: translate(-50%, -50%) scale(0.7);
  width: 70%;
  max-width: 950px;
  background: #fdffff;
  padding: 60px 80px;
  border-radius: 20px;
  text-align: center;
  display: none;
  z-index: 1000;
  font-family:"rotunda";

  box-shadow: 0 0 25px rgba(0,0,0,0.15);
  transition: 0.3s ease;
}

/* زر الإغلاق X */
#close-x {
  position: absolute;
  top: 15px;
  right: 20px;
  font-size: 26px;
  cursor: pointer;
  color: #777;
  font-weight: bold;
  transition: 0.2s;
}

#close-x:hover {
  color: #000;
}

/* عنوان البوب أب */
#popup-box h2 {
  color: #4dc8ed ;
  font-size: 38px;
  margin-bottom: 10px;
  font-weight:900;
}

/* النص */
#popup-box p {
  color: #102649;
  margin-bottom: 20px;
  font-size: 22px;
}

/* الحقول */
.popup-inputs {
  display: flex;
  gap: 15px;
  justify-content: center;
  margin-bottom: 16px;
}

.popup-inputs input {
  width: 45%;
  padding: 14px 17px;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 18px;
  outline: none;
}

/* زر الاشتراك */
#close-popup {
  background: #102649;
  color: #fff;
  padding: 15px 32px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-size: 16px;
}

#close-popup:hover {
  opacity: 0.9;
}
#popup-fixed-container {
  width: 100%;
  display: flex;
  justify-content: center;
  margin: 60px 0;
}
#popup-fixed-container h2 {
  color: #4dc8ed ;
  font-size: 38px;
  margin-bottom: 10px;
  font-weight:900;
}

/* النص */
#popup-fixed-container p {
  color: #102649;
  margin-bottom: 20px;
  font-size: 22px;
}
#popup-fixed {
  width: 70%;
  max-width: 950px;
  background: #fdffff;
  padding: 50px 60px;
  border-radius: 20px;
  text-align: center;
  box-shadow: 0 0 25px rgba(0,0,0,0.15);
  font-family: "rotunda";
}
[type='submit'], button{
    background-color:#102649 !important;
    color: white!important;
    padding: 15px 10px!important;
    max-width:30%;
}
html, body {
  width: 100%;
  max-width: 100%;
  overflow-x: hidden;
  margin: 0;
  padding: 0;
}

/* =============================== */
/* 📱 موبايل صغير */
@media (max-width: 480px) {

  #popup-box {
    width: 95%;
    padding: 30px 20px;
    border-radius: 16px;
 height:60%;
  }
#popup-fixed{
    width: 95%;
    padding: 35px 20px;
    border-radius: 16px;
   
  }
  #popup-box h2 {
    font-size: 26px;
  }
 #popup-fixed h2 {
    font-size: 20px;
  }

  #popup-box p {
    font-size: 16px;
    line-height: 1.5;
  }
#popup-fixed p {
    font-size: 10px;
    line-height: 1.5;
  }
  .popup-inputs {
    flex-direction: column;
    gap: 12px;
  }

  .popup-inputs input {
    width: 100%;
    font-size: 17px;
    padding: 16px 14px;
  }

  #close-popup {
    width: 100%;
    padding: 20px;
    font-size: 17px;
  }

  #close-x {
    font-size: 22px;
  }
#popup-fixed-container {
  width: 90%;
   justify-content: center;
 
}
#popup-fixed-container h2 {
   font-size: 16px;
  font-weight:900;
}

#popup-fixed-container p {
  font-size: 10px;
}
}


/* =============================== */
/* 📱 موبايل كبير / تابلت صغير */
@media (min-width: 481px) and (max-width: 768px) {

  #popup-box {
    width: 85%;
    padding: 45px 40px;
  }

  #popup-box h2 {
    font-size: 28px;
  }

  #popup-box p {
    font-size: 18px;
  }

  .popup-inputs input {
    font-size: 16px;
  }
#popup-fixed {
    width: 90%;
    padding: 30px 20px;
    border-radius: 16px;
  }

  #popup-fixed h2 {
    font-size: 22px;
  }

  #popup-fixed p {
    font-size: 15px;
    line-height: 1.5;
  }

  #popup-fixed .popup-inputs {
    flex-direction: column;
    gap: 12px;
  }

  #popup-fixed .popup-inputs input {
    width: 100%;
    font-size: 15px;
  }

  #popup-fixed button {
    width: 100%;
    padding: 14px;
  }
#popup-fixed-container {
  width: 90%;
   justify-content: center;
 
}
#popup-fixed-container h2 {
   font-size: 20px;
  font-weight:900;
}

#popup-fixed-container p {
  font-size: 16px;
}
}


/* =============================== */
/* 💻 تابلت كبير */
@media (min-width: 769px) and (max-width: 1024px) {

  #popup-box {
    width: 80%;
    padding: 55px 60px;
  }

  #popup-box h2 {
    font-size: 34px;
  }

  #popup-box p {
    font-size: 20px;
  }
 #popup-fixed{
    width: 80%;
    padding: 55px 60px;
  }

  #popup-fixed h2 {
    font-size: 25px;
  }

  #popup-fixed p {
    font-size: 18px;
  }
}
</style>

<!-- ===== SCRIPT ===== -->
<script>
document.addEventListener("DOMContentLoaded", function(){
    // Popup عند التحميل
    const overlay = document.getElementById("popup-overlay");
    const popup   = document.getElementById("popup-box");
    const closeX  = document.getElementById("close-x");
    const subscribeBtn = document.getElementById("close-popup");

    overlay.style.display = "block";
    popup.style.display   = "block";

    function closePopupLoad(){
        overlay.style.display = "none";
        popup.style.display   = "none";
    }

    closeX.addEventListener("click", closePopupLoad);
    subscribeBtn.addEventListener("click", closePopupLoad);
    overlay.addEventListener("click", closePopupLoad);

    // Popup ثابت فوق الفوتر
    const fixedSubscribe = document.getElementById("subscribe-fixed");
    fixedSubscribe.addEventListener("click", function(){
        document.getElementById("popup-fixed-container").style.display = "none";
    });
});
</script>

<?php get_footer(); ?>
