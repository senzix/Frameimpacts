<?php require "partials/header.php";?>

<main class="about-us-page">
    <?php require "partials/banner.php"; ?>
    
    <section class="intro">
    <div class="section-title text-center mb-5">
		<h2>About FrameImpacts Pvt. Ltd.</h2>
	</div>
        <div class="container">
            <p class="lead">FrameImpacts Pvt. Ltd. is a forward-thinking consultancy firm dedicated to fostering sustainable development and empowering businesses and communities across Northeast India. As an MCA-listed company, we specialize in delivering comprehensive solutions in Social Impact, Business Management, and Health Management consulting.</p>
        </div>
    </section>


    <section class="vision-mission">
        <div class="container">
            <div class="card vision">
                <h2>Vision</h2>
                <p>Transforming India's North East Region social development landscape through data-driven insights, monitoring & evaluation tools, and innovative practices.</p>
            </div>
            <div class="card mission">
                <h2>Mission</h2>
                <p>Championing an inclusive approach to impactful development in Northeast India and beyond, through co-creation with local stakeholders and effective partnerships.</p>
            </div>
        </div>
    </section>

    <section class="strategy">
        <div class="container">
            <h2>Business Strategy Operations</h2>
            <p>FrameImpacts is a social impact and development frontier agency that engages in diverse pivotal activities to foster sustainable social development. We champion a collaborative approach, working closely with our clients to co-design and strategize programs, conduct rigorous social impact assessments, research, and generate data-driven insights for informed decision-making.</p>
        </div>
    </section>

    <section class="message-faq">
        <div class="container">
            <div class="message">
                <h2>Chairman's Message</h2>
                <p>Dear Esteemed Partners and Collaborators,</p>
                <p>I am thrilled to welcome you to FrameImpacts Pvt. Ltd.,an innovative consultancy
                                dedicated to catalyzing transformative change in Northeast India. As Chairman of the
                                Board,
                                I take immense pride in our vision to empower local NGOs and development agencies with
                                data-driven insights and pioneering M&E practices, among other services.<BR><BR>

                                Our team, committed to excellence and hard work, stands ready to collaborate with you on
                                initiatives that drive sustainable impact. We specialize in co-designing impactful
                                programs,
                                conducting rigorous social impact assessments, and providing data-driven insights for
                                informed decision-making.<BR><BR>

                                At Frame Impacts, we offer tailored M&E system strengthening, co-creation of impactful
                                solutions, transformative communication, and storytelling, along with capacity building
                                for
                                organizational and entrepreneurial transformation. Our goal is to be your trusted
                                partner on the journey to sustainable development in Northeast India and beyond.<BR><BR>

                                I invite you to explore our comprehensive consulting services and experience firsthand
                                the dedication and credibility of our team. Together, let's create a brighter future for
                                the region.
                                We eagerly anticipate the opportunity to collaborate with you.<BR><BR>
                                </p>
                                <p>Best Regards,</p>
                                <p>Lalhmangaih Hauzel</p>
                          
                        </div>
                        <div class="faq">
                <h2>Frequently Asked Questions</h2>
                <div class="accordion" id="faq">
                        <div class="card">
                            <div class="card-header" id="faqhead1">
                                <a href="#" class="btn-header-link text-truncate" data-toggle="collapse"
                                    data-target="#faq1" aria-expanded="true" aria-controls="faq1">What does Frameimpacts
                                    do</a>
                            </div>

                            <div id="faq1" class="collapse show" aria-labelledby="faqhead1" data-parent="#faq">
                                <div class="card-body">
                                    We help entrepreneurs get ready to raise capital. Please note that we cannot help
                                    our clients raise capital. This usually consists of some or all of our services.
                                    This is a service that is heavily regulated.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqhead2">
                                <a href="#" class=" btn-header-link text-wrap collapsed" data-toggle="collapse"
                                    data-target="#faq2" aria-expanded="true" aria-controls="faq2">Which geographies you
                                    have worked already?</a>
                            </div>

                            <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
                                <div class="card-body">
                                    We help entrepreneurs get ready to raise capital. Please note that we cannot help
                                    our clients raise capital. This usually consists of some or all of our services.
                                    This is a service that is heavily regulated.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqhead3">
                                <a href="#" class=" btn-header-link text-wrap collapsed" data-toggle="collapse"
                                    data-target="#faq3" aria-expanded="true" aria-controls="faq3">What makes you special
                                    from others?</a>
                            </div>

                            <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                                <div class="card-body">
                                    We help entrepreneurs get ready to raise capital. Please note that we cannot help
                                    our clients raise capital. This usually consists of some or all of our services.
                                    This is a service that is heavily regulated.
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
        </div>
    </section>

<section class="partners">
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
</section>

</main>

<?php require "partials/banner2.php"?>
<?php require "partials/footer.php"?>