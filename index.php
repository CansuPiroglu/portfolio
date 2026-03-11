<?php

$sira = 1;

try {

    $baglanti = new PDO("mysql:host=localhost;dbname=cansu", "root", "");
    $baglanti->exec("SET NAMES utf8");
    $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sorgu = $baglanti->prepare("SELECT * FROM setting WHERE id = ?");
    $sorgu->bindParam(1, $sira, PDO::PARAM_INT);
    $sorgu->execute();

    $cikti = $sorgu->fetch(PDO::FETCH_ASSOC);
   
    $hizmet_sorgu = $baglanti->query("SELECT * FROM services");
    $hizmet = $hizmet_sorgu->fetchAll(PDO::FETCH_ASSOC);
    


    #echo "Adı: " . $cikti["name"] . "<br /> Soyadı: " . $cikti["surname"] . "<br /> E-posta: " . $cikti["email"] . "<br /> Deneyim: " . $cikti["experience_year"] ." Yıl";


} catch (PDOException $e) {
    die($e->getMessage());
}

$baglanti = null;

?>
<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Vfolio- Personal Portfolio HTML Template </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="fontawesome/css/all.min.css">
        <link rel="stylesheet" href="css/dripicons.css">
        <link rel="stylesheet" href="css/slick.css">
        <link rel="stylesheet" href="css/meanmenu.css">
        <link rel="stylesheet" href="css/default.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body>
        <!-- Cursor -->
        <div class="cursor js-cursor"></div>
         <!-- header -->
        <header class="header-area header-three">  
			  <div id="header-sticky" class="menu-area">
                <div class="container-fluid">
                    <div class="second-menu">
                        <div class="row align-items-center">
                        <div class="col-lg-1 col-md-12">
                            <div class="logo">
                                <a href="index.html"><img src="img/logo/logo.png" alt="logo"></a>
                            </div>
                        </div>
                           <div class="col-xl-8 col-lg-8 text-center">
                              
                                <div class="main-menu">
                                    <nav id="mobile-menu">
                                        <ul>
                                             <li class="has-sub">
                                                <a href="index.html#home">Home</a>
                                                 
                                            </li>
                                            <li><a href="#video">About me</a></li>
                                            <li class="has-sub"> 
                                              <a href="#services">Services</a>
                                            </li>
                                            <li><a href="#portfolio">Portfolio</a></li>
                                            <li class="has-sub"><a href="#">Other Pages</a>
												<ul>
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog-details.html">Blog Deatils </a></li>
                                                    <li><a href="projects-details.html">Protfolio Deatils</a></li>
                                                    <li><a href="#testimonial">Testimonial</a></li>
                                                    <li><a href="#awards">Awards</a></li>
                                                  </ul>
											</li>
                                            <li><a href="#contact">Contact</a></li>                                                  
                                        </ul>
                                    </nav>
                                </div>
                            </div>  
                            <div class="col-xl-3 col-lg-3 text-right d-none d-lg-block">
                           <div class="header-social">
                                <span>
                                    <a href="#" title="Facebook"><i class="fab fa-behance"></i>  Behance</a>
                                    <a href="#" title="LinkedIn"><i class="fab fa-dribbble"></i> Dribbble</a>   
                                   </span>                    
                                   <!--  /social media icon redux -->                               
                            </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="mobile-menu"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-end -->
        <!-- main-area -->
        <main>
           <!-- slider-area -->
            <section id="parallax" class="slider-area pt-120 fix p-relative">
                 <div class="slider-shape ss-one layer" data-delay=".15s" data-depth="0.10"><img src="img/bg/slider_shape01.png" alt="shape"></div>
                <div class="slider-shape ss-three layer" data-depth="0.40"><img src="img/bg/slider_shape03.png" alt="shape"></div>
                <div class="slider-active">
				<div class="single-slider slider-bg d-flex align-items-center"  style="background-image: url('img/slider/bg-main.png'); background-color: #fff; ">
                        <div class="container">
                           <div class="row justify-content-center align-items-center">
                              
                                <div class="col-lg-7 col-md-7">
                                    <div class="slider-content s-slider-content mt-100 p-relative">
                                        <h5 data-animation="fadeInUp" data-delay=".3s"><span><img src="img/bg/cube.png" alt="icon01"></span> <?php echo $cikti["title"]; ?></h5>
                                         <h2 data-animation="fadeInUp" data-delay=".6s">Selam Ben <br><?php echo $cikti["name"]; ?></h2>
                                          <div class="slider-btn mb-105">     
                                            <a href="#contact" class="btn ss-btn mr-15" data-animation="fadeInUp" data-delay=".9s">Download CV </a>
                                        </div>        
                                                              
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 p-relative">
                                   <div class="img-main" data-animation="fadeInRight" data-delay=".3s"> <img src="<?php echo $cikti["profile_image"]; ?>" alt="slider-overlay"></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    </div>
                    
               
            </section>
            <!-- slider-area-end -->           
             <!-- services-three-area -->
            <section id="services" class="services-area services-bg  p-relative fix pt-120 pb-90" style="background:#1a1d88; ">
                <div class="container">
                        

                    <div class="row">                        
                            <div class="col-lg-4 col-md-6">
                                 <div class="s-single-services text-center mb-30 wow fadeInUp  animated" data-animation="fadeInUp" data-delay=".2s">
                                    <div class="services-icon mb-30">
                                     <img src="<?php echo $hizmet[0]["ikon"]; ?>" alt="img">
                                    </div>
                                    <div class="second-services-content">
                                        <h3><a href="single-service.html"><?php echo $hizmet[0]["baslik"]; ?></a></h3>
                                        <p><?php echo $hizmet[0]["icerik"]; ?></p>
                                        <a href="single-service.html" class="readmore">Read More</a>
                                    </div>
                                </div>
                            </div>
                               <div class="col-lg-4 col-md-6">
                               <div class="s-single-services text-center active mb-30 wow fadeInUp  animated" data-animation="fadeInUp" data-delay=".4s">
                                    <div class="services-icon mb-30">
                                     <img src="<?php echo $hizmet[1]["ikon"]; ?>" alt="img">
                                    </div>
                                    <div class="second-services-content">
                                       <h3><a href="single-service.html"><?php echo $hizmet[1]["baslik"]; ?></a></h3>
                                        <p><?php echo $hizmet[1]["icerik"]; ?></p>
                                        <a href="single-service.html" class="readmore">Read More</a>
                                    </div>
                                </div>
                            </div>
                              <div class="col-lg-4 col-md-6">
                                <div class="s-single-services text-center mb-30 wow fadeInUp  animated" data-animation="fadeInUp" data-delay=".6s">
                                    <div class="services-icon mb-30">
                                      <img src="<?php echo $hizmet[2]["ikon"]; ?>" alt="img">
                                    </div>
                                    <div class="second-services-content">
                                       <h3><a href="single-service.html"><?php echo $hizmet[2]["baslik"]; ?></a></h3>
                                        <p><?php echo $hizmet[2]["icerik"]; ?></p>
                                        <a href="single-service.html" class="readmore">Read More</a>
                                    </div>
                                </div>
                            </div>                       
                        </div>
                                                    
                    </div> 
                </div>
            </section>
           <!-- services-three-area -->
              <!-- gallery-area -->
            <section id="portfolio" class="pt-120 pb-110 fix" style="background: #fff;">
                <div class="container">                  
					<div class="portfolio ">
                        <div class="row align-items-center">
                             <div class="col-lg-6 col-md-12">
                                <div class="section-title p-relative mb-50 wow fadeInLeft  animated" data-animation="fadeInLeft" data-delay=".4s">
                                 <h5><span><img src="img/bg/cube.png" alt="icon01"></span> Portfolio</h5>
                                <h2>
                                    Recent Works
                                </h2>
                                <p>Above creature the rule blessed brought. Multiply they're one. Gathering own waters beast blessed.</p>
                            </div>
                            </div>
                            <div class="col-lg-6 col-md-6 text-right">
                             
                            </div>
                        </div>
                        <div class="home-blog-active wow fadeInUp  animated" data-animation="fadeInUp" data-delay=".4s">
                            <div class="grid-item financial">
                                <a href="projects-details.html">
                                <figure class="gallery-image">                            
                                  <img src="img/gallery/protfolio-img01.jpg" alt="img" class="img"> 
                                     <figcaption>
                                        <span>Design, App</span>
                                        <h4>Helix iOs App Design</h4>
                                    </figcaption>
                                </figure>
                              </a>
                            </div>
                            <div class="grid-item financial banking">
                               <a href="projects-details.html">
                                    <figure class="gallery-image">                            
                                     <img src="img/gallery/protfolio-img02.jpg" alt="img" class="img">      
                                      <figcaption>
                                        <span>Website, Dashboard</span>
                                        <h4>Jikson Big Dashboard</h4>
                                    </figcaption>
                                    </figure>
                                  </a>
                            </div>
                             <div class="grid-item insurance">
                                   <a href="projects-details.html">
                                    <figure class="gallery-image">                               
                                       <img src="img/gallery/protfolio-img03.jpg" alt="img" class="img">      
                                         <figcaption>
                                          <span>UI, UX, iOs</span>
                                        <h4>Maono UX Service</h4>
                                        </figcaption>
                                    </figure>
                                  </a>
                            </div>
                             <div class="grid-item financial">
                                <a href="projects-details.html">
                                <figure class="gallery-image">                            
                                  <img src="img/gallery/protfolio-img01.jpg" alt="img" class="img"> 
                                     <figcaption>
                                        <span>Design, App</span>
                                        <h4>Helix iOs App Design</h4>
                                    </figcaption>
                                </figure>
                              </a>
                            </div>
                            <div class="grid-item financial banking">
                                <a href="projects-details.html">
                                    <figure class="gallery-image">                            
                                     <img src="img/gallery/protfolio-img02.jpg" alt="img" class="img">      
                                      <figcaption>
                                        <span>Website, Dashboard</span>
                                        <h4>Jikson Big Dashboard</h4>
                                    </figcaption>
                                    </figure>
                                  </a>
                            </div>
                             <div class="grid-item insurance">
                                    <a href="projects-details.html">
                                    <figure class="gallery-image">                               
                                       <img src="img/gallery/protfolio-img03.jpg" alt="img" class="img">      
                                         <figcaption>
                                          <span>UI, UX, iOs</span>
                                        <h4>Maono UX Service</h4>
                                        </figcaption>
                                    </figure>
                                  </a>
                            </div>
                      </div>
                    </div>
                </div>
            </section>
            <!-- gallery-area-end -->
            <!-- counter-area -->
            <div class="counter-area p-relative pt-60 pb-60 fix" style="background-color: #f1f4f6; ">
                <div class="container">
               
                    <div class="row p-relative">
                         <div class="col-lg-3 col-md-6 col-sm-12">
                             <div class="single-counter wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                                <div class="counter p-relative">
                                     <div class="img-icon"><img src="img/bg/cube.png" alt="icon01"></div>                                      
                                    <span class="count">120</span>                               
                                    <p>Active Projects</p>
                                    <div class="number">01</div>
                                </div>
                               
                            </div>
                        </div>
                      <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="single-counter wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                                <div class="counter p-relative">
                                    <div class="img-icon"><img src="img/bg/cube.png" alt="icon01"></div>                                      
                                    <span class="count">5</span>   <span>K</span>                          
                                    <p>Project Already Done</p>
                                    <div class="number">02</div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="single-counter wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                                  <div class="counter p-relative">
                                     <div class="img-icon"><img src="img/bg/cube.png" alt="icon01"></div>                                      
                                    <span class="count">1</span>    <span>M</span>                                   
                                    <p>Multi-Platform Followers</p>
                                      <div class="number">03</div>
                                </div>
                              
                            </div>
                        </div>
                         <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="single-counter wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                                <div class="counter p-relative">
                                    <div class="img-icon"><img src="img/bg/cube.png" alt="icon01"></div>                                      
                                    <span class="count">100</span>                             
                                    <p>Country Touched</p>
                                    <div class="number">04</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- counter-area-end -->	
             <!-- testimonial-area -->
            <section id="testimonial" class="testimonial-area pt-120 pb-115 p-relative fix">
                  <div class="animations-01"><img src="img/bg/an-img-03.png" alt="an-img-01"></div>
                <div class="animations-02"><img src="img/bg/an-img-04.png" alt="contact-bg-an-01"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title text-center mb-35 wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                                <h5>client feedback</h5>
                                <h2>
                                Trusted By Clients
                                </h2>
                             
                            </div>
                           
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="testimonial-active wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                                <div class="single-testimonial text-center">
                                    <div class="testi-author">
                                        <img src="img/testimonial/testi_avatar.png" alt="img">
                                    </div>
                                    <p>“ I’d love to meet up with you to discuss your venture & collaboration. ”</p>
                                    <div class="ta-info">
                                            <h6>Miranda H. Halimson</h6>
                                            <span>Founder Of Miranda Ltd.</span>
                                        </div>                                    
                                </div>
                                <div class="single-testimonial text-center">
                                     <div class="testi-author">
                                        <img src="img/testimonial/testi_avatar_02.png" alt="img">
                                    </div>
                                    <p>“ I’d love to meet up with you to discuss your venture & collaboration. ”</p>
                                    <div class="ta-info">
                                            <h6>Rosalina D. William</h6>
                                            <span>CEO Of Rosalia Co.</span>
                                        </div>                                    
                                </div>
                              <div class="single-testimonial text-center">
                                     <div class="testi-author">
                                        <img src="img/testimonial/testi_avatar_03.png" alt="img">
                                    </div>
                                   <p>“ I’d love to meet up with you to discuss your venture & collaboration. ”</p>
                                   
                                    <div class="ta-info">
                                            <h6>Alexis A. Alvon</h6>
                                            <span>CEO Of Alvon Co</span>
                                        </div>                                    
                                </div>
                                <div class="single-testimonial text-center">
                                    <div class="testi-author">
                                        <img src="img/testimonial/testi_avatar.png" alt="img">
                                    </div>
                                     <p>“ I’d love to meet up with you to discuss your venture & collaboration. ”</p>
                                    
                                    <div class="ta-info">
                                            <h6>Margie Dose</h6>
                                            <span>Web Developer</span>
                                        </div>                                    
                                </div>
                               <div class="single-testimonial text-center">
                                   <div class="testi-author">
                                        <img src="img/testimonial/testi_avatar_02.png" alt="img">
                                    </div>
                                     <p>“ I’d love to meet up with you to discuss your venture & collaboration. ”</p>                                    
                                    <div class="ta-info">
                                            <h6>Rock Dloder</h6>
                                            <span>Web Developer</span>
                                        </div>                                    
                                </div>
                                <div class="single-testimonial text-center">
                                    <div class="testi-author">
                                        <img src="img/testimonial/testi_avatar.png" alt="img">
                                    </div>
                                    <p>“ I’d love to meet up with you to discuss your venture & collaboration. ”</p>
                                    <div class="ta-info">
                                            <h6>Miranda H. Halimson</h6>
                                            <span>Founder Of Miranda Ltd.</span>
                                        </div>                                    
                                </div>
                                <div class="single-testimonial text-center">
                                     <div class="testi-author">
                                        <img src="img/testimonial/testi_avatar_02.png" alt="img">
                                    </div>
                                    <p>“ I’d love to meet up with you to discuss your venture & collaboration. ”</p>
                                    <div class="ta-info">
                                            <h6>Rosalina D. William</h6>
                                            <span>CEO Of Rosalia Co.</span>
                                        </div>                                    
                                </div>
                              <div class="single-testimonial text-center">
                                     <div class="testi-author">
                                        <img src="img/testimonial/testi_avatar_03.png" alt="img">
                                    </div>
                                   <p>“ I’d love to meet up with you to discuss your venture & collaboration. ”</p>
                                   
                                    <div class="ta-info">
                                            <h6>Alexis A. Alvon</h6>
                                            <span>CEO Of Alvon Co</span>
                                        </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonial-area-end -->
            <!-- brand-area -->
            <section class="brand-area pt-120 pb-120" style="background-image: url('img/bg/client-bg.png'); background-position: center top;">
                <div class="container">
                    <div class="row justify-content-center">
                       <div class="col-lg-5">
                            <div class="section-title text-center mb-50 wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                                 <h5><img src="img/brand/clinet-logo.png" alt="img"></h5>
                                <h2>
                                    1M Happy Users Around From World
                                </h2>

                            </div>
                        </div>
                        
                    </div>
                    <div class="row brand-active">
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="img/brand/b-logo-w-1.png" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                 <img src="img/brand/b-logo-w-2.png" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                 <img src="img/brand/b-logo-w-3.png" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                  <img src="img/brand/b-logo-w-4.png" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                 <img src="img/brand/b-logo-w-5.png" alt="img">
                            </div>
                        </div>
                    </div>
                     <div class="row brand-text">
                          <div class="col-lg-12">
                              Be Our Next Client. <a href="#">Get In Touch</a>
                         </div>
                    </div>
                </div>
            </section>
            <!-- brand-area-end -->
              <!-- video-area -->
            <section id="video" class="video-area pt-120 pb-120 p-relative fix">
                 <div class="animations-01"><img src="img/bg/an-img-05.png" alt="an-img-01"></div>
               
                <div class="container">                
                    
                      <div class="row  home-blog-active2">      
                          <div class="col-lg-12">
                            <div class="row justify-content-center align-items-center">
                               <div class="col-lg-6">
                            <div class="video-content wow fadeInRight  animated" data-animation="fadeInRight" data-delay=".4s">
                                <div class="section-title pb-25">  
                                    <h5><span><img src="img/bg/cube.png" alt="icon01"></span> read story</h5>
                                    <h2>Logo, Identity & Website    For Boomerang LLC.</h2>                                   
                                </div>
                                   <p>“ I use animation as a third dimension by which to simplify experiences and kuiding thro each and every interaction. I’m not adding motion just to spruce. ”</p>
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-lg-6">
                                            <div class="about-user">
                                                <div class="img"><img src="img/features/user-about.png" alt="img"></div>
                                                <div class="text">
                                                    <span>Head Of Idea</span>
                                                    <h5>Miranda H. Halim</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 text-right">
                                            <img src="img/features/user-logo.png" alt="img">
                                        </div>
                                    </div>
                                <div class="row justify-content-center align-items-center mt-30 bdr">
                                        <div class="col-lg-8 pt-30">
                                            <div class="rised">
                                                <ul>
                                                    <li><span>ROI Reached</span><h3>80%</h3></li>
                                                    <li><span>Rised</span><h3>$500k</h3></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 text-right pt-30">
                                             <a href="#skill" class="btn ss-btn smoth-scroll">Get Started <i class="fal fa-long-arrow-right"></i></a>			
                                        </div>
                                    </div>
                            </div>
                        </div>
                          <div class="col-lg-6">
                            <div class="s-video-wrap pl-60">
                                <div class="video-img">
                                     <img src="img/bg/vedio-img2.png" alt="img">
                                </div>
                                <div class="s-video-content">
                                    <a href="https://www.youtube.com/watch?v=7e90gBu4pas" class="popup-video mb-50"><img src="img/bg/play-button.png" alt="circle_right"></a>
                                   
                                </div>
                            </div>
                            
                        </div>
                              
                            </div>
                          </div>
                        <div class="col-lg-12">
                           <div class="row justify-content-center align-items-center">
                               <div class="col-lg-6">
                            <div class="video-content wow fadeInRight  animated" data-animation="fadeInRight" data-delay=".4s">
                                <div class="section-title pb-25">  
                                    <h5><span><img src="img/bg/cube.png" alt="icon01"></span> read story</h5>
                                    <h2>Logo, Identity & Website    For Boomerang LLC.</h2>                                   
                                </div>
                                   <p>“ I use animation as a third dimension by which to simplify experiences and kuiding thro each and every interaction. I’m not adding motion just to spruce. ”</p>
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-lg-6">
                                            <div class="about-user">
                                                <div class="img"><img src="img/features/user-about.png" alt="img"></div>
                                                <div class="text">
                                                    <span>Head Of Idea</span>
                                                    <h5>Miranda H. Halim</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 text-right">
                                            <img src="img/features/user-logo.png" alt="img">
                                        </div>
                                    </div>
                                <div class="row justify-content-center align-items-center mt-30 bdr">
                                        <div class="col-lg-8 pt-30">
                                            <div class="rised">
                                                <ul>
                                                    <li><span>ROI Reached</span><h3>80%</h3></li>
                                                    <li><span>Rised</span><h3>$500k</h3></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 text-right pt-30">
                                             <a href="#skill" class="btn ss-btn smoth-scroll">Get Started <i class="fal fa-long-arrow-right"></i></a>			
                                        </div>
                                    </div>
                            </div>
                        </div>
                          <div class="col-lg-6">
                            <div class="s-video-wrap pl-60">
                                <div class="video-img">
                                     <img src="img/bg/vedio-img.png" alt="img">
                                </div>
                                <div class="s-video-content">
                                    <a href="https://www.youtube.com/watch?v=7e90gBu4pas" class="popup-video mb-50"><img src="img/bg/play-button.png" alt="circle_right"></a>
                                   
                                </div>
                            </div>
                            
                        </div>
                              
                            </div>
                          </div>
                    </div>
                </div>
            </section>
            <!-- video-area-end -->
            <!-- awards-area -->
            <section id="awards" class="awards-area after-none contact-bg pt-120 pb-120 p-relative fix" style="background: #f1f4f6;">
                  <div class="animations-03"><img src="img/bg/an-img-06.png" alt="an-img-01"></div>
                <div class="animations-02"><img src="img/bg/an-img-07.png" alt="contact-bg-an-01"></div>
                <div class="container">
             
					<div class="row">
						
                         <div class="col-lg-12">
                            <div class="section-title text-center mb-50 wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                                <h5>awards</h5>
                                <h2>
                                    Get Rewards
                                </h2>
                             
                            </div>
                           
                        </div>
                        <div class="col-lg-12">
                            <div class='awards-box p-relative hover-zoomin'>
                               <div class="row justify-content-center align-items-center">
                                    <div class="col-lg-9">
                                        <span>Best Designer Award</span>
                                        <h3>Visualisation & Conceptual Art </h3>   
                                    </div>
                                    <div class="col-lg-3 text-right">
                                       <span class="sine">2022</span> 
                                    </div>
                                </div>
                                
                               <div class="layer img-hover" data-depth="0.10"><img src="img/bg/awads-img01.png" alt="shape"></div>
                           </div>
                             <div class='awards-box p-relative hover-zoomin'>
                               <div class="row justify-content-center align-items-center">
                                    <div class="col-lg-9">
                                        <span>ADM Awards</span>
                                        <h3>Pantone H&D Saatchi Group AWG</h3>   
                                    </div>
                                    <div class="col-lg-3 text-right">
                                       <span class="sine">2023</span> 
                                    </div>
                                </div>
                                
                               <div class="layer img-hover" data-depth="0.10"><img src="img/bg/awads-img02.png" alt="shape"></div>
                           </div>
                             <div class='awards-box p-relative hover-zoomin'>
                               <div class="row justify-content-center align-items-center">
                                    <div class="col-lg-9">
                                        <span>CSS Design Awards</span>
                                        <h3>The Journey of One Project</h3>   
                                    </div>
                                    <div class="col-lg-3 text-right">
                                       <span class="sine">2020</span> 
                                    </div>
                                </div>
                                
                               <div class="layer img-hover" data-depth="0.10"><img src="img/bg/awads-img03.png" alt="shape"></div>
                           </div>
                             <div class='awards-box p-relative hover-zoomin'>
                               <div class="row justify-content-center align-items-center">
                                    <div class="col-lg-9">
                                        <span>Infinity Designer Award</span>
                                        <h3>Festival of Digital Culture 2020 </h3>   
                                    </div>
                                    <div class="col-lg-3 text-right">
                                       <span class="sine">2020</span> 
                                    </div>
                                </div>
                                
                               <div class="layer img-hover" data-depth="0.10"><img src="img/bg/awads-img04.png" alt="shape"></div>
                           </div>
                            
                        </div>
					</div>
                    
                </div>
               
            </section>
            <!-- awards-area-end -->
           <!-- video-area -->
            <section class="cta-area cta-bg pt-160" style="background-image:url(img/bg/cta_bg.png)">
                <div class="container">
                    <div class="row justify-content-center text-center align-items-center">
					   <div class="col-lg-12">
                              <a href="https://www.youtube.com/watch?v=gyGsPlt06bo" class="popup-video mb-50"><img src="img/bg/play-button.png" alt="circle_right"></a>
                               
                        </div>
                    </div>
                </div>
            </section>
            <!-- video-area-end -->	
            <!-- contact-area -->
            <section id="contact" class="contact-area after-none contact-bg pb-120 p-relative fix">
                  <div class="animations-01"><img src="img/bg/an-img-08.png" alt="an-img-01"></div>
                <div class="container">
             
					<div class="row">
						
                         <div class="col-lg-7 col-md-12 order-1">
                            <div class="section-title p-relative mb-50 pl-60 wow fadeInLeft  animated" data-animation="fadeInLeft" data-delay=".4s">
                                 <h5><span><img src="img/bg/cube.png" alt="icon01"></span> get in touch</h5>
                                <h2>
                                 Feel Free To Ask Anything
                                </h2>
                                <p>Above creature the rule blessed brought. Multiply they're one. Gathering own waters beast blessed.</p>
                            </div>
                             
                            <div class="contact-info pl-60">
                                  <div class="single-cta pb-30 mb-30 wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                                     <p>251 Purple Sunset Avenue Brooklyn, BXY 92101 mewsi@example.com</p>
                                    </div>
                                     <div class="single-cta pb-30 mb-30 wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                                        <p>251 Purple Sunset Avenue Brooklyn, BXY 92101 mewsi@example.com</p>
                                    </div>
                                  
                                </div>	
                        </div>
                         <div class="col-lg-5 col-md-12 order-2">
                            <div class="contact-bg">      
                                <form action="mail.php" method="post" class="contact-form">
                                    <div class="row">
                                    <div class="col-lg-6">
                                        <div class="contact-field p-relative c-name mb-20">    
                                            <i class="fas fa-user"></i>
                                            <input type="text" id="firstn" name="firstn" placeholder="First Name" required>
                                        </div>                               
                                    </div>

                                    <div class="col-lg-6">                               
                                        <div class="contact-field p-relative c-subject mb-20">     
                                            <i class="fas fa-envelope-open"></i>
                                            <input type="text" id="email" name="email" placeholder="Eamil" required>
                                        </div>
                                    </div>		
                                    <div class="col-lg-6">                               
                                        <div class="contact-field p-relative c-subject mb-20">          
                                            <i class="fas fa-book"></i>
                                            <input type="text" id="subject" name="subject" placeholder="Subject">
                                        </div>
                                    </div>	
                                         <div class="col-lg-6">                               
                                        <div class="contact-field p-relative c-option mb-20">                                   
                                            <i class="fas fa-dollar-sign"></i>
                                               <select name="room" id="rm">
                                                  <option value="sports-massage"> Budget</option>
                                                  <option value="1">$100</option>
                                                    <option value="2">$200</option>
                                                    <option value="3">$300</option>
                                                    <option value="4">$400</option>
                                                    <option value="5">$500</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="contact-field p-relative c-message mb-30">      
                                            <i class="fas fa-pencil"></i>
                                            <textarea name="message" id="message" cols="30" rows="10" placeholder="Write comments"></textarea>
                                        </div>
                                        <div class="slider-btn">                                          
                                                    <button class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s">Submit Request</button>				
                                                </div>                             
                                    </div>
                                    </div>
                            </form>                            
                            </div>    
                        
						</div>
					</div>
                    
                </div>
               
            </section>
            <!-- contact-area-end -->
           
        </main>
        <!-- main-area-end -->

        <!-- footer -->
        <footer class="footer-bg footer-p">
            <div class="footer-top p-relative fix">
               
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-xl-6 col-lg-6 col-sm-12 text-center">
                               <div class="section-title p-relative mb-50 wow fadeInUp  animated" data-animation="fadeInUp" data-delay=".4s">
                                 <div class="f-logo">
                                      <img src="img/logo/logo.png" alt="img">
                                </div>
                                <p>“ I use animation as a third dimension by which to simplify experiences and kuiding thro each and every interaction. I’m not adding motion just to spruce. ”</p>
                            </div>
                             <div class="footer-social mt-10 mb-120 wow fadeInDown  animated" data-animation="fadeInDown" data-delay=".4s"> 
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </div>    
                           
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row align-items-center">                       
                        <div class="col-lg-6">
                          <div class="copy-text">
                                 Copyright © Zcube 2023 . All rights reserved.       
                            </div>
                        </div>                       
                       <div class="col-lg-6 text-right text-xl-right">
                           <ul>
                               <li><a href="#">Careers</a></li>
                               <li><a href="#">Refund Policy</a></li>
                               <li><a href="#">Insights</a></li>
                           </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-end -->

		<!-- JS here -->
        <script src="js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="js/vendor/jquery-3.6.4.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/ajax-form.js"></script>
        <script src="js/paroller.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/js_isotope.pkgd.min.js"></script>
        <script src="js/imagesloaded.min.js"></script>
        <script src="js/parallax.min.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/jquery.meanmenu.min.js"></script>
        <script src="js/parallax-scroll.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/element-in-view.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>