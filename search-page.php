<?php
//Author: Divyanshu Kalra
  function cacheAndGetJsonDump()
{
  $cache_Time = 60*60; # one hour
  if(file_exists("./phpTempFiles/lasttime.collegespace"))
  {
    $lastTime = file_get_contents("./phpTempFiles/lasttime.collegespace");
    if(time() > intval($lastTime) + $cache_Time)
    {
      $jsonDump = file_get_contents("http://updates.collegespace.in/wp-json/posts?filter[posts_per_page]=74");
      $timeNow = time();
      file_put_contents("./phpTempFiles/lasttime.collegespace", $timeNow);
      file_put_contents("./phpTempFiles/cachedResult.collegespace", $jsonDump);
    }
    else
    {
      $jsonDump = file_get_contents("./phpTempFiles/cachedResult.collegespace");
    }
  }
  else
  {
    $jsonDump = file_get_contents("http://updates.collegespace.in/wp-json/posts?filter[posts_per_page]=74");
    $timeNow = time();
    file_put_contents("./phpTempFiles/lasttime.collegespace", $timeNow);
    file_put_contents("./phpTempFiles/cachedResult.collegespace", $jsonDump);
  }
  return $jsonDump;
}
function GetScore($content, $query, $scoreAddition = 10)
{
  $words = explode(" ", $query);
  $score = 0;
  foreach ($words as $word)
  {
    if (strpos($content, $word) !== false) {
      $score += $scoreAddition;
    }
  }
  return $score;
}
if(isset($_GET["query"]))
{
  
  $jsonDump = cacheAndGetJsonDump();
  $jsonedDump = json_decode($jsonDump);
  $result = array();
  $query = $_GET["query"];
  foreach ($jsonedDump as $article)
  {
    //print_r(json_decode(json_encode($article), true));
    $articleTemp = json_decode(json_encode($article), true);
    //$id = $article->ID;
    $content = $article->content;
    $score = 0;
    if (filter_var($content, FILTER_VALIDATE_URL)) {
      // is a link.
      $score += GetScore($content, $query, 8);
    }
    else
    {
      $score += GetScore($content, $query, 10);
    }
    
    $link = $article->link;
    $score += GetScore($link, $query, 6);
    
    $title = $article->title;
    $score += GetScore($link, $query, 12);
    $articleTemp["score"] = $score;

    //echo $articleTemp["score"];

    if($score > 0)
    {
      array_push($result, $articleTemp);
    }
  }
  //header('Content-Type: application/json');
  //print_r($result);
  //echo(json_encode($result));
  if(count($result) > 0)
    $flag = 1;
  else
    $flag = -1;
}
else
  $flag = 0;
?>
<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
<title>CollegeSpace</title>
<link href="favicon.png" type="image/x-icon" rel="shortcut icon">
<link href="assets/css/master.css" rel="stylesheet">
<!-- SWITCHER -->
<link href="assets/plugins/switcher/css/switcher.css" rel="stylesheet" id="switcher-css" media="all">
<script src="assets/plugins/jquery/jquery-1.11.3.min.js"></script>
</head>

<body>

<!-- Loader -->
<div id="page-preloader"><span class="spinner"></span></div>
<!-- Loader end -->

<div class="layout-theme animated-css"  data-header="sticky" data-header-top="200">


<!-- UI Author : Chaitanya Dwivedi -->
  <div id="wrapper">

    <!-- HEADER -->
    <header class="header" id="search-page-header">
     <div class="container" id="search-page-container">
        <div class="row">
          <div class="col-xs-12"> <a class="header-logo" href="javascript:void(0);"><img class="header-logo__img" src="assets/img/logo.png" alt="Logo"></a>
            <div class="header-inner">
              <div class="header-search search-page open-search open">
                <div class="navbar-search">
                  <form id="search-global-form" action="" method = "get">
                    <div class="input-group">
                      <input type="text" placeholder="Type your search..." class="form-control" autocomplete="off" name="query" id="search" value="">
                      <span class="input-group-btn">
                        <button id="search-page-button">Search</button>
                      </span> </div>
                  </form>
                </div>
              </div>
            <!-- <a id="search-open" href="#fakelink"><i class="icon stroke icon-Search"></i></a>-->
              <nav class="navbar yamm">
                <div class="navbar-header hidden-md  hidden-lg  hidden-sm ">
                  <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div id="navbar-collapse-1" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                    <li class="dropdown"><a href="#">Home<span class="nav-subtitle">OUR World</span></a>
                     </li>
					 <li class="dropdown"> <a href="instructors.html">Team Page<span class="nav-subtitle">Meet us!</span></a>

                    </li>
                    <li class="dropdown"> <a href="../external.html?link=http://nsitpedia.collegespace.in/" target="_blank">Nsitpedia<span class="nav-subtitle">our personal blog</span></a>

                    </li>
                    <li class="dropdown"> <a href="../external.html?link=http://updates.collegespace.in/" target="_blank">Updates<span class="nav-subtitle">Section for ghissus</span></a>

                    </li>
                    <li><a href="contact.html">CONTACT<span class="nav-subtitle">say us hi</span></a></li>
                  </ul>
                </div>
              </nav>
              <!--end navbar -->

            </div>
            <!-- end header-inner -->
          </div>
          <!-- end col  -->
        </div>
        <!-- end row  -->
      </div>
      <!-- end container-->
    </header>
    <!-- end header -->

    <div class="main-content">
      <div id="search-results">
        <div class="list-group" id="search-item">
            <?php
            if($flag != 0)
            {
              if($flag == 1)
              {
                foreach($result as $single_result)
                {
            ?>
            <a href="<?php echo $single_result['link']; ?>" class="list-group-item">
            <h4 class="list-group-item-heading"><?php echo $single_result['title']; ?></h4>
            <p class="list-group-item-text"><h6>No description.</h6></p>
          </a>
          <?php
          }
          }
          else
          {
            ?>
            <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">No results.</h4>
            <p class="list-group-item-text"><h6>No results were found for your query, please check the spelling and try again.</h6></p>
          </a>
          <?php
          }
        }
        else
        {
          ?>
          <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">No query.</h4>
            <p class="list-group-item-text"><h6>Type in a query to search for it.</h6></p>
          </a>
          <?php
        }
