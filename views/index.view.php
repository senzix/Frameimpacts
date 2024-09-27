<?php require "partials/header.php" ?>

<div class="slider-section">
  <!-- revolution slider -->
  <section class="no-top no-bottom" aria-label="section-slider">
    <!-- home -->
    <div class="fullwidthbanner-container">
      <div id="revolution-slider-half">
        <ul>
          <?php foreach ($sliderItems as $item): ?>
            <li data-transition="fade" data-slotamount="10" data-masterspeed="1200" data-delay="5000">
              <!--  BACKGROUND IMAGE -->
              <img src="<?= $item['image'] ?>" alt="" data-start="0" data-bgposition="center center" data-kenburns="on"
                data-duration="10000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="100"
                data-bgpositionend="center center" />
              <div class="tp-caption slide-big-heading sft" data-x="center" data-y="160" data-speed="800" data-start="400"
                data-easing="easeInOutExpo" data-endspeed="450"><span style="color:#ffffff;">
                <?= $item['heading'] ?></span>
              </div>

              <div class="tp-caption btn-slider sfb" data-x="center" data-y="300" data-speed="400" data-start="800"
                data-easing="easeInOutExpo">
                <span class="shine"></span><a href="<?= $item['buttonLink'] ?>"><?= $item['buttonText'] ?></a>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
        <div class="tp-bannertimer hide"></div>
      </div>
    </div>
    <!-- home end -->
  </section>
  <!-- revolution slider end -->
</div>


<section class="service what-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="about-info sec-padd text-center mb-5">
          <div class="section-title">
            <h2>Comprehensive Services</h2>
          </div>
        </div>
      </div>
      <?php foreach ($services as $service): ?>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="we-do-item">
            <div class="we-icon">
              <i class="<?= $service['icon'] ?>"></i>
            </div>
            <div class="we-desc">
              <h4 class="we-title"><?= $service['title'] ?></h4>
              <p><?= $service['description'] ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="about-faq sec-padd py-5">
  <div class="container">
    <div class="section-title text-center mb-5">
      <h2>about us &amp; faq's</h2>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="about-info">
          <h4>We counsel our clients on their key strategic issues, leveraging our deep industry expertise
            and using analytical rigor to help</h4>
          <br>
          <div class="text">
            <p>We counsel our clients on their key strategic issues, leveraging our deep industry expertise
              and using analytical rigor to help them make informed decisions more quickly and solve their
              toughest and most critical business problems.<BR><BR>

              Founded in # by # partners, we now employ more than 1,000 professionals worldwide. We advise and
              support global companies that are leaders in their industries.</p>

          </div>

          <div class="link_btn">
            <a href="/aboutus" class="thm-btn">know more <i class="vc_btn3-icon fas fa-chevron-right"></i></a>
            <!--<div class="sign"><img src="images/resource/sign.jpg" alt=""></div>-->
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12">
        <div id="main">

          <div class="accordion" id="faq">
            <div class="card">
              <div class="card-header" id="faqhead1">
                <a href="#" class="btn-header-link text-truncate" data-toggle="collapse" data-target="#faq1"
                  aria-expanded="true" aria-controls="faq1">What does Frameimpacts do</a>
              </div>

              <div id="faq1" class="collapse show" aria-labelledby="faqhead1" data-parent="#faq">
                <div class="card-body">
                  We help entrepreneurs get ready to raise capital. Please note that we cannot help our clients raise
                  capital. This usually consists of some or all of our services. This is a service that is heavily
                  regulated.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="faqhead2">
                <a href="#" class=" btn-header-link text-wrap collapsed" data-toggle="collapse" data-target="#faq2"
                  aria-expanded="true" aria-controls="faq2">Which geographies you have worked already?</a>
              </div>

              <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
                <div class="card-body">
                  We help entrepreneurs get ready to raise capital. Please note that we cannot help our clients raise
                  capital. This usually consists of some or all of our services. This is a service that is heavily
                  regulated.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="faqhead3">
                <a href="#" class=" btn-header-link text-wrap collapsed" data-toggle="collapse" data-target="#faq3"
                  aria-expanded="true" aria-controls="faq3">What makes you special from others?</a>
              </div>

              <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                <div class="card-body">
                  We help entrepreneurs get ready to raise capital. Please note that we cannot help our clients raise
                  capital. This usually consists of some or all of our services. This is a service that is heavily
                  regulated.
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>





