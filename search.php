<?php include("assets/functions.php") ?>

<!DOCTYPE html>
<html lang="en">
<head><?php PrintHeadMetadata("CollegeSpace"); ?>
<style type="text/CSS">
.col-search-res{
text-align:-webkit-left;
    margin-bottom:4px;
    height: auto;
  /*  border-radius:10px;*/
    background:#ececec;
}
.col-text{
	   padding:12px 0;
    font-size:16px;
	font-weight:400;
    color:#2c3f56;
}
.result:before
{content:'';
display:block;    
border-top:4px solid #00aeef;
	
	
}
</style>
</head>
<body>

<div id="page-preloader" style="display: none;"><span class="spinner"></span></div>
<div class="layout-theme animated-css" data-header="sticky" data-header-top="200">

<div id="wrapper">
<header class="header sticky">
    <div class="container">
        <div class="row">
            <div class="col-xs-12"> <a class="header-logo" href="javascript:void(0);"><img class="header-logo__img" src="assets/img/logo.png" alt="Logo"></a>
                <div class="header-inner">
                    <div class="header-search">
                        <div class="navbar-search">
                        <form id="search-global-form">
                            <div class="input-group">
                                <input type="text" placeholder="Type your search..." class="form-control" autocomplete="off" name="s" id="search" value="">
                                    <span class="input-group-btn">
                                        <button type="reset" class="btn search-close" id="search-close"><i class="fa fa-times"></i></button>
                                    </span>
                            </div>
                        </form>
                        </div>
                    </div>
                    <a id="search-open" href="#fakelink"><i class="icon stroke icon-Search"></i></a>
                    <nav class="navbar yamm">
    <div class="navbar-header hidden-md  hidden-lg  hidden-sm ">
        <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
    </div>
    <div id="navbar-collapse-1" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li class="dropdown"><a href="index.php">Home<span class="nav-subtitle">OUR World</span></a></li>
			<li class="dropdown"> <a href="team.php">Team Page<span class="nav-subtitle">Meet us!</span></a></li>
            <li class="dropdown"> <a href="http://nsitpedia.collegespace.in/" target="_blank">Nsitpedia<span class="nav-subtitle">our personal blog</span></a></li>
            <li class="dropdown"> <a href="http://updates.collegespace.in/" target="_blank">Updates<span class="nav-subtitle">Section for ghissus</span></a></li>
            <li><a href="contact.php">CONTACT<span class="nav-subtitle">say us hi</span></a></li>
        </ul>
    </div>
</nav>                </div>
            </div>
        </div>
    </div>
</header><div id="spacing">
</div>
  <div class="main-content">
    <div class="wrap-title-page">
					<div class="container">
						<div class="row">
							<div class="col-xs-12"><h1 class="ui-title-page">Search Results</h1></div>
						</div>
					</div><!-- end container-->
				</div><!-- end wrap-title-page -->


				<div class="section-breadcrumb">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="wrap-breadcrumb clearfix">
									<ol class="breadcrumb">
										<li><a href="javascript:void(0);"><i class="icon stroke icon-House"></i></a></li>
										<li><a href="javascript:void(0);">Search</a></li>
										<li class="active">Expected Results</li>
									</ol>
								</div>
							</div>
						</div><!-- end row -->
					</div><!-- end container -->
				</div><!-- end section-breadcrumb -->


				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<main class="main-content">
                              <div class="">
					             <div class="row result">
                                   <div class="col-md-12 col-sm-12 col-search-res"><p class="col-text">this is the searched result</p></div>
								   <div class="col-md-12 col-sm-12 col-search-res"><p class="col-text">this is the searched result</p></div>
								   <div class="col-md-12 col-sm-12 col-search-res"><p class="col-text">this is the searched result.</p></div>
								   <div class="col-md-12 col-sm-12 col-search-res"><p class="col-text">this is the searched result</p></div>
								   <div class="col-md-12 col-sm-12 col-search-res"><p class="col-text"></p></div>
								   <div class="col-md-12 col-sm-12 col-search-res"><p class="col-text"></p></div>
								   <div class="col-md-12 col-sm-12 col-search-res"><p class="col-text">this is the searched result.</p></div>
								   <div class="col-md-12 col-sm-12 col-search-res"><p class="col-text"></p></div>
								   
								 </div>
							  </div>	 
							</main>
							<ul class="pagination">
								<li><a href="javascript:void(0);"><i class="icon fa fa-angle-left"></i></a></li>
								<li><a href="javascript:void(0);">1</a></li>
								<li><a href="javascript:void(0);">2</a></li>
								<li><a href="javascript:void(0);">3</a></li>
								<li><a href="javascript:void(0);"><i class="icon fa fa-angle-right"></i></a></li>
							</ul>
						</div><!-- end col -->


						<div class="col-md-4">
							<aside class="sidebar sidebar_mod-a">

								<section class="widget widget-default widget_search">
									<h3 class="widget-title ui-title-inner decor decor_mod-a">Add more Keywords</h3>
									<form method="get" class="form-search clearfix" >
										<input class="form-search__input" type="text" placeholder="keyword ...">
										<button class="form-search__submit" type="submit"><i class="icon stroke icon-Search"></i></button>
									</form>
								</section>
								<section class="widget widget-default widget_categories">
									<h3 class="widget-title ui-title-inner decor decor_mod-a">categories</h3>
									<div class="block_content">
										<ul class="list-categories list-unstyled">
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);">
													<span class="list-categories__name">computer sciences</span>
													<span class="list-categories__number">28</span>
												</a>
											</li>
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);">
													<span class="list-categories__name">business & management</span>
													<span class="list-categories__number">106</span>
												</a>
											</li>
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);">
													<span class="list-categories__name">biology & life sciences</span>
													<span class="list-categories__number">62</span>
												</a>
											</li>
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);">
													<span class="list-categories__name">software engineering</span>
													<span class="list-categories__number">74</span>
												</a>
											</li>
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);">
													<span class="list-categories__name">Music, Film, and Audio</span>
													<span class="list-categories__number">207</span>
												</a>
											</li>
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);">
													<span class="list-categories__name">Economics and Finance</span>
													<span class="list-categories__number">69</span>
												</a>
											</li>
										</ul>
									</div><!-- end block_content -->
								</section><!-- end widget -->

							</aside><!-- end sidebar -->
						</div><!-- end col -->
					</div><!-- end row -->
				</div><!-- end container -->


    
    

    
    

    

    
    

  
    


    
  </div>