?>

</div>
      </div>






    </div>
    <footer class="footer wow fadeInUp" data-wow-duration="2s">
      <div class="container">
        <div class="footer-inner border-decor_top">
          <div class="row">
		 <div class="col-md-2">
		 </div>
            <div class="col-md-4">
              <section class="footer-section">
                <h3 class="footer-title">ABOUT US</h3>
                <a href="javascript:void(0);"><img class="footer-logo img-responsive" src="assets/img/logo.png" height="50" width="195" alt="Logo"></a>
                <div class="footer-info">CollegeSpace, the Socio-Academic Portal of NSIT, is the most frequently-visited website of NSIT. We started out with a team of three with an aim to provide everything that is necessary to the students during the four years of college and now, after five successful years, we have a large team of hardworking and committed students working in various departments.</div>
                <div class="footer-contacts footer-contacts_mod-a"> <i class="icon stroke icon-Pointer"></i>
                  <address class="footer-contacts__inner">
                  NSIT,New Delhi
                  </address>
                </div>
                <div class="footer-contacts"> <i class="icon stroke icon-Phone2"></i> <span class="footer-contacts__inner">Call us 0800 12345</span> </div>
                <div class="footer-contacts"> <i class="icon stroke icon-Mail"></i> <a class="footer-contacts__inner" href="mailto:Info@academica.com">Info@academica.com</a> </div>
              </section>
              <!-- end footer-section -->
            </div>
            <!-- end col -->

            <div class="col-lg-2 col-sm-3">

              <!-- end footer-section -->
            </div>
            <!-- end col -->
          <div class="col-lg-2 col-sm-3">

            </div>
			<div class="col-lg-2 col-sm-3">

            </div>
            <div class="col-lg-3 col-sm-3">
              <section class="footer-section">
                <h3 class="footer-title">LATEST TWEETS</h3>
                <div class="tweets">
                  <div class="tweets__text">What is the enemy of #creativity?</div>
                  <div><a href="javascript:void(0);">http://enva.to/hVl5G</a></div>
                  <span class="tweets__time">9 hours ago</span> </div>
                <div class="tweets">
                  <div class="tweets__text">An agile framework can produce the type of lean marketing essential for the digital age <a href="javascript:void(0);">@aholmes360 #IMDS15</a></div>
                  <span class="tweets__time">9 hours ago</span> </div>
                <a class="tweets__link" href="../external.html?link=https://twitter.com/college_space">Follow @college_space</a> </section>
              <!-- end footer-section -->
            </div>
            <!-- end col -->


            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
        <!-- end footer-inner -->

        <div class="row">
          <div class="col-xs-12">

              <div class="copyright">Copyright © 2016 <a href="../external.html?link=http://collegespace.in/">CollegeSpace</a>
              <ul class="social-links list-unstyled">
                <li><a class="icon fa fa-facebook" href="../external.html?link=https://www.facebook.com/collegespace/"></a></li>
                <li><a class="icon fa fa-twitter" href="../external.html?link=https://twitter.com/college_space"></a></li>

                <li><a class="icon fa fa-linkedin" href="../external.html?link=https://www.linkedin.com/company/collegespace"></a></li>

              </ul>
            </div>
            <!-- end footer-bottom -->
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </footer>
  </div>
  <!-- end wrapper -->
</div>
<!-- end layout-theme -->

<!-- SCRIPTS -->
<script src="assets/js/jquery-migrate-1.2.1.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/modernizr.custom.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.easing.min.js"></script>

<!--THEME-->
<script  src="assets/plugins/sliderpro/js/jquery.sliderPro.min.js"></script>
<script src="assets/plugins/owl-carousel/owl.carousel.min.js"></script>
<script src="assets/plugins/isotope/jquery.isotope.min.js"></script>
<script src="assets/plugins/prettyphoto/js/jquery.prettyPhoto.js"></script>
<script src="assets/plugins/datetimepicker/jquery.datetimepicker.js"></script>
<script src="assets/plugins/jelect/jquery.jelect.js"></script>
<script src="assets/plugins/rendro-easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
<script src="assets/js/cssua.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/custom.min.js"></script>

<!--COLOR SWITCHER -->
<script src="assets/plugins/switcher/js/bootstrap-select.js"></script>
<script src="assets/plugins/switcher/js/dmss.js"></script>
</body>


</html>