<!--
<section class="achivement-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="about-info sec-padd text-center mb-5">
          <div class="section-title">
            <h2>testimonials</h2>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="slick-slider blog-slider">
          <div>
            <div class="item text-white">
              <div class="success_items">
                <div class="user-profile-test">
                  <a href="#"><img src="img/testimonial/1.jpg" alt="Success" class="user_img img-fluid"></a>
                </div>
                <div class="text-md-left text-center">
                  <div class="info">
                    <h4 class="no_stripe">
                      <a href="" tabindex="0">
                        Amanda Seyfried
                      </a>
                    </h4>
                    <div class="position">Sales &amp; Marketing</div>
                    <div class="company">Alien Ltd.</div>
                    <p>Consulting WP really helped us achieve our financial goals.
                      The slick presentation along with fantastic readability ensures
                      that our financial standing is stable.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div>
            <div class="item text-white">
              <div class="success_items">

                <div class="user-profile-test">
                  <a href="#"> <img src="img/testimonial/2.jpg" alt="Success" class="user_img img-fluid"></a>
                </div>
                <div class="text-md-left text-center">
                  <div class="info">
                    <h4 class="no_stripe">
                      <a href="" tabindex="0">
                        Amanda Seyfried
                      </a>
                    </h4>
                    <div class="position">Sales &amp; Marketing</div>
                    <div class="company">Alien Ltd.</div>
                    <p>Consulting WP really helped us achieve our financial goals.
                      The slick presentation along with fantastic readability ensures
                      that our financial standing is stable.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div>
            <div class="item text-white">
              <div class="success_items">

                <div class="user-profile-test">
                  <a href="#"><img src="img/testimonial/3.jpg" alt="Success" class="user_img img-fluid"></a>
                </div>
                <div class="text-md-left text-center">
                  <div class="info">
                    <h4 class="no_stripe">
                      <a href="" tabindex="0">
                        Amanda Seyfried
                      </a>
                    </h4>
                    <div class="position">Sales &amp; Marketing</div>
                    <div class="company">Alien Ltd.</div>
                    <p>Consulting WP really helped us achieve our financial goals.
                      The slick presentation along with fantastic readability ensures
                      that our financial standing is stable.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div>
            <div class="item text-white">
              <div class="success_items">

                <div class="user-profile-test">
                  <a href="#"> <img src="img/testimonial/4.jpg" alt="Success" class="user_img img-fluid"></a>
                </div>
                <div class="text-md-left text-center">
                  <div class="info">
                    <h4 class="no_stripe">
                      <a href="" tabindex="0">
                        Amanda Seyfried
                      </a>
                    </h4>
                    <div class="position">Sales &amp; Marketing</div>
                    <div class="company">Alien Ltd.</div>
                    <p>Consulting WP really helped us achieve our financial goals.
                      The slick presentation along with fantastic readability ensures
                      that our financial standing is stable.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</section>-->
<section class="about-us-page">
  <div class="partners">
    <div class="container">
      <h2>Our Partners</h2>
      <div class="partner-logos">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="client-outer">
                <div class="slick-slider client-slider">
                  <?php
                  $partners = ['dci', 'highland', 'neicord', 'prime', 'rilum'];
                  foreach ($partners as $partner) { ?>
                    <div class="wow-outer" style="height:60px;width:10px;">
                      <div class="item wow slideInLeft" data-wow-delay=".1s">
                        <img src='img/client/<?= $partner ?>.png' alt="ucfirst(<?= $partner ?>) ">
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php if (!empty($recentPosts)): ?>
  <section class="blog">
    <div class="container-fluid">
      <div class="row p-3-vh">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="about-info sec-padd text-center mb-5">
            <div class="section-title">
              <h2>Recent Articles</h2>
            </div>
          </div>
        </div>
        <?php foreach ($recentPosts as $post): ?>
          <div class="col-md-3 wow-outer">
            <div class="blogcolumn wow slideInRight" data-wow-delay=".<?= ($index + 1) * 2 ?>s">
              <div class="imgtop">
                <a href="/post?p_id=<?= $post['post_id'] ?>"><img
                    src="<?= 'img/upload/' . htmlspecialchars($post['image_path']) ?>" alt=""
                    class="w-gallery-image img-fluid"></a>
                <span class="tag">
                  <?= (new DateTime($post['created_at']))->format('F j, Y g:i A') ?>
                </span>
              </div>
              <div class="blogcont">
                <div class="headingblog">
                  <h4><a href="/post?p_id=<?= $post['post_id'] ?>"><?= htmlspecialchars($post['title']) ?></a></h4>
                </div>
                <div class="content-preview">
                  <p><a
                      href="/post?p_id=<?= $post['post_id'] ?>"><?= htmlspecialchars(substr($post['content'], 0, 100)) . '...' ?></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

    </div>
  </div>
</section>
<?php require "partials/banner2.php"?>
<?php require "partials/footer.php" ?>