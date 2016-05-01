<?php
	echo "
		<!-- START OF HEADER -->
		<div class = \"navbar navbar-inverse navbar-static-top\">
			<div class = \"container\">
				<div class=\"navbar-header\"><a href=\"index.php\" class=\"navbar-brand\">Far Flights</a>
						<button class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navHeaderCollapse\">
							<span class=\"icon-bar\"></span>
							<span class=\"icon-bar\"></span>
							<span class=\"icon-bar\"></span>
						</button>
					</div>
					
					<div class = \"collapse navbar-collapse navHeaderCollapse\">
						<ul class = \"nav navbar-nav navbar-right\">
							<li><a href = \"index.php\"> Home </a></li>
							<li><a href = \"about.php\"> About </a></li>
							<li><a href = \"userPage.php\"> My Searches </a><li>
							<li><a href=\"#\" class=\"g-signin2\" data-width=160 data-height=25 data-theme=dark data-longtitle=true data-onsuccess=\"onSignIn\"></a></li>
							<li><a href=\"#\" onclick=\"signOut();\">Sign out</a></li>
	
						</ul>
					</div>	
			</div>
		</div>	
		<!-- END OF HEADER -->";

		
?>