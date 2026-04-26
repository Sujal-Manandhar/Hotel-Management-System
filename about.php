<!DOCTYPE html>
<html lang="en">
<head>
  <title>About Us - Crown Hotel | Luxury & Heritage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/style.css" rel="stylesheet"/>
  <meta name="description" content="Learn more about Crown Hotel - A premier 4-star luxury hotel in Nepal offering world-class hospitality and stunning mountain views.">
  <style>
    .about-hero {
      background: linear-gradient(135deg, rgba(10,14,23,0.85), rgba(22,27,34,0.8)), url('https://images.unsplash.com/photo-1564501049412-61c2a3083791?w=1600&q=80') center/cover;
      padding: 150px 0 100px 0;
      text-align: center;
      margin-top: -65px;
    }
    .about-hero h1 {
      font-size: 3.5em;
      margin-bottom: 15px;
    }

    .about-story {
      padding: 100px 0;
    }
    .about-story-img {
      border-radius: 20px;
      overflow: hidden;
      height: 450px;
    }
    .about-story-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .about-story-img:hover img {
      transform: scale(1.05);
    }
    .about-story-text {
      padding-left: 50px;
    }
    .about-story-text .gold-line {
      width: 60px;
      height: 4px;
      background: var(--primary-color);
      border-radius: 4px;
      margin-bottom: 25px;
    }
    .about-story-text h2 {
      color: #fff;
      font-size: 2.5em;
      margin-bottom: 10px;
    }
    .about-story-text h2 span {
      color: var(--primary-color);
    }
    .about-story-text p {
      color: var(--text-secondary);
      line-height: 1.9;
      font-size: 1.05em;
      margin-bottom: 20px;
    }

    /* Values Section */
    .values-section {
      padding: 100px 0;
      background: #080b12;
    }
    .value-card {
      background: var(--glass-bg);
      border: 1px solid var(--glass-border);
      border-radius: 20px;
      padding: 40px 30px;
      text-align: center;
      transition: all 0.4s ease;
      height: 100%;
    }
    .value-card:hover {
      transform: translateY(-10px);
      border-color: var(--primary-color);
      box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    }
    .value-icon {
      width: 80px;
      height: 80px;
      line-height: 80px;
      border-radius: 50%;
      background: rgba(197, 160, 89, 0.1);
      border: 1px solid rgba(197, 160, 89, 0.3);
      color: var(--primary-color);
      font-size: 2em;
      margin: 0 auto 25px auto;
      transition: all 0.3s;
    }
    .value-card:hover .value-icon {
      background: var(--primary-color);
      color: #fff;
    }
    .value-card h3 {
      color: #fff;
      margin-bottom: 15px;
      font-size: 1.4em;
    }
    .value-card p {
      color: var(--text-secondary);
      line-height: 1.7;
    }

    /* Team / Services Section */
    .services-about {
      padding: 100px 0;
    }
    .service-row {
      display: flex;
      align-items: center;
      margin-bottom: 60px;
      gap: 50px;
    }
    .service-row.reverse {
      flex-direction: row-reverse;
    }
    .service-row-img {
      flex: 0 0 45%;
      border-radius: 20px;
      overflow: hidden;
      height: 320px;
    }
    .service-row-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }
    .service-row-img:hover img {
      transform: scale(1.05);
    }
    .service-row-text {
      flex: 1;
    }
    .service-row-text h3 {
      color: #fff;
      font-size: 1.8em;
      margin-bottom: 15px;
    }
    .service-row-text h3 i {
      color: var(--primary-color);
      margin-right: 12px;
    }
    .service-row-text p {
      color: var(--text-secondary);
      line-height: 1.8;
      font-size: 1.05em;
    }

    /* Contact Bar */
    .contact-bar {
      padding: 80px 0;
      background: #080b12;
    }
    .contact-item {
      text-align: center;
      padding: 30px 20px;
    }
    .contact-item-icon {
      width: 70px;
      height: 70px;
      line-height: 70px;
      border-radius: 50%;
      background: rgba(197, 160, 89, 0.1);
      border: 1px solid rgba(197, 160, 89, 0.3);
      color: var(--primary-color);
      font-size: 1.5em;
      margin: 0 auto 20px auto;
      transition: all 0.3s;
    }
    .contact-item:hover .contact-item-icon {
      background: var(--primary-color);
      color: #fff;
      transform: translateY(-5px);
    }
    .contact-item h4 {
      color: #fff;
      margin-bottom: 8px;
    }
    .contact-item p {
      color: var(--text-secondary);
    }

    /* Map Section */
    .map-section {
      padding: 80px 0;
    }
    .map-wrapper {
      border-radius: 20px;
      overflow: hidden;
      border: 1px solid var(--glass-border);
    }
    .map-wrapper iframe {
      width: 100%;
      height: 400px;
      border: 0;
      filter: brightness(0.8) contrast(1.1);
    }

    @media (max-width: 992px) {
      .about-story-text {
        padding-left: 0;
        margin-top: 30px;
      }
      .service-row, .service-row.reverse {
        flex-direction: column;
      }
      .service-row-img {
        flex: 0 0 auto;
        width: 100%;
      }
    }
    @media (max-width: 768px) {
      .about-hero h1 {
        font-size: 2.5em;
      }
      .about-story-text h2 {
        font-size: 2em;
      }
    }
  </style>
