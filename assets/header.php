<header class="header sticky">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<a class="header-logo" href="javascript:void(0);"><img class="header-logo__img" src="assets/img/logo.png" alt="Logo"></a>
				<div class="header-inner">
					<div class="header-search">
						<div class="navbar-search">
						<form id="search-global-form" action="search-page.php" method="get">
							<div class="input-group">
								<input type="text" placeholder="Type your search..." class="form-control" autocomplete="off" name="query" id="search" value="">
									<span class="input-group-btn">
										<button type="search-page-button" class="btn search-close" id="search-close"><i class="fa fa-times"></i></button>
									</span>
							</div>
						</form>
						</div>
					</div>
					<a id="search-open" href="#fakelink"><i class="icon stroke icon-Search"></i></a>
					<?php include "navigation.php"; ?>
				</div>
			</div>
		</div>
	</div>
</header>