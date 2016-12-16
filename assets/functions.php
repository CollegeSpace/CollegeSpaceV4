<?php

function PrintHeadMetadata($pageTitle)
{
	print("<meta charset=\"utf-8\">");
	print("<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1, minimal-ui\">");
	print("<title>$pageTitle</title>");
	print("<link href=\"favicon.png\" type=\"image/x-icon\" rel=\"shortcut icon\">");
	print("<link href=\"assets/css/master.css\" rel=\"stylesheet\">");
	print("<link href=\"team/css/main.css\" rel=\"stylesheet\">");
	print("<link href=\"team/css/lightbox.css\" rel=\"stylesheet\">");
	print("<link href=\"team/css/responsive.css\" rel=\"stylesheet\">");
	print("<link href=\"assets/plugins/switcher/css/switcher.css\" rel=\"stylesheet\" id=\"switcher-css\" media=\"all\">");
	print("<script src=\"assets/plugins/jquery/jquery-1.11.3.min.js\"></script>");
}

?>