</head>
<body>
<?php include('Menu Bar.php'); ?>

<!-- Hero Section -->
<div class="about-hero">
  <h1 class="section-title">About <span style="color:var(--primary-color)">Crown Hotel</span></h1>
  <div class="section-divider"></div>
  <p style="color: var(--text-secondary); font-size: 1.2em; max-width: 600px; margin: 20px auto 0 auto;">Where timeless elegance meets modern luxury in the heart of Nepal.</p>
</div>

<!-- Our Story -->
<div class="container-fluid about-story">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="about-story-img">
          <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800&q=80" alt="Crown Hotel Exterior">
        </div>
      </div>
      <div class="col-md-6">
        <div class="about-story-text">
          <div class="gold-line"></div>
          <h2>Our <span>Story</span></h2>
          <p>Crown Hotel, situated in Hetauda, built in modern and unique style with excellent state of the art facilities, is an iconic 4-star luxury hotel that captures the essence of legendary Nepalese hospitality, offering breathtaking panoramic views and exposing peace and tranquility.</p>
          <p>We are inspired by our caring attitude for our guests, people, and the environment. The hotel offers 131 well-appointed fabulous rooms and suites. The 4-star accommodation combines modern design with a host of premium amenities and facilities with thoughtful services to make each stay a unique and personalized experience.</p>
          <p>The story of Crown Hotel begins with a dream to build a world-class deluxe hotel in Nepal, providing luxury services to discerning clients, celebrating Nepalese warmth and adding one more milestone in the hospitality industry.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Our Values -->
<div class="container-fluid values-section">
  <div class="container">
    <div class="text-center" style="margin-bottom: 60px;">
      <h2 class="section-title">Our <span style="color: var(--primary-color)">Values</span></h2>
      <div class="section-divider"></div>
      <p style="color: var(--text-secondary); font-size: 1.1em;">The pillars that define the Crown experience.</p>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-6" style="margin-bottom: 30px;">
        <div class="value-card">
          <div class="value-icon"><i class="fa fa-heart"></i></div>
          <h3>Warm Hospitality</h3>
          <p>Our highly motivated and well-trained staff provide exceptionally attentive, personalized, and warm service to every guest.</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6" style="margin-bottom: 30px;">
        <div class="value-card">
          <div class="value-icon"><i class="fa fa-diamond"></i></div>
          <h3>Luxury Experience</h3>
          <p>Every detail is meticulously crafted to deliver an experience that transcends ordinary hospitality into the extraordinary.</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6" style="margin-bottom: 30px;">
        <div class="value-card">
          <div class="value-icon"><i class="fa fa-leaf"></i></div>
          <h3>Sustainability</h3>
          <p>We are committed to environmental responsibility, integrating eco-friendly practices throughout our operations.</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6" style="margin-bottom: 30px;">
        <div class="value-card">
          <div class="value-icon"><i class="fa fa-shield"></i></div>
          <h3>Trust & Safety</h3>
          <p>Your safety and comfort are our top priority, with 24/7 security and world-class safety standards in place.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Our Services Detail -->
