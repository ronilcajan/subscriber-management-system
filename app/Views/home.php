<!DOCTYPE html>
<html lang="zxx">

<head>
   <!-- Metas -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />    
    <meta name="description" content="WagaNetwork Solutions" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title  -->
    
    <title><?= $title ?> | Waga Network Solutions</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="home_files/assets/css/bootstrap.min.css" type="text/css">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= site_url() ?>images/logo-transparent.png">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="home_files/assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="home_files/assets/css/icofont.css" type="text/css">
    <link rel="stylesheet" href="home_files/assets/css/themify-icons/themify-icons.css" type="text/css">
    
    <!-- Animate CSS -->
    <link rel="stylesheet" href="home_files/assets/css/animate.min.css" type="text/css">
    <link rel="stylesheet" href="home_files/assets/css/animate.css" type="text/css">
    
    <!-- ClickNav CSS -->
    <link rel="stylesheet" href="home_files/assets/css/slicknav.min.css" type="text/css">
    
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="home_files/assets/css/owl.carousel.css" type="text/css">
    
    <!-- Default CSS -->
    <link rel="stylesheet" href="home_files/assets/css/default.css" type="text/css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="home_files/style.css" type="text/css">
    
    <!-- Responsice CSS -->
    <link rel="stylesheet" href="home_files/assets/css/responsive.css" type="text/css">
</head>
   
<body>
   <div class="ournet-preloader">
       <div class="spinner"></div>
    </div>
       <div id="home"></div>
    <div class="ournet-inter-area">
       <header id="header" class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-3">
                        <div class="logo">
                            <a href="#"><img width="100" src="<?= site_url() ?>images/logo.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-9">
                        <div class="mainmenu">
                            <ul>
                                <li><a class="scroll-animite" href="#home">Home</a></li>
                                <li><a class="scroll-animite" href="#about">About Us</a></li>
                                <li><a class="scroll-animite" href="#service">Services </a></li>
                                <li><a class="scroll-animite" href="#feature">Features</a></li>
                                <li><a class="scroll-animite" href="#pricing">Pricing</a></li>
                                <li><a class="scroll-animite" href="#review">Review</a></li>
                                <li><a class="scroll-animite" href="#contact">Contact</a></li>
                                <li>
                                    <?php if(logged_in()): ?>
                                        <a class="scroll-animite" href="<?= site_url('success-login') ?>">Dashboard</a>
                                    <?php else: ?>
                                        <a class="scroll-animite" href="<?= site_url('login') ?>">Login</a>
                                    <?php endif ?>
                                </li>
                            </ul>
                        </div>
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </header>
    
        <!-- Slider area Start -->
        <div class="slider-area">
            <div class="slider-bg text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slidertext">
                                <h1>Explore over the World  with Ournet</h1>
                                <p>Striving towards an era of unlimited data.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-info">
                    <img class="shape-1" src="home_files/assets/images/sl-1.png" alt="">
                    <img class="shape-2" src="home_files/assets/images/sl-2.png" alt="">
                    <img class="shape-3" src="home_files/assets/images/sl-3.png" alt="">
                    <img class="shape-4" src="home_files/assets/images/sl-4.png" alt="">
                    <img class="shape-5" src="home_files/assets/images/sl-5.png" alt="">
                    <img class="shape-6" src="home_files/assets/images/sl-6.png" alt="">
                    <img class="shape-8" src="home_files/assets/images/sl-7.png" alt="">
                    <img class="shape-7" src="home_files/assets/images/sl-8.png" alt="">
                </div>
            </div>
        </div>
        <div id="about" class="about-area pdt-125px pdb-125px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-text">
                            <h1 class="mb-20px">About Us</h1>
                            <p>Ournet Internet  Communications Ltd is a private broadband internet service 
