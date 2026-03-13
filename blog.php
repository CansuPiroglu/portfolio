<?php

$sira1 = 1;

try {

    $baglanti = new PDO("mysql:host=localhost;dbname=cansu", "root", "");
    $baglanti->exec("SET NAMES utf8");
    $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sorgu1 = $baglanti->prepare("SELECT * FROM setting WHERE id = ?");
    $sorgu1->bindParam(1, $sira1, PDO::PARAM_INT);
    $sorgu1->execute();

    $cikti1 = $sorgu1->fetch(PDO::FETCH_ASSOC);

    $sorgu2 = $baglanti->prepare("SELECT * FROM posts WHERE id = ?");
    $sorgu2->bindParam(1, $sira1, PDO::PARAM_INT);
    $sorgu2->execute();

    $cikti2 = $sorgu2->fetch(PDO::FETCH_ASSOC);

    #echo "Adı: " . $cikti1["name"] . "<br /> Soyadı: " . $cikti1["surname"] . "<br /> E-posta: " . $cikti1["email"] . "<br /> Deneyim: " . $cikti1["experience_year"] ." Yıl";


                // Tüm yazıları kategori bilgileriyle birlikte çek
            $sorgu = $baglanti->query("
                SELECT 
                    posts.id,
                    posts.title,
                    posts.content,
                    posts.status,
                    posts.created_at,
                    subcategories.name AS alt_kategori,
                    categories.name AS ana_kategori
                FROM posts
                INNER JOIN subcategories ON posts.subcategory_id = subcategories.id
                INNER JOIN categories ON subcategories.category_id = categories.id
                WHERE posts.status = 'active'
            ");
            $yazilar = $sorgu->fetchAll(PDO::FETCH_ASSOC);

            // Sidebar için kategoriler
            $kategori_sorgu = $baglanti->query("SELECT * FROM categories");
            $kategoriler = $kategori_sorgu->fetchAll(PDO::FETCH_ASSOC);

            // Sidebar için son yazılar
            $son_yazilar_sorgu = $baglanti->query("
                SELECT posts.id, posts.title, posts.created_at 
                FROM posts 
                WHERE status = 'active' 
                ORDER BY id DESC 
                LIMIT 5
            ");
            $son_yazilar = $son_yazilar_sorgu->fetchAll(PDO::FETCH_ASSOC);



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
            <!-- breadcrumb-area -->
            <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrc-bg.png);">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="breadcrumb-wrap text-center">
                                <div class="breadcrumb-title">
                                    <h2>Blog</h2>    
                                    <div class="breadcrumb-wrap">
                              
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                                    </ol>
                                </nav>
                            </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->
             <!-- inner-blog -->
            <section class="inner-blog pt-120" style="background-color: #fff;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            
                            <?php foreach($yazilar as $yazi): ?>
                                <div class="bsingle__post mb-50">
                                    <div class="bsingle__content">
                                        <div class="meta-info">
                                            <ul>
                                                <li><i class="fal fa-user"></i>By Cansu</li>
                                                <li><i class="fal fa-tag"></i><?php echo $yazi['ana_kategori']; ?> > <?php echo $yazi['alt_kategori']; ?></li>
                                            </ul>
                                        </div>
                                        <h2><?php echo $yazi['title']; ?></h2>
                                        <p><?php echo substr($yazi['content'], 0, 150); ?></p>
                                        <div class="blog__btn">
                                            <a href="#" class="btn">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
              
                            <div class="pagination-wrap mb-50">
                                <nav>
                                    <ul class="pagination">
                                        <li class="page-item"><a href="#"><i class="fas fa-angle-double-left"></i></a></li>
                                        <li class="page-item active"><a href="#">1</a></li>
                                        <li class="page-item"><a href="#">2</a></li>
                                        <li class="page-item"><a href="#">3</a></li>
                                        <li class="page-item"><a href="#">...</a></li>
                                        <li class="page-item"><a href="#">10</a></li>
                                        <li class="page-item"><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                         <div class="col-sm-12 col-md-12 col-lg-4">
                           <aside class="sidebar-widget">
                              <section id="search-3" class="widget widget_search">
                                 <h2 class="widget-title">Search</h2>
                                 <form role="search" method="get" class="search-form" action="http://wordpress.zcube.in/finco/">
                                    <label>
                                    <span class="screen-reader-text">Search for:</span>
                                    <input type="search" class="search-field" placeholder="Search &hellip;" value="" name="s" />
                                    </label>
                                    <input type="submit" class="search-submit" value="Search" />
                                 </form>
                              </section>
                              <section id="custom_html-5" class="widget_text widget widget_custom_html">
                                 <h2 class="widget-title">Follow Us</h2>
                                 <div class="textwidget custom-html-widget">
                                    <div class="widget-social">
                                       <a href="#"><i class="fab fa-twitter"></i></a>
                                       <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                       <a href="#"><i class="fab fa-facebook-f"></i></a>
                                       <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                       <a href="#"><i class="fab fa-wordpress"></i></a>
                                    </div>
                                 </div>
                              </section>

                              <section id="categories-1" class="widget widget_categories">
                                <h2 class="widget-title">Categories</h2>
                                <ul>
                                    <?php foreach($kategoriler as $k): ?>
                                    <li class="cat-item"><a href="#"><?php echo $k['name']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                              </section>

                              <section id="recent-posts-4" class="widget widget_recent_entries">
                                <h2 class="widget-title">Recent Posts</h2>
                                <ul>
                                    <?php foreach($son_yazilar as $s): ?>
                                    <li>
                                        <a href="#"><?php echo $s['title']; ?></a>
                                        <span class="post-date"><?php echo date('d M Y', strtotime($s['created_at'])); ?></span>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                              </section>

                              <section id="tag_cloud-1" class="widget widget_tag_cloud">
                                 <h2 class="widget-title">Tag</h2>
                                 <div class="tagcloud">
                                     <a href="#" class="tag-cloud-link tag-link-28 tag-link-position-1" style="font-size: 8pt;" aria-label="app (1 item)">app</a>
                                    <a href="#" class="tag-cloud-link tag-link-17 tag-link-position-2" style="font-size: 8pt;" aria-label="Branding (1 item)">Branding</a>
                                    <a href="#" class="tag-cloud-link tag-link-20 tag-link-position-3" style="font-size: 8pt;" aria-label="corporat (1 item)">corporat</a>
                                    <a href="#" class="tag-cloud-link tag-link-24 tag-link-position-4" style="font-size: 16.4pt;" aria-label="Design (2 items)">Design</a>
                                    <a href="#" class="tag-cloud-link tag-link-25 tag-link-position-5" style="font-size: 22pt;" aria-label="gallery (3 items)">gallery</a>
                                    <a href="#" class="tag-cloud-link tag-link-26 tag-link-position-6" style="font-size: 8pt;" aria-label="video (1 item)">video</a>
                                    <a href="#" class="tag-cloud-link tag-link-29 tag-link-position-7" style="font-size: 16.4pt;" aria-label="web design (2 items)">web design</a>
                                 </div>
                              </section>
                           </aside>
                        </div>
                    </div>
                </div>
            </section>
            <!-- inner-blog-end -->
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