<div class="container-fluid services-about">
  <div class="container">
    <div class="text-center" style="margin-bottom: 60px;">
      <h2 class="section-title">World-Class <span style="color: var(--primary-color)">Services</span></h2>
      <div class="section-divider"></div>
      <p style="color: var(--text-secondary); font-size: 1.1em;">Full-service luxury designed around your every need.</p>
    </div>

    <div class="service-row">
      <div class="service-row-img">
        <img src="https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=800&q=80" alt="Restaurant">
      </div>
      <div class="service-row-text">
        <h3><i class="fa fa-cutlery"></i>Fine Dining Restaurant</h3>
        <p>Our on-site restaurants offer an exquisite culinary journey, featuring international cuisines and local Nepalese delicacies prepared by award-winning chefs. Enjoy room service around the clock with dishes crafted from the freshest ingredients.</p>
      </div>
    </div>

    <div class="service-row reverse">
      <div class="service-row-img">
        <img src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?w=800&q=80" alt="Spa">
      </div>
      <div class="service-row-text">
        <h3><i class="fa fa-leaf"></i>Spa & Wellness Center</h3>
        <p>Unwind at our full-service spa offering rejuvenating treatments, aromatherapy, deep tissue massages, and holistic wellness programs. Our fitness center is equipped with state-of-the-art equipment for your workout needs.</p>
      </div>
    </div>

    <div class="service-row">
      <div class="service-row-img">
        <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=800&q=80" alt="Conference">
      </div>
      <div class="service-row-text">
        <h3><i class="fa fa-briefcase"></i>Meeting & Conference</h3>
        <p>Host productive meetings and grand conferences in our fully equipped business center. We offer versatile event spaces, audiovisual technology, and a dedicated events team to ensure your corporate gatherings are flawless.</p>
      </div>
    </div>
  </div>
</div>

<!-- Contact Information Bar -->
<div class="container-fluid contact-bar">
  <div class="container">
    <div class="text-center" style="margin-bottom: 40px;">
      <h2 class="section-title">Get In <span style="color: var(--primary-color)">Touch</span></h2>
      <div class="section-divider"></div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="contact-item">
          <div class="contact-item-icon"><i class="fa fa-map-marker"></i></div>
          <h4>Our Address</h4>
          <p>Hetauda-10, Main Road, Nepal</p>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="contact-item">
          <div class="contact-item-icon"><i class="fa fa-phone"></i></div>
          <h4>Phone</h4>
          <p>+977 057-5020589</p>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="contact-item">
          <div class="contact-item-icon"><i class="fa fa-envelope"></i></div>
          <h4>Email</h4>
          <p>Crownhotel@gmail.com</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Map Section -->
<div class="container-fluid map-section">
  <div class="container">
    <div class="map-wrapper">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14195.02736!2d85.0319!3d27.4167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb5e5e5e5e5e5f%3A0x1234567890abcdef!2sHetauda%2C+Nepal!5e0!3m2!1sen!2snp!4v1700000000000!5m2!1sen!2snp" allowfullscreen></iframe>
    </div>
  </div>
</div>

<?php include('Footer.php'); ?>

<script>
window.addEventListener('load', () => {
  gsap.fromTo('.about-hero', { opacity: 0 }, { opacity: 1, duration: 1, ease: 'power2.out' });
  gsap.fromTo('.about-story-img', { x: -60, opacity: 0 }, { x: 0, opacity: 1, duration: 1.2, ease: 'power3.out', delay: 0.3 });
  gsap.fromTo('.about-story-text', { x: 60, opacity: 0 }, { x: 0, opacity: 1, duration: 1.2, ease: 'power3.out', delay: 0.5 });
  gsap.fromTo('.value-card', { y: 40, opacity: 0 }, { y: 0, opacity: 1, duration: 0.8, stagger: 0.15, ease: 'power3.out', delay: 0.3,
    scrollTrigger: { trigger: '.values-section', start: 'top 80%' }
  });
  gsap.fromTo('.service-row', { y: 50, opacity: 0 }, { y: 0, opacity: 1, duration: 1, stagger: 0.3, ease: 'power3.out',
    scrollTrigger: { trigger: '.services-about', start: 'top 80%' }
  });
  gsap.fromTo('.contact-item', { y: 30, opacity: 0 }, { y: 0, opacity: 1, duration: 0.8, stagger: 0.15, ease: 'power3.out',
    scrollTrigger: { trigger: '.contact-bar', start: 'top 80%' }
  });
});
</script>
</body>
</html>