provider  with 12 years of experience.</p>
                            <p class="mb-30px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodnsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <a href="#" class="ournet-btn">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-bg">
                            <div class="about-bg-main">
                                <img src="home_files/assets/images/about-img.png" alt="">
                            </div>
                            <img class="shape-top-1" src="home_files/assets/images/ab-shape-top-1.png" alt="">
                            <img class="shape-top-2" src="home_files/assets/images/ab-shape-top-2.png" alt="">
                            <img class="shape-bottom" src="home_files/assets/images/shape-bottom-bg.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="service" class="service-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="service-box-area">
                            <img src="home_files/assets/images/1.png" alt="">
                            <div class="overlay-service">
                                <h4>Sole operator on <br> 5G growth path</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-box-area">
                            <img src="home_files/assets/images/2.png" alt="">
                            <div class="overlay-service">
                                <h4>Dedicated Pure-Data <br> provider</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-box-area">
                            <img src="home_files/assets/images/3.png" alt="">
                            <div class="overlay-service">
                                <h4>Triple-play services <br> on the go</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-box-area">
                            <img src="home_files/assets/images/4.png" alt="">
                            <div class="overlay-service">
                                <h4>Capability of providing <br> 100mbs wirelessly</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="feature" class="feature-area pdt-125px">
            <div class="container">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="section-title mb-50px text-center">
                           <span>Features</span>
                           <h1>Why we are Special</h1>
                       </div>
                   </div>
               </div>
                <div class="row">                   
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-item mb-30px">
                            <img src="home_files/assets/images/feature-1.png" alt="">
                            <h4>Unlimited Package</h4>
                            <p>Ournet is a Internet Communications Ltd
is a private broadband internet service provider  with 12 years of experience.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-item mb-30px">
                            <img src="home_files/assets/images/feature-2.png" alt="">
                            <h4>Dedicated IP Server</h4>
                            <p>Ournet is a Internet Communications Ltd
is a private broadband internet service provider  with 12 years of experience.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-item mb-30px">
                            <img src="home_files/assets/images/feature-3.png" alt="">
                            <h4>Fiver Optic Network</h4>
                            <p>Ournet is a Internet Communications Ltd
is a private broadband internet service provider  with 12 years of experience.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-item mb-30px">
                            <img src="home_files/assets/images/feature-1.png" alt="">
                            <h4>Stable Connections</h4>
                            <p>Ournet is a Internet Communications Ltd
is a private broadband internet service provider  with 12 years of experience.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-item mb-30px">
                            <img src="home_files/assets/images/feature-5.png" alt="">
                            <h4>Buffer Free Browsing</h4>
                            <p>Ournet is a Internet Communications Ltd
is a private broadband internet service provider  with 12 years of experience.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-item mb-30px">
                            <img src="home_files/assets/images/feature-6.png" alt="">
                            <h4>24/7 Customer Support</h4>
                            <p>Ournet is a Internet Communications Ltd
is a private broadband internet service provider  with 12 years of experience.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="pricing" class="pricing-table-area pdt-125px pdb-95px">
            <div class="container">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="section-title mb-50px text-center">
                           <span>Pricing</span>
                           <h1>Choose your Package Plan</h1>
                       </div>
                   </div>
               </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="pricing-item text-center mb-30px">
                            <div class="pricing-head">
                                <h4>Cherry</h4>
                                <div class="speed">
                                    <h1>20</h1>
                                    <span>mbps</span>
                                </div>
                            </div>
                            <div class="pricing-content">
                                <ul>
                                    <li>Unlimited Browsing</li> 
                                    <li>12AM- 9PM 70mbps</li>
                                    <li>100 mbps YouTube</li>
                                    <li>100 mbps BDIX Server</li>
                                    <li>Secure Real IP</li>
                                </ul>
                            </div>
                            <div class="pricing-footer">
                                <a href="#" class="ournet-btn">Select Plan</a>
                                <div class="price">
                                    <h1>$29</h1>
                                    <span>Monthly</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="pricing-item text-center mb-30px">
                            <div class="pricing-head">
                                <h4>Peach</h4>
                                <div class="speed">
                                    <h1>30</h1>
                                    <span>mbps</span>
                                </div>
                            </div>
                            <div class="pricing-content">
                                <ul>
                                    <li>Unlimited Browsing</li> 
                                    <li>12AM- 9PM 70mbps</li>
                                    <li>100 mbps YouTube</li>
                                    <li>100 mbps BDIX Server</li>
                                    <li>Secure Real IP</li>
                                </ul>
                            </div>
                            <div class="pricing-footer">
                                <a href="#" class="ournet-btn">Select Plan</a>
                                <div class="price">
                                    <h1>$39</h1>
                                    <span>Monthly</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="pricing-item text-center mb-30px">
                            <div class="pricing-head">
                                <h4>Kiwi</h4>
                                <div class="speed">
                                    <h1>50</h1>
                                    <span>mbps</span>
                                </div>
                            </div>
                            <div class="pricing-content">
                                <ul>
                                    <li>Unlimited Browsing</li> 
                                    <li>12AM- 9PM 70mbps</li>
                                    <li>100 mbps YouTube</li>
                                    <li>100 mbps BDIX Server</li>
                                    <li>Secure Real IP</li>
                                </ul>
                            </div>
                            <div class="pricing-footer">
                                <a href="#" class="ournet-btn">Select Plan</a>
                                <div class="price">
                                    <h1>$49</h1>
                                    <span>Monthly</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-bannertwo pdb-125px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="about-bg-c-two">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="abpi-t">
                                        <h4>We'll help you get back to work</h4>
                                        <p>Banglaournet Communications Ltd is a privately held Bangladeshi 4G wireless broadband operator. It uses WiMAX technology.</p>
                                        <a class="ournet-btn" href="#">Learn More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="about-bg wow fadeInUp animated" data-wow-delay=".2s">
                                <img src="home_files/assets/images/banner-2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="review" class="testimonial-area section-bg pd-125px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="ournet-testimonial-carousel">
                            <div class="testimonial-item text-center">
                                <div class="quate">
                                    <img src="home_files/assets/images/quate.png" alt="">
                                </div>
                                <p>‘’The solution of ournet is very economical.You do not need to buy any special service.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.”</p>
                                <h3>Farnando Toress</h3>
                                <span>Student</span>
                            </div>
                            <div class="testimonial-item text-center">
                                <div class="quate">
                                    <img src="home_files/assets/images/quate.png" alt="">
                                </div>
                                <p>‘’The solution of ournet is very economical.You do not need to buy any special service.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.”</p>
                                <h3>Farnando Toress</h3>
                                <span>Student</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="contact" class="cta-area pd-80px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="cta-info text-center">
                            <h2>Need any help about Pricing, Location or others?
