<?php include( "assets/functions.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php PrintHeadMetadata( "CollegeSpace"); ?>
	<style type="text/css">
		.notesearch {
			height: 50px;
		}
	</style>
</head>

<body>
	<div id="page-preloader">
		<div id="loading-center">
			<h1 id="loading-center" class="preloader_heading animated bounceInDown">CollegeSpace</h1>
			<div id="loading-center-absolute">
				<div class="object" id="object_one"></div>
				<div class="object" id="object_two"></div>
				<div class="object" id="object_three"></div>
				<div class="object" id="object_four"></div>
			</div>
		</div>
	</div>
	<div class="layout-theme animated-css" data-header="sticky" data-header-top="200">
		<div id="wrapper">
			<?php include ( "assets/header.php"); ?>
			<div id="spacing"> </div>
			<div class="main-content">
				<div id="sliderpro1" class="slider-pro main-slider">
					<div class="sp-slides">
						<div class="sp-slide"> <img class="sp-image" src="assets/img/1st.jpg" data-src="assets/img/1st.jpg" data-retina="assets/img/1st.jpg" alt="img" />
							<div class="item-wrap sp-layer  sp-padding" data-horizontal="700" data-vertical="1" data-show-transition="left" data-hide-transition="up" data-show-delay="400" data-hide-delay="200"> </div>
						</div>
						<div class="sp-slide"> <img class="sp-image" src="assets/img/2nd.jpg" data-src="assets/img/2nd.jpg" data-retina="assets/img/2nd.jpg" alt="img" />
							<div class="item-wrap sp-layer  sp-padding" data-horizontal="200" data-vertical="30" data-show-transition="left" data-hide-transition="up" data-show-delay="400" data-hide-delay="200"></div>
						</div>
						<div class="sp-slide"> <img class="sp-image" src="assets/img/3rd.jpg" data-src="assets/img/3rd.jpg" data-retina="assets/img/3rd.jpg" alt="img" />
							<div class="item-wrap sp-layer  sp-padding" data-horizontal="700" data-vertical="1" data-show-transition="left" data-hide-transition="up" data-show-delay="400" data-hide-delay="200"> </div>
						</div>
						<div class="sp-slide"> <img class="sp-image" src="assets/img/4th.jpg" data-src="assets/img/4th.jpg" data-retina="assets/img/4th.jpg" alt="img" />
							<div class="item-wrap sp-layer  sp-padding" data-horizontal="700" data-vertical="1" data-show-transition="left" data-hide-transition="up" data-show-delay="400" data-hide-delay="200"> </div>
						</div>
					</div>
				</div>
				<div class="section_mod-a">
					<div class="container">
						<div class="section_mod-a__inner" id="note_sec">
							<div class="row">
								<div class="col-md-8">
									<section class="section-advantages wow">
										<h2 class="ui-title-block ui-title-block_mod-a">One way stop for notes and more</h2>
										<ul class="advantages advantages_mod-a list-unstyled">
											<li class="advantages__item"> <span class="advantages__icon"><i class="icon stroke icon-Cup"></i></span>
												<div class="advantages__inner">
													<h3 class="ui-title-inner decor decor_mod-a">Notices</h3>
													<div class="advantages__info">
														<p>Check out the latest updates from NSIT's admin without any hassle. Now no more running to the admin at the last minute.</p>
													</div>
												</div>
											</li>
											<li class="advantages__item"> <span class="advantages__icon"><i class="icon stroke icon-DesktopMonitor"></i></span>
												<div class="advantages__inner">
													<h3 class="ui-title-inner decor decor_mod-a">Notes And Papers</h3>
													<div class="advantages__info">
														<p>Find the notes and previous year examination papers for all semesters. Additionally, class assignments and lab work to get you going for that perfect grade.</p>
													</div>
												</div>
											</li>
											<li class="advantages__item"> <span class="advantages__icon"><i class="icon stroke icon-WorldGlobe"></i></span>
												<div class="advantages__inner">
													<h3 class="ui-title-inner decor decor_mod-a">NSITPEDIA</h3>
													<div class="advantages__info">
														<p>The ultimate destination to explore NSIT! A single platform that presents a humongous pack of movie and food reviews, latest technological releases, thought provoking poetries and the latest trends in the campus.</p>
													</div>
											</li>
											<li class="advantages__item"> <span class="advantages__icon"><i class="icon stroke icon-Users"></i></span>
												<div class="advantages__inner">
													<h3 class="ui-title-inner decor decor_mod-a">Societies And Faculty at NSIT</h3>
													<div class="advantages__info">
														<p>Myriad of societies and our experienced faculty make NSIT what it is. Read on to find out about your honorable professors, society events and much more!</p>
													</div>
												</div>
											</li>
										</ul>
									</section>
									</div>
									<div class="col-md-4">
										<section class="find-course find-course_mod-a wow " data-wow-duration="2s">
											<h2 class="find-course__title"><i class="icon stroke icon-Search"></i>SEARCH FOR NOTES</h2>
											<form class="find-course__form" action="NotesSearch.php" method="GET">
												<div class="form-group">
													<?php if(isset($_GET[ 'error'])) { ?>
													<div class="alert alert-danger"> <strong>No query!</strong> Please type in a query to search. </div>
													<?php } ?>
													<input class="form-control notesearch" type="text" name="query" placeholder="Keyword...">
													<select name="branch" class="form-control notesearch">
														<option value="coe">COE</option>
														<option value="it">IT</option>
														<option value="ece">ECE</option>
														<option value="ice">ICE</option>
														<option value="mpae">MPAE</option>
														<option value="bt">BT</option>
													</select>
													<select name="sem" class="form-control notesearch">
														<option value="1">1st Semester</option>
														<option value="2">2nd Semester</option>
														<option value="3">3rd Semester</option>
														<option value="4">4th Semester</option>
														<option value="5">5th Semester</option>
														<option value="6">6th Semester</option>
														<option value="7">7th Semester</option>
														<option value="8">8th Semester</option>
													</select>
												</div>
												<div class="find-course__wrap-btn">
													<button class="btn btn-effect btn-info">SEARCH</button>
												</div>
											</form>
										</section>
									</div>
								</div>
							</div>
						</div>
					</div>
					<section class="section-default">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<div class="wrap-title">
										<h2 class="ui-title-block">Latest on <strong>CollegeSpace updates</strong></h2>
										<div class="ui-subtitle-block ui-subtitle-block_mod-b"></div>
									</div>
									<div id="updates" class="posts-wrap"> </div>
									<div style="text-align: center;">
										<button class="btn btn-effect btn-info" onclick="window.location='http://updates.collegespace.in';">View all updates</button>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="section-default">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<div class="wrap-title">
										<h2 class="ui-title-block" id="pedia">Read on <strong>NSITPEDIA</strong></h2>
										<div class="ui-subtitle-block ui-subtitle-block_mod-b">CollegeSpace Blog</div>
									</div>
									<div id="nsitpedia" class="posts-wrap"> </div>
									<div style="text-align: center;">
										<button class="btn btn-effect btn-info" onclick="window.location='http://nsitpedia.collegespace.in';">Go to NSITpedia</button>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<?php include ( "assets/footer.php");?> </body>

</html>