<footer class="footer wow fadeInUp" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: fadeInUp;">
    <div class="container">
        <div class="footer-inner border-decor_top">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <section class="footer-section">
                        <h3 class="footer-title">ABOUT US</h3>
                        <a href="javascript:void(0);"><img class="footer-logo img-responsive" src="assets/img/logo.png" height="50" width="195" alt="Logo"></a>
                        <div class="footer-info">CollegeSpace, the Socio-Academic Portal of NSIT, is the most frequently-visited website of NSIT. We started out with a team of three with an aim to provide everything that is necessary to the students during the four years of college and now, after five successful years, we have a large team of hardworking and committed students working in various departments.</div>
                        <div class="footer-contacts footer-contacts_mod-a"> <i class="icon stroke icon-Pointer"></i><address class="footer-contacts__inner">NSIT, New Delhi</address></div>
                        <div class="footer-contacts"> <i class="icon stroke icon-Phone2"></i> <span class="footer-contacts__inner">Call us +91 7827 775857</span> </div>
                        <div class="footer-contacts"> <i class="icon stroke icon-Mail"></i> <a class="footer-contacts__inner" href="mailto:collegespacensit@gmail.com">collegespacensit@gmail.com</a> </div>
                    </section>
              <!-- end footer-section -->
                </div>
            <!-- end col -->
                <div class="col-lg-3 col-sm-3 col-sm-offset-1">
                  <section class="footer-section">
                    <h3 class="footer-title">QUICK LINKS</h3>
                    <ul class="footer-list list-unstyled">
                      <li class="footer-list__item"><a class="footer-list__link" href="http://updates.collegespace.in/category/notices/">Notices</a></li>
                      <li class="footer-list__item"><a class="footer-list__link" href="http://updates.collegespace.in/category/datesheets/">Datesheets</a></li>
                      <li class="footer-list__item"><a class="footer-list__link" href="http://updates.collegespace.in/category/results/">Results</a></li>
                      <li class="footer-list__item"><a class="footer-list__link" href="http://updates.collegespace.in/notes/">Notes</a></li>
                      <li class="footer-list__item"><a class="footer-list__link" href="http://updates.collegespace.in/exampapers/">Exam Papers</a></li>
                      <li class="footer-list__item"><a class="footer-list__link" href="http://updates.collegespace.in/category/syllabus/">Syllabus</a></li>
                      <li class="footer-list__item"><a class="footer-list__link" href="http://updates.collegespace.in/disclaimer/">Disclaimer</a></li>
                      <li class="footer-list__item"><a class="footer-list__link" href="http://updates.collegespace.in/copyright/">Copyright</a></li>
                    </ul>
                  </section><!-- end footer-section -->
                </div>
                <div class="col-lg-4 col-sm-4">
                    <section class="footer-section">
                        <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" class="twitter-timeline twitter-timeline-rendered" style="position: static; visibility: visible; display: inline-block; width: 100%; padding: 0px; border: none; max-width: 100%; min-width: 180px; margin-top: 0px; margin-bottom: 0px; height: 553px;" data-widget-id="profile:college_space" title="Twitter Timeline"></iframe>
                    </section>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="copyright">Copyright © 2016 <a href="http://collegespace.in/">CollegeSpace</a>
                <ul class="social-links list-unstyled">
                    <li><a class="icon fa fa-facebook" href="https://www.facebook.com/collegespace/"></a></li>
                    <li><a class="icon fa fa-twitter" href="https://twitter.com/college_space"></a></li>
                    <li><a class="icon fa fa-linkedin" href="https://www.linkedin.com/company/collegespace"></a></li>
                </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
</div>

<!-- SCRIPTS -->
<script src="assets/js/jquery-migrate-1.2.1.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/modernizr.custom.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.easing.min.js"></script>

<!--THEME-->
<script src="assets/plugins/sliderpro/js/jquery.sliderPro.min.js"></script>
<script src="assets/plugins/owl-carousel/owl.carousel.min.js"></script>
<script src="assets/plugins/isotope/jquery.isotope.min.js"></script>
<script src="assets/plugins/prettyphoto/js/jquery.prettyPhoto.js"></script>
<script src="assets/plugins/datetimepicker/jquery.datetimepicker.js"></script>
<script src="assets/plugins/jelect/jquery.jelect.js"></script>
<script src="assets/plugins/rendro-easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
<script src="assets/js/cssua.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/custom.js"></script>

<!--Twitter Script-->
<script>
window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);
  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };
  return t;
}(document, "script", "twitter-wjs"));
</script>


<iframe id="rufous-sandbox" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" style="position: absolute; visibility: hidden; display: none; width: 0px; height: 0px; padding: 0px; border: none;"></iframe></body></html>