Please feel free to contact us</h2>
                       <a href="#" class="cta-btn">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-area">
           <div class="footer-top">
               <div class="container">
                   <div class="row">
                       <div class="col-lg-3 col-md-6">
                           <div class="footer-widget">
                               <div class="footer-logo">
                                   <a href="#"><img width="100" src="<?= site_url() ?>images/logo.png" alt=""></a>
                               </div>
                               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer</p>
                           </div>
                       </div>
                       <div class="col-lg-2 offset-lg-1 col-md-6">
                           <div class="footer-widget">
                               <h4 class="footer-title">Company</h4>
                               <div class="footer-widget-menu">
                                   <ul>
                                       <li><a href="#">Contact Us</a></li>
                                       <li><a href="#">Customer Service</a></li>
                                       <li><a href="#">Promotions</a></li>
                                       <li><a href="#">Media</a></li>
                                       <li><a href="#">Find Us</a></li>
                                       <li><a href="#">Faq</a></li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-2 offset-lg-1 col-md-6">
                           <div class="footer-widget">
                               <h4 class="footer-title">Support</h4>
                               <div class="footer-widget-menu">
                                   <ul>
                                       <li><a href="#">Contact Us</a></li>
                                       <li><a href="#">Customer Service</a></li>
                                       <li><a href="#">Promotions</a></li>
                                       <li><a href="#">Media</a></li>
                                       <li><a href="#">Find Us</a></li>
                                       <li><a href="#">Faq</a></li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-2 offset-lg-1 col-md-6">
                           <div class="footer-widget">
                               <h4 class="footer-title">Address</h4>
                              <div class="contact-info">
                                  <ul>
                                      <li>28 Division St, New York, NY 10002, USA</li>
                                      <li>Email: ournet@mail.Com</li>
                                      <li>Phone: + (321) 984 754</li>
                                  </ul>
                              </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="footer-copyright">
               <div class="container">
                   <div class="row">
                       <div class="col-md-6">
                            <div class="footer-copyright-item">
                                <p>Copyright &copy; 2019 Ournet. Design & Developed By itcroc.</p>
                            </div>
                       </div>
                       <div class="col-md-6">
                            <div class="social text-right">
                                 <a href="#"><i class="ti-facebook"></i></a>
                                 <a href="#"><i class="ti-instagram"></i></a>
                                 <a href="#"><i class="ti-linkedin"></i></a>
                             </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>   
    <!-- jQuery -->
    <script src="home_files/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="home_files/assets/js/vendor/jquery-1.12.4.min.js"></script>
    
    <!-- popper min js -->
    <script src="home_files/assets/js/popper.min.js"></script>
    
    <!-- bootstrap js -->
    <script src="home_files/assets/js/bootstrap.min.js"></script>
    
    <!-- bootstrap js -->
    <script src="home_files/assets/js/jquery.slicknav.min.js"></script>
    
    <!-- owl Carousel js -->
    <script src="home_files/assets/js/owl.carousel.min.js"></script>
    
    <!-- magnific-popup js -->
    <script src="home_files/assets/js/wow.js"></script>
    
    <!-- Main js -->
    <script src="home_files/assets/js/active.js"></script>
</body>

</html>