<?php include( "assets/functions.php"); $keyword="" ; if (isset($_GET[ 'q'])) $keyword=$_GET[ 'q']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php PrintHeadMetadata( "CollegeSpace"); ?>
</head>

<body>
	<div id="page-preloader"><span class="spinner"></span>
	</div>
	<div class="layout-theme animated-css" data-header="sticky" data-header-top="200">
		<div id="wrapper">
			<?php include ( "assets/header.php"); ?>
			<div id="spacing"> </div>
			<div class="main-content">
				<div class="wrap-title-page">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<h1 class="ui-title-page">Search Results</h1>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<aside class="sidebar sidebar_mod-a">
								<section id="querytags" class="widget widget-default widget_search">
									<h3 class="ui-title-inner">Search Query</h3>
									<?php $keys=e xplode( ',', $keyword); foreach ($keys as $key) { if ($key) echo "<span>" . $key . "</span>"; } ?>
									<form method="get" class="form-search clearfix" action="#" id="queryForm">
										<input name="q" class="form-search__input" type="hidden" value="<?php echo $keyword; ?>">
										<input name="key" class="form-search__input" type="text" placeholder="type a keyword...">
										<button class="form-search__submit" type="submit"><i class="icon stroke icon-Search"></i>
										</button>
									</form>
								</section>
								<section class="widget widget-default widget_categories">
									<h3 class="ui-title-inner">categories</h3>
									<div class="block_content">
										<ul class="list-categories list-unstyled">
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);"> <span class="list-categories__name">computer sciences</span> <span class="list-categories__number">28</span> </a>
											</li>
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);"> <span class="list-categories__name">business & management</span> <span class="list-categories__number">106</span> </a>
											</li>
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);"> <span class="list-categories__name">biology & life sciences</span> <span class="list-categories__number">62</span> </a>
											</li>
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);"> <span class="list-categories__name">software engineering</span> <span class="list-categories__number">74</span> </a>
											</li>
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);"> <span class="list-categories__name">Music, Film, and Audio</span> <span class="list-categories__number">207</span> </a>
											</li>
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);"> <span class="list-categories__name">Economics and Finance</span> <span class="list-categories__number">69</span> </a>
											</li>
										</ul>
									</div>
								</section>
							</aside>
						</div>
						<div class="col-md-8">
							<main class="main-content">
								<div style="margin-top: 10px;">
									<div id="search_results" class="row result">
										<div class="col-md-12 col-sm-12 col-search-res">
											<p class="col-text">this is the searched result</p>
										</div>
										<div class="col-md-12 col-sm-12 col-search-res">
											<p class="col-text">this is the searched result</p>
										</div>
										<div class="col-md-12 col-sm-12 col-search-res">
											<p class="col-text">this is the searched result.</p>
										</div>
										<div class="col-md-12 col-sm-12 col-search-res">
											<p class="col-text">this is the searched result</p>
										</div>
										<div class="col-md-12 col-sm-12 col-search-res">
											<p class="col-text">this is the searched result.</p>
										</div>
									</div>
								</div>
							</main>
							<ul class="pagination">
								<li><a href="javascript:void(0);"><i class="icon fa fa-angle-left"></i></a>
								</li>
								<li><a href="javascript:void(0);">1</a>
								</li>
								<li><a href="javascript:void(0);">2</a>
								</li>
								<li><a href="javascript:void(0);">3</a>
								</li>
								<li><a href="javascript:void(0);"><i class="icon fa fa-angle-right"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
	<?php
		include ("assets/footer.php");
		if (isset($_GET['q']))
		{
			echo "<script type=\"text/javascript\">";
			echo "$(document).ready(function(){";
			echo "$(\"#queryForm\").submit();";
			echo "});";
			echo "</script>";
		}
	?>
</body>
